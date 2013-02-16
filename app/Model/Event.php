<?php

	class Event extends AppModel
	{
		public $belongsTo = array('Point','EventType','Contract');

		public $validate = array
		(
			'point_id' => array
			(
				'notEmpty' => array
				(
					'rule' => 'notEmpty',
					'message' => 'Escolha um ponto.'
				)
			)
		);
	}