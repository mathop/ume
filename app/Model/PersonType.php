<?php

	class PersonType extends AppModel{

	
		public $hasMany = array('Person');
		

		public $validate = array('name' => array('rule1' => array('rule' => 'notEmpty',
																  'message' => 'Campo vazio'
																  ),
												 'rule2' => array('rule' => 'isUnique',
																  'message' => 'Valor já cadastrado')));

	
	}
	
?>