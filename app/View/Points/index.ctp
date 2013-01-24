<p><?php echo $this->Html->link('Cadastrar novo ponto', array('controller' => 'points', 'action' => 'add')) ?></p>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach ( $points as $point )
			{
				$Point = $point['Point']['name'];
				$Id = $point['Point']['id'];	

				echo '<tr><td>' . $Id . '</td><td>' . $Point . '</td><td>' . $this->Html->link('Alterar', array('action' => 'edit', $Id)) . ' | Excluir</tr>';
			}
		 ?>
	</tbody>
</table>
