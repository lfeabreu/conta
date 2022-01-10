<?php if(!isset($_GET['editar'])){ ?>

<h1>
	<a class="btn btn-lg btn-outline-secondary" href="?pagina=bancos"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
	Inserir novo banco
</h1>
<form class="form-group" method="post" action="processa_banco.php">
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Número do banco (BACEN):</label>
		<br>
		<input class="form-control" type="number" min="0" max="999" name="banco_numero" required>
	</div>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Nome do banco:</label>
		<br>
		<input class="form-control" type="text" maxlength="50" name="banco_nome" placeholder="Insira o nome do banco" required>
	</div>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Nome reduzido do banco (BACEN):</label>
		<br>
		<input class="form-control" type="text" maxlength="100" name="banco_nome_reduzido" placeholder="Insira o nome abreviado do banco" required>
	</div>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Nome extenso do banco (BACEN):</label>
		<br>
		<input class="form-control" type="text" maxlength="100" name="banco_nome_extenso" placeholder="Insira o nome completo do banco" required>
	</div>
	<br>
	<div class="form-group">
		<input class="btn btn-lg btn-block btn-secondary" type="submit" value="Inserir banco">
	</div>
</form>

<?php } else { ?>
	<?php while($linha = mysqli_fetch_array($consulta_banco)){ ?>
		<?php if($linha['banco_id'] == $_GET['editar']){ ?>
			<h1>
				<a class="btn btn-lg btn-outline-secondary" href="?pagina=bancos"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
				Editar o banco: "<?php echo $linha['banco_nome_reduzido']; ?>"
			</h1>
			<form class="form-group" method="post" action="edita_banco.php">
				<div class="form-group">
					<input type="hidden" name="banco_id" value="<?php echo $linha['banco_id']; ?>">
				</div>
				<br>
				<div class="form-group">
					<label class="badge badge-secondary">Número do banco (BACEN):</label>
					<br>
					<input class="form-control" type="number" min="0" max="999" name="banco_numero" value="<?php echo $linha['banco_numero']; ?>" required>
				</div>
				<br>
				<div class="form-group">
					<label class="badge badge-secondary">Nome do banco:</label>
					<br>
					<input class="form-control" type="text" maxlength="50" name="banco_nome" placeholder="Insira o nome do banco" value="<?php echo $linha['banco_nome']; ?>" required>
				</div>
				<br>
				<div class="form-group">
					<label class="badge badge-secondary">Nome reduzido do banco (BACEN):</label>
					<br>
					<input class="form-control" type="text" maxlength="100" name="banco_nome_reduzido" placeholder="Insira o nome abreviado do banco" value="<?php echo $linha['banco_nome_reduzido']; ?>" required>
				</div>
				<br>
				<div class="form-group">
					<label class="badge badge-secondary">Nome extenso do banco (BACEN):</label>
					<br>
					<input class="form-control" type="text" maxlength="100" name="banco_nome_extenso" placeholder="Insira o nome completo do banco" value="<?php echo $linha['banco_nome_reduzido']; ?>" required>
				</div>
				<br>
				<div class="form-group">
					<input class="btn btn-lg btn-block btn-secondary" type="submit" value="Editar banco">
				</div>
			</form>
		<?php } ?>
	<?php } ?>
<?php } ?>
