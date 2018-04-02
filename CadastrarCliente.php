<?php

    require_once 'Functions.php';
     require_once 'Seguranca.php';
    
    $func = new FunctionsDB();
    $conn = $func ->conectDB();

    $seg = new Seguranca();

    $cpf = $seg->filtro($_POST['cpf']);
    $telDDD = $seg->filtro($_POST['ddd']);
    $telNumero = $seg->filtro($_POST['tel']);
    $rua= $seg->filtro($_POST['rua']);
    $ruaNumero= $seg->filtro($_POST['ruaN']);
    $complemento = $seg->filtro($_POST['complemento']);
    $bairro = $seg->filtro($_POST['bairro']);
    $cep = $seg->filtro($_POST['cep']);
    $cidade = $seg->filtro($_POST['cidade']); 
    $estado = $seg->filtro($_POST['estado']);

    $func -> cadastrarUsuarioInquilino($conn, $cpf,$telDDD, $telNumero,$rua, $ruaNumero, $complemento, $bairro, $cep, $cidade, $estado);

?>