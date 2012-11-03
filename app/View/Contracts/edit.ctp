<?php

	//debug($result);
	
	echo $this->Form->create('Contract', array('action' => 'edit'));
		echo $this->Form->hidden('Contract.person_id');
		echo $this->Form->input('Contract.id');
		echo $this->Form->input('Contract.bank_num');
		echo $this->Form->input('Contract.year');
		echo $this->Form->input('Contract.semester');
		echo $this->Form->input('Contract.active', array('type' => 'checkbox'));
	echo $this->Form->end('Atualizar')

?>
