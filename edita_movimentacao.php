<?php 

include 'db.php';

$movimentacao_id = $_POST['movimentacao_id'];
$movimentacao_data = $_POST['movimentacao_data'];
$movimentacao_descricao = $_POST['movimentacao_descricao'];
$movimento_id = $_POST['escolha_movimento'];
$conta_id = $_POST['escolha_conta'];
$movimentacao_valor = $_POST['movimentacao_valor'];
$valor_atual = $_POST['valor_atual'];
$movimentacao_anexa_id = $_POST['escolha_movimentacao_anexa'];
$data = new DateTime();
$ultima_atualizacao = $data->format('Y-m-d');

//echo 'movimentacao_id: '.$movimentacao_id;
//echo '<br>movimentacao_data: '.$movimentacao_data;
//echo '<br>movimentacao_descricao: '.$movimentacao_descricao;
//echo '<br>movimento_id: '.$movimento_id;
//echo '<br>conta_id: '.$conta_id;
//echo '<br>movimentacao_valor: '.$movimentacao_valor;
//echo '<br>movimentacao_anexa_id: '.$movimentacao_anexa_id;
//echo '<br>ultima_atualizacao: '.$ultima_atualizacao;

$query = "UPDATE `t_movimentacao` SET `movimentacao_data` = '$movimentacao_data', `movimentacao_descricao` = '$movimentacao_descricao', `movimento_id` = $movimento_id, `conta_id` = $conta_id, `movimentacao_valor` = $movimentacao_valor, `movimentacao_anexa_id` = $movimentacao_anexa_id, `ultima_atualizacao` = '$ultima_atualizacao' WHERE `movimentacao_id` = $movimentacao_id";
//echo '<br><br>'.$query;
mysqli_query($conexao, $query);

$query = "UPDATE `t_movimentacao` SET `movimentacao_valor` = $movimentacao_valor, `ultima_atualizacao` = '$ultima_atualizacao' WHERE `movimentacao_id` = $movimentacao_anexa_id";
//echo '<br><br>'.$query;
mysqli_query($conexao, $query);
mysqli_query($conexao, "CALL `SP_ATUALIZA_SALDOS`();");

header('location:index.php?pagina=movimentacoes');
