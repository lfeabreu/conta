<h1>Movimentos</h1>
<button class="btn btn-sm btn-outline-secondary" id="movimentos-btn-show-all-children" type="button"><i class="fas fa-plus-circle"></i>&nbsp;Expandir todos</button>
<button class="btn btn-sm btn-outline-secondary" id="movimentos-btn-hide-all-children" type="button"><i class="fas fa-minus-circle"></i>&nbsp;Recolher todos</button>
<a class="btn btn-sm btn-secondary float-right" href="?pagina=inserir_movimento"><i class="fas fa-plus"></i>&nbsp;Inserir novo movimento</a>
<br>
<br>
<div class="table-responsive">
	<table class="table table-hover table-striped display dt-responsive" id="movimento">
		<thead class="thead-dark">
			<tr>
				<!-- <th class="va-middle ha-center" style="width: 16px;"></th> -->
				<th class="va-middle ha-center sorting all" data-type="number" data-filter="no" data-filtering="">Id</th>
				<th class="va-middle ha-center sorting all" data-type="text" data-filter="yes" data-filtering="input">Movimento</th>
				<th class="va-middle ha-center sorting" data-type="text" data-filter="yes" data-filtering="select">Tipo do movimento</th>
				<th class="va-middle ha-center sorting" data-type="text" data-filter="yes" data-filtering="select">Sigla</th>
				<th class="va-middle ha-center sorting_disabled none" data-type="text" data-filter="yes" data-filtering="select">Movimento Vinculado</th>
				<th class="va-middle ha-center sorting_disabled all">Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				while($linha = mysqli_fetch_array($consulta_movimento)){
					echo '<tr>';
					//echo '<td class="va-middle ha-center"></td>';
					echo '<td class="va-middle ha-center">'.$linha['movimento_id'].'</td>';
					echo '<td class="va-middle ha-left">'.$linha['movimento_nome'].'</td>';
					echo '<td class="va-middle ha-center">'.$linha['tipo_movimento'].'</td>';
					echo '<td class="va-middle ha-center">'.$linha['sigla_movimento'].'</td>';
					$mov_vinc_label = 'Não tem';
					if($linha['movimento_vinculado_id'] != 0){
						$mov_vinc_ativo = ' (inativo)';
						if( $linha['movimento_vinculado_ativo'] == 1 ){
							$mov_vinc_ativo = ' (ativo)';
						}
						$mov_vinc_label = $linha['movimento_vinculado_id'].' - '.$linha['movimento_vinculado_nome'].$mov_vinc_ativo;
					}
					echo '<td class="va-middle ha-center">'.$mov_vinc_label.'</td>';
			?>
				<td class="va-middle ha-center"><a class="btn btn-primary" href="?pagina=inserir_movimento&editar=<?php echo $linha['movimento_id']; ?>"><i class="fas fa-pen"></i></a>&nbsp;<a class="btn btn-danger" href="deleta_movimento.php?id=<?php echo $linha['movimento_id']; ?>"><i class="fas fa-trash"></i></a></td></tr>

			<?php
				}
			?>
		</tbody>
		<tfoot class="thead-dark">
			<tr>
				<!-- <th class="va-middle ha-center"></th> -->
				<th class="va-middle ha-center">Id</th>
				<th class="va-middle ha-center">Movimento</th>
				<th class="va-middle ha-center">Tipo do movimento</th>
				<th class="va-middle ha-center">Sigla</th>
				<th class="va-middle ha-center">Movimento Vinculado</th>
				<th class="va-middle ha-center">Opções</th>
			</tr>
		</tfoot>
	</table>
</div>