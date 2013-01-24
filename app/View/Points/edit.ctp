<?php 

	echo $this->Form->create('Point', array('action' => 'edit'));

	echo $this->Form->input('Point.id');

	echo $this->Form->input('Point.name');

	echo $this->Form->end('Alterar');

?>
