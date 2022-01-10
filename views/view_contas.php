<h1>Contas</h1>
<br>
<button class="btn btn-sm btn-outline-secondary" id="contas-btn-show-all-children" type="button"><i class="fas fa-plus-circle"></i>&nbsp;Expandir todos</button>
<button class="btn btn-sm btn-outline-secondary" id="contas-btn-hide-all-children" type="button"><i class="fas fa-minus-circle"></i>&nbsp;Recolher todos</button>
<a class="btn btn-sm btn-secondary float-right" href="?pagina=inserir_conta"><i class="fas fa-plus"></i>&nbsp;Inserir nova conta</a>
<br>
<br>
<div class="table-responsive">
	<table class="table table-hover table-striped display dt-responsive" id="conta">
		<thead class="thead-dark">
			<tr>
				<!-- <th class="va-middle ha-center" style="width: 16px;"></th> -->
				<th class="va-middle ha-center sorting all" data-type="number" data-filter="no" data-filtering="">Id</th>
				<th class="va-middle ha-center sorting none" data-type="text" data-filter="no" data-filtering="input">Número do banco</th>
				<th class="va-middle ha-center sorting all" data-type="text" data-filter="yes" data-filtering="select">Banco</th>
				<th class="va-middle ha-center sorting all" data-type="text" data-filter="yes" data-filtering="input">Número da agência</th>
				<th class="va-middle ha-center sorting all" data-type="text" data-filter="yes" data-filtering="select">Agência</th>
				<th class="va-middle ha-center sorting none" data-type="text" data-filter="no" data-filtering="input">CPF do Titular</th>
				<th class="va-middle ha-center sorting none" data-type="text" data-filter="no" data-filtering="select">Titular</th>
				<th class="va-middle ha-center sorting all" data-type="text" data-filter="yes" data-filtering="input">Número da conta</th>
				<th class="va-middle ha-center sorting_disabled all">Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				while($linha = mysqli_fetch_array($consulta_conta)){
					echo '<tr>';
					//echo '<td class="va-middle ha-center"></td>';
					echo '<td class="va-middle ha-center">'.$linha['conta_id'].'</td>';
					echo '<td class="va-middle ha-right">'.$linha['banco_numero'].'</td>';
					echo '<td class="va-middle ha-left">'.$linha['banco_nome_reduzido'].'</td>';
					echo '<td class="va-middle ha-right">'.$linha['agencia_numero'].'</td>';
					echo '<td class="va-middle ha-left">'.$linha['agencia_nome'].'</td>';
					echo '<td class="va-middle ha-right">'.$linha['titular_cpf'].'</td>';
					echo '<td class="va-middle ha-left">'.$linha['titular_nome_reduzido'].'</td>';
					echo '<td class="va-middle ha-right">'.$linha['conta_numero'].'</td>';
			?>
				<td class="va-middle ha-center"><a class="btn btn-primary" href="?pagina=inserir_conta&editar=<?php echo $linha['conta_id']; ?>"><i class="fas fa-pen"></i></a>&nbsp;<a class="btn btn-danger" href="deleta_conta.php?id=<?php echo $linha['conta_id']; ?>"><i class="fas fa-trash"></i></a></td></tr>
			<?php		
				}

			?>
		</tbody>
		<tfoot class="thead-dark">
			<tr>
				<!-- <th class="va-middle ha-center"></th> -->
				<th class="va-middle ha-center">Id</th>
				<th class="va-middle ha-center">Número do banco</th>
				<th class="va-middle ha-center">Banco</th>
				<th class="va-middle ha-center">Número da agência</th>
				<th class="va-middle ha-center">Agência</th>
				<th class="va-middle ha-center">CPF do Titular</th>
				<th class="va-middle ha-center">Titular</th>
				<th class="va-middle ha-center">Número da conta</th>
				<th class="va-middle ha-center">Opções</th>
			</tr>
		</tfoot>
	</table>
</div>