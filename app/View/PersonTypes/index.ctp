<?php

	//pr($person_types);

	
	echo '<table> <tr><th>ID</th><th>Desc</th></tr>';
	
	
	foreach ( $person_types as $person_type ){
	
		echo '<tr><td>' . $person_type['PersonType']['id'] . '</td><td>' . $person_type['PersonType']['name'] . '</td></tr>';
	
	}

	echo '</table>';
	
	echo '<br /><br />';
	echo $this->Html->link('Cadastrar', array('action' => 'add'));
	
?>