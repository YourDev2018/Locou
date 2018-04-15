<?php

      require_once 'FunctionsSession.php';

        $pag = $_GET['pag'];
        $id  = $_GET['id'];

        $session = new FunctionsSession();
        $session-> iniciarSession();
        $session -> logout();
     
         session_destroy();
    
        header('location:'.$pag.'.php?id='.$id);

      

?>