<?php

	class TestesController extends AppController{


		public function index(){

			$this->Session->setFlash('Teste');


			debug($this->components);

		}

	}
