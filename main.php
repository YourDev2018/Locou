<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once 'Functions.php';
require_once 'FunctionsSession.php';
require_once 'FunctionsDB.php';
require_once 'Pedidos.php';
require_once 'Seguranca.php';
// SQL INJECTION CODES
// utilizar a funçao addslashes(); para tratar sql injection, usar em todas as entradas de dados

// Ataque XSS
// Utilizar a função htmlspecialchars();  


// $_POST['login'] = preg_replace('/[^[:alpha:]_]/', '',$_POST['login']); retira todos os caracteres, sem ser letras 
// $resultado = preg_replace('/[^[:alnum:]_]/', '',$senha);   retira todos os caracteres, sem ser números e letras 

//dataBase();
//DBMoip();
Pedido();

function Pedido(){
    $pedidos = new Pedidos();
    $funcDB = new FunctionsDB();
    $seguranca = new Seguranca();
    print $seguranca->filtro("HAH<>>>><< <script> S2HS30394IS.S;#$%%¨¨&&¨¨*()*&¨%$¨}[ã´sã´s[as]a[sASAS3PE0E394371''''''12´~2S//DS;.D;.,SAKSDI02304'9283278E3OZA-=2034-12381239");

    //$id = $_SESSION['id'];
    //$id_client = $funcDB->getIdClientMoip($id);
    //$pedidos->criarPedidoComClientMOIP(); 


}

function DBMoip(){
    $db = new FunctionsDB();
    $func = new Functions();
    $session = new FunctionsSession();
 
    $session->iniciarSession();
    $conn = $db->conectDB();
    $senha = "123";

    //$func->cURLGet();
   // $func->criarPreferenciaNotificacaoApp();
    
    print $db->loginEmailSenha($conn,"morgado@yourdev.com.br",md5($senha));
   // print $db->cadastrarUsuarioInquilino($conn,"17084104739","21","21472261","Rua blumenau","241","cascadura","21411-120","Rio de Janerio","RJ");
    print $func->criarCliente("17084104739","21","21472261","Rua blumenau","241","cascadura","21411-120","Rio de Janerio","RJ");
  //  $func->criarCliente("45d63a3538ff47ccb2c0f0c3c09eabd9_v2");
    // print $db->cadastrarUsuarioProprietario($conn,"170.841.047-39","302403266","Detran","2017-05-25","21","21472261","Rua blumenau","241","cascadura","21411-120","Rio de Janerio","RJ");
   //  print $func->criarContaMoipTransparenteCPF("170.841.047-39","302403266","DETRAN","2017-05-25","21","21472261","Rua blumenau","241","cascadura","21411-120","Rio de Janerio","RJ");
   //  $func->dadosConta();
   // print $func->cadastrarUsuarioProprietario($conn,"170.841.047-39","302403266","Detran","2017-05-25","21","21472261","Rua blumenau","241","cascadura","21411-120","Rio de Janerio","RJ","BRA");
   //  print $func->criarContaMoipTransparenteCPF("170.841.047-39","302403266","Detran","2017-05-25","21","21472261","Rua blumenau","241","cascadura","21411-120","Rio de Janerio","RJ","BRA");
}

function dataBase(){
     $db = new FunctionsDB();
     $session = new FunctionsSession();
    
     $conn = $db->conectDB();
    // $session->logout();
    $senha = "123";
    print $db->loginEmailSenha($conn,"morgado@yourdev.com.br",md5($senha));
    
     print "\n".$db->cadastrarUsuarioBasico($conn,"morgado@yourdev.com.br",md5($senha),"Guilherme","Morgado", "1998-12-04");
     //$id = $session->vereficarLogin();
     //print $id;

  

    
  //  print "\n".$db->cadastrarUsuarioBasico($conn,"morgado@yourdev.com.br","123","Guilherme","Morgado", "04/12/1998");

}

function session(){

    $functions = new Functions();
    $session = new FunctionsSession();

    $session->iniciarSession();

    if ($session->vereficarLogin()) {
        print "Logado";
    }else{
        print "não logado";
    }
    /*
    $session->login();

    if ($session->vereficarLogin()) {
        print "Logado";
    }else{
        print "não logado";
    }
    */

    $session->logout();


    if ($session->vereficarLogin()) {
        print "Logado";
    }else{
        print "não logado";
    }
}


//$functions->consultarSaldo("https://sandbox.moip.com.br/v2/balances","50625d8d09b2484a8111fcc4d2a643c9_v2");


?>