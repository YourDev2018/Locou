<?php

require_once 'BuscarEspacos.php';
require_once 'FunctionsDB.php';
require_once 'Pedidos.php';
require_once 'EnviarEmail.php';



$hashId = $_GET['id'];

if ($hashId == null || $hashId == '') {
    echo "ID igual a NULL";
    header('location:index.php');
    exit();
}


$busca = new BuscarEspacos();
$db = new FunctionsDB();
$conn = $db->conectDB();

$buscaPedidoTemporario = $busca->getHashId($conn,$hashId);

if ($buscaPedidoTemporario == false) {
    print "Pedido inexistente ou espirado";
}else{

    $idAnuncio =  $buscaPedidoTemporario[0];
    $idUsuario = $buscaPedidoTemporario[1];

    $pedidos = new Pedidos();

    $idPedido = $db->getUltimoIDs($conn,'Pedidos');
    $idPedido = $idPedido+1; // CONFERIDO

    $idMoipCliente = $db->getIdClientMoip($conn,$idUsuario); // conferido

    $idMoipProprietario = $buscaPedidoTemporario[2]; // conferido

    $titulo = $buscaPedidoTemporario[3]; // conferido
    $preco = $buscaPedidoTemporario[4]; // conferido

 
    $idOrder = $pedidos->criarPedidoComClientMOIP($idPedido,$idMoipCliente,$idMoipProprietario,$titulo,$preco);

    $db->salvarPedido($conn,$idAnuncio,$hashId,$idUsuario,$idOrder);

    $arrayUsuario = $db->getUsuarioBasico($conn,$idUsuario);

    $emailCliente = $arrayUsuario[2];
    $nomeCliente = $arrayUsuario[0];
    
    $enviarEmail = new EnviarEmail();
    $enviarEmail->enviarEmailPagamento($emailCliente,$nomeCliente,$titulo,$hashId); 
    
    // mostrar a tela visual, ou como vai ocorrer quando chegar em redirecionamento
    // Enviar email para a cláudia 
    
    

}

?>