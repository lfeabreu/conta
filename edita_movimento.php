<?php 

include 'db.php';

$movimento_id = $_POST['movimento_id'];
$movimento_nome = $_POST['movimento_nome'];
$tipo_movimento_id = $_POST['escolha_tipo_movimento'];
$movimento_vinculado_id = $_POST['escolha_movimento_vinculado'];

$query = "UPDATE `t_movimento` SET `movimento_nome` = '$movimento_nome', `tipo_movimento_id` = $tipo_movimento_id, `movimento_vinculado_id` = $movimento_vinculado_id WHERE `movimento_id` = $movimento_id";

mysqli_query($conexao, $query);

header('location:index.php?pagina=movimentos');
