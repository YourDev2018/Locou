<!DOCTYPE html>

<?php error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once 'FunctionsDB.php';
require_once 'Pedidos.php';
require_once 'functions.php';
require_once 'BuscarEspacos.php';
require_once 'FunctionsSession.php';?>

<?php

$nome = "Morg";

$prefixo = "http://www.yourdev.com.br/clientes/locou/img/anuncio/";

$idAnuncio = $_POST['idAnuncio'];
$session = new FunctionsSession();
$session -> iniciarSession();

$idGetHash = $_GET['id'];


if ($idAnuncio == null || $idAnuncio == '') {
  if ($idGetHash != null || $idGetHash != '') {

    // resgatar dados de anuncio autorizado
    $db = new FunctionsDB();

    $conn = $db->conectDB();
    $pedido = new Pedidos();

    $busca = new BuscarEspacos();
    $array = $busca->getPedidosDB($conn,$idGetHash); // verificado

    $idUsuario = $array[2]; // verificado
    $idPedido = $array[3];
    $idClientMoip = $db->getIdClientMoip($conn,$idUsuario); // verificado

    $func = new functions();
    $resposta = $func->getClienteMoip($idClientMoip);
    $obj = json_decode($resposta);
    $nomeCompleto = $obj->{'fullname'};

    $nascimento = $obj->{'birthDate'};
    $data = explode('-',$nascimento);
    $dia = $data[2];
    $mes = $data[1];
    $ano = $data[0];

    $phone = $obj->{'phone'};
    $ddd = $phone->{'areaCode'};
    $number = $phone->{'number'};

    $taxDocument = $obj->{'taxDocument'};
    $cpf = $taxDocument->{'number'};

    $address = $obj->{'shippingAddress'};
    $rua = $address->{'street'};
    $cep = $address->{'zipCode'};
    $ruaNumber = $address->{'streetNumber'};
    $complemento = $address->{'complement'};
    $cidade = $address->{'city'};
    $bairro = $address->{'district'};
    $estado = $address->{'state'};
    $pais = $address->{'country'};

  }else{
    header('location: index.php');
  }
}

$db = new FunctionsDB();

$conn = $db->conectDB();
$pedido = new Pedidos();



//  $getAutorizado = $db->getAnuncioInstantaneo($conn,$idAnuncio);
$getAutorizado = '';
// essa variável, é, setada

if($_POST['tipoAluguel']=='unico'){

  $dataUnico = str_replace('/','-',$_POST['data-unico-pick']);
  $date = new DateTime($dataUnico);
  $dataUnico = $date->format('Y-m-d ');
  $dataUnico = str_replace('-','',$dataUnico);

  $horaInicioUnico = floatval( str_replace (':','.',$_POST['hora-inicio-unico']));
  $horaFimUnico =  " ".floatval( str_replace (':','.',$_POST['hora-fim-unico']));

  $inteiro = floor($horaInicioUnico);
  $decimal = $horaInicioUnico - $inteiro;

  if (version_compare($decimal,'0.3') == 0) {
    $horaInicioUnico = ($horaInicioUnico - 0.3)+0.5;
  }

  $inteiro = floor($horaFimUnico);
  $decimal = $horaFimUnico - $inteiro;

  if (version_compare($decimal,'0.3') == 0) {
    $horaFimUnico = ($horaFimUnico - 0.3)+0.5;
  }

  $calculoHora =  $horaFimUnico - $horaInicioUnico;
  $arrayDados['data'] = $_POST['data-unico-pick'];
  $arrayDados['inicioUnico'] = $_POST['hora-inicio-unico'];
  $arrayDados['fimUnico'] = $_POST['hora-fim-unico'];

  if($calculoHora / 4 < 1){
    //retornar preço de hora comum
    $preco = $db->retornarPreco($conn,$idAnuncio);
    $resultado = $preco *$calculoHora;

    $idPedido = $pedido->criarPedido($conn,$_SESSION['id'],$idAnuncio,$_POST['tipoAluguel'], $resultado,$arrayDados,$getAutorizado);
    /*
    $explode = explode('/',$idPedido);
    $resposta = $explode[0];

    $obj = json_decode($resposta);
    $nomeCompleto = $obj->{'fullname'};

    $nascimento = $obj->{'birthDate'};
    $data = explode('-',$nascimento);
    $dia = $data[2];
    $mes = $data[1];
    $ano = $data[0];

    $phone = $obj->{'phone'};
    $ddd = $phone->{'areaCode'};
    $number = $phone->{'number'};

    $taxDocument = $obj->{'taxDocument'};
    $cpf = $taxDocument->{'number'};

    $address = $obj->{'shippingAddress'};
    $rua = $address->{'street'};
    $cep = $address->{'zipCode'};
    $ruaNumber = $address->{'streetNumber'};
    $complemento = $address->{'complement'};
    $cidade = $address->{'city'};
    $bairro = $address->{'district'};
    $estado = $address->{'state'};
    $pais = $address->{'country'};

    */

  }else{
    if($calculoHora / 4 == 1){
      // retornar preço na descrição geral de 4 horas
      $preco = $db-> retornarPrecoHoraGeral($conn,$idAnuncio,'quatroHora');
      $resultado = $preco * $calculoHora;

      $idPedido = $pedido->criarPedido($conn,$_SESSION['id'],$idAnuncio,$_POST['tipoAluguel'], $resultado,$arrayDados,$getAutorizado);

      /*

      $explode = explode('/',$idPedido);
      $resposta = $explode[0];

      $obj = json_decode($resposta);
      $nomeCompleto = $obj->{'fullname'};

      $nascimento = $obj->{'birthDate'};
      $data = explode('-',$nascimento);
      $dia = $data[2];
      $mes = $data[1];
      $ano = $data[0];

      $phone = $obj->{'phone'};
      $ddd = $phone->{'areaCode'};
      $number = $phone->{'number'};

      $taxDocument = $obj->{'taxDocument'};
      $cpf = $taxDocument->{'number'};

      $address = $obj->{'shippingAddress'};
      $rua = $address->{'street'};
      $cep = $address->{'zipCode'};
      $ruaNumber = $address->{'streetNumber'};
      $complemento = $address->{'complement'};
      $cidade = $address->{'city'};
      $bairro = $address->{'district'};
      $estado = $address->{'state'};
      $pais = $address->{'country'};

      */


    }else{
      if($calculoHora / 5 >= 1){

        //retornar 5 hora;
        $preco = $db-> retornarPrecoHoraGeral($conn,$idAnuncio,'cincoHora');
        $resultado = $preco *$calculoHora;

        // criando pedido e retornando dados do usuário
        $idPedido = $pedido->criarPedido($conn,$_SESSION['id'],$idAnuncio,$_POST['tipoAluguel'], $resultado,$arrayDados,$getAutorizado);

        /*

        $explode = explode('/',$idPedido);
        $resposta = $explode[0];

        $obj = json_decode($resposta);
        $nomeCompleto = $obj->{'fullname'};

        $nascimento = $obj->{'birthDate'};
        $data = explode('-',$nascimento);
        $dia = $data[2];
        $mes = $data[1];
        $ano = $data[0];

        $phone = $obj->{'phone'};
        $ddd = $phone->{'areaCode'};
        $number = $phone->{'number'};

        $taxDocument = $obj->{'taxDocument'};
        $cpf = $taxDocument->{'number'};

        $address = $obj->{'shippingAddress'};
        $rua = $address->{'street'};
        $cep = $address->{'zipCode'};
        $ruaNumber = $address->{'streetNumber'};
        $complemento = $address->{'complement'};
        $cidade = $address->{'city'};
        $bairro = $address->{'district'};
        $estado = $address->{'state'};
        $pais = $address->{'country'};

        */

      }
    }
  }

}

if($_POST['tipoAluguel']=='direto'){


  $dataInicioDireto = $_POST['data-direto-pick'].' ';

  $dataUnico = str_replace('/','-',$dataInicioDireto);
  $date = new DateTime($dataUnico);

  $semanasDireto = $_POST['semanas-unico-direto'];
  $dias = $semanasDireto * 7;

  $date->add(new DateInterval('P'.$dias.'D'));
  $dataFinalDireto = $date->format('Ymd');

  if ($semanasDireto < 4) {
    $preco = $db-> retornarPrecoHoraGeral($conn,$idAnuncio,'semana');
    $preco = $preco * $semanasDireto;

    $arrayDados['data'] = $dataInicioDireto;
    $arrayDados['inicioUnico'] = $dataFinalDireto;
    $arrayDados['fimUnico'] = $semanasDireto;

    print $idPedido = $pedido->criarPedido($conn,$_SESSION['id'],$idAnuncio,$_POST['tipoAluguel'], $preco,$arrayDados,$getAutorizado);


  }else{
    if ($semanasDireto % 4 == 0) {

      $numMes = $semanasDireto / 4 ;
      $preco = $db-> retornarPrecoHoraGeral($conn,$idAnuncio,'mes');
      $preco = $preco * $numMes;

    $arrayDados['data'] = $dataInicioDireto;
    $arrayDados['inicioUnico'] = $dataFinalDireto;
    $arrayDados['fimUnico'] = $semanasDireto;

      print $idPedido = $pedido->criarPedido($conn,$_SESSION['id'],$idAnuncio,$_POST['tipoAluguel'], $preco,$arrayDados,$getAutorizado);

    }else{

      $precoMes = $db-> retornarPrecoHoraGeral($conn,$idAnuncio,'mes');
      $precoSemana =  $db-> retornarPrecoHoraGeral($conn,$idAnuncio,'semana');

      $numMes = (int) $semanasDireto / 4 ;
      $numSemanas = $semanasDireto % 4;

      $preco = ($numMes * $precoMes)+($numSemanas * $precoSemana);

    $arrayDados['data'] = $dataInicioDireto;
    $arrayDados['inicioUnico'] = $dataFinalDireto;
    $arrayDados['fimUnico'] = $semanasDireto;

      print $idPedido = $pedido->criarPedido($conn,$_SESSION['id'],$idAnuncio,$_POST['tipoAluguel'], $preco,$arrayDados,$getAutorizado);


    }
  }







}
// falta fazer a multiplicação das semanas em reincidente

if($_POST['tipoAluguel']=='reincidente'){

  $semanasDireto = $_POST['semanas-unico'];
  $dataInicioReincidente = $_POST['data-reincidente-pick'];
  $dataInicioReincidente = str_replace('/','-',$dataInicioReincidente);
  // $periodo  = $_POST['periodo-sel'];

  // $arrayX1= [];
  // $arrayX2 = [];
  // $arrayX3 = [];
  $arrayPeriodos = [];

  $idPedidosTemporarios = $db->cadastrarPedidosTemporarios($conn,'','','',0,'',0);

  $segSel = $_POST['seg-periodo-sel'];
  if($segSel=='sim'){

    $segInicioPeriodo= verificarDecimal( str_replace(':','',$_POST['seg-inicio-periodo']));
    $segFimPeriodo =  verificarDecimal( str_replace(':','',  $_POST['seg-fim-periodo']));

    $periodoSeg = ($segFimPeriodo - $segInicioPeriodo)/100;
    $arrayPeriodos[1] = $periodoSeg;

    $nextDay = date('Ymd', strtotime("next Monday",strtotime($dataInicioReincidente)));

    //data inicio reincidente inteiro
    $aux = str_replace('/','',$dataInicioReincidente);
    $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$aux,$segInicioPeriodo,$segFimPeriodo);


    if ($semanasDireto >= 1) {
      //     $arrayX1[1] =  $nextDay ;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$nextDay,$segInicioPeriodo,$segFimPeriodo);

    }

    if ($semanasDireto >= 2) {

      $data = (string)$nextMonday;
      $date = new DateTime($data);
      $dias = 7;
      $date->add(new DateInterval('P'.$dias.'D'));
      $data = $date->format('Ymd');
      //  $arrayX2[1] = $data;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$data,$segInicioPeriodo,$segFimPeriodo);

    }

    if ($semanasDireto == 3) {

      $data = (string)$nextMonday;
      $date = new DateTime($data);
      $dias = 14;
      $date->add(new DateInterval('P'.$dias.'D'));
      $data = $date->format('Ymd');
      //  $arrayX3[1] = $data;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$data,$segInicioPeriodo,$segFimPeriodo);

    }

  }

  $terSel = $_POST['ter-periodo-sel'];
  if($terSel == 'sim'){

    $terInicioPeriodo = str_replace(':','',$_POST['ter-inicio-periodo']);
    $terFimPeriodo = str_replace(':','',$_POST['ter-fim-periodo']);

    $terInicioPeriodo = verificarDecimal($terInicioPeriodo);
    $terFimPeriodo = verificarDecimal($terFimPeriodo);

    $periodoTer = ($terFimPeriodo - $terInicioPeriodo) /100;
    $arrayPeriodos[2]= $periodoTer;

    $nextDay= date('Ymd', strtotime("next Tuesday",strtotime($dataInicioReincidente)));

    if ($semanasDireto == 1) {
      //    $arrayX1[2] =  $nextDay;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$nextDay,$terInicioPeriodo,$terFimPeriodo);

    }

    if ($semanasDireto == 2) {

      $data = (string)$nextDay;
      $date = new DateTime($data);
      $dias = 7;
      $date->add(new DateInterval('P'.$dias.'D'));
      $data = $date->format('Ymd');
      //    $arrayX2[2] = $data;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$data,$terInicioPeriodo,$terFimPeriodo);

    }

    if ($semanasDireto == 3) {

      $data = (string)$nextDay;
      $date = new DateTime($data);
      $dias = 14;
      $date->add(new DateInterval('P'.$dias.'D'));
      $data = $date->format('Ymd');
      //   $arrayX3[2] = $data;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$data,$terInicioPeriodo,$terFimPeriodo);

    }



  }

  $quaSel = $_POST['qua-periodo-sel'];
  if ($quaSel=='sim') {

    $quaInicioPeriodo= verificarDecimal( str_replace(':','',$_POST['qua-inicio-periodo']));
    $quaFimPeriodo =  verificarDecimal( str_replace(':','',  $_POST['qua-fim-periodo']));

    $periodoQua = ($quaFimPeriodo - $quaInicioPeriodo)/100;
    $arrayPeriodos[3] = $periodoQua;

    $nextDay= date('Ymd', strtotime("next Wednesday",strtotime($dataInicioReincidente)));

    if ($semanasDireto == 1) {
      //   $arrayX1[3] =  $nextDay;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$nextDay,$quaInicioPeriodo,$quaFimPeriodo);


    }

    if ($semanasDireto == 2) {

      $data = (string)$nextDay;
      $date = new DateTime($data);
      $dias = 7;
      $date->add(new DateInterval('P'.$dias.'D'));
      $data = $date->format('Ymd');
      //   $arrayX2[3] = $data;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$data,$quaInicioPeriodo,$quaFimPeriodo);


    }

    if ($semanasDireto == 3) {

      $data = (string)$nextDay;
      $date = new DateTime($data);
      $dias = 14;
      $date->add(new DateInterval('P'.$dias.'D'));
      $data = $date->format('Ymd');
      //     $arrayX3[3] = $data;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$data,$quaInicioPeriodo,$quaFimPeriodo);

    }

  }

  $quiSel = $_POST['qui-periodo-sel'];
  if ($quiSel=='sim') {

    $quiInicioPeriodo=  str_replace(':','',$_POST['qui-inicio-periodo']);
    $quiFimPeriodo  =   str_replace(':','', $_POST['qui-fim-periodo']);

    $quiInicioPeriodo = verificarDecimal($quiInicioPeriodo);
    $quiFimPeriodo = verificarDecimal($quiFimPeriodo);

    $periodoQui = ($quiFimPeriodo - $quiInicioPeriodo)/100;
    $arrayPeriodos[4] = $periodoQui;

    $nextDay= date('Ymd', strtotime("next Thursday",strtotime($dataInicioReincidente)));

    if ($semanasDireto == 1) {
      //   $arrayX1[4] =  $nextDay;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$nextDay,$quiInicioPeriodo,$quiFimPeriodo);


    }

    if ($semanasDireto == 2) {

      $data = (string)$nextDay;
      $date = new DateTime($data);
      $dias = 7;
      $date->add(new DateInterval('P'.$dias.'D'));
      $data = $date->format('Ymd');
      //    $arrayX2[4] = $data;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$data,$quiInicioPeriodo,$quiFimPeriodo);


    }

    if ($semanasDireto == 3) {

      $data = (string)$nextDay;
      $date = new DateTime($data);
      $dias = 14;
      $date->add(new DateInterval('P'.$dias.'D'));
      $data = $date->format('Ymd');
      //   $arrayX3[4] = $data;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$data,$quiInicioPeriodo,$quiFimPeriodo);


    }

  }

  $sexSel = $_POST['sex-periodo-sel'];
  if ($sexSel=='sim') {

    $sexInicioPeriodo=  str_replace(':','',$_POST['sex-inicio-periodo']);
    $sexFimPeriodo  =    str_replace(':','', $_POST['sex-fim-periodo']);

    $segInicioPeriodo = verificarDecimal($segInicioPeriodo);
    $segFimPeriodo = verificarDecimal($segFimPeriodo);

    $periodoSex = ($segFimPeriodo - $segInicioPeriodo)/100;
    $arrayPeriodos[5]=$periodoSex;


    $nextDay= date('Ymd', strtotime("next Friday",strtotime($dataInicioReincidente)));

    if ($semanasDireto == 1) {
      //    $arrayX1[5] =  $nextDay;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$nextDay,$sexInicioPeriodo,$sexFimPeriodo);


    }

    if ($semanasDireto == 2) {

      $data = (string)$nextDay;
      $date = new DateTime($data);
      $dias = 7;
      $date->add(new DateInterval('P'.$dias.'D'));
      $data = $date->format('Ymd');
      //    $arrayX2[5] = $data;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$data,$sexInicioPeriodo,$sexFimPeriodo);


    }

    if ($semanasDireto == 3) {

      $data = (string)$nextDay;
      $date = new DateTime($data);
      $dias = 14;
      $date->add(new DateInterval('P'.$dias.'D'));
      $data = $date->format('Ymd');
      //     $arrayX3[5] = $data;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$data,$sexInicioPeriodo,$sexFimPeriodo);

    }

  }

  $sabSel = $_POST['sab-periodo-sel'];
  if ($sabSel =='sim') {

    $sabInicioPeriodo= verificarDecimal( str_replace(':','',$_POST['sab-inicio-periodo']));
    $sabFimPeriodo  =  verificarDecimal( str_replace(':','',  $_POST['sab-fim-periodo']));

    $periodoSab = ($sabFimPeriodo - $sabInicioPeriodo)/100;
    $arrayPeriodos[6]=$periodoSab;

    $nextDay= date('Ymd', strtotime("next Saturday",strtotime($dataInicioReincidente)));

    if ($semanasDireto == 1) {
      //    $arrayX1[6] =  $nextDay;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$nextDay,$sabInicioPeriodo,$sabFimPeriodo);


    }

    if ($semanasDireto == 2) {

      $data = (string)$nextDay;
      $date = new DateTime($data);
      $dias = 7;
      $date->add(new DateInterval('P'.$dias.'D'));
      $data = $date->format('Ymd');
      //  $arrayX2[6] = $data;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$data,$sabInicioPeriodo,$sabFimPeriodo);


    }

    if ($semanasDireto == 3) {

      $data = (string)$nextDay;
      $date = new DateTime($data);
      $dias = 14;
      $date->add(new DateInterval('P'.$dias.'D'));
      $data = $date->format('Ymd');
      //    $arrayX3[6] = $data;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$data,$sabInicioPeriodo,$sabFimPeriodo);

    }


  }

  $domSel = $_POST['dom-periodo-sel'];
  if ($domSel=='sim') {

    $domInicioPeriodo= verificarDecimal( str_replace(':','',$_POST['dom-inicio-periodo']));
    $domFimPeriodo =  verificarDecimal( str_replace(':','',  $_POST['dom-fim-periodo']));

    $periodoDom = ($domFimPeriodo - $domInicioPeriodo)/100;
    $arrayPeriodos[7] = $periodoDom;

    $nextDay= date('Ymd', strtotime("next Sunday",strtotime($dataInicioReincidente)));

    if ($semanasDireto == 1) {
      //    $arrayX1[7] =  $nextDay;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$nextDay,$domInicioPeriodo,$domFimPeriodo);


    }

    if ($semanasDireto == 2) {

      $data = (string)$nextDay;
      $date = new DateTime($data);
      $dias = 7;
      $date->add(new DateInterval('P'.$dias.'D'));
      $data = $date->format('Ymd');
      // $arrayX2[7] = $data;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$data,$domInicioPeriodo,$domFimPeriodo);

    }

    if ($semanasDireto == 3) {

      $data = (string)$nextDay;
      $date = new DateTime($data);
      $dias = 14;
      $date->add(new DateInterval('P'.$dias.'D'));
      $data = $date->format('Ymd');
      // $arrayX3[7] = $data;
      $db->setDetalhesPedido('PedidosTemporariosReincidente',$conn,$idPedidosTemporarios ,$data,$domInicioPeriodo,$domFimPeriodo);

    }

  }

  $somaPrecos = 0;
  for($i=1;$i<=7;$i++){


    if($arrayPeriodos[$i] == null || $arrayPeriodos[$i] == ''){
      continue;
    }

    //  print "Pedido dia $i - ". $arrayPeriodos[$i].' ';

    if($arrayPeriodos[$i] / 4 < 1){

      $preco = $db->retornarPreco($conn,$idAnuncio);
      $resultado = $preco *$arrayPeriodos[$i];
      $somaPrecos = $somaPrecos + $resultado ;
      //  echo "soma preços".$somaPrecos;

    }

    if($arrayPeriodos[$i] / 4 == 1){

      $preco = $db-> retornarPrecoHoraGeral($conn,$idAnuncio,'quatroHora');
      $resultado = $preco *$arrayPeriodos[$i];
      $somaPrecos = $somaPrecos + $resultado;
      //  echo "soma preços".$somaPrecos;

    }

    if($arrayPeriodos[$i] / 4 > 1){

      $preco = $db-> retornarPrecoHoraGeral($conn,$idAnuncio,'cincoHora');
      $resultado = $preco * $arrayPeriodos[$i];
      $somaPrecos = $somaPrecos + $resultado;
      //   echo "soma preços".$somaPrecos;

    }

  }

  //  print $idAnuncio;
  $idPedido = $pedido->criarPedidoReincidente($conn,$_SESSION['id'],$idAnuncio,$_POST['tipoAluguel'],$somaPrecos,$dataInicioReincidente,$semanasDireto,$arrayX1,$arrayX2,$arrayX3,$idPedidosTemporarios);


}

function verificarDecimal($dia){
  $inteiro = floor($dia);
  $decimal = $segInicioPeriodo - $inteiro;
  if (version_compare($decimal,'0.3') == 0) {
    $dia = ($dia - 0.3)+0.5;
    return $dia;
  }else{
    return $dia;
  }
}



?>

<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,900" rel="stylesheet">
  <link rel="stylesheet" type="text/css"  href="css/locou.css">
  <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
  <title>Locou | Encontre o espaço de trabalho pelo tempo que precisar</title>
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css"  href="css/bootstrap-datepicker3.css">
  <script src="js/bootstrap-datepicker.min.js" ></script>
  <script type="text/javascript" src="//assets.moip.com.br/v2/moip.min.js"></script>
  <script>
  $(function () {

    for (i = new Date().getFullYear() ; i > 1900; i--) {
      $('#years').append($('<option />').val(i).html(i));
    }

    for (i = 1; i < 13; i++) {
      $('#months').append($('<option />').val(i).html(i));
    }
    updateNumberOfDays();

    $('#years, #months').change(function () {

      updateNumberOfDays();

    });

  });

  function updateNumberOfDays() {
    $('#days').html('');
    month = $('#months').val();
    year = $('#years').val();
    days = daysInMonth(month, year);

    for (i = 1; i < days + 1 ; i++) {
      $('#days').append($('<option />').val(i).html(i));
    }

  }

  function daysInMonth(month, year) {
    return new Date(year, month, 0).getDate();
  }

  $(document).ready(function(){
    var possuiInfos = "<?php echo $db->getIdClientMoip($conn,$idUsuario)?>"
    if (possuiInfos!="false") {
      var ddd = "<?php echo $ddd?>";
      var telefone = "<?php echo $number ?>";
      var cep = "<?php echo $cep?>";
      document.getElementById('ddd').value = ddd;
      document.getElementById('telefone').value = telefone;
      document.getElementById('cep').value = cep;
      document.getElementById('nomeC').readOnly = true;
      document.getElementById('cpf').readOnly = true;
      document.getElementById('cidade').readOnly = true;
      document.getElementById('bairro').readOnly = true;
      document.getElementById('rua').readOnly = true;
      document.getElementById('nRua').readOnly = true;
      document.getElementById('complemento').readOnly = true;
      document.getElementById('cep').readOnly = true;
      document.getElementById('telefone').readOnly = true;
      document.getElementById('ddd').readOnly = true;
    }
  });
  </script>
</head>
<style>
#map {
  height: 100%;
}
@media (min-width: 768.1px)
{
  .desktop
  {
    display: block;
  }
  .mobile
  {
    display: none;
  }
}
@media (max-width: 768.0px)
{
  .desktop
  {
    display: none;
  }
  .mobile
  {
    display: block;
  }
}
</style>
<body style="font-family: 'Muli'">


  <nav class="navbar desktop" style="background-color: rgba(0,0,0,1)">
    <a class="navbar-brand ml-5" href="index.php" >
      <img  class="logo-navbar" src="img/locou_logo.png">
    </a>
    <span style="float:right;" class="navbar-brand menu-navbar mr-2 ml-auto">
      <a href="index.php#sobre" style="color: white;" class="mx-2">Sobre</a>
      <a href="index.php#comoFunciona" style="color: white;" class="mx-2">Como Funciona</a>
      <a href="resultado.php" style="color:white" class="mx-2">Procurar Espaços</a>

      <?php if($_SESSION['id']==null && $_SESSION['id'] == "" ){ ?>
        <span class="ml-2 " data-toggle="modal" data-target="#cadastroPop">Não é cadastrado?</span>
        <span class="mx-2 " data-toggle="modal" data-target="#loginPop">Já sou cadastrado</span>
      <?php } ?>

      <a href="anunciar.php"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>

      <?php if($_SESSION['id']!=null && $_SESSION['id'] != "" ){ ?>
        <a class="ml-3"><img class="rounded-circle" src="<?php echo $prefixo.$_SESSION['foto'] ?>" style="height: 40px"></a>

        <a class="mx-2"><i style="font-size: 120%" class="far fa-bell"></i></a>
      <?php } ?>
    </span>
  </nav>

  <nav class="navbar mobile " style="background-color: rgba(0,0,0,1)">
    <div class="row justify-content-center text-center">
      <div class="col-12">
        <a href="index.php">
          <img class="logo-navbar" src="img/locou_logo.png">
          <br><br>
        </a>
      </div>
      <div class="col-12">
        <a href="anunciar.php"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>
        <br><br>
      </div>
      <div class="col-12">
        <span class="menu-navbar" style="color:white">
          <a href="index.php/#sobre" style="color: white;" class="mx-3">Sobre</a>
          <a href="index.php/#comoFunciona" style="color: white;" class="mx-3">Como Funciona</a>
          <a href="resultado.php" style="color:white" class="mx-2">Procurar Espaços</a>
          <br><br>
          <?php if($_SESSION['id']==null && $_SESSION['id'] == "" ){ ?>
            <span class="ml-3 " data-toggle="modal" data-target="#cadastroPop">Não é cadastrado?</span>
            <span class="ml-3 " data-toggle="modal" data-target="#loginPop">Já sou cadastrado</span>
          <?php } ?>
          <?php if($_SESSION['id']!=null && $_SESSION['id'] != "" ){ ?>
            <a class="ml-5"><img class="rounded-circle" src="<?php echo $prefixo.$_SESSION['foto'] ?>" style="height: 40px"></a>

            <a class="mx-3"><i style="font-size: 120%" class="far fa-bell"></i></a>
          <?php } ?>
          <br><br>

          <br><br>
        </span>
      </div>
    </div>
  </nav>

  <div id="pagamentopPop" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Pedido de pagamento realizado com sucesso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Sua requisição de pagamento do pedido foi realizada com sucesso! Aguarde o email de confirmação de que o pagamento foi realizado com sucesso.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Entendi!</button>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid justify-content-center text-left justify-content-center">

    <div class="row py-5 px-4 justify-content-center">
      <div class="col-lg-5 col-md-11 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">
        <div class="row px-5" style="background-color: black">
          <div class="col-12 px-3 py-3 text-center" style="color: white">
            <span class="h5">Adicione os dados para o método de pagamento</span>
          </div>
        </div>
        <form class="" action="TratarDadosPagamento.php?orderID=<?php echo $idPedido?>" method="post">
          <div class="row px-2 py-4">
            <div class="col-12 px-3 py-3">
              <div class="form-group">
                <label for="nomeC">Nome Completo</label>
                <input type="text" value="<?php echo $nomeCompleto ?>" class="form-control" id="nomeC" name="nomeC">
              </div>
              <br>
              <label>Data de nascimento</label>
              <br>

              <select id="days" value="<?php echo $data[2]?>" name="dia"></select>
              <select id="months" value="<?php echo $data[1]?>" name="mes"></select>
              <select id="years" value="<?php echo $data[0]?>" name="ano"></select>
              <br><br><br>
              <div class="form-group">
                <label for="cpf">CPF (Somente Números)</label>
                <input type="text" value="<?php echo $cpf ?>" class="form-control" id="cpf" name="cpf">
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 px-3 py-2">
              <label for="cCD">Código do País</label>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 px-3 py-2">
              <label for="ddd">DDD</label>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 px-3 py-2">
              <label for="telefone">Número de Telefone</label>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 px-3 py-1">
              <div class="form-group">
                <input readonly type="number" class="form-control" id="cCD" name="cCD" placeholder="55">
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 px-3 py-1">
              <div class="form-group">
                <input type="text" class="form-control" id="ddd" name="ddd">
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 px-3 py-1">
              <div class="form-group">
                <input type="text" class="form-control" id="telefone" name="telefone">
              </div>
            </div>
            <div class="col-12 px-3 py-3">
              <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" value="<?php echo $cidade?>" class="form-control" id="cidade" name="cidade">
              </div>
              <div class="form-group">
                <label for="bairro">Bairro</label>
                <input type="text" value="<?php echo $bairro?>" class="form-control" id="bairro" name="bairro">
              </div>
              <div class="form-group">
                <label for="rua">Rua</label>
                <input type="text" value="<?php echo $rua?>" class="form-control" id="rua" name="rua">
              </div>
              <div class="form-group">
                <label for="nRua">Número da Rua</label>
                <input type="number" value="<?php echo $ruaNumber?>" class="form-control" id="nRua" name="nRua">
              </div>
              <div class="form-group">
                <label for="complemento">Complemento</label>
                <input type="text" value="<?php echo $complemento?>" class="form-control" id="complemento" name="complemento">
              </div>
              <div class="form-group">
                <label for="cep">CEP (Somente Números)</label>
                <input type="number" value="<?php echo $cep?>" class="form-control" id="cep" name="cep">
              </div>
              <label for="estado">Estado</label>
              <select class="form-control" name="estado">
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
              </select>
              <br>
              <div class="form-group">
                <label for="pais">País</label>
                <input readonly type="number" class="form-control" id="pais" name="pais" value="BRA" placeholder="Brasil">
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 px-3 py-1">
              <div class="form-group">
                <label for="cartaoNum">Número do Cartão</label>
                <input type="number" class="form-control" id="number" >
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 px-3 py-1">
              <div class="row">
                <div class="col-12 text-center">
                  Data de Vencimento do cartão
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-6 px-3 py-1">
                      <select class="form-control"  id='month'>
                        <option value=''>MM</option>
                        <option value='01'>01</option>
                        <option value='02'>02</option>
                        <option value='03'>03</option>
                        <option value='04'>04</option>
                        <option value='05'>05</option>
                        <option value='06'>06</option>
                        <option value='07'>07</option>
                        <option value='08'>08</option>
                        <option value='09'>09</option>
                        <option value='10'>10</option>
                        <option value='11'>11</option>
                        <option value='12'>12</option>
                      </select>
                    </div>
                    <div class="col-6 px-3 py-1">
                      <select class="form-control"   id='year'>
                        <option value=''>YYYY</option>
                        <option value='18'>2018</option>
                        <option value='19'>2019</option>
                        <option value='20'>2020</option>
                        <option value='21'>2021</option>
                        <option value='22'>2022</option>
                        <option value='23'>2023</option>
                        <option value='24'>2024</option>
                        <option value='25'>2025</option>
                        <option value='26'>2026</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 px-3 py-1">
              <div class="form-group">
                <label for="cartaoVer">Código Verificador</label>
                <input type="number" class="form-control" id="cvc">
              </div>
            </div>
          </div>
          <div class="row justify-content-center text-center">
            <div class="col-12 py-2">
              <textarea name="hash" id="encrypted_value" style="display: none"></textarea>
              <button onclick="encriptJSCartao()" type="submit" class="btn btn-warning m-3"><h4 style="font-weight: 300">Finalizar Reserva</h4></button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-1">

      </div>


      <script>
      $( document ).ready(function() {
        var tipo = "<?php echo $tipo = $busca->getTipoDisponiveis($conn,$idAnuncio); ?>";
        if(tipo == "unico")
        {
          document.getElementById('unico').style.display = "";
        } else if (tipo == "reincidente") {
          // document.getElementById('reincidente').style.display = "";
          var segunda = false;
          var terca = false;
          var quarta = false;
          var quinta = false;
          var sexta = false;
          var sabado = false;
          var domingo = false;
          if(segunda)
          {
            document.getElementById('seg').style.display = '';
          }
          if(terca)
          {
            document.getElementById('ter').style.display = '';
          }
          if(quarta)
          {
            document.getElementById('qua').style.display = '';
          }
          if(quinta)
          {
            document.getElementById('qui').style.display = '';
          }
          if(sexta)
          {
            document.getElementById('sex').style.display = '';
          }
          if(sabado)
          {
            document.getElementById('sab').style.display = '';
          }
          if(domingo)
          {
            document.getElementById('dom').style.display = '';
          }
        } else if (tipo == "direto") {
          document.getElementById('direto').style.display = "";
        }
      });
      </script>
      <div class="col-lg-5 col-md-11 col-sm-12" style="background-color: white;">
        <div class="row px-5 pb-3" style="background-color: black;border-style: solid; border-width: 2px; border-color: #FFC107">
          <div class="col-12 px-3 py-3 text-center" style="color: white">
            <span style="color:#FFC107" class="h4"><b>Checkout</b></span>
          </div>
          <br><br>
          <div class="my-2" style="border-style: solid; border-width: 2px; border-color: #FFC107;width:100%">
            <div class="col-12 px-3 py-3 text-center" style="color: white;">
              <span class="h5">Tipo de aluguel selecionado:</span>
            </div>
            <div class="col-12 px-3 py-1 pb-3 text-center" style="color: white;">
              <span class="h6"><?php echo $tipo ?></span>
            </div>
          </div>
          <br><br>
          <div class="my-2" style="color: white;border-style: solid; border-width: 2px; border-color: #FFC107;width:100%">
            <div class="row px-5">
              <div class="col-12 px-3 py-3 text-center" style="color: white;">
                <span class="h5">Dias Selecionados:</span>
              </div>
              <div id="unico" style="display:none" class="col-10 py-2 text-left">
                <span class="h5">Dia selecionado:  <?php 
                    $array = $buscar -> getHashId($conn,$idGetHash);
                    $titulo = $array[3];
                    $id = $array[5];

                    $detalhe = $buscar->getPedidosTemporariosUnico($conn,$id);
                    $data = $detalhe[0];
                    $entrada = $detalhe[1];
                    $saida = $detalhe[2];

                    echo $data.':'."  ".$entrada.' até '.$saida;?></span>
              </div>
              <div id="seg" style="display: none" class="col-10 py-2 text-left">
                <span class="h5">Segunda-Feira:  (00:00 até 00:00)</span>
              </div>
              <div id="ter" style="display: none" class="col-10 py-2 text-left">
                <span class="h5">Terca-Feira:  (00:00 até 00:00)</span>
              </div>
              <div id="qua" style="display: none" class="col-10 py-2 text-left">
                <span class="h5">Quarta-Feira:  (00:00 até 00:00)</span>
              </div>
              <div id="qui" style="display: none" class="col-10 py-2 text-left">
                <span class="h5">Quinta-Feira:  (00:00 até 00:00)</span>
              </div>
              <div id="sex" style="display: none" class="col-10 py-2 text-left">
                <span class="h5">Sexta-Feira:  (00:00 até 00:00)</span>
              </div>
              <div id="sab" style="display: none" class="col-10 py-2 text-left">
                <span class="h5">Sábado:  (00:00 até 00:00)</span>
              </div>
              <div id="dom" style="display: none" class="col-10 py-2 text-left">
                <span class="h5">Domingo:  (00:00 até 00:00)</span>
              </div>
              <div id="direto" style="display:none" class="col-10 py-2 text-left">
                <span class="h5">Período selecionado:  (00/00 até 00/00) - 9h as 18h</span>
              </div>
            </div>
          </div>
          <br><br>
          <div class="my-2" style="border-style: solid; border-width: 2px; border-color: #FFC107;width:100%">
            <div class="col-12 px-3 py-3 text-center" style="color: white;">
              <span class="h5">Preço Total (Com Taxas):</span>
            </div>
            <div class="col-12 px-3 py-1 pb-3 text-center" style="color: white;">
              <span class="h6">(PREÇO TOTAL)</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <textarea id="public_key" style="display:none;">
    -----BEGIN PUBLIC KEY-----
    MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAh1v8sntcpO3B884rSbHC
    CLLXW9TYOZeyI8Y23AYfYdyzahN41ej17bqpm8aEa8314lRiFJHvRHu5v+5BHzhX
    941Xu20mtDEneGI9l277kRSQfKKM7ELR7AYh45XNNzT3fHQTXc8FjGoS2D/b+Dly
    EowCMhopItX5Wi0LtAeOdfKk7sy5Yy9invq/z0v1qAdB7+JBGQJADBsBxbUNVyT7
    Ptorqfl5Nafs8ZuWw0Mq63Ya5/lFKa3mwPgod6/ZZoNDfbeaIardR4U35N5BkLhQ
    Ad/zJrd9QFOBt2HS7/3s03/CDR7utkrRjsWP87rJ0okZhdqr4E7ZTNIPZHEsaClT
    7wIDAQAB
    -----END PUBLIC KEY-----
  </textarea>
  <script type="text/javascript">
  function encriptJSCartao() {
    var cc = new Moip.CreditCard({
      number  : $("#number").val(),
      cvc     : $("#cvc").val(),
      expMonth: $("#month").val(),
      expYear : $("#year").val(),
      pubKey  : $("#public_key").val()
    });
    console.log(cc);
    if( cc.isValid()){
      $("#encrypted_value").val(cc.hash());
    }
    else{
      $("#encrypted_value").val('');
      alert('Invalid credit card. Verify parameters: number, cvc, expiration Month, expiration Year');
    }
  }
  </script>

</body>
