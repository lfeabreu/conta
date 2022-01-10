<h1>Bancos</h1>
<br>
<button class="btn btn-sm btn-outline-secondary" id="bancos-btn-show-all-children" type="button"><i class="fas fa-plus-circle"></i>&nbsp;Expandir todos</button>
<button class="btn btn-sm btn-outline-secondary" id="bancos-btn-hide-all-children" type="button"><i class="fas fa-minus-circle"></i>&nbsp;Recolher todos</button>
<a class="btn btn-sm btn-secondary float-right" href="?pagina=inserir_banco"><i class="fas fa-plus"></i>&nbsp;Inserir novo banco</a>
<br>
<br>
<div class="table-responsive">
	<table class="table table-hover table-striped display dt-responsive" id="banco">
		<thead class="thead-dark">
			<tr>
				<!-- <th class="va-middle ha-center" style="width: 16px;"></th> -->
				<th class="va-middle ha-center sorting all" data-type="number" data-filter="no" data-filtering="">Id</th>
				<th class="va-middle ha-center sorting all" data-type="text" data-filter="yes" data-filtering="input">Número</th>
				<th class="va-middle ha-center sorting none" data-type="text" data-filter="no" data-filtering="input">Nome</th>
				<th class="va-middle ha-center sorting all" data-type="text" data-filter="yes" data-filtering="input">Nome reduzido</th>
				<th class="va-middle ha-center sorting none" data-type="text" data-filter="no" data-filtering="input">Nome completo</th>
				<th class="va-middle ha-center sorting_disabled all">Opções</th>
			</tr>
		</thead>
		<tbody>

			<?php 
				while($linha = mysqli_fetch_array($consulta_banco)){
					echo '<tr>';
					//echo '<td class="va-middle ha-center"></td>';
					echo '<td class="va-middle ha-center">'.$linha['banco_id'].'</td>';
					echo '<td class="va-middle ha-center">'.$linha['banco_numero'].'</td>';
					echo '<td class="va-middle">'.$linha['banco_nome'].'</td>';
					echo '<td class="va-middle">'.$linha['banco_nome_reduzido'].'</td>';
					echo '<td class="va-middle">'.$linha['banco_nome_extenso'].'</td>';
			?>
				<td class="va-middle ha-center"><a class="btn btn-primary" href="?pagina=inserir_banco&editar=<?php echo $linha['banco_id']; ?>"><i class="fas fa-pen"></i></a>&nbsp;<a class="btn btn-danger" href="deleta_banco.php?id=<?php echo $linha['banco_id']; ?>"><i class="fas fa-trash"></i></a></td></tr>
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
				<th class="va-middle ha-center">Nome reduzido</th>
				<th class="va-middle ha-center">Nome completo</th>
				<th class="va-middle ha-center">Opções</th>
			</tr>
		</tfoot>
	</table>
</div>