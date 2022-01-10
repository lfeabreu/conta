<?php 

include 'db.php';

$agencia_id = $_GET['id'];

$query = "UPDATE `t_agencia` SET `ativo` = 0 WHERE `agencia_id` = $agencia_id";

mysqli_query($conexao, $query);

header('location:index.php?pagina=agencias');
