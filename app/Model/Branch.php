<?php

	class Branch extends AppModel{
	
		// public $name = 'Branches';
		
		public $hasMany = array('Person');
		
		public $validate = array('name' => array(
												'nameRuleOne' => array(
																	'rule' => 'notEmpty',
																	'message' => 'Digite o nome da nova filial.'
																),
												'nameRuleTwo' => array(
																	'rule' => 'isUnique',
																	'message' => 'Esta filial já existe.'
																),
												'nameRuleThree' => array(
																	'rule' => array('minLength', 3),
																	'message' => 'Digite um nome de filial com no mínimo 3 caracteres.'
																),
												'nameRuleFour' => array(
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