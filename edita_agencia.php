<?php 

include 'db.php';

$agencia_id = $_POST['agencia_id'];
$agencia_numero = $_POST['agencia_numero'];
$agencia_nome = $_POST['agencia_nome'];
$banco_id = $_POST['escolha_banco'];

$query = "UPDATE `t_agencia` SET `agencia_numero` = $agencia_numero, `agencia_nome` = '$agencia_nome', `banco_id` = '$banco_id' WHERE `agencia_id` = $agencia_id";

#print($query);
mysqli_query($conexao, $query);

header('location:index.php?pagina=agencias');
