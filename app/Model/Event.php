<?php

	class Event extends AppModel
	{
		public $belongsTo = array('Point','EventType','Contract');
	}