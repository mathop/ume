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
	}
