<?php
    error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    
    require_once 'FunctionsSession.php';
    require_once 'FunctionsDB.php';
    require_once 'BuscarEspacos.php';
    require_once 'functions.php';
    // Temos que pegar dia de hoje, dimuir um dia e se for igual ao ultimo dia do aluguel 


    // Fazer o saque automatico da conta MOIP para a conta bancária cadastrada do proprietário
    
    // Temos que criar uma tabela para savar os pedidos que foram pagos, com seu primeiro dia de aluguel e sua ultimo dia de aluguel para assim saber qual o Dia D e fazer o cálculo acima
    
    $db = new FunctionsDB();
    $conn = $db->conectDB();


    $busca = new BuscarEspacos();


    $data = date('Ymd', strtotime('-1 days'));

    $array = $busca->getPedidosPagosDayD($conn,$data);
    
    if($array != false || $array != null){

        for($id=0;$id<=count($array);$id++){

            $idOrder  = $array[$id];

            $arrayPedidos = $busca->getPedidosDBPorOrder($conn,$idOrder);
            $idAnuncio = $arrayPedidos[1];
            $idProprietario = $db->getInfoUserProprietario($conn,$idAnuncio);
            $arrayUserProprietario = $db->getUsuarioProprietarioCompleto($conn,$idProprietario);

            $idMoipAccount = $arrayUserProprietario[0];
            $idBankAccount = $arrayUserProprietario[1];
            $token = $arrayUserProprietario[2];
            $functions = new Functions();
            
            $saldo = $functions->consultarSaldo($token);

            print $functions->criarTranferenciaMoipTransparentToBank($token,$idBankAccount,$saldo);

        }

    }else{
        print 'false';
        exit();
    }

    $db->closeDB($conn);


    



?>

