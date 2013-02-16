<?php

	class PersonType extends AppModel{


		public $hasMany = array('Person');


		public $validate = array
		(
			'name' => array
			(
				'notEmpty' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Campo vazio'
				),

				'isUnique' => array
				(
					'rule' => 'isUnique',
					'message' => 'Valor já cadastrado'
				)
			)
		);

	}

?>