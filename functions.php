
<?php

$token_Acess = "45d63a3538ff47ccb2c0f0c3c09eabd9_v2";
$document = "27.908.205/0001-26";
verificarContaExists($document,$token_Acess);



function verificarContaExists($document,$token_Acess){
   // $url = "https://sandbox.moip.com.br/v2/accounts/exists?tax_document=887.758.527-72";
   //$url = "https://sandbox.moip.com.br/v2/accounts/exists?tax_document=887.755.537-72";
   $url = "https://sandbox.moip.com.br/v2/accounts/exists?tax_document=".$document;//27.908.205/0001-26";

   cURLGet($url,$token_Acess);
    
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

?>