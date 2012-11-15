<?php


	class Address extends AppModel{
	
	
		public $hasOne = array('Person');
		
		public $belongsTo = array('City');

	
	}


?>