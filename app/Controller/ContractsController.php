<?php
class ContractsController extends AppController {

	private function index(){
		//
	}
	
	
	private function getContratos($num = null){
		
		$id = $num;

		$this->Contract->Person->id = $id;
		$results = $this->Contract->Person->read();
		$this->set(compact('results'));
	
	}
	
	
	public function view($id = null){
	
		//a linha de baixo busca todos os contratos
		self::getContratos($num = $id);
		
		$this->set(compact('results'));
		
		$this->set('id', $id);
	
	}
	
	public function teste($id = null){
	
	
		debug($this->Contract->consulta($id));	
	
	
	}
	
	
	public function add($id = null){
	
		
	
		$this->set('id', $id);
		
		//$result2 = $this->Contract->find('count', array('conditions' => array('Contract.person_id' => $id, 'Contract.semester' => $this->request->data['Contract']['semester'], 'Contract.year' => $this->request->data['Contract']['year'])));
	
		//if ( $result2 > 0){
			
			//$this->Contract->invalidate('year', 'Já existe um contrato para este ano e semestre.');
			//$this->Contract->invalidate('semester', 'Já existe um contrato para este ano e semestre.');
		//}
					
		//$result = $this->Contract->find('count', array('conditions' => array('Contract.person_id' => $id, 'Contract.active' => true)));
				
		//debug($result2);
			
		//if ($result > 0 and $this->request->data['Contract']['active'] == '1'){
				
			//$this->Contract->invalidate('active', 'Só é permitido um contrato ativo por pessoa, esta pessoa já possui um contrato ativo.');
			//$this->Session->setFlash('teste');
			//exit;
		//}
		
		//if ($this->request->is('post')){
		
			if ($this->Contract->save($this->request->data)){
			
				$this->Session->setFlash('Novo contrato cadastrado com sucesso', 'default', array('class' => 'success'), 'flash');
				$this->redirect(array('action' => 'view', $id));
				}
		//}
		
	}
	
	public function edit($id = null){
	
		$this->Contract->id = $id;
		$result = $this->Contract->read();
		//$this->set(compact('result'));
		
		if ( $this->request->is('post')  ){
		
			if ($this->Contract->saveAll($this->request->data)){
			
				$this->Session->setFlash('Atualização realizada com sucesso!', 'default', array('class' => 'success'), 'flash');
				$this->redirect(array('action' => 'view', $result['Contract']['person_id']));
			
			}else{
			
				$this->Session->setFlash('Não salvou');
			
			}
		
		}else{
			
			//$this->Session->setFlash('aqui');
		
			$this->request->data = $result;
		
		}
		
		
	
	}
	
	
	
	
	

}
