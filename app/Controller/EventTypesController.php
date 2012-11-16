<?php 

	class EventTypesController extends AppController{


		public function index(){

			//pesquisa todos os tipos de eventos e armazena na var
			$resultado = $this->EventType->find('all');

			//deixa o conteudo disponível para a View
			$this->set(compact('resultado'));
		}


	}
