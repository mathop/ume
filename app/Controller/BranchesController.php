<?php

	//Branch = Filial em pt-br
	class BranchesController extends AppController{
	
		//public $name = 'Branches';
		//public $helpers = array('Html', 'Form');
		
		//public $scaffold;
		
		
		public function index(){
		
			$this->set('branches', $this->Branch->find('all'));
			
			//$resultado = $this->Branch->find('all');
			//pr($resultado);exit;
			
		 }
		
		
		public function add(){
		
			if ( $this->request->is('post') ){
				
					if ( $this->Branch->save( $this->request->data ) ){	
					$this->Session->setFlash('Filial cadastrada com sucesso!', 'default', array('class' => 'success'), 'flash');
					$this->redirect(array('action' => 'index'));}
				
			}
			
		}
		
		public function delete($id = null){
		
			if ( $this->request->is('get') ){
						
				if ($this->Branch->delete($id))
				{
					$this->Session->setFlash('A Filial de ID ' . $id . ' foi excluída com sucesso!', 'default', array('class' => 'success'), 'flash');
					$this->redirect(array('action' => 'index'));
					
				}else
				{
					if ($id == null){
						$this->Session->setFlash('Ação não permitida!');
						//$this->Session->setFlash('Something bad.', 'default', array('class' => 'success'), 'flash');
					}else{
						$this->Session->setFlash('A Filial de ID ' . $id . ' não foi excluída!');
					}
					
				}
			
			}
			
		
		}
		
		public function edit($id = null){
		
			$this->Branch->id = $id;
			$branch = $this->Branch->read();
			
			
			if ( $this->request->is('post') ){
			
				if ($this->Branch->save($this->request->data))
				{
					$this->Session->setFlash('Edição realizada com sucesso!', 'default', array('class' => 'success'), 'flash');
					$this->redirect(array('action' => 'index'));
				}
			
			}else{
			
				$this->request->data = $branch;	
			
			}
		
		}
		
	}
