<?php
	if(!isset($_GET['editar'])){ 
		$editar = false;
	} else {
		$editar = true;
		$editar_movimentacao_id = $_GET['editar'];
		while($linha = mysqli_fetch_array($consulta_movimentacao)){
			if($linha['movimentacao_id'] == $editar_movimentacao_id){
				$movimentacao_id = $linha['movimentacao_id'];
				$movimentacao_data = $linha['movimentacao_data'];
				$movimentacao_descricao = $linha['movimentacao_descricao'];
				$movimento_id = $linha['movimento_id'];
				$conta_id = $linha['conta_id'];
				$movimentacao_valor = $linha['movimentacao_valor'];
				$movimentacao_anexa_id = $linha['movimentacao_anexa_id'];
				$ultima_atualizacao = $linha['ultima_atualizacao'];
				$ativo = $linha['ativo'];
				$movimento_nome = $linha['movimento_nome'];
				$movimento_vinculado_id = $linha['movimento_vinculado_id'];
				$tipo_movimento = $linha['tipo_movimento'];
				$sigla_movimento = $linha['sigla_movimento'];
				$fator_ajuste = $linha['fator_ajuste'];
				$conta_numero = $linha['conta_numero'];
				$agencia_numero = $linha['agencia_numero'];
				$agencia_nome = $linha['agencia_nome'];
				$banco_id = $linha['banco_id'];
				$banco_numero = $linha['banco_numero'];
				$banco_nome = $linha['banco_nome'];
				$banco_nome_reduzido = $linha['banco_nome_reduzido'];
				$banco_logo = $linha['banco_logo'];
				$titular_cpf = $linha['titular_cpf'];
				$titular_nome = $linha['titular_nome'];
				$titular_nome_reduzido = $linha['titular_nome_reduzido'];
			}
		}
	}
?>

<h1>
	<a class="btn btn-lg btn-outline-secondary" href="?pagina=movimentacoes"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
	<?php
		if(!$editar){
			echo 'Inserir nova movimentação';
		}else{
			echo 'Editar movimentacao: "'.$movimento_nome.'"';
		}
	?>
</h1>
<form id="movimentacao_form" class="form-group" method="post" action="<?php if(!$editar){ echo 'processa_movimentacao.php'; }else{ echo 'edita_movimentacao.php'; } ?>">
	<?php
		if($editar)
		{
			echo '<div class="form-group"><input type="hidden" name="movimentacao_id" value="'.$movimentacao_id.'"></div>';
			echo '<div class="form-group"><input type="hidden" name="valor_atual" value="'.$movimentacao_valor.'"></div>';
		}
	?>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Data da movimentação:</label>
		<br>
		<?php
			if(!$editar){
				$data = new DateTime();
			}else{
				$data = new DateTime($movimentacao_data);
			}
		?>
		<input class="form-control" type="date" id="movimentacao_data" name="movimentacao_data" value="<?php echo $data->format('Y-m-d'); ?>" required>
	</div>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Descrição:</label>
		<br>
		<input class="form-control" type="text" name="movimentacao_descricao" value="<?php if($editar){ echo $movimentacao_descricao; } ?>" placeholder="Insira uma descrição para a movimentação" required>
	</div>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Movimento:</label>
		<br>
		<select class="form-control" id="escolha_movimento" name="escolha_movimento" required>
			<?php 
				while($linha2 = mysqli_fetch_array($consulta_movimento)){
					$selected = '';
					$disabled = '';
					$mensagem = '';
					if( $editar && $linha2['movimento_id'] == $movimento_id ){
						$selected = ' selected';
					}
					if( $linha2['ativo'] == 0 ){
						$disabled = ' disabled';
						$mensagem = ' (excluído)';
					}
					echo '<option data-valor-vinculado="'.$linha2['movimento_vinculado_id'].'" value="'.$linha2['movimento_id'].'"'.$disabled.$selected.'>'.$linha2['movimento_nome'].$mensagem.'</option>';
				}
			?>
		</select>
	</div>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Conta:</label>
		<br>
		<select class="form-control" id="escolha_conta" name="escolha_conta" required>
			<?php 
				while($linha3 = mysqli_fetch_array($consulta_conta)){
					$selected = '';
					if( $editar && $linha3['conta_id'] == $conta_id ){
						$selected = ' selected';
					}
					$disabled = '';
					$mensagem = '';
					if( $linha3['ativo'] == 0 ){
						$disabled = ' disabled';
						$mensagem = ' (excluído)';
					}
					$banco = $linha3['banco_nome_reduzido'];
					if( $linha3['banco_nome'] != '' ){
						$banco = $linha3['banco_nome'];
					}
					echo '<option value="'.$linha3['conta_id'].'"'.$disabled.$selected.'>'.$linha3['conta_numero'].' ('.$linha3['agencia_nome'].'; '.$banco.'; '.$linha3['titular_nome_reduzido'].')'.$mensagem.'</option>';
				}
			?>
		</select>
	</div>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Valor:</label>
		<br>
		<input class="form-control" type="number" min="0.00" step="0.01" id="movimentacao_valor" name="movimentacao_valor" value="<?php if($editar){ echo $movimentacao_valor; } else { echo '0'; } ?>" required>
	</div>
	<?php
		if( $editar ){
	?>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Movimentação vinculada:</label>
		<br>
		<select class="form-control" id="escolha_movimentacao_anexa" name="escolha_movimentacao_anexa">
			<?php 
				$val = 0;
				echo '<option value="0">'.$val.' - Nenhum</option>';
				$query = "SELECT `MVTC`.*, `MVNT`.`movimento_nome`, `MVNT`.`movimento_vinculado_id`, `TPMV`.`tipo_movimento`, `TPMV`.`sigla_movimento`, `TPMV`.`fator_ajuste`, `CNTA`.`conta_numero`, `AGNC`.`agencia_numero`, `AGNC`.`agencia_nome`, `AGNC`.`banco_id`, `BNCO`.`banco_numero`, `BNCO`.`banco_nome`, `BNCO`.`banco_nome_reduzido`, `BNCO`.`banco_logo`, `TITL`.`titular_cpf`, `TITL`.`titular_nome`, `TITL`.`titular_nome_reduzido` FROM `t_movimentacao` AS `MVTC` INNER JOIN `t_movimento` AS `MVNT` ON (`MVTC`.`movimento_id` = `MVNT`.`movimento_id`) INNER JOIN `t_tipo_movimento` AS `TPMV` ON (`MVNT`.`tipo_movimento_id` = `TPMV`.`tipo_movimento_id`) INNER JOIN `t_conta` AS `CNTA` ON (`MVTC`.`conta_id` = `CNTA`.`conta_id`) INNER JOIN `t_agencia` AS `AGNC` ON (`CNTA`.`agencia_id` = `AGNC`.`agencia_id`) INNER JOIN `t_banco` AS `BNCO` ON (`AGNC`.`banco_id` = `BNCO`.`banco_id`) INNER JOIN `t_titular` AS `TITL` ON (`CNTA`.`titular_id` = `TITL`.`titular_id`) WHERE `MVTC`.`ativo` = 1 ORDER BY `MVTC`.`movimentacao_data` ASC, `CNTA`.`conta_id` ASC, `TPMV`.`sigla_movimento` ASC, `MVTC`.`movimentacao_valor` DESC";
				$consulta_movimentacao_anexa = mysqli_query($conexao, $query);
				while($linha4 = mysqli_fetch_array($consulta_movimentacao_anexa)){
					if( $linha4['movimentacao_id'] != $movimentacao_id && $linha4['movimento_id'] == $movimento_vinculado_id ){
						$val = $val + 1;
						$disabled = '';
						$mensagem = '';
						$selected = '';
						$movimentacao_descricao_2 = '';
						if ($linha4['ativo'] == 0) {
							$disabled = ' disabled';
							$mensagem = ' (excluído)';
						}
						if( $linha4['movimentacao_id'] == $movimentacao_anexa_id ){
							$selected = ' selected';
						}
						if( $linha4['movimentacao_descricao'] != '' ){
							$movimentacao_descricao_2 = $linha4['movimentacao_descricao'].'; ';
						}
						$data_movimentacao = new DateTime($linha4['movimentacao_data']);
						$movimentacao_nome = $val.' - '.$data_movimentacao->format('d/m/Y').' - '.$linha4['movimento_nome'].' ('.$movimentacao_descricao_2.number_format($linha4['movimentacao_valor'],2,',','.').')';
						echo '<option value="'.$linha4['movimentacao_id'].'"'.$disabled.$selected.'>'.$movimentacao_nome.$mensagem.'</option>';
					}
				}
			?>
		</select>
	</div>
	<?php
		} else {
	?>
			<br>
			<div class="form-group callout" id="movimentacao_anexa">
				<div class="form-group">
					<label class="badge badge-secondary">Vincular à outra conta?</label>
					<select class="form-control" id="select_vincular_outra_conta" name="select_vincular_outra_conta">
						<option value="0">Não</option>
						<option value="1">Sim</option>
					</select>
				</div>
				<div class="form-group callout" id="div_vincular_outra_conta_tipo">
					<div class="btn-group btn-group-toggle" data-toggle="buttons">
					  	<label class="btn btn-secondary active">
					    	<input type="radio" name="vincular_opcoes" id="opcao_criada" value="1" checked> Movimentção já criada
					  	</label>
					  	<label class="btn btn-secondary">
					    	<input type="radio" name="vincular_opcoes" value="2" id="opcao_nova"> Criar nova movimentação
					  	</label>
					</div>
					<div class="form-group callout" id="div_vincular_outra_conta_criada">
						<label class="badge badge-secondary">Movimentação vinculada:</label>
						<br>
						<select class="form-control" id="escolha_movimentacao_anexa" name="escolha_movimentacao_anexa">
							<?php 
								$val = 0;
								echo '<option value="0">'.$val.' - Nenhum</option>';
								$query = "SELECT `MVTC`.*, `MVNT`.`movimento_nome`, `MVNT`.`movimento_vinculado_id`, `TPMV`.`tipo_movimento`, `TPMV`.`sigla_movimento`, `TPMV`.`fator_ajuste`, `CNTA`.`conta_numero`, `AGNC`.`agencia_numero`, `AGNC`.`agencia_nome`, `AGNC`.`banco_id`, `BNCO`.`banco_numero`, `BNCO`.`banco_nome`, `BNCO`.`banco_nome_reduzido`, `BNCO`.`banco_logo`, `TITL`.`titular_cpf`, `TITL`.`titular_nome`, `TITL`.`titular_nome_reduzido` FROM `t_movimentacao` AS `MVTC` INNER JOIN `t_movimento` AS `MVNT` ON (`MVTC`.`movimento_id` = `MVNT`.`movimento_id`) INNER JOIN `t_tipo_movimento` AS `TPMV` ON (`MVNT`.`tipo_movimento_id` = `TPMV`.`tipo_movimento_id`) INNER JOIN `t_conta` AS `CNTA` ON (`MVTC`.`conta_id` = `CNTA`.`conta_id`) INNER JOIN `t_agencia` AS `AGNC` ON (`CNTA`.`agencia_id` = `AGNC`.`agencia_id`) INNER JOIN `t_banco` AS `BNCO` ON (`AGNC`.`banco_id` = `BNCO`.`banco_id`) INNER JOIN `t_titular` AS `TITL` ON (`CNTA`.`titular_id` = `TITL`.`titular_id`) WHERE `MVTC`.`ativo` = 1 AND `MVTC`.`movimentacao_anexa_id` = 0 AND `MVNT`.`movimento_vinculado_id` <> 0 ORDER BY `MVTC`.`movimentacao_data` ASC, `CNTA`.`conta_id` ASC, `TPMV`.`sigla_movimento` ASC, `MVTC`.`movimentacao_valor` DESC";
								$consulta_movimentacao_anexa = mysqli_query($conexao, $query);
								while($linha4 = mysqli_fetch_array($consulta_movimentacao_anexa)){
									$val = $val + 1;
									$disabled = '';
									$mensagem = '';
									$selected = '';
									$movimentacao_descricao_2 = '';
									if ($linha4['ativo'] == 0) {
										$disabled = ' disabled';
										$mensagem = ' (excluído)';
									}
									if( $linha4['movimentacao_id'] == $movimentacao_anexa_id ){
										$selected = ' selected';
									}
									if( $linha4['movimentacao_descricao'] != '' ){
										$movimentacao_descricao_2 = $linha4['movimentacao_descricao'].'; ';
									}
									$data_movimentacao = new DateTime($linha4['movimentacao_data']);
									$movimentacao_nome = $val.' - '.$data_movimentacao->format('d/m/Y').' - '.$linha4['movimento_nome'].' ('.$movimentacao_descricao_2.number_format($linha4['movimentacao_valor'],2,',','.').')';
									echo '<option value="'.$linha4['movimentacao_id'].'"'.$disabled.$selected.'>'.$movimentacao_nome.$mensagem.'</option>';
								}
							?>
						</select>
					</div>
					<div class="form-group callout" id="div_vincular_outra_conta">
						<div class="form-group">
							<label class="badge badge-secondary">Data da movimentação anexa:</label>
							<br>
							<input class="form-control" type="date" id="movimentacao_anexa_data" name="movimentacao_anexa_data" value="<?php echo $data->format('Y-m-d'); ?>">
						</div>
						<br>
						<div class="form-group">
							<label class="badge badge-secondary">Descrição da movimentação anexa:</label>
							<br>
							<input class="form-control" type="text" name="movimentacao_anexa_descricao" value="" placeholder="Insira uma descrição para a movimentação">
						</div>
						<br>
						<div class="form-group">
							<label class="badge badge-secondary">Movimento desta movimentação anexa:</label>
							<br>
							<select class="form-control" id="escolha_movimento_anexa" name="escolha_movimento_anexa" required>
								<?php 
									$query = "SELECT `MVNT`.*, `TPMV`.`tipo_movimento`, `TPMV`.`sigla_movimento`, `TPMV`.`fator_ajuste` FROM `t_movimento` AS `MVNT` INNER JOIN `t_tipo_movimento` AS `TPMV` ON (`MVNT`.`tipo_movimento_id` = `TPMV`.`tipo_movimento_id`) WHERE `MVNT`.`ativo` = 1";
									$consulta_movimento_2 = mysqli_query($conexao, $query);
									while($linha5 = mysqli_fetch_array($consulta_movimento_2)){
										$selected = '';
										$disabled = '';
										$mensagem = '';
										if( $editar && $linha5['movimento_id'] == $movimento_id ){
											$selected = ' selected';
										}
										if( $linha5['ativo'] == 0 ){
											$disabled = ' disabled';
											$mensagem = ' (excluído)';
										}
										echo '<option data-valor-vinculado="'.$linha5['movimento_vinculado_id'].'" value="'.$linha5['movimento_id'].'"'.$disabled.$selected.'>'.$linha5['movimento_nome'].$mensagem.'</option>';
									}
								?>
							</select>
						</div>
						<br>
						<div class="form-group">
							<label class="badge badge-secondary">Conta:</label>
							<br>
							<select class="form-control" id="escolha_conta_anexa" name="escolha_conta_anexa" required>
								<?php 
									$query = "SELECT `CNTA`.*, `AGNC`.`agencia_numero`, `AGNC`.`agencia_nome`, `AGNC`.`banco_id`, `BNCO`.`banco_numero`, `BNCO`.`banco_nome`, `BNCO`.`banco_nome_reduzido`, `TITL`.`titular_cpf`, `TITL`.`titular_nome`, `TITL`.`titular_nome_reduzido` FROM `t_conta` AS `CNTA` INNER JOIN `t_agencia` AS `AGNC` ON (`CNTA`.`agencia_id` = `AGNC`.`agencia_id`) INNER JOIN `t_banco` AS `BNCO` ON (`AGNC`.`banco_id` = `BNCO`.`banco_id`) INNER JOIN `t_titular` AS `TITL` ON (`CNTA`.`titular_id` = `TITL`.`titular_id`) WHERE `CNTA`.`ativo` = 1";
									$consulta_conta_2 = mysqli_query($conexao, $query);
									while($linha6 = mysqli_fetch_array($consulta_conta_2)){
										$selected = '';
										if( $editar && $linha6['conta_id'] == $conta_id ){
											$selected = ' selected';
										}
										$disabled = '';
										$mensagem = '';
										if( $linha6['ativo'] == 0 ){
											$disabled = ' disabled';
											$mensagem = ' (excluído)';
										}
										$banco = $linha6['banco_nome_reduzido'];
										if( $linha6['banco_nome'] != '' ){
											$banco = $linha6['banco_nome'];
										}
										echo '<option value="'.$linha6['conta_id'].'"'.$disabled.$selected.'>'.$linha6['conta_numero'].' ('.$banco.'; '.$linha6['titular_nome_reduzido'].')'.$mensagem.'</option>';
									}
								?>
							</select>
						</div>
						<br>
						<div class="form-group">
							<label class="badge badge-secondary">Valor:</label>
							<br>
							<input class="form-control" type="number" min="0.00" step="0.01" id="movimentacao_anexa_valor" name="movimentacao_anexa_valor" value="<?php if($editar){ echo $movimentacao_valor; } ?>" required readonly>
						</div>
					</div>
				</div>
			</div>
	<?php
		}
	?>
	<br>
	<div class="form-group">
		<?php if( $editar ){ $botao_submit = 'Editar movimentação'; } else { $botao_submit = 'Inserir movimentação'; } ?>
		<input type="submit" class="btn btn-secondary" value="<?php echo $botao_submit; ?>">
	</div>
</form>