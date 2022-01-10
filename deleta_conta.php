<?php 

include 'db.php';

$conta_id = $_GET['id'];

$query = "UPDATE `t_conta` SET `ativo` = 0 WHERE `conta_id` = $conta_id";
mysqli_query($conexao, $query);

header('location:index.php?pagina=contas');