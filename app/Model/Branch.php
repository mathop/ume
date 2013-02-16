<?php

	class Branch extends AppModel{

		// public $name = 'Branches';

		public $hasMany = array('Person');

		public $validate = array('name' => array(
												'notEmpty' => array(
																	'rule' => 'notEmpty',
																	'message' => 'Digite o nome da nova filial.'
																),
												'isUnique' => array(
																	'rule' => 'isUnique',
																	'message' => 'Esta filial já existe.'
																),
												'minLength' => array(
																	'rule' => array('minLength', 3),
																	'message' => 'Digite um nome de filial com no mínimo 3 caracteres.'
																),
												'maxLength' => array(
																	'rule' => array('maxLength', 40),
																	'message' => 'Insira um nome de filial com até 40 caracteres.'
																)/*
												'nameRuleFive' => array(
																	'rule' => '/^[a-zA-Z0-9 ]+$/',	 //este código não aceita acentuação
																	'message' => 'Digite apenas letras e números.'
																)*/
												)
								);


	}



?>