<?php

class CitiesController extends AppController{


	public function index(){ }


	public function add(){

		if ( $this->request->is('post') ) {

			if ( $this->City->save( $this->request->data ) ) {

				$this->Session->setFlash('Cidade cadastrada com sucesso!', 'default', array('class' => 'success'), 'flash');
			
			}else{

				$this->Session->setFlash('Não foi possível salvar!');
			}
		}
	}

	public function view() {

		$this->set('cidades', $this->City->find('all'));
	}

}
