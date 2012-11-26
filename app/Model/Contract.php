<?php

	class Contract extends AppModel
	{
	
		public $belongsTo = array('Person', 'Course');

		public $hasMany = array('Event');

		//validaçao dos campos
		public $validate = array
		(
			//ANO
			'year' => array
			(
				'rule1' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Preenchimento obrigatório.'														
				),

				'rule2' => array
				(
					'rule' => 'checkOnCreate',
					'on' => 'create'
				),

				'rule3' => array
				(
					'rule' => 'checkOnUpdate',
					'on' => 'update'
				)
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


			// Data da rescisão, se estiver vazio okay, se não, deve ser no formato date dmy !!
			'date_rescinded' => array
			(
				'rule' => array('date', 'dmy'),
				'allowEmpty' => true,
				'message' => 'Digite uma data válida.'
			)

		);	

		// Antes de criar
		public function checkOnCreate()
		{
			// Se o validador ao final deste método continuar valendo 1 retorne TRUE, ou seja, valide !
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


			//verificando se existe ano e semestre cadastrado para o cliente
			$resultado = $this->find('count', array
			(
				'conditions' => array
				(
					'Contract.year' => $this->data['Contract']['year'],
					'Contract.person_id' => $this->data['Contract']['person_id'],
					'Contract.semester' => $this->data['Contract']['semester'],
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

			// Se existem pare por aqui
			if ( $validador == 0 )
			{
				return false;
			}
		
			//Se não retorne true !
			return true;
		}

		/*
			public function validateYear($data)
			{
				$year = $data['year'];

				if (strlen($year) == 2)
				{
					$year += 2000;
				}

				if (!is_integer($year) or $year < 2000)
				{
					return false;
				}
			}

		*/

		public function checkOnUpdate()
		{
			return true;	
		}

		public function beforeSave( ) {

			// Se a variável for passada faça isso
			if ( isset( $this->data['Contract']['date_of_execution'] ) )
			{
				// Utilizando uma var com nome menor
				$dt = $this->data['Contract']['date_of_execution'];

				// Se passarem 31/12/12 converta para 31-12-2012
				if ( strlen( $dt ) == 8 )
				{
					$dt = substr($dt, 0,2) . '-' . substr($dt, 3,2) . '-20' . substr($dt, 6,2);
				}

				// Exemplo: Entrada -> 31-12-2012 ... Saída 2012-12-31
				$this->data['Contract']['date_of_execution'] = substr($dt, 6, 4).'-'.substr($dt, 3, 2).'-'.substr($dt, 0, 2);

			}

			// Se a variável for passada faça isso
			if ( isset( $this->data['Contract']['date_of_closing'] ) )
			{
				// Utilizando uma var com nome menor
				$dt = $this->data['Contract']['date_of_closing'];

				// Se passarem 31/12/12 converta para 31-12-2012
				if ( strlen( $dt ) == 8 )
				{
					$dt = substr($dt, 0, 2) . '-' . substr($dt, 3, 2) . '-20' . substr($dt, 6, 2);
				}

				// Exemplo: Entrada -> 31-12-2012 ... Saída 2012-12-31
				$this->data['Contract']['date_of_closing'] = substr($dt, 6, 4) . '-' . substr($dt, 3, 2) . '-' . substr($dt, 0, 2) ;

			}


			return true;
		}

	}	
?>
