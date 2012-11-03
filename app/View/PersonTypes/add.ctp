<?php

	
	echo $this->Form->create('PersonType', array('action' => 'add'));
	
	echo $this->Form->input('name');
	
	echo $this->Form->end('Cadastrar');
	
	echo $this->Html->link('Listar', array('action' => 'index'));


?>