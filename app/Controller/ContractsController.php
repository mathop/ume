<?php

	class ContractsController extends AppController
	{

		public function index( )
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
		
		// RequestHandler é utilizado no export()
		var $components = array('RequestHandler'); 

		public function export()
		{
			// http://bakery.cakephp.org/articles/view/4cb22536-75a8-44f1-8373-789cd13e7814/lang:por

            Configure::write('debug', 0); 

            $query = 'SELECT

						Person.id id_do_sistema,
						Person.name nome,
						Person.phone telefone,
						Person.mobile celular,
						Person.customize_payment dia_de_pagamento,
						Person.email,
						Person.cpf,
						Person.rg,
						Person.date_of_birth data_de_aniversario,
						Person.observation observacao_da_pessoa,
						PersonType.name pessoa_tipo,
						Branch.name filial,
						Address.street rua,
						Address.number numero,
						Address.complement complemento,
						Address.neighborhood bairro,
						City.name cidade,
						Contract.bank_num identificacao_no_banco,
						Contract.year ano,
						Contract.semester semestre,
						Contract.date_of_execution data_de_inicio,
						Contract.date_of_closing data_de_fim,
						Contract.date_rescinded data_de_rescisao,
						Contract.observation observacao_do_contrato,
						EmbarqueIdaPoint.name embarque_ida,
						DesembarqueIdaPoint.name desembarque_ida,
						EmbarqueVoltaPoint.name embarque_volta,
						DesembarqueVoltaPoint.name desembarque_volta

					FROM 

						contracts Contract

						INNER JOIN people Person ON (Person.id = Contract.person_id)
						INNER JOIN person_types PersonType ON (PersonType.id = Person.person_type_id)
						INNER JOIN branches Branch ON (Branch.id = Person.branch_id)
						INNER JOIN addresses Address ON (Address.person_id = Person.id)
						INNER JOIN cities City ON (City.id = Address.city_id)
						INNER JOIN events EmbarqueIdaEvent ON (Contract.id = EmbarqueIdaEvent.contract_id AND EmbarqueIdaEvent.event_type_id = 1)
						INNER JOIN events DesembarqueIdaEvent ON (Contract.id = DesembarqueIdaEvent.contract_id AND DesembarqueIdaEvent.event_type_id = 2)
						INNER JOIN events EmbarqueVoltaEvent ON (Contract.id = EmbarqueVoltaEvent.contract_id AND EmbarqueVoltaEvent.event_type_id = 3)
						INNER JOIN events DesembarqueVoltaEvent ON (Contract.id = DesembarqueVoltaEvent.contract_id AND DesembarqueVoltaEvent.event_type_id = 4)
						INNER JOIN points EmbarqueIdaPoint ON (EmbarqueIdaPoint.id = EmbarqueIdaEvent.point_id)
						INNER JOIN points DesembarqueIdaPoint ON (DesembarqueIdaPoint.id = DesembarqueIdaEvent.point_id)
						INNER JOIN points EmbarqueVoltaPoint ON (EmbarqueVoltaPoint.id = EmbarqueVoltaEvent.point_id)
						INNER JOIN points DesembarqueVoltaPoint ON (DesembarqueVoltaPoint.id = DesembarqueVoltaEvent.point_id)

					WHERE

						Contract.active = 1';

            $data = $this->Contract->query($query);
           	
			$headers = array
            (
                'Person' => array
                ( 
					'id_do_sistema' => 'id_do_sistema',
					'nome' => 'nome',
					'telefone' => 'telefone',
					'celular' => 'celular',
					'dia_de_pagamento' => 'dia_de_pagamento',
					'email' => 'email',
					'cpf' => 'cpf',
					'rg' => 'rg',
					'data_de_aniversario' => 'data_de_aniversario',
					'observacao_da_pessoa' => 'observacao_da_pessoa'
				),

				'PersonType' => array
				(
					'pessoa_tipo' => 'pessoa_tipo'
				),

				'Branch' => array
				(
					'filial' => 'filial'
				),

				'Address' => array
				(
					'rua' => 'rua',
					'numero' => 'numero',
					'complemento' => 'complemento',
					'bairro' => 'bairro'
				),

				'City' => array
				(
					'cidade' => 'cidade'
				),

				'Contract' => array
				(
					'identificacao_no_banco' => 'identificacao_no_banco',
					'ano' => 'ano',
					'semestre' => 'semestre',
					'data_de_inicio' => 'data_de_inicio',
					'data_de_fim' => 'data_de_fim',
					'data_de_rescisao' => 'data_de_rescisao',
					'observacao_do_contrato' => 'observacao_do_contrato'
				),

				'EmbarqueIdaPoint' => array
				(
					'embarque_ida' => 'embarque_ida'
				),

				'DesembarqueIdaPoint' => array
				(	
					'desembarque_ida' => 'desebarque_ida'
				),

				'EmbarqueVoltaPoint' => array
				(	
					'embarque_volta' => 'embarque_volta'
				),

				'DesembarqueVoltaPoint' => array
				(	
					'desembarque_volta' => 'desembarque_volta'
				)
			); 

            array_unshift($data, $headers);

            $this->set(compact('data')); 
		}

		public function export2()
		{			
			// http://bakery.cakephp.org/articles/view/4cb22536-75a8-44f1-8373-789cd13e7814/lang:por

			/**
			* COLOCAR DEBUG 0 DEPOIS
			*/
            Configure::write('debug', 0);
            
            $query = 'SELECT
							Person.id id_do_sistema,
							Person.name nome,
							Person.cpf,
							Person.rg,
							Course.name curso,
							DesembarqueIdaPoint.name faculdade

						FROM
							contracts Contract

							INNER JOIN people Person ON (Person.id = Contract.person_id)
							INNER JOIN events DesembarqueIdaEvent ON (Contract.id = DesembarqueIdaEvent.contract_id AND DesembarqueIdaEvent.event_type_id = 2)
							INNER JOIN points DesembarqueIdaPoint ON (DesembarqueIdaPoint.id = DesembarqueIdaEvent.point_id)
							INNER JOIN courses Course ON (Course.id = Contract.course_id)
						WHERE
							Contract.active = 1';

            $data = $this->Contract->query( $query );
            
            $headers = array
            (
            	'Person' => array
            	(
            		'id_do_sistema' => 'id_do_sistema',
            		'nome' => 'nome',
            		'cpf' => 'cpf',
            		'rg' => 'rg'
            	),

            	'Course' => array
            	(
            		'curso' => 'curso'
            	),

            	'DesembarqueIdaPoint' => array
            	(
            		'faculdade' => 'faculdade'
            	)
            );

            array_unshift($data, $headers);

            $this->set(compact('data')); 
		}
	}
