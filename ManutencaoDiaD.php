<?php
    error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    
    require_once 'FunctionsSession.php';
    require_once 'FunctionsDB.php';
    require_once 'BuscarEspacos.php';
    // Temos que pegar dia de hoje, dimuir um dia e se for igual ao ultimo dia do aluguel 
    // Fazer o saque automatico da conta MOIP para a conta bancária cadastrada do proprietário
    
    // Temos que criar uma tabela para savar os pedidos que foram pagos, com seu primeiro dia de aluguel e sua ultimo dia de aluguel para assim saber qual o Dia D e fazer o cálculo acima
    
    $data = date('d-m-Y');
    



?>

