<?php

class EnviarEmail
{
    //$emailProprietario, $tituloEspaco
    function enviarConfirmacao($tipo,$emailProprietario,$titulo,$nomeProprietario,$nomeCliente,$arrayDadosPedido,$md5,$idAnuncio){
        
        // $destino = $emailProprietario;
        $destino = 'morg.guilherme@gmail.com';

        $assunto = "Alguem quer alugar ".$titulo;

        $link = "http://www.yourdev.com.br/clientes/locou/redirecionamento.php?id=$md5";



       // $headers .= "Bcc: $emailProprietario\r\n";

       if ($tipo == 'unico') {

            $dataAluguel = $arrayDadosPedido['data'];
            $horaEntrada = $arrayDadosPedido['inicioUnico'];
            $horaSaida = $arrayDadosPedido['fimUnico'];

            /*          $enviaremail = mail($destino, $assunto, "Olá $nomeProprietario, tudo bem?  Gostaria de informa-lo(a) que $nomeCliente quer alugar seu espaço $titulo.  Data: $dataAluguel <br>
            
            Hora de Entrada: <br> $horaEntrada <br> Hora de Saida <br> $horaSaida. <br> Clique no link para aprovar $link" ); 
            */        
            $corpo = '<html><body>';
            $corpo .= "Olá $nomeProprietario, tudo bem?  Gostaria de informa-lo(a) que $nomeCliente quer alugar seu espaço $titulo. <br>
            
            Data: $dataAluguel <br>
            
            Hora de Entrada: $horaEntrada <br>
            Hora de Saida: $horaSaida <br>
            
            Clique <a href=$link> Aqui para aprovar </a> ";
            $corpo .= "</body></html>";

            if($this->enviar($destino,$assunto,$corpo)){
                 header('location: anuncio.php?id='.$idAnuncio.'&emailEnviado=true');
            }


        }else{
            if ($tipo == "direto") {
                # code...
            }else{
                if ($tipo == "reincidente") {
                    # code...
                }
            }
        }

        

    }

    function enviarEmailPagamento($emailCliente, $nomeCliente, $titulo, $hashId){
        
        $assunto = "Aluguel $titulo foi aprovado";
        $corpo = "Olá $nomeCliente. <br>";
        $corpo .= "Tenho uma ótima o pedido de aluguel de $titulo foi aprovado pelo proprietário <br> ";
        $corpo .= "Clique $link aqui para para efetuar o pagamento e finalizar o aluguel";

        $link = "http://www.yourdev.com.br/clientes/locou/pagamento.php?id=$md5";

        $this->enviar($destino,$assunto,$corpo);

    }


    function enviar($destino,$assunto,$corpo){

        
           
            $subject  = $assunto;
            $from     = "contato@yourdev.com.br";
            $to       = $destino;
            $message  = $corpo;
            $bcc      = null; // Esconder endereços de e-mails.
            $cc       = null; // Qualquer destinatário pode ver os endereços de e-mail especificados nos camp


            $headers  = sprintf( 'Date: %s%s', date( "D, d M Y H:i:s O" ), PHP_EOL );
            $headers .= sprintf( 'Return-Path: %s%s', $from, PHP_EOL );
            $headers .= sprintf( 'To: %s%s', $to, PHP_EOL );
            $headers .= sprintf( 'Cc: %s%s', $cc, PHP_EOL );
            $headers .= sprintf( 'Bcc: %s%s', $bcc, PHP_EOL );
            $headers .= sprintf( 'From: %s%s', $from, PHP_EOL );
            $headers .= sprintf( 'Reply-To: %s%s', $from, PHP_EOL );
            $headers .= sprintf( 'Message-ID: <%s@%s>%s', md5( uniqid( rand( ), true ) ), $_SERVER[ 'HTTP_HOST' ], PHP_EOL );
            $headers .= sprintf( 'X-Priority: %d%s', 3, PHP_EOL );
            $headers .= sprintf( 'X-Mailer: PHP/%s%s', phpversion( ), PHP_EOL );
            $headers .= sprintf( 'Disposition-Notification-To: %s%s', $from, PHP_EOL );
            $headers .= sprintf( 'MIME-Version: 1.0%s', PHP_EOL );
            $headers .= sprintf( 'Content-Transfer-Encoding: 8bit%s', PHP_EOL );
            $headers .= sprintf( 'Content-Type: text/html; charset="iso-8859-1"%s', PHP_EOL );


            $enviaremail = mail($destino, $assunto, $corpo, $headers );   

            if($enviaremail){
                
              return true;
                
            } else {
                
              //  header('location: anuncio.php?id='.$idAnuncio.'&emailEnviado=true');
                echo "Erro ao enviar email";
            }

    }
    
}







?>