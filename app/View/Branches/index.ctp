<?php

	echo '<h1>Filiais cadastradas:</h1><br />';
	echo '<table>';
	echo '<tr> <th>ID</th><th>Name</th><th>Ações</th> </tr>';

	foreach ( $branches as $branch ){
	
		echo '<tr><td>' . $branch['Branch']['id'] . '</td><td>' . $branch['Branch']['name'] .'</td><td>'.
			
			$this->Html->link('Alterar', array('action' => 'edit', $branch['Branch']['id']))
		
		. ' | ' . 

			$this->Html->link('Excluir', array('action' => 'delete', $branch['Branch']['id']))

		. '</td></tr>';
	
	}
	echo '</table>';
	
	echo $this->Html->link('Cadastrar uma nova filial', array('action' => 'add'));
	
?>