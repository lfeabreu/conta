<?php 

include 'db.php';
date_default_timezone_set('America/Sao_Paulo');

$movimentacao_data = $_POST['movimentacao_data'];
$movimentacao_descricao = $_POST['movimentacao_descricao'];
$movimento_id = $_POST['escolha_movimento'];
$conta_id = $_POST['escolha_conta'];
$movimentacao_valor = $_POST['movimentacao_valor'];
$data = new DateTime();
$select_vincular_outra_conta = $_POST['select_vincular_outra_conta'];
$movimentacao_anexa_id = '0';
$vincular_opcoes = $_POST['vincular_opcoes'];
$ultima_atualizacao = $data->format('Y-m-d H:i:s');

if($select_vincular_outra_conta == 1){
	if($vincular_opcoes == 1){
		$movimentacao_anexa_id = $_POST['escolha_movimentacao_anexa'];
	} else {
		$movimentacao_anexa_data = $_POST['movimentacao_anexa_data'];
		$movimentacao_anexa_descricao = $_POST['movimentacao_anexa_descricao'];
		$escolha_movimento_anexa = $_POST['escolha_movimento_anexa'];
		$escolha_conta_anexa = $_POST['escolha_conta_anexa'];
		$movimentacao_anexa_valor = $_POST['movimentacao_anexa_valor'];

		$query = "INSERT INTO `t_movimentacao` (`movimentacao_data`, `movimentacao_descricao`, `movimento_id`, `conta_id`, `movimentacao_valor`, `movimentacao_anexa_id`, `ultima_atualizacao`, `ativo`) VALUES ('$movimentacao_anexa_data', '$movimentacao_anexa_descricao', $escolha_movimento_anexa, $escolha_conta_anexa, $movimentacao_anexa_valor, 0, '$ultima_atualizacao', 1)";
		//echo '<br><br>'.$query;
		mysqli_query($conexao, $query);

		$query = "SELECT MAX(movimentacao_id) AS `MAX_movimentacao_id` FROM `t_movimentacao` WHERE `movimentacao_data` = '$movimentacao_anexa_data' AND `movimentacao_descricao` = '$movimentacao_anexa_descricao' AND `movimento_id` = $escolha_movimento_anexa AND `conta_id` = $escolha_conta_anexa AND `movimentacao_valor` = $movimentacao_anexa_valor AND `movimentacao_anexa_id` = 0 AND `ultima_atualizacao` = '$ultima_atualizacao' AND `ativo` = 1 LIMIT 1";
		//echo '<br><br>'.$query;
		$consulta_ultima_inclusao = mysqli_query($conexao, $query);
		while($linha = mysqli_fetch_array($consulta_ultima_inclusao)){
			$movimentacao_anexa_id = $linha['MAX_movimentacao_id'];
		}
	}
}

/*
echo '<br>movimentacao_data: '.$movimentacao_data;
echo '<br>movimentacao_descricao: '.$movimentacao_descricao;
echo '<br>movimento_id: '.$movimento_id;
echo '<br>conta_id: '.$conta_id;
echo '<br>movimentacao_valor: '.$movimentacao_valor;
echo '<br>select_vincular_outra_conta: '.$select_vincular_outra_conta;
echo '<br>movimentacao_anexa_id: '.$movimentacao_anexa_id;
echo '<br>ultima_atualizacao: '.$ultima_atualizacao;
echo '<br>vincular_opcoes: '.$vincular_opcoes;
*/

$query = "INSERT INTO `t_movimentacao` (`movimentacao_data`, `movimentacao_descricao`, `movimento_id`, `conta_id`, `movimentacao_valor`, `movimentacao_anexa_id`, `ultima_atualizacao`, `ativo`) VALUES ('$movimentacao_data', '$movimentacao_descricao', $movimento_id, $conta_id, $movimentacao_valor, $movimentacao_anexa_id, '$ultima_atualizacao', 1)";
//echo '<br><br>'.$query;
mysqli_query($conexao, $query);

if($select_vincular_outra_conta == 1){
	$query = "SELECT MAX(movimentacao_id) AS `MAX_movimentacao_id` FROM `t_movimentacao` WHERE `movimentacao_data` = '$movimentacao_data' AND `movimentacao_descricao` = '$movimentacao_descricao' AND `movimento_id` = $movimento_id AND `conta_id` = $conta_id AND `movimentacao_valor` = $movimentacao_valor AND `movimentacao_anexa_id` = $movimentacao_anexa_id AND `ultima_atualizacao` = '$ultima_atualizacao' AND `ativo` = 1 LIMIT 1";
	//echo '<br><br>'.$query;
	$consulta_ultima_inclusao = mysqli_query($conexao, $query);
	while($linha = mysqli_fetch_array($consulta_ultima_inclusao)){
		$movimentacao_id = $linha['MAX_movimentacao_id'];
	}
	$query = "UPDATE `t_movimentacao` SET `movimentacao_anexa_id` = $movimentacao_id WHERE `movimentacao_id` = $movimentacao_anexa_id";
	//echo '<br><br>'.$query;
	mysqli_query($conexao, $query);
}
mysqli_query($conexao, "CALL `SP_ATUALIZA_SALDOS`();");

header('location:index.php?pagina=movimentacoes');
