<?php if(!isset($_GET['editar'])){ ?>

<h1>
	<a class="btn btn-lg btn-outline-secondary" href="?pagina=movimentos"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
	Inserir novo movimento
</h1>
<form class="form-group" method="post" action="processa_movimento.php">
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Nome do movimento:</label>
		<br>
		<input class="form-control" type="text" minlength="0" maxlength="50" name="movimento_nome" placeholder="Insira o nome do movimento" required>
	</div>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Tipo do movimento:</label>
		<br>
		<select class="form-control" id="escolha_tipo_movimento" name="escolha_tipo_movimento" required>
			<?php 
				while($linha2 = mysqli_fetch_array($consulta_tipo_movimento)){
					echo '<option value="'.$linha2['tipo_movimento_id'].'">'.$linha2['tipo_movimento'].'</option>';
				}
			?>
		</select>
	</div>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Movimento vinculado:</label>
		<br>
		<select class="form-control" id="escolha_movimento_vinculado" name="escolha_movimento_vinculado" required>
			<?php 
				echo '<option value="0">Nenhum</option>';
				while($linha2 = mysqli_fetch_array($consulta_movimento)){
					if ($linha2['ativo'] == 0) {
						$disabled = ' disabled';
						$mensagem = ' (excluído)';
					} else {
						$disabled = '';
						$mensagem = '';
					}
					if($linha2['movimento_id'] != $linha['movimento_id']){
						echo '<option value="'.$linha2['movimento_id'].'"'.$disabled.'>'.$linha2['movimento_nome'].$mensagem.'</option>';
					}
				}
			?>
		</select>
	</div>
	<br>
	<div class="form-group">
		<input type="submit" class="btn btn-secondary" value="Inserir movimento">
	</div>
</form>

<?php } else { ?>
	<?php while($linha = mysqli_fetch_array($consulta_movimento)){ ?>
		<?php if($linha['movimento_id'] == $_GET['editar']){ ?>
			<h1>
				<a class="btn btn-lg btn-outline-secondary" href="?pagina=movimentos"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
				Editar movimento "<?php echo $linha['movimento_nome']; ?>"
			</h1>
				<form class="form-group" method="post" action="edita_movimento.php">
					<div class="form-group">
						<input type="hidden" name="movimento_id" value="<?php echo $linha['movimento_id']; ?>">
					</div>
					<br>
					<div class="form-group">
						<label class="badge badge-secondary">Nome do movimento:</label>
						<br>
						<input class="form-control" type="text" minlength="0" maxlength="50" name="movimento_nome" placeholder="Insira o nome do movimento" value="<?php echo $linha['movimento_nome']; ?>" required>
					</div>
					<br>
					<div class="form-group">
						<label class="badge badge-secondary">Tipo do movimento:</label>
						<br>
						<select class="form-control" id="escolha_tipo_movimento" name="escolha_tipo_movimento" required>
							<?php 
								while($linha2 = mysqli_fetch_array($consulta_tipo_movimento)){
									$selected = '';
									if($linha['tipo_movimento_id'] == $linha2['tipo_movimento_id']){
										$selected = ' selected';
									}
									echo '<option value="'.$linha2['tipo_movimento_id'].'"'.$selected.'>'.$linha2['tipo_movimento'].'</option>';
								}
							?>
						</select>
					</div>
					<br>
					<div class="form-group">
						<label class="badge badge-secondary">Movimento vinculado:</label>
						<br>
						<select class="form-control" id="escolha_movimento_vinculado" name="escolha_movimento_vinculado" required>
							<option value="0">Nenhum</option>
							<?php 
								$query = "SELECT * FROM `t_movimento` WHERE `ativo` = 1 AND `movimento_id` <> ".$linha['movimento_id'];
								$consulta_movimento2 = mysqli_query($conexao, $query);
								while($linha2 = mysqli_fetch_array($consulta_movimento2)){
									if ($linha2['ativo'] == 0) {
										$disabled = ' disabled';
										$mensagem = ' (excluído)';
									} else {
										$disabled = '';
										$mensagem = '';
									}
									$selected = '';
									if($linha2['movimento_id'] == $linha['movimento_vinculado_id']){
										$selected = ' selected';
									}
									echo '<option value="'.$linha2['movimento_id'].'"'.$disabled.$selected.'>'.$linha2['movimento_nome'].$mensagem.'</option>';
								}
							?>
						</select>
					</div>
					<br>
					<div class="form-group">
						<input class="btn btn-secondary" type="submit" value="Editar movimento">
					</div>
				</form>
			<?php } ?>
	<?php } ?>
<?php } ?>