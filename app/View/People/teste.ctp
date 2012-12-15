<?php
	
$requisicao = $this->requestAction('/contracts/getContratos/5');

			foreach ( $requisicao as $req ){
				debug($req);
			}

?>