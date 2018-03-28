<?php

    require_once 'Functions.php';
    
    $func = new FunctionsDB();
    $conn = $func ->conectDB();

    $cpf = filtro($_POST['']);
    $telDDD = filtro($_POST['']);
    $telNumero = filtro($_POST['']);
    $rua= filtro($_POST['']);
    $ruaNumero= filtro($_POST['']);
    $complemento = filtro($_POST['']);
    $bairro = filtro($_POST['']);
    $cep = filtro($_POST['']);
    $cidade = filtro($_POST['']); 
    $estado = filtro($_POST['']);

    $func -> cadastrarUsuarioInquilino($conn, $cpf,$telDDD, $telNumero,$rua, $ruaNumero, $complemento, $bairro, $cep, $cidade, $estado);

?>