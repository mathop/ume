<?php

	class ContractsController extends AppController
	{

		private function index( )
		{
			//
		}
		
		private function getPeriods()
		{
			$this->set('periods', $this->Contract->Period->find('list'));
		}

		
		private function getContratos( $id = null )
		{
			
			// Diz que o model Person vai agir como "Containable", ou seja, ele vai realizar todos joins dos models associados.
			$this->Contract->Person->Behaviors->attach('Containable');

			// Passo as associações que eu quero
			$this->Contract->Person->contain(array('Contract' => array('Course', 'Period', 'Event' => array('Point', 'EventType'))));

			// Armazena na variável o resultado da busca pelo $id da pessoa
			$pesquisa = $this->Contract->Person->read(null, $id);

			//Disponibiliza o conteúdo da pesquisa para a View
			$this->set('contratos', $pesquisa);

		}
		
		
		public function view( $id = null )
		{

			//Disponibiliza a var contratos
			self::getContratos($id = $id);
			// Disponibiza a var periods
			self::getPeriods();
			
			//Disponibilza o ID da Pessoa para popular o campo person_id
			$this->set('id', $id);
			
			//Disponibiliza através da var points todos os Pontos
			$this->set('points', $this->Contract->Event->Point->find('list'));

			//Disponibiliza através da var courses todos os Cursos
			$this->set('courses', $this->Contract->Course->find('list'));
			
		}
			
		
		public function add( $id = null )
		{
		
			//Disponibilza o ID da Pessoa para popular o campo person_id
			$this->set('id', $id);

			//A requisição é POST?
			if ( $this->request->is('post') )
			{
				if ( $this->Contract->saveAll( $this->request->data ) )
				{
					$this->Session->setFlash('Novo contrato cadastrado com sucesso', 'default', array('class' => 'success'), 'flash');
					$this->redirect(array('action' => 'view', $id));
				}
			}

			//Disponibiliza através da var points todos os Pontos
			$this->set('points', $this->Contract->Event->Point->find('list'));

			//Disponibiliza através da var courses todos os Cursos
			$this->set('courses', $this->Contract->Course->find('list'));

			self::getPeriods();
			
		}
		
		public function edit( $id = null )
		{
			$result = $this->Contract->read(null, $id);

			if ( $this->request->is('post') )
			{
				if ( $this->Contract->saveAll( $this->request->data ) )
				{
					 $this->Session->setFlash('Atualização realizada com sucesso!', 'default', array('class' => 'success'), 'flash');
					 $this->redirect(array('action' => 'view', $result['Contract']['person_id']));
				}
				else
				{
					$this->Session->setFlash('Não salvou!');	
				}
			}
			else
			{
				$this->request->data = $result;
				$this->request->data('Contract.date_of_execution', date('d/m/Y', strtotime($this->request->data('Contract.date_of_execution'))));
				$this->request->data('Contract.date_of_closing', date('d/m/Y', strtotime($this->request->data('Contract.date_of_closing'))));
			}

			//Disponibilza o ID da Pessoa para popular o campo person_id
			$this->set('id', $id);

			//Disponibiliza através da var points todos os Pontos
			$this->set('points', $this->Contract->Event->Point->find('list'));

			//Disponibiliza através da var courses todos os Cursos
			$this->set('courses', $this->Contract->Course->find('list'));

			self::getPeriods();

		}
	}
