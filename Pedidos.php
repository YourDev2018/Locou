<?php
require_once 'Functions.php';

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

    
    function criarPedidoComClientMOIP($id,$idMoipClient,$idProprietario, $nomeEspaço, $numeroHoras, $preco){
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
                    \"quantity\": $numeroHoras,
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
                    \"id\": \"$idProprietario\"
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

            $resposta = curl_exec($curl);
            $obj = json_decode($resposta);
            $id = $obj->{'id'};
            return $id;
            
    }

    
}


?>

