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
              //  print "conect DB  - /   ";
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

        function closeDB($db){
            mysqli_close($db);
            return;
        }
        
        function loginEmailSenha($db, $email, $senha){

            $result =  $db->query("SELECT * FROM UsuarioBasico WHERE email = '$email' AND senha ='$senha' ") ;
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

        function cadastrarUsuarioBasico($db, $email,$senha,$firstName, $lastName, $dataNascimento, $foto){
                $aux = $this->emailExist($db, $email);

                $sql = "INSERT INTO UsuarioBasico(email,senha,firstName,lastName,dataNascimento, foto) VALUES ('$email','$senha','$firstName','$lastName', '$dataNascimento', '$foto')";
                if ($db->query($sql)===true) {
                    $_SESSION['logado']=true;
                    $this->loginEmailSenha($db,$email,$senha);
                    return true;
                }else{
                    return "false";
                }

           
        }

        function cadastrarUsuarioInquilino($cpf,$telDDD, $telNumero,$rua, $ruaNumero, $bairro, $cep, $cidade, $estado){
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
         //   $db = $this->conectDB();
           
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
                    $this->closeDB($db);
                    return true;
                }else{
                    $this->closeDB($db);
                    return "Insert failed";
                }
            }else {
                $this->closeDB($db);
                return "não logado";
            }

           

        }

        
        function cadastrarAnuncioBasico($db, $idProprietario,$titulo,$categoria,$bairro,$cidade,$uf,$precoHora,$nomeImg,$nomeImg2,$nomeImg3){

                $session = new FunctionsSession(); 
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
            

                $sql = "INSERT INTO AnuncioBasico(idProprietario,titulo,categoria,bairro,cidade,uf,preco,fotoUm,fotoDois,fotoTres) VALUES ('$idProprietario','$titulo','$categoria','$bairro','$cidade','$uf', '$precoHora','$nomeImg','$nomeImg2','$nomeImg3')";
                if ($db->query($sql)===true) {
                    $last_id = $db->insert_id;
                    
                   // print $last_id;
                    return $last_id;

                }else{
                    return "Insert failed";
                }
            }else {
                return "não logado";
            }


        }

        function cadastrarAnuncioDescGeral($db, $idAnuncio, $metragem, $recepcao, $banheiroPrivativo, $banheiroComum, $casaPredio, $elevador, $estacionamento, $proprioRotativo, $transporte  ){
            
            $session = new FunctionsSession(); 
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
            

                $sql = "INSERT INTO AnuncioDescricaoGeral(idAnuncio, metragem, recepcao, banheiroPrivativo, banheiro, casaOuPredio, elevador, estacionamento, proprioOuRotativo,transporte)
                        VALUES ('$idAnuncio','$metragem','$recepcao','$banheiroPrivativo','$banheiroComum','$casaPredio','$elevador','$estacionamento','$proprioRotativo',' $transporte')";

                if ($db->query($sql)===true) {
                                        
                    return true;

                }else{
                    return "Insert failed";
                }
            }else {
                return "não logado";
            }

        }

        function cadastrarConsultorio($db,$idAnuncio, $climatizado, $modeloArs ,$wifi, $monitoramento, $armarios, $secretaria, $limpeza,$copa,$numMesa, $nunCadeira, 
                                     $numLuminaria,$numCortina, $nunMacas, $balanca,$cafe, $agua, $tv, $descricao, $modeloAr){
            
            $session = new FunctionsSession(); 
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
            

                $sql = "INSERT INTO AnuncioConsultorio(idAnuncio, climatizado, wifi, monitoramento, armarios, secretaria, limpeza,copa, numMesa, nunCadeira, numLuminaria,numCortina, nunMacas, balanca,cafe, agua, tv, descricao, modeloAr)
                VALUES ('$idAnuncio', '$climatizado', '$wifi', '$monitoramento', '$armarios', '$secretaria', '$limpeza', '$copa', '$numMesa', '$nunCadeira', '$numLuminaria', '$numCortina', '$nunMacas', '$balanca', '$cafe', '$agua', '$tv', '$descricao', '$modeloArs')";

                if ($db->query($sql)===true) {
                                        
                    return true;

                }else{
                    return "Insert failed";
                }
            }else {
                return "não logado";
            }
        }

        function cadastrarCozinha($db, $idAnuncio, $climatizado, $modeloAr, $areaEvento, $numMesa, $numCadeira, $bar, $buffet, $aula, $wifi, $monitoramento, $armario, $chave, $estante, $faxina, $inventario, $freezer, $geladeira, $fogao, $tipoFogao, $fogaoCaracteristica, $forno, $fornoTipo, $descricaoExaustor, $descricaoAberta){
            $session = new FunctionsSession(); 
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
            

                $sql = "INSERT INTO AnuncioCozinha(idAnuncio, climatizado, modeloAr, areaEvento, numMesa, numCadeira, bar, buffet, aula, wifi, monitoramento, armario, chave, estante, faxina, inventario, freezer, geladeira, fogao, tipoFogao, fogaoCaracteristica, forno, fornoTipo, descricaoExaustor, descricaoAberta)
                        VALUES ('$idAnuncio', '$climatizado', '$modeloAr', '$areaEvento', '$numMesa', '$numCadeira', '$bar', '$buffet', '$aula', '$wifi', '$monitoramento', '$armario', '$chave', '$estante', '$faxina', '$inventario', '$freezer', '$geladeira', '$fogao', '$tipoFogao', '$fogaoCaracteristica', '$forno', '$fornoTipo', '$descricaoExaustor', '$descricaoAberta')";

                if ($db->query($sql)===true) {
                    print $db->error_log;
                    return true;

                }else{
                    
                    return "Insert failed cozinha";
                }
            }else {
                return "não logado cozinha ";
            }
        }

        function cadastrarWorkShop($db, $idAnuncio, $climatizado, $modeloAr, $wifi, $vigilancia, $armarios, $limpeza, $copa, $numMesa, $numCadeira, $numQuadro, $numLousa, $numTelao, $numTv, $projetor, $som, $computador, $flip, $cafe, $agua, $buffet, $buffetExtra, $descricaoEquipamento, $descricaoAberta){
             $session = new FunctionsSession(); 
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
            

                $sql = "INSERT INTO AnuncioWorkShop(idAnuncio, climatizado, modeloAr, wifi, vigilancia, armarios, limpeza, copa, numMesa, numCadeira, numQuadro, numLousa, numTelao, numTv, projetor, som, computador, flip, cafe, agua, buffet, buffetExtra, descricaoEquipamento, descricaoAberta)
                                    VALUES ('$idAnuncio', '$climatizado', '$modeloAr', '$wifi', '$vigilancia', '$armarios', '$limpeza', '$copa', '$numMesa', '$numCadeira', '$numQuadro', '$numLousa', '$numTelao', '$numTv', '$projetor', '$som', '$computador', '$flip', '$cafe', '$agua', '$buffet', '$buffetExtra', '$descricaoEquipamento', '$descricaoAberta')";

                if ($db->query($sql)===true) {
                    print $db->error_log;
                    return true;

                }else{
                    
                    return "Insert failed workshop";
                }
            }else {
                return "não logado workshop ";
            }
        }
        
        function cadastrarEnsaio($db,  $idAnuncio, $camarim, $apoio, $barra, $espelho, $descricaoAberta){
            $session = new FunctionsSession(); 
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
            

                $sql = "INSERT INTO AnuncioEnsaio(idAnuncio, camarim, apoio, barra, espelho, descricaoAberta)
                                    VALUES ('$idAnuncio', '$camarim', '$apoio', '$barra', '$espelho', '$descricaoAberta')";

                if ($db->query($sql)===true) {
                    print $db->error_log;
                    return true;

                }else{
                    
                    return "Insert failed ensaio";
                }
            }else {
                    return "não logado ensaio ";
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

        function salvarfoto(){

            // $ext = strtolower(substr($_FILES['foto1']['name'],-4));
        }

        /*
          private function getIdAnuncio($db){
            if ($db->query("SELECT LAST_INSERT_ID() INTO AnuncioBasico")===true){
                $last_id = $db->insert_id;
                print $last_id;
                return $last_id;
            }else{
                return false;
            }

        }
*/
        /*
        private function tratarDados($char){
            
            if(strpos($char, '/') || strpos($char, '*') || strpos ($char, "|"  ) || strpos($char, "\ ") || strpos($char, "*") ){
                return true;
            }

        }
    
        */
    }
    

?>