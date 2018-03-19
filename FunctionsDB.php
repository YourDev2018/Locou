<?php

    class FunctionsDB {
/*
        mysql472.umbler.com:41890
        yourdevlocou
        YourDev2018
*/

        function conectDB(){
            
             //  $conn = new  mysqli("mysql762.umbler.com:41890","knivet","knivet2017","knivet");
             $conn = new  mysqli("mysql472.umbler.com:41890","yourdevlocou","YourDev2018","locou");
            if ($conn->connect_erro){
                print $conn->connect_erro;
                return $conn->connect_erro;
            }else{
                print "sucesso conect DB \n";
                return $conn;
            }
        


            // Testar PDO quando subir para o servidor, não funcional em localhost

            /*
            $host = 'mysql427.umbler.com:41890;dbname=knivet';
            $user = 'knivet';
            $senha = 'knivet2017';
            try {
                $pdo = new PDO($host,$user,$senha);
                return $pdo;
            }catch(PDOException $e){
                return $e;
            }
            */
           
        }
        
        function loginEmailSenha($db, $email, $senha){

            $result =  $db->query("SELECT * FROM UsuarioBasico WHERE email = '$email' /*OR usuario = '$usuario'*/ AND senha ='$senha' ") ;
            $cont = mysqli_num_rows($result);
            if ($cont <=0) {
                return "Login Erro";
            }else{
                if ($cont == 1) {
                    while ($row=$result->fetch_assoc()) {
                        $_SESSION['logado']=true;
                        $_SESSION['id']= $row['id'];
                        $_SESSION['email']= $row['email'];
                        $_SESSION['firstName']=$row['firstName'];
                        $_SESSION['lastName']=$row['lastName'];
                        $_SESSION['dataNascimento']=$row['dataNascimento'];
                        return true;
                    }
                    
                }else{
                    return "false";
                }
            }       

        }

        function cadastrarUsuarioBasico($db, $email,$senha,$firstName, $lastName, $dataNascimento){
                $aux = $this->emailExist($db, $email);

                $sql = "INSERT INTO UsuarioBasico(email,senha,firstName,lastName,dataNascimento) VALUES ('$email','$senha','$firstName','$lastName', '$dataNascimento')";
                if ($db->query($sql)===true) {
                    $_SESSION['logado']=true;
                    $this->loginEmailSenha($db,$email,$senha);
                    return true;
                }else{
                    return "false";
                }

           
        }

        function cadastrarUsuarioInquilino($db,$cpf,$telDDD, $telNumero,$rua, $ruaNumero, $bairro, $cep, $cidade, $estado){
            $moip = new Functions();
            $session = new FunctionsSession();
            $aux = $moip->criarCliente($cpf,$telDDD, $telNumero,$rua, $ruaNumero, $bairro, $cep, $cidade, $estado);

            print "/n \n ".$aux;

           if (isset($aux)) {
                if ($session->vereficarLogin()) {
                    $id = $session->vereficarLogin();
                    $sql = "INSERT INTO UsuarioClient(id,idClient) VALUES ('$id','$aux')";
                    if ($db->query($sql)===true) {
                        return true;
                    }else{
                        return "Insert failed";
                    }
                }else {
                    return "não logado";
                }
             }else{
                 return "vazio";
             }
        }

        function cadastrarUsuarioProprietario($db, $cpf, $rgNumero, $rgOrgao, $rgData, $telDDD, $telNumero, $rua, $ruaNumero, $bairro, $cep, $cidade, $estado){
            $moip = new Functions();
            $session = new FunctionsSession();
            $aux = $moip->criarContaMoipTransparenteCPF($cpf, $rgNumero, $rgOrgao, $rgData, $telDDD, $telNumero, $rua, $ruaNumero, $bairro, $cep, $cidade, $estado);
            print "\n".$aux[0];
            print "\n".$aux[1];
            
            $bankId = $moip->criarContaBancaria($aux[0],$aux[1],"SAVING","237","2784","7","0015562","4","Guilherme Morgado Fonseca","170.841.047-39");
            print "\n".$bankId;

          
      
            $idBank = $bankId;
        
            
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
                $idMoip = $aux[0];
                $token = $aux[1];
                $sql = "INSERT INTO UsuarioProprietario(id,idMoipAccount,idBankAccount,token) VALUES ('$id','$idMoip','$idBank','$token')";
                if ($db->query($sql)===true) {
                    return true;
                }else{
                    return "Insert failed";
                }
            }else {
                return "não logado";
            }

           

        }

        
        function cadastraAnuncioBasico($idProprietario,$titulo,$categoria,$bairro,$cidade,$uf){

                
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
                $idMoip = $aux[0];
                $token = $aux[1];
                $sql = "INSERT INTO AnuncioBasico(idProprietario,titulo,categoria,bairro,cidade,uf) VALUES ('$idProprietario','$titulo','$categoria','$bairro','$cidade','$uf')";
                if ($db->query($sql)===true) {
                    return true;
                }else{
                    return "Insert failed";
                }
            }else {
                return "não logado";
            }


        }

        private function emailExist($db, $email){

            $result =  $db->query("SELECT * FROM UsuarioBasico WHERE email = '$email' ") ;
            $cont = mysqli_num_rows($result);
            if ($cont <=0) {
                return  false;
            }else{
                return true;
            }

        }

        function getIdClientMoip($id){
            $db = $this->conectDB();
            $result =  $db->query("SELECT idClient FROM UsuarioClient WHERE id = '$id'") ;
            $cont = mysqli_num_rows($result);
            if ($cont <=0) {
                return "Login Erro";
            }else{
                if ($cont == 1) {
                    while ($row=$result->fetch_assoc()) {
                        return $row['idClient'];
                    }
                    
                }else{
                    return "false";
                }
            }       
        }

        /*
        private function tratarDados($char){
            
            if(strpos($char, '/') || strpos($char, '*') || strpos ($char, "|"  ) || strpos($char, "\ ") || strpos($char, "*") ){
                return true;
            }

        }
    
        */
    }
    

?>