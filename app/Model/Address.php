<?php

	class Address extends AppModel
	{

		public $hasOne = array
		(
			'Person' => array
				(
					'dependent' => false
				)
		);

		public $belongsTo = array('City');

		public $validate = array
		(
			'city_id' => array
			(
				'notEmpty' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Escolha uma cidade.'
				)
			),

			'street' => array
			(
				'notEmpty' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Digite a rua.'
				),

				'minLength' => array
				(
					'rule' => array('minLength', 4),
					'message' => 'Digite uma rua válida.'
				)
			),

			'number' => array
			(
				'notEmpty' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Digite o número.'
				)
			),

			'neighborhood' => array
			(
				'notEmpty' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Digite o bairro.'
 				),

 				'minLength' => array
 				(
 					'rule' => array('minLength', 4),
 					'message' => 'Digite um bairro válido.'
 				)
			)
		);
	}
