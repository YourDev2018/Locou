<?php

    require_once 'FunctionsDB.php';
    require_once 'FunctionsSession.php';
    require_once 'Seguranca.php';


    $db = new FunctionsDB();
    $conn = $db->conectDB();
    
    $session = new FunctionsSession();


    if ($session->vereficarLogin() == false) {

         $seg = new Seguranca();
         $email = $seg->filtro($_POST['email']);
         $senha = $seg->filtro($_POST['senha']);

         $db -> loginEmailSenha($conn,$email,$senha);
        echo true;
    }else {
        echo false;
    }

   
    

?>