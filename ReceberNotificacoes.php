
<?php
    error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    require_once 'EnviarEmail.php';
    require_once 'FunctionsDB.php';
    require_once 'Pedidos.php';
    require_once 'BuscarEspacos.php';

    $json = file_get_contents('php://input');

    $obj = json_decode($json);
    $tipoEvento = $obj->{'event'};

  
    $db = new FunctionsDB();
    $conn = $db->conectDB();
    $email = new EnviarEmail();
    $pedidos = new Pedidos();

    $sql = "INSERT INTO OutrosEstados(nome, cidade, estado, email, celular, tipo, outraInformacao) VALUES ('$tipoEvento','$tipoEvento','','','','','$tipoEvento')";
    if ($conn->query($sql)===true) {

    }else{
        $db->closeDB($conn);
    }
    

   // $tipoEvento = 'ORDER.CREATED';
    
    // 1° - Primeiro tratamento / envio de email
       
    // Quando seu pagamento esta sendo analisado
        // Quando pedido foi aprovado / Ou não foi aprovado

    // 2° - Segundo tratamento / envio de email
        //

//    $tipoEvento = 'PAYMENT.WAITING';


    if ($tipoEvento == 'PAYMENT.WAITING') {
        // Quando seu pagamento esta sendo analisado
        $resource = $obj->{'resource'};
        $payment = $resource->{'payment'};
        $links = $payment->{'_links'};
        $order = $links->{'order'};
        $idOrder = $order->{'title'};

        //       $idOrder = 'ORD-SY29LYBG6DCC';
         
        $jsonId = $pedidos->consultarPedido($idOrder);
        $jsonId = json_decode($jsonId);
        $custumer=$jsonId ->{'customer'};
        $name = $custumer->{'fullname'};
        $emailCustomer = $custumer->{'email'};

        $items = $jsonId->{'items'};
        $item = $items[0];
        $detail = $item->{'detail'};

        
        $buscar = new BuscarEspacos();
        $array = $buscar->getPedidosDBPorOrder($conn,$idOrder);
        $hashId = $array[0];
        
      
        $array = $buscar -> getHashId($conn,$hashId);
        $titulo = $array[3];
        $id = $array[5];

    #    if ($array[6]=='unico') {
            
            $detalhe = $buscar->getPedidosTemporariosUnico($conn,$id);
            $data = $detalhe[0];
            $entrada = $detalhe[1];
            $saida = $detalhe[2];

            $data = date('d/m/Y', strtotime($data));
            $entrada = substr_replace($entrada,':',-2,-2);
            $saida = substr_replace($saida,':',-2,-2);


            $corpo = '<html><body>';
            $corpo .= "Olá $name, tudo  bem? <br>";
            $corpo .= "Nós recebemos o seu pedido de agendamento para o $detail <p> </p>";
            $corpo .= "Data: $data <br>";
            $corpo .= "Entrada: $entrada <br>";
            $corpo .= "Saida: $saida <br>";

            $corpo .= "</body></html>";

            $emailCustomer = 'contatoyourdev@gmail.com';
            print $corpo.'<br></br>';

            $email->enviar($emailCustomer,'Pedido em análise',$corpo);
     #   }
    } 
//    $tipoEvento = 'PAYMENT.AUTHORIZED';

   
// Usuário cliente notificado
    if ($tipoEvento == 'PAYMENT.AUTHORIZED') {
        
        $resource = $obj->{'resource'};
        $payment = $resource->{'payment'};
        $links = $payment->{'_links'};
        $order = $links->{'order'};
        $idOrder = $order->{'title'};

        //       $idOrder = 'ORD-SY29LYBG6DCC';

        $jsonId = $pedidos->consultarPedido($idOrder);
        $jsonId = json_decode($jsonId);
        $custumer=$jsonId ->{'customer'};
        $name = $custumer->{'fullname'};
        $emailCustomer = $custumer->{'email'};

        $items = $jsonId->{'items'};
        $item = $items[0];
        $detail = $item->{'detail'};

        $buscar = new BuscarEspacos();
        $array = $buscar->getPedidosDBPorOrder($conn,$idOrder);
        $hashId = $array[0];
        
      
        $array = $buscar -> getHashId($conn,$hashId);
        $titulo = $array[3];
        $id = $array[5];

  #      if ($array[6]=='unico') {
            
            $detalhe = $buscar->getPedidosTemporariosUnico($conn,$id);
            $data = $detalhe[0];
            $entrada = $detalhe[1];
            $saida = $detalhe[2];

            $data = date('d/m/Y', strtotime($data));
            $entrada = substr_replace($entrada,':',-2,-2);
            $saida = substr_replace($saida,':',-2,-2);

            $corpo = '<html><body>';
            $corpo .= "Olá $name, tudo bem? <br>";
            $corpo .= "Seu pagamento foi aprovado. <br> Pedido: $idOrder  <p> </p>";
            $corpo .= "Espaço: $detail <br>";
            $corpo .= "Data: $data <br> Entrada: $entrada <br> Saida: $saida";
            $corpo .= "</body></html>";

            print $corpo.'<br></br>';

            $emailCustomer = 'contatoyourdev@gmail.com';

            $email->enviar($emailCustomer,'Pagamento aprovado',$corpo);
 #       }

   }
   

// usuário proprietário notificado    

 //   $tipoEvento = 'PAYMENT.AUTHORIZED';

    if ($tipoEvento == 'PAYMENT.AUTHORIZED') {
        
        $resource = $obj->{'resource'};
        $payment = $resource->{'payment'};
        $links = $payment->{'_links'};
        $order = $links->{'order'};
        $idOrder = $order->{'title'};

      //     $idOrder = 'ORD-SY29LYBG6DCC';
        
        $buscar = new BuscarEspacos();
        $array = $buscar->getPedidosDBPorOrder($conn,$idOrder);
        $hashId = $array[0];

        $idAnuncio = $array[1];
        $arrayUserProprietario = $db->getInfoUserProprietario($conn,$idAnuncio);
        $emailCustomer = $arrayUserProprietario[2];
        $name = $arrayUserProprietario[0];
        
        $array = $buscar -> getHashId($conn,$hashId);
        $titulo = $array[3];
        $id = $array[5];

//        if ($array[6]=='unico') {

            $detalhe = $buscar->getPedidosTemporariosUnico($conn,$id);
            $data = $detalhe[0];
            $entrada = $detalhe[1];
            $saida = $detalhe[2];

            $data = date('d/m/Y', strtotime($data));
            $entrada = substr_replace($entrada,':',-2,-2);
            $saida = substr_replace($saida,':',-2,-2);

            $corpo = '<html><body>';
            $corpo .= "Olá $name, boa tarde <br>";
            $corpo .= "Seu anuncio foi alugado <br> Pedido: $idOrder  <br >";
            $corpo .= "Anuncio $titulo <br>";
            $corpo .= "Data: $data <br> Entrada: $entrada <br> Saida: $saida";
            $corpo .= "</body></html>";

            $emailCustomer = 'contatoyourdev@gmail.com';
            print $corpo.'<br></br>';

            $email->enviar($emailCustomer,'Pagamento aprovado',$corpo);
   //     }
    }   


// Enviar Pagamento Locou












    if ($tipoEvento == 'PAYMENT.AUTHORIZED') {
        
        $resource = $obj->{'resource'};
        $payment = $resource->{'payment'};
        $links = $payment->{'_links'};
        $order = $links->{'order'};
        $idOrder = $order->{'title'};


        $buscar = new BuscarEspacos();
        $array = $buscar->getPedidosDBPorOrder($conn,$idOrder);
        $hashId = $array[0];
        $array = $buscar -> getHashId($conn,$hashId);
        $titulo = $array[3];
        $id = $array[5];


 //       if ($array[6]=='unico') {

            
            
            $detalhe = $buscar->getPedidosTemporariosUnico($conn,$id);
            $data = $detalhe[0];
            $entrada = $detalhe[1];
            $saida = $detalhe[2];

            $data = date('d/m/Y', strtotime($data));
            $entrada = substr_replace($entrada,':',-2,-2);
            $saida = substr_replace($saida,':',-2,-2);

            $corpo = '<html><body>';
            $corpo .= 'Olá Locou, tudo bem? <br> Ocorreu mais um pagamento de pedido na plataforma <br>';
            $corpo .= "Anuncio $titulo <br>";
            $corpo .= "Data: $data <br> Entrada: $entrada <br> Saida: $saida";
            $corpo .= "</body></html>";

            print $corpo.'<br></br>';

            $email->enviarEmailClaudia('Pagamento de um pedido',$corpo);

 //       }

    }

 //   $tipoEvento = 'ORDER.CREATED';

// enviar pedido Locouz
//print 

    if ($tipoEvento == 'ORDER.CREATED') {

       

         $resource = $obj->{'resource'};
        $order = $resource->{'order'};
        $idOrder= $order->{'id'};
        $idOrder = 'ORD-X2EG22TD8H5I';

        
        $buscar = new BuscarEspacos();
        $array = $buscar->getPedidosDBPorOrder($conn,$idOrder);
        $hashId = $array[0];
      
        $array = $buscar -> getHashId($conn,$hashId);
        $titulo = $array[3];
        $id = $array[5];

//        if ($array[6]=='unico') {
            
            $detalhe = $buscar->getPedidosTemporariosUnico($conn,$id);
            $data = $detalhe[0];
            $entrada = $detalhe[1];
            $saida = $detalhe[2];
            $corpo = '<html><body>';
            $corpo .= 'Olá Locou, tudo bem? <br> Mais um pedido foi efetuado na plataforma <br>';
            $corpo .= "Anuncio $titulo <br>";
            $corpo .= "Data: $data <br> Entrada: $entrada <br> Saida: $saida";
            $corpo .= "</body></html>";

            print $corpo.'<br></br>';
            
            $email->enviarEmailClaudia('Pedido de aluguel criado',$corpo);

//        }
        

    }

    http_response_code(200);
    http_response_code();


?>