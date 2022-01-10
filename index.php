<?php

# Base de dados
include 'db.php';

# Cabeçalho
include 'header.php';

# Conteúdo da página
if(isset($_GET['pagina'])){
	$pagina = $_GET['pagina'];
}
else{
	$pagina = 'home';
}

switch($pagina){
	case 'movimentos': include 'views/view_movimentos.php'; break;
	case 'movimentacoes': include 'views/view_movimentacoes.php'; break;
	case 'titulares': include 'views/view_titulares.php'; break;
	case 'contas': include 'views/view_contas.php'; break;
	case 'agencias': include 'views/view_agencias.php'; break;
	case 'bancos': include 'views/view_bancos.php'; break;

	case 'inserir_movimentacao': include 'views/inserir_movimentacao.php'; break;
	case 'inserir_movimento': include 'views/inserir_movimento.php'; break;
	case 'inserir_titular': include 'views/inserir_titular.php'; break;
	case 'inserir_conta': include 'views/inserir_conta.php'; break;
	case 'inserir_agencia': include 'views/inserir_agencia.php'; break;
	case 'inserir_banco': include 'views/inserir_banco.php'; break;
	
	default: include 'views/view_home.php'; break;
}

# Rodapé
include 'footer.php';
