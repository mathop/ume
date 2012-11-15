<?php


	echo '<h1>Adicionar cidade</h1>';
	echo $this->Form->create('City', array('action' => 'add'));

		echo $this->Form->input('name');

	echo $this->Form->end('Cadastrar');

	echo '<p></p>';

	echo $this->Html->link('Voltar', array('action' => 'index'));


?>