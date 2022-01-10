<h1>Movimentações</h1>
<div class="form-group callout">
	<h4>Funções</h4>
	<div class="row">
		<div class="col-md-auto">
			<button class="btn btn-sm btn-outline-secondary" id="movimentacao-btn-show-all-children" type="button"><i class="fas fa-plus-circle"></i>&nbsp;Expandir todos</button>
			<button class="btn btn-sm btn-outline-secondary" id="movimentacao-btn-hide-all-children" type="button"><i class="fas fa-minus-circle"></i>&nbsp;Recolher todos</button>
		</div>
		<div class="col" id="table-export-buttons">
			
		</div>
		<div class="col-md-auto">
			<a class="btn btn-sm btn-secondary float-right" href="?pagina=inserir_movimentacao"><i class="fas fa-plus"></i>&nbsp;Inserir nova movimentação</a>
		</div>
	</div>
</div>
<div class="form-group callout">
	<div class="row">
		<div class="col">
			<h4>Filtros</h4>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="input-group input-group-sm">
				<div class="input-group-prepend">
					<label class="input-group-text" for="movimentacoes_conta">Conta</label>
				</div>
				<select class="custom-select" name="movimentacoes_conta" id="movimentacoes_conta">
					
				</select>
			</div>
		</div>
		<div class="col">
			<div class="input-group input-group-sm">
				<div class="input-group-prepend">
					<label class="input-group-text" for="movimentacoes_mes">Mês</label>
				</div>
				<select class="custom-select" id="movimentacoes_mes">
					
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="input-group input-group-sm">
				<div class="input-group-prepend">
					<label class="input-group-text">Movimento</label>
				</div>
				<input class="form-control" type="text" id="movimentacoes_mov" placeholder="Procurar Movimento">
			</div>
		</div>
		<div class="col">
			<div class="input-group input-group-sm">
				<div class="input-group-prepend">
					<label class="input-group-text">Tipo</label>
				</div>
				<select class="custom-select" id="movimentacoes_tipo">
					
				</select>
			</div>
		</div>
	</div>
</div>
<div class="table-responsive">
	<table class="table table-hover table-striped display dt-responsive" id="movimentacao">
		<thead class="thead-dark">
			<tr>
				<th class="va-middle ha-center sorting_disabled all" data-type="number" data-filter="no" data-filtering="">Id</th>
				<th class="va-middle ha-center sorting_disabled never" name="conta_id" id="conta_id" data-type="number" data-filter="no" data-filtering="input">Conta_id</th>
				<th class="va-middle ha-center sorting_disabled never" name="mes_ano" id="mes_ano" data-type="number" data-filter="no" data-filtering="input">Mês/Ano</th>
				<th class="va-middle ha-center sorting_disabled all" data-type="datetime-local" data-filter="no" data-filtering="input">Data</th>
				<th class="va-middle ha-center sorting_disabled never" data-type="text" data-filter="no" data-filtering="select"><i class="fas fa-trademark"></i></th>
				<th class="va-middle ha-center sorting_disabled never" data-type="text" data-filter="no" data-filtering="select">Banco</th>
				<th class="va-middle ha-center sorting_disabled all" data-type="text" data-filter="no" data-filtering="select">Conta</th>
				<th class="va-middle ha-center sorting_disabled all" data-type="text" data-filter="no" data-filtering="input">Movimento</th>
				<th class="va-middle ha-center sorting_disabled none" data-type="text" data-filter="no" data-filtering="input">Descrição</th>
				<th class="va-middle ha-center sorting_disabled all" data-type="text" data-filter="no" data-filtering="select">Tipo</th>
				<th class="va-middle ha-center sorting_disabled all" data-type="number" data-filter="no" data-filtering="input">Valor</th>
				<th class="va-middle ha-center sorting_disabled never" data-type="number" data-filter="no" data-filtering="input">Valor</th>
				<th class="va-middle ha-center sorting_disabled all" data-type="number" data-filter="no" data-filtering="input">Saldo</th>
				<th class="va-middle ha-center sorting_disabled never" data-type="number" data-filter="no" data-filtering="input">Saldo</th>
				<th class="va-middle ha-center sorting_disabled never" data-type="number" data-filter="no" data-filtering="input">Saldo</th>
				<th class="va-middle ha-center sorting_disabled never" name="conta_filtro" id="conta_filtro" data-type="text" data-filter="no" data-filtering="select">Conta</th>
				<th class="va-middle ha-center sorting_disabled all">Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$saldos['0'] = 0;
				while($linha = mysqli_fetch_array($consulta_movimentacao)){
					$data = strtotime($linha['movimentacao_data']);
					$data2 = new DateTime($linha['movimentacao_data']);
					$cor_data = '';
					if( $data2 < new DateTime() ){
						$cor_data = ' text-muted';
					}
					$logo = 'img/university-solid.svg';
					if( $linha['banco_logo'] != '' ){
						$logo = $linha['banco_logo'];
					}
					$banco = $linha['banco_nome_reduzido'];
					if( $linha['banco_nome'] != '' ){
						$banco = $linha['banco_nome'];
					}
					$valor = round($linha['movimentacao_valor']*$linha['fator_ajuste'],2);
					$cor_valor = '';
					if( $valor < 0.00 ){
						$cor_valor = ' text-danger';
					} elseif ( $valor > 0.00 ) {
						$cor_valor = ' text-primary';
					}
					if( array_key_exists($linha['conta_id'], $saldos) ){
						$saldos[$linha['conta_id']] = round($saldos[$linha['conta_id']] + $valor,2);
					} else {
						$saldos[$linha['conta_id']] = $valor;
					}
					$saldo = $saldos[$linha['conta_id']];
					$saldo2 = $linha['saldo'];
					$cor_saldo = '';
					if( $saldo < 0.00 ){
						$cor_saldo = ' text-danger';
					} elseif ( $saldo > 0.00 ) {
						$cor_saldo = ' text-primary';
					}
					switch ($data2->format('w')) {
						case 0:
							$data3 = 'Domingo';
							break;
						case 1:
							$data3 = 'Segunda-feira';
							break;
						case 2:
							$data3 = 'Terça-feira';
							break;
						case 3:
							$data3 = 'Quarta-feira';
							break;
						case 4:
							$data3 = 'Quinta-feira';
							break;
						case 5:
							$data3 = 'Sexta-feira';
							break;
						case 6:
							$data3 = 'Sábado';
							break;
						default:
							$data3 = '';
							break;
					}
					switch ($data2->format('n')) {
						case 1:
							$dataMesC = 'Janeiro';
							break;
						case 2:
							$dataMesC = 'Fevereiro';
							break;
						case 3:
							$dataMesC = 'Março';
							break;
						case 4:
							$dataMesC = 'Abril';
							break;
						case 5:
							$dataMesC = 'Maio';
							break;
						case 6:
							$dataMesC = 'Junho';
							break;
						case 7:
							$dataMesC = 'Julho';
							break;
						case 8:
							$dataMesC = 'Agosto';
							break;
						case 9:
							$dataMesC = 'Setembro';
							break;
						case 10:
							$dataMesC = 'Outubro';
							break;
						case 11:
							$dataMesC = 'Novembro';
							break;
						case 12:
							$dataMesC = 'Dezembro';
							break;
						default:
							$dataMesC = '';
							break;
					}
					$minha_conta = $linha['conta_numero'].' ('.$linha['agencia_nome'].'; '.$banco.'; '.$linha['titular_nome_reduzido'].')';
					echo '<tr class="'.$cor_data.'">';
					echo '<td class="va-middle ha-center">'.$linha['movimentacao_id'].'</td>';
					echo '<td class="va-middle ha-center">'.$linha['conta_id'].'</td>';
					echo '<td class="va-middle ha-center">'.$dataMesC.'/'.$data2->format('Y').'</td>';
					echo '<td class="va-middle ha-center">'.$data2->format('d/m/Y').'<br><small>'.$data3.'</small></td>';
					echo '<td class="va-middle ha-center"><img src="'.$logo.'" height="24" alt="'.$banco.'"><br><small>'.$linha['titular_nome_reduzido'].'</small></td>';//logo
					echo '<td class="va-middle ha-center">'.$banco.'</td>';//banco
					echo '<td class="va-middle ha-center"><img src="'.$logo.'" height="24" alt="'.$banco.'">&nbsp;'.$linha['conta_numero'].'<br><small>'.$linha['agencia_nome'].'<br>'.$linha['titular_nome_reduzido'].'</small></td>';//conta
					echo '<td class="va-middle ha-left">'.$linha['movimento_nome'].'<br><small>'.$linha['movimentacao_descricao'].'</small></td>';//movimento
					echo '<td class="va-middle ha-center">'.$linha['movimentacao_descricao'].'</td>';//descricao
					echo '<td class="va-middle ha-center">'.$linha['sigla_movimento'].'</td>';//tipo
					echo '<td class="va-middle ha-right'.$cor_valor.'">'.number_format($linha['movimentacao_valor'],2,',','.').'</td>';//valor
					echo '<td class="va-middle ha-right'.$cor_valor.'">'.number_format($linha['movimentacao_valor'],2,'.','').'</td>';//valor
					echo '<td class="va-middle ha-right'.$cor_saldo.'">'.number_format($saldo,2,',','.').'</td>';//saldo
					echo '<td class="va-middle ha-right'.$cor_saldo.'">'.number_format($saldo2,2,',','.').'</td>';//saldo
					echo '<td class="va-middle ha-right'.$cor_saldo.'">'.number_format($saldo,2,'.','').'</td>';
					echo '<td class="va-middle ha-center">'.$minha_conta.'</td>';//saldo
			?>
				<td class="va-middle ha-center">
					<div class="text-nowrap">
						<a class="btn btn-primary" href="?pagina=inserir_movimentacao&editar=<?php echo $linha['movimentacao_id']; ?>"><i class="fas fa-pen"></i></a>&nbsp;<a class="btn btn-danger" href="deleta_movimentacao.php?id=<?php echo $linha['movimentacao_id']; ?>" id="deletar_movimentacao"><i class="fas fa-trash"></i></a>
					</div>
				</td></tr>

			<?php
				}
			?>
		</tbody>
		<tfoot class="thead-dark">
			<tr>
				<th class="va-middle ha-center">Id</th>
				<th class="va-middle ha-center">Conta_id</th>
				<th class="va-middle ha-center">Mês/Ano</th>
				<th class="va-middle ha-center">Data</th>
				<th class="va-middle ha-center"><i class="fas fa-trademark"></i></th>
				<th class="va-middle ha-center">Banco</th>
				<th class="va-middle ha-center">Conta</th>
				<th class="va-middle ha-center">Movimento</th>
				<th class="va-middle ha-center">Descrição</th>
				<th class="va-middle ha-center">Tipo</th>
				<th class="va-middle ha-center">Valor</th>
				<th class="va-middle ha-center">Valor</th>
				<th class="va-middle ha-center">Saldo</th>
				<th class="va-middle ha-center">Saldo</th>
				<th class="va-middle ha-center">Saldo</th>
				<th class="va-middle ha-center">Conta</th>
				<th class="va-middle ha-center">Opções</th>
			</tr>
		</tfoot>
	</table>
</div>