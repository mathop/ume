<?php
	
	
	class Person extends AppModel{
	
		// public $name = 'People';
		
		public $belongsTo = array('Branch', 'PersonType');
		
		public $hasOne = array('Address');
		
		public $hasMany = array('Contract');
		
		public $validate = array
		(
			'branch_id' => array
			(
				'rule' => 'notEmpty',
				'message' => 'teste'
			),
		
			'name' => array
			(
				'teste1' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Campo de preenchimento obrigatório.'
				),
				
				'teste2' =>  array
				(
					'rule' => 'isUnique',
					'message' => 'Já cadastrado.'
				)
			),
			
			'customize_payment' => array
			(
				'teste3' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Campo de preenchimento obrigatório.'
				)
			),
			
			// C:\wamp\www\ume\lib\Cake
			
			'phone' => array
			(
				'rule' => '/^[0-9]{8,11}$/',
				'allowEmpty' => true,
				'message' => 'Informe um telefone válido.'
			)
		);
	}
