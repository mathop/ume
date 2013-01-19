<?php debug($data) ?> 

<?php

	echo $this->Form->create('Course', array('action' => 'edit'));
	echo $this->Form->input('id', array('value' => $data['Course']['id'], 'type' => 'text'));
	echo $this->Form->input('name', array('value' => $data['Course']['name']));
	echo $this->Form->submit('Alterar');
	echo $this->Form->end();

?>