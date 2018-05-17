<?php

require_once 'BuscarEspacos.php';
require_once 'FunctionsDB.php';

class EnviarEmail
{
    //$emailProprietario, $tituloEspaco
    function enviarConfirmacao($tipo,$emailProprietario,$titulo,$nomeProprietario,$nomeCliente,$arrayDadosPedido,$md5,$idAnuncio){
        
        // $destino = $emailProprietario;
        $destino = 'morg.guilherme@gmail.com';
        
        $assunto = "Alguem quer alugar ".$titulo;

        // alterar link em produção
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
            }else{
                header('location: anuncio.php?id='.$idAnuncio.'&emailEnviado=true');

            }
            


        }else{
            if ($tipo == "direto") {
                
                $dataAluguelInicial = $arrayDadosPedido[0];
                $dataFinalDireto = $arrayDadosPedido[1];
                $semanasDireto = $arrayDadosPedido[2];

                $corpo = '<html><body>';
                $corpo .= "Olá $nomeProprietario, tudo bem?  Gostaria de informa-lo(a) que $nomeCliente quer alugar seu espaço por temporada $titulo. <br>
                
                Número de semanas: $semanasDireto <br>
                
                Data de entrada: $dataAluguelInicial <br>
                Data de saída: $dataFinalDireto <br>
                
                Clique <a href=$link> Aqui para aprovar </a> ";
                $corpo .= "</body></html>";

                if($this->enviar($destino,$assunto,$corpo)){
                    header('location: anuncio.php?id='.$idAnuncio.'&emailEnviado=true');
                }else{
                    header('location: anuncio.php?id='.$idAnuncio.'&emailEnviado=true');

                }


            }
        }

        

    }

    function enviarConfirmacaoReincidente($emailProprietario,$titulo,$nameProprietario,$nameInquilino,$md5,$idAnuncio,$dataInicioReincidente,$semanasDireto,$arrayX1,$arrayX2,$arrayX3,$idPedidoTemporario){
        
        // $destino = $emailProprietario;
        $destino = 'morg.guilherme@gmail.com';

        $assunto = "Alguem quer alugar ".$titulo;

        // alterar link em produção
        $link = "http://www.yourdev.com.br/clientes/locou/redirecionamento.php?id=$md5";

        $busca = new BuscarEspacos();
        $db = new FunctionsDB();

        $corpo = '<html><body>';
        $corpo .= "Olá $nomeProprietario, tudo bem?  Gostaria de informa-lo(a) que $nomeCliente quer alugar seu espaço $titulo. <br>";

        if ($semanasDireto == 1) {
            $corpo .= "Primeiro dia de aluguel : $dataInicioReincidente <br>";
            $corpo .= "E nos dias... <br>";
            
            for($i=1;$i<=7;$i++){

                if ($arrayX1[$i]=='' || $arrayX1[$i]==null) {
                    continue;
                }else{
                    $date = date("Y/m/d ", $arrayX1[$i]);
                    
                    $conn = $db->conectDB();

                    print $idPedidoTemporario;
                    $result = $busca->getPedidosTemporariosReincidentes($conn,$idPedidoTemporario);
                    
                    // resgatar os valores de e colocar no email 
                    if ($result == false) {
                        print 'erro';
                    }else{
                   
                        while ($row=$result->fetch_assoc()) {
                                
                                $corpo .= "Data : ". $row['dataAnuncio']. "<br>";  // 0
                                $corpo .= "Entrada : ". $row['horaEntrada']. "<br>"; // 1
                                $corpo .= "Saida : ". $row['horaSaida']. "<p>"; // 2
                                 $corpo .= "</body></html>";
                        }

                        echo $corpo;

                    }
                     
  
                }

            }

        }


    }

    function enviarEmailPagamento($emailCliente, $nomeCliente, $titulo, $hashId){

      //$destino = $emailCliente;
        $destino = 'morg.guilherme@gmail.com';  
        
        $link = "http://www.yourdev.com.br/clientes/locou/pagamento.php?id=$hashId";

        $assunto = "Aluguel $titulo foi aprovado";
         $corpo = '<html><body>';
        $corpo .= "Olá $nomeCliente. <br>";
        $corpo .= "Tenho uma ótima notícia, o pedido de aluguel de $titulo foi aprovado pelo proprietário <br> ";
        $corpo .= "Clique <a href=$link> aqui para para efetuar o pagamento e finalizar o aluguel </a> ";
        $corpo .= "</body></html>";

        

        if($this->enviar($destino,$assunto,$corpo)){
            print "Email para pagamento enviado com suceso";
            return true;
        }else{
            print "Erro ao enviar email ";
            return false;
        }

    }

    function enviarEmailClaudia($assunto,$corpo){

        $this->enviar('morg.guilherme@gmail.com',$assunto,$corpo);
       // $this->enviar('contato@locou.co',$assunto',$corpo);
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
               //  echo "Erro ao enviar email";
            }

    }
    
}







?>