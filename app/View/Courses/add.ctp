<?php

	echo $this->Form->create('Course', array('action' => 'add'));
	echo $this->Form->input('name');
	echo $this->Form->end('Cadastrar');

	echo '<p>' . $this->Html->link('Voltar', array('action' => 'index')) . '</p>';

?>
