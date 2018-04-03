<?php

    require_once 'FunctionsDB.php';
    require_once 'FunctionsSession.php';
    require_once 'Seguranca.php';

    $seg = new Seguranca();
    $db = new FunctionsDB();


    $nome = $seg->filtro($_POST['fora-nome']);
    $email= $seg->filtro($_POST['fora-email']);
    $celular = $seg->filtro($_POST['fora-celular']);
    $cidade = $seg->filtro($_POST['fora-cidade']); 
    $estado = $seg->filtro($_POST['fora-estado']);
    $categoria = $seg->filtro($_POST['fora-categoria']);
    $descricao = $seg->filtro($_POST['fora-descricao']);

    $conn = $db -> conectDB();

    $sql = "INSERT INTO OutrosEstados(nome, cidade, estado, email, celular, tipo, outraInformacao) VALUES ('$nome','$cidade','$estado','$email','$celular','$categoria','$descricao')";

    if ($db->query($sql)===true) {
        $this->closeDB($db);
        return true;
    }else{
        $this->closeDB($db);
        return "Insert failed outros estados";
    }

?>
