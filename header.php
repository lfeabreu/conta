<!DOCTYPE html>
<html class="w3c" lang="pt" xml:lang="pt" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Contas</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport"  content="width=device-width, initial-scale=1" />
    <meta name="google" content="notranslate" />

    <link rel="shortcut icon" type="image/svg" href="img/logo.svg">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.min.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="css/responsive.dataTables.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	
	<?php
		date_default_timezone_set('America/Sao_Paulo');
		//setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese');
	?>

</head>

<body>
	<header class="sticky-top">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark" role="navigation"><!-- id="menu" -->
				<a class="navbar-brand" href="?pagina=home"><img class="img-fluid float-left" src="img/logo1920x1080.png" title="Logo" alt="Contas" style="height: 80px;"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-label="Alterna navegação">
					<span class="navbar-toggler-icon"></span>
	  			</button>
	  			<div class="collapse navbar-collapse" id="menu">
	  				<ul class="navbar-nav ml-auto">
	  					<li class="nav-item active">
	  						<a class="nav-link" href="?pagina=movimentacoes">Movimentação</a>
	  					</li>
	  					<li class="nav-item dropdown">
	  						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cadastros</a>
	  						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	  							<a class="dropdown-item" href="?pagina=bancos">Bancos</a>
	  							<a class="dropdown-item" href="?pagina=agencias">Agências</a>
	  							<a class="dropdown-item" href="?pagina=contas">Contas</a>
	  							<a class="dropdown-item" href="?pagina=titulares">Titulares</a>
	  							<a class="dropdown-item" href="?pagina=movimentos">Movimentos</a>
	  						</div>
	  					</li>
	  				</ul>
	  			</div>
			</nav>
		</div>
	</header>
	<div id="conteudo" class="container content">