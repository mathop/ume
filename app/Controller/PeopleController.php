<?php

	class PeopleController extends AppController
	{
	
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

		public function deleteImage( $id = null)
		{

			$pesquisa = $this->Person->read(array('fields' => 'image'), $id);

			$camRelativo = $pesquisa['Person']['image'];
			$camAbsoluto = WWW_ROOT . 'img' . DS . $camRelativo;

			$erros = 0;

			if ( !unlink($camAbsoluto) )
			{
				$erro = 1;
			}

			if ( !$this->Person->saveField('image', null) )
			{
				$erro = 1;
			}

			if ($erro != 0)
			{
				$this->Session->setFlash('Deleção realizada com sucesso', 'default', array('class' => 'success'), 'flash');
			}
			else
			{
				$this->Session->setFlash('Deleção não realizada, verifique se o arquivo já não foi deletado.');
			}

			$this->redirect($this->referer());
		}

		public function addImage( $id = null )
		{

			$conditions = array
			(
				'conditions' => array
				(
					'Person.id' => $id 
				)
			);

			echo '<p>**$this->Person->find no Controller método AddImage()**<p>';
			debug($this->Person->find('first', $conditions));
			echo '<p>**$this->request->data no Controller método AddImage()**</p>';
			debug($this->request->data);


			if ( $this->request->isPut())
			{

				echo '<p>é uma requisição do tipo PUT!</p>';

				if ( $this->Person->saveField('image', $this->request->data, array('validate' => true)) )
				{
					echo '<p>Person saveField retornou true !</p>';
				}
				else
				{
					echo '<p>Person saveField retornou false</p>';
				}
			}else
			{
				$this->data = $this->Person->find('first', $conditions);
				//$this->data = $this->Person->id = $id;
			}

		}

	}
