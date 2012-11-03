<?php

	
	
	
	echo $this->Form->create('Branch', array('action' => 'add'));
	
	echo $this->Form->input('name', array('label' => 'Insira o nome da nova filial:'));
	
	echo $this->Form->end('Cadastrar Filial');
	
	echo $this->Html->link('Listar filiais', array('action' => 'index'));
	
	



?>