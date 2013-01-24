<?php

	echo '<h1>Início</h1>'; 
	echo '<p>' . $this->Html->link('Pessoas', array('controller' => 'people', 'action' => 'index')) . '</p>';
	echo '<p>' . $this->Html->link('Filiais', array('controller' => 'branches', 'action' => 'index')) . '</p>';
	echo '<p>' . $this->Html->link('Cidades', array('controller' => 'cities', 'action' => 'index')) . '</p>';
	echo '<p>' . $this->Html->link('Cursos', array('controller' => 'courses', 'action' => 'index')) . '</p>';
	echo '<p>' . $this->Html->link('Evento Tipos', array('controller' => 'event_types', 'action' => 'index')) . '</p>';
	echo '<p>' . $this->Html->link('Relatórios', array('controller' => 'contracts', 'action' => 'index')) . '</p>';
	echo '<p>' . $this->Html->link('Pontos', array('controller' => 'points', 'action' => 'index')) . '</p>';

?>
