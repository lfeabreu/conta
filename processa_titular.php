<?php 

include 'db.php';

$titular_cpf = $_POST['titular_cpf'];
$titular_nome = $_POST['titular_nome'];
$titular_nome_reduzido = $_POST['titular_nome_reduzido'];

$query = "INSERT INTO `t_titular` (`titular_cpf`, `titular_nome`, `titular_nome_reduzido`, `ativo`) VALUES('$titular_cpf', '$titular_nome', '$titular_nome_reduzido', 1)";

mysqli_query($conexao, $query);

header('location:index.php?pagina=titulares');
