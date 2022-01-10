<?php 

include 'db.php';

$banco_numero = $_POST['banco_numero'];
$banco_nome = $_POST['banco_nome'];
$banco_nome_reduzido = $_POST['banco_nome_reduzido'];
$banco_nome_extenso = $_POST['banco_nome_extenso'];

$query = "INSERT INTO `t_banco` (`banco_numero`, `banco_nome`, `banco_nome_reduzido`, `banco_nome_extenso`, `ativo`) VALUES ($banco_numero, '$banco_nome', '$banco_nome_reduzido', '$banco_nome_extenso', 1)";
mysqli_query($conexao, $query);

header('location:index.php?pagina=bancos');
