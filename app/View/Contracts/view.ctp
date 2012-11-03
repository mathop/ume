<?php


	//debug($results);

	echo '<h2>Contratos</h2>';
	echo '<br />';
	
	echo '<p>Nome: ' . $results['Person']['name'] . '</p>';
	
	
	echo '<br />';
	
	if ( empty($results['Contract']) ){
		
			echo '<p>Nenhum contrato localizado</p>';		
	}
	
	
	foreach ( $results['Contract'] as $result ){
		echo '<table>';
		//debug($result);
		
		
		//echo '<p>-----------</p>';
		
		echo '<tr><td><strong>Identificação no Banco:</strong> ' . $result['bank_num'] . '</tr></td>';
		//echo '<tr><td>' . $result['person_id'] . '</tr></td>';
		echo '<tr><td><strong>Ano:</strong> ' . $result['year'] . '</tr></td>';
		echo '<tr><td><strong>Semestre:</strong> ' . $result['semester'] . '</tr></td>';
		
		
		if ( $result['active'] ){
		
			echo '<tr><td><strong>Status:</strong> Ativo</td></tr>';
		
		}else{
		
			echo '<tr><td><strong>Status:</strong> -</td></tr>';
			
		}
		
		echo '<tr><td><strong>Ações:</strong> ' . $this->Html->link('Editar', array('action' => 'edit', $result['id'])) .' | Excluir</td></tr>';
		//echo '<p>-----------</p>';
		echo '</table>';
		
	}

	echo '<p>&nbsp;</p>';
	echo '<h2>Adicionar novo contrato</h2>';
	echo $this->Form->create('Contract', array('url' => "/contracts/add/$id"));
	echo $this->Form->hidden('Contract.person_id', array('value' => $id));
	echo $this->Form->input('Contract.bank_num');
	echo $this->Form->input('Contract.year');
	echo $this->Form->input('Contract.semester');
	//echo $this->Form->input('Contract.active');
	echo $this->Form->input('Contract.active', array('type' => 'checkbox'));
	echo $this->Form->end('Salvar contrato');

?>