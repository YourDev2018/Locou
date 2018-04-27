<?php
require_once 'functions.php';
require_once 'FunctionsDB.php';
require_once 'BuscarEspacos.php';
require_once 'EnviarEmail.php';

class Pedidos
{


    function criarPedidoComClientMOIPOriginal($token_Acess){
        $curl = curl_init();
           $url = "https://sandbox.moip.com.br/v2/orders";
        curl_setopt_array($curl,array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>
            '
            {
                "ownId": "Locou_Pedido_05",
                "amount": {
                "currency": "BRL",
                "subtotals": {
                    "shipping": 1000
                }
                },
                "items": [
                {
                    "product": "Descrição do pedido",
                    "category": "BUSINESS_AND_INDUSTRIAL",
                    "quantity": 1,
                    "detail": "Aluguel de consultório dentário",
                    "price": 10000
                }
                ],
                "customer": {
                "id": "CUS-OSFJ6B8TJO6Q"              
                },
                "receivers": [
                {
                    "type": "SECONDARY",
                    "feePayor": true,
                    "moipAccount": {
                    "id": "MPA-5FD4FE9CC623"
                    },
                    "amount": {
                    "percentual": 30
                    }
                }
                ]
            }',

            CURLOPT_HTTPHEADER => array(
                "Authorization: OAuth ".$token_Acess,
                "Content-Type: application/json"
            )
            ));

            $resposta = curl_exec($curl);
            print $resposta;

    }

    
    function criarPedidoComClientMOIP($id,$idMoipClient,$idMoipProprietario, $nomeEspaço, $preco){

        $curl = curl_init();
        $func = new functions();
        $url = "https://sandbox.moip.com.br/v2/orders";
        

        curl_setopt_array($curl,array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>
            "
            {
                \"ownId\": \"$id\",
                \"amount\": {
                \"currency\": \"BRL\",
                \"subtotals\": {
                    \"shipping\": 0
                }
                },
                \"items\": [
                {
                    \"product\": \"Aluguel do espaço $nomeEspaço \",
                    \"category\": \"BUSINESS_AND_INDUSTRIAL\",
                    \"quantity\": 1,
                    \"detail\": \"Aluguel do espaço $nomeEspaço\",
                    \"price\": $preco
                }
                ],
                \"customer\": {
                \"id\": \"$idMoipClient\"              
                },
                \"receivers\": [
                {
                    \"type\": \"SECONDARY\",
                    \"feePayor\": true,
                    \"moipAccount\": {
                    \"id\": \"$idMoipProprietario\"
                    },
                    \"amount\": {
                    \"percentual\": 90
                    }
                }
                ]
            } ",

            CURLOPT_HTTPHEADER => array(
                "Authorization: OAuth ".$func->getToken(),
                "Content-Type: application/json"
            )
            ));
            print $resposta = curl_exec($curl);
            $obj = json_decode($resposta);
            $id = $obj->{'id'};
            return $id;
            
    
        }

    


    
    
    function criarPedido($conn,$idUsuario,$idAnuncio,$tipo,$preco,$arrayDadosPedido){

        $db = new FunctionsDB();

        $busca= new BuscarEspacos();
        
        $idMoipProprietario = $db->getUsuarioProprietario($conn,$idUsuario);

        

        if ($idMoipProprietario == null || $idMoipProprietario == '') {
            print "erro, idMoipProprietario é nullo";
            print 'Enviar email para o proprietário';
            // "Alguem quer alugar seu anuncio, termine de preencher seus dados para receber o valor"

        }else{
            if($db->getAnuncioInstantaneo($conn,$idAnuncio) == 'sim'){

                $array = $busca->retornarAnuncioBasicoId($conn,$idAnuncio);
                $idClient = $db->getIdClientMoip($conn,$idUsuario);

                $id= $db->getUltimoIDs($conn,'Pedidos');
                $id = $id+1;
                
                $idOrder = $this->criarPedidoComClientMOIP($id,$idClient,$idMoipProprietario,$array[4],$preco);
                
                $db->salvarPedido($conn,md5($id),$idAnuncio,$idUsuario,$idOrder);
                return $idOrder;

            }else{
                //print ' enviar email autorizando o aluguel ';

                $enviarEmail = new EnviarEmail();
                $arrayUser = $db->getUsuarioBasico($conn,$idUsuario); 
                $array = $busca->retornarAnuncioBasicoId($conn,$idAnuncio);
                $idClient = $db->getIdClientMoip($conn,$idUsuario);
                $id = $db->getUltimoIDs($conn,'PedidosTemporarios');
                $id = $id  +1;
                $id = md5($id);

                 $db->cadastrarPedidosTemporarios($conn,$id,$idClient,$idMoipProprietario,$idAnuncio,$array[4],$preco);

                $emailProprietario = $arrayUser[2];
                $tituloEspaco = $array[4];

                $arrayProprietario = $db->getInfoUserProprietario($conn,$idAnuncio);
                $arrayInquilino = $db->getUsuarioBasico($conn,$idUsuario);

                $nameProprietario = $arrayProprietario[0];
                $nameInquilino = $arrayInquilino[0];    
                $titulo = $array[4];

                $enviarEmail->enviarConfirmacao($tipo,$emailProprietario,$titulo,$nameProprietario,$nameInquilino,$arrayDadosPedido,$id,$idAnuncio);
                return ''

            }

            

            
        }
       
    }
}
?>

