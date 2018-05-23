<?php

    require_once 'FunctionsDB.php';
    require_once 'FunctionsSession.php';
    require_once 'Seguranca.php';


    $db = new FunctionsDB();
    $conn = $db->conectDB();
    
    $session = new FunctionsSession();


     $pag = $_GET['pag'].".php";
     $id = $_GET['id'];
     $local = '#'.$_GET['local'];


    if ($session->vereficarLogin() == 'false') {

         $seg = new Seguranca();
         $session-> iniciarSession();
        if ($_POST['email'] == null || $_POST['senha'] == null || $_POST['email'] == "" || $_POST['senha'] == "" ) {
            header('Location: '.$pag."?funcao=login&status=false&id=$id");
           // print "vazio";
            return;
        }

         $email = $seg->filtro($_POST['email']);
         $senha = md5($seg->filtro($_POST['senha']));

         $result = $db -> loginEmailSenha($conn,$email,$senha);
         
         if ($result == true) {
            
          #  echo $pag."?status=true&id=$id$local";
          #  exit();

            if($pag == 'anuncio.php'){


                header('Location:'.$pag."?status=true&id=$id"."$local");

            }else{

                header('Location:'.$pag."?status=true&id=$id");
            }

             //print "sucesso";
        }else{
         //    header("Location: http://localhost/YourDev/locou/'.$pag.?status=false&email=".$_POST['email']); setando email
                header('Location:'.$pag."?funcao=login&status=false&id=".$id."erro=informacoeserradas");
            // print "errado";
        }  
         
    }else {
         header('Location:'.$pag."?funcao=login&status=false&id=".$id."&erro=estalogado");
        // print "ja logado";
    }


    

?>