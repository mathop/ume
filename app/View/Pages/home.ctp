<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */ 

	echo '<h1>Início</h1>';
 
	echo '<p>' . $this->Html->link('Pessoas', array('controller' => 'people', 'action' => 'index')) . '</p>';
	echo '<p>' . $this->Html->link('Filiais', array('controller' => 'branches', 'action' => 'index')) . '</p>';
	echo '<p>' . $this->Html->link('Cidades', array('controller' => 'cities', 'action' => 'index')) . '</p>';
	echo '<p>' . $this->Html->link('Cursos', array('controller' => 'courses', 'action' => 'index')) . '</p>';
	echo '<p>' . $this->Html->link('Evento Tipos', array('controller' => 'event_types', 'action' => 'index')) . '</p>';
 
?>
