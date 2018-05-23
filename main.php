<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once 'functions.php';
require_once 'FunctionsSession.php';
require_once 'FunctionsDB.php';
require_once 'Pedidos.php';
require_once 'Seguranca.php';
require_once 'Espaco.php';
 
// SQL INJECTION CODES
// utilizar a funçao addslashes(); para tratar sql injection, usar em todas as entradas de dados

// Ataque XSS
// Utilizar a função htmlspecialchars();  


// $_POST['login'] = preg_replace('/[^[:alpha:]_]/', '',$_POST['login']); retira todos os caracteres, sem ser letras 
// $resultado = preg_replace('/[^[:alnum:]_]/', '',$senha);   retira todos os caracteres, sem ser números e letras 

//dataBase();
//DBMoip();
//Pedido();
require_once 'BuscarEspacos.php';
//returnEspaco();
//returnEspaco();
//returnConsultorio();
//anuncioAdd();
// usuarioCliente();
//testarLogin();
//criarNotificacao();
//retornarDiasCadastrados();
//aprovar();
consultarSaldo();

  //  print  $data = date('Y-m-d')."\n  ";
/*
    $data = date('Ymd', strtotime("next Wednesday"));

    $sem = 2;
  for( $i=0;$i<$sem;$i++){
                        
        if(($segI == null || $segF == null || $segI == '' || $segF == '' )){

            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
           // echo strftime('%A, %d de %B de %Y', strtotime('today'));

            $data = (string)$data;
            $date = new DateTime($data);
            $dias = $i*7;
            $date->add(new DateInterval('P'.$dias.'D'));
            print " ".$data = $date->format('Ymd');
           // $result = $db-> cadastrarHorariosDisponiveis($conn,$aux,$data,$data,$segI,$segF);

           
        
        }
    }

 $db = new FunctionsDB();
  $conn = $db->conectDB();
  $busca = new BuscarEspacos();
    $arrayHorarios = $busca->retornarDiasCadastrados($conn,160);
  
for ($i =0; $i<count($arrayHorarios); $i++) { 

    $originalDate = $arrayHorarios[$i];
    $newDate = date("d-m-Y", strtotime($originalDate));
 //   print $newDate. " / " ;
 
    //print $day = date('N',strtotime($originalDate));
}*/
//((bool)true. "".(bool)false);
/*
$db = new FunctionsDB();
$conn = $db->conectDB();
$arrayUser = $db->getInfoUserProprietario($conn,160);
var_dump($arrayUser);
 */

    $db = new FunctionsDB();
  $conn = $db->conectDB();

  $busca = new BuscarEspacos();
 
// $array = $busca -> retornarMenorHorário($conn,174);
 // print $array[1];

 function consultarSaldo(){

    $func = new Functions();
    $func->consultarSaldo('9ac332eb93da464eb2366b242433386c_v2');
   // $func->criarTranferenciaMoipToMoip();

 }

 function aprovar(){
    $func = new Functions();
    $func->aprovarCompra('PAY-LCBDMRCORIYY','38400');
 }

function retornarDiasCadastrados(){
    $db = new FunctionsDB();
    $conn = $db->conectDB();
    $busca = new BuscarEspacos();

  //  print_r($arrayHorarios = $busca->getDiasHabilitadosAnuncioReincidente($conn,193));
    print_r($arrayHorario = $busca->retornarHorário($conn,193) );
    
  //  print $db-> retornarUltimoAnuncioBasico($conn);
    //$db->setDetalhesPedido('PedidosTemporariosUnico',$conn,1,1,1,1);
    //$nextMonday = date('Ymd', strtotime("next Monday"));
   // print_r($array = $busca->retornarHorário($conn,'161'));
}
 
function criarNotificacao(){

    $func = new functions();
   //$func->criarPreferenciaNotificacaoApp();
     //  $func->excluirPreferenciaNotificacaoApp();
   // $func->listarPreferenciaNotificacao();
   $func->consultarChamada();
   
}

function testarLogin(){
    
    $db = new FunctionsDB();
    $conn = $db->conectDB();
    print $result = $db -> loginEmailSenha($conn,'morgado@yourdev.com.br',md5('123'));
}

function usuarioCliente(){
    $db = new FunctionsDB();
    $conn = $db->conectDB();
    $func = new functions();
    $func->cURLGet();
    // print $db->cadastrarUsuarioInquilino($conn,"17084104739","21","21472261","Rua blumenau","241",'',"cascadura","21411-120","Rio de Janerio","RJ");

   
}

function anuncioAdd(){
    $db = new FunctionsDB();
    $conn = $db->conectDB();
    $busca = new BuscarEspacos();
    print $busca->addContador($conn,47);
}

function returnEspaco(){
 
  $db = new FunctionsDB();
  $conn = $db->conectDB();
  $busca = new BuscarEspacos();
  $array = $busca->buscarEspacoBairroTipo($conn, 'cozinha', '');
  //print_r ($array);

   

}

function returnConsultorio(){
  $db = new FunctionsDB();
  $conn = $db->conectDB();
  $busca = new BuscarEspacos();
  $array = $busca->retornarEspacoConsultorio($conn);
  
  return $array;

}

function Pedido(){
    $pedidos = new Pedidos();
    $funcDB = new FunctionsDB();
    $seguranca = new Seguranca();
  //  print $seguranca->filtro("HAH<>>>><< <script> S2HS30394IS.S;#$%%¨¨&&¨¨*()*&¨%}[ã´sã´s[as]a[sASAS3PE0E394371''''''12´~2S//DS;.D;.,SAKSDI02304'9283278E3OZA-=2034-12381239");

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