<?php

	class PointsController extends AppController
	{
		public function index()
		{
			$points = $this->Point->find('all');
			
			$this->set(compact('points'));
		}

		public function edit($id = null)
		{

			if ( $this->request->isGet() )
			{
				$data = $this->Point->read(null, $id);

				$this->data = $data;
			}
			else
			{
				if ( $this->Point->save($this->request->data) )
				{
					$this->Session->setFlash('Atualizado com sucesso.');

					$this->redirect( array('action' => 'index') );
				}
				else
				{
					$this->Session->setFlash('Não foi possível realializar a operação solicitada.');
				}
			}
		}

		public function add()
		{
			if ( $this->request->isPost() )
			{	
				$dados = &$this->request->data;

				$existe = isset($dados['Point']['name']);

				$empty = empty($dados['Point']['name']);

				if ( $existe and !$empty )
				{
					if ( $this->Point->save($dados) )
					{
						$this->Session->setFlash('Cadastro realizado com sucesso.', 'default', array('class' => 'success'), 'flash');
						$this->data = array();
					}
					else
					{
						$this->Session->setFlash('Não foi possível cadastrar.');
					}
				}
			}
		}
	}
