<?php

	class Course extends AppModel{


		public $hasMany = array('Contract');

		public $validate = array
		(
			'name' => array
			(	//VAZIO?
				'notEmpty' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Preenchimento obrigatório.'
				),
				//É ÚNICO?
				'isUnique' => array
				(
					'rule' => 'isUnique',
					'message' => 'Curso já cadastrado.'
				),
				//MÍNIMO DE CARACTERES
				'minLength' => array
				(
					'rule' => array('minLength', '3'),
					'message' => 'O cadastro só será efetivado se houver no mínimo 3 caracteres'
				)
			)
		);

	}
