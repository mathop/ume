<?php
	
	$empty = empty($this->data['Person']['image']);

	echo $this->Form->create('Person', array('action' => 'edit'));
	
		echo $this->Form->input('Person.id');
		echo $this->Form->input('Person.name', array('label' => 'Nome: '));
		echo $this->Form->input('Person.phone', array('label' => 'Telefone: '));
		echo $this->Form->input('Person.mobile', array('label' => 'Celular: '));
		echo $this->Form->input('Person.email', array('label' => 'Email: '));
		echo $this->Form->input('Person.cpf', array('label' => 'CPF: '));
		echo $this->Form->input('Person.rg', array('label' => 'RG: '));
		echo $this->Form->input('Person.date_of_birth', array('label' => 'Data de nascimento: ', 'value' => date('d/m/Y',
			strtotime($this->data['Person']['date_of_birth']))));

		echo $this->Form->input('Person.observation', array('label' => 'Observações relacionadas à pessoa: ', 'rows' => 5));
		echo $this->Form->input('Person.person_type_id', array('label' => 'Pessoa Tipo: ', 'options' => array($person_types), 'disabled' => 'disabled'));
		echo $this->Form->input('Person.branch_id', array('options' => array($branches), 'label' => 'Filiado em: ', 'empty' => 'Filial >>'));
		
		echo $this->Form->input('Address.id');
		echo $this->Form->input('Address.street', array('label' => 'Rua: '));
		echo $this->Form->input('Address.number', array('label' => 'Número: '));
		echo $this->Form->input('Address.complement', array('label' => 'Complemento: '));
		echo $this->Form->input('Address.neighborhood', array('label' => 'Bairro: '));
		echo $this->Form->input('Address.city_id', array('options' => array($cities), 'empty' => 'Cidade >>', 'label' => 'Cidade: '));
	
		if ( !$empty )
		{
			echo $this->Html->link('Alterar imagem', array('action' => 'addImage', $this->request->data['Person']['id'])) . ' | ' . $this->Html->link('Excluir imagem', array('action' => 'deleteImage', $this->request->data['Person']['id']), array('confirm' => 'Tem certeza que deseja deletar a imagem do usuário? '));
		}else
		{
			echo $this->Html->link('Enviar imagem', array('action' => 'addImage', $this->request->data['Person']['id']));

		}

	echo $this->Form->end('Editar');

	echo $this->Html->link('Voltar', array('action' => 'index', $this->request->data['Person']['id']));

?>