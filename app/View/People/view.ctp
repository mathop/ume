<?php
	
	echo '<table>';
	
		echo '<tr><td><strong>id:</strong> ' . $person['Person']['id'] . '</td></tr>';
		echo '<tr><td><strong>Nome:</strong> ' . $person['Person']['name'] . '</td></tr>';
		echo '<tr><td><strong>Telefone:</strong> ' . $person['Person']['phone'] . '</td></tr>';
		echo '<tr><td><strong>Celular:</strong> ' . $person['Person']['mobile'] . '</td></tr>';
		echo '<tr><td><strong>Email:</strong> ' . $person['Person']['email'] . '';
		echo '<tr><td><strong>CPF:</strong> ' . $person['Person']['cpf'] . '';
		echo '<tr><td><strong>RG:</strong> ' . $person['Person']['rg'] . '';
		echo '<tr><td><strong>Data de nascimento:</strong> ' . date('d/m/Y', strtotime($person['Person']['date_of_birth'])) . '';
		echo '<tr><td><strong>Observações:</strong> ' . $person['Person']['observation'] . '';
		echo '<tr><td><strong>Rua:</strong> ' . $person['Address']['street'] . '</td></tr>';
		echo '<tr><td><strong>Número:</strong> ' . $person['Address']['number'] . '</td></tr>';
		echo '<tr><td><strong>Complemento:</strong> ' . $person['Address']['complement'] . '</td></tr>';
		echo '<tr><td><strong>Bairro:</strong> ' . $person['Address']['neighborhood'] . '</td></tr>';
		echo '<tr><td><strong>Cidade:</strong> ' . $person['Address']['City']['name'] . '</td></tr>';
		echo '<tr><td><strong>Filiado em:</strong> ' . $person['Branch']['name'] . '</td></tr>';
		echo '<tr><td><strong>Tipo de Pessoa:</strong> ' . $person['PersonType']['name'] . '</td></tr>';

	
	echo '</table>';
	
	echo $this->Html->link('Listar Pessoas', array('action' => 'index'));
	
?>
