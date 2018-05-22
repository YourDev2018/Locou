<?php

    require_once 'FunctionsDB.php';
     require_once 'Seguranca.php';
    
    $db = new FunctionsDB();
    $conn = $db ->conectDB();

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

    $db -> cadastrarUsuarioInquilino($conn, $cpf,$telDDD, $telNumero,$rua, $ruaNumero, $complemento, $bairro, $cep, $cidade, $estado);

?>