<?php 

include 'db.php';

$movimentacao_id = $_GET['id'];

$query = "UPDATE `t_movimentacao` SET `ativo` = 0 WHERE `movimentacao_id` = $movimentacao_id";
mysqli_query($conexao, $query);

$query = "UPDATE `t_movimentacao` SET `ativo` = 0 WHERE `movimentacao_id` IN(SELECT `movimentacao_id` FROM `t_movimentacao` WHERE `movimentacao_anexa_id` = $movimentacao_id)";
mysqli_query($conexao, $query);
mysqli_query($conexao, "CALL `SP_ATUALIZA_SALDOS`();");

header('location:index.php?pagina=movimentacoes');
