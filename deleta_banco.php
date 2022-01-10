<?php 

include 'db.php';

$banco_id = $_GET['id'];

$query = "UPDATE `t_banco` SET `ativo` = 0 WHERE `banco_id` = $banco_id";

mysqli_query($conexao, $query);

header('location:index.php?pagina=bancos');
