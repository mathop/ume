	<?php 

	echo $this->Form->create('Person', array('controller' => 'people', 'action' => 'addImage', 'type' => 'file'));

	echo $this->Form->input('image', array('type' => 'file', 'label' => 'Imagem: '));

	echo $this->Form->input('name', array('type' => 'text'));

	echo $this->Form->input('cpf', array('type' => 'text'));

	echo $this->Form->end('Enviar Imagem');

?>
