<?php

require_once 'BuscarEspacos.php';
require_once 'FunctionsDB.php';
require_once 'Pedidos.php';
require_once 'EnviarEmail.php';



$hashId = $_GET['id'];

if ($id == null || $id == '') {
    echo "ID igual a NULL";
    exit();
}

$busca = new BuscarEspacos();
$db = new FunctionsDB();
$conn = $db->conectDB();
$buscaPedidoTemporario = $busca->getHashId($conn,$hashId);
if ($buscaPedidoTemporario == false) {
    print "Pedido inexistente ou espirado";
}else{

    $idAnuncio =  $buscaPedidoTemporario['idAnuncio'];
    $idUsuario = $buscaPedidoTemporario['idCliente'];

    $pedidos = new Pedidos();


    $id = $db->getUltimoIDs($conn,'Pedidos');
    $id = $id+1;

    $idMoipCliente = $db->getIdClientMoip($conn,$idUsuario);

    $idMoipProprietario = $buscaPedidoTemporario['idMoipProprietario'];

    $titulo = $buscaPedidoTemporario['titulo'];
    $preco = $buscaPedidoTemporario['preco'];

    $hashId = md5($id);
    $idOrder = $pedidos->criarPedidoComClientMOIP($id,$idMoipCliente,$idMoipProprietario,$array[4],$preco);
    $db->salvarPedido($conn,$hashId,$idAnuncio,$idUsuario,$idOrder);

    $enviarEmail = new EnviarEmail();
    $enviarEmail->enviarEmailPagamento($emailCliente,$nomeCliente,$titulo,$hashId);
    

    //falta finalizar o email de envio de pagamento, não temos os dados emailCliente e nomeCliente e testar esse emvio caso seja aprovado

    

    // Criar Pedido e salvar em Pedido
    // Enviar link para o usuário com a tela de pagamento
    
    // Vamos excluir o pedido temporário e criar uma linha em Pedido, com idAnuncio, idUsuarioInquilino, idOrder (este gerado DA CRIAÇÃO DE ORDER DO MOIP)
    
    // Esses dados vamos enviar para pagamento, através do id da linha na tabela, critografado em MD5 

}




?>