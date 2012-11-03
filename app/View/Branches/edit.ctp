<?php

	echo $this->Form->create('Branch', array('action' => 'edit'));
	
	echo $this->Form->input('name');
	echo $this->Form->hidden('id');
	
	echo $this->Form->end('Atualizar');

?>