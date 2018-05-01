<?php
require_once 'Seguranca.php';
require_once 'Functions.php';

$seg = new Seguranca();
$name = $seg->filtro($_POST['nomeC']);
$dia = $seg->filtro($_POST['dia']);
$mes = $seg->filtro($_POST['mes']);
$ano = $seg->filtro($_POST['ano']);
$cpf = $seg->filtro($_POST['cpf']);
$dd = $seg->filtro($_POST['ddd']);
$telefone = $seg->filtro($_POST['telefone']);
$cidade = $seg->filtro($_POST['cidade']);
$bairro = $seg->filtro($_POST['bairro']);
$rua = $seg->filtro($_POST['rua']);
$numero = $seg->filtro($_POST['nRua']);
$complemento = $seg->filtro($_POST['complemento']);
$cep = $seg->filtro($_POST['cep']);
$estado = $seg->filtro($_POST['estado']);
$pais = $seg->filtro($_POST['pais']);
//$orderId = $seg->filtro($_POST['orderID']);


print $hash = $_POST['hash'];
$hash = "FeB6gjK0itpEntndabC6Aw4G7GXmo6Cg1cqILKZOVWttcU2zu30MYrNDSC/exdF7UAhVccvR/zol67Lvoo5/ysaQF46wdCGMvRy1QBnlJS9atYw4FRd8CH5ZXpZhOmLS19toyqr8GlAOOjELGxpXmhucSDBCOEMY6QurrNW265utLAoSKClKw5GzlD6UYf8LKCZmJ6jON0u3vrs1PgvPjkK40hvxS9V1ZbYCJ7hgZYVcT5eCO3lpuGNQVR4Z2AIgcFU7KVscYShpb7ZL2VTubzhCv2xWjStpPXUf4rTksp3nweHP2am2rtRuRT7NM20K38Cg+3xGN7wxniWgIAG1WA==";

$func = new Functions();
$func->pagamentoCartaoCredito($hash,$orderId,$nomePortador,$nascimentoPortador,$cpfPortador,$ddd,$numero,$cidade,$bairro,$rua,$estado,$cep);


?>
