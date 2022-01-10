<?php 

include 'db.php';

$titular_id = $_GET['id'];

$query = "UPDATE `t_titular` SET `ativo` = 0 WHERE `titular_id` = $titular_id";

mysqli_query($conexao, $query);

header('location:index.php?pagina=titulares');
