<h1>Agências</h1>
<br>
<button class="btn btn-sm btn-outline-secondary" id="agencias-btn-show-all-children" type="button"><i class="fas fa-plus-circle"></i>&nbsp;Expandir todos</button>
<button class="btn btn-sm btn-outline-secondary" id="agencias-btn-hide-all-children" type="button"><i class="fas fa-minus-circle"></i>&nbsp;Recolher todos</button>
<a class="btn btn-sm btn-secondary float-right" href="?pagina=inserir_agencia"><i class="fas fa-plus"></i>&nbsp;Inserir nova agência</a>
<br>
<br>
<div class="table-responsive">
	<table class="table table-hover table-striped display dt-responsive" id="agencia">
		<thead class="thead-dark">
			<tr>
				<!-- <th class="va-middle ha-center" style="width: 16px;"></th> -->
				<th class="va-middle ha-center sorting all" data-type="number" data-filter="no" data-filtering="">Id</th>
				<th class="va-middle ha-center sorting all" data-type="text" data-filter="yes" data-filtering="input">Número</th>
				<th class="va-middle ha-center sorting all" data-type="text" data-filter="yes" data-filtering="input">Nome</th>
				<th class="va-middle ha-center sorting" data-type="text" data-filter="yes" data-filtering="select">Banco</th>
				<th class="va-middle ha-center sorting_disabled all">Opções</th>
			</tr>
		</thead>
		<tbody>

			<?php 
				while($linha = mysqli_fetch_array($consulta_agencia)){
					echo '<tr>';
					//echo '<td class="va-middle ha-center"></td>';
					echo '<td class="va-middle ha-center">'.$linha['agencia_id'].'</td>';
					echo '<td class="va-middle ha-center">'.$linha['agencia_numero'].'</td>';
					echo '<td class="va-middle ha-left">'.$linha['agencia_nome'].'</td>';
					echo '<td class="va-middle ha-left">'.$linha['banco_nome_reduzido'].' ('.$linha['banco_numero'].')</td>';
			?>
				<td class="va-middle ha-center"><a class="btn btn-primary" href="?pagina=inserir_agencia&editar=<?php echo $linha['agencia_id']; ?>"><i class="fas fa-pen"></i></a>&nbsp;<a class="btn btn-danger" href="deleta_agencia.php?id=<?php echo $linha['agencia_id']; ?>"><i class="fas fa-trash"></i></a></td></tr>
			<?php		
				}

			?>
		</tbody>
		<tfoot class="thead-dark">
			<tr>
				<!-- <th class="va-middle ha-center"></th> -->
				<th class="va-middle ha-center">Id</th>
				<th class="va-middle ha-center">Número</th>
				<th class="va-middle ha-center">Nome</th>
				<th class="va-middle ha-center">Banco</th>
				<th class="va-middle ha-center">Opções</th>
			</tr>
		</tfoot>
	</table>
</div>