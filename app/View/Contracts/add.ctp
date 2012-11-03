<?php
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