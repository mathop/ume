<?php

	class Address extends AppModel
	{
	
		public $hasOne = array('Person');
		
		public $belongsTo = array('City');

		public $validate = array
		(
			'city_id' => array
			(
				'rule' => 'notEmpty',
				'message' => 'Escolha uma cidade.'
			),

			'street' => array
			(
				'rule-1' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Digite a rua.'
				),

				'rule-2' => array
				(
					'rule' => array('minLength', 4),
					'message' => 'Digite uma rua válida.'
				)
			),

			'number' => array
			(
				'rule-1' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Digite o número.'
				)
			),

			'neighborhood' => array
			(
				'rule-1' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Digite o bairro.'
 				),

 				'rule-2' => array
 				(
 					'rule' => array('minLength', 4),
 					'message' => 'Digite um bairro válido.'
 				)
			)
		);
	}
