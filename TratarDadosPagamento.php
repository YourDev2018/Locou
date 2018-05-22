<?php
require_once 'Seguranca.php';
require_once 'functions.php';

$seg = new Seguranca();
$name = $seg->filtro($_POST['nomeC']);
$dia = $seg->filtro($_POST['dia']);
$mes = $seg->filtro($_POST['mes']);
$ano = $seg->filtro($_POST['ano']);
$cpf = $seg->filtro($_POST['cpf']);
$nascimento = $ano.'-'.$mes.'-'.$dia;

$ddd = $seg->filtro($_POST['ddd']);
$telefone = $seg->filtro($_POST['telefone']);
$cidade = $seg->filtro($_POST['cidade']);
$bairro = $seg->filtro($_POST['bairro']);
$rua = $seg->filtro($_POST['rua']);
$numero = $seg->filtro($_POST['nRua']);
$complemento = $seg->filtro($_POST['complemento']);
$cep = $seg->filtro($_POST['cep']);
$estado = $seg->filtro($_POST['estado']);
$pais = $seg->filtro($_POST['pais']);

$orderId = $seg->filtro($_GET['orderID']);

$hash = $_POST['hash'];

$func = new functions();
//print $func->pagamentoCartaoCredito($hash,$orderId,$nomePortador,$nascimentoPortador,$cpfPortador,$ddd,$numero,$cidade,$bairro,$rua,$estado,$cep);
$func->pagamentoCartaoCredito($hash,$orderId,$name,$nascimento,$cpf,$ddd,$numero,$cidade,$bairro,$rua,$estado,$cep);

// pedido foi pago, enviar um email dizendo que o pedido foi pago, esperando aprovação.
    

?>
