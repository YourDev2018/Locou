
<?php


class Functions {
   
    
 private $token_Acess = "45d63a3538ff47ccb2c0f0c3c09eabd9_v2";
 private  $document = "27.908.205/0001-26";
 private  $hash = "Wutnb2fAfZq8vxFn6atkSspribFd+ExNqlbvt9brnYPhljJaVNh8FAaMBz0IcajyFkvmnYHwF8XXBBkUN9pF+Ftvq5DqaJyrm3UhCVNXrQ7th2nGQ1tSffKYAR9DjlXQmOSKCwEWQb6YRSszkiys13hmOiz+LtdKvP7tjIps8Nppb3qCAaIQgnYOxG9ZO+4OGZK1oDtmB+b0oTrigGdsE3Rfi/FO40gjfVFQdxPkKd7nEXb1vko974IVIasi9gLr0JhaFlcPicfarPhzy9KJkZKTQ88b3/RzJ6ua+329yisN3V+5N9IreF3D06tP3c75TcHsqYBpaE/4gzSgHvyQmg==";
 private  $orderID = "ORD-VQ592BQX9R2P";
 private  $orderID2 = "ORD-NX7ED4CM40FN";
 private  $appId = "APP-VM93MVN9XDFA";
 private  $custumerID = "CUS-OSFJ6B8TJO6Q";
/*$numero = $_POST['number'];
$cvc = $_POST['cvc'];
$mes = $_POST['month'];
$ano = $_POST['year'];
*/

//verificarContaExists($document,$token_Acess);
// pagamentoCartaoCredito("https://sandbox.moip.com.br/v2/orders/".$orderID."/payments",$hash,$token_Acess);
//criarPedidoComClientMOIP("https://sandbox.moip.com.br/v2/orders",$token_Acess);
//criarContaMoipTransparente("https://sandbox.moip.com.br/v2/accounts",$token_Acess);
//dadosConta();

//criarContaBancaria("https://sandbox.moip.com.br/v2/accounts/MPA-5FD4FE9CC623/bankaccounts","50625d8d09b2484a8111fcc4d2a643c9_v2");
//criarTranferenciaMoipTransparentToBank("https://sandbox.moip.com.br/v2/transfers","50625d8d09b2484a8111fcc4d2a643c9_v2");
//criarTranferenciaMoipToMoip("https://sandbox.moip.com.br/v2/transfers",$token_Acess);
//criarPreferenciaNotificacaoApp("https://sandbox.moip.com.br/v2/preferences/".$appId."/notifications",$token_Acess);
// criarPagamentoBoleto("https://sandbox.moip.com.br/v2/orders/".$orderID2."/payments",$token_Acess);
// criarCliente("https://sandbox.moip.com.br/v2/customers",$token_Acess);
   

function Functions(){
    $this->consultarSaldo("https://sandbox.moip.com.br/v2/balances","50625d8d09b2484a8111fcc4d2a643c9_v2");
}


function criarCliente($url,$token_Acess){
    $curl = curl_init();

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
            "ownId": "17084104739",
            "fullname": "Guilherme Morgado Fonseca",
            "email": "morg.guilherme@gmail.com",
            "birthDate": "1998-12-04",
            "taxDocument": {
              "type": "CPF",
              "number": "17084104739"
            },
            "phone": {
              "countryCode": "55",
              "areaCode": "21",
              "number": "21472261"
            },
            "shippingAddress": {
              "city": "Rio de Janeiro",
              "district": "Cascadura",
              "street": "Rua Blumenau",
              "streetNumber": "241",
              "zipCode": "21311120",
              "state": "RJ",
              "country": "BRA"
            }
          }

        '
        ,
        CURLOPT_HTTPHEADER => array(
            "Authorization: OAuth ".$token_Acess,
            "Content-Type: application/json"
          )
        ));

        $resposta = curl_exec($curl);
        print $resposta;
}

function criarPagamentoBoleto($url,$token_Acess){
    $curl = curl_init();

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
            "statementDescriptor":"Locou.co",
            "fundingInstrument":{  
               "method":"BOLETO",
               "boleto":{  
                  "expirationDate":"2020-06-20",
                  "instructionLines":{  
                     "first":"Atenção,",
                     "second":"fique atento à data de vencimento do boleto.",
                     "third":"Pague em qualquer casa lotérica."
                  },
                  "logoUri":"http://www.yourdev.com.br/clientes/locou/img/locou_logo.png"
               }
            }
         }
        ',
        CURLOPT_HTTPHEADER => array(
            "Authorization: OAuth ".$token_Acess,
            "Content-Type: application/json"
          )
        ));

        $resposta = curl_exec($curl);
        print $resposta;
}

function criarContaMoipTransparente($url,$token_Acess){
    $curl = curl_init();

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
            "email": {
                "address": "morgado@yourdev.com.br"
            },
            "person": {
                "name": "Guilherme",
                "lastName": "Morgado",
                "taxDocument": {
                    "type": "CPF",
                    "number": "123.456.798-91"
                }, 
                  "identityDocument": {
                  "type" : "RG",
                  "number": "434322344",
                  "issuer": "SSP",
                  "issueDate": "2000-12-12" 
                  }, 
                "birthDate": "1998-12-04",
                "phone": {
                    "countryCode": "55",
                    "areaCode": "21",
                    "number": "21472261"
                },
                "address": {
                    "street": "Av. blumenau",
                    "streetNumber": "21",
                    "district": "Cascadura",
                    "zipCode": "21311120",
                    "city": "Rio de Janeiro",
                    "state": "RJ",
                    "country": "BRA"
                }
               },
            "type": "MERCHANT",
            "transparentAccount": true
        }
        ',

        CURLOPT_HTTPHEADER => array(
            "Authorization: OAuth ".$token_Acess,
            "Content-Type: application/json"
          )
        ));

        $resposta = curl_exec($curl);
        print $resposta;

}

function criarPreferenciaNotificacaoApp($url,$token_Acess){
    $curl = curl_init();

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
            "events": [
              "ORDER.*",
              "PAYMENT.*"
            ],
            "target": "http://requestb.in/1dhjesw1",
            "media": "WEBHOOK"
          } 
        ',
        CURLOPT_HTTPHEADER => array(
            "Authorization: OAuth ".$token_Acess,
            "Content-Type: application/json"
          )
        ));
        
        $resposta = curl_exec($curl);
        print $resposta;


}

function criarPedidoComClientMOIP($url,$token_Acess){
    $curl = curl_init();

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

function dadosConta(){
    cURLGet("https://sandbox.moip.com.br/v2/accounts/MPA-5FD4FE9CC623","50625d8d09b2484a8111fcc4d2a643c9_v2");
}

function pagamentoCartaoCredito($url,$hash,$token_Acess){

    $curl = curl_init();

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
            "installmentCount":1,
            "statementDescriptor":"Locou.co",
            "fundingInstrument":{  
               "method":"CREDIT_CARD", 
               "creditCard":{  
                  "hash": "Wutnb2fAfZq8vxFn6atkSspribFd+ExNqlbvt9brnYPhljJaVNh8FAaMBz0IcajyFkvmnYHwF8XXBBkUN9pF+Ftvq5DqaJyrm3UhCVNXrQ7th2nGQ1tSffKYAR9DjlXQmOSKCwEWQb6YRSszkiys13hmOiz+LtdKvP7tjIps8Nppb3qCAaIQgnYOxG9ZO+4OGZK1oDtmB+b0oTrigGdsE3Rfi/FO40gjfVFQdxPkKd7nEXb1vko974IVIasi9gLr0JhaFlcPicfarPhzy9KJkZKTQ88b3/RzJ6ua+329yisN3V+5N9IreF3D06tP3c75TcHsqYBpaE/4gzSgHvyQmg==",
                  "store":true,
                  "holder":{  
                     "fullname":"Roberto Oliveira",
                     "birthdate":"1988-12-30",
                     "taxDocument":{  
                        "type":"CPF",
                        "number":"78994193600"
                     },
                     "phone":{  
                        "countryCode":"55",
                        "areaCode":"11",
                        "number":"22849560"
                     },
                     "billingAddress":{  
                        "city":"Belo Horizonte",
                        "district":"Savassi",
                        "street":"Avenida Contorno",
                        "streetNumber":"400",
                        "zipCode":"76932800",
                        "state":"MG",
                        "country":"BRA"
                     }
                  }
               }
            }
         }
        ',
         

        CURLOPT_HTTPHEADER => array(
            "Authorization: OAuth ".$token_Acess,
            "Content-Type: application/json"
          ),
        ));
    $resposta = curl_exec($curl);
    print $resposta;
}

function verificarContaExists($document,$token_Acess){
   // $url = "https://sandbox.moip.com.br/v2/accounts/exists?tax_document=887.758.527-72";
   //$url = "https://sandbox.moip.com.br/v2/accounts/exists?tax_document=887.755.537-72";
   $url = "https://sandbox.moip.com.br/v2/accounts/exists?tax_document=".$document;//27.908.205/0001-26";

   cURLGet($url,$token_Acess);
    
}

function criarContaBancaria($url,$token_Acess){
    $curl = curl_init();

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
            "type": "SAVING",
            "bankNumber": "237",  
            "agencyNumber": "2784",
            "agencyCheckNumber": "7",
            "accountNumber": "00155624",
            "accountCheckNumber": "4",      
            "holder": {
                "fullname": "Guilherme Morgado Fonseca",
                "taxDocument": {
                    "type": "CPF",
                    "number": "170.841.047-39"
                }
            }
        }
        ',

        CURLOPT_HTTPHEADER => array(
            "Authorization: OAuth ".$token_Acess,
            "Content-Type: application/json"
          ),
        ));

    $resposta = curl_exec($curl);
    print $resposta;
}

// Função cURL Get Que printa na tela o JSON/Resultado da URL enviada por parametro
function cURLGet($url,$token_Acess){

    $curl = curl_init();

    curl_setopt_array($curl,array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: OAuth ".$token_Acess,
            
          ),
        ));

    $resposta = curl_exec($curl);
    print $resposta;
}

public function consultarSaldo($url,$token_Acess){

    $curl = curl_init();

    curl_setopt_array($curl,array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: OAuth ".$token_Acess,
            "Content-Type: application/json"
          ),
        ));

    $resposta = curl_exec($curl);
    print $resposta;
}

function criarTranferenciaMoipToMoip($url,$token_Acess){
    $curl = curl_init();

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
            "amount": 10000,
            "transferInstrument": {
                "method": "MOIP_ACCOUNT",
                "moipAccount": {
                    "id": "MPA-5FD4FE9CC623",
                    "holder": {
                        "fullname": "Guilherme Morgado",
                        "taxDocument": {
                            "type": "CPF",
                            "number": "12345679891"
                        }
                    }
                }
            }
        }

        ',

        CURLOPT_HTTPHEADER => array(
            "Authorization: OAuth ".$token_Acess,
            "Content-Type: application/json"
          ),
        ));

    $resposta = curl_exec($curl);
    print $resposta;
}

function criarTranferenciaMoipTransparentToBank($url,$token_Acess){
    $curl = curl_init();

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
            "amount": 1000,
            "transferInstrument": {
                "method": "BANK_ACCOUNT",
                "bankAccount": {
                    "id": "BKA-QM1N6V2BQY4T"
                }
            }
        }

        ',

        CURLOPT_HTTPHEADER => array(
            "Authorization: OAuth ".$token_Acess,
            "Content-Type: application/json"
          ),
        ));

    $resposta = curl_exec($curl);
    print $resposta;
}


// não funcional 

function addCartaoCredito($url,$token_Acess){

    $curl = curl_init();

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
            "method": "CREDIT_CARD",
            "creditCard": {
              "expirationMonth": "05",
              "expirationYear": "22",
              "number": "4012001037141112",
              "cvc": "123",
              "holder": {
                "fullname": "Gabriel Morgado Fonseca",
                "birthdate": "1994-01-20",
                "taxDocument": {
                  "type": "CPF",
                  "number": "22288866644"
                },
                "phone": {
                  "countryCode": "55",
                  "areaCode": "21",
                  "number": "21472261"
                }
              }
        }
        

        '
        ,
        CURLOPT_HTTPHEADER => array(
            "Authorization: OAuth ".$token_Acess,
            "Content-Type: application/json"
          )
        ));

        $resposta = curl_exec($curl);
        print $resposta;

}

}
?>