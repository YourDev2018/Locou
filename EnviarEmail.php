<?php

class EnviarEmail
{
    //$emailProprietario, $tituloEspaco
    function enviar($emailProprietario,$titulo,$link){
        

       // $destino = $emailProprietario;
        $destino = 'morg.guilherme@gmail.com';
        $assunto = "Alguem quer alugar o(a) ".$titulo;
       // $headers .= "Bcc: $emailProprietario\r\n";
        $enviaremail = mail($destino, $assunto, 'O');
        if($enviaremail){
            echo "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
            
        } else {
            
            echo "Erro ao enviar email";
        }

    }
    
}







?>