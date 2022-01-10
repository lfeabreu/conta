<?php if(!isset($_GET['editar'])){ ?>

<h1>
	<a class="btn btn-lg btn-outline-secondary" href="?pagina=contas"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
	Inserir nova conta corrente
</h1>
<form class="form-group" method="post" action="processa_conta.php">
	<div class="form-group">
		<label class="badge badge-secondary">Número da conta com dígito:</label>
		<br>
		<input class="form-control" type="text" min="1" maxlength="15" size="15" id="conta_numero" name="conta_numero" pattern="[0-9]{1,13}\-[0-9]{1,2}" required>
	</div>
	<br>
	<div class="form-group" visible="false">
		<label class="badge badge-secondary">Agência:</label>
		<br>
		<select class="form-control" id="escolha_agencia" name="escolha_agencia" required>
			<?php 
				while($linha2 = mysqli_fetch_array($consulta_agencia)){
					if ($linha2['ativo'] == 0) {
						$disabled = ' disabled';
						$mensagem = ' (excluído)';
					} else {
						$disabled = '';
						$mensagem = '';
					}
					echo '<option value="'.$linha2['agencia_id'].'"'.$disabled.'>'.$linha2['agencia_numero'].' - '.$linha2['agencia_nome'].' ('.$linha2['banco_numero'].' - '.$linha2['banco_nome_reduzido'].')'.$mensagem.'</option>';
				}
			?>
		</select>
	</div>
	<br>
	<div class="form-group" visible="false">
		<label class="badge badge-secondary">Titular:</label>
		<br>
		<select class="form-control" id="escolha_titular" name="escolha_titular" required>
			<?php 
				while($linha3 = mysqli_fetch_array($consulta_titular)){
					if ($linha3['ativo'] == 0) {
						$disabled = ' disabled';
						$mensagem = ' (excluído)';
					} else {
						$disabled = '';
						$mensagem = '';
					}
					echo '<option value="'.$linha3['titular_id'].'"'.$disabled.'>'.$linha3['titular_cpf'].' - '.$linha3['titular_nome'].$mensagem.'</option>';
				}
			?>
		</select>
	</div>
	<br>
	<div class="form-group">
		<input class="btn btn-outline-secondary" type="submit" value="Inserir conta">
	</div>
</form>
<?php } else { ?>
	<?php while($linha = mysqli_fetch_array($consulta_conta)){ ?>
		<?php if($linha['conta_id'] == $_GET['editar']){ ?>
			<h1>
				<a class="btn btn-lg btn-outline-secondary" href="?pagina=contas"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
				Editar a conta: "<?php echo $linha['conta_numero']; ?>"
			</h1>
			<form class="form-group" method="post" action="edita_conta.php">
				<div class="form-group">
					<label class="badge badge-secondary">Número da conta:</label>
					<br>
					<input class="form-control" type="text" min="1" maxlength="15" id="conta_numero" name="conta_numero" pattern="[0-9]{1,}+\-[0-9X]{1}" value="<?php echo $linha['conta_numero']; ?>" required>
				</div>
				<br>
				<div class="form-group" visible="false">
					<label class="badge badge-secondary">Agência:</label>
					<br>
					<select class="form-control" id="escolha_agencia" name="escolha_agencia" required>
						<?php 
							while($linha2 = mysqli_fetch_array($consulta_agencia)){
								if ($linha2['ativo'] == 0) {
									$disabled = ' disabled';
									$mensagem = ' (excluído)';
								} else {
									$disabled = '';
									$mensagem = '';
								}
								$selected = '';
								if ($linha2['agencia_id'] == $linha['agencia_id']) {
									$selected = ' selected';
								}
								echo '<option value="'.$linha2['agencia_id'].'"'.$disabled.$selected.'>'.$linha2['agencia_numero'].' - '.$linha2['agencia_nome'].' ('.$linha2['banco_numero'].' - '.$linha2['banco_nome_reduzido'].')'.$mensagem.'</option>';
							}
						?>
					</select>
				</div>
				<br>
				<div class="form-group" visible="false">
					<label class="badge badge-secondary">Titular:</label>
					<br>
					<select class="form-control" id="escolha_titular" name="escolha_titular" required>
						<?php 
							while($linha3 = mysqli_fetch_array($consulta_titular)){
								if ($linha3['ativo'] == 0) {
									$disabled = ' disabled';
									$mensagem = ' (excluído)';
								} else {
									$disabled = '';
									$mensagem = '';
								}
								$selected = '';
								if ($linha3['titular_id'] == $linha['titular_id']) {
									$selected = ' selected';
								}
								echo '<option value="'.$linha3['titular_id'].'"'.$disabled.$selected.'>'.$linha3['titular_cpf'].' - '.$linha3['titular_nome'].$mensagem.'</option>';
							}
						?>
					</select>
				</div>
				<br>
				<div class="form-group">
					<input class="btn btn-outline-secondary" type="submit" value="Editar conta">
				</div>
			</form>
		<?php } ?>
	<?php } ?>
<?php } ?>
