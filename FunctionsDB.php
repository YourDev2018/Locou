<?php
require_once 'functions.php';
    class FunctionsDB {
/*
        mysql472.umbler.com:41890
        yourdevlocou
        YourDev2018
*/

        function conectDB(){
            
             $conn = new  mysqli("mysql472.umbler.com:41890","yourdevlocou","YourDev2018","locou");
             //$conn = new  mysqli("mysql472.umbler.com:41890","yourdevlocou","YourDev2018","locou_h");
           
             if ($conn->connect_erro){
                print $conn->connect_erro;
                return $conn->connect_erro;
            }else{
              //  print "conect DB  - /   ";
                return $conn;
            }
           
        }

        function closeDB($db){
            mysqli_close($db);
            return;
        }
        
        function loginEmailSenha($db, $email, $senha){

            $result =  $db->query("SELECT * FROM UsuarioBasico WHERE email = '$email' AND senha ='$senha' ") ;
            $cont = mysqli_num_rows($result);
            if ($cont <=0) {
                return false;
            }else{
                if ($cont == 1) {
                    while ($row=$result->fetch_assoc()) {
                        $_SESSION['logado']=true;
                        $_SESSION['id']= $row['id'];
                        $_SESSION['email']= $row['email'];
                        $_SESSION['firstName']=$row['firstName'];
                        $_SESSION['lastName']=$row['lastName'];
                        $_SESSION['dataNascimento']=$row['dataNascimento'];
                        $_SESSION['foto']=$row['foto'];
                        
                        return true;
                    }
                    
                }else{
                    return "false";
                }
            }       

        }

        function cadastrarUsuarioBasico($db, $email,$senha,$firstName, $lastName, $dataNascimento, $foto, $tel){
            
                $aux = $this->emailExist($db, $email);
                if (!$aux) {
                    $senha = md5($senha);
                    $sql = "INSERT INTO UsuarioBasico(email,senha,firstName,lastName,dataNascimento, foto, telefone) VALUES ('$email','$senha','$firstName','$lastName', '$dataNascimento', '$foto', '$tel')";
                    if ($db->query($sql)===true) {
                        $_SESSION['logado']=true;
                        $this->loginEmailSenha($db,$email,$senha);
                        return true;
                    }else{
                        return false;
                    }
                } else{
                    return false;
                } 
           
        }

        function cadastrarUsuarioInquilino($db, $cpf,$telDDD, $telNumero,$rua, $ruaNumero, $complemento, $bairro, $cep, $cidade, $estado){
            $moip = new functions();
            $session = new FunctionsSession();
            $aux = $moip->criarCliente($cpf,$telDDD, $telNumero,$rua, $ruaNumero, $complemento, $bairro, $cep, $cidade, $estado);

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

        
        function cadastrarAnuncioBasico($db, $idProprietario,$titulo,$categoria,$bairro,$cidade,$uf,$precoHora,$nomeImg,$nomeImg2,$nomeImg3,$nomeImg4,$nomeImg5,$rua,$num,$complemento){

                $session = new FunctionsSession(); 
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
            

                $sql = "INSERT INTO AnuncioBasico(idProprietario,titulo,categoria,bairro,cidade,uf,preco,fotoUm,fotoDois,fotoTres, fotoQuatro, fotoCinco,rua,numero,complemento) VALUES ('$idProprietario','$titulo','$categoria','$bairro','$cidade','$uf', '$precoHora','$nomeImg','$nomeImg2','$nomeImg3','$nomeImg4','$nomeImg5','$rua','$num','$complemento')";
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

        function cadastrarAnuncioDescGeral($db, $idAnuncio, $metragem, $recepcao, $banheiroPrivativo, $banheiroComum, $casaPredio, $elevador, $estacionamento, $proprioRotativo, $transporte, $reservaInsta, $novo_nome_pan,$novo_nome_pan2, $quatroHora, $cincoHora, $turno, $semana, $mes ){
          
                $sql = "INSERT INTO AnuncioDescricaoGeral(idAnuncio, metragem, recepcao, banheiroPrivativo, banheiro, casaOuPredio, elevador, estacionamento, proprioOuRotativo,transporte, fotoPanoramicaUm, fotoPanoramicaDois, quatroHora, cincoHora, turno, semana, mes, reservaInsta, lat, lng )
                        VALUES ('$idAnuncio','$metragem','$recepcao','$banheiroPrivativo','$banheiroComum','$casaPredio','$elevador','$estacionamento','$proprioRotativo',' $transporte', '$novo_nome_pan', '$novo_nome_pan2','$quatroHora','$cincoHora','$turno','$semana','$mes', '$reservaInsta', '0.0','0.0')";

                if ($db->query($sql)===true) {
                                        
                    return true;

                }else{
                  //  print "Insert failed";
                    return "Insert failed";
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

         function cadastrarPalestras($db, $idAnuncio, $climatizado, $modeloAr, $wifi, $vigilancia, $armarios, $limpeza, $copa, $numMesa, $numCadeira, $numQuadro, $numLousa, $numTelao, $numTv, $projetor, $som, $computador, $flip, $cafe, $agua, $buffet, $buffetExtra, $descricaoEquipamento, $descricaoAberta){
             $session = new FunctionsSession(); 
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
            

                $sql = "INSERT INTO AnuncioPalestra(idAnuncio, climatizado, modeloAr, wifi, vigilancia, armarios, limpeza, copa, numMesa, numCadeira, numQuadro, numLousa, numTelao, numTv, projetor, som, computador, flip, cafe, agua, buffet, buffetExtra, descricaoEquipamento, descricaoAberta)
                                    VALUES ('$idAnuncio', '$climatizado', '$modeloAr', '$wifi', '$vigilancia', '$armarios', '$limpeza', '$copa', '$numMesa', '$numCadeira', '$numQuadro', '$numLousa', '$numTelao', '$numTv', '$projetor', '$som', '$computador', '$flip', '$cafe', '$agua', '$buffet', '$buffetExtra', '$descricaoEquipamento', '$descricaoAberta')";

                if ($db->query($sql)===true) {
                    print $db->error_log;
                    return true;

                }else{
                    
                    return "Insert failed Palestra";
                }
            }else {
                return "não logado Palestra ";
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

        function cadastrarAulas($db,  $idAnuncio, $camarim, $apoio, $barra, $espelho, $descricaoAberta){
            $session = new FunctionsSession(); 
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
            

                $sql = "INSERT INTO AnuncioAulas(idAnuncio, camarim, apoio, barra, espelho, descricaoAberta)
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

        function cadastrarArtes($db,$idAnuncio, $forno, $macarico, $moldes, $bancada, $armario, $descricao){  
            
            
             $session = new FunctionsSession(); 
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
            

                $sql = "INSERT INTO AnuncioArtes(idAnuncio, forno, macarico, moldes, bancada, armario, descricao)
                                    VALUES ('$idAnuncio', '$forno', '$macarico', '$moldes', '$bancada', '$armario', '$descricao')";

                if ($db->query($sql)===true) {
                    print $db->error_log;
                    return true;

                }else{
                    
                    return "Insert failed ARTES";
                }
            }else {
                    return "não logado ARTES ";
            }

        }

        function cadastrarCostura($db,$idAnuncio, $recepcao, $maquina, $mobiliario, $provador, $armario, $descricao){
            
            
            $session = new FunctionsSession(); 
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
            

                $sql = "INSERT INTO AnuncioCostura(idAnuncio, recepcao, maquina, mobiliario, provador, armario, descricao)
                                    VALUES ('$idAnuncio', '$recepcao', '$maquina', '$mobiliario', '$provador', '$armario', '$descricao')";

                if ($db->query($sql)===true) {
                    print $db->error_log;
                    return true;

                }else{
                    
                    return "Insert failed Costura";
                }
            }else {
                    
                return "não logado Costura ";
            
            }
        }

        function cadastrarAcademia($db, $idAnuncio, $tatame, $armarios, $bosu, $rolo, $maca, $trapezio, $baqueta, $pilates, $descricao){

            

             $session = new FunctionsSession(); 
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
            

                $sql = "INSERT INTO AnuncioAcademia(idAnuncio, tatame, armarios, bosu, rolo, maca, trapezio, baqueta, pilates, descricao)
                                    VALUES ('$idAnuncio', '$tatame', '$armarios', '$bosu', '$rolo', '$maca', '$trapezio', '$baqueta', '$pilates', '$descricao')";

                if ($db->query($sql)===true) {
                    print $db->error_log;
                    return true;

                }else{
                    
                    return "Insert failed Academia";
                }
            }else {
                    
                return "não logado Academia ";
            
            }

        }

        function AnuncioFotografico($db, $idAnuncio, $climatizado, $modeloAr, $altura, $wifi, $cozinha, $banheiro, $chuveiro, $camarim, $frigobar, $agua, $fundo, $chroma, $iluminacao, $descricaoAberta){

             $session = new FunctionsSession(); 
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
            

                $sql = "INSERT INTO AnuncioFotografico(idAnuncio, climatizado, modeloAr, altura, wifi, cozinha, banheiro, chuveiro, camarim, frigobar, agua, fundo, chroma, iluminacao, descricaoAberta)
                                    VALUES ('$idAnuncio', '$climatizado', '$modeloAr', '$altura', '$wifi', '$cozinha', '$banheiro', '$chuveiro', '$camarim', '$frigobar', '$agua', '$fundo', '$chroma', '$iluminacao', '$descricaoAberta')";

                if ($db->query($sql)===true) {
                    print $db->error_log;  
                    return true;

                }else{
                    
                    return "Insert failed fotografico";
                }
            }else {
                    
                return "Não logado Fotografico";
            
            }

        }


        function AnuncioProdutora($db, $idAnuncio, $climatizado, $modeloAr, $altura, $wifi, $cozinha, $banheiro, $chuveiro, $camarim, $frigobar, $agua, $fundo, $chroma, $iluminacao, $descricaoAberta){

             $session = new FunctionsSession(); 
            if ($session->vereficarLogin()) {
                $id = $session->vereficarLogin();
                
                print $banheiro;

                $sql = "INSERT INTO AnuncioProdutora(idAnuncio, climatizado, modeloAr, altura, wifi, cozinha, banheiro, chuveiro, camarim, frigobar, agua, fundo, chroma, iluminacao, descricaoAberta)
                                    VALUES ('$idAnuncio', '$climatizado', '$modeloAr', '$altura', '$wifi', '$cozinha', '$banheiro', '$chuveiro', '$camarim', '$frigobar', '$agua', '$fundo', '$chroma', '$iluminacao', '$descricaoAberta')";

                if ($db->query($sql)===true) {
                    print $db->error_log;
                    return true;

                }else{
                    
                    return "Insert failed produtora";
                }
            }else {
                    
                return "Não logado produtora";
            
            }

        }

        function cadastrarHorariosDisponiveis($db, $idAnuncio, $dataInicio, $dataFim, $horaInicio, $horaFim ){
            
                $sql = "INSERT INTO RegistroAnunciosDisponiveis(idAnuncio, dataEntrada, horaEntrada, dataSaida, horaSaida)
                                    VALUES ('$idAnuncio', '$dataInicio', '$horaInicio', '$dataFim', '$horaFim')";

                if ($db->query($sql)===true) {  
                   // print $db->error_log;
                    return true;

                }else{
                  //  print 'failed';
                    return "Insert failed";
                }

        }

        function cadastrarHorariosOcupados($db, $idAnuncio,$dataInicio, $dataFim, $horaInicio, $horaFim ){
            $sql = "INSERT INTO RegistroAnunciosOcupados(idAnuncio, dataEntrada, horaEntrada, dataSaida, horaSaida)
                                    VALUES ('$idAnuncio', '$dataInicio', '$horaInicio', '$dataFim', '$horaFim')";

                if ($db->query($sql)===true) {  
                   // print $db->error_log;
                    return true;

                }else{
                  //  print 'failed';
                    return "Insert failed";
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

        function getIdClientMoip($db, $id){
            //$db = $this->conectDB();
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

        function retornarPreco($db,$idAnuncio){

            $result =  $db->query("SELECT preco FROM AnuncioBasico WHERE idAnuncio = '$idAnuncio' ") ;
            $cont = mysqli_num_rows($result); 
            if ($cont <=0) {
                print "erro retornar Preço";
            }else{
                 while ($row=$result->fetch_assoc()) {
                     return $row['preco'];
                 }
            }

        }

        function retornarPrecoHoraGeral($db,$idAnuncio,$qtdHora){
            $result =  $db->query("SELECT $qtdHora FROM AnuncioDescricaoGeral WHERE idAnuncio = '$idAnuncio' ") ;  
            $cont = mysqli_num_rows($result); 
            if ($cont <=0) {
                print "Erro buscar $qtdHora";
            }else{
                 while ($row=$result->fetch_assoc()) {
                     return $row[$qtdHora];
                 }
            }
        }
  

        function getInfoUserProprietario($db,$idAnuncio){

                // print $idProprietario;
               
            $result =  $db->query(" SELECT idProprietario
                                    FROM AnuncioBasico
                                    WHERE idAnuncio = '$idAnuncio' ") ; // OR titulo = '$busca' OR cidade = '$busca' 
            $cont = mysqli_num_rows($result);
        
            if ($cont <=0) {
           //     print "erro buscar proprietario";
            }else{
                
                while ($row=$result->fetch_assoc()) {
                    
                    $idProprietario = $row['idProprietario'];   
                }  

              //  print $idProprietario;
                return $this->getUsuarioBasico($db,$idProprietario);
            
            }
           
        }
   
        function getUsuarioBasico($db,$id){

                $result =  $db->query(" SELECT *
                                        FROM UsuarioBasico
                                        WHERE id = '$id' ") ;

                $aux = mysqli_num_rows($result);
                
                $array = [];
                $cont=0;

            if ($aux <=0) {
              //  print "erro getUsarioBasico";
            }else{
                
                while ($row=$result->fetch_assoc()) {
                    
                    $array[$cont] = $row['firstName']." ".$row['lastName'];   
                    $cont++;

                    $array[$cont] = $row['foto'];
                    $cont++;

                    $array[$cont] = $row['email'];
                }

                return $array;
            
            }
                
        }

        function getUltimoIDs($db,$tabela){
            $result = "SELECT id FROM $tabela ORDER BY id DESC LIMIT 1";
            $result = $db->query($result);

            $aux = mysqli_num_rows($result);
            while ($row=$result->fetch_assoc()) {
                    
                return $row['id'];
            }
        }

        function getUsuarioProprietario($db, $idUsuario){

            $result = "SELECT idMoipAccount FROM UsuarioProprietario WHERE id = '$idUsuario'";
            $result = $db->query($result);

            $aux = mysqli_num_rows($result);
            while ($row=$result->fetch_assoc()) {
              //  print $row['idMoipAccount'];    
                return $row['idMoipAccount'];
            }

        }

        function getAnuncioInstantaneo($db, $idAnuncio)
        {
            $result = "SELECT reservaInsta FROM AnuncioDescricaoGeral WHERE idAnuncio = '$idAnuncio'";
            $result = $db->query($result);

            $aux = mysqli_num_rows($result);
            while ($row=$result->fetch_assoc()) {
                    
                return $row['reservaInsta'];
            }  
        }

        function salvarPedido($db,$idAnuncio,$idHash,$idUsuario,$idOrder){
                $sql = "INSERT INTO Pedidos(idHash, idAnuncio, idUsuario, idOrder)
                                    VALUES ('$idHash','$idAnuncio', '$idUsuario', '$idOrder')";

                if ($db->query($sql)===true) {  
                   // print $db->error_log;
                    return true;

                }else{
                  //  print 'failed';
                    return "Insert failed";
                }
        }


        function cadastrarPedidosTemporarios($db,$hashId,$idCliente,$idMoipProprietario,$idAnuncio,$tituloAnuncio,$preco,$tipo,$idOrder){

             $sql = "INSERT INTO PedidosTemporarios(hashId, idCliente, idMoipProprietario,idAnuncio,tituloAnuncio,preco,tipo,idOrder)
                                    VALUES ('$hashId','$idCliente', '$idMoipProprietario', '$idAnuncio', '$tituloAnuncio','$preco','$tipo','$idOrder')";

                if ($db->query($sql)===true) {  
                   // print $db->error_log;
                    print $id = mysqli_insert_id($db); 
                    return $id;

                }else{
                    print 'failed';
                    return "Insert failed";
                }

        }

        function setDetalhesPedido($tabela,$conn,$idAnuncio, $dataEntrada, $horaEntrada, $horaSaida){

                $sql = "INSERT INTO $tabela (idPedidoTemporario, dataAnuncio, horaEntrada	,horaSaida)
                                    VALUES ('$idAnuncio','$dataEntrada', '$horaEntrada', '$horaSaida')";

                if ($conn->query($sql)===true) {  
                   // print $db->error_log;
                    return true;

                }else{
                  //  print 'failed';
                    return "Insert failed";
                }

        }

        

        function atualizarCadastroTemporario($conn,$id,$idUsuario,$idMoipProprietario,$idAnuncio,$tituloAnuncio,$somaPrecos,$idPedidosTemporarios){

            $sql = "UPDATE PedidosTemporarios SET hashId = '$id', idCliente = '$idUsuario', idMoipProprietario = '$idMoipProprietario', idAnuncio = '$idAnuncio', tituloAnuncio = '$tituloAnuncio', preco = '$somaPrecos' WHERE id = $idPedidosTemporarios"; 
            
             if ($conn->query($sql)===true) {  
                   // print $db->error_log;
                    return true;

            }else{
                //  print 'failed';
                return "Insert failed";
            }


        }

        function atualizarPedidosTemporarios($idOrder){

        }

        

    }
?>