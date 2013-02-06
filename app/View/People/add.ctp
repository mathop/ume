<?php

	$this->Html->script('jquery-1.9.0.min.js', array('inline' => false));
	$this->Html->script('jquery.maskedinput.v1.3.1.js', array('inline' => false));
	$this->Html->script('view-people-add-script.js', array('inline' => false));
	

	echo '<h1>Cadastro de Pessoa</h1>';

	echo $this->Form->create('Person', array('action' => 'add', 'type' => 'file'));
		
		echo $this->Form->input('Person.name', array('label' => 'Nome: '));
		echo $this->Form->input('Person.phone', array('label' => 'Telefone: ', 'id' => 'telefone'));
		echo $this->Form->input('Person.mobile', array('label' => 'Celular: ', 'id' => 'celular'));
		echo $this->Form->input('Person.email', array('label' => 'Email: '));
		echo $this->Form->input('Person.cpf', array('label' => 'CPF: ', 'id' => 'cpf'));
		echo $this->Form->input('Person.rg', array('label' => 'RG: ', 'id' => 'rg'));
		echo $this->Form->input('Person.date_of_birth', array('label' => 'Data de nascimento: '));
		echo $this->Form->input('Person.observation', array('label' => 'Observações relacionadas à pessoa: ', 'rows' => 5));
		echo $this->Form->input('Person.branch_id', array('options' => array($branches), 'empty' => 'Filial >>', 'label' => 'Filiado em: '));
		
		echo $this->Form->input('Address.street', array('label' => 'Rua: '));
		echo $this->Form->input('Address.number', array('label' => 'Número: '));
		echo $this->Form->input('Address.complement', array('label' => 'Complemento: '));
		echo $this->Form->input('Address.neighborhood', array('label' => 'Bairro: '));
		
		echo $this->Form->input('Address.city_id', array('options' => array($cities), 'empty' => 'Cidade >>', 'label' => 'Cidade: '));

		echo $this->Form->input('Person.image', array('label' => 'Imagem: ', 'type' => 'file'));
	
	echo $this->Form->end('Cadastrar');
	
	echo $this->Html->link('Listar pessoas', array('action' => 'index'));
	
?>