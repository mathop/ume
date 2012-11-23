<?php

class ContractsController extends AppController {

	private function index( ) {	}
	
	
	private function getContratos( $id = null )
	{
		
		// Diz que o model Person vai agir como "Containable", ou seja, ele vai realizar todos joins dos models associados.
		$this->Contract->Person->Behaviors->attach('Containable');

		// Passo as associações que eu quero
		$this->Contract->Person->contain(array('Contract' => array('Course', 'Event' => array('Point', 'EventType'))));

		// Armazena na variável o resultado da busca pelo $id da pessoa
		$pesquisa = $this->Contract->Person->read(null, $id);

		//Disponibiliza o conteúdo da pesquisa para a View
		$this->set('contratos', $pesquisa);
	}
	
	
	public function view( $id = null )
	{

		//Disponibiliza a var contratos
		self::getContratos($id = $id);
		
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
			if ($this->Contract->saveAll( $this->request->data ) )
			{
				$this->Session->setFlash('Novo contrato cadastrado com sucesso', 'default', array('class' => 'success'), 'flash');
				$this->redirect(array('action' => 'view', $id));
			}
		}

		//Disponibiliza através da var points todos os Pontos
		$this->set('points', $this->Contract->Event->Point->find('list'));

		//Disponibiliza através da var courses todos os Cursos
		$this->set('courses', $this->Contract->Course->find('list'));
		
	}
	
	public function edit( $id = null )
	{
		$this->Contract->id = $id;
		$result = $this->Contract->read();


		

		if ( $this->request->is('post')  )
		{
			if ( $this->Contract->saveAll( $this->request->data ))
			{
				echo 'teste';
				debug($this->request->data);
				exit;
				$this->Session->setFlash('TESTE');

				// $this->Session->setFlash('Atualização realizada com sucesso!', 'default', array('class' => 'success'), 'flash');
				// $this->redirect(array('action' => 'view', $result['Contract']['person_id']));
			}else
			{
				$this->Session->setFlash('Não salvou!');	
			}
		
		}else
		{
			$this->request->data = $result;
		
		}

		//Disponibilza o ID da Pessoa para popular o campo person_id
		$this->set('id', $id);

		//Disponibiliza através da var points todos os Pontos
		$this->set('points', $this->Contract->Event->Point->find('list'));

		//Disponibiliza através da var courses todos os Cursos
		$this->set('courses', $this->Contract->Course->find('list'));

	}
}
