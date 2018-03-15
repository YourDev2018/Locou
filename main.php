<?php

require_once 'Functions.php';
require_once 'FunctionsSession.php';



function dataBase(){
    
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