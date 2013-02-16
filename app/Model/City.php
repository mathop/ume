<?php


	class City extends AppModel{

		public $hasMany = array('Address');


		public $validate = array
						  (
						   	'name' => array
						   	 (
						   	 	'notEmpty' => array
						   	 	(
						   	 		'rule' => 'notEmpty',
						   	 		'message' => 'Preenchimento obrigatório.'
						   	 	),

						   	 	'isUnique' => array
						   	 	(
						   	 		'rule' => 'isUnique',
						   	 		'message' => 'Cidade já cadastrada.'
						   	 	),

						   	 	'minLength' => array
						   	 	(
						   	 		'rule' => array('minLength', '3'),
						   	 		'message' => 'O cadastro só será efetivado se houver no mínimo 3 caracteres.'
						   	 	)
						   	 )
					      );

	}


?>
