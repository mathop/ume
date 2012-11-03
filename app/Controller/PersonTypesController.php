<?php
class PersonTypesController extends AppController {

	public function index(){
	
		$this->set('person_types', $this->PersonType->find('all'));
	
	}
	
	public function add(){
	
		if ( $this->request->is('post') ){
		
			if ( $this->PersonType->save($this->request->data) ){
			
				$this->Session->setFlash('Cadastrado com sucesso', 'default', array('class' => 'success'), 'flash');
				$this->redirect(array('action' => 'index'));
			
			}
		
		}
	
	}

}
