<?php 

include 'db.php';

$conta_numero = $_POST['conta_numero'];
$agencia_id = $_POST['escolha_agencia'];
$titular_id = $_POST['escolha_titular'];

$query = "INSERT INTO `t_conta` (`conta_numero`, `agencia_id`, `titular_id`, `ativo`) VALUES ('$conta_numero', $agencia_id, $titular_id, 1)";

//echo $query;
mysqli_query($conexao, $query);

header('location:index.php?pagina=contas');
