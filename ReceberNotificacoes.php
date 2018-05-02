
<?php

    require_once 'EnviarEmail.php';
    require_once 'FunctionsDB.php';

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
 
   
    
    print 'teste';

     /*
    $json2  = $_POST['ORDER.CREATED'];
    $obj2 = json_decode($json2, true);
    $tipoEventoDois = $obj2->{'event'};
    
    $json3 = $_POST['PAYMENT.WAITING'];
    $obj3 = json_decode($json2, true);
    $tipoEventoTres = $obj2->{'event'};

   
    if ($tipoEvento != null || $tipoEvento != '') {
        
        $enviarEmail = new EnviarEmail();
        $enviarEmail->enviar('morg.guilherme@gmail.com','Teste WeebHook',"Tipo do evento do weebhook é: $tipoEvento");

    }

    if ($tipoEventoDois != null || $tipoEventoDois != '') {
        
        $enviarEmail = new EnviarEmail();
        $enviarEmail->enviar('morg.guilherme@gmail.com','Teste WeebHook',"Tipo do evento do weebhook é: $tipoEventoDois");

    }
    
     if ($tipoEventoTres != null || $tipoEventoTres != '') {
        
        $enviarEmail = new EnviarEmail();
        $enviarEmail->enviar('morg.guilherme@gmail.com','Teste WeebHook',"Tipo do evento do weebhook é: $tipoEventoTres");

    }
    */

?>