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
					)
				);


		public function beforeSave(){


			// se no formulário estiver marcado ativo
			if ( $this->data['Contract']['active'] == 1 ) {

				//conta quantos contratos existem ativos da pessoa
				$pequisa = $this->find('count', array
												(
													
												'conditions' => array
																	(
																
																		'Contract.active' => '1',
															    		'Contract.person_id' => $this->data['Contract']['person_id']
																	)
												)
									   );
				// se existir algum contrato ativo retorna false,
				if ( $pequisa > 0 ) {

					//avisa o usuário do erro
					$this->invalidate('active', 'Já existem contratos ativos deste cliente.');
					return false;
				}

			}


			//verificando se existe ano e semestre cadastrado para o cliente
			$resultado = $this->find('count', array
									(
										'conditions' => array
										(
											'Contract.year' => $this->data['Contract']['year'],
											'Contract.person_id' => $this->data['Contract']['person_id'],
											'Contract.semester' => $this->data['Contract']['semester']
										),

										'fields' => array
										(
											'year', 'person_id', 'semester'
										)
									));
			
			// se houverem cadastro para o ano e semestre do cliente avise para o usuário
			if ( $resultado > 0 ) {

				$this->invalidate('year', 'Já existe cadastro para o ano e semestre informado.');
				$this->invalidate('semester', 'Já existe cadastro para o ano e semestre informado.');
				return false;
			}

			return true;

		}	
	
	}

?>
