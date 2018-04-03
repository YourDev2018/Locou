<?php

      require_once 'FunctionsSession.php';

        $pag = $_GET['pag'];
        $id  = $_GET['id'];

        $session = new FunctionsSession();
        $session-> iniciarSession();
        $session -> logout();
        $_SESSION['logado'] = null;
        $_SESSION['id'] = null;
        $_SESSION['email']= null;
        $_SESSION['firstName']= null;
        $_SESSION['lastName']= null;
        $_SESSION['dataNascimento']= null;
        $_SESSION['foto']= null;

      session_destroy();
    
        header('location:'.$pag.'.php?id='.$id);

      

?>