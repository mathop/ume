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
	
		public function edit( $id = null )
		{
			$isGet = $this->request->isGet();
			$empty = empty($this->request->data);

			if ( !$isGet and !$empty )
			{
				if ($this->Course->save($this->request->data))
				{
					$this->Session->setFlash('Atualização realizada com sucesso!');
					$this->redirect(array('action' => 'view'));
				}
				else
				{
					$this->Session->setFlash('Não foi possível atualizar.');
				}
			}

			$this->set('data', $this->Course->read(null, $id));
		}
	}
