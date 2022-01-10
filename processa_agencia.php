<?php 

include 'db.php';

$agencia_numero = $_POST['agencia_numero'];
$agencia_nome = $_POST['agencia_nome'];
$banco_id = $_POST['escolha_banco'];

$query = "INSERT INTO `t_agencia` (`agencia_numero`, `agencia_nome`, `banco_id`, `ativo`) VALUES ('$agencia_numero', '$agencia_nome', $banco_id, 1)";

mysqli_query($conexao, $query);

header('location:index.php?pagina=agencias');
