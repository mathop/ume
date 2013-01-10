<?php

    echo $this->Form->create('Contract', array('url'=>'export/todos_os_ativos.csv'));
    echo $this->Form->end('Exportar todos os ativos');

    echo $this->Form->create('Contract', array('url' => 'export/prefeitura.csv'));

    echo $this->Form->end('Exportar dados para a prefeitura');
	
?>
