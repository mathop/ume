<?php

	class CoursesController extends AppController{

		public function index()
		{
			
		}

		public function add() {

			if ( $this->request->is('post') ) 
			{
				if ( $this->Course->save( $this->request->data ) ) 
				{
					echo $this->Session->setFlash('Cadastro realizado com sucesso.', 'default', array('class' => 'success'), 'flash');

					$this->data = array();
				}
				else
				{
					echo $this->Session->setFlash('Cadastro não realizado.');
				}
			}
		}

		public function view()
		{
			$this->set('resultado', $this->Course->find('all'));
		}
	}
