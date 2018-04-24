<?php

class EnviarEmail
{
    //$emailProprietario, $tituloEspaco
    function enviar(){
        
        $emailenviar = "morgado@yourdev.com.br";
       // $destino = $emailProprietario;
        $destino = 'morg.guilherme@gmail.com';
        $assunto = "Alguem quer alugar seu espaço";
       // $headers .= "Bcc: $emailProprietario\r\n";
        $enviaremail = mail($destino, $assunto, 'Oi, Boa noite. Gostaria de dizer que um anuncio está disponível para ser alugado');
        if($enviaremail){
            echo "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
            
        } else {
            
            echo "Erro ao enviar email";
        }

    }
    
}







?>