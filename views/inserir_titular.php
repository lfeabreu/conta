<?php if(!isset($_GET['editar'])){ ?>

<h1>
	<a class="btn btn-lg btn-outline-secondary" href="?pagina=titulares"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
	Inserir novo titular
</h1>
<form class="form-group" method="post" action="processa_titular.php">
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">CPF:</label>
		<br>
		<input class="form-control" type="text" minlength="11" maxlength="11" pattern="[0-9]{11}" name="titular_cpf" placeholder="Insira o CPF do titular da conta" required>
	</div>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Nome:</label>
		<br>
		<input class="form-control" type="text" minlength="15" maxlength="100" name="titular_nome" placeholder="Insira o nome completo do titular da conta" required>
	</div>
	<br>
	<div class="form-group">
		<label class="badge badge-secondary">Nome reduzido:</label>
		<br>
		<input class="form-control" type="text" minlength="3" maxlength="25" name="titular_nome_reduzido" placeholder="Insira um nome reduzido do titular da conta" required>
	</div>
	<br>
	<div class="form-group">
		<input type="submit" class="btn btn-secondary" value="Inserir titular">
	</div>
</form>

<?php } else { ?>
	<?php while($linha = mysqli_fetch_array($consulta_titular)){ ?>
		<?php if($linha['titular_id'] == $_GET['editar']){ ?>
			<h1>
				<a class="btn btn-lg btn-outline-secondary" href="?pagina=titulares"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
				Editar titular <?php echo $linha['titular_nome_reduzido']; ?>
			</h1>
				<form class="form-group" method="post" action="edita_titular.php">
					<br>
					<div class="form-group">
						<label class="badge badge-secondary">CPF:</label>
						<br>
						<input class="form-control" type="text" minlength="11" maxlength="11" pattern="[0-9]{11}" name="titular_cpf" placeholder="Insira o CPF do titular da conta" value="<?php echo $linha['titular_cpf']; ?>" required>
					</div>
					<br>
					<div class="form-group">
						<label class="badge badge-secondary">Nome:</label>
						<br>
						<input class="form-control" type="text" minlength="15" maxlength="100" name="titular_nome" placeholder="Insira o nome completo do titular da conta" value="<?php echo $linha['titular_nome']; ?>" required>
					</div>
					<br>
					<div class="form-group">
						<label class="badge badge-secondary">Nome reduzido:</label>
						<br>
						<input class="form-control" type="text" minlength="3" maxlength="25" name="titular_nome_reduzido" placeholder="Insira um nome reduzido do titular da conta" value="<?php echo $linha['titular_nome_reduzido']; ?>" required>
					</div>
					<br>
					<div class="form-group">
						<input class="btn btn-secondary" type="submit" value="Editar titular">
					</div>
				</form>
			<?php } ?>
	<?php } ?>
<?php } ?>