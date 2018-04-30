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
$orderId = $seg->filtro($_POST['orderID']);

$hash;

$func = new Functions();
//$func->pagamentoCartaoCredito($hash,$orderId);


?>
