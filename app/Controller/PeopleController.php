<?php

	class PeopleController extends AppController
	{

		private function getBranches()
		{		
			$this->set('branches', $this->Person->Branch->find('list'));
		}
	
		private function getPersonTypes()
		{		
			$this->set('person_types', $this->Person->PersonType->find('list'));
		}

		private function getCities()
		{			
			$this->set('cities', $this->Person->Address->City->find('list'));
		}
	
		public function index()
		{		
			$this->paginate = array
			(
				'conditions' => $this->postConditions($this->data, $op = 'LIKE'),
				'limit' => 20
			);
		
			$people = $this->paginate('Person');
		
			$this->set(compact('people'));
		}
		
		public function add()
		{		
			if ( $this->request->is('post') )
			{
				$this->request->data('Person.person_type_id', 1);
								
				if ( $this->Person->saveAll($this->request->data) )
				{				
					$this->Session->setFlash('Cadastro realizado com sucesso!', 'default', array('class' => 'success'), 'flash');
					$this->redirect(array('action' => 'index'));
				}
			}

			self::getBranches();
			self::getCities();		
		}
		
			
		public function edit( $id = null )
		{		

			self::getBranches();
			self::getPersonTypes();
			self::getCities();
		
			if ( $this->request->is('post') )
			{
				
				if ($this->Person->saveAll($this->request->data))
				{
					$this->Session->setFlash('Alteração realizada com sucesso!', 'default', array('class' => 'success'), 'flash');
					$this->redirect(array('action' => 'index'));				
				}
			}
			else
			{		
				$this->Person->Behaviors->attach('Containable');
				$this->Person->contain
				(
					array
					(
						'Branch',
						'PersonType',
						'Address' => array
						(
							'City'
						)
					)
				);

				$this->data = $this->Person->read(null, $id);
			}			
		}

		
		public function delete( $id = null )
		{
			if ( $this->request->is('get') ) 
			{
				throw new MethodNotAllowedException();
			}

			if ( $this->Person->deleteAll(array('Person.id' => $id), true) )
			{
				$this->Session->setFlash('Deleção realizada com sucesso', 'default', array('class' => 'success', 'flash'));
				$this->referer();
			}
		}		
			
		public function view( $id = null )
		{
			$this->Person->Behaviors->attach('Containable');

			$this->Person->contain
			(
				array
				(
					'Address' => array
					(
						'City'
					),
					'Branch',
					'PersonType'
				)
			);

			$this->set('person', $this->Person->read(null, $id));
		}
	}
