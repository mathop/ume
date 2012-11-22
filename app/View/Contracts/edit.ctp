<?php

	//debug($result);
	
	echo $this->Form->create('Contract', array('action' => 'edit'));


			echo $this->Form->input('Contract.id');
			echo $this->Form->hidden('Contract.person_id');
			echo $this->Form->input('Contract.bank_num', array('label' => 'Identificação no banco: '));
			echo $this->Form->input('Contract.year', array('label' => 'Ano: '));
			echo $this->Form->input('Contract.semester', array('label' => 'Semestre: '));
			echo $this->Form->input('Contract.date_of_execution', array('label' => 'Data de início do contrato: '));
			echo $this->Form->input('Contract.date_of_closing', array('label' => 'Data de término do contrato: '));
			echo $this->Form->input('Contract.date_rescinded', array('label' => 'Data da rescisão do contrato: '));
			

			echo $this->Form->input('Event.0.id');
			echo $this->Form->input('Event.0.event_type_id', array('type' => 'hidden', 'value' => 1));
			echo $this->Form->input('Event.0.point_id', array('label' => 'Embarque Ida:', 'options' => $points, 'empty' => 'Local >>'));


			echo $this->Form->input('Event.1.id');
			echo $this->Form->input('Event.1.event_type_id', array('type' => 'hidden', 'value' => 2));
			echo $this->Form->input('Event.1.point_id', array('label' => 'Desembarque Ida:', 'options' => $points, 'empty' => 'Local >>'));

			echo $this->Form->input('Event.2.id');
			echo $this->Form->input('Event.2.event_type_id', array('type' => 'hidden', 'value' => 3));
			echo $this->Form->input('Event.2.point_id', array('label' => 'Embarque Volta:', 'options' => $points, 'empty' => 'Local >>'));


			echo $this->Form->input('Event.3.id');
			echo $this->Form->input('Event.3.event_type_id', array('type' => 'hidden', 'value' => 4));
			echo $this->Form->input('Event.3.point_id', array('label' => 'Desembarque Ida:', 'options' => $points, 'empty' => 'Local >>'));


			echo $this->Form->input('Contract.course_id', array('options' => $courses, 'empty' => 'Escolha um curso >>	', 'label' => 'Curso: '));

			echo $this->Form->input('Contract.active', array('type' => 'checkbox', 'label' => 'Ativo'));

			echo $this->Form->input('Contract.observation', array('label' => 'Observação: '));


	echo $this->Form->end('Atualizar')

?>
