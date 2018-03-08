
<?php

$token_Acess = "45d63a3538ff47ccb2c0f0c3c09eabd9_v2";
$document = "27.908.205/0001-26";
$hash = "Wutnb2fAfZq8vxFn6atkSspribFd+ExNqlbvt9brnYPhljJaVNh8FAaMBz0IcajyFkvmnYHwF8XXBBkUN9pF+Ftvq5DqaJyrm3UhCVNXrQ7th2nGQ1tSffKYAR9DjlXQmOSKCwEWQb6YRSszkiys13hmOiz+LtdKvP7tjIps8Nppb3qCAaIQgnYOxG9ZO+4OGZK1oDtmB+b0oTrigGdsE3Rfi/FO40gjfVFQdxPkKd7nEXb1vko974IVIasi9gLr0JhaFlcPicfarPhzy9KJkZKTQ88b3/RzJ6ua+329yisN3V+5N9IreF3D06tP3c75TcHsqYBpaE/4gzSgHvyQmg==";
$orderID = "ORD-VQ592BQX9R2P";

/*$numero = $_POST['number'];
$cvc = $_POST['cvc'];
$mes = $_POST['month'];
$ano = $_POST['year'];
*/

//verificarContaExists($document,$token_Acess);
// pagamentoCartaoCredito("https://sandbox.moip.com.br/v2/orders/".$orderID."/payments",$hash,$token_Acess);
//criarPedido("https://sandbox.moip.com.br/v2/orders",$token_Acess);
//criarContaMoipTransparente("https://sandbox.moip.com.br/v2/accounts",$token_Acess);
//dadosConta();
 consultarSaldo("https://sandbox.moip.com.br/v2/balances","50625d8d09b2484a8111fcc4d2a643c9_v2");
//criarContaBancaria("https://sandbox.moip.com.br/v2/accounts/MPA-5FD4FE9CC623/bankaccounts","50625d8d09b2484a8111fcc4d2a643c9_v2");
//criarTranferenciaMoipTransparentToBank("https://sandbox.moip.com.br/v2/transfers","50625d8d09b2484a8111fcc4d2a643c9_v2");
//criarTranferenciaMoipToMoip("https://sandbox.moip.com.br/v2/transfers",$token_Acess);

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


function criarPedido($url,$token_Acess){
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
            "ownId": "Locou_Pedido_01",
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
              "ownId": "Locou_Cliente_01",
              "fullname": "Guilherme Morgado",
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
                "street": "Rua blumenau",
                "streetNumber": 241,
                "district": "Cascadura",
                "city": "Rio de Janeiro",
                "state": "RJ",
                "country": "BRA",
                "zipCode": "21311120    "
              }
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
        
        
        
        /*
        
        '
        {  
            "ownId":"Locou_Pedido_1",
            "amount":{  
               "currency":"BRL",
               "subtotals":{  
                  "shipping":1000
               }
            },
            "items":[  
               {  
                  "product":"Aluguel de um espaço",
                  "category":"HOTEL_AND_HOSPITALITY",
                  "quantity":1,
                  "detail":"Consultório dentário",
                  "price":10000
               }
            ],
         }',
         */

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
            },
            "device":{  
               "ip":"127.0.0.1",
               "geolocation":{  
                  "latitude":-33.867,
                  "longitude":151.206
               },
               "userAgent":"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36",
               "fingerprint":"QAZXswedCVGrtgBNHyujMKIkolpQAZXswedCVGrtgBNHyujMKIkolpQAZXswedCVGrtgBNHyujMKIkolpQAZXswedCVGrtgBNHyujMKIkolp"
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

function consultarSaldo($url,$token_Acess){

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




?>
<!--

<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    
</body>

    
    <script type="text/javascript">
 $(document).ready(function() {
     var number = "<?php echo $numero; ?>";
     var cvc = "<?php echo $cvc; ?>";
     var mes = "<?php echo $mes; ?>";
     var ano = "<?php echo $ano; ?>";
     var chave = "<?php echo $chave; ?>";
     $("#encrypt").click(function() {
       var cc = new Moip.CreditCard({
         number,
         cvc,
         mes,
         year,
         chave
       });
       console.log(cc);
       if( cc.isValid()){
         $("#encrypted_value").val(cc.hash());
         $("#card_type").val(cc.cardType());
         var varHash = cc.hash();
         $.ajax({
             data: 'orderid=' + varHash,
             url: 'http://localhost/yourdev/Locou/functions.php',
             method: 'POST',
             sucess: function(msg) {
                 alert(msg);
             }
         }); 
       }
       else{
         $("#encrypted_value").val('');
         $("#card_type").val('');
         alert('Invalid credit card. Verify parameters: number, cvc, expiration Month, expiration Year');
       }
     });
 });

-->


<!--

    "{\n \"installmentCount\": 1,\n 
             \"statementDescriptor\": \"Locou.co\",\n
             \"fundingInstrument\":
              {\n  
                  \"method\": \"CREDIT_CARD\",\n 
                  \"creditCard\": 
                    {\n      
                        \"hash\": \".$hash\",\n  
                        \"holder\": 
                            {\n  
                                \"fullname\": \"Guilherme Morgado \",\n  
                                \"birthdate\": \"1998-12-04\",\n  
                                \"taxDocument\": 
                                    {\n    
                                        \"type\": \"CPF\",\n   
                                        \"number\": \"12345678910\"\n   
                                    },\n   
                                \"phone\": 
                                    {\n   
                                        \"countryCode\": \"55\",\n  
                                        \"areaCode\": \"21\",\n      
                                        \"number\": \"21472261\"\n    
                                    }\n   
                            }\n   
                    }\n  
                }\n
            }",
        -->
</html>