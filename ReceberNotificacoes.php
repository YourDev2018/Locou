
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

    $sql = "INSERT INTO OutrosEstados(nome, cidade, estado, email, celular, tipo, outraInformacao) VALUES ('$json','$obj','','','','','$tipoEvento')";
    if ($conn->query($sql)===true) {
        
    }else{
        $db->closeDB($conn);
    }
    
    http_response_code(200);
    http_response_code();

    /*
    // 1° - Primeiro tratamento / envio de email
       
    // Quando seu pagamento esta sendo analisado
        // Quando pedido foi aprovado / Ou não foi aprovado

    // 2° - Segundo tratamento / envio de email
        //

    if ($tipoEvento == 'PAYMENT.WAITING') {
        // Quando seu pagamento esta sendo analisado
        $resource = $obj->{'resource'};
        $payment = $resource->{'payment'};
        $links = $payment->{'_links'};
        $order = $links->{'order'};
        $idOrder = $order->{'title'};
         
        $jsonIdOrder = $pedidos->consultarPedido($idOrder);
        $custumer = $jsonIdOrder->{'customer'};
        $name = $custumer->{'fullName'};
        $emailCustomer = $custumer->{'items'};

        $items = $jsonIdOrder->{'items'};
        $item = $items ->{'0'};
        $detail = $item->{'detail'};
        
        $corpo .= "Olá $name, boa tarde <br>";
        $corpo .= "Estamos esperando a confirmação do pagamento. <br> Pedido: $detail  <br >";

        $emailCustomer = 'morg.guilherme@gmail.com';

        $email->enviar($emailCustomer,'Pedido em análise',$corpo);

    }

// Usuário cliente notificado
    if ($tipoEvento == 'PAYMENT.AUTHORIZED') {
        
        $resource = $obj->{'resource'};
        $payment = $resource->{'payment'};
        $links = $payment->{'_links'};
        $order = $links->{'order'};
        $idOrder = $order->{'title'};

        $jsonIdOrder = $pedidos->consultarPedido($idOrder);
        $custumer = $jsonIdOrder->{'customer'};
        $name = $custumer->{'fullName'};
        $emailCustomer = $custumer->{'items'};

        $items = $jsonIdOrder->{'items'};
        $item = $items ->{'0'};
        $detail = $item->{'detail'};

        $corpo .= "Olá $name, boa tarde <br>";
        $corpo .= "Seu pagamento foi aprovado. <br> Pedido: $detail  <br >";

        $emailCustomer = 'morg.guilherme@gmail.com';

        $email->enviar($emailCustomer,'Pagamento aprovado',$corpo);

    }

// usuário proprietário notificado    
    if ($tipoEvento == 'PAYMENT.AUTHORIZED') {
        
        $resource = $obj->{'resource'};
        $payment = $resource->{'payment'};
        $links = $payment->{'_links'};
        $order = $links->{'order'};
        $idOrder = $order->{'title'};
        
        $buscar = new BuscarEspacos();
        $array = $buscar->getPedidosDBPorOrder($conn,$idOrder);

        $idAnuncio = $array[1];
        $arrayUserProprietario = $db->getInfoUserProprietario($conn,$idAnuncio);
        $emailCustomer = $arrayUserProprietario[2];
        $name = $arrayUserProprietario[0];

        $array = $buscar->getPedidosDBPorOrder($conn,$idOrder);
        $hashId = $array[0];
        $array = $buscar -> getHashId($db,$hashId);
        $titulo = $array[3];

        $corpo = '<html><body>';
        $corpo .= "Olá $name, boa tarde <br>";
        $corpo .= "Seu anuncio foi alugado <br> Pedido: $idOrder  <br >";
        $corpo .= "Anuncio $titulo <br>";
        $corpo .= "Data: $data <br> Entrada: $Entrada <br> Saida: $saida";
        $corpo .= "</body></html>";

        $emailCustomer = 'morg.guilherme@gmail.com';

        $email->enviar($emailCustomer,'Pagamento aprovado',$corpo);

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
        $array = $buscar -> getHashId($db,$hashId);
        $titulo = $array[3];
        $id = $array[5];
        if ($array[6]=='unico') {
            
            $detalhe = $buscar->getPedidosTemporariosUnico($conn,$id);
            $data = $detalhe[0];
            $entrada = $detalhe[1];
            $saida = $detalhe[2];
            $corpo = '<html><body>';
            $corpo .= 'Olá Locou, tudo bem? <br> Ocorreu mais um pagamento de pedido na plataforma <br>';
            $corpo .= 'Anuncio $titulo <br>';
            $corpo .= "Data: $data <br> Entrada: $Entrada <br> Saida: $saida";
            $corpo .= "</body></html>";

            $email->enviarEmailClaudia('Pagamento de um pedido',$corpo);

        }

    }

// enviar pedido Locou
    if ($tipoEvento = 'ORDER.CREATED') {

        $resource = $obj->{'resource'};
        $payment = $resource->{'payment'};
        $links = $payment->{'_links'};
        $order = $links->{'order'};
        $idOrder = $order->{'title'};
        
        $buscar = new BuscarEspacos();
        $array = $buscar->getPedidosDBPorOrder($conn,$idOrder);
        $hashId = $array[0];
        $array = $buscar -> getHashId($db,$hashId);
        $titulo = $array[3];
        $id = $array[5];
        if ($array[6]=='unico') {
            
            $detalhe = $buscar->getPedidosTemporariosUnico($conn,$id);
            $data = $detalhe[0];
            $entrada = $detalhe[1];
            $saida = $detalhe[2];
            $corpo = '<html><body>';
            $corpo .= 'Olá Locou, tudo bem? <br> Mais um pedido foi efetuado na plataforma <br>';
            $corpo .= "Anuncio $titulo <br>";
            $corpo .= "Data: $data <br> Entrada: $Entrada <br> Saida: $saida";
            $corpo .= "</body></html>";

            $email->enviarEmailClaudia('Pedido de aluguel criado',$corpo);

        }


        

    }


 
*/

   



?>