<?php 

include 'db.php';

$banco_id = $_POST['banco_id'];
$banco_numero = $_POST['banco_numero'];
$banco_nome = $_POST['banco_nome'];
$banco_nome_reduzido = $_POST['banco_nome_reduzido'];
$banco_nome_extenso = $_POST['banco_nome_extenso'];

$query = "UPDATE `t_banco` SET `banco_numero` = $banco_numero, `banco_nome` = '$banco_nome', `banco_nome_reduzido` = '$banco_nome_reduzido', `banco_nome_extenso` = '$banco_nome_extenso' WHERE `banco_id` = $banco_id";

mysqli_query($conexao, $query);

header('location:index.php?pagina=bancos');
