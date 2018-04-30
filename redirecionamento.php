<?php

require_once 'BuscarEspacos.php';
require_once 'FunctionsDB.php';
require_once 'Pedidos.php';
require_once 'EnviarEmail.php';



$hashId = $_GET['id'];
$hashId; //conferido


if ($hashId == null || $hashId == '') {
    echo "ID igual a NULL";
    header('location:index.php');
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


    $id = $db->getUltimoIDs($conn,'Pedidos');
    $id = $id+1; // CONFERIDO

    $idMoipCliente = $db->getIdClientMoip($conn,$idUsuario); // conferido

    $idMoipProprietario = $buscaPedidoTemporario[2]; // conferido

    $titulo = $buscaPedidoTemporario[3]; // conferido
    $preco = $buscaPedidoTemporario[4]; // conferido

    $hashId = md5($id);
    
    print " idOrder ".$idOrder = $pedidos->criarPedidoComClientMOIP($id,$idMoipCliente,$idMoipProprietario,$titulo,$preco);

    print " salvar pedido: ".$db->salvarPedido($conn,$idAnuncio,$hashId,$idUsuario,$idOrder);

    $arrayUsuario = $db->getUsuarioBasico($conn,$idUsuario);

    $emailCliente = $arrayUsuario[2];
    $nomeCliente = $arrayUsuario[0];

    $enviarEmail = new EnviarEmail();
    $enviarEmail->enviarEmailPagamento($emailCliente,$nomeCliente,$titulo,$hashId); 
       
    // falta finalizar o email de envio de pagamento, não temos os dados emailCliente e nomeCliente e testar esse emvio caso seja aprovado

    // Criar Pedido e salvar em Pedido
    // Enviar link para o usuário com a tela de pagamento
    
    // Vamos excluir o pedido temporário e criar uma linha em Pedido, com idAnuncio, idUsuarioInquilino, idOrder (este gerado DA CRIAÇÃO DE ORDER DO MOIP)
    
    // Esses dados vamos enviar para pagamento, através do id da linha na tabela, critografado em MD5 }
}

?>