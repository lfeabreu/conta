<?php 

include 'db.php';

$movimento_id = $_GET['id'];

$query = "UPDATE `t_movimento` SET `ativo` = 0 WHERE `movimento_id` = $movimento_id";

mysqli_query($conexao, $query);

header('location:index.php?pagina=movimentos');
