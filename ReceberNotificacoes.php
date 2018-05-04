
<?php
    error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    require_once 'EnviarEmail.php';
    require_once 'FunctionsDB.php';
    require_once 'Pedidos.php';

    $json = file_get_contents('php://input');

    $obj = json_decode($json);
    $tipoEvento = $obj->{'event'};
    
    $db = new FunctionsDB();
    $conn = $db->conectDB();
    $email = new EnviarEmail();
   
    $pedidos = new Pedidos();

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

        $email->enviar($emailCustomer,'Pedido em análise',$corpo);

    }

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
        $corpo .= "Seu pagamento foi aprvado. <br> Pedido: $detail  <br >";

        $email->enviar($emailCustomer,'Pagamento aprovado',$corpo);

    }

    http_response_code(200);
    http_response_code();


   



?>