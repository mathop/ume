<?php

	echo '<h1>Cidades cadastradas</h1>';
	
	echo '<ul>';

	foreach ( $cidades as $cidade ){

		echo '<li>' . $cidade['City']['name'] . '</li>';
	}

	echo '</ul>';

	echo '<p></p>';

	echo $this->Html->link('Voltar', array('action' => 'index'))

?>