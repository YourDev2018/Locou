<?php

class FunctionsSession{


    function iniciarSession(){
        session_start();
    }

    function vereficarLogin(){
        
        if(( isset($_SESSION['logado']) )){
            return $_SESSION['id'];
        }else{
            return false;
        }
        
    }

    function login(){
        $_SESSION['logado'] = true;
    }

    function logout(){
        $_SESSION['logado'] = null;
        $_SESSION['id'] = null;
    }

}

?>
