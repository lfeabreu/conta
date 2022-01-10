<?php 

include 'db.php';

$titular_id = $_POST['titular_id'];
$titular_cpf = $_POST['titular_cpf'];
$titular_nome = $_POST['titular_nome'];
$titular_nome_reduzido = $_POST['titular_nome_reduzido'];

$query = "UPDATE `t_titular` SET `titular_cpf` = '$titular_cpf', `titular_nome` = '$titular_nome', `titular_nome_reduzido` = '$titular_nome_reduzido' WHERE `titular_id` = $titular_id";

mysqli_query($conexao, $query);

header('location:index.php?pagina=titulares');
