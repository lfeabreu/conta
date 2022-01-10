<?php 

$servidor = "localhost";
$usuario = "usr_contas";
$senha = "6uHh6xQwgVlqnykd";
$db = "contas";

$conexao = mysqli_connect($servidor, $usuario, $senha, $db);

$query = "SELECT * FROM `t_banco` WHERE `ativo` = 1";
$consulta_banco = mysqli_query($conexao, $query);

$query = "SELECT * FROM `t_titular` WHERE `ativo` = 1";
$consulta_titular = mysqli_query($conexao, $query);

$query = "SELECT * FROM `t_tipo_movimento`";
$consulta_tipo_movimento = mysqli_query($conexao, $query);

$query = "SELECT `MVNT`.*, `TPMV`.`tipo_movimento`, `TPMV`.`sigla_movimento`, `TPMV`.`fator_ajuste`, `MVVC`.`movimento_nome` AS `movimento_vinculado_nome`, `MVVC`.`ativo` AS `movimento_vinculado_ativo` FROM `t_movimento` AS `MVNT` INNER JOIN `t_tipo_movimento` AS `TPMV` ON (`MVNT`.`tipo_movimento_id` = `TPMV`.`tipo_movimento_id`) LEFT OUTER JOIN `t_movimento` AS `MVVC` ON (`MVNT`.`movimento_vinculado_id` = `MVVC`.`movimento_id`) WHERE `MVNT`.`ativo` = 1";
$consulta_movimento = mysqli_query($conexao, $query);

$query = "SELECT `AGNC`.*, `BNCO`.`banco_numero`, `BNCO`.`banco_nome_reduzido` FROM `t_agencia` AS `AGNC` INNER JOIN `t_banco` AS `BNCO` ON (`AGNC`.`banco_id` = `BNCO`.`banco_id`) WHERE `AGNC`.`ativo` = 1";
$consulta_agencia = mysqli_query($conexao, $query);

$query = "SELECT `CNTA`.*, `AGNC`.`agencia_numero`, `AGNC`.`agencia_nome`, `AGNC`.`banco_id`, `BNCO`.`banco_numero`, `BNCO`.`banco_nome`, `BNCO`.`banco_nome_reduzido`, `TITL`.`titular_cpf`, `TITL`.`titular_nome`, `TITL`.`titular_nome_reduzido` FROM `t_conta` AS `CNTA` INNER JOIN `t_agencia` AS `AGNC` ON (`CNTA`.`agencia_id` = `AGNC`.`agencia_id`) INNER JOIN `t_banco` AS `BNCO` ON (`AGNC`.`banco_id` = `BNCO`.`banco_id`) INNER JOIN `t_titular` AS `TITL` ON (`CNTA`.`titular_id` = `TITL`.`titular_id`) WHERE `CNTA`.`ativo` = 1";
$consulta_conta = mysqli_query($conexao, $query);

$query = "SELECT `MVTC`.*, `MVNT`.`movimento_nome`, `MVNT`.`movimento_vinculado_id`, `TPMV`.`tipo_movimento`, `TPMV`.`sigla_movimento`, `TPMV`.`fator_ajuste`, `CNTA`.`conta_numero`, `AGNC`.`agencia_numero`, `AGNC`.`agencia_nome`, `AGNC`.`banco_id`, `BNCO`.`banco_numero`, `BNCO`.`banco_nome`, `BNCO`.`banco_nome_reduzido`, `BNCO`.`banco_logo`, `TITL`.`titular_cpf`, `TITL`.`titular_nome`, `TITL`.`titular_nome_reduzido` FROM `t_movimentacao` AS `MVTC` INNER JOIN `t_movimento` AS `MVNT` ON (`MVTC`.`movimento_id` = `MVNT`.`movimento_id`) INNER JOIN `t_tipo_movimento` AS `TPMV` ON (`MVNT`.`tipo_movimento_id` = `TPMV`.`tipo_movimento_id`) INNER JOIN `t_conta` AS `CNTA` ON (`MVTC`.`conta_id` = `CNTA`.`conta_id`) INNER JOIN `t_agencia` AS `AGNC` ON (`CNTA`.`agencia_id` = `AGNC`.`agencia_id`) INNER JOIN `t_banco` AS `BNCO` ON (`AGNC`.`banco_id` = `BNCO`.`banco_id`) INNER JOIN `t_titular` AS `TITL` ON (`CNTA`.`titular_id` = `TITL`.`titular_id`) WHERE `MVTC`.`ativo` = 1 ORDER BY `MVTC`.`movimentacao_data` ASC, `CNTA`.`conta_id` ASC, `TPMV`.`sigla_movimento` ASC, `MVTC`.`movimentacao_valor` DESC";
$consulta_movimentacao = mysqli_query($conexao, $query);
