<?php 

include 'db.php';

$movimento_nome = $_POST['movimento_nome'];
$tipo_movimento_id = $_POST['escolha_tipo_movimento'];
$movimento_vinculado_id = $_POST['escolha_movimento_vinculado'];

$query = "INSERT INTO `t_movimento` (`movimento_nome`, `tipo_movimento_id`, `movimento_vinculado_id`, `ativo`) VALUES ('$movimento_nome', $tipo_movimento_id, $movimento_vinculado_id, 1)";

mysqli_query($conexao, $query);

header('location:index.php?pagina=movimentos');
