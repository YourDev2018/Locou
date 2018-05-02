<!DOCTYPE html>


<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once 'FunctionsSession.php';
require_once 'FunctionsDB.php';
require_once 'BuscarEspacos.php';
require_once 'AnuncioClass.php';

$prefixo = "http://www.yourdev.com.br/clientes/locou/img/anuncio/";



$session = new FunctionsSession();
$session->iniciarSession();

$db = new FunctionsDB();
$conn = $db->conectDB();

$busca = new BuscarEspacos();

$idAnuncio = $_GET['id'];
if ($idAnuncio == null || $idAnuncio == "") {
  header('Location: index.php');
}

$array = $busca->retornarAnuncioBasicoId($conn,$idAnuncio);
$status = $_GET['status'];
$funcao= $_GET['funcao'];


//  print_r ($session->vereficarLogin());
//print_r ($array) ;

$busca = new BuscarEspacos();
$arrayGeral = $busca->retornarDescGeral($conn, $idAnuncio);

$anuncio = new AnuncioClass();

if($array[9] == 'consultorio'){
  $arrayEspecifico = $busca -> retornarConsultorioDetalhado($conn,$idAnuncio);
  $anuncio->wifi = true;
  $con = 0;
  $anuncio->numMesa =  $arrayEspecifico[$con++];
  $anuncio->numCadeira = $arrayEspecifico[$con++];
  $anuncio->numLuminaria = $arrayEspecifico[$con++];
  $anuncio->climatizado = $arrayEspecifico[$con++];
  $anuncio->modeloAr = $arrayEspecifico[$con++];
  $anuncio->wifi = $arrayEspecifico[$con++];
  $anuncio->monitoramento = $arrayEspecifico[$con++];
  $anuncio->armario = $arrayEspecifico[$con++];
  $anuncio->secretaria = $arrayEspecifico[$con++];
  $anuncio->limpeza = $arrayEspecifico[$con++];
  $anuncio->copa = $arrayEspecifico[$con++];
  $anuncio->numMacas = $arrayEspecifico[$con++];
  $anuncio->balanca = $arrayEspecifico[$con++];
  $anuncio->cafe = $arrayEspecifico[$con++];
  $anuncio->agua = $arrayEspecifico[$con++];
  $anuncio->tv = $arrayEspecifico[$con++];
  $anuncio->descricao = $arrayEspecifico[$con++];

}

if($array[9] == 'cozinha'){
  $arrayEspecifico = $busca -> retornarCozinhaDetalhado($conn,$idAnuncio);
  $con = 0;
  $anuncio->numMesa =  $arrayEspecifico[$con++];
  $anuncio->numCadeira = $arrayEspecifico[$con++];
  $anuncio->climatizado = $arrayEspecifico[$con++];
  $anuncio->modeloAr = $arrayEspecifico[$con++];
  $anuncio->areaEvento = $arrayEspecifico[$con++];
  $anuncio->bar = $arrayEspecifico[$con++];
  $anuncio->buffet = $arrayEspecifico[$con++];
  $anuncio->aula = $arrayEspecifico[$con++];
  $anuncio->wifi = $arrayEspecifico[$con++];
  $anuncio->monitoramento = $arrayEspecifico[$con++];
  $anuncio->armario = $arrayEspecifico[$con++];
  $anuncio->chave = $arrayEspecifico[$con++];
  $anuncio->estante = $arrayEspecifico[$con++];
  $anuncio->faxina = $arrayEspecifico[$con++];
  $anuncio->inventario = $arrayEspecifico[$con++];
  $anuncio->freezer = $arrayEspecifico[$con++];
  $anuncio->geladeira = $arrayEspecifico[$con++];
  $anuncio->fogao = $arrayEspecifico[$con++];
  $anuncio->forno = $arrayEspecifico[$con++];
  $anuncio->fornoTipo = $arrayEspecifico[$con++];
  $anuncio->tipoFogao = $arrayEspecifico[$con++];
  $anuncio->descricaoExaustor = $arrayEspecifico[$con++];
  $anuncio->descricao = $arrayEspecifico[$con++];
 // $anuncio-> = $arrayEspecifico[$con++];

}

if($array == 'academia'){
  $arrayEspecifico = $busca -> retornarAnuncioAcademiaDetalhado($conn,$idAnuncio);
  $con = 0;
  $anuncio->tatame = $arrayEspecifico[$con++];
  $anuncio->armario = $arrayEspecifico[$con++];
  $anuncio->bosu = $arrayEspecifico[$con++];
  $anuncio->rolo = $arrayEspecifico[$con++];
  $anuncio->maca = $arrayEspecifico[$con++];
  $anuncio->trapezio = $arrayEspecifico[$con++];
  $anuncio->baqueta = $arrayEspecifico[$con++];
  $anuncio->pilates = $arrayEspecifico[$con++];
  $anuncio->descricao = $arrayEspecifico[$con++];
}

if($array == 'artes'){
  $arrayEspecifico = $busca -> retornarAnuncioArtesDetalhado($conn,$idAnuncio);
  $con = 0;
  $anuncio->forno = $arrayEspecifico[$con++];
  $anuncio->macarico = $arrayEspecifico[$con++];
  $anuncio->moldes = $arrayEspecifico[$con++];
  $anuncio->bancada = $arrayEspecifico[$con++];
  $anuncio->armario = $arrayEspecifico[$con++];
  $anuncio->descricao= $arrayEspecifico[$con++];

 // $anuncio-> = $arrayEspecifico[$con++];


}

if($array == 'aulas'){
  $arrayEspecifico = $busca -> retornarAnuncioAulasDetalhado($conn,$idAnuncio);
  $con = 0;
  $anuncio->camarim = $arrayEspecifico[$con++];
  $anuncio->apoio = $arrayEspecifico[$con++];
  $anuncio->barra = $arrayEspecifico[$con++];
  $anuncio->espelho = $arrayEspecifico[$con++];
  $anuncio->descricao = $arrayEspecifico[$con++];

}

if($array == 'costura'){
  $arrayEspecifico = $busca -> retornarAnuncioCosturaDetalhado($conn,$idAnuncio);
  $con = 0;
  $anuncio->recepcao = $arrayEspecifico[$con++];
  $anuncio->maquina = $arrayEspecifico[$con++];
  $anuncio->mobiliario = $arrayEspecifico[$con++];
  $anuncio->provador = $arrayEspecifico[$con++];
  $anuncio->armario = $arrayEspecifico[$con++];
  $anuncio->descricao = $arrayEspecifico[$con++];

}

if($array == 'ensaio'){
  $arrayEspecifico = $busca -> retornarAnuncioEnsaioDetalhado($conn,$idAnuncio);
  $con = 0;
  $anuncio->camarim = $arrayEspecifico[$con++];
  $anuncio->apoio = $arrayEspecifico[$con++];
  $anuncio->barra = $arrayEspecifico[$con++];
  $anuncio->espelho = $arrayEspecifico[$con++];
  $anuncio->descricao = $arrayEspecifico[$con++];

}

if($array == 'fotografico'){
  $arrayEspecifico = $busca -> retornarAnuncioFotograficoDetalhado($conn,$idAnuncio);
  $con = 0;
  $anuncio->climatizado = $arrayEspecifico[$con++];
  $anuncio->modeloAr = $arrayEspecifico[$con++];
  $anuncio->altura = $arrayEspecifico[$con++];
  $anuncio->wifi = $arrayEspecifico[$con++];
  $anuncio->cozinha = $arrayEspecifico[$con++];
  $anuncio->banheiro = $arrayEspecifico[$con++];
  $anuncio->chuveiro = $arrayEspecifico[$con++];
  $anuncio->camarim = $arrayEspecifico[$con++];
  $anuncio->frigobar = $arrayEspecifico[$con++];
  $anuncio->agua = $arrayEspecifico[$con++];
  $anuncio->fundo = $arrayEspecifico[$con++];
  $anuncio->chroma = $arrayEspecifico[$con++];
  $anuncio->iluminacao = $arrayEspecifico[$con++];
  $anuncio->descricao = $arrayEspecifico[$con++];

}

if($array == 'palestra'){
  $arrayEspecifico = $busca -> retornarAnuncioPalestraDetalhado($conn,$idAnuncio);
  $con = 0;
  $anuncio->numMesa = $arrayEspecifico[$con++];
  $anuncio->numCadeira = $arrayEspecifico[$con++];
  $anuncio->numQuadro = $arrayEspecifico[$con++];
  $anuncio->numLousa = $arrayEspecifico[$con++];
  $anuncio->numTelao = $arrayEspecifico[$con++];
  $anuncio->numTv = $arrayEspecifico[$con++];
  $anuncio->climatizado = $arrayEspecifico[$con++];
  $anuncio->modeloAr = $arrayEspecifico[$con++];
  $anuncio->wifi = $arrayEspecifico[$con++];
  $anuncio->armario = $arrayEspecifico[$con++];
  $anuncio->limpeza = $arrayEspecifico[$con++];
  $anuncio->copa = $arrayEspecifico[$con++];
  $anuncio->projetor = $arrayEspecifico[$con++];
  $anuncio->som = $arrayEspecifico[$con++];
  $anuncio->computador = $arrayEspecifico[$con++];
  $anuncio->flip = $arrayEspecifico[$con++];
  $anuncio->cafe = $arrayEspecifico[$con++];
  $anuncio->agua = $arrayEspecifico[$con++];
  $anuncio->buffet = $arrayEspecifico[$con++];
  $anuncio->buffetExtra = $arrayEspecifico[$con++];
  $anuncio->descricaoEquipamento = $arrayEspecifico[$con++];
  $anuncio->descricao = $arrayEspecifico[$con++];
 // $anuncio-> = $arrayEspecifico[$con++];
 // $anuncio-> = $arrayEspecifico[$con++];




}

if($array == 'produtora'){
  $arrayEspecifico = $busca -> retornarAnuncioProdutoraDetalhado($conn,$idAnuncio);
   $con = 0;
  $anuncio->climatizado = $arrayEspecifico[$con++];
  $anuncio->modeloAr = $arrayEspecifico[$con++];
  $anuncio->altura = $arrayEspecifico[$con++];
  $anuncio->wifi = $arrayEspecifico[$con++];
  $anuncio->cozinha = $arrayEspecifico[$con++];
  $anuncio->banheiro = $arrayEspecifico[$con++];
  $anuncio->chuveiro = $arrayEspecifico[$con++];
  $anuncio->camarim = $arrayEspecifico[$con++];
  $anuncio->frigobar = $arrayEspecifico[$con++];
  $anuncio->agua = $arrayEspecifico[$con++];
  $anuncio->fundo = $arrayEspecifico[$con++];
  $anuncio->chroma = $arrayEspecifico[$con++];
  $anuncio->iluminacao = $arrayEspecifico[$con++];
  $anuncio->descricao = $arrayEspecifico[$con++];
}

if($array == 'workshop'){
  $arrayEspecifico = $busca -> retornarWorkShopDetalhado($conn,$idAnuncio);
  $con = 0;
  $anuncio->numMesa = $arrayEspecifico[$con++];
  $anuncio->numCadeira = $arrayEspecifico[$con++];
  $anuncio->numQuadro = $arrayEspecifico[$con++];
  $anuncio->numLousa = $arrayEspecifico[$con++];
  $anuncio->numTelao = $arrayEspecifico[$con++];
  $anuncio->numTv = $arrayEspecifico[$con++];
  $anuncio->climatizado = $arrayEspecifico[$con++];
  $anuncio->modeloAr = $arrayEspecifico[$con++];
  $anuncio->wifi = $arrayEspecifico[$con++];
  $anuncio->armario = $arrayEspecifico[$con++];
  $anuncio->limpeza = $arrayEspecifico[$con++];
  $anuncio->copa = $arrayEspecifico[$con++];
  $anuncio->projetor = $arrayEspecifico[$con++];
  $anuncio->som = $arrayEspecifico[$con++];
  $anuncio->computador = $arrayEspecifico[$con++];
  $anuncio->flip = $arrayEspecifico[$con++];
  $anuncio->cafe = $arrayEspecifico[$con++];
  $anuncio->agua = $arrayEspecifico[$con++];
  $anuncio->buffet = $arrayEspecifico[$con++];
  $anuncio->buffetExtra = $arrayEspecifico[$con++];
  $anuncio->descricaoEquipamento = $arrayEspecifico[$con++];
  $anuncio->descricao = $arrayEspecifico[$con++];

}

$busca->addContador($conn, $idAnuncio);



?>


<?php

if($session->vereficarLogin() != false){
  if ($session->verificarUsuarioCliente($conn,$_SESSION['id']) != false ) {
    // chamar página de pagamento
  }else{
    // chamar pop-up de salvar cliente
    // Enviar dados para CadastrarCliente  (Função  implementada)
    // E ir para pagamento
  }
}else{
  // chamar campo de login
  if ($session->verificarUsuarioCliente($conn,$_SESSION['id']) != false ) {
    // chamar página de pagamento
  }else{
    // chamar pop-up de salvar cliente
    // Enviar dados para CadastrarCliente
    // E ir para pagamento
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
  <script src="js/jquery.paver.js" ></script>
  <script src="js/jquery.ba-throttle-debounce.min.js" ></script>
  <link rel="stylesheet" type="text/css"  href="css/paver.scss">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="//assets.moip.com.br/v2/moip.min.js"></script>

  <script>
  //set de variaveis
  <?php

  $arrayHorarios = $busca->retornarDiasCadastrados($conn,$idAnuncio);

  for ($i =0; $i<count($arrayHorarios); $i ++) {

    $originalDate = $arrayHorarios[$i];
    $newDate = date("d-m-Y", strtotime($originalDate));
 //   print $newDate. " / " ;

    $day = date('N',strtotime($newDate));

    if($day == 1)
      $seg =  json_encode(true);

    if($day == 2)
      $ter=  json_encode(true);

    if($day == 3)
      $qua =  json_encode(true);

    if($day == 4)
      $qui = json_encode(true);

    if($day == 5)
      $sex =  json_encode(true);

    if($day == 6)
      $sab =  json_encode(true);

    if($day == 7)
      $dom = json_encode(true);
  }

  ?>
  var seg_ativo = <?php if($ter != true){ echo json_encode(false);} else{echo json_encode(true);} ?>;
  var ter_ativo = <?php if($ter != true){ echo json_encode(false);} else{echo json_encode(true);} ?>;
  var qua_ativo = <?php if($qua != true){ echo json_encode(false);} else{echo json_encode(true);} ?>;
  var qui_ativo = <?php if($qui != true){ echo json_encode(false);} else{echo json_encode(true);} ?>;
  var sex_ativo = <?php if($sex != true){ echo json_encode(false);} else{echo json_encode(true);} ?>;
  var sab_ativo = <?php if($sab != true){ echo json_encode(false);} else{echo json_encode(true);} ?>;
  var dom_ativo = <?php if($dom != true){ echo json_encode(false);} else{echo json_encode(true);} ?>;

  var ph = <?php echo $array[7] ?>;
  var ph4 = <?php echo $arrayGeral[11] ?>;
  var ph5 =  <?php echo $arrayGeral[12] ?>;
  var pr =  <?php echo $arrayGeral[13] ?>;
  var ps =  <?php echo $arrayGeral[14] ?>;
  var pm =  <?php echo $arrayGeral[15] ?>;

  <?php $arrayHorarios = $busca-> retornarHorário($conn,$idAnuncio) ?>

  var seg_max_h = <?php echo $arrayHorarios[8] ?>;
  var seg_max_m = 30;
  var seg_min_h = <?php echo $arrayHorarios[1] ?>;
  var seg_min_m = 0;

  var ter_max_h = <?php echo $arrayHorarios[9] ?>;
  var ter_max_m = 0;
  var ter_min_h = <?php echo $arrayHorarios[2] ?>;
  var ter_min_m = 0;
  var qua_max_h = <?php echo $arrayHorarios[10] ?>;
  var qua_max_m = 0;
  var qua_min_h = <?php echo $arrayHorarios[3] ?>;
  var qua_min_m = 0;
  var qui_max_h = <?php echo $arrayHorarios[11] ?>;
  var qui_max_m = 0;
  var qui_min_h = <?php echo $arrayHorarios[4] ?>;
  var qui_min_m = 0;
  var sex_max_h = <?php echo $arrayHorarios[12] ?>;
  var sex_max_m = 0;
  var sex_min_h = <?php echo $arrayHorarios[5] ?>;
  var sex_min_m = 0;
  var sab_max_h = <?php echo $arrayHorarios[13] ?>;
  var sab_max_m = 0;
  var sab_min_h = <?php echo $arrayHorarios[6] ?>;
  var sab_min_m = 0;
  var dom_max_h = <?php echo $arrayHorarios[14] ?>;
  var dom_max_m = 0;
  var dom_min_h = <?php echo $arrayHorarios[7] ?>;
  var dom_min_m = 0;

  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0!
  var yyyy = today.getFullYear();


  if(dd<10)
  {
    dd = '0'+dd
  }
  if(mm<10)
  {
    mm = '0'+mm
  }
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  $.fn.datepicker.defaults.format = "dd/mm/yyyy";
  $.fn.datepicker.defaults.autoclose = true;
  $.fn.datepicker.defaults.maxViewMode = 0;
  var hoje = dd+"/"+mm+"/"+yyyy;
  $.fn.datepicker.defaults.startDate = hoje;
  $.fn.datepicker.defaults.todayHighlight = true;
  $.fn.datepicker.defaults.daysOfWeekDisabled = [<?php if($seg == false){echo 1;} ?>,<?php if($ter == false){echo 2;} ?>,<?php if($qua == false){echo 3;} ?>,<?php if($qui == false){echo 4;} ?>,<?php if($sex == false){echo 5;} ?>,<?php if($sab == false){echo 6;} ?>,<?php if($dom == false){echo 0;} ?>];
  $.fn.datepicker.defaults.daysOfWeekHighlighted = [<?php if($seg == true){echo 1;} ?>,<?php if($ter == true){echo 2;} ?>,<?php if($qua == true){echo 3;} ?>,<?php if($qui == true){echo 4;} ?>,<?php if($sex == true){echo 5;} ?>,<?php if($sab == true){echo 6;} ?>,<?php if($dom == true){echo 0;} ?>];
  // $.fn.datepicker.defaults.datesDisabled = ['23/04/2018'];

  $( function() {
    $( "#datepicker-reincidente" ).datepicker({startDate: '+3d',daysOfWeekDisabled: [], daysOfWeekHighlighted: [], datesDisabled: [] });
  } );

  $( function() {
    $( "#datepicker-direto" ).datepicker({startDate: '+3d',daysOfWeekDisabled: [], daysOfWeekHighlighted: [], datesDisabled: [] });
  } );

  </script>
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
  .carousel-inner
  {
    height: 25vw;
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
  .carousel-inner
  {
    height: 40vh
  }
}
.panorama {
  height: 400px;
  overflow-x: scroll;
  overflow-y: hidden;
  img {
    height: 100%;
  }
}
</style>
<body style="font-family: 'Muli'">

  <!-- Navbar -->

  <nav class="navbar desktop" style="background-color: rgba(0,0,0,1)">
    <a class="navbar-brand ml-5" href="index.php" >
      <img  class="logo-navbar" src="img/locou_logo.png">
    </a>
    <span style="float:right;" class="navbar-brand menu-navbar mr-2 ml-auto">
      <a href="#comoFunciona" style="color: white;" class="mx-2">Como Funciona</a>
      <a href="#sobre" style="color: white;" class="mx-2">Sobre</a>
      <a href="resultado.php?t=todos&q=" style="color:white" class="mx-2">Procurar Espaços</a>

      <?php if($_SESSION['id']==null && $_SESSION['id'] == "" ){ ?>
        <span style="cursor: pointer;" class="ml-2 " data-toggle="modal" data-target="#cadastroPop">Não é cadastrado?</span>
        <span style="cursor: pointer;" class="mx-2 " data-toggle="modal" data-target="#loginPop">Já sou cadastrado</span>
      <?php } ?>

      <a href="anunciar.php"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>

      <?php if($_SESSION['id']!=null && $_SESSION['id'] != "" ){ ?>
        <a class="ml-3"><img class="rounded-circle" src="<?php echo $prefixo.$_SESSION['foto'] ?>" style="height: 40px"></a>

        <a class="mx-2"><i style="font-size: 120%" class="far fa-bell"></i></a>
        <a href="<?php echo "logout.php?pag=anuncio&id=".$idAnuncio ?>" style="color:white" class="mx-2">Logout</a>
      <?php } ?>
    </span>
  </nav>

  <nav class="navbar mobile" style="background-color: rgba(0,0,0,1)">
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
          <a href="#comoFunciona" style="color: white;" class="mx-2">Como Funciona</a>
          <a href="#sobre" style="color: white;" class="mx-2">Sobre</a>
          <a href="resultado.php?t=todos&q=" style="color:white" class="mx-2">Procurar Espaços</a>
          <br><br>
          <?php if($_SESSION['id']==null && $_SESSION['id'] == "" ){ ?>
            <span class="ml-3 " data-toggle="modal" data-target="#cadastroPop">Não é cadastrado?</span>
            <span class="ml-3 " data-toggle="modal" data-target="#loginPop">Já sou cadastrado</span>
          <?php } ?>
          <?php if($_SESSION['id']!=null && $_SESSION['id'] != "" ){ ?>
            <a class="ml-5"><img class="rounded-circle" src="<?php echo $prefixo.$_SESSION['foto'] ?>" style="height: 40px"></a>

            <a class="mx-3"><i style="font-size: 120%" class="far fa-bell"></i></a>


            <a href="<?php echo "logout.php?pag=anuncio&id=".$idAnuncio ?>" style="color:white" class="mx-2">Logout</a>



          <?php } ?>
          <br><br>

          <br><br>
        </span>
      </div>
    </div>
  </nav>


  <div class="modal fade" id="cadastroPop" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cadastro de novo usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="pt-2" style="background-color:white">
            <form action="CadastrarUsuario.php?pag=index" enctype="multipart/form-data" method="post">
              <div class="row text-center justify-content-center">
                <div class="col-12 pb-3">
                  <label for="nome">Nome</label>
                  <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="col-12 pb-3">
                  <label for="sobrenome">Sobrenome</label>
                  <input type="text" class="form-control" id="sobrenome" name="sobrenome">
                </div>
                <div class="col-12 pb-3">
                  <label>Data de nascimento</label>
                  <br>
                  <select id="days" name="dia"></select>
                  <select id="months" name="mes"></select>
                  <select id="years" name="ano"></select>
                </div>
                <div class="col-12 pb-3">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@exemplo.com">
                </div>
                <div class="col-12 pb-5">
                  <label for="senha">Senha</label>
                  <input type="password" class="form-control" id="senha" name="senha">
                </div>
                <div class="col-10 pb-3 pt-3">
                  <input type="file" class="custom-file-input" id="foto" name="foto">
                  <label class="custom-file-label text-left" id="foto-label" for="foto">Escolha uma foto de perfil</label>
                </div>
              </div>
              <br>
              <span style="font-size: 90%; color:red; display: <?php if($funcao != 'cadastro' && $status != 'false'){ echo "none";}?>">Um ou mais dados estão incorretos/faltando. Verifique novamente se os dados estão corretos</span>
              <br>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-warning m-3"><h4 style="font-weight: 300">Cadastrar</h4></button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="loginPop" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login de usuário já existente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="pt-2" id="logar-div" style="background-color:white">
            <form action="<?php echo "logar.php?pag=anuncio&id=".$idAnuncio ?> " method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email-login" name="email" placeholder="exemplo@exemplo.com">
              </div>
              <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha-login" name="senha">
              </div>
              <br>
              <span style="font-size: 90%; color:red; display: <?php if($funcao != 'login' && $status != 'false'){ echo "none";}?>">Login e/ou senha incorreto(s)</span>
              <br>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-warning m-3"><h4 style="font-weight: 300">Login</h4></button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="completarCadastro" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Completar Cadastro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center justify-content-center">
          <p style="font-size: 80%">Ops... precisamos de mais informações antes de você poder anunciar esse espaço.
            <br><br>
            Complete essas informações antes de prosseguir. Precisamos de todos esses dados para poder efetuar o pagamento para você.
            <br>
            <hr>
          </p>

          <form action="CadastrarCliente.php" method="post">

            <div class="form-group">
              <label for="cpf">CPF (Apenas Número)</label>
              <input type="number" name="cpf" class="form-control" id="cpf" placeholder="12345665432">
            </div>
            <div class="form-group">
              <label for="ddd">DDD (Apenas Número)</label>
              <input type="number" name="ddd" class="form-control" id="ddd" placeholder="21">
            </div>
            <div class="form-group">
              <label for="tel">Telefone (Apenas Número)</label>
              <input type="number" name="tel" class="form-control" id="tel" placeholder="912345678">
            </div>
            <div class="form-group">
              <label for="rua">Rua</label>
              <input type="text" name="rua" class="form-control" id="rua" placeholder="Rua exemplo">
            </div>
            <div class="form-group">
              <label for="ruaN">Número da Rua (Apenas Número)</label>
              <input type="number" name="ruaN" class="form-control" id="ruaN" placeholder="157">
            </div>
            <div class="form-group">
              <label for="complemento">Complemento</label>
              <input type="text" name="complemento" class="form-control" id="complemento" placeholder="Complemento">
            </div>
            <div class="form-group">
              <label for="bairro">Bairro</label>
              <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Nome Bairro">
            </div>
            <div class="form-group">
              <label for="cep">CEP (Apenas Número)</label>
              <input type="number" name="cep" class="form-control" id="cep" placeholder="21000-000">
            </div>
            <div class="form-group">
              <label for="cidade">Cidade</label>
              <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Rio de Janeiro">
            </div>
            <div class="form-group">
              <label for="estado">Estado</label>
              <input type="text" name="estado" class="form-control" id="estado" placeholder="Rio de Janeiro">
            </div>

            <span style="color: grey;font-size: 80%">Nunca vamos divulgar nenhuma informação sua!</span>
          </div>
          <div class="modal-footer">
            <button type="button" class="ml-3 btn btn-warning">Atualizar</button>
          </div>

        </form>


      </div>
    </div>
  </div>

  <div class="modal" id="saibaMaisDireto" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">O que é Modo Direto?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            Você irá alugar todos os dias da semana de 9 as 18hrs um período igual ou menor que 3 meses.
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Entendi!</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="saibaMaisReincidente" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">O que é Modo Reincidente?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
             Você irá alugar dias da semana específicos e horários únicos para cada dia  Ex: Terças e Quintas das 13 as 18 hrs.
            <br>
            E isso se repete semanalmente por um período  de até 3 meses.
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Entendi!</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="saibaMaisUnico" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">O que é Modo Único?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            Você precisa de um horário pontual e único, que não tem a previsão de se repetir nas próximas semanas.
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Entendi!</button>
        </div>
      </div>
    </div>
  </div>



  <!-- Titulo Anuncio -->

  <div class="container-fluid justify-content-center text-center" style="padding-top: 1.5vw; background-color: ">
    <div class="row">

      <div class="col-2">
      </div>
      <div class="col-8" style="text-transform: capitalize">
        <h1 style="color:black"><b><?php $cont = 4; echo $array[$cont]?></b></h1>
        <h5 style="color: grey">
          <?php $cont++; echo $array[$cont]?> | <?php $cont++; echo $array[$cont]?> | <?php $cont++; $cont++; echo $array[$cont]?> <!-- <?//php $cont++; echo $array[$cont]?> -->
          <!-- <span class="pl-4" style="font-weight: 300; font-size: 110%; color: #FFCE00">
          &#9733;&#9733;&#9733;&#9733;&#9733; <span style="color: grey; font-size: 15px"> - 5.0 <br> (2 avaliações)</span>
        </span> Retirado até segunda parte -->
      </h5>
    </div>
    <div class="col-2">
    </div>

  </div>
</div>

<div class="modal" id="emailEnviado" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Email enviado!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>O seu pedido foi enviado ao proprietário, em breve lhe daremos uma resposta.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Entendi!</button>
      </div>
    </div>
  </div>
</div>

<!-- Fotos e dados básicos -->
<form id="form-pagamento" action="pagamento.php" method="post">
  <input type="text" name="idAnuncio" value="<?php echo $idAnuncio; ?>" style="display: none;" readonly>
  <div class="px-3 container-fluid justify-content-center text-center" style="border-top: 2.5px solid #FFCE00;">
    <div class="row">
      <div class="col-12">
        <div class="row" style="background-color: ;">

          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="c-wrapper">
              <div id="carousel-fotos" class="carousel" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-fotos" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-fotos" data-slide-to="1"></li>
                  <li data-target="#carousel-fotos" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" style="width:100%;">
                  <div class="carousel-item active">
                    <img style="width:100%" class="d-block img-fluid" src="<?php $cont = 1; echo $prefixo.$array[$cont++]?>">
                  </div>
                  <div class="carousel-item">
                    <img style="width:100%" class="d-block img-fluid" src="<?php  echo $prefixo.$array[$cont++]?>">
                  </div>
                  <div class="carousel-item">
                    <img style="width:100%" class="d-block img-fluid" src="<?php  echo $prefixo.$array[$cont++]?>">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carousel-fotos" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Voltar</span>
                </a>
                <a class="carousel-control-next" href="#carousel-fotos" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Próximo</span>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12 text-center justify-content-center">
            <div class="col-12" >
              <div class="row pb-3">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center justify-content-center">
                  <div class="row text-center justify-content-center pt-1">
                    <div class="col-lg-10 col-md-10 col-sm-12">
                      <h2> <b>Descrição:</b> </h2>
                      <span><?php if ($arrayEspecifico != null || $arrayEspecifico != "") {
                        $aux = count($arrayEspecifico) -1; echo  $arrayEspecifico[$aux];
                      } ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="row pt-2" style="border-top: 2.5px solid #FFCE00;">
          <div class="col-12">
            <div class="row text-left">
              <div class="col-12">
                <div class="row text-center justify-content-center" style="font-size: 14px">
                  <div class="col py-1">
                    <h6 style="color: black; font-weight: 600; font-size:90%">Metragem<br></h6>
                    <h5 style="color: grey;font-size:90%;font-weight: 600;"><img height="23px" src="img/icones/house-outline.svg"> <br> <?php $cont=0; echo $arrayGeral[$cont++] ?> M²</h5>
                  </div>

                  <?php if ($arrayGeral[$cont++] == "sim"){ ?>

                    <div class="col py-1">
                      <h6 style="color: black; font-weight: 600 ;font-size:90%">Possui<br></h6>
                      <h5 style="color: grey;font-size:90%;font-weight: 600;"><img height="23px" src="img/icones/recepcao.svg"> <br> Recepção</h5>
                    </div>

                  <?php } if ($arrayGeral[$cont++] == "sim"){ ?>

                    <div class="col py-1">
                      <h6 style="color: black; font-weight: 600;font-size:90% ">Possui<br></h6>
                      <h5 style="color: grey;font-size:90%;font-weight: 600;"><img height="23px" src="img/icones/toilet.svg"> <br> Banheiro comum</h5>
                    </div>

                  <?php } if ($arrayGeral[$cont++] == "sim"){ ?>

                    <div class="col py-1">
                      <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                      <h5 style="color: grey;font-size:90%;font-weight: 600;"><img height="23px" src="img/icones/wc.svg"> <br> Banheiro privativo</h5>
                    </div>

                  <?php } if ($arrayGeral[$cont] == "predio"){ ?>

                    <div class="col py-1">
                      <h6 style="color: black; font-weight: 600;font-size:90%">O local<br></h6>
                      <h5 style="color: grey;font-size:90%;font-weight: 600;"><img height="23px" src="img/icones/apartment.svg"> <br> É um Prédio</h5>
                    </div>

                    <?php $cont++;} if ($arrayGeral[$cont] == "casa"){ ?>

                      <div class="col py-1">
                        <h6 style="color: black; font-weight: 600;font-size:90%">O local<br></h6>
                        <h5 style="color: grey;font-size:90%;font-weight: 600;"><img height="23px" src="img/icones/home.svg"> <br> É uma casa</h5>
                      </div>

                      <?php $cont++; } if ($arrayGeral[$cont++] == "sim"){ ?>

                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><img height="23px" src="img/icones/elevator.svg"> <br> Elevador no prédio</h5>
                        </div>

                      <?php } if ($arrayGeral[7] == "rotativo"){ ?>

                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><img height="23px" src="img/icones/refresh-button.svg"> <br> Estacionamento rotativo</h5>
                        </div>

                      <?php } if ($arrayGeral[7] == "proprio"){?>

                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><img height="23px" src="img/icones/parking.svg"> <br> Estacionamento Proprio </h5>
                        </div>

                      <?php } if ($arrayGeral[8] == "sim") { ?>

                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Fácil acesso<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><img height="23px" src="img/icones/bus-stop.svg"> <br> Ao transporte público <br> <span style="color: white">(Até 5 min de distância)</span> </h5>
                        </div>

                      <?php } ?>

                    </div>
                  </div>
                  <div class="col-12" style="border-top: solid; border-width: 2px; border-color: white;">
                    <div class="row text-center justify-content-center">
                      <div class="col-6">
                        <h6 style="color: black; font-weight: 600">Comodidades do local:</h6>
                      </div>
                    </div>
                    <script>
                      function comodidadesLocal()
                      {
                        var str = document.getElementById('comodidades-local').innerHTML;
                        if( "<?php if($anuncio->climatizado!='sim'){echo 'nao';}else{echo "$anuncio->climatizado";} ?>" == "sim") //climatizado - aula - ensaio
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/air-conditioner.svg\"><br> Ar-Condicionado</h5></div>";
                        }
                        if(  "<?php if($anuncio->wifi !='sim'){echo 'nao';}else{echo "$anuncio->wifi";}?>" == "sim") //wifi - aula - ensaio
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Tem<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/wifi.svg\"> <br> Wi-Fi</h5></div>";
                        }
                        if("<?php if($anuncio->monitoramento !='sim'){echo 'nao';}else{echo "$anuncio->monitoramento";}?>" == "sim") //monitoramento - aula - ensaio
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/cctv.svg\"> <br> Monitoramento ou vigilância por câmera</h5></div>";
                        }
                        if("<?php if($anuncio->armario !='sim'){echo 'nao';}else{echo "$anuncio->armario";}?>" == "sim") //armarios - consultorio / workshop / palestra / cozinha / costura / academia
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/locker.svg\"> <br> Armários para pertences</h5></div>";
                        }
                        if("<?php if($anuncio->secretaria !='sim'){echo 'nao';}else{echo "$anuncio->secretaria";}?>" == "sim") //secretaria - consultorio
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/secretaria.svg\"> <br> Secretária compartilhada</h5></div>";
                        }
                        if("<?php if($anuncio->limpeza !='sim'){echo 'nao';}else{echo "$anuncio->limpeza";}?>" == "sim") //limpeza  - consultorio / workshop / palestra
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/spray.svg\"> <br> Serviço de limpeza e conservação</h5></div>";
                        }
                        if("<?php if($anuncio->copa !='sim'){echo 'nao';}else{echo "$anuncio->copa";}?>" == "sim") //copa  - consultorio/ workshop / palestra
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/restaurant.svg\"> <br> Serviço de copa</h5></div>";
                        }
                        //mobilia  - consultorio
                        if("<?php if($anuncio->numMesa < '0'){echo '0';}else{echo "$anuncio->numMesa";}?>" > '0') //mobilia  - consultorio
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/table.svg\"> <br> <span style=\"color: #FFCE00\"><?php echo $anuncio->numMesa ?></span> Mesa(s)</h5></div>";
                        }
                        //mobilia  - consultorio
                        if("<?php if($anuncio->numCadeira < '0'){echo '0';}else{echo "$anuncio->numCadeira";}?>" >'0') //mobilia  - consultorio
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/chair.svg\"> <br> <span style=\"color: #FFCE00\"><?echo $anuncio->numCadeira?></span> Cadeira(s)</h5></div>";
                        }
                        //mobilia  - consultorio
                        if("<?php if($anuncio->numLuminaria <'0'){echo '0';}else{echo "$anuncio->numLuminaria";}?>" >'0') //mobilia  - consultorio
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/lamp.svg\"> <br> <span style=\"color: #FFCE00\"><?echo $anuncio->numLuminaria?></span> Luminária(s)</h5></div>";
                        }
                        //mobilia  - consultorio
                        if("<?php if($anuncio->numMaca <'0'){echo '0';}else{echo "$anuncio->numMaca";}?>" >'0') //mobilia  - consultorio
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/hospital.svg\"> <br> <span style=\"color: #FFCE00\"><?echo $anuncio->numMaca?></span> Maca(s)</h5></div>";
                        }
                        if("<?php if($anuncio->balanca !='sim'){echo 'nao';}else{echo "$anuncio->balanca";}?>" == "sim") //balanca  - consultorio
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/scale.svg\"> <br> Balança</h5></div>";
                        }
                        if("<?php if($anuncio->cafe !='sim'){echo 'nao';}else{echo "$anuncio->cafe";}?>" == "sim") //cafe  - consultorio/ workshop / palestra
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Oferece<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/coffee.svg\"> <br> café</h5></div>";
                        }
                        if("<?php if($anuncio->agua !='sim'){echo 'nao';}else{echo "$anuncio->agua";}?>" == "sim") //água  - consultorio/ workshop / palestra / cozinha
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Oferece<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/water-tank.svg\"> <br> água filtrada</h5></div>";
                        }
                        if("<?php if($anuncio->tv !='sim'){echo 'nao';}else{echo "$anuncio->tv";}?>" == "sim") //tv  - consultorio
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/tv.svg\"> <br> TV na recepção</h5></div>";
                        }
                        //mobilia  - workshop / palestra
                        if("<?php if($anuncio->numMesa <= 0 ){echo '0';}else{echo "$anuncio->numMesa";}?>" > '0') //mobilia  - workshop / palestra
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/table.svg\"> <br> <span style=\"color: #FFCE00\"><?php echo $anuncio->numMesa ?></span> Mesa(s)</h5></div>";
                        }
                        //mobilia  - workshop / palestra
                        if("<?php if($anuncio->numCadeira<= 0){echo '0';}else{echo "$anuncio->numCadeira";}?>" > '0') //mobilia  - workshop / palestra
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/chair.svg\"> <br> <span style=\"color: #FFCE00\"><?echo $anuncio->numCadeira?></span> Cadeira(s)</h5></div>";
                        }
                        //mobilia  - workshop / palestra
                        if("<?php if($anuncio->numQuadro <= 0){echo '0';}else{echo "$anuncio->numQuadro";}?>" > '0') //mobilia  - workshop / palestra
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/quadro.svg\"> <br> <span style=\"color: #FFCE00\"><?echo $anuncio->numQuadro?></span> Quadro(s)</h5></div>";
                        }
                        //mobilia  - workshop / palestra
                        if("<?php if($anuncio->numLousa <= 0){echo '0';}else{echo "$anuncio->numLousa";}?>" > '0') //mobilia  - workshop / palestra
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/vidrojateado.svg\"> <br> <span style=\"color: #FFCE00\"><?echo $anuncio->numLousa?></span> Lousa de vidro jateada(s)</h5></div>";
                        }
                        //mobilia  - workshop / palestra
                        if("<?php if($anuncio->numTelao <= 0){echo '0';}else{echo "$anuncio->numTelao";}?>" > '0') //mobilia  - workshop / palestra
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/telao.svg\"> <br> <span style=\"color: #FFCE00\"><?echo $anuncio->numTelao?></span> Telões</h5></div>";
                        }
                        //mobilia  - workshop / palestra
                        if("<?php if($anuncio->numTv <= 0){echo '0';}else{echo "$anuncio->numTv";}?>" > '0') //mobilia  - workshop / palestra
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/tv.svg\"> <br> <span style=\"color: #FFCE00\"><?echo $anuncio->numTv?></span> TV(s)</h5></div>";
                        }
                        if("<?php if($anuncio->projetor !='sim'){echo 'nao';}else{echo "$anuncio->projetor";}?>" == "sim") //datashow  - workshop / palestra
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/projetor.svg\"> <br> Data Show</h5></div>";
                        }
                        if("<?php if($anuncio->som !='sim'){echo 'nao';}else{echo "$anuncio->som";}?>" == "sim") //Caixa de som  - workshop / palestra
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/sound-system.svg\"> <br> Caixa de som</h5></div>";
                        }
                        if("<?php if($anuncio->computador !='sim'){echo 'nao';}else{echo "$anuncio->computador";}?>" == "sim") //computador  - workshop / palestra
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/computer.svg\"> <br> Computador com Windows e pacote Microsoft Office</h5></div>";
                        }
                        if("<?php if($anuncio->flip !='sim'){echo 'nao';}else{echo "$anuncio->flip";}?>" == "sim") //flipchart  - workshop / palestra
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/whiteboard.svg\"> <br> Flipchart</h5></div>";
                        }
                        if("<?php if($anuncio->buffet !='sim'){echo 'nao';}else{echo "$anuncio->buffet";}?>" == "sim") //buffet  - workshop / palestra
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Oferece<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/garcom.svg\"> <br> Serviço de buffet</h5></div>";
                        }
                        if("<?php if($anuncio->camarim !='sim'){echo 'nao';}else{echo "$anuncio->camarim";}?>" == "sim") //camarim  - aula / ensaio
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/camarim.svg\"> <br> Camarim</h5></div>";
                        }
                        if("<?php if($anuncio->apoio !='sim'){echo 'nao';}else{echo "$anuncio->apoio";}?>" == "sim") //produção  - aula / ensaio
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/support.svg\"> <br> Sala de apoio para produção</h5></div>";
                        }
                        if("<?php if($anuncio->barra !='sim'){echo 'nao';}else{echo "$anuncio->barra";}?>" == "sim") //barra   - aula / ensaio
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/dancer-balance-posture-on-one-leg.svg\"> <br> Barra (para alongamento)</h5></div>";
                        }
                        // ---
                        if("<?php if($anuncio->espelho !='sim'){echo 'nao';}else{echo "$anuncio->espelho";}?>" == "sim") //espelho   - aula / ensaio
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/mirror.svg\"> <br> Espelho</h5></div>";
                        }
                        if("<?php if($anuncio->areaEvento !='sim'){echo 'nao';}else{echo "$anuncio->areaEvento";}?>" == "sim") //evento   - cozinha
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/movie-theater.svg\"> <br> Área para realização de evento</h5></div>";
                        }
                        //mobilia  - cozinha
                        if("<?php if($anuncio->numMesa <= 0 ){echo '0';}else{echo "$anuncio->numMesa";}?>" > '0') //mobilia  - cozinha
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/table.svg\"> <br> <span style=\"color: #FFCE00\"><?php echo "$anuncio->numMesa"?></span> Mesa(s) de jantar</h5></div>";
                        }
                        //mobilia  - cozinha
                        if("<?php if($anuncio->numCadeira <=0 ){echo '0';}else{echo "$anuncio->numCadeira ";}?>" > '0') //mobilia  - cozinha
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/chair.svg\"> <br> <span style=\"color: #FFCE00\"><?php echo "$anuncio->numCadeira "?></span> Cadeira(s)</h5></div>";
                        }
                        if("<?php if($anuncio->bar !='sim'){echo 'nao';}else{echo "$anuncio->bar";}?>" == "sim") //bar   - cozinha
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/beer.svg\"> <br> Espaço de Bar</h5></div>";
                        }
                        if("<?php if($anuncio->buffet !='sim'){echo 'nao';}else{echo "$anuncio->buffet";}?>" == "sim") //buffet   - cozinha
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/catering.svg\"> <br> Espaço de buffet</h5></div>";
                        }
                        if("<?php if($anuncio->buffet!='sim'){echo 'nao';}else{echo "false";}?>" == "sim") //chefe    - cozinha
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/chef.svg\"> <br> Espaço para um chefe dar uma aula de culinária</h5></div>";
                        }
                        if("<?php if($anuncio->faxina !='sim'){echo 'nao';}else{echo "$anuncio->faxina";}?>" == "sim") //faxina   - cozinha
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/brush.svg\"> <br> Faxina incluida</h5></div>";
                        }
                        if("<?php if($anuncio->estante !='sim'){echo 'nao';}else{echo "$anuncio->estante";}?>" == "sim") //seco   - cozinha
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/bookshelf\"> <br> Estante para estoque seco</h5></div>";
                        }
                        if("<?php if($anuncio->freezer !='sim'){echo 'nao';}else{echo "$anuncio->freezer";}?>" == "sim") //freezer   - cozinha
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/minibar.svg\"> <br> Freezer com espaço disponível para compartilhamento</h5></div>";
                        }
                        if("<?php if($anuncio->fogao !='sim'){echo 'nao';}else{echo "$anuncio->fogao";}?>" == "sim") //fogão   - cozinha
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/stove.svg\"> <br> Fogão</h5></div>";
                        }
                        if("<?php if($anuncio->forno !='sim'){echo 'nao';}else{echo "$anuncio->forno";}?>" == "sim") //forno   - cozinha
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/oven.svg\"> <br> Forno (printar tipo)</h5></div>";
                        }
                        if("<?php if($anuncio->altura <= 0){echo '0';}else{echo "$anuncio->altura";}?>" >'0') //pe   - fotografico \ produtora
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Altura de<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/measuring-tape-rolled.svg\"> <br> <span style=\"color: #FFCE00\"><?php echo "$anuncio->altura" ?></span> m do pé direito</h5></div>";
                        }
                        if("<?php if($anuncio->cozinha !='sim'){echo 'nao';}else{echo "$anuncio->cozinha";}?>" == "sim") //cozinha - fotografico \ produtora
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/kitchen.svg\"> <br> Cozinha</h5></div>";
                        }
                        //mobilia  - fotografico \ produtora
                        if("<?php if($anuncio->numBanheiro <= 0){echo '0';}else{echo "$anuncio->numBanheiro";}?>" > '0') //mobilia  - fotografico \ produtora
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/wc.svg\"> <br> <span style=\"color: #FFCE00\"><?php echo "$anuncio->numBanheiro"?></span> Banheiro(s)</h5></div>";
                        }
                        //mobilia  - fotografico \ produtora
                        if("<?php if($anuncio->chuveiro <= 0){echo 'nao';}else{echo "$anuncio->chuveiro ";}?>"  > '0') //mobilia  - fotografico \ produtora
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/shower.svg\"> <br> <span style=\"color: #FFCE00\"><?php echo "$anuncio->chuveiro" ?></span> Chuveiro(s)</h5></div>";
                        }
                        if("<?php if($anuncio->camarim !='sim'){echo 'nao';}else{echo "$anuncio->camarim";}?>"== "sim") //Camarim - fotografico \ produtora
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/camarim.svg\"> <br> Camarim</h5></div>";
                        }
                        if("<?php if($anuncio->frigobar !='sim'){echo 'nao';}else{echo "$anuncio->frigobar";}?>" == "sim") //Frigobar - fotografico \ produtora
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/minibar.svg\"> <br> Frigobar</h5></div>";
                        }
                        if("<?php if($anuncio->fundo !='sim'){echo 'nao';}else{echo "$anuncio->fundo";}?>" == "sim") //fundo  - fotografico \ produtora
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/panorama.svg\"> <br> Fundo Infinito</h5></div>";
                        }
                        //--
                        if("<?php if($anuncio->chroma !='sim'){echo 'nao';}else{echo "$anuncio->chroma";}?>" == "sim") //Chroma   - fotografico \ produtora
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/camera.svg\"> <br> Chroma key</h5></div>";
                        }
                        if("<?php if($anuncio->recepcao !='sim'){echo 'nao';}else{echo "$anuncio->recepcao";}?>" == "sim") //recepção    - costura
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/secretaria.svg\"> <br> Recepção e atendimento</h5></div>";
                        }
                        if("<?php if($anuncio->provador !='sim'){echo 'nao';}else{echo "$anuncio->provador";}?>" == "sim") //provador    - costura
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/mirror (1).svg\"> <br> Provador</h5></div>";
                        }
                        if("<?php if($anuncio->tatame !='sim'){echo 'nao';}else{echo "$anuncio->tatame";}?>" == "sim") //tatame - academia
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/mat.svg\"> <br> Tatame</h5></div>";
                        }
                        //--
                        if("<?php if($anuncio->bosu !='sim'){echo 'nao';}else{echo "$anuncio->bosu";}?>" == "sim") //Bosu - academia
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/bosu-ball.svg\"> <br> Bosu</h5></div>";
                        }
                        if("<?php if($anuncio->rolo !='sim'){echo 'nao';}else{echo "$anuncio->rolo";}?>" == "sim") //Rolo - academia
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/rolling-pin.svg\"> <br> Rolo</h5></div>";
                        }
                        if("<?php if($anuncio->maca !='sim'){echo 'nao';}else{echo "$anuncio->maca";}?>" == "sim") //Maca - academia
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/hospital.svg\"> <br> Maca</h5></div>";
                        }
                        if("<?php if($anuncio->trapezio !='sim'){echo 'nao';}else{echo "$anuncio->trapezio";}?>" == "sim") //Trapézio - academia
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/rings.svg\"> <br> Trapézio</h5></div>";
                        }
                        if("<?php if($anuncio->baqueta !='sim'){echo 'nao';}else{echo "$anuncio->baqueta";}?>" == "sim") //Baqueta - academia
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/bench.svg\"> <br> Baqueta</h5></div>";
                        }
                        // --
                        if("<?php if($anuncio->bosu !='sim'){echo 'nao';}else{echo "$anuncio->bosu";}?>" == "sim") //bola de pilates - academia
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/physio-balls.svg\"> <br> Bola de pilates</h5></div>";
                        }
                        if("<?php if($anuncio->forno !='sim'){echo 'nao';}else{echo "$anuncio->forno";}?>" == "sim") //forno - artes
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/oven.svg\"> <br> Forno para cerâmica</h5></div>";
                        }
                        if("<?php if($anuncio->macarico !='sim'){echo 'nao';}else{echo "$anuncio->macarico";}?>" == "sim") //maçarico  - artes
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/mat.svg\"> <br> Maçarico  para cerâmica</h5></div>";
                        }
                        if("<?php if($anuncio->moldes !='sim'){echo 'nao';}else{echo "$anuncio->moldes";}?>" == "sim") //formas   - artes
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/torch.svg\"> <br> Formas e moldes para cerâmica</h5></div>";
                        }
                        if("<?php if($anuncio->bancada !='sim'){echo 'nao';}else{echo "$anuncio->bancada";}?>" == "sim") //bancada   - artes
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/table.svg\"> <br> Bancada</h5></div>";
                        }
                        if("<?php if($anuncio->armario !='sim'){echo 'nao';}else{echo "$anuncio->armario";}?>" == "sim") //armario   - artes
                        {
                          str = str + "<div class=\"col py-1\"><h6 style=\"color: black; font-weight: 600;font-size:90%\">Possui<br></h6><h5 style=\"color: grey;font-size:90%;font-weight: 600;\"><img height=\"23px\" src=\"img/icones/bookshelf.svg\"> <br> Armário para armazenagem de equipamentos</h5></div>";
                        }
                        // <div class="col py-1">
                        //   <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                        //   <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-rss"></i> <br> </h5>
                        // </div>
                        document.getElementById('comodidades-local').innerHTML = str;
                      }
                    </script>
                    <div id="comodidades-local" class="row text-center justify-content-center" style="font-size: 14px">
                      <?php $cont = 0; ?>

                      <!-- vou pensar um Modo melhor de printar os números -->

                      <!-- <?php if($arrayEspecifico[$cont++] == "sim"){ ?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-rss"></i> <br> </h5>
                        </div>

                      <?php } ?>

                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>
                      <?php } ?>

                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-rss"></i> <br> Wi-Fi no local</h5>
                        </div>
                      <?php } ?>


                      <?php if($arrayEspecifico[$cont++] == "sim"){?>

                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?>

                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-rss"></i> <br> Wi-Fi no local</h5>
                        </div>
                      <?php } ?>

                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>
                      <?php } ?>


                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-rss"></i> <br> Wi-Fi no local</h5>
                        </div>
                      <?php } ?>


                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?>

                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?>

                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?>

                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?>

                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?>


                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?>

                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?>


                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?>


                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?>

                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?>

                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?>

                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?>

                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?>

                      <?php if($arrayEspecifico[$cont++] == "sim"){?>
                        <div class="col py-1">
                          <h6 style="color: black; font-weight: 600;font-size:90%">Possui<br></h6>
                          <h5 style="color: grey;font-size:90%;font-weight: 600;"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                        </div>

                      <?php } ?> -->

                    </div>
                  </div>
                  <!-- <div class="col-12" style="border-bottom: solid; border-width: 2px; border-color: #FFC107;">
                  <h2><?php $cont = 4 ; echo $array[$cont]?> </h2>
                  <h6 style="color: grey"><?php $cont++; $cont++; echo $array[$cont]?> | <?php $cont++; $cont++; echo $array[$cont]?></h6>
                </div> -->
              </div>
            </div>
          </div>

          <?php


          $arrayUser = $db->getInfoUserProprietario($conn,$_GET['id']);  ?>

          <div class="row" style="background-color: black; border-bottom: solid; border-width: 2px; border-color: #FFC107; border-top: solid; border-width: 2px; border-color: #FFC107;">
            <div class="col-lg-6 col-md-6 col-sm-12 text-center justify-content-center" >
              <div class="col-12">

                <div class="row">
                  <div class="col-12 mt-2">
                    <div class="row text-center justify-content-center">
                      <span style="color: white; font-size: 35px; font-weight: 300"> <b>Localização:</b> </span>
                      <div class="my-4" id="map" style="height: 50vh; width: 100%"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 text-center justify-content-center">
              <div class="row">
                <div class="col-12" style="padding-bottom: 2vw">
                  <p style="margin-top: 1vw; margin-bottom: 1vw">
                    <h4 style="color:white">A partir de:</h4>
                    <h1 style="color:#FFCE00;font-weight: 600">R$ <?php  echo $array[7] ;  ?></h1>
                    <h6 style="color:grey">E as taxas já estão inclusas!</h6>
                    <br>
                    <button style="font-weight: 300" type="button" name="button" class="btn btn-outline-warning">Entrar em contato <br class="mobile"> com o anunciante</button>
                    <br>
                    <a href="#alugarEspaco"><button style="font-weight: 300" type="button" name="button" class="btn btn-outline-warning mt-4">Alugue agora!</button></a>
                  </p>
                </div>
                <div class="col-12 pt-2">
                  <a class="align-middle m-3"><img class="rounded-circle" src="<?php echo $prefixo.$arrayUser[1] ?>" style="height: 70px"></a>
                  <br><br>
                </div>
                <div class="col-12 pb-2" style="color: white">
                  <h6 style="font-weight: 600"><?php echo $arrayUser[0] ?></h6>
                  <br>
                  <!-- <h6 style="font-weight: 300; font-size: 150%; color: #FFCE00" >&#9733;&#9733;&#9733;&#9733;&#9733; <span style="color: grey; font-size: 15px"> -4.7 <br>(3 avaliações)</span></h6> -->
                </div>

              </div>
            </div>

          </div>

          <div class="row" style="border-bottom: solid; border-width: 2px; border-color: #FFC107;">

<?php if($arrayGeral[9] == '' || $arrayGeral[10] == '' || $arrayGeral[9] == null || $arrayGeral[10] == null ){ ?>

            <!-- //Printar divisão inteira-->
            <div class="col-lg-12 col-md-12 col-sm-12 text-center justify-content-center" style="display:NONE">
              <br>
              <h2> <b>Foto(s) Panorâmica(s):</b> </h2>
              <div class="row p-5">
                <div class="col-lg-6 col-md-12">
                  <div class="panorama">
                    <img src="<?php echo $prefixo.$arrayGeral[9] ?>" alt="" title="" />
                  </div>
                </div>
                <div class="col-lg-6 col-md-12">
                  <div class="panorama">
                    <img src="<?php echo $prefixo.$arrayGeral[10] ?>" alt="" title="" />
                  </div>
                </div>
              </div>
            </div>
<?php }else{  ?>

            <div class="col-lg-12 col-md-12 col-sm-12 text-center justify-content-center" style="display:">
              <br>
              <h2> <b>Foto(s) Panorâmica(s):</b> </h2>
              <div class="row p-5">
                <div class="col-lg-6 col-md-12">
                  <div class="panorama">
                    <img src="<?php echo $prefixo.$arrayGeral[9] ?>" alt="" title="" />
                  </div>
                </div>
                <div class="col-lg-6 col-md-12">
                  <div class="panorama">
                    <img src="<?php echo $prefixo.$arrayGeral[10] ?>" alt="" title="" />
                  </div>
                </div>
              </div>
            </div>

<?php } ?>



            <div class="col-lg-12 col-md-12 col-sm-12 text-center justify-content-center">
              <div class="row text-center justify-content-center py-3">
                <div class="col-lg-10 col-md-10 col-sm-12 text-center justify-content-center">
                  <!-- <div id="map" style="height: 50vh; width: 100%"></div>                     -->
                  <script>
                  var citymap;
                  var geocoder;
                  function initMap() {
                    // Create the map.
                    var map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 15,
                      // center: {lat: -22.91270, lng: -43.22616},
                      mapTypeId: 'hybrid'
                    });
                    geocoder = new google.maps.Geocoder();
                    geocodeAddress(geocoder, map);
                  }

                  function geocodeAddress(geocoder, resultsMap) {
                    // Rio de janeiro,RJ,Avenida frei caneca, 461, estácio
                    geocoder.geocode({'address': "<?php echo ( $array[6].",".$array[8].",".$array[10].",".$array[11].",".$array[5]);?>"}, function(results, status) {
                      if (status === 'OK') {
                        resultsMap.setCenter(results[0].geometry.location);
                        citymap = {
                          marcador: {
                            // center: {lat: results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()},
                            center: {lat: results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()},
                            multi: 10
                          }
                        };
                        var cityCircle = new google.maps.Circle({
                          strokeColor: '#FFC307',
                          strokeOpacity: 0.8,
                          strokeWeight: 2,
                          fillColor: '#FFC107',
                          fillOpacity: 0.35,
                          map: resultsMap,
                          center: citymap.marcador.center,
                          radius: Math.sqrt(citymap.marcador.multi) * 100
                        });
                      } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                      }
                    });
                  }

                  </script>
                  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDifilitpDCI1EoqZXV8QMnv3F27ui_7S8&callback=initMap">
                  </script>
                </div>
              </div>
            </div>

          </div>

          <!-- <div class="row" style="border-bottom: solid; border-width: 2px; border-color: #FFC107;">
          <div class="col-lg-12 col-md-12 col-sm-12 text-center justify-content-center">
          <div class="row">
          <div class="col-12 py-3 px-5">
          <h3><b>Avaliações</b></h3>
        </div>
        <div class="col-12 p-5">

        <div class="row py-1" style="border-bottom: solid; border-width: 2px; border-color: grey; border-top: solid; border-width: 2px; border-color: rgba(0,0,0,0.1);">
        <div class="col-3">
        <a class="align-middle m-3"><img class="rounded-circle" src="img/usuario.jpg" style="height: 50px"></a>
        <br>
        <span style="font-size: 13px">Nome do usuário</span>
        <br>
        <span style="font-size: 11px">Rio de Janeiro <br> RJ</span>
      </div>
      <div class="col-9 p-4 text-left">
      <span style="font-size: 13px">Nome do item</span>
      <span class="pl-2" style="font-weight: 300; font-size: 100%; color: #FFCE00" >&#9733;&#9733;&#9733;&#9733;&#9733;</span>
      <br>
      <span style="font-size: 12px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque tristique ullamcorper. Proin libero urna.</span>
      <br>
      <span style="font-size: 12px; color: grey">26/03/2018</span>
    </div>
  </div>
  <br>
  <div class="row py-1" style="border-bottom: solid; border-width: 2px; border-color: grey; border-top: solid; border-width: 2px; border-color: rgba(0,0,0,0.1);">
  <div class="col-3">
  <a class="align-middle m-3"><img class="rounded-circle" src="img/usuario.jpg" style="height: 50px"></a>
  <br>
  <span style="font-size: 13px">Nome do usuário</span>
  <br>
  <span style="font-size: 11px">Rio de Janeiro <br> RJ</span>
</div>
<div class="col-9 p-4 text-left">
<span style="font-size: 13px">Nome do item</span>
<span class="pl-2" style="font-weight: 300; font-size: 100%; color: #FFCE00" >&#9733;&#9733;&#9733;&#9733;&#9733;</span>
<br>
<span style="font-size: 12px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque tristique ullamcorper. Proin libero urna.</span>
<br>
<span style="font-size: 12px; color: grey">26/03/2018</span>
</div>
</div>

</div>
</div>
</div>
</div>      Retirado até segunda parte -->

<div class="row" id="alugarEspaco" style="background-color: black">

  <div class="col-lg-12 col-md-12 col-sm-12 text-center justify-content-center">
    <div class="row justify-content-center">

      <div class="col-12 mt-4">
        <div class="row px-5 pb-5 text-center justify-content-center">
          <div class="col-lg-4 col-md-10 col-sm-12 text-center py-2">
            <button id="botao-unico" onclick="calUnico()" style="font-weight: 300" type="button" name="button" class="btn btn-outline-warning active">Aluguel Único</button>
            <br><br>
            <span style="color: grey" class="ml-3" data-toggle="modal" data-target="#saibaMaisUnico">Clique aqui e saiba mais</span>
          </div>
          <div class="col-lg-4 col-md-10 col-sm-12 text-center py-2">
            <button id="botao-reincidente" onclick="calReincidente()" style="font-weight: 300" type="button" name="button" class="btn btn-outline-warning">Aluguel Reincidente</button>
            <br><br>
            <span style="color: grey" class="ml-3" data-toggle="modal" data-target="#saibaMaisReincidente">Clique aqui e saiba mais</span>
          </div>
          <div class="col-lg-4 col-md-10 col-sm-12 text-center py-2">
            <button id="botao-direto" onclick="calDireto()" style="font-weight: 300" type="button" name="button" class="btn btn-outline-warning">Aluguel Direto</button>
            <br><br>
            <span style="color: grey" class="ml-3" data-toggle="modal" data-target="#saibaMaisDireto">Clique aqui e saiba mais</span>
          </div>
          <input style="display: none" type="text" name="tipoAluguel" value="unico" id="tipoAluguel">
        </div>
      </div>
      <div class="col-12 px-5 text-center justify-content-center" style="background-color: black">
        <div class="row my-5 text-center justify-content-center">
          <div class="col-12 text-center justify-content-center">

            <script>
            function calUnico()
            {
              document.getElementById("calendario-unico").style.display = "";
              document.getElementById("calendario-direto").style.display = "none";
              document.getElementById("calendario-reincidente").style.display = "none";
              document.getElementById("tipoAluguel").value = "unico";
              document.getElementById("botao-unico").classList.add("active");
              document.getElementById("botao-direto").classList.remove("active");
              document.getElementById("botao-reincidente").classList.remove("active");
            }
            function calDireto()
            {
              document.getElementById("calendario-unico").style.display = "none";
              document.getElementById("calendario-direto").style.display = "";
              document.getElementById("calendario-reincidente").style.display = "none";
              document.getElementById("tipoAluguel").value = "direto";
              document.getElementById("botao-unico").classList.remove("active");
              document.getElementById("botao-direto").classList.add("active");
              document.getElementById("botao-reincidente").classList.remove("active");
            }
            function calReincidente()
            {
              document.getElementById("calendario-unico").style.display = "none";
              document.getElementById("calendario-direto").style.display = "none";
              document.getElementById("calendario-reincidente").style.display = "";
              document.getElementById("tipoAluguel").value = "reincidente";
              document.getElementById("botao-unico").classList.remove("active");
              document.getElementById("botao-direto").classList.remove("active");
              document.getElementById("botao-reincidente").classList.add("active");
            }
            </script>

            <div id="calendario-unico" style="display: ; background-color: black" class="p-3 input-group date col-12 text-center justify-content-center">
              <div class="row">
                <div class="col-12">
                  <h6 style="color: white">Selecione a data e o horário em que será alugado</h6>
                  <br>
                  <script>
                  function horaDisp()
                  {
                    if (document.getElementById('datepicker').value != "")
                    {
                      var from = document.getElementById('datepicker').value.split("/");
                      var d = new Date(from[2], from[1] - 1, from[0]);
                      document.getElementById('horas-disponiveis').style.display = "";
                      document.getElementById('data-escolhida').innerHTML = document.getElementById('datepicker').value;
                      if(d.getDay() == "0") //domingo
                      {
                        if(dom_min_m == 0)
                        {
                          document.getElementById('hora-inicio-texto').innerHTML = dom_min_h+":00";
                        }
                        else
                        {
                          document.getElementById('hora-inicio-texto').innerHTML = dom_min_h+":"+dom_min_m;
                        }
                        if(dom_max_m == 0)
                        {
                          document.getElementById('hora-fim-texto').innerHTML = dom_max_h+":00";
                        }
                        else
                        {
                          document.getElementById('hora-fim-texto').innerHTML = dom_max_h+":"+dom_max_m;
                        }
                        var temAlugado = false;
                        if(temAlugado == true)
                        {
                          document.getElementById('horas-alugadas').style.display = "";
                          document.getElementById('horas-alugadas').innerHTML = "Sendo que o horário entre";
                          document.getElementById('horas-alugadas').innerHTML = document.getElementById('horas-alugadas').innerHTML + "<span style=\"color: #FFCE00\">00:00</span> e <span style=\"color: #FFCE00\">00:00</span>";
                          document.getElementById('horas-alugadas').innerHTML = document.getElementById('horas-alugadas').innerHTML + "já está alugado.";

                        }
                      }
                      if(d.getDay() == "1") //seg
                      {
                        if(seg_min_m == 0)
                        {
                          document.getElementById('hora-inicio-texto').innerHTML = seg_min_h+":00";
                        }
                        else
                        {
                          document.getElementById('hora-inicio-texto').innerHTML = seg_min_h+":"+seg_min_m;
                        }
                        if(seg_max_m == 0)
                        {
                          document.getElementById('hora-fim-texto').innerHTML = seg_max_h+":00";
                        }
                        else
                        {
                          document.getElementById('hora-fim-texto').innerHTML = seg_max_h+":"+seg_max_m;
                        }
                        var temAlugado = false;
                        if(temAlugado == true)
                        {
                          document.getElementById('horas-alugadas').style.display = "";
                          document.getElementById('horas-alugadas').innerHTML = "Sendo que o horário entre ";
                          document.getElementById('horas-alugadas').innerHTML = document.getElementById('horas-alugadas').innerHTML + "<span style=\"color: #FFCE00\">(00:00</span> e <span style=\"color: #FFCE00\">00:00)</span>";
                          document.getElementById('horas-alugadas').innerHTML = document.getElementById('horas-alugadas').innerHTML + " já está alugado.";

                        }
                      }
                      if(d.getDay() == "2") //ter
                      {
                        if(ter_min_m == 0)
                        {
                          document.getElementById('hora-inicio-texto').innerHTML = ter_min_h+":00";
                        }
                        else
                        {
                          document.getElementById('hora-inicio-texto').innerHTML = ter_min_h+":"+ter_min_m;
                        }
                        if(ter_max_m == 0)
                        {
                          document.getElementById('hora-fim-texto').innerHTML = ter_max_h+":00";
                        }
                        else
                        {
                          document.getElementById('hora-fim-texto').innerHTML = ter_max_h+":"+ter_max_m;
                        }
                        var temAlugado = false;
                        if(temAlugado == true)
                        {
                          document.getElementById('horas-alugadas').style.display = "";
                          document.getElementById('horas-alugadas').innerHTML = "Sendo que o horário entre ";
                          document.getElementById('horas-alugadas').innerHTML = document.getElementById('horas-alugadas').innerHTML + "<span style=\"color: #FFCE00\">(00:00</span> e <span style=\"color: #FFCE00\">00:00)</span>";
                          document.getElementById('horas-alugadas').innerHTML = document.getElementById('horas-alugadas').innerHTML + " já está alugado.";

                        }
                      }
                      if(d.getDay() == "3") //qua
                      {
                        if(qua_min_m == 0)
                        {
                          document.getElementById('hora-inicio-texto').innerHTML = qua_min_h+":00";
                        }
                        else
                        {
                          document.getElementById('hora-inicio-texto').innerHTML = qua_min_h+":"+qua_min_m;
                        }
                        if(qua_max_m == 0)
                        {
                          document.getElementById('hora-fim-texto').innerHTML = qua_max_h+":00";
                        }
                        else
                        {
                          document.getElementById('hora-fim-texto').innerHTML = qua_max_h+":"+qua_max_m;
                        }
                        var temAlugado = false;
                        if(temAlugado == true)
                        {
                          document.getElementById('horas-alugadas').style.display = "";
                          document.getElementById('horas-alugadas').innerHTML = "Sendo que o horário entre ";
                          document.getElementById('horas-alugadas').innerHTML = document.getElementById('horas-alugadas').innerHTML + "<span style=\"color: #FFCE00\">(00:00</span> e <span style=\"color: #FFCE00\">00:00)</span>";
                          document.getElementById('horas-alugadas').innerHTML = document.getElementById('horas-alugadas').innerHTML + " já está alugado.";

                        }
                      }
                      if(d.getDay() == "4") //qui
                      {
                        if(qui_min_m == 0)
                        {
                          document.getElementById('hora-inicio-texto').innerHTML = qui_min_h+":00";
                        }
                        else
                        {
                          document.getElementById('hora-inicio-texto').innerHTML = qui_min_h+":"+qui_min_m;
                        }
                        if(qui_max_m == 0)
                        {
                          document.getElementById('hora-fim-texto').innerHTML = qui_max_h+":00";
                        }
                        else
                        {
                          document.getElementById('hora-fim-texto').innerHTML = qui_max_h+":"+qui_max_m;
                        }
                        var temAlugado = false;
                        if(temAlugado == true)
                        {
                          document.getElementById('horas-alugadas').style.display = "";
                          document.getElementById('horas-alugadas').innerHTML = "Sendo que o horário entre ";
                          document.getElementById('horas-alugadas').innerHTML = document.getElementById('horas-alugadas').innerHTML + "<span style=\"color: #FFCE00\">(00:00</span> e <span style=\"color: #FFCE00\">00:00)</span>";
                          document.getElementById('horas-alugadas').innerHTML = document.getElementById('horas-alugadas').innerHTML + " já está alugado.";

                        }
                      }
                      if(d.getDay() == "5") //sex
                      {
                        if(sex_min_m == 0)
                        {
                          document.getElementById('hora-inicio-texto').innerHTML = sex_min_h+":00";
                        }
                        else
                        {
                          document.getElementById('hora-inicio-texto').innerHTML = sex_min_h+":"+sex_min_m;
                        }
                        if(sex_max_m == 0)
                        {
                          document.getElementById('hora-fim-texto').innerHTML = sex_max_h+":00";
                        }
                        else
                        {
                          document.getElementById('hora-fim-texto').innerHTML = sex_max_h+":"+sex_max_m;
                        }
                        var temAlugado = false;
                        if(temAlugado == true)
                        {
                          document.getElementById('horas-alugadas').style.display = "";
                          document.getElementById('horas-alugadas').innerHTML = "Sendo que o horário entre ";
                          document.getElementById('horas-alugadas').innerHTML = document.getElementById('horas-alugadas').innerHTML + "<span style=\"color: #FFCE00\">(00:00</span> e <span style=\"color: #FFCE00\">00:00)</span>";
                          document.getElementById('horas-alugadas').innerHTML = document.getElementById('horas-alugadas').innerHTML + " já está alugado.";

                        }
                      }
                      if(d.getDay() == "6") //sab
                      {
                        if(sab_min_m == 0)
                        {
                          document.getElementById('hora-inicio-texto').innerHTML = sab_min_h+":00";
                        }
                        else
                        {
                          document.getElementById('hora-inicio-texto').innerHTML = sab_min_h+":"+sab_min_m;
                        }
                        if(sab_max_m == 0)
                        {
                          document.getElementById('hora-fim-texto').innerHTML = sab_max_h+":00";
                        }
                        else
                        {
                          document.getElementById('hora-fim-texto').innerHTML = sab_max_h+":"+sab_max_m;
                        }
                        var temAlugado = false;
                        if(temAlugado == true)
                        {
                          document.getElementById('horas-alugadas').style.display = "";
                          document.getElementById('horas-alugadas').innerHTML = "Sendo que o horário entre ";
                          document.getElementById('horas-alugadas').innerHTML = document.getElementById('horas-alugadas').innerHTML + "<span style=\"color: #FFCE00\">(00:00</span> e <span style=\"color: #FFCE00\">00:00)</span>";
                          document.getElementById('horas-alugadas').innerHTML = document.getElementById('horas-alugadas').innerHTML + " já está alugado.";

                        }
                      }
                    }
                  }
                  </script>
                  <input type="text" readonly name="data-unico-pick" id="datepicker" onchange="horaDisp()" >
                  <br>
                  <h3><i style="color: #FFC107" class="mt-3 far fa-calendar-alt"></i></h3>
                  <span id="horas-disponiveis" style="color: white; display: none">No dia <span id="data-escolhida" style="color: #FFCE00">00/00/2018</span> o horário disponível é de <span id="hora-inicio-texto" style="color: #FFCE00">00:00</span> até <span id="hora-fim-texto" style="color: #FFCE00">00:00</span>.<br></span>
                  <span id="horas-alugadas" style="color: white; display: none">Sendo que o horário entre <span style="color: #FFCE00">00:00</span> e <span style="color: #FFCE00">00:00</span>, <span style="color: #FFCE00">00:00</span> e <span style="color: #FFCE00">00:00</span> já está alugado.</span>
                  <br><br>
                  <div id="hora-caixa-unico" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107;">
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <h6>Hora de início do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="hora-inicio-unico" type="text" name="hora-inicio-unico" class="form-control" style="text-align: center" readonly value="12:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="hora_inicio_aluguel_mais();calcularPreco();horaUnicoMax()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="hora_inicio_aluguel_menos();calcularPreco();horaUnicoMax()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                    <script>
                    function calcularPreco()
                    {
                      var precoTotal = 0;
                      if(document.getElementById('tipoAluguel').value == "unico")
                      {
                        var hora_inicio = document.getElementById('hora-inicio-unico').value;
                        var hora_inicio_s = hora_inicio.split(":");
                        var hora_inicio_h = hora_inicio_s[0];
                        var hora_inicio_m = hora_inicio_s[1];

                        var hora_fim = document.getElementById('hora-fim-unico').value;
                        var hora_fim_s = hora_fim.split(":");
                        var hora_fim_h = hora_fim_s[0];
                        var hora_fim_m = hora_fim_s[1];

                        var hora_aluguel_h = hora_fim_h-hora_inicio_h;
                        var hora_aluguel_m = hora_fim_m-hora_inicio_m;
                        if(hora_aluguel_m == -30)
                        {
                          hora_aluguel_h = hora_aluguel_h - 1;
                          hora_aluguel_m = 30;
                        }
                        if(hora_aluguel_m == 0)
                        {
                          hora_aluguel_m = "00";
                        }
                        console.log(hora_aluguel_h+":"+hora_aluguel_m);
                        if(hora_aluguel_h < 4)
                        {
                          console.log("Menor que 4 horas");
                          precoTotal = hora_aluguel_h * ph;
                          if(hora_aluguel_m == 30)
                          {
                            precoTotal = precoTotal + ph/2;
                          }
                        }
                        if(hora_aluguel_h < 5 && hora_aluguel_h >= 4)
                        {
                          console.log("4 horas");
                          precoTotal = hora_aluguel_h * ph4;
                          if(hora_aluguel_m == 30)
                          {
                            precoTotal = precoTotal + ph4/2;
                          }
                        }
                        if(hora_aluguel_h < 6 && hora_aluguel_h >= 5)
                        {
                          console.log("5 horas");
                          precoTotal = hora_aluguel_h * ph5;
                          if(hora_aluguel_m == 30)
                          {
                            precoTotal = precoTotal + ph5/2;
                          }
                        }
                        if(hora_aluguel_h >= 6)
                        {
                          console.log("Dia inteiro");
                          precoTotal = hora_aluguel_h * pr;
                          if(hora_aluguel_m == 30)
                          {
                            precoTotal = precoTotal + pr/2;
                          }
                        }
                        console.log("Preço Total: R$" + precoTotal);
                        document.getElementById('preco-total').innerHTML = "R$ "+precoTotal;
                      }
                      if(document.getElementById('tipoAluguel').value == "reincidente")
                      {

                      }
                    }
                    </script>
                    <script>
                    var hora_inicio_unico = 12;
                    var hora_fim_unico = 18;
                    var min_inicio_unico = 00;
                    var min_fim_unico = 00;
                    var hora_inicio_unico_id = document.getElementById("hora-inicio-unico");
                    var hora_fim_unico_id = document.getElementById("hora-fim-unico");
                    function hora_fim_aluguel_menos()
                    {
                      min_fim_unico = min_fim_unico - 30;
                      if(min_fim_unico < 0)
                      {
                        min_fim_unico = 30;
                        hora_fim_unico = hora_fim_unico - 1;
                        if(hora_fim_unico<=0)
                        {
                          hora_fim_unico = 23;
                          min_fim_unico = 30;
                        }
                      }
                      if(hora_inicio_unico<=0)
                      {
                        hora_inicio_unico = 23;
                        min_fim_unico = 30;
                      }
                      if((hora_inicio_unico == hora_fim_unico))
                      {
                        hora_inicio_unico = hora_inicio_unico - 1;
                        if(hora_fim_unico<=0)
                        {
                          hora_inicio_unico = 23;
                          min_fim_unico = 00;
                        }
                      }
                      if(hora_inicio_unico <= 9)
                      {
                        if(min_inicio_unico == 0)
                        {
                          hora_inicio_unico_id.value = "0"+hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          hora_inicio_unico_id.value = "0"+hora_inicio_unico+":"+min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(min_inicio_unico == 0)
                        {
                          hora_inicio_unico_id.value = hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          hora_inicio_unico_id.value = hora_inicio_unico+":"+min_inicio_unico;
                        }
                      }
                      if(hora_fim_unico <= 9)
                      {
                        if(min_fim_unico == 0)
                        {
                          document.getElementById("hora-fim-unico").value = "0"+hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("hora-fim-unico").value = "0"+hora_fim_unico+":"+min_fim_unico;
                        }
                      }
                      else
                      {
                        if(min_fim_unico == 0)
                        {
                          document.getElementById("hora-fim-unico").value = hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("hora-fim-unico").value = hora_fim_unico+":"+min_fim_unico;
                        }
                      }
                    }
                    function hora_fim_aluguel_mais()
                    {
                      min_fim_unico = min_fim_unico + 30;
                      if(min_fim_unico >= 60)
                      {
                        min_fim_unico = 00;
                        hora_fim_unico = hora_fim_unico + 1;
                        if(hora_fim_unico>=24)
                        {
                          hora_fim_unico = 00;
                        }
                      }
                      if(hora_inicio_unico>=24)
                      {
                        hora_inicio_unico = 00;
                      }
                      if((hora_fim_unico == hora_inicio_unico))
                      {
                        hora_inicio_unico = hora_inicio_unico + 1;
                      }
                      if(hora_inicio_unico <= 9)
                      {
                        if(min_inicio_unico == 0)
                        {
                          hora_inicio_unico_id.value = "0"+hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          hora_inicio_unico_id.value = "0"+hora_inicio_unico+":"+min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(min_inicio_unico == 0)
                        {
                          hora_inicio_unico_id.value = hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          hora_inicio_unico_id.value = hora_inicio_unico+":"+min_inicio_unico;
                        }
                      }
                      if(hora_fim_unico <= 9)
                      {
                        if(min_fim_unico == 0)
                        {
                          document.getElementById("hora-fim-unico").value = "0"+hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("hora-fim-unico").value = "0"+hora_fim_unico+":"+min_fim_unico;
                        }
                      }
                      else
                      {
                        if(min_fim_unico == 0)
                        {
                          document.getElementById("hora-fim-unico").value = hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("hora-fim-unico").value = hora_fim_unico+":"+min_fim_unico;
                        }
                      }
                    }
                    function hora_inicio_aluguel_menos()
                    {
                      min_inicio_unico = min_inicio_unico - 30;
                      if(min_inicio_unico < 0)
                      {
                        min_inicio_unico = 30;
                        hora_inicio_unico = hora_inicio_unico - 1;
                        if(hora_inicio_unico<=0)
                        {
                          hora_inicio_unico = 23;
                          min_inicio_unico = 30;
                        }
                      }
                      if(hora_fim_unico<=0)
                      {
                        hora_fim_unico = 23;
                        min_inicio_unico = 30;
                      }
                      if((hora_inicio_unico == hora_fim_unico))
                      {
                        hora_fim_unico = hora_fim_unico - 1;
                        if(hora_fim_unico<=0)
                        {
                          hora_fim_unico = 23;
                          min_inicio_unico = 00;
                        }
                      }
                      if(hora_inicio_unico <= 9)
                      {
                        if(min_inicio_unico == 0)
                        {
                          hora_inicio_unico_id.value = "0"+hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          hora_inicio_unico_id.value = "0"+hora_inicio_unico+":"+min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(min_inicio_unico == 0)
                        {
                          hora_inicio_unico_id.value = hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          hora_inicio_unico_id.value = hora_inicio_unico+":"+min_inicio_unico;
                        }
                      }
                      if(hora_fim_unico <= 9)
                      {
                        if(min_fim_unico == 0)
                        {
                          document.getElementById("hora-fim-unico").value = "0"+hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("hora-fim-unico").value = "0"+hora_fim_unico+":"+min_fim_unico;
                        }
                      }
                      else
                      {
                        if(min_fim_unico == 0)
                        {
                          document.getElementById("hora-fim-unico").value = hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("hora-fim-unico").value = hora_fim_unico+":"+min_fim_unico;
                        }
                      }
                    }
                    function hora_inicio_aluguel_mais()
                    {
                      min_inicio_unico = min_inicio_unico + 30;
                      if(min_inicio_unico >= 60)
                      {
                        min_inicio_unico = 00;
                        hora_inicio_unico = hora_inicio_unico + 1;
                        if(hora_inicio_unico>=24)
                        {
                          hora_inicio_unico = 00;
                        }
                      }
                      if(hora_fim_unico>=24)
                      {
                        hora_fim_unico = 00;
                      }
                      if((hora_inicio_unico == hora_fim_unico))
                      {
                        hora_fim_unico = hora_fim_unico + 1;
                      }
                      if(hora_inicio_unico <= 9)
                      {
                        if(min_inicio_unico == 0)
                        {
                          hora_inicio_unico_id.value = "0"+hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          hora_inicio_unico_id.value = "0"+hora_inicio_unico+":"+min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(min_inicio_unico == 0)
                        {
                          hora_inicio_unico_id.value = hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          hora_inicio_unico_id.value = hora_inicio_unico+":"+min_inicio_unico;
                        }
                      }
                      if(hora_fim_unico <= 9)
                      {
                        if(min_fim_unico == 0)
                        {
                          document.getElementById("hora-fim-unico").value = "0"+hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("hora-fim-unico").value = "0"+hora_fim_unico+":"+min_fim_unico;
                        }
                      }
                      else
                      {
                        if(min_fim_unico == 0)
                        {
                          document.getElementById("hora-fim-unico").value = hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("hora-fim-unico").value = hora_fim_unico+":"+min_fim_unico;
                        }
                      }
                      console.log(hora_inicio_unico+":"+min_inicio_unico);
                      console.log(hora_fim_unico+":"+min_fim_unico);
                    }
                    </script>
                    <br>
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <h6>Hora de fim do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="hora-fim-unico" type="text" name="hora-fim-unico" class="form-control" style="text-align: center" readonly  value="18:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="hora_fim_aluguel_mais();calcularPreco();horaUnicoMax()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="hora_fim_aluguel_menos();calcularPreco();horaUnicoMax()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div id="calendario-direto" style="display: none; background-color: black" class="p-3 input-group date col-12 text-center justify-content-center">
              <div class="row">
                <div class="col-12">
                  <h6 style="color: white">Selecione a data do primeiro dia do aluguel:</h6>
                  <br>
                  <input type="text" readonly name="data-direto-pick" id="datepicker-direto">
                  <br>
                  <h3><i style="color: #FFC107" class="mt-3 far fa-calendar-alt"></i></h3>
                  <br>
                  <h6 style="color: white">Selecione a quantidade de semanas seguidas em que será Alugado:</h6>
                  <br>
                  <div class="row text-center justify-content-center">
                    <div class="col-6">
                      <div class="row px-2">
                        <div class="col-12">
                          <input type="text" id="semanas-seguidas-direto" maxlength="2"name="semanas-unico-direto" class="form-control" style="text-align: center" readonly value="1">
                          <br>
                          <script>
                          var semanasSeguidasD = 1;
                          function semana_direto_mais()
                          {
                            semanasSeguidasD = semanasSeguidasD + 1;
                            if(semanasSeguidasD >= 12)
                            {
                              semanasSeguidasD = 12;
                            }
                            if(semanasSeguidasD <= 0)
                            {
                              semanasSeguidasD = 1;
                            }
                            document.getElementById("semanas-seguidas-direto").value = semanasSeguidasD;
                          }
                          function semana_direto_menos()
                          {
                            semanasSeguidasD = semanasSeguidasD - 1;
                            if(semanasSeguidasD >= 12)
                            {
                              semanasSeguidasD = 12;
                            }
                            if(semanasSeguidasD <= 0)
                            {
                              semanasSeguidasD = 1;
                            }
                            document.getElementById("semanas-seguidas-direto").value = semanasSeguidasD;
                          }
                          </script>
                        </div>
                        <div class="col-12">
                          <span class="my-1 btn btn-warning" onclick="semana_direto_mais()"><i class="fas fa-arrow-up"></i></span>
                          <span class="my-1 btn btn-warning" onclick="semana_direto_menos()"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                      <br>
                      <h6 id="tempoDeAlguel" style="color: #FFC107"></h6>
                    </div>
                  </div>
                  <script>
                  function atualizarTempoAluguel()
                  {
                    var data = today;
                    data.setDate(data.getDate() + 31);
                    document.getElementById("tempoDeAlguel").innerHTML = "O prazo de alguel será do dia "+dd+"/"+mm+"/"+yyyy+" até "+data.getDate()+'/'+ (data.getMonth()+1) +'/'+data.getFullYear();;
                  }
                  </script>
                  <!-- <h6 style="color: white">Selecione o período o qual vai ser alguado</h6>
                  <br>
                  <div class="row text-center justify-content-center">
                    <div id="hora-caixa-unico" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107;">
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de início do Aluguel</h6>
                        </div>
                        <div class="col-12">
                          <input type="text" name="hora-inicio-direto" class="form-control" style="text-align: center" readonly value="12:00">
                          <br>
                        </div>
                        <div class="col-12">
                          <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                          <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                      <br>
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de fim do Aluguel</h6>
                        </div>
                        <div class="col-12">
                          <input type="text" name="hora-fim-direto" class="form-control" style="text-align: center" readonly  value="18:00">
                          <br>
                        </div>
                        <div class="col-12">
                          <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                          <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>

            <div id="calendario-reincidente" style="display: none" class="col-12 pt-3 text-center" style="background-color: black">

              <script>

              function dias_bloqueados()
              {
                if(seg_ativo == false)
                {
                  document.getElementById("segunda-aviso").style.display = '';
                }
                else
                {
                  document.getElementById("segunda-aviso").style.display = 'none';
                }
                if(ter_ativo == false)
                {
                  document.getElementById("terca-aviso").style.display = '';
                }
                else
                {
                  document.getElementById("terca-aviso").style.display = 'none';
                }
                if(qua_ativo == false)
                {
                  document.getElementById("quarta-aviso").style.display = '';
                }
                else
                {
                  document.getElementById("quarta-aviso").style.display = 'none';
                }
                if(qui_ativo == false)
                {
                  document.getElementById("quinta-aviso").style.display = '';
                }
                else
                {
                  document.getElementById("quinta-aviso").style.display = 'none';
                }
                if(sex_ativo == false)
                {
                  document.getElementById("sexta-aviso").style.display = '';
                }
                else
                {
                  document.getElementById("sexta-aviso").style.display = 'none';
                }
                if(sab_ativo == false)
                {
                  document.getElementById("sabado-aviso").style.display = '';
                }
                else
                {
                  document.getElementById("sabado-aviso").style.display = 'none';
                }
                if(dom_ativo == false)
                {
                  document.getElementById("domingo-aviso").style.display = '';
                }
                else
                {
                  document.getElementById("domingo-aviso").style.display = 'none';
                }
              }

              function segunda_botao_periodo()
              {
                if(document.getElementById("segunda-bot-periodo").classList.contains("active") == false && seg_ativo == true)
                {
                  document.getElementById("segunda-caixa-periodo").style.display = '';
                  document.getElementById("segunda-bot-periodo").classList.add("active");
                  document.getElementById("seg-periodo-sel").value = "sim";
                }
                else
                {
                  document.getElementById("segunda-caixa-periodo").style.display = 'none';
                  document.getElementById("segunda-bot-periodo").classList.remove("active");
                  document.getElementById("seg-periodo-sel").value = "nao";
                }
              }
              function terca_botao_periodo()
              {
                if(document.getElementById("terca-bot-periodo").classList.contains("active") == false && ter_ativo == true)
                {
                  document.getElementById("terca-caixa-periodo").style.display = '';
                  document.getElementById("terca-bot-periodo").classList.add("active");
                  document.getElementById("ter-periodo-sel").value = "sim";
                }
                else
                {
                  document.getElementById("terca-caixa-periodo").style.display = 'none';
                  document.getElementById("terca-bot-periodo").classList.remove("active");
                  document.getElementById("ter-periodo-sel").value = "nao";
                }
              }
              function quarta_botao_periodo()
              {
                if(document.getElementById("quarta-bot-periodo").classList.contains("active") == false && qua_ativo == true)
                {
                  document.getElementById("quarta-caixa-periodo").style.display = '';
                  document.getElementById("quarta-bot-periodo").classList.add("active");
                  document.getElementById("qua-periodo-sel").value = "sim";
                }
                else
                {
                  document.getElementById("quarta-caixa-periodo").style.display = 'none';
                  document.getElementById("quarta-bot-periodo").classList.remove("active");
                  document.getElementById("qua-periodo-sel").value = "nao";
                }
              }
              function quinta_botao_periodo()
              {
                if(document.getElementById("quinta-bot-periodo").classList.contains("active") == false && qui_ativo == true)
                {
                  document.getElementById("quinta-caixa-periodo").style.display = '';
                  document.getElementById("quinta-bot-periodo").classList.add("active");
                  document.getElementById("qui-periodo-sel").value = "sim";
                }
                else
                {
                  document.getElementById("quinta-caixa-periodo").style.display = 'none';
                  document.getElementById("quinta-bot-periodo").classList.remove("active");
                  document.getElementById("qui-periodo-sel").value = "nao";
                }
              }
              function sexta_botao_periodo()
              {
                if(document.getElementById("sexta-bot-periodo").classList.contains("active") == false && sex_ativo == true)
                {
                  document.getElementById("sexta-caixa-periodo").style.display = '';
                  document.getElementById("sexta-bot-periodo").classList.add("active");
                  document.getElementById("sex-periodo-sel").value = "sim";
                }
                else
                {
                  document.getElementById("sexta-caixa-periodo").style.display = 'none';
                  document.getElementById("sexta-bot-periodo").classList.remove("active");
                  document.getElementById("sex-periodo-sel").value = "nao";
                }
              }
              function sabado_botao_periodo()
              {
                if(document.getElementById("sabado-bot-periodo").classList.contains("active") == false && sab_ativo == true)
                {
                  document.getElementById("sabado-caixa-periodo").style.display = '';
                  document.getElementById("sabado-bot-periodo").classList.add("active");
                  document.getElementById("sab-periodo-sel").value = "sim";
                }
                else
                {
                  document.getElementById("sabado-caixa-periodo").style.display = 'none';
                  document.getElementById("sabado-bot-periodo").classList.remove("active");
                  document.getElementById("sab-periodo-sel").value = "nao";
                }
              }
              function domingo_botao_periodo()
              {
                if(document.getElementById("domingo-bot-periodo").classList.contains("active") == false && dom_ativo == true)
                {
                  document.getElementById("domingo-caixa-periodo").style.display = '';
                  document.getElementById("domingo-bot-periodo").classList.add("active");
                  document.getElementById("dom-periodo-sel").value = "sim";
                }
                else
                {
                  document.getElementById("domingo-caixa-periodo").style.display = 'none';
                  document.getElementById("domingo-bot-periodo").classList.remove("active");
                  document.getElementById("dom-periodo-sel").value = "nao";
                }
              }
              </script>
              <h6 style="color: white">Selecione a data do primeiro dia do aluguel:</h6>
              <br>
              <input type="text" readonly name="data-reincidente-pick" id="datepicker-reincidente">
              <br>
              <h3><i style="color: #FFC107" class="mt-3 far fa-calendar-alt"></i></h3>
              <br>
              <h6 style="color: white">Selecione os dias da semana e os horários em que serão disponibilizados para alugar:</h6>
              <br>

              <input type="text" id="seg-periodo-sel" name="seg-periodo-sel" value="nao" readonly style="display: none">
              <input type="text" id="ter-periodo-sel" name="ter-periodo-sel" value="nao" readonly style="display: none">
              <input type="text" id="qua-periodo-sel" name="qua-periodo-sel" value="nao" readonly style="display: none">
              <input type="text" id="qui-periodo-sel" name="qui-periodo-sel" value="nao" readonly style="display: none">
              <input type="text" id="sex-periodo-sel" name="sex-periodo-sel" value="nao" readonly style="display: none">
              <input type="text" id="sab-periodo-sel" name="sab-periodo-sel" value="nao" readonly style="display: none">
              <input type="text" id="dom-periodo-sel" name="dom-periodo-sel" value="nao" readonly style="display: none">

              <div class="row pb-4 justify-content-center p-3">
                <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="segunda_botao_periodo()" class="btn btn-outline-warning" id="segunda-bot-periodo"><h6>Seg</h6></span><br><br><span style="color: white" id="segunda-aviso">Dia bloqueado</span><br><br>

                  <div id="segunda-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <br>
                        <span style="color: white; display: ">O horário disponível para esse dia da semana é de <span id="hora-inicio-seg-texto" style="color: #FFCE00">00:00</span> até <span id="hora-fim-seg-texto" style="color: #FFCE00">00:00</span>.<br></span>
                        <br>
                        <script>
                        function horaDispReincidente()
                        {
                          if(seg_ativo == true)
                          {
                            document.getElementById('hora-inicio-seg-texto').innerHTML = seg_min_h+":";
                            if(seg_min_m != 30)
                            {
                              document.getElementById('hora-inicio-seg-texto').innerHTML = document.getElementById('hora-inicio-seg-texto').innerHTML + "00";
                            }
                            else
                            {
                              document.getElementById('hora-inicio-seg-texto').innerHTML = document.getElementById('hora-inicio-seg-texto').innerHTML + "30";
                            }
                            document.getElementById('hora-fim-seg-texto').innerHTML = seg_max_h+":";
                            if(seg_max_m != 30)
                            {
                              document.getElementById('hora-fim-seg-texto').innerHTML = document.getElementById('hora-fim-seg-texto').innerHTML + "00";
                            }
                            else
                            {
                              document.getElementById('hora-fim-seg-texto').innerHTML = document.getElementById('hora-fim-seg-texto').innerHTML + "30";
                            }
                          }

                          if(ter_ativo == true)
                          {
                            document.getElementById('hora-inicio-ter-texto').innerHTML = ter_min_h+":";
                            if(ter_min_m != 30)
                            {
                              document.getElementById('hora-inicio-ter-texto').innerHTML = document.getElementById('hora-inicio-ter-texto').innerHTML + "00";
                            }
                            else
                            {
                              document.getElementById('hora-inicio-ter-texto').innerHTML = document.getElementById('hora-inicio-ter-texto').innerHTML + "30";
                            }
                            document.getElementById('hora-fim-ter-texto').innerHTML = ter_max_h+":";
                            if(ter_max_m != 30)
                            {
                              document.getElementById('hora-fim-ter-texto').innerHTML = document.getElementById('hora-fim-ter-texto').innerHTML + "00";
                            }
                            else
                            {
                              document.getElementById('hora-fim-ter-texto').innerHTML = document.getElementById('hora-fim-ter-texto').innerHTML + "30";
                            }
                          }

                          if(qua_ativo == true)
                          {
                            document.getElementById('hora-inicio-qua-texto').innerHTML = qua_min_h+":";
                            if(qua_min_m != 30)
                            {
                              document.getElementById('hora-inicio-qua-texto').innerHTML = document.getElementById('hora-inicio-qua-texto').innerHTML + "00";
                            }
                            else
                            {
                              document.getElementById('hora-inicio-qua-texto').innerHTML = document.getElementById('hora-inicio-qua-texto').innerHTML + "30";
                            }
                            document.getElementById('hora-fim-qua-texto').innerHTML = qua_max_h+":";
                            if(qua_max_m != 30)
                            {
                              document.getElementById('hora-fim-qua-texto').innerHTML = document.getElementById('hora-fim-qua-texto').innerHTML + "00";
                            }
                            else
                            {
                              document.getElementById('hora-fim-qua-texto').innerHTML = document.getElementById('hora-fim-qua-texto').innerHTML + "30";
                            }
                          }

                          if(qui_ativo == true)
                          {
                            document.getElementById('hora-inicio-qui-texto').innerHTML = qui_min_h+":";
                            if(qui_min_m != 30)
                            {
                              document.getElementById('hora-inicio-qui-texto').innerHTML = document.getElementById('hora-inicio-qui-texto').innerHTML + "00";
                            }
                            else
                            {
                              document.getElementById('hora-inicio-qui-texto').innerHTML = document.getElementById('hora-inicio-qui-texto').innerHTML + "30";
                            }
                            document.getElementById('hora-fim-qui-texto').innerHTML = qui_max_h+":";
                            if(qui_max_m != 30)
                            {
                              document.getElementById('hora-fim-qui-texto').innerHTML = document.getElementById('hora-fim-qui-texto').innerHTML + "00";
                            }
                            else
                            {
                              document.getElementById('hora-fim-qui-texto').innerHTML = document.getElementById('hora-fim-qui-texto').innerHTML + "30";
                            }
                          }

                          if(sex_ativo == true)
                          {
                            document.getElementById('hora-inicio-sex-texto').innerHTML = sex_min_h+":";
                            if(sex_min_m != 30)
                            {
                              document.getElementById('hora-inicio-sex-texto').innerHTML = document.getElementById('hora-inicio-sex-texto').innerHTML + "00";
                            }
                            else
                            {
                              document.getElementById('hora-inicio-sex-texto').innerHTML = document.getElementById('hora-inicio-sex-texto').innerHTML + "30";
                            }
                            document.getElementById('hora-fim-sex-texto').innerHTML = sex_max_h+":";
                            if(sex_max_m != 30)
                            {
                              document.getElementById('hora-fim-sex-texto').innerHTML = document.getElementById('hora-fim-sex-texto').innerHTML + "00";
                            }
                            else
                            {
                              document.getElementById('hora-fim-sex-texto').innerHTML = document.getElementById('hora-fim-sex-texto').innerHTML + "30";
                            }

                            if(sab_ativo == true)
                            {
                              document.getElementById('hora-inicio-sab-texto').innerHTML = sab_min_h+":";
                              if(sab_min_m != 30)
                              {
                                document.getElementById('hora-inicio-sab-texto').innerHTML = document.getElementById('hora-inicio-sab-texto').innerHTML + "00";
                              }
                              else
                              {
                                document.getElementById('hora-inicio-sab-texto').innerHTML = document.getElementById('hora-inicio-sab-texto').innerHTML + "30";
                              }
                              document.getElementById('hora-fim-sab-texto').innerHTML = sab_max_h+":";
                              if(sab_max_m != 30)
                              {
                                document.getElementById('hora-fim-sab-texto').innerHTML = document.getElementById('hora-fim-sab-texto').innerHTML + "00";
                              }
                              else
                              {
                                document.getElementById('hora-fim-sab-texto').innerHTML = document.getElementById('hora-fim-sab-texto').innerHTML + "30";
                              }
                            }

                            if(dom_ativo == true)
                            {
                              document.getElementById('hora-inicio-dom-texto').innerHTML = dom_min_h+":";
                              if(dom_min_m != 30)
                              {
                                document.getElementById('hora-inicio-dom-texto').innerHTML = document.getElementById('hora-inicio-dom-texto').innerHTML + "00";
                              }
                              else
                              {
                                document.getElementById('hora-inicio-dom-texto').innerHTML = document.getElementById('hora-inicio-dom-texto').innerHTML + "30";
                              }
                              document.getElementById('hora-fim-dom-texto').innerHTML = dom_max_h+":";
                              if(dom_max_m != 30)
                              {
                                document.getElementById('hora-fim-dom-texto').innerHTML = document.getElementById('hora-fim-dom-texto').innerHTML + "00";
                              }
                              else
                              {
                                document.getElementById('hora-fim-dom-texto').innerHTML = document.getElementById('hora-fim-dom-texto').innerHTML + "30";
                              }
                            }
                          }
                        }
                        </script>
                        <h6>Hora de início do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="seg-hora-inicio" type="text" name="seg-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="seg_hora_inicio_aluguel_mais()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="seg_hora_inicio_aluguel_menos()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                    <script>
                    var seg_hora_inicio_unico = 12;
                    var seg_hora_fim_unico = 18;
                    var seg_min_inicio_unico = 00;
                    var seg_min_fim_unico = 00;
                    var seg_hora_inicio_unico_id = document.getElementById("seg-hora-inicio");
                    var seg_hora_fim_unico_id = document.getElementById("seg-hora-fim");
                    function seg_hora_fim_aluguel_menos()
                    {
                      seg_min_fim_unico = seg_min_fim_unico - 30;
                      if(seg_min_fim_unico < 0)
                      {
                        seg_min_fim_unico = 30;
                        seg_hora_fim_unico = seg_hora_fim_unico - 1;
                        if(seg_hora_fim_unico<=0)
                        {
                          seg_hora_fim_unico = 23;
                          seg_min_fim_unico = 30;
                        }
                      }
                      if(seg_hora_inicio_unico<=0)
                      {
                        seg_hora_inicio_unico = 23;
                        seg_min_fim_unico = 30;
                      }
                      if((seg_hora_inicio_unico == seg_hora_fim_unico))
                      {
                        seg_hora_inicio_unico = seg_hora_inicio_unico - 1;
                        if(seg_hora_fim_unico<=0)
                        {
                          seg_hora_inicio_unico = 23;
                          seg_min_fim_unico = 00;
                        }
                      }
                      if(seg_hora_inicio_unico <= 9)
                      {
                        if(seg_min_inicio_unico == 0)
                        {
                          seg_hora_inicio_unico_id.value = "0"+seg_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          seg_hora_inicio_unico_id.value = "0"+seg_hora_inicio_unico+":"+seg_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(seg_min_inicio_unico == 0)
                        {
                          seg_hora_inicio_unico_id.value = seg_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          seg_hora_inicio_unico_id.value = seg_hora_inicio_unico+":"+seg_min_inicio_unico;
                        }
                      }
                      if(seg_hora_fim_unico <= 9)
                      {
                        if(seg_min_fim_unico == 0)
                        {
                          document.getElementById("seg-hora-fim").value = "0"+seg_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("seg-hora-fim").value = "0"+seg_hora_fim_unico+":"+seg_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(seg_min_fim_unico == 0)
                        {
                          document.getElementById("seg-hora-fim").value = seg_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("seg-hora-fim").value = seg_hora_fim_unico+":"+seg_min_fim_unico;
                        }
                      }
                    }
                    function seg_hora_fim_aluguel_mais()
                    {
                      seg_min_fim_unico = seg_min_fim_unico + 30;
                      if(seg_min_fim_unico >= 60)
                      {
                        seg_min_fim_unico = 00;
                        seg_hora_fim_unico = seg_hora_fim_unico + 1;
                        if(seg_hora_fim_unico>=24)
                        {
                          seg_hora_fim_unico = 00;
                        }
                      }
                      if(seg_hora_inicio_unico>=24)
                      {
                        seg_hora_inicio_unico = 00;
                      }
                      if((seg_hora_fim_unico == seg_hora_inicio_unico))
                      {
                        seg_hora_inicio_unico = seg_hora_inicio_unico + 1;
                      }
                      if(seg_hora_inicio_unico <= 9)
                      {
                        if(seg_min_inicio_unico == 0)
                        {
                          seg_hora_inicio_unico_id.value = "0"+seg_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          seg_hora_inicio_unico_id.value = "0"+seg_hora_inicio_unico+":"+seg_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(seg_min_inicio_unico == 0)
                        {
                          seg_hora_inicio_unico_id.value = seg_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          seg_hora_inicio_unico_id.value = seg_hora_inicio_unico+":"+seg_min_inicio_unico;
                        }
                      }
                      if(seg_hora_fim_unico <= 9)
                      {
                        if(seg_min_fim_unico == 0)
                        {
                          document.getElementById("seg-hora-fim").value = "0"+seg_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("seg-hora-fim").value = "0"+seg_hora_fim_unico+":"+seg_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(seg_min_fim_unico == 0)
                        {
                          document.getElementById("seg-hora-fim").value = seg_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("seg-hora-fim").value = seg_hora_fim_unico+":"+seg_min_fim_unico;
                        }
                      }
                    }
                    function seg_hora_inicio_aluguel_menos()
                    {
                      seg_min_inicio_unico = seg_min_inicio_unico - 30;
                      if(seg_min_inicio_unico < 0)
                      {
                        seg_min_inicio_unico = 30;
                        seg_hora_inicio_unico = seg_hora_inicio_unico - 1;
                        if(seg_hora_inicio_unico<=0)
                        {
                          seg_hora_inicio_unico = 23;
                          seg_min_inicio_unico = 30;
                        }
                      }
                      if(seg_hora_fim_unico<=0)
                      {
                        seg_hora_fim_unico = 23;
                        seg_min_inicio_unico = 30;
                      }
                      if((seg_hora_inicio_unico == seg_hora_fim_unico))
                      {
                        seg_hora_fim_unico = seg_hora_fim_unico - 1;
                        if(seg_hora_fim_unico<=0)
                        {
                          seg_hora_fim_unico = 23;
                          seg_min_inicio_unico = 00;
                        }
                      }
                      if(seg_hora_inicio_unico <= 9)
                      {
                        if(seg_min_inicio_unico == 0)
                        {
                          seg_hora_inicio_unico_id.value = "0"+seg_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          seg_hora_inicio_unico_id.value = "0"+seg_hora_inicio_unico+":"+seg_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(seg_min_inicio_unico == 0)
                        {
                          seg_hora_inicio_unico_id.value = seg_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          seg_hora_inicio_unico_id.value = seg_hora_inicio_unico+":"+seg_min_inicio_unico;
                        }
                      }
                      if(seg_hora_fim_unico <= 9)
                      {
                        if(seg_min_fim_unico == 0)
                        {
                          document.getElementById("seg-hora-fim").value = "0"+seg_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("seg-hora-fim").value = "0"+seg_hora_fim_unico+":"+seg_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(seg_min_fim_unico == 0)
                        {
                          document.getElementById("seg-hora-fim").value = seg_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("seg-hora-fim").value = seg_hora_fim_unico+":"+seg_min_fim_unico;
                        }
                      }
                    }
                    function seg_hora_inicio_aluguel_mais()
                    {
                      seg_min_inicio_unico = seg_min_inicio_unico + 30;
                      if(seg_min_inicio_unico >= 60)
                      {
                        seg_min_inicio_unico = 00;
                        seg_hora_inicio_unico = seg_hora_inicio_unico + 1;
                        if(seg_hora_inicio_unico>=24)
                        {
                          seg_hora_inicio_unico = 00;
                        }
                      }
                      if(seg_hora_fim_unico>=24)
                      {
                        seg_hora_fim_unico = 00;
                      }
                      if((seg_hora_inicio_unico == seg_hora_fim_unico))
                      {
                        seg_hora_fim_unico = seg_hora_fim_unico + 1;
                      }
                      if(seg_hora_inicio_unico <= 9)
                      {
                        if(seg_min_inicio_unico == 0)
                        {
                          seg_hora_inicio_unico_id.value = "0"+seg_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          seg_hora_inicio_unico_id.value = "0"+seg_hora_inicio_unico+":"+seg_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(seg_min_inicio_unico == 0)
                        {
                          seg_hora_inicio_unico_id.value = seg_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          seg_hora_inicio_unico_id.value = seg_hora_inicio_unico+":"+seg_min_inicio_unico;
                        }
                      }
                      if(seg_hora_fim_unico <= 9)
                      {
                        if(seg_min_fim_unico == 0)
                        {
                          document.getElementById("seg-hora-fim").value = "0"+seg_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("seg-hora-fim").value = "0"+seg_hora_fim_unico+":"+seg_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(seg_min_fim_unico == 0)
                        {
                          document.getElementById("seg-hora-fim").value = seg_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("seg-hora-fim").value = seg_hora_fim_unico+":"+seg_min_fim_unico;
                        }
                      }
                      console.log(seg_hora_inicio_unico+":"+seg_min_inicio_unico);
                      console.log(seg_hora_fim_unico+":"+seg_min_fim_unico);
                    }
                    </script>
                    <br>
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <h6>Hora de fim do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="seg-hora-fim" type="text" name="seg-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="seg_hora_fim_aluguel_mais()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="seg_hora_fim_aluguel_menos()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="terca_botao_periodo()" id="terca-bot-periodo" class="btn btn-outline-warning"><h6>Ter</h6></span>
                  <br><br><span style="color: white" id="terca-aviso">Dia bloqueado</span><br><br>

                  <div id="terca-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <br>
                        <span style="color: white; display: ">O horário disponível para esse dia da semana é de <span id="hora-inicio-ter-texto" style="color: #FFCE00">00:00</span> até <span id="hora-fim-ter-texto" style="color: #FFCE00">00:00</span>.<br></span>
                        <br>
                        <h6>Hora de início do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="ter-hora-inicio" type="text" name="ter-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="ter_hora_inicio_aluguel_mais()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="ter_hora_inicio_aluguel_menos()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                    <script>
                    var ter_hora_inicio_unico = 12;
                    var ter_hora_fim_unico = 18;
                    var ter_min_inicio_unico = 00;
                    var ter_min_fim_unico = 00;
                    var ter_hora_inicio_unico_id = document.getElementById("ter-hora-inicio");
                    var ter_hora_fim_unico_id = document.getElementById("ter-hora-fim");
                    function ter_hora_fim_aluguel_menos()
                    {
                      ter_min_fim_unico = ter_min_fim_unico - 30;
                      if(ter_min_fim_unico < 0)
                      {
                        ter_min_fim_unico = 30;
                        ter_hora_fim_unico = ter_hora_fim_unico - 1;
                        if(ter_hora_fim_unico<=0)
                        {
                          ter_hora_fim_unico = 23;
                          ter_min_fim_unico = 30;
                        }
                      }
                      if(ter_hora_inicio_unico<=0)
                      {
                        ter_hora_inicio_unico = 23;
                        ter_min_fim_unico = 30;
                      }
                      if((ter_hora_inicio_unico == ter_hora_fim_unico))
                      {
                        ter_hora_inicio_unico = ter_hora_inicio_unico - 1;
                        if(ter_hora_fim_unico<=0)
                        {
                          ter_hora_inicio_unico = 23;
                          ter_min_fim_unico = 00;
                        }
                      }
                      if(ter_hora_inicio_unico <= 9)
                      {
                        if(ter_min_inicio_unico == 0)
                        {
                          ter_hora_inicio_unico_id.value = "0"+ter_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          ter_hora_inicio_unico_id.value = "0"+ter_hora_inicio_unico+":"+ter_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(ter_min_inicio_unico == 0)
                        {
                          ter_hora_inicio_unico_id.value = ter_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          ter_hora_inicio_unico_id.value = ter_hora_inicio_unico+":"+ter_min_inicio_unico;
                        }
                      }
                      if(ter_hora_fim_unico <= 9)
                      {
                        if(ter_min_fim_unico == 0)
                        {
                          document.getElementById("ter-hora-fim").value = "0"+ter_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("ter-hora-fim").value = "0"+ter_hora_fim_unico+":"+ter_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(ter_min_fim_unico == 0)
                        {
                          document.getElementById("ter-hora-fim").value = ter_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("ter-hora-fim").value = ter_hora_fim_unico+":"+ter_min_fim_unico;
                        }
                      }
                    }
                    function ter_hora_fim_aluguel_mais()
                    {
                      ter_min_fim_unico = ter_min_fim_unico + 30;
                      if(ter_min_fim_unico >= 60)
                      {
                        ter_min_fim_unico = 00;
                        ter_hora_fim_unico = ter_hora_fim_unico + 1;
                        if(ter_hora_fim_unico>=24)
                        {
                          ter_hora_fim_unico = 00;
                        }
                      }
                      if(ter_hora_inicio_unico>=24)
                      {
                        ter_hora_inicio_unico = 00;
                      }
                      if((ter_hora_fim_unico == ter_hora_inicio_unico))
                      {
                        ter_hora_inicio_unico = ter_hora_inicio_unico + 1;
                      }
                      if(ter_hora_inicio_unico <= 9)
                      {
                        if(ter_min_inicio_unico == 0)
                        {
                          ter_hora_inicio_unico_id.value = "0"+ter_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          ter_hora_inicio_unico_id.value = "0"+ter_hora_inicio_unico+":"+ter_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(ter_min_inicio_unico == 0)
                        {
                          ter_hora_inicio_unico_id.value = ter_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          ter_hora_inicio_unico_id.value = ter_hora_inicio_unico+":"+ter_min_inicio_unico;
                        }
                      }
                      if(ter_hora_fim_unico <= 9)
                      {
                        if(ter_min_fim_unico == 0)
                        {
                          document.getElementById("ter-hora-fim").value = "0"+ter_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("ter-hora-fim").value = "0"+ter_hora_fim_unico+":"+ter_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(ter_min_fim_unico == 0)
                        {
                          document.getElementById("ter-hora-fim").value = ter_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("ter-hora-fim").value = ter_hora_fim_unico+":"+ter_min_fim_unico;
                        }
                      }
                    }
                    function ter_hora_inicio_aluguel_menos()
                    {
                      ter_min_inicio_unico = ter_min_inicio_unico - 30;
                      if(ter_min_inicio_unico < 0)
                      {
                        ter_min_inicio_unico = 30;
                        ter_hora_inicio_unico = ter_hora_inicio_unico - 1;
                        if(ter_hora_inicio_unico<=0)
                        {
                          ter_hora_inicio_unico = 23;
                          ter_min_inicio_unico = 30;
                        }
                      }
                      if(ter_hora_fim_unico<=0)
                      {
                        ter_hora_fim_unico = 23;
                        ter_min_inicio_unico = 30;
                      }
                      if((ter_hora_inicio_unico == ter_hora_fim_unico))
                      {
                        ter_hora_fim_unico = ter_hora_fim_unico - 1;
                        if(ter_hora_fim_unico<=0)
                        {
                          ter_hora_fim_unico = 23;
                          ter_min_inicio_unico = 00;
                        }
                      }
                      if(ter_hora_inicio_unico <= 9)
                      {
                        if(ter_min_inicio_unico == 0)
                        {
                          ter_hora_inicio_unico_id.value = "0"+ter_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          ter_hora_inicio_unico_id.value = "0"+ter_hora_inicio_unico+":"+ter_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(ter_min_inicio_unico == 0)
                        {
                          ter_hora_inicio_unico_id.value = ter_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          ter_hora_inicio_unico_id.value = ter_hora_inicio_unico+":"+ter_min_inicio_unico;
                        }
                      }
                      if(ter_hora_fim_unico <= 9)
                      {
                        if(ter_min_fim_unico == 0)
                        {
                          document.getElementById("ter-hora-fim").value = "0"+ter_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("ter-hora-fim").value = "0"+ter_hora_fim_unico+":"+ter_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(ter_min_fim_unico == 0)
                        {
                          document.getElementById("ter-hora-fim").value = ter_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("ter-hora-fim").value = ter_hora_fim_unico+":"+ter_min_fim_unico;
                        }
                      }
                    }
                    function ter_hora_inicio_aluguel_mais()
                    {
                      ter_min_inicio_unico = ter_min_inicio_unico + 30;
                      if(ter_min_inicio_unico >= 60)
                      {
                        ter_min_inicio_unico = 00;
                        ter_hora_inicio_unico = ter_hora_inicio_unico + 1;
                        if(ter_hora_inicio_unico>=24)
                        {
                          ter_hora_inicio_unico = 00;
                        }
                      }
                      if(ter_hora_fim_unico>=24)
                      {
                        ter_hora_fim_unico = 00;
                      }
                      if((ter_hora_inicio_unico == ter_hora_fim_unico))
                      {
                        ter_hora_fim_unico = ter_hora_fim_unico + 1;
                      }
                      if(ter_hora_inicio_unico <= 9)
                      {
                        if(ter_min_inicio_unico == 0)
                        {
                          ter_hora_inicio_unico_id.value = "0"+ter_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          ter_hora_inicio_unico_id.value = "0"+ter_hora_inicio_unico+":"+ter_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(ter_min_inicio_unico == 0)
                        {
                          ter_hora_inicio_unico_id.value = ter_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          ter_hora_inicio_unico_id.value = ter_hora_inicio_unico+":"+ter_min_inicio_unico;
                        }
                      }
                      if(ter_hora_fim_unico <= 9)
                      {
                        if(ter_min_fim_unico == 0)
                        {
                          document.getElementById("ter-hora-fim").value = "0"+ter_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("ter-hora-fim").value = "0"+ter_hora_fim_unico+":"+ter_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(ter_min_fim_unico == 0)
                        {
                          document.getElementById("ter-hora-fim").value = ter_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("ter-hora-fim").value = ter_hora_fim_unico+":"+ter_min_fim_unico;
                        }
                      }
                      console.log(ter_hora_inicio_unico+":"+ter_min_inicio_unico);
                      console.log(ter_hora_fim_unico+":"+ter_min_fim_unico);
                    }
                    </script>
                    <br>
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <h6>Hora de fim do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="ter-hora-fim" type="text" name="ter-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="ter_hora_fim_aluguel_mais()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="ter_hora_fim_aluguel_menos()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="quarta_botao_periodo()" id="quarta-bot-periodo" class="btn btn-outline-warning"><h6>Qua</h6></span>
                  <br><br><span style="color: white" id="quarta-aviso">Dia bloqueado</span><br><br>

                  <div id="quarta-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <br>
                        <span style="color: white; display: ">O horário disponível para esse dia da semana é de <span id="hora-inicio-qua-texto" style="color: #FFCE00">00:00</span> até <span id="hora-fim-qua-texto" style="color: #FFCE00">00:00</span>.<br></span>
                        <br>
                        <h6>Hora de início do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="qua-hora-inicio" type="text" name="qua-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="qua_hora_inicio_aluguel_mais()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="qua_hora_inicio_aluguel_menos()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                    <script>
                    var qua_hora_inicio_unico = 12;
                    var qua_hora_fim_unico = 18;
                    var qua_min_inicio_unico = 00;
                    var qua_min_fim_unico = 00;
                    var qua_hora_inicio_unico_id = document.getElementById("qua-hora-inicio");
                    var qua_hora_fim_unico_id = document.getElementById("qua-hora-fim");
                    function qua_hora_fim_aluguel_menos()
                    {
                      qua_min_fim_unico = qua_min_fim_unico - 30;
                      if(qua_min_fim_unico < 0)
                      {
                        qua_min_fim_unico = 30;
                        qua_hora_fim_unico = qua_hora_fim_unico - 1;
                        if(qua_hora_fim_unico<=0)
                        {
                          qua_hora_fim_unico = 23;
                          qua_min_fim_unico = 30;
                        }
                      }
                      if(qua_hora_inicio_unico<=0)
                      {
                        qua_hora_inicio_unico = 23;
                        qua_min_fim_unico = 30;
                      }
                      if((qua_hora_inicio_unico == qua_hora_fim_unico))
                      {
                        qua_hora_inicio_unico = qua_hora_inicio_unico - 1;
                        if(qua_hora_fim_unico<=0)
                        {
                          qua_hora_inicio_unico = 23;
                          qua_min_fim_unico = 00;
                        }
                      }
                      if(qua_hora_inicio_unico <= 9)
                      {
                        if(qua_min_inicio_unico == 0)
                        {
                          qua_hora_inicio_unico_id.value = "0"+qua_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qua_hora_inicio_unico_id.value = "0"+qua_hora_inicio_unico+":"+qua_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(qua_min_inicio_unico == 0)
                        {
                          qua_hora_inicio_unico_id.value = qua_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qua_hora_inicio_unico_id.value = qua_hora_inicio_unico+":"+qua_min_inicio_unico;
                        }
                      }
                      if(qua_hora_fim_unico <= 9)
                      {
                        if(qua_min_fim_unico == 0)
                        {
                          document.getElementById("qua-hora-fim").value = "0"+qua_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qua-hora-fim").value = "0"+qua_hora_fim_unico+":"+qua_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(qua_min_fim_unico == 0)
                        {
                          document.getElementById("qua-hora-fim").value = qua_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qua-hora-fim").value = qua_hora_fim_unico+":"+qua_min_fim_unico;
                        }
                      }
                    }
                    function qua_hora_fim_aluguel_mais()
                    {
                      qua_min_fim_unico = qua_min_fim_unico + 30;
                      if(qua_min_fim_unico >= 60)
                      {
                        qua_min_fim_unico = 00;
                        qua_hora_fim_unico = qua_hora_fim_unico + 1;
                        if(qua_hora_fim_unico>=24)
                        {
                          qua_hora_fim_unico = 00;
                        }
                      }
                      if(qua_hora_inicio_unico>=24)
                      {
                        qua_hora_inicio_unico = 00;
                      }
                      if((qua_hora_fim_unico == qua_hora_inicio_unico))
                      {
                        qua_hora_inicio_unico = qua_hora_inicio_unico + 1;
                      }
                      if(qua_hora_inicio_unico <= 9)
                      {
                        if(qua_min_inicio_unico == 0)
                        {
                          qua_hora_inicio_unico_id.value = "0"+qua_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qua_hora_inicio_unico_id.value = "0"+qua_hora_inicio_unico+":"+qua_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(qua_min_inicio_unico == 0)
                        {
                          qua_hora_inicio_unico_id.value = qua_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qua_hora_inicio_unico_id.value = qua_hora_inicio_unico+":"+qua_min_inicio_unico;
                        }
                      }
                      if(qua_hora_fim_unico <= 9)
                      {
                        if(qua_min_fim_unico == 0)
                        {
                          document.getElementById("qua-hora-fim").value = "0"+qua_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qua-hora-fim").value = "0"+qua_hora_fim_unico+":"+qua_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(qua_min_fim_unico == 0)
                        {
                          document.getElementById("qua-hora-fim").value = qua_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qua-hora-fim").value = qua_hora_fim_unico+":"+qua_min_fim_unico;
                        }
                      }
                    }
                    function qua_hora_inicio_aluguel_menos()
                    {
                      qua_min_inicio_unico = qua_min_inicio_unico - 30;
                      if(qua_min_inicio_unico < 0)
                      {
                        qua_min_inicio_unico = 30;
                        qua_hora_inicio_unico = qua_hora_inicio_unico - 1;
                        if(qua_hora_inicio_unico<=0)
                        {
                          qua_hora_inicio_unico = 23;
                          qua_min_inicio_unico = 30;
                        }
                      }
                      if(qua_hora_fim_unico<=0)
                      {
                        qua_hora_fim_unico = 23;
                        qua_min_inicio_unico = 30;
                      }
                      if((qua_hora_inicio_unico == qua_hora_fim_unico))
                      {
                        qua_hora_fim_unico = qua_hora_fim_unico - 1;
                        if(qua_hora_fim_unico<=0)
                        {
                          qua_hora_fim_unico = 23;
                          qua_min_inicio_unico = 00;
                        }
                      }
                      if(qua_hora_inicio_unico <= 9)
                      {
                        if(qua_min_inicio_unico == 0)
                        {
                          qua_hora_inicio_unico_id.value = "0"+qua_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qua_hora_inicio_unico_id.value = "0"+qua_hora_inicio_unico+":"+qua_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(qua_min_inicio_unico == 0)
                        {
                          qua_hora_inicio_unico_id.value = qua_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qua_hora_inicio_unico_id.value = qua_hora_inicio_unico+":"+qua_min_inicio_unico;
                        }
                      }
                      if(qua_hora_fim_unico <= 9)
                      {
                        if(qua_min_fim_unico == 0)
                        {
                          document.getElementById("qua-hora-fim").value = "0"+qua_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qua-hora-fim").value = "0"+qua_hora_fim_unico+":"+qua_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(qua_min_fim_unico == 0)
                        {
                          document.getElementById("qua-hora-fim").value = qua_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qua-hora-fim").value = qua_hora_fim_unico+":"+qua_min_fim_unico;
                        }
                      }
                    }
                    function qua_hora_inicio_aluguel_mais()
                    {
                      qua_min_inicio_unico = qua_min_inicio_unico + 30;
                      if(qua_min_inicio_unico >= 60)
                      {
                        qua_min_inicio_unico = 00;
                        qua_hora_inicio_unico = qua_hora_inicio_unico + 1;
                        if(qua_hora_inicio_unico>=24)
                        {
                          qua_hora_inicio_unico = 00;
                        }
                      }
                      if(qua_hora_fim_unico>=24)
                      {
                        qua_hora_fim_unico = 00;
                      }
                      if((qua_hora_inicio_unico == qua_hora_fim_unico))
                      {
                        qua_hora_fim_unico = qua_hora_fim_unico + 1;
                      }
                      if(qua_hora_inicio_unico <= 9)
                      {
                        if(qua_min_inicio_unico == 0)
                        {
                          qua_hora_inicio_unico_id.value = "0"+qua_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qua_hora_inicio_unico_id.value = "0"+qua_hora_inicio_unico+":"+qua_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(qua_min_inicio_unico == 0)
                        {
                          qua_hora_inicio_unico_id.value = qua_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qua_hora_inicio_unico_id.value = qua_hora_inicio_unico+":"+qua_min_inicio_unico;
                        }
                      }
                      if(qua_hora_fim_unico <= 9)
                      {
                        if(qua_min_fim_unico == 0)
                        {
                          document.getElementById("qua-hora-fim").value = "0"+qua_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qua-hora-fim").value = "0"+qua_hora_fim_unico+":"+qua_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(qua_min_fim_unico == 0)
                        {
                          document.getElementById("qua-hora-fim").value = qua_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qua-hora-fim").value = qua_hora_fim_unico+":"+qua_min_fim_unico;
                        }
                      }
                      console.log(qua_hora_inicio_unico+":"+qua_min_inicio_unico);
                      console.log(qua_hora_fim_unico+":"+qua_min_fim_unico);
                    }
                    </script>
                    <br>
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <h6>Hora de fim do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="qua-hora-fim" type="text" name="qua-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="qua_hora_fim_aluguel_mais()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="qua_hora_fim_aluguel_menos()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="quinta_botao_periodo()" id="quinta-bot-periodo" class="btn btn-outline-warning"><h6>Qui</h6></span>
                  <br><br><span style="color: white" id="quinta-aviso">Dia bloqueado</span><br><br>

                  <div id="quinta-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <br>
                        <span style="color: white; display: ">O horário disponível para esse dia da semana é de <span id="hora-inicio-qui-texto" style="color: #FFCE00">00:00</span> até <span id="hora-fim-qui-texto" style="color: #FFCE00">00:00</span>.<br></span>
                        <br>
                        <h6>Hora de início do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="qui-hora-inicio" type="text" name="qui-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="qui_hora_inicio_aluguel_mais()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="qui_hora_inicio_aluguel_menos()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                    <br>
                    <script>
                    var qui_hora_inicio_unico = 12;
                    var qui_hora_fim_unico = 18;
                    var qui_min_inicio_unico = 00;
                    var qui_min_fim_unico = 00;
                    var qui_hora_inicio_unico_id = document.getElementById("qui-hora-inicio");
                    var qui_hora_fim_unico_id = document.getElementById("qui-hora-fim");
                    function qui_hora_fim_aluguel_menos()
                    {
                      qui_min_fim_unico = qui_min_fim_unico - 30;
                      if(qui_min_fim_unico < 0)
                      {
                        qui_min_fim_unico = 30;
                        qui_hora_fim_unico = qui_hora_fim_unico - 1;
                        if(qui_hora_fim_unico<=0)
                        {
                          qui_hora_fim_unico = 23;
                          qui_min_fim_unico = 30;
                        }
                      }
                      if(qui_hora_inicio_unico<=0)
                      {
                        qui_hora_inicio_unico = 23;
                        qui_min_fim_unico = 30;
                      }
                      if((qui_hora_inicio_unico == qui_hora_fim_unico))
                      {
                        qui_hora_inicio_unico = qui_hora_inicio_unico - 1;
                        if(qui_hora_fim_unico<=0)
                        {
                          qui_hora_inicio_unico = 23;
                          qui_min_fim_unico = 00;
                        }
                      }
                      if(qui_hora_inicio_unico <= 9)
                      {
                        if(qui_min_inicio_unico == 0)
                        {
                          qui_hora_inicio_unico_id.value = "0"+qui_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qui_hora_inicio_unico_id.value = "0"+qui_hora_inicio_unico+":"+qui_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(qui_min_inicio_unico == 0)
                        {
                          qui_hora_inicio_unico_id.value = qui_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qui_hora_inicio_unico_id.value = qui_hora_inicio_unico+":"+qui_min_inicio_unico;
                        }
                      }
                      if(qui_hora_fim_unico <= 9)
                      {
                        if(qui_min_fim_unico == 0)
                        {
                          document.getElementById("qui-hora-fim").value = "0"+qui_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qui-hora-fim").value = "0"+qui_hora_fim_unico+":"+qui_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(qui_min_fim_unico == 0)
                        {
                          document.getElementById("qui-hora-fim").value = qui_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qui-hora-fim").value = qui_hora_fim_unico+":"+qui_min_fim_unico;
                        }
                      }
                    }
                    function qui_hora_fim_aluguel_mais()
                    {
                      qui_min_fim_unico = qui_min_fim_unico + 30;
                      if(qui_min_fim_unico >= 60)
                      {
                        qui_min_fim_unico = 00;
                        qui_hora_fim_unico = qui_hora_fim_unico + 1;
                        if(qui_hora_fim_unico>=24)
                        {
                          qui_hora_fim_unico = 00;
                        }
                      }
                      if(qui_hora_inicio_unico>=24)
                      {
                        qui_hora_inicio_unico = 00;
                      }
                      if((qui_hora_fim_unico == qui_hora_inicio_unico))
                      {
                        qui_hora_inicio_unico = qui_hora_inicio_unico + 1;
                      }
                      if(qui_hora_inicio_unico <= 9)
                      {
                        if(qui_min_inicio_unico == 0)
                        {
                          qui_hora_inicio_unico_id.value = "0"+qui_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qui_hora_inicio_unico_id.value = "0"+qui_hora_inicio_unico+":"+qui_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(qui_min_inicio_unico == 0)
                        {
                          qui_hora_inicio_unico_id.value = qui_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qui_hora_inicio_unico_id.value = qui_hora_inicio_unico+":"+qui_min_inicio_unico;
                        }
                      }
                      if(qui_hora_fim_unico <= 9)
                      {
                        if(qui_min_fim_unico == 0)
                        {
                          document.getElementById("qui-hora-fim").value = "0"+qui_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qui-hora-fim").value = "0"+qui_hora_fim_unico+":"+qui_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(qui_min_fim_unico == 0)
                        {
                          document.getElementById("qui-hora-fim").value = qui_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qui-hora-fim").value = qui_hora_fim_unico+":"+qui_min_fim_unico;
                        }
                      }
                    }
                    function qui_hora_inicio_aluguel_menos()
                    {
                      qui_min_inicio_unico = qui_min_inicio_unico - 30;
                      if(qui_min_inicio_unico < 0)
                      {
                        qui_min_inicio_unico = 30;
                        qui_hora_inicio_unico = qui_hora_inicio_unico - 1;
                        if(qui_hora_inicio_unico<=0)
                        {
                          qui_hora_inicio_unico = 23;
                          qui_min_inicio_unico = 30;
                        }
                      }
                      if(qui_hora_fim_unico<=0)
                      {
                        qui_hora_fim_unico = 23;
                        qui_min_inicio_unico = 30;
                      }
                      if((qui_hora_inicio_unico == qui_hora_fim_unico))
                      {
                        qui_hora_fim_unico = qui_hora_fim_unico - 1;
                        if(qui_hora_fim_unico<=0)
                        {
                          qui_hora_fim_unico = 23;
                          qui_min_inicio_unico = 00;
                        }
                      }
                      if(qui_hora_inicio_unico <= 9)
                      {
                        if(qui_min_inicio_unico == 0)
                        {
                          qui_hora_inicio_unico_id.value = "0"+qui_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qui_hora_inicio_unico_id.value = "0"+qui_hora_inicio_unico+":"+qui_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(qui_min_inicio_unico == 0)
                        {
                          qui_hora_inicio_unico_id.value = qui_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qui_hora_inicio_unico_id.value = qui_hora_inicio_unico+":"+qui_min_inicio_unico;
                        }
                      }
                      if(qui_hora_fim_unico <= 9)
                      {
                        if(qui_min_fim_unico == 0)
                        {
                          document.getElementById("qui-hora-fim").value = "0"+qui_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qui-hora-fim").value = "0"+qui_hora_fim_unico+":"+qui_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(qui_min_fim_unico == 0)
                        {
                          document.getElementById("qui-hora-fim").value = qui_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qui-hora-fim").value = qui_hora_fim_unico+":"+qui_min_fim_unico;
                        }
                      }
                    }
                    function qui_hora_inicio_aluguel_mais()
                    {
                      qui_min_inicio_unico = qui_min_inicio_unico + 30;
                      if(qui_min_inicio_unico >= 60)
                      {
                        qui_min_inicio_unico = 00;
                        qui_hora_inicio_unico = qui_hora_inicio_unico + 1;
                        if(qui_hora_inicio_unico>=24)
                        {
                          qui_hora_inicio_unico = 00;
                        }
                      }
                      if(qui_hora_fim_unico>=24)
                      {
                        qui_hora_fim_unico = 00;
                      }
                      if((qui_hora_inicio_unico == qui_hora_fim_unico))
                      {
                        qui_hora_fim_unico = qui_hora_fim_unico + 1;
                      }
                      if(qui_hora_inicio_unico <= 9)
                      {
                        if(qui_min_inicio_unico == 0)
                        {
                          qui_hora_inicio_unico_id.value = "0"+qui_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qui_hora_inicio_unico_id.value = "0"+qui_hora_inicio_unico+":"+qui_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(qui_min_inicio_unico == 0)
                        {
                          qui_hora_inicio_unico_id.value = qui_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          qui_hora_inicio_unico_id.value = qui_hora_inicio_unico+":"+qui_min_inicio_unico;
                        }
                      }
                      if(qui_hora_fim_unico <= 9)
                      {
                        if(qui_min_fim_unico == 0)
                        {
                          document.getElementById("qui-hora-fim").value = "0"+qui_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qui-hora-fim").value = "0"+qui_hora_fim_unico+":"+qui_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(qui_min_fim_unico == 0)
                        {
                          document.getElementById("qui-hora-fim").value = qui_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("qui-hora-fim").value = qui_hora_fim_unico+":"+qui_min_fim_unico;
                        }
                      }
                      console.log(qui_hora_inicio_unico+":"+qui_min_inicio_unico);
                      console.log(qui_hora_fim_unico+":"+qui_min_fim_unico);
                    }
                    </script>
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <h6>Hora de fim do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="qui-hora-fim" type="text" name="qui-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="qui_hora_fim_aluguel_mais()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="qui_hora_fim_aluguel_menos()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="sexta_botao_periodo()" id="sexta-bot-periodo" class="btn btn-outline-warning"><h6>Sex</h6></span>
                  <br><br><span style="color: white" id="sexta-aviso">Dia bloqueado</span><br><br>

                  <div id="sexta-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <br>
                        <span style="color: white; display: ">O horário disponível para esse dia da semana é de <span id="hora-inicio-sex-texto" style="color: #FFCE00">00:00</span> até <span id="hora-fim-sex-texto" style="color: #FFCE00">00:00</span>.<br></span>
                        <br>
                        <h6>Hora de início do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="sex-hora-inicio" type="text" name="sex-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="sex_hora_inicio_aluguel_mais()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="sex_hora_inicio_aluguel_menos()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                    <script>
                    var sex_hora_inicio_unico = 12;
                    var sex_hora_fim_unico = 18;
                    var sex_min_inicio_unico = 00;
                    var sex_min_fim_unico = 00;
                    var sex_hora_inicio_unico_id = document.getElementById("sex-hora-inicio");
                    var sex_hora_fim_unico_id = document.getElementById("sex-hora-fim");
                    function sex_hora_fim_aluguel_menos()
                    {
                      sex_min_fim_unico = sex_min_fim_unico - 30;
                      if(sex_min_fim_unico < 0)
                      {
                        sex_min_fim_unico = 30;
                        sex_hora_fim_unico = sex_hora_fim_unico - 1;
                        if(sex_hora_fim_unico<=0)
                        {
                          sex_hora_fim_unico = 23;
                          sex_min_fim_unico = 30;
                        }
                      }
                      if(sex_hora_inicio_unico<=0)
                      {
                        sex_hora_inicio_unico = 23;
                        sex_min_fim_unico = 30;
                      }
                      if((sex_hora_inicio_unico == sex_hora_fim_unico))
                      {
                        sex_hora_inicio_unico = sex_hora_inicio_unico - 1;
                        if(sex_hora_fim_unico<=0)
                        {
                          sex_hora_inicio_unico = 23;
                          sex_min_fim_unico = 00;
                        }
                      }
                      if(sex_hora_inicio_unico <= 9)
                      {
                        if(sex_min_inicio_unico == 0)
                        {
                          sex_hora_inicio_unico_id.value = "0"+sex_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sex_hora_inicio_unico_id.value = "0"+sex_hora_inicio_unico+":"+sex_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(sex_min_inicio_unico == 0)
                        {
                          sex_hora_inicio_unico_id.value = sex_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sex_hora_inicio_unico_id.value = sex_hora_inicio_unico+":"+sex_min_inicio_unico;
                        }
                      }
                      if(sex_hora_fim_unico <= 9)
                      {
                        if(sex_min_fim_unico == 0)
                        {
                          document.getElementById("sex-hora-fim").value = "0"+sex_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sex-hora-fim").value = "0"+sex_hora_fim_unico+":"+sex_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(sex_min_fim_unico == 0)
                        {
                          document.getElementById("sex-hora-fim").value = sex_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sex-hora-fim").value = sex_hora_fim_unico+":"+sex_min_fim_unico;
                        }
                      }
                    }
                    function sex_hora_fim_aluguel_mais()
                    {
                      sex_min_fim_unico = sex_min_fim_unico + 30;
                      if(sex_min_fim_unico >= 60)
                      {
                        sex_min_fim_unico = 00;
                        sex_hora_fim_unico = sex_hora_fim_unico + 1;
                        if(sex_hora_fim_unico>=24)
                        {
                          sex_hora_fim_unico = 00;
                        }
                      }
                      if(sex_hora_inicio_unico>=24)
                      {
                        sex_hora_inicio_unico = 00;
                      }
                      if((sex_hora_fim_unico == sex_hora_inicio_unico))
                      {
                        sex_hora_inicio_unico = sex_hora_inicio_unico + 1;
                      }
                      if(sex_hora_inicio_unico <= 9)
                      {
                        if(sex_min_inicio_unico == 0)
                        {
                          sex_hora_inicio_unico_id.value = "0"+sex_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sex_hora_inicio_unico_id.value = "0"+sex_hora_inicio_unico+":"+sex_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(sex_min_inicio_unico == 0)
                        {
                          sex_hora_inicio_unico_id.value = sex_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sex_hora_inicio_unico_id.value = sex_hora_inicio_unico+":"+sex_min_inicio_unico;
                        }
                      }
                      if(sex_hora_fim_unico <= 9)
                      {
                        if(sex_min_fim_unico == 0)
                        {
                          document.getElementById("sex-hora-fim").value = "0"+sex_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sex-hora-fim").value = "0"+sex_hora_fim_unico+":"+sex_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(sex_min_fim_unico == 0)
                        {
                          document.getElementById("sex-hora-fim").value = sex_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sex-hora-fim").value = sex_hora_fim_unico+":"+sex_min_fim_unico;
                        }
                      }
                    }
                    function sex_hora_inicio_aluguel_menos()
                    {
                      sex_min_inicio_unico = sex_min_inicio_unico - 30;
                      if(sex_min_inicio_unico < 0)
                      {
                        sex_min_inicio_unico = 30;
                        sex_hora_inicio_unico = sex_hora_inicio_unico - 1;
                        if(sex_hora_inicio_unico<=0)
                        {
                          sex_hora_inicio_unico = 23;
                          sex_min_inicio_unico = 30;
                        }
                      }
                      if(sex_hora_fim_unico<=0)
                      {
                        sex_hora_fim_unico = 23;
                        sex_min_inicio_unico = 30;
                      }
                      if((sex_hora_inicio_unico == sex_hora_fim_unico))
                      {
                        sex_hora_fim_unico = sex_hora_fim_unico - 1;
                        if(sex_hora_fim_unico<=0)
                        {
                          sex_hora_fim_unico = 23;
                          sex_min_inicio_unico = 00;
                        }
                      }
                      if(sex_hora_inicio_unico <= 9)
                      {
                        if(sex_min_inicio_unico == 0)
                        {
                          sex_hora_inicio_unico_id.value = "0"+sex_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sex_hora_inicio_unico_id.value = "0"+sex_hora_inicio_unico+":"+sex_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(sex_min_inicio_unico == 0)
                        {
                          sex_hora_inicio_unico_id.value = sex_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sex_hora_inicio_unico_id.value = sex_hora_inicio_unico+":"+sex_min_inicio_unico;
                        }
                      }
                      if(sex_hora_fim_unico <= 9)
                      {
                        if(sex_min_fim_unico == 0)
                        {
                          document.getElementById("sex-hora-fim").value = "0"+sex_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sex-hora-fim").value = "0"+sex_hora_fim_unico+":"+sex_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(sex_min_fim_unico == 0)
                        {
                          document.getElementById("sex-hora-fim").value = sex_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sex-hora-fim").value = sex_hora_fim_unico+":"+sex_min_fim_unico;
                        }
                      }
                    }
                    function sex_hora_inicio_aluguel_mais()
                    {
                      sex_min_inicio_unico = sex_min_inicio_unico + 30;
                      if(sex_min_inicio_unico >= 60)
                      {
                        sex_min_inicio_unico = 00;
                        sex_hora_inicio_unico = sex_hora_inicio_unico + 1;
                        if(sex_hora_inicio_unico>=24)
                        {
                          sex_hora_inicio_unico = 00;
                        }
                      }
                      if(sex_hora_fim_unico>=24)
                      {
                        sex_hora_fim_unico = 00;
                      }
                      if((sex_hora_inicio_unico == sex_hora_fim_unico))
                      {
                        sex_hora_fim_unico = sex_hora_fim_unico + 1;
                      }
                      if(sex_hora_inicio_unico <= 9)
                      {
                        if(sex_min_inicio_unico == 0)
                        {
                          sex_hora_inicio_unico_id.value = "0"+sex_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sex_hora_inicio_unico_id.value = "0"+sex_hora_inicio_unico+":"+sex_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(sex_min_inicio_unico == 0)
                        {
                          sex_hora_inicio_unico_id.value = sex_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sex_hora_inicio_unico_id.value = sex_hora_inicio_unico+":"+sex_min_inicio_unico;
                        }
                      }
                      if(sex_hora_fim_unico <= 9)
                      {
                        if(sex_min_fim_unico == 0)
                        {
                          document.getElementById("sex-hora-fim").value = "0"+sex_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sex-hora-fim").value = "0"+sex_hora_fim_unico+":"+sex_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(sex_min_fim_unico == 0)
                        {
                          document.getElementById("sex-hora-fim").value = sex_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sex-hora-fim").value = sex_hora_fim_unico+":"+sex_min_fim_unico;
                        }
                      }
                      console.log(sex_hora_inicio_unico+":"+sex_min_inicio_unico);
                      console.log(sex_hora_fim_unico+":"+sex_min_fim_unico);
                    }
                    </script>
                    <br>
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <h6>Hora de fim do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="sex-hora-fim" type="text" name="sex-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="sex_hora_fim_aluguel_mais()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="sex_hora_fim_aluguel_menos()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="sabado_botao_periodo()" id="sabado-bot-periodo" class="btn btn-outline-warning"><h6>Sab</h6></span>
                  <br><br><span style="color: white" id="sabado-aviso">Dia bloqueado</span><br><br>

                  <div id="sabado-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <br>
                        <span style="color: white; display: ">O horário disponível para esse dia da semana é de <span id="hora-inicio-sab-texto" style="color: #FFCE00">00:00</span> até <span id="hora-fim-sab-texto" style="color: #FFCE00">00:00</span>.<br></span>
                        <br>
                        <h6>Hora de início do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="sab-hora-inicio" type="text" name="sab-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="sab_hora_inicio_aluguel_mais()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="sab_hora_inicio_aluguel_menos()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                    <br>
                    <script>
                    var sab_hora_inicio_unico = 12;
                    var sab_hora_fim_unico = 18;
                    var sab_min_inicio_unico = 00;
                    var sab_min_fim_unico = 00;
                    var sab_hora_inicio_unico_id = document.getElementById("sab-hora-inicio");
                    var sab_hora_fim_unico_id = document.getElementById("sab-hora-fim");
                    function sab_hora_fim_aluguel_menos()
                    {
                      sab_min_fim_unico = sab_min_fim_unico - 30;
                      if(sab_min_fim_unico < 0)
                      {
                        sab_min_fim_unico = 30;
                        sab_hora_fim_unico = sab_hora_fim_unico - 1;
                        if(sab_hora_fim_unico<=0)
                        {
                          sab_hora_fim_unico = 23;
                          sab_min_fim_unico = 30;
                        }
                      }
                      if(sab_hora_inicio_unico<=0)
                      {
                        sab_hora_inicio_unico = 23;
                        sab_min_fim_unico = 30;
                      }
                      if((sab_hora_inicio_unico == sab_hora_fim_unico))
                      {
                        sab_hora_inicio_unico = sab_hora_inicio_unico - 1;
                        if(sab_hora_fim_unico<=0)
                        {
                          sab_hora_inicio_unico = 23;
                          sab_min_fim_unico = 00;
                        }
                      }
                      if(sab_hora_inicio_unico <= 9)
                      {
                        if(sab_min_inicio_unico == 0)
                        {
                          sab_hora_inicio_unico_id.value = "0"+sab_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sab_hora_inicio_unico_id.value = "0"+sab_hora_inicio_unico+":"+sab_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(sab_min_inicio_unico == 0)
                        {
                          sab_hora_inicio_unico_id.value = sab_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sab_hora_inicio_unico_id.value = sab_hora_inicio_unico+":"+sab_min_inicio_unico;
                        }
                      }
                      if(sab_hora_fim_unico <= 9)
                      {
                        if(sab_min_fim_unico == 0)
                        {
                          document.getElementById("sab-hora-fim").value = "0"+sab_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sab-hora-fim").value = "0"+sab_hora_fim_unico+":"+sab_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(sab_min_fim_unico == 0)
                        {
                          document.getElementById("sab-hora-fim").value = sab_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sab-hora-fim").value = sab_hora_fim_unico+":"+sab_min_fim_unico;
                        }
                      }
                    }
                    function sab_hora_fim_aluguel_mais()
                    {
                      sab_min_fim_unico = sab_min_fim_unico + 30;
                      if(sab_min_fim_unico >= 60)
                      {
                        sab_min_fim_unico = 00;
                        sab_hora_fim_unico = sab_hora_fim_unico + 1;
                        if(sab_hora_fim_unico>=24)
                        {
                          sab_hora_fim_unico = 00;
                        }
                      }
                      if(sab_hora_inicio_unico>=24)
                      {
                        sab_hora_inicio_unico = 00;
                      }
                      if((sab_hora_fim_unico == sab_hora_inicio_unico))
                      {
                        sab_hora_inicio_unico = sab_hora_inicio_unico + 1;
                      }
                      if(sab_hora_inicio_unico <= 9)
                      {
                        if(sab_min_inicio_unico == 0)
                        {
                          sab_hora_inicio_unico_id.value = "0"+sab_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sab_hora_inicio_unico_id.value = "0"+sab_hora_inicio_unico+":"+sab_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(sab_min_inicio_unico == 0)
                        {
                          sab_hora_inicio_unico_id.value = sab_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sab_hora_inicio_unico_id.value = sab_hora_inicio_unico+":"+sab_min_inicio_unico;
                        }
                      }
                      if(sab_hora_fim_unico <= 9)
                      {
                        if(sab_min_fim_unico == 0)
                        {
                          document.getElementById("sab-hora-fim").value = "0"+sab_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sab-hora-fim").value = "0"+sab_hora_fim_unico+":"+sab_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(sab_min_fim_unico == 0)
                        {
                          document.getElementById("sab-hora-fim").value = sab_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sab-hora-fim").value = sab_hora_fim_unico+":"+sab_min_fim_unico;
                        }
                      }
                    }
                    function sab_hora_inicio_aluguel_menos()
                    {
                      sab_min_inicio_unico = sab_min_inicio_unico - 30;
                      if(sab_min_inicio_unico < 0)
                      {
                        sab_min_inicio_unico = 30;
                        sab_hora_inicio_unico = sab_hora_inicio_unico - 1;
                        if(sab_hora_inicio_unico<=0)
                        {
                          sab_hora_inicio_unico = 23;
                          sab_min_inicio_unico = 30;
                        }
                      }
                      if(sab_hora_fim_unico<=0)
                      {
                        sab_hora_fim_unico = 23;
                        sab_min_inicio_unico = 30;
                      }
                      if((sab_hora_inicio_unico == sab_hora_fim_unico))
                      {
                        sab_hora_fim_unico = sab_hora_fim_unico - 1;
                        if(sab_hora_fim_unico<=0)
                        {
                          sab_hora_fim_unico = 23;
                          sab_min_inicio_unico = 00;
                        }
                      }
                      if(sab_hora_inicio_unico <= 9)
                      {
                        if(sab_min_inicio_unico == 0)
                        {
                          sab_hora_inicio_unico_id.value = "0"+sab_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sab_hora_inicio_unico_id.value = "0"+sab_hora_inicio_unico+":"+sab_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(sab_min_inicio_unico == 0)
                        {
                          sab_hora_inicio_unico_id.value = sab_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sab_hora_inicio_unico_id.value = sab_hora_inicio_unico+":"+sab_min_inicio_unico;
                        }
                      }
                      if(sab_hora_fim_unico <= 9)
                      {
                        if(sab_min_fim_unico == 0)
                        {
                          document.getElementById("sab-hora-fim").value = "0"+sab_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sab-hora-fim").value = "0"+sab_hora_fim_unico+":"+sab_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(sab_min_fim_unico == 0)
                        {
                          document.getElementById("sab-hora-fim").value = sab_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sab-hora-fim").value = sab_hora_fim_unico+":"+sab_min_fim_unico;
                        }
                      }
                    }
                    function sab_hora_inicio_aluguel_mais()
                    {
                      sab_min_inicio_unico = sab_min_inicio_unico + 30;
                      if(sab_min_inicio_unico >= 60)
                      {
                        sab_min_inicio_unico = 00;
                        sab_hora_inicio_unico = sab_hora_inicio_unico + 1;
                        if(sab_hora_inicio_unico>=24)
                        {
                          sab_hora_inicio_unico = 00;
                        }
                      }
                      if(sab_hora_fim_unico>=24)
                      {
                        sab_hora_fim_unico = 00;
                      }
                      if((sab_hora_inicio_unico == sab_hora_fim_unico))
                      {
                        sab_hora_fim_unico = sab_hora_fim_unico + 1;
                      }
                      if(sab_hora_inicio_unico <= 9)
                      {
                        if(sab_min_inicio_unico == 0)
                        {
                          sab_hora_inicio_unico_id.value = "0"+sab_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sab_hora_inicio_unico_id.value = "0"+sab_hora_inicio_unico+":"+sab_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(sab_min_inicio_unico == 0)
                        {
                          sab_hora_inicio_unico_id.value = sab_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          sab_hora_inicio_unico_id.value = sab_hora_inicio_unico+":"+sab_min_inicio_unico;
                        }
                      }
                      if(sab_hora_fim_unico <= 9)
                      {
                        if(sab_min_fim_unico == 0)
                        {
                          document.getElementById("sab-hora-fim").value = "0"+sab_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sab-hora-fim").value = "0"+sab_hora_fim_unico+":"+sab_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(sab_min_fim_unico == 0)
                        {
                          document.getElementById("sab-hora-fim").value = sab_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("sab-hora-fim").value = sab_hora_fim_unico+":"+sab_min_fim_unico;
                        }
                      }
                      console.log(sab_hora_inicio_unico+":"+sab_min_inicio_unico);
                      console.log(sab_hora_fim_unico+":"+sab_min_fim_unico);
                    }
                    </script>
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <h6>Hora de fim do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="sab-hora-fim" type="text" name="sab-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="sab_hora_fim_aluguel_mais()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="sab_hora_fim_aluguel_menos()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="domingo_botao_periodo()" id="domingo-bot-periodo" class="btn btn-outline-warning"><h6>Dom</h6></span>
                  <br><br><span style="color: white" id="domingo-aviso">Dia bloqueado</span><br><br>

                  <div id="domingo-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <br>
                        <span style="color: white; display: ">O horário disponível para esse dia da semana é de <span id="hora-inicio-dom-texto" style="color: #FFCE00">00:00</span> até <span id="hora-fim-dom-texto" style="color: #FFCE00">00:00</span>.<br></span>
                        <br>
                        <h6>Hora de início do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="dom-hora-inicio" type="text" name="dom-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="dom_hora_inicio_aluguel_mais()" class="btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="dom_hora_inicio_aluguel_menos()" class="btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                    <br>
                    <script>
                    var dom_hora_inicio_unico = 12;
                    var dom_hora_fim_unico = 18;
                    var dom_min_inicio_unico = 00;
                    var dom_min_fim_unico = 00;
                    var dom_hora_inicio_unico_id = document.getElementById("dom-hora-inicio");
                    var dom_hora_fim_unico_id = document.getElementById("dom-hora-fim");
                    function dom_hora_fim_aluguel_menos()
                    {
                      dom_min_fim_unico = dom_min_fim_unico - 30;
                      if(dom_min_fim_unico < 0)
                      {
                        dom_min_fim_unico = 30;
                        dom_hora_fim_unico = dom_hora_fim_unico - 1;
                        if(dom_hora_fim_unico<=0)
                        {
                          dom_hora_fim_unico = 23;
                          dom_min_fim_unico = 30;
                        }
                      }
                      if(dom_hora_inicio_unico<=0)
                      {
                        dom_hora_inicio_unico = 23;
                        dom_min_fim_unico = 30;
                      }
                      if((dom_hora_inicio_unico == dom_hora_fim_unico))
                      {
                        dom_hora_inicio_unico = dom_hora_inicio_unico - 1;
                        if(dom_hora_fim_unico<=0)
                        {
                          dom_hora_inicio_unico = 23;
                          dom_min_fim_unico = 00;
                        }
                      }
                      if(dom_hora_inicio_unico <= 9)
                      {
                        if(dom_min_inicio_unico == 0)
                        {
                          dom_hora_inicio_unico_id.value = "0"+dom_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          dom_hora_inicio_unico_id.value = "0"+dom_hora_inicio_unico+":"+dom_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(dom_min_inicio_unico == 0)
                        {
                          dom_hora_inicio_unico_id.value = dom_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          dom_hora_inicio_unico_id.value = dom_hora_inicio_unico+":"+dom_min_inicio_unico;
                        }
                      }
                      if(dom_hora_fim_unico <= 9)
                      {
                        if(dom_min_fim_unico == 0)
                        {
                          document.getElementById("dom-hora-fim").value = "0"+dom_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("dom-hora-fim").value = "0"+dom_hora_fim_unico+":"+dom_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(dom_min_fim_unico == 0)
                        {
                          document.getElementById("dom-hora-fim").value = dom_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("dom-hora-fim").value = dom_hora_fim_unico+":"+dom_min_fim_unico;
                        }
                      }
                    }
                    function dom_hora_fim_aluguel_mais()
                    {
                      dom_min_fim_unico = dom_min_fim_unico + 30;
                      if(dom_min_fim_unico >= 60)
                      {
                        dom_min_fim_unico = 00;
                        dom_hora_fim_unico = dom_hora_fim_unico + 1;
                        if(dom_hora_fim_unico>=24)
                        {
                          dom_hora_fim_unico = 00;
                        }
                      }
                      if(dom_hora_inicio_unico>=24)
                      {
                        dom_hora_inicio_unico = 00;
                      }
                      if((dom_hora_fim_unico == dom_hora_inicio_unico))
                      {
                        dom_hora_inicio_unico = dom_hora_inicio_unico + 1;
                      }
                      if(dom_hora_inicio_unico <= 9)
                      {
                        if(dom_min_inicio_unico == 0)
                        {
                          dom_hora_inicio_unico_id.value = "0"+dom_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          dom_hora_inicio_unico_id.value = "0"+dom_hora_inicio_unico+":"+dom_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(dom_min_inicio_unico == 0)
                        {
                          dom_hora_inicio_unico_id.value = dom_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          dom_hora_inicio_unico_id.value = dom_hora_inicio_unico+":"+dom_min_inicio_unico;
                        }
                      }
                      if(dom_hora_fim_unico <= 9)
                      {
                        if(dom_min_fim_unico == 0)
                        {
                          document.getElementById("dom-hora-fim").value = "0"+dom_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("dom-hora-fim").value = "0"+dom_hora_fim_unico+":"+dom_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(dom_min_fim_unico == 0)
                        {
                          document.getElementById("dom-hora-fim").value = dom_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("dom-hora-fim").value = dom_hora_fim_unico+":"+dom_min_fim_unico;
                        }
                      }
                    }
                    function dom_hora_inicio_aluguel_menos()
                    {
                      dom_min_inicio_unico = dom_min_inicio_unico - 30;
                      if(dom_min_inicio_unico < 0)
                      {
                        dom_min_inicio_unico = 30;
                        dom_hora_inicio_unico = dom_hora_inicio_unico - 1;
                        if(dom_hora_inicio_unico<=0)
                        {
                          dom_hora_inicio_unico = 23;
                          dom_min_inicio_unico = 30;
                        }
                      }
                      if(dom_hora_fim_unico<=0)
                      {
                        dom_hora_fim_unico = 23;
                        dom_min_inicio_unico = 30;
                      }
                      if((dom_hora_inicio_unico == dom_hora_fim_unico))
                      {
                        dom_hora_fim_unico = dom_hora_fim_unico - 1;
                        if(dom_hora_fim_unico<=0)
                        {
                          dom_hora_fim_unico = 23;
                          dom_min_inicio_unico = 00;
                        }
                      }
                      if(dom_hora_inicio_unico <= 9)
                      {
                        if(dom_min_inicio_unico == 0)
                        {
                          dom_hora_inicio_unico_id.value = "0"+dom_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          dom_hora_inicio_unico_id.value = "0"+dom_hora_inicio_unico+":"+dom_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(dom_min_inicio_unico == 0)
                        {
                          dom_hora_inicio_unico_id.value = dom_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          dom_hora_inicio_unico_id.value = dom_hora_inicio_unico+":"+dom_min_inicio_unico;
                        }
                      }
                      if(dom_hora_fim_unico <= 9)
                      {
                        if(dom_min_fim_unico == 0)
                        {
                          document.getElementById("dom-hora-fim").value = "0"+dom_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("dom-hora-fim").value = "0"+dom_hora_fim_unico+":"+dom_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(dom_min_fim_unico == 0)
                        {
                          document.getElementById("dom-hora-fim").value = dom_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("dom-hora-fim").value = dom_hora_fim_unico+":"+dom_min_fim_unico;
                        }
                      }
                    }
                    function dom_hora_inicio_aluguel_mais()
                    {
                      dom_min_inicio_unico = dom_min_inicio_unico + 30;
                      if(dom_min_inicio_unico >= 60)
                      {
                        dom_min_inicio_unico = 00;
                        dom_hora_inicio_unico = dom_hora_inicio_unico + 1;
                        if(dom_hora_inicio_unico>=24)
                        {
                          dom_hora_inicio_unico = 00;
                        }
                      }
                      if(dom_hora_fim_unico>=24)
                      {
                        dom_hora_fim_unico = 00;
                      }
                      if((dom_hora_inicio_unico == dom_hora_fim_unico))
                      {
                        dom_hora_fim_unico = dom_hora_fim_unico + 1;
                      }
                      if(dom_hora_inicio_unico <= 9)
                      {
                        if(dom_min_inicio_unico == 0)
                        {
                          dom_hora_inicio_unico_id.value = "0"+dom_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          dom_hora_inicio_unico_id.value = "0"+dom_hora_inicio_unico+":"+dom_min_inicio_unico;
                        }
                      }
                      else
                      {
                        if(dom_min_inicio_unico == 0)
                        {
                          dom_hora_inicio_unico_id.value = dom_hora_inicio_unico+":"+"00";
                        }
                        else
                        {
                          dom_hora_inicio_unico_id.value = dom_hora_inicio_unico+":"+dom_min_inicio_unico;
                        }
                      }
                      if(dom_hora_fim_unico <= 9)
                      {
                        if(dom_min_fim_unico == 0)
                        {
                          document.getElementById("dom-hora-fim").value = "0"+dom_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("dom-hora-fim").value = "0"+dom_hora_fim_unico+":"+dom_min_fim_unico;
                        }
                      }
                      else
                      {
                        if(dom_min_fim_unico == 0)
                        {
                          document.getElementById("dom-hora-fim").value = dom_hora_fim_unico+":"+"00";
                        }
                        else
                        {
                          document.getElementById("dom-hora-fim").value = dom_hora_fim_unico+":"+dom_min_fim_unico;
                        }
                      }
                      console.log(dom_hora_inicio_unico+":"+dom_min_inicio_unico);
                      console.log(dom_hora_fim_unico+":"+dom_min_fim_unico);
                    }
                    </script>
                    <div class="row px-2">
                      <div class="col-12" style="color: #FFCE00">
                        <h6>Hora de fim do Aluguel</h6>
                      </div>
                      <div class="col-12">
                        <input id="dom-hora-fim" type="text" name="dom-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                        <br>
                      </div>
                      <div class="col-12">
                        <span onclick="dom_hora_fim_aluguel_mais()" class="btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                        <span onclick="dom_hora_fim_aluguel_menos()" class="btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-12 py-4">
                  <h6 style="color: white">Selecione quantas semanas seguidas o espaço será alugado</h6>
                  <br>
                  <div class="row text-center justify-content-center">
                    <div class="col-6">
                      <div class="row justify-content-center px-2">
                        <div class="col-10">
                          <input type="text" id="semanas-seguidas" maxlength="2"name="semanas-unico" class="form-control" style="text-align: center" readonly value="1">
                          <br>
                          <script>
                          var semanasSeguidas = 1;
                          function semana_reincidente_mais()
                          {
                            semanasSeguidas = semanasSeguidas + 1;
                            if(semanasSeguidas >= 12)
                            {
                              semanasSeguidas = 12;
                            }
                            if(semanasSeguidas <= 0)
                            {
                              semanasSeguidas = 1;
                            }
                            document.getElementById("semanas-seguidas").value = semanasSeguidas;
                          }
                          function semana_reincidente_menos()
                          {
                            semanasSeguidas = semanasSeguidas - 1;
                            if(semanasSeguidas >= 12)
                            {
                              semanasSeguidas = 12;
                            }
                            if(semanasSeguidas <= 0)
                            {
                              semanasSeguidas = 1;
                            }
                            document.getElementById("semanas-seguidas").value = semanasSeguidas;
                          }
                          </script>
                        </div>
                        <div class="col-12">
                          <span onclick="semana_reincidente_mais()" class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                          <span onclick="semana_reincidente_menos()" class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                      <br>
                      <h6 id="tempoDeAlguel" style="color: #FFC107"></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

    <div class="row p-3 text-center justify-content-center" style="border-top: solid; border-width: 2px; border-color: #FFC107; border-bottom: solid; border-width: 2px; border-color: #FFC107;background-color: black">
      <div class="col-12 text-center justify-content-center">
        <h5 style="color: white">Preço total: <br class="mobile"> <span style="color: #FFCE00" class="h4" id="preco-total">R$ <?php //echo $array['7']?></span> </h5>
        <br>
        <span class="ml-3 btn btn-outline-warning" onclick="completarOUanunciar()">Alugue Agora</span>
      </div>
    </div>
  </div>

</div>

<div class="row my-5 justify-content-center">
  <div class="col-12">
    <h2 class="mb-5"><b>Anúncios Similares:</b></h2>
    <div class="row">
        <?php $arrayParecido=$busca->buscarEspacoParecido($conn,$array[9]); $contParecido = 0; ?>

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div style="background-color: black; height: 480px">
          <a href="<?php echo "http://localhost/yourdev/Locou/anuncio.php?id=".$arrayParecido[$contParecido++]?>" style="text-decoration: none;">
            <div class="row">
              <div class="col-12">
                <img src="<?php echo $prefixo.$arrayParecido[$contParecido++] ?>" class="img-fluid" style="height: 350px; width: 100%; object-fit: cover;">

              </div>
              <div class="col-12">
                <h5 style="color:white">
                  <?php echo $arrayParecido[$contParecido++] ?>
                  <br>
                  <span style="color:grey"> <?php echo$arrayParecido[$contParecido++] ?> | <?php echo $arrayParecido[$contParecido++] ?> </span>
                </h5>
                <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$  <?php  echo $arrayParecido[$contParecido++] ?></span> por hora </h6>
              </div>
            </div>
          </a>
        </div>
        <br>
      </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div style="background-color: black; height: 480px">
          <a href="<?php echo "http://localhost/yourdev/Locou/anuncio.php?id=".$arrayParecido[$contParecido++]?>" style="text-decoration: none;">
            <div class="row">
              <div class="col-12">
                <img src="<?php echo $prefixo.$arrayParecido[$contParecido++] ?>" class="img-fluid" style="height: 350px; width: 100%; object-fit: cover;">

              </div>
              <div class="col-12">
                <h5 style="color:white">
                  <?php echo $arrayParecido[$contParecido++] ?>
                  <br>
                  <span style="color:grey"> <?php echo$arrayParecido[$contParecido++] ?> | <?php echo $arrayParecido[$contParecido++] ?> </span>
                </h5>
                <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$   <?php echo $arrayParecido[$contParecido++] ?></span> por hora </h6>
              </div>
            </div>
          </a>
        </div>
        <br>
      </div>


       <div class="col-lg-3 col-md-6 col-sm-6">
        <div style="background-color: black; height: 480px">
          <a href="<?php echo "http://localhost/yourdev/Locou/anuncio.php?id=".$arrayParecido[$contParecido++]?>" style="text-decoration: none;">
            <div class="row">
              <div class="col-12">
                <img src="<?php echo $prefixo.$arrayParecido[$contParecido++] ?>" class="img-fluid" style="height: 350px; width: 100%; object-fit: cover;">

              </div>
              <div class="col-12">
                <h5 style="color:white">
                  <?php echo $arrayParecido[$contParecido++] ?>
                  <br>
                  <span style="color:grey"> <?php echo$arrayParecido[$contParecido++] ?> | <?php echo $arrayParecido[$contParecido++] ?> </span>
                </h5>
                <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$   <?php  echo $arrayParecido[$contParecido++] ?></span> por hora </h6>
              </div>
            </div>
          </a>
        </div>
        <br>
      </div>

       <div class="col-lg-3 col-md-6 col-sm-6">
        <div style="background-color: black; height: 480px">
          <a href="<?php echo "http://localhost/yourdev/Locou/anuncio.php?id=".$arrayParecido[$contParecido++]?>" style="text-decoration: none;">
            <div class="row">
              <div class="col-12">
                <img src="<?php echo $prefixo.$arrayParecido[$contParecido++] ?>" class="img-fluid" style="height: 350px; width: 100%; object-fit: cover;">

              </div>
              <div class="col-12">
                <h5 style="color:white">
                  <?php echo $arrayParecido[$contParecido++] ?>
                  <br>
                  <span style="color:grey"> <?php echo$arrayParecido[$contParecido++] ?> | <?php echo $arrayParecido[$contParecido++] ?> </span>
                </h5>
                <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$   <?php  echo $arrayParecido[$contParecido++] ?></span> por hora </h6>
              </div>
            </div>
          </a>
        </div>
        <br>
      </div>

    </div>
  </div>
</div>


</div>

</div>

<div class="row justify-content-center" style="color: white;background-color: black">
  <div class="col-3">
  </div>
  <div class="col-lg-6 col-md-10 col-sm-12">
    <div class="row" style="margin-top: 2vw; margin-bottom: 1.5vw">

      <div class="col-lg-4 col-md-4 col-sm-12" style="border-right: 2px solid grey;">
        <img class="logo-navbar" src="img/locou_logo.png">
        <br><br>
        <h6 style="color: grey">Conectando pessoas produtivas a espaços ociosos</h6>
        <br><br>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6" style="border-right: 2px solid grey;">
        <h6>
          <a href="#" style="color: white">Termo de Uso</a>
          <br><br>
          <a href="#" style="color: white">Política de Privacidade</a>
          <br><br>
          <a href="anunciar.php" style="color: white">Anuncie Aqui</a>
          <br><br>
          <a href="resultado.php" style="color: white">Procure um espaço</a>
          <br><br>
          <a href="mailto:someone@contato@locou.co" target="_top" style="color: white">contato@locou.co  </a>
        </h6>
        <br><br>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-6 text-left">
        <h6 class="text-center" style="color: grey">
          Nossas Redes sociais
          <br><br>
        </h6>
        <h6 class="text-center">
          <a class="px-2" href="https://www.facebook.com/locou.co/" style="color: white;text-decoration: none"><i class="fa fa-facebook-square" style="color: #6092F7; font-size: 200%"></i></a>
          <a class="px-2" href="https://www.linkedin.com/company/locou/" style="color: white;text-decoration: none"><i class="fa fa-linkedin" style="color: #0077B5; font-size: 200%"></i></a>
        </h6>
      </div>

    </div>
  </div>
  <div class="col-3">
  </div>
</div>

</div>


<script>
<?php if($_GET['emailEnviado'] == true || $_GET['emailEnviado'] == 'true')
{
  echo ('<script type=\'text/javascript\'>$(document).ready(function(){$(\'#emailEnviado\').modal(\'show\');});</script>');
} ?>
$( document ).ready(function() {
  $(function() {
    $('div.panorama').paver();
    $("#encrypt").click(function() {
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
        });
  });
  calcularPreco();
  dias_bloqueados();
  horaDispReincidente();
  comodidadesLocal();
});
$('.custom-file-input').on('change',function(){
  var foto = $(this).val().split('\\').pop();
  var label = document.getElementById($(this).attr('id')+"-label");
  label.innerHTML = foto;
  console.log($(this).attr('id'));
  console.log($(this).attr('id')+"-label");
  console.log(foto);
})
</script>
<script>
function completarOUanunciar(){


  var logado = "<?php  echo $session -> vereficarLogin(); ?>" //false caso nao logado, id caso logado
  var clienteCadastrado = "<?php $sessionAux = new FunctionsSession();
  echo $sessionAux->verificarUsuarioCliente($conn,5); ?>"

  if(logado == "false"){

    $("#loginPop").modal(); // Não logado

  }else{

    if (clienteCadastrado == "false") {

      $("#completarCadastro").modal(); // Não logado

    }else{

      document.getElementById("form-pagamento").submit();

    }

  }


}
</script>

</form>

<?php

if ($status == null || $status == "") {

  return;
}else{
  if ($status != true && $status != false) {

    return;
  }else{

    if ($status == 'false') {

      if($funcao=='login'){
        echo ( "<script type='text/javascript'>
        $(document).ready(function(){
          $('#loginPop').modal('show');
        });
        </script>");
      }

      if($funcao=='cadastro'){
        echo ( "<script type='text/javascript'>
        $(document).ready(function(){
          $('#cadastroPop').modal('show');
        });
        </script>");
      }



    }

  }
}
?>

<?php echo "ashas". $session->vereficarLogin() ?>
<?php echo $session -> verificarUsuarioCliente($conn,$_SESSION['id']); ?>

</body>
