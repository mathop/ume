<?php
	
	class Person extends AppModel{
		
		public $belongsTo = array('Branch', 'PersonType');
		
		public $hasOne = array
		(
			'Address' => array
			(
				'dependent' => true
			)
		);
		
		public $hasMany = array('Contract');
		
		public $validate = array
		(
			'branch_id' => array
			(
				'rule' => 'notEmpty',
				'message' => 'Escolha uma filial.'
			),
		
			'name' => array
			(
				'rule-1' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Digite o nome.'
				),
				
				'rule-2' =>  array
				(
					'rule' => 'isUnique',
					'message' => 'Já cadastrado.'
				),

				'rule-3' => array
				(
					'rule' => array('minLength', 4),
					'message' => 'Nome muito curto.'
				)
			),
				
			'phone' => array
			(
				'rule' => '/^\([0-9]{2}\) [0-9]{4}\-[0-9]{4}$/',
				'allowEmpty' => true,
				'message' => 'Telefone inválido, exemplo de telefone válido: (11) 1234-1234.'
			),

			'mobile' => array
			(
				'rule' => '/^\([0-9]{2}\) [0-9]{4,5}\-[0-9]{4}$/',
				'allowEmpty' => true,
				'message' => 'Celular inválido, exemplo de celular válido: (11) 97123-1234.'
			),

			'email' => array
			(
				'rule' => 'email',
				'allowEmpty' => true,
				'message' => 'Digite um e-mail válido.'
			),

			'cpf' => array
			(
				
				'rule-1' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Digite o CPF.'
				),

				'rule-2' => array
				(
					'rule' => 'isUnique',
					'message' => 'CPF já cadastrado.'
				),


				'rule-3' => array
				(
					'rule' => 'validarCpf',
					'message' => 'CPF Inválido.'					
				)
			),

			'rg' => array
			(
				'rule-1' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Digite o RG.'
				),

				'rule-2' => array
				(
					'rule' => array('between', 4, 15),
					'message' => 'Digite um RG válido.'
				)
			),

			'date_of_birth' => array
			(
				'rule-1' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Digite a data de nascimento.'
				),

				'rule-2' => array
				(
					'rule' => array('date', 'dmy'),
					'message' => 'Data inválida.'
				),

				'rule-3' => array
				(
					'rule' => array('minLength', 10),
					'message' => 'Data inválida. Exemplo válido: DD/MM/AAAA.'
				)
			)
		);


		public function validarCpf()
		{
			$cpf = $this->data['Person']['cpf'];
		
			// Validando a máscara
			if ( !preg_match('/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/', $cpf) )
			{
				return false;
			}

			//retirando pontos e traços
			$cpf = str_replace('.', '', $cpf);
			$cpf = str_replace('-', '', $cpf);

			// Algoritmo para validação de cpf estudado em: http://imasters.com.br/artigo/2410/javascript/algoritmo-do-cpf
			$zero = $cpf[0];
			$um = $cpf[1];
			$dois = $cpf[2];
			$tres = $cpf[3];
			$quatro = $cpf[4];
			$cinco = $cpf[5];
			$seis = $cpf[6];
			$sete = $cpf[7];
			$oito = $cpf[8];
			$nove = $cpf[9];
			$dez = $cpf[10];

			// Calculando código verificador 1
			$soma = $zero*10 + $um*9 + $dois*8 + $tres*7 + $quatro*6 + $cinco*5 + $seis*4 + $sete*3 + $oito*2;

			$restoUm = $soma % 11;
			if ( $restoUm < 2 )
			{
				$verificadorUm = 0;
			}
			else
			{
				$verificadorUm = 11 - $restoUm;
			}
			
			// Calculando código verificador 2
			$soma2 = $zero*11 + $um*10 + $dois*9 + $tres*8 + $quatro*7 + $cinco*6 + $seis*5 + $sete*4 + $oito*3 + $verificadorUm*2;

			$restoDois = $soma2 % 11;

			if ( $restoDois < 2 )
			{
				$verificadorDois = 0;
			}
			else
			{
				$verificadorDois = 11 - $restoDois;
			}			

			$cpfCorreto = $zero . $um . $dois . $tres . $quatro . $cinco . $seis . $sete . $oito . $verificadorUm . $verificadorDois;			

			if ( $cpfCorreto != $cpf )
			{
				return false;
			}

			return true;
		}

		public function beforeSave()
		{
			// Data de Nascimento 
			if ( isset($this->data['Person']['date_of_birth']) )
			{
				$dtNascimento = $this->data['Person']['date_of_birth'];

				if ( strlen( $dtNascimento ) != 10 )
				{
					return false;	
				}

				$this->data['Person']['date_of_birth'] = substr($dtNascimento, 6, 4) . '-' . substr($dtNascimento, 3, 2) . '-' . substr($dtNascimento, 0, 2);

			}

			return true;
		}
	}
