<?php

	class Course extends AppModel{


		public $validate = array
		(
			'name' => array
			(	//VAZIO?
				'rule1' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Preenchimento obrigatório.'
				),
				//É ÚNICO?
				'rule2' => array
				(
					'rule' => 'isUnique',
					'message' => 'Curso já cadastrado.'
				),
				//MÍNIMO DE CARACTERES
				'rule3' => array
				(
					'rule' => array('minLength', '3'),
					'message' => 'O cadastro só será efetivado se houver no mínimo 3 caracteres'
				)
			)
		);

	}
