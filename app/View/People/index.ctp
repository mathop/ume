<?php

	echo $this->Form->create('Person');
	echo $this->Form->input('Person.name');
	echo $this->Form->input('Person.cpf');
	echo $this->Form->end('Procurar');

	echo '<h1>Listando Pessoas</h1>';

	//pr($people);
	
	echo '<table>';

	echo '<tr><th>' . $this->paginator->sort('id') . '</th><th>' . $this->paginator->sort('name') . '</th><th>' . $this->paginator->sort('email') . '</th><th>Branch</th><th>Ações</th></tr>';
	
	foreach($people as $person){
	
		//echo '----------------------';
		//pr($person);
		
		echo '<tr><td>' . $person['Person']['id'] . '</td><td>' . $this->Html->link($person['Person']['name'], array('action' => 'view', $person['Person']['id'])) . '</td><td>' . $person['Person']['email'] . '</td><td>' . $person['Branch']['name'] . '</td><td>' . $this->Html->link('Editar', array('action' => 'edit', $person['Person']['id'])) . ' | Excluir | ' . $this->Html->link('Contratos', array('controller' => 'contracts', 'action' => 'view', $person['Person']['id'])) . '</td></tr>';
		//echo '----------------------';
	
	}
	
	echo '</table>';
	
	echo $this->paginator->prev('Anterior'); 
	
	echo ' | ';
	
	echo $this->paginator->numbers();
	
	echo ' | ';
	
	echo $this->paginator->next('Próximo');
	
	echo '<br />';
	echo '<br />';
	echo $this->Html->Link('Adicionar uma nova pessoa', array('action' => 'add'));
	echo '<p></p>';
	echo '<p>' . $this->Html->link('Voltar', array('controller' => '')) . '</p>';

	
?>