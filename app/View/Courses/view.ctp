<?php 


	echo '<h1>Cursos</h1>';
	echo '<ul>';
	
	foreach ( $resultado as $resultado ) {

		echo '<li>' . $resultado['Course']['name'] . ' | ' . $this->Html->link('Alterar nome', array('action' => 'edit', $resultado['Course']['id'])) . '</li>';
	}

	echo '</ul>';
	echo '<p></p>';
	echo '<p>' . $this->Html->link('Voltar', array('action' => 'index')) . '</p>';

?>
