<?php if(!isset($_GET['editar'])){ ?>

<h1>
	<a class="btn btn-lg btn-outline-secondary" href="?pagina=agencias"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
	Inserir nova agência
</h1>
<form class="form-group" method="post" action="processa_agencia.php">
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Número da agência:</label>
		<br>
		<input id="agencia_numero" class="form-control" type="number" min="0" max="9999" name="agencia_numero" required>
	</div>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Nome da agência:</label>
		<br>
		<input class="form-control" type="text" minlength="3" maxlength="50" name="agencia_nome" placeholder="Insira o nome da agência" required>
	</div>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Banco:</label>
		<br>
		<select class="form-control" id="escolha_banco" name="escolha_banco" required>
			<?php 
				while($linha2 = mysqli_fetch_array($consulta_banco)){
					if ($linha2['ativo'] == 0) {
						$disabled = ' disabled';
						$mensagem = ' (excluído)';
					} else {
						$disabled = '';
						$mensagem = '';
					}
					echo '<option value="'.$linha2['banco_id'].'"'.$disabled.'>'.$linha2['banco_numero'].' - '.$linha2['banco_nome_reduzido'].$mensagem.'</option>';
				}
			?>
		</select>
	</div>
	<br>
	<div class="form-group">
		<input type="submit" class="btn btn-secondary" value="Inserir agência">
	</div>
</form>

<?php } else { ?>
	<?php while($linha = mysqli_fetch_array($consulta_agencia)){ ?>
		<?php if($linha['agencia_id'] == $_GET['editar']){ ?>
			<h1>
				<a class="btn btn-lg btn-outline-secondary" href="?pagina=agencias"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
				Editar agência "<?php echo $linha['agencia_numero'].' - '.$linha['agencia_nome']; ?>"
			</h1>
				<form class="form-group" method="post" action="edita_agencia.php">
					<div class="form-group">
						<input type="hidden" name="agencia_id" value="<?php echo $linha['agencia_id']; ?>">
					</div>
					<br>
					<div class="form-group">
						<label class="badge badge-secondary">Número da agência:</label>
						<br>
						<input id="agencia_numero" class="form-control" type="number" min="0" max="9999" name="agencia_numero" value="<?php echo $linha['agencia_numero']; ?>" required>
					</div>
					<br>
					<div class="form-group">
						<label class="badge badge-secondary">Nome da agência:</label>
						<br>
						<input class="form-control" type="text" minlength="3" maxlength="50" name="agencia_nome" placeholder="Insira o nome da agência" value="<?php echo $linha['agencia_nome']; ?>" required>
					</div>
					<br>
					<div class="form-group">
						<label class="badge badge-secondary">Banco:</label>
						<br>
						<select class="form-control" id="escolha_banco" name="escolha_banco" required>
							<?php 
								while($linha2 = mysqli_fetch_array($consulta_banco)){
									if ($linha2['ativo'] == 0) {
										$disabled = ' disabled';
										$mensagem = ' (excluído)';
									} else {
										$disabled = '';
										$mensagem = '';
									}
									$selected = '';
									if ($linha['banco_id'] == $linha2['banco_id']){
										$selected = ' selected';
									}
									echo '<option value="'.$linha2['banco_id'].'"'.$disabled.$selected.'>'.$linha2['banco_numero'].' - '.$linha2['banco_nome_reduzido'].$mensagem.'</option>';
								}
							?>
						</select>
					</div>
					<br>
					<div class="form-group">
						<input class="btn btn-secondary" type="submit" value="Editar agência">
					</div>
				</form>
			<?php } ?>
	<?php } ?>
<?php } ?>