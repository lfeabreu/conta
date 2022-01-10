<?php 

include 'db.php';

$conta_id = $_POST['conta_id'];
$conta_numero = $_POST['conta_numero'];
$agencia_id = $_POST['escolha_agencia'];
$titular_id = $_POST['escolha_titular'];

$query = "UPDATE `t_conta` SET `conta_numero` = $conta_numero, `agencia_id` = $agencia_id, `titular_id` = $titular_id WHERE `conta_id` = $conta_id";
mysqli_query($conexao, $query);

header('location:index.php?pagina=contas');
