<?php 

	echo '<h1>Evento Tipos</h1>';
	echo '<ul>';
	
	foreach ( $resultado as $resultado ) {

		echo '<li>' . $resultado['EventType']['name'] . '</li>';
	}

	echo '</ul>';
	echo '<p></p>';
	echo '<p>' . $this->Html->link('Voltar', array('controller' => '')) . '</p>';

?>
