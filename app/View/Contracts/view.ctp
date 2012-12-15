<?php

	echo '<h2>Contratos</h2>';
	echo '<br />';
	echo '<p>Nome: ' . $contratos['Person']['name'] . '</p>';
	echo '<br />';
	
	if ( empty($contratos['Contract']) ){
		
			echo '<p>Nenhum contrato localizado</p>';		
	}
	
	
	foreach ( $contratos['Contract'] as $result )
	{	

		// Se na variável data de recisão vier conteúdo, modifique-o
		if (!empty($result['date_rescinded']))
		{
			$result['date_rescinded'] = date('d/m/Y', strtotime($result['date_rescinded']));
		}

		echo '<table>';	
		echo '<tr><td><strong>Identificação no Banco:</strong> ' . $result['bank_num'] . '</tr></td>';
		echo '<tr><td><strong>Ano:</strong> ' . $result['year'] . '</tr></td>';
		echo '<tr><td><strong>Semestre:</strong> ' . $result['semester'] . '</tr></td>';
		echo '<tr><td><strong>Início:</strong> ' . date('d/m/Y', strtotime($result['date_of_execution']))  . '</tr></td>';
		echo '<tr><td><strong>Fim:</strong> ' . date('d/m/Y', strtotime($result['date_of_closing'])) . '</tr></td>';
		echo '<tr><td><strong>Rescisão:</strong> ' . $result['date_rescinded'] . '</tr></td>';
		echo '<tr><td><strong>Curso</strong>: ' . $result['Course']['name'] . ' </tr></td>';
		echo '<tr><td><strong>Período</strong>: ' . $result['Period']['name'] . ' </tr></td>';
		echo '<tr><td><strong>Embarque Ida:</strong> ' . $result['Event'][0]['Point']['name'] . '</tr></td>';
		echo '<tr><td><strong>Desembarque Ida: </strong>' . $result['Event'][1]['Point']['name'] . '</tr></td>';
		echo '<tr><td><strong>Embarque Volta: </strong>' . $result['Event'][2]['Point']['name'] . '</tr></td>';
		echo '<tr><td><strong>Desembarque Volta: </strong>' . $result['Event'][3]['Point']['name'] . '</tr></td>';
		echo '<tr><td><strong>Observação: </strong>' . $result['observation'] . '</tr></td>';
		
		if ( $result['active'] ){
		
			echo '<tr><td><strong>Status:</strong> Ativo</td></tr>';
		
		}else{
		
			echo '<tr><td><strong>Status:</strong> -</td></tr>';
			
		}
		
		echo '<tr><td><strong>Ações:</strong> ' . $this->Html->link('Editar', array('action' => 'edit', $result['id'])) .' | Excluir</td></tr>';
		echo '</table>';

		echo '<p>&nbsp</p>';
		echo '<p>&nbsp</p>';

	}

	echo '<p>&nbsp;</p>';
	echo '<h2>Adicionar novo contrato</h2>';
	
	echo $this->Form->create('Contract', array('url' => "/contracts/add/$id"));

			echo $this->Form->hidden('Contract.person_id', array('value' => $id));
			echo $this->Form->input('Contract.bank_num', array('label' => 'Identificação no banco: '));
			echo $this->Form->input('Contract.year', array('label' => 'Ano: '));
			echo $this->Form->input('Contract.semester', array('label' => 'Semestre: '));
			echo $this->Form->input('Contract.date_of_execution', array('label' => 'Data de início do contrato: ', 'type' => 'text'));
			echo $this->Form->input('Contract.date_of_closing', array('label' => 'Data de término do contrato: ', 'type' => 'text'));
			// echo $this->Form->input('Contract.date_rescinded', array('label' => 'Data da rescisão do contrato: ', 'type' => 'text'));

			echo $this->Form->input('Event.0.event_type_id', array('type' => 'hidden', 'value' => 1));
			echo $this->Form->input('Event.0.point_id', array('label' => 'Embarque Ida:', 'options' => $points, 'empty' => 'Local >>'));

			echo $this->Form->input('Event.1.event_type_id', array('type' => 'hidden', 'value' => 2));
			echo $this->Form->input('Event.1.point_id', array('label' => 'Desembarque Ida:', 'options' => $points, 'empty' => 'Local >>'));

			echo $this->Form->input('Event.2.event_type_id', array('type' => 'hidden', 'value' => 3));
			echo $this->Form->input('Event.2.point_id', array('label' => 'Embarque Volta:', 'options' => $points, 'empty' => 'Local >>'));

			echo $this->Form->input('Event.3.event_type_id', array('type' => 'hidden', 'value' => 4));
			echo $this->Form->input('Event.3.point_id', array('label' => 'Desembarque Ida:', 'options' => $points, 'empty' => 'Local >>'));

			echo $this->Form->input('Contract.course_id', array('options' => $courses, 'empty' => 'Curso >>	', 'label' => 'Curso: '));
			echo $this->Form->input('Contract.period_id', array('options' => $periods, 'empty' => 'Período >> ', 'label' => 'Período: '));

			echo $this->Form->input('Contract.active', array('type' => 'checkbox', 'label' => 'Ativo'));

			echo $this->Form->input('Contract.observation', array('label' => 'Observações: ', 'rows' => '6'));
		
	echo $this->Form->end('Salvar contrato');
	
	echo $this->Html->link('Listar Pessoas', array('controller' => 'people', 'action' => 'index'));
	

?>