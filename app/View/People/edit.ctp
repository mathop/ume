<?php
	
	echo $this->Form->create('Person', array('action' => 'edit'));
	
		echo $this->Form->input('Person.id');
		echo $this->Form->input('Person.name');
		echo $this->Form->input('Person.phone');
		echo $this->Form->input('Person.mobile');
		echo $this->Form->input('Person.customize_payment');
		echo $this->Form->input('Person.email');
		echo $this->Form->input('Person.person_type_id', array('options' => array($person_types)));
		echo $this->Form->input('Person.branch_id', array('options' => array($branches)));
		
		echo $this->Form->input('Address.id');
		echo $this->Form->input('Address.street');
		echo $this->Form->input('Address.number');
		echo $this->Form->input('Address.complement');
		echo $this->Form->input('Address.neighborhood');
		echo $this->Form->input('Address.city');
	
	echo $this->Form->end('Editar');

?>