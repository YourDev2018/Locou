<?php

    require_once 'FunctionsDB.php';
    require_once 'FunctionsSession.php';
    require_once 'Seguranca.php';


    $db = new FunctionsDB();
    $conn = $db->conectDB();
    
    $session = new FunctionsSession();

    $pag = $_GET['pag'].".php";


    if ($session->vereficarLogin() == false) {

         $seg = new Seguranca();

        if ($_POST['email'] == null || $_POST['senha'] == null || $_POST['email'] == "" || $_POST['senha'] == ""  ) {
            header('Location: http://localhost/YourDev/locou/'.$pag);
           // print "vazio";
            return;
        }

         $email = $seg->filtro($_POST['email']);
         $senha = md5($seg->filtro($_POST['senha']));

         $result = $db -> loginEmailSenha($conn,$email,$senha);
         
         if ($result == true) {
             header('Location: http://localhost/YourDev/locou/'.$pag.'?status=true');
             //print "sucesso";
        }else{
             header("Location: http://localhost/YourDev/locou/'.$pag.?status=false&email=".$_POST['email']);
            // print "errado";
        }  
         
    }else {
        return  header('Location: http://localhost/YourDev/locou/'.$pag);
        // print "ja logado";
    }

   
    

?>