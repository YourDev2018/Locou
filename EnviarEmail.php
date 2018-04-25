<?php

class EnviarEmail
{
    //$emailProprietario, $tituloEspaco
    function enviarConfirmacao($tipo,$emailProprietario,$titulo,$nomeProprietario,$nomeCliente,$arrayDadosPedido,$md5){
        

       // $destino = $emailProprietario;
        $destino = 'morg.guilherme@gmail.com';

        $assunto = "Alguem quer alugar o(a)".$titulo;

        $link = "localhost/yourdev/Locou/redirecionamento.php?id=$md5";

       // $headers .= "Bcc: $emailProprietario\r\n";

       if ($tipo == 'unico') {

            $dataAluguel = $arrayDadosPedido['data'];
            $horaEntrada = $arrayDadosPedido['inicioUnico'];
            $horaSaida = $arrayDadosPedido['fimUnico'];

            $enviaremail = mail($destino, $assunto, "Olá $nomeProprietario, tudo bem?  Gostaria de informa-lo(a) que $nomeCliente quer alugar seu espaço $titulo. <br> Data: $dataAluguel <br>
            
            Hora de Entrada: <br> $horaEntrada <br> Hora de Saida <br> $horaSaida. <br> Clique no link para aprovar $link " );
            

            if($enviaremail){
                echo "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
                
            } else {
                
                echo "Erro ao enviar email";
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
    
}







?>