<?php

	echo '<p>' . $this->Html->link('Cadastrar cursos', array('action' => 'add')) . '</p>';
	echo '<p>' . $this->Html->link('Listar cursos', array('action' => 'view')) . '</p>';

	echo '<p></p>';
	echo '<p>' . $this->Html->link('Voltar', array('controller' => '')) . '</p>';

?>