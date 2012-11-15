<?php

class CitiesController extends AppController{


	public function index(){ }


	public function add(){

		//a requisição é POST ?
		if ( $this->request->is('post') ) {

			// Salvou ??
			if ( $this->City->save( $this->request->data ) ) {

				$this->Session->setFlash('Cidade cadastrada com sucesso!', 'default', array('class' => 'success'), 'flash');
			
			}else{

				//Se não salvou avise !
				$this->Session->setFlash('Não foi possível salvar!');
			}
		}
	}

	public function view() {

		//Passa todas as cidades cadastradas
		$this->set('cidades', $this->City->find('all'));
	}

}
