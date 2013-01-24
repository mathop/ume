<h1>Cadastro de novo ponto</h1>

<p><?php echo $this->Html->link('Listar pontos', array('action' => 'index')) ?></p>

<?php

	echo $this->Form->create('Point', array('action' => 'add'));

	echo $this->Form->input('Point.name', array('label' => 'Nome do ponto: '));

	echo $this->Form->end('Cadastrar');

?>
