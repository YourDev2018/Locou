<?php

    require_once 'FunctionsDB.php';
    require_once 'FunctionsSession.php';
    require_once 'Seguranca.php';


    $db = new FunctionsDB();
    $conn = $db->conectDB();
    
    $session = new FunctionsSession();
    $session -> iniciarSession();

    $pag = $_GET['pag'].".php";
    $id = $_GET['id'];

    if ($session->vereficarLogin() == false) {

        $seg = new Seguranca();

        $email = $seg->filtro4($_POST['email'],$pag,$id );
        $senha = $seg->filtro4($_POST['senha'],$pag,$id );
        $first = $seg->filtro4($_POST['nome'],$pag,$id );
        $last = $seg->filtro4($_POST['sobrenome'],$pag,$id );
        $dia = $seg->filtro($_POST['dia'],$pag,$id ); 
        $mes = $seg->filtro($_POST['mes'],$pag,$id ); 
        $ano = $seg->filtro($_POST['ano'],$pag,$id ); 

        $nascimento = $ano."-".$mes."-".$dia;
        $seg->filtro4($_FILES['foto']['name'], $pag);


        $ext = strtolower(substr($_FILES['foto']['name'],-4));
        $temp = $_FILES['foto']['tmp_name'];
        $novo_nome = md5(time().$temp).$ext;

        $aux = $db -> cadastrarUsuarioBasico($conn, $email,$senha, $first, $last, $nascimento, $novo_nome);
        
        if ($aux) {

             $ext = strtolower(substr($_FILES['foto']['name'],-4));
             

            $servidor = 'yourdev-com-br.umbler.net'; // Endereço
            $usuario = 'yourdev-com-br'; // Usuário
            $senha = 'yourdev2017'; // Senh

             if (!$ftp = ftp_connect($servidor)){
                 print "erro";
                 exit();
             } // Retorno: true ou false


             $login = ftp_login($ftp, $usuario, $senha); // Retorno: true ou fals

              $local_arquivo = $temp; // Localização (local)
              $ftp_pasta = '/public/clientes/locou/img/anuncio/'; // Pasta (externa)
              $ftp_arquivo = $_FILES['foto']['name']; // Nome do arquivo (externo)
              $envio = ftp_put($ftp, $ftp_pasta.$novo_nome, $local_arquivo, FTP_BINARY);
              ftp_close($ftp);
              
              header("Location: ".$pag."?status=true&id=$id");
              return;
              
        }else {
            header('Location:'.$pag."?funcao=cadastro&status=false&id=$id");
             return;
        }

    }else {
       header('Location:'.$pag."?funcao=cadastro&status=false&id=$id");
        return;
    }

   
    

?>