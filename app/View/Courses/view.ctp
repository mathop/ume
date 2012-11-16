<?php 


	echo '<h1>Cursos</h1>';
	echo '<ul>';
	
	foreach ( $resultado as $resultado ) {

		echo '<li>' . $resultado['Course']['name'] . '</li>';
	}

	echo '</ul>';
	echo '<p></p>';
	echo '<p>' . $this->Html->link('Voltar', array('action' => 'index')) . '</p>';

?>
