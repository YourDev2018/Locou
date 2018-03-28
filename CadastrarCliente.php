<?php

    require_once 'Functions.php';
    
    $func = new FunctionsDB();
    $conn = $func ->conectDB();

    $cpf = filtro($_POST['cpf']);
    $telDDD = filtro($_POST['ddd']);
    $telNumero = filtro($_POST['tel']);
    $rua= filtro($_POST['rua']);
    $ruaNumero= filtro($_POST['ruaN']);
    $complemento = filtro($_POST['complemento']);
    $bairro = filtro($_POST['bairro']);
    $cep = filtro($_POST['cep']);
    $cidade = filtro($_POST['cidade']); 
    $estado = filtro($_POST['estado']);

    $func -> cadastrarUsuarioInquilino($conn, $cpf,$telDDD, $telNumero,$rua, $ruaNumero, $complemento, $bairro, $cep, $cidade, $estado);

?>