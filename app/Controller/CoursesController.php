<?php

class CoursesController extends AppController{

	public function index(){}

	public function add() {

		//É POST?
		if ( $this->request->is('post') ) {

			//SALVOU ?
			if ( $this->Course->save( $this->request->data ) ) {

				//SE SALVOU EXIBE ISSO
				echo $this->Session->setFlash('Cadastro realizado com sucesso.', 'default', array('class' => 'success'), 'flash');
			}else {

				//SE NÃO SALVOU EXIBE ISSO
				echo $this->Session->setFlash('Cadastro não realizado.');
			}

		}

	}

	public function view() {

		//trás para a variável todos os cursos
		$resultado = $this->Course->find('all');

		//disponibiliza o conteudo da variavel para a view
		$this->set(compact('resultado'));
	}

}
