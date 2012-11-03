<?php

	//debug($person);
	
	echo '<table>';
	
	echo '<tr><td>ID: ' . $person['Person']['id'] . '</td></tr>';
	echo '<tr><td>Name: ' . $person['Person']['name'] . '</td></tr>';
	echo '<tr><td>Phone: ' . $person['Person']['phone'] . '</td></tr>';
	echo '<tr><td>Mobile: ' . $person['Person']['mobile'] . '</td></tr>';
	echo '<tr><td>Customize Payment: ' . $person['Person']['customize_payment'] . '</td></tr>';
	echo '<tr><td>Person Type: ' . $person['PersonType']['name'] . '</td></tr>';
	echo '<tr><td>Branch: ' . $person['Branch']['name'] . '</td></tr>';
	echo '<tr><td>Street: ' . $person['Address']['street'] . '</td></tr>';
	echo '<tr><td>Number: ' . $person['Address']['complement'] . '</td></tr>';
	echo '<tr><td>Neighborhood: ' . $person['Address']['neighborhood'] . '</td></tr>';
	echo '<tr><td>City: ' . $person['Address']['city'] . '</td></tr>';
	
	
	echo '</table>';
	
	echo $this->Html->link('Listar Pessoas', array('action' => 'index'));
	
?>