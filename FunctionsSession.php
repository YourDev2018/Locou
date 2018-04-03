<?php

class FunctionsSession{


    function iniciarSession(){
        session_start();
    }

    function vereficarLogin(){
        
        if(( isset($_SESSION['logado']) )){
            return $_SESSION['id'];
        }else{
            return 'false';
        }
        
    }

    function verificarUsuarioCliente($db,$id){
        
            if ($id == null || $id == "") {
                return "false";
            }

            $result =  $db->query("SELECT * FROM UsuarioClient WHERE id = '$id' ") ;
            $cont = mysqli_num_rows($result);
        
            if ($cont <=0) {
                return "false";
            }else{
                    
                   while ($row=$result->fetch_assoc()) {
                        
                        return $row['idClient'];

                    }
                    
                 
            }       
        
    }

    function login(){
        $_SESSION['logado'] = true;
    }

    function logout(){
        $_SESSION['logado'] = null;
        $_SESSION['id'] = null;
        $_SESSION['email']= null;
        $_SESSION['firstName']= null;
        $_SESSION['lastName']= null;
        $_SESSION['dataNascimento']= null;
        $_SESSION['foto']= null;
    }

}

?>
