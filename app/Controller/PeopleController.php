<?php

	class PeopleController extends AppController{
	
		
		
		private function getBranches(){
		
			$branches = $this->Person->Branch->find('list');
			//pr($branches);exit;s
		
			$this->set(compact('branches'));
		}
	
		private function getPersonTypes(){
		
			$person_types = $this->Person->PersonType->find('list');
			$this->set(compact('person_types'));
		
		}
	
	
		public function index(){
			
			$this->paginate = array
			(
				'conditions' => $this->postConditions($this->data, $op = 'LIKE'),
				'limit' => 20
			);
		
			$people = $this->paginate('Person');
		
			$this->set(compact('people'));
		
		}
		
		public function add(){
		
			if ( $this->request->is('post') ){
			
				$this->request->data('Person.person_type_id', 1);
				
				//debug($this->request->data);
				//exit;
				
				
				if ( $this->Person->saveAll($this->request->data) ){
				
					$this->Session->setFlash('Salvou', 'default', array('class' => 'success'), 'flash');
					$this->redirect(array('action' => 'index'));
				
				}
			
			}
			self::getBranches();
		
		}
		
			
		public function edit($id = null)
		{		

			self::getBranches();
			self::getPersonTypes();
		
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
				
		
				$this->Person->id = $id;
				$this->data = $this->Person->read();
				
			}			
		
		}

		
		public function delete($id = null){
		
			set(compact($id));
		
		}
		
		
		public function view($id = null){
		
		
			$this->Person->id = $id;
			$this->set('person' ,$this->Person->read());
		
		}
		
		
	}

