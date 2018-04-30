
<?php
require_once 'FunctionsSession.php';

class Functions {
   
    
 private $token_Acess = "45d63a3538ff47ccb2c0f0c3c09eabd9_v2";
 private  $token_Acess_transparent = "50625d8d09b2484a8111fcc4d2a643c9_v2";
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
//criarPedidoComClientMOIP(,$token_Acess);
//criarContaMoipTransparente("https://sandbox.moip.com.br/v2/accounts",$token_Acess);
//dadosConta();

//criarContaBancaria("https://sandbox.moip.com.br/v2/accounts/MPA-5FD4FE9CC623/bankaccounts","50625d8d09b2484a8111fcc4d2a643c9_v2");
//criarTranferenciaMoipTransparentToBank("https://sandbox.moip.com.br/v2/transfers","50625d8d09b2484a8111fcc4d2a643c9_v2");
//criarTranferenciaMoipToMoip("https://sandbox.moip.com.br/v2/transfers",$token_Acess);
//criarPreferenciaNotificacaoApp("https://sandbox.moip.com.br/v2/preferences/".$appId."/notifications",$token_Acess);
// criarPagamentoBoleto("https://sandbox.moip.com.br/v2/orders/".$orderID2."/payments",$token_Acess);
// criarCliente();


    function Functions(){
       // $this->consultarSaldo();
    }


    function criarCliente($cpf,$telDDD, $telNumero,$rua, $ruaNumero, $complemento, $bairro, $cep, $cidade, $estado){
        
        $session = new FunctionsSession();
        $session->iniciarSession();
        
        $curl = curl_init();
        $url = "https://sandbox.moip.com.br/v2/customers";
        $id = $_SESSION['id'];
        $name = $_SESSION['firstName']." ".$_SESSION['lastName'];
        $email = $_SESSION['email'];
      //  $niver= $_SESSION['dataNascimento'];
        $niver = '1998-12-04';
        
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
                \"fullname\": \"$name\",
                \"email\": \"$email\",
                \"birthDate\": \"$niver\",
                \"taxDocument\": {
                \"type\": \"CPF\",
                \"number\": \"$cpf\"
                },
                \"phone\": {
                \"countryCode\": \"55\",
                \"areaCode\": \"$telDDD\",
                \"number\": \"$telNumero\"
                },
                \"shippingAddress\": {
                \"city\": \"$cidade\",
                \"district\": \"$bairro\",
                \"street\": \"$rua\",
                \"streetNumber\": \"$ruaNumero\",
                \"complement\": \"$complemento\",
                \"zipCode\": \"$cep\",
                \"state\": \"$cidade\",
                \"country\": \"BRA\"
                }
            }

            "
            ,
            CURLOPT_HTTPHEADER => array(
                "Authorization: OAuth ".$this->token_Acess,
                "Content-Type: application/json"
            )
            ));

            
            $resposta = curl_exec($curl);
            print $resposta;
            $obj = json_decode($resposta);
            $id = $obj->{'id'};
            return $id;


            
    }

    function criarContaMoipTransparenteCPF($cpf, $rgNumero, $rgOrgao, $rgData, $telDDD, $telNumero, $rua, $ruaNumero, $bairro, $cep, $cidade, $estado){
        $curl = curl_init();
        //    print $_SESSION['email']." ".$_SESSION['firstName']." ".$_SESSION['lastName']." ".$_SESSION['dataNascimento']. " ".$cpf. " ".$rgNumero." ".$rgOrgao." ".$rgData." ".$telDDD." ".$telNumero." ".$rua." ".$ruaNumero." ".$bairro." ".$cep." ".$cidade." ".$estado;

        $url = "https://sandbox.moip.com.br/v2/accounts";
        $email = $_SESSION['email'];
        $first = $_SESSION['firstName'];
        $last = $_SESSION['lastName'];
        $nascimento = $_SESSION['dataNascimento'];

        curl_setopt_array($curl,array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>"
    
            {
                \"email\": {
                    \"address\": \"$email\"
                },
                \"person\": {
                    \"name\":\"$first\",
                    \"lastName\": \"$last\",
                    \"taxDocument\": {
                        \"type\": \"CPF\",
                        \"number\": \"$cpf\"
                    }, 
                    \"identityDocument\": {
                    \"type\" : \"RG\",
                    \"number\": \"$rgNumero\",
                    \"issuer\": \"$rgOrgao\",
                    \"issueDate\": \"$rgData\" 
                    }, 
                    \"birthDate\": \"$nascimento\",
                    \"phone\": {
                        \"countryCode\": \"55\",
                        \"areaCode\": \"$telDDD\",
                        \"number\": \"$telNumero\"
                    },
                    \"address\": {
                        \"street\": \"$rua\",
                        \"streetNumber\": \"$ruaNumero\",
                        \"district\": \"$bairro\",
                        \"zipCode\": \"$cep\",
                        \"city\": \"$cidade\",
                        \"state\": \"$estado\",
                        \"country\": \"BRA\"
                    }
                },
                \"type\": \"MERCHANT\",
                \"transparentAccount\": true
            }
            ",

            CURLOPT_HTTPHEADER => array(
                "Authorization: OAuth ".$this->token_Acess,
                "Content-Type: application/json"
            )
            ));

            $resposta = curl_exec($curl);
            print "\n".$resposta;
             $obj = json_decode($resposta);
             $id = $obj->{'id'};
            print "\n".$id." * ".$obj->{'accessToken'}; 
            $array = array($obj->{'id'},$obj->{'accessToken'});
            return $array;

    }

    function criarContaBancaria($id, $token_Acess,$type,$bankNumber,$agencyNumber,$agencyCheckNumber,$accountNumber,$accountCheckNumber,$fullName,$cpf){
        $curl = curl_init();
        
        $url = "https://sandbox.moip.com.br/v2/accounts/".$id."/bankaccounts";
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
                \"type\": \"$type\",
                \"bankNumber\": \"$bankNumber\",  
                \"agencyNumber\": \"$agencyNumber\",
                \"agencyCheckNumber\": \"$agencyCheckNumber\",
                \"accountNumber\": \"$accountNumber\",
                \"accountCheckNumber\": \"$accountCheckNumber\",      
                \"holder\": {
                    \"fullname\": \"$fullName\",
                    \"taxDocument\": {
                        \"type\": \"CPF\",
                        \"number\": \"$cpf\"
                    }
                }
            }
            ",

            CURLOPT_HTTPHEADER => array(
                "Authorization: OAuth ".$token_Acess,
                "Content-Type: application/json"
            ),
            ));

        $resposta = curl_exec($curl);
            print $resposta;
            $obj = json_decode($resposta);
            print "\n".$obj->{'id'};
           
            return $obj->{'id'};
        
    }



    function consultarCliente(){
        cURLGet("https://sandbox.moip.com.br/v2/customers/","45d63a3538ff47ccb2c0f0c3c09eabd9_v2");
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

  
    function criarPreferenciaNotificacaoApp(){
        $curl = curl_init();
        $url = "https://sandbox.moip.com.br/v2/preferences/notifications";
        $token_Acess = "45d63a3538ff47ccb2c0f0c3c09eabd9_v2";
        $aux = "ORDER.*";

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
            \"events\": [
                \"$aux\",
                \"PAYMENT.AUTHORIZED\",
                \"PAYMENT.CANCELLED\"
            ],
            \"target\": \"http://requestb.in/1dhjesw1\",
            \"media\": \"WEBHOOK\"
            } 
            
            "
        
             
            ,
            CURLOPT_HTTPHEADER => array(
                "Authorization: OAuth ".$token_Acess,
                "Content-Type: application/json"
            )
            ));
            
            $resposta = curl_exec($curl);
            print $resposta;


    }

   
    function dadosConta(){
        $this->cURLGet("https://sandbox.moip.com.br/v2/accounts/MPA-5FD4FE9CC623","50625d8d09b2484a8111fcc4d2a643c9_v2");
    }

    function pagamentoCartaoCredito($hash,$orderID,$nomePortador,$nascimentoPortador, $cpfPortador,$ddd,$numero,$cidade,$bairro,
     $rua,$estado,$cep){

        $url = "https://sandbox.moip.com.br/v2/orders/".$orderID."/payments";

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
            "
            {  
                \"installmentCount\":1,
                \"statementDescriptor\":\"Locou.co\",
                \"fundingInstrument\":{  
                \"method\":\"CREDIT_CARD\", 
                \"creditCard\":{  
                    \"hash\": \"$hash\",
                    \"store\":true,
                    \"holder\":{  
                        \"fullname\":\"$nomePortador\",
                        \"birthdate\":\"$nascimentoPortador\",
                        \"taxDocument\":{  
                            \"type\":\"CPF\",
                            \"number\":\"$cpfPortador\"
                        },
                        \"phone\":{  
                            \"countryCode\":\"55\",
                            \"areaCode\":\"$ddd\",
                            \"number\":\"$numero\"
                        },
                        \"billingAddress\":{  
                            \"city\":\"$cidade\",
                            \"district\":\"$bairro\",
                            \"street\":\"$rua\",
                            \"streetNumber\":\"$numero\",
                            \"zipCode\":\"$cep\",
                            \"state\":\"$estado\",
                            \"country\":\"BRA\"
                        }
                    }
                }
                }
            }
            ",
            

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

 
    // Função cURL Get Que printa na tela o JSON/Resultado da URL enviada por parametro
    function cURLGet(){

        $curl = curl_init();
        $url = "https://sandbox.moip.com.br/v2/customers/";
       // $token_Acess = getToken();

        curl_setopt_array($curl,array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: OAuth 45d63a3538ff47ccb2c0f0c3c09eabd9_v2",
                
            ),
            ));

        $resposta = curl_exec($curl);
        print $resposta;
    }

    public function consultarSaldo(){

        $curl = curl_init();
        $url = "https://sandbox.moip.com.br/v2/balances";

        curl_setopt_array($curl,array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: OAuth ".$this->token_Acess,
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

    function getToken(){
        return $this->token_Acess;
    }

    // "{\"events\": [\"ORDER.*\",\"PAYMENT.AUTHORIZED\"],\"target\":\"http://requestb.in/1dhjesw1\",\"media\": \"WEBHOOK\"}"

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

    function getClienteMoip($idCliente){

         $curl = curl_init();
         $url = "https://sandbox.moip.com.br/v2/customers/$idCliente";
         
        curl_setopt_array($curl,array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: OAuth ".$this->token_Acess
                
            ),
        ));

        $resposta = curl_exec($curl);
        return $resposta;

    }

   

    /*
           */
}
?>