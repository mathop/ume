<?php

	class Contract extends AppModel{
	
		public $belongsTo = array('Person', 'Course');

		public $hasMany = array('Event');

		//validaçao dos campos
		public $validate = array
		(
			//ANO
			'year' => array
			(
				'regra1' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Preenchimento obrigatório.'														
				),
			),
			
			//SEMESTRE
			'semester' => array
			(
				'rule' => 'notEmpty',
				'message' => 'Preenchimento obrigatório.'
			),

			//IDENTIFICAÇÃO DO BANCO
			'bank_num' => array
			(
				'rule' => 'notEmpty',
				'message' => 'Preenchimento obrigatório.'					
			),

			//Datas
			'date_of_execution' => array
			(
				'rule1' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Digite uma data.'
				),

				'rule2' => array
				(
					'rule' => array('date', 'dmy'),
					'message' => 'Digite uma data válida.'
				)
			),

			'date_of_closing' => array
			(

				'rule1' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Digite uma data.'
				),

				'rule2' => array
				(
					'rule' => array('date', 'dmy'),
					'message' => 'Digite uma data válida.'
				)
					
			),

			'date_rescinded' => array
			(
				'rule' => array('date', 'dmy'),
				'message' => 'Digite uma data válida.',
				'allowEmpty' => true
			),

			'course_id' => array
			(
				'rule' => 'notEmpty',
				'message' => 'Escolha um curso.'
			),


			'date_rescinded' => array
			(
				'rule1' => array
				(
					'rule' => 'checkOnCreate',
					'on' => 'create',
					'message' => 'Caiu aqui ! 1'
				),
				'rule2' => array
				(
					'rule' => 'notEmpty',
					'on' => 'update',
					'message' => 'Caiu aqui !'
				)
			)
		);	

		// Antes de criar
		public function checkOnCreate($data)
		{
			// Se o validador ao final deste método esta var continuar valendo 1 retorne TRUE, ou seja, valide !
			$validador = 1;

			// Se no formulário estiver marcado ativo
			if ( $this->data['Contract']['active'] == 1 )
			{

				// Conta quantos contratos existem ativos da pessoa
				$pequisa = $this->find('count', array
				(
					'conditions' => array
					(
						'Contract.active' => '1',
						'Contract.person_id' => $this->data['Contract']['person_id']
					)
				));


				// Se existir algum contrato ativo retorna false,
				if ( $pequisa > 0 )
				{

					// Avisa o usuário do erro
					$this->invalidate('active', 'Já existem contratos ativos deste cliente.');
					
					// Existe erro
					$validador = 0;
				}

			}


			//verificando se existe ano e semestre cadastrado para o cubrid_client_encoding()
			$resultado = $this->find('count', array
			(
				'conditions' => array
				(
					'Contract.year' => $this->data['Contract']['year'],
					'Contract.person_id' => $this->data['Contract']['person_id'],
					'Contract.semester' => $this->data['Contract']['semester'],
					'Contract.id !=' => $this->data['Contract']['id']
				),



				'fields' => array
				(
					'year', 'person_id', 'semester'
				)
			));

			// se houverem cadastro para o ano e semestre do cliente avise para o usuário
			if ( $resultado > 0 )
			{
				//Avisando o usuário sobre os erros
				$this->invalidate('year', 'Já existe cadastro para o ano e semestre informado.');
				$this->invalidate('semester', 'Já existe cadastro para o ano e semestre informado.');
				
				//Existe erro
				$validador = 0;
			}

			// Se existem erros faça isso
			if ( $validador == 0 )
			{
				return false;
			}
		
			//Se não retorne true !
			return true;
		}


		public function beforeSave( ) { }	
	
	}

?>
