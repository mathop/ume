<?php

    echo $this->Form->create('Contract', array('url'=>'export/todos_os_ativos.csv'));
    echo $this->Form->end('Exportar todos os ativos');





    echo $this->Form->create('Contract', array('url' => 'export2/prefeitura.csv'));

    echo $this->Form->end('Exportar dados para a prefeitura');




    echo $this->Form->create('Contract', array('url' => 'export3/carteirinha.csv'));

    echo $this->Form->end('Exportar dados para confecção da carteirinha');
	
?>
