<?php

	$query = 'SELECT COUNT(*) AS `qnt` FROM `t_banco` WHERE `ativo` = 1';
	$consulta_qnt_bancos = mysqli_query($conexao, $query);
	while($linha = mysqli_fetch_array($consulta_qnt_bancos)){
		$qnt_bancos = $linha['qnt'];
	}

	$query = 'SELECT COUNT(*) AS `qnt` FROM `t_agencia` WHERE `ativo` = 1';
	$consulta_qnt_agencias = mysqli_query($conexao, $query);
	while($linha = mysqli_fetch_array($consulta_qnt_agencias)){
		$qnt_agencias = $linha['qnt'];
	}

	$query = 'SELECT COUNT(*) AS `qnt` FROM `t_conta` WHERE `ativo` = 1';
	$consulta_qnt_contas = mysqli_query($conexao, $query);
	while($linha = mysqli_fetch_array($consulta_qnt_contas)){
		$qnt_contas = $linha['qnt'];
	}

	$query = 'SELECT COUNT(*) AS `qnt` FROM `t_titular` WHERE `ativo` = 1';
	$consulta_qnt_titular = mysqli_query($conexao, $query);
	while($linha = mysqli_fetch_array($consulta_qnt_titular)){
		$qnt_titular = $linha['qnt'];
	}

	$query = "SELECT `MVTC`.*, `MVNT`.`movimento_nome`, `TPMV`.`tipo_movimento`, `TPMV`.`sigla_movimento`, `TPMV`.`fator_ajuste`, `CNTA`.`conta_numero`, `AGNC`.`agencia_numero`, `AGNC`.`agencia_nome`, `AGNC`.`banco_id`, `BNCO`.`banco_numero`, `BNCO`.`banco_nome_reduzido`, `TITL`.`titular_cpf`, `TITL`.`titular_nome`, `TITL`.`titular_nome_reduzido` FROM `t_movimentacao` AS `MVTC` INNER JOIN `t_movimento` AS `MVNT` ON (`MVTC`.`movimento_id` = `MVNT`.`movimento_id`) INNER JOIN `t_tipo_movimento` AS `TPMV` ON (`MVNT`.`tipo_movimento_id` = `TPMV`.`tipo_movimento_id`) INNER JOIN `t_conta` AS `CNTA` ON (`MVTC`.`conta_id` = `CNTA`.`conta_id`) INNER JOIN `t_agencia` AS `AGNC` ON (`CNTA`.`agencia_id` = `AGNC`.`agencia_id`) INNER JOIN `t_banco` AS `BNCO` ON (`AGNC`.`banco_id` = `BNCO`.`banco_id`) INNER JOIN `t_titular` AS `TITL` ON (`CNTA`.`titular_id` = `TITL`.`titular_id`) WHERE `MVTC`.`movimentacao_data` BETWEEN CURRENT_DATE() AND ADDDATE(CURRENT_DATE(), INTERVAL 7 DAY) ORDER BY `MVTC`.`movimentacao_data` ASC, `BNCO`.`banco_numero` ASC, `TPMV`.`sigla_movimento` ASC, `MVTC`.`movimentacao_valor` DESC";
	$consulta_movimentacao2 = mysqli_query($conexao, $query);

	$query = "SELECT COUNT(*) AS `qnt` FROM `t_movimentacao` WHERE `movimentacao_data` BETWEEN CURRENT_DATE() AND CURRENT_DATE() + 7";
	$consulta_qnt_movimentacao = mysqli_query($conexao, $query);
	while($linha = mysqli_fetch_array($consulta_qnt_movimentacao)){
		$qnt_movimentacao = $linha['qnt'];
	}

?>

<h1 class="display-4">Bem-vindo à Suas Contas</h1>
<p>
	Aqui você poderá fazer o registro de suas contas.
</p>
<dl class="list-group list-group-flush">
	<dt class="list-group-item list-group-item-secondary d-flex justify-content-between align-items-center">Bancos cadastrados:<a href="?pagina=bancos" class="badge badge-secondary badge-pill"><?php echo $qnt_bancos ?></a></dt>
	<dd class="list-group-item list-group-item-light">&nbsp;&nbsp;&nbsp;&nbsp;Cadastre os bancos aqui.</dd>
	<dt class="list-group-item list-group-item-secondary d-flex justify-content-between align-items-center">Agências cadastradas:<a href="?pagina=agencias" class="badge badge-secondary badge-pill"><?php echo $qnt_agencias ?></a></dt>
	<dd class="list-group-item list-group-item-light">&nbsp;&nbsp;&nbsp;&nbsp;Cadastre as agências aqui.</dd>
	<dt class="list-group-item list-group-item-secondary d-flex justify-content-between align-items-center">Contas cadastradas:<a href="?pagina=contas" class="badge badge-secondary badge-pill"><?php echo $qnt_contas ?></a></dt>
	<dd class="list-group-item list-group-item-light">&nbsp;&nbsp;&nbsp;&nbsp;Cadastre suas contas aqui.</dd>
	<dt class="list-group-item list-group-item-secondary d-flex justify-content-between align-items-center">Titulares cadastrados:<a href="?pagina=titulares" class="badge badge-secondary badge-pill"><?php echo $qnt_titular ?></a></dt>
	<dd class="list-group-item list-group-item-light">&nbsp;&nbsp;&nbsp;&nbsp;Cadastre os titulares de contas aqui.</dd>
	<dt class="list-group-item list-group-item-secondary d-flex justify-content-between align-items-center">Movimentações agendadas para os próximos 7 dias:<a href="?pagina=movimentacoes" class="badge badge-secondary badge-pill"><?php echo $qnt_movimentacao ?></a></dt>
	<dd class="list-group-item list-group-item-light">
		<div class="row justify-content-md-center">
			<div class="col">
				<button class="btn btn-sm btn-outline-secondary" id="movimentacao_front-btn-show-all-children" type="button"><i class="fas fa-plus-circle"></i>&nbsp;Expandir todos</button>
				<button class="btn btn-sm btn-outline-secondary" id="movimentacao_front-btn-hide-all-children" type="button"><i class="fas fa-minus-circle"></i>&nbsp;Recolher todos</button>
			</div>
			<div class="col-md-auto">
				<div class="btn-toolbar">
					<div class="btn-group">
						<div id="my-table-buttons"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-hover table-condensed table-striped display dt-responsive" id="movimentacao_front">
				<thead class="thead-dark">
					<tr>
						<!-- <th class="va-middle ha-center sorting_disable all" style="width: 16px;"></th> -->
						<th class="va-middle ha-center sorting all" data-type="datetime-local" data-filter="yes" data-filtering="select">Data</th>
						<th class="va-middle ha-center sorting none" data-type="text" data-filter="no" data-filtering="input">Banco</th>
						<th class="va-middle ha-center sorting none" data-type="text" data-filter="no" data-filtering="input">Titular</th>
						<th class="va-middle ha-center sorting none" data-type="text" data-filter="no" data-filtering="input">Conta</th>
						<th class="va-middle ha-center sorting all" data-type="text" data-filter="yes" data-filtering="input">Movimento</th>
						<th class="va-middle ha-center sorting all" data-type="text" data-filter="yes" data-filtering="input">Descrição</th>
						<th class="va-middle ha-center sorting all" data-type="text" data-filter="yes" data-filtering="select">Tipo</th>
						<th class="va-middle ha-center sorting all" data-type="number" data-filter="yes" data-filtering="input">Valor</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						while($linha = mysqli_fetch_array($consulta_movimentacao2)){
							$valor = $linha['movimentacao_valor']*$linha['fator_ajuste'];
							$cor_valor = '';
							if( $valor < 0 ){
								$cor_valor = ' text-danger';
							} elseif ( $valor > 0 ) {
								$cor_valor = ' text-primary';
							}
							$data = new DateTime($linha['movimentacao_data']);
							echo '<tr>';
							//echo '<td class="va-middle ha-center"></td>';
							echo '<td class="va-middle ha-left">'.$data->format('d/m/Y').'</td>';
							echo '<td class="va-middle ha-left">'.$linha['banco_nome_reduzido'].'</td>';
							echo '<td class="va-middle ha-left">'.$linha['titular_nome_reduzido'].'</td>';
							echo '<td class="va-middle ha-left">'.$linha['conta_numero'].'</td>';
							echo '<td class="va-middle ha-left">'.$linha['movimento_nome'].'</td>';
							echo '<td class="va-middle ha-left">'.$linha['movimentacao_descricao'].'</td>';
							echo '<td class="va-middle ha-center">'.$linha['sigla_movimento'].'</td>';
							echo '<td class="va-middle ha-center'.$cor_valor.'">'.number_format($linha['movimentacao_valor'],2,',','.').'</td>';
						}
					?>
				</tbody>
				<tfoot class="thead-dark">
					<tr>
						<!-- <th class="va-middle ha-center"></th> -->
						<th class="va-middle ha-center">Data</th>
						<th class="va-middle ha-center">Banco</th>
						<th class="va-middle ha-center">Titular</th>
						<th class="va-middle ha-center">Conta</th>
						<th class="va-middle ha-center">Movimento</th>
						<th class="va-middle ha-center">Descrição</th>
						<th class="va-middle ha-center">Tipo</th>
						<th class="va-middle ha-center">Valor</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</dd>
</dl>