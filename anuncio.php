<!DOCTYPE html>

<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once 'FunctionsSession.php';
require_once 'FunctionsDB.php';
require_once 'BuscarEspacos.php';

$prefixo = "http://www.yourdev.com.br/clientes/locou/img/anuncio/";

$session = new FunctionsSession();
$session->iniciarSession();

$db = new FunctionsDB();
$conn = $db->conectDB();

$busca = new BuscarEspacos();

$idAnuncio = $_GET['id'];

$array = $busca->retornarAnuncioBasicoId($conn,$idAnuncio);
$status = $_GET['status'];
$funcao= $_GET['funcao'];


//  print_r ($session->vereficarLogin());
//print_r ($array) ;

$busca = new BuscarEspacos();
$arrayGeral = $busca->retornarDescGeral($conn, $idAnuncio);


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
  <script>
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
    <span style="float:right;" class="navbar-brand menu-navbar mr-5 ml-auto">
      <a class="mx-3">Sobre</a>
      <a class="mx-3">Como Funciona</a>
      <a href="resultado.php" style="color:white" class="mx-3">Procurar Espaços</a>
      <a href="anunciar.php"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>

      <?php if($_SESSION['id']!=null && $_SESSION['id'] != "" ){ ?>
        <a class="ml-5"><img class="rounded-circle" src="<?php echo $prefixo.$_SESSION['foto'] ?>" style="height: 40px"></a>

        <a class="mx-3"><i style="font-size: 120%" class="far fa-bell"></i></a>
      <?php } ?>
      <?php if($_SESSION['id']==null && $_SESSION['id'] == "" ){ ?>
        <span class="ml-3 btn btn-outline-warning" data-toggle="modal" data-target="#cadastroPop">Não é cadastrado?</span>
        <span class="ml-3 btn btn-outline-warning" data-toggle="modal" data-target="#loginPop">Já sou cadastrado</span>
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
          <a class="mx-2">Sobre</a>
          <a class="mx-2">Como Funciona</a>
          <a href="resultado.php" style="color:white" class="mx-2">Procurar Espaços</a>
          <br><br>
          <?php if($_SESSION['id']!=null && $_SESSION['id'] != "" ){ ?>
            <a class="ml-5"><img class="rounded-circle" src="<?php echo $prefixo.$_SESSION['foto'] ?>" style="height: 40px"></a>

            <a class="mx-3"><i style="font-size: 120%" class="far fa-bell"></i></a>
          <?php } ?>
          <br><br>
          <?php if($_SESSION['id']==null && $_SESSION['id'] == "" ){ ?>
            <span class="ml-3 btn btn-outline-warning" data-toggle="modal" data-target="#cadastroPop">Não é cadastrado?</span>
            <span class="ml-3 btn btn-outline-warning" data-toggle="modal" data-target="#loginPop">Já sou cadastrado</span>
          <?php } ?>
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
            <form action="CadastrarUsuario.php?pag=index" method="post">
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



  <!-- Titulo Anuncio -->

  <div class="container-fluid justify-content-center text-center" style="margin-top: 1.5vw">
    <div class="row">

      <div class="col-2">
      </div>
      <div class="col-8">
        <h1><b><?php $cont = 4; echo $array[$cont]?></b></h1>
        <h5 style="color: grey"><?php $cont++; echo $array[$cont]?> | <?php $cont++; echo $array[$cont]?> | <?php $cont++; $cont++; echo $array[$cont]?> <!-- <?//php $cont++; echo $array[$cont]?> --> </h5>
        <h6 style="font-weight: 300; font-size: 150%; color: #FFCE00" >&#9733;&#9733;&#9733;&#9733;&#9733; <span style="color: grey; font-size: 15px"> - 5.0 <br> (2 avaliações)</span></h6>
      </div>
      <div class="col-2">
      </div>

    </div>
  </div>

  <!-- Fotos e dados básicos -->
  <form id="form-pagamento" action="pagamento.php" method="post">

    <div class="px-3 container-fluid justify-content-center text-center" style="margin-top: 1vw; border-top: 2.5px solid #FFCE00;">
      <br>
      <div class="row">
        <div class="col-12">

          <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="c-wrapper">
                <div id="carousel-fotos" class="carousel" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-fotos" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-fotos" data-slide-to="1"></li>
                    <li data-target="#carousel-fotos" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner" style="width:100%; height: 25vw">
                    <div class="carousel-item active">
                      <img class="d-block img-fluid" src="<?php $cont = 1; echo $prefixo.$array[$cont++]?>">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block img-fluid" src="<?php  echo $prefixo.$array[$cont++]?>">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block img-fluid" src="<?php  echo $prefixo.$array[$cont++]?>">
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

            <div class="col-lg-6 col-md-6 col-sm-12 text-center justify-content-center ">
              <div class="col-12" >
                <div class="row">
                  <div class="col-12 mt-2">
                    <div class="row text-left">
                      <div class="col-12" style="border-bottom: solid; border-width: 2px; border-color: #FFC107;">
                        <!-- <h4><?php /* $cont = 5; echo $array[$cont] */ ?></h4> -->
                        <h2><?php $cont = 4 ; echo $array[$cont]?> </h2>
                        <h6 style="color: grey"><?php $cont++; $cont++; echo $array[$cont]?> | <?php $cont++; $cont++; echo $array[$cont]?></h6>
                      </div>
                      <div class="col-12 pt-4">
                        <div class="row text-center justify-content-center">
                          <div class="col-4 px-3 py-2">
                            <h6 style="color: grey; font-weight: 300; font-size:90%">Metragem<br></h6>
                            <h5 style=";font-size:90%"><i class="fas fa-home"></i> <br> <?php $cont=0; echo $arrayGeral[$cont++] ?> M²</h5>
                          </div>

                          <?php if ($arrayGeral[$cont++] == "sim"){ ?>

                            <div class="col-4 px-3 py-2">
                              <h6 style="color: grey; font-weight: 300 ;font-size:90%">Possui<br></h6>
                              <h5 style=";font-size:90%"><i class="fas fa-street-view"></i> <br> Recepção</h5>
                            </div>

                          <?php } if ($arrayGeral[$cont++] == "sim"){ ?>

                            <div class="col-4 px-3 py-2">
                              <h6 style="color: grey; font-weight: 300;font-size:90% ">Possui<br></h6>
                              <h5 style=";font-size:90%"><i class="fas fa-female"></i> <i class="fas fa-male"></i> <br> Banheiro comum</h5>
                            </div>

                          <?php } if ($arrayGeral[$cont++] == "sim"){ ?>

                            <div class="col-4 px-3 py-2">
                              <h6 style="color: grey; font-weight: 300;font-size:90%">Possui<br></h6>
                              <h5 style=";font-size:90%"><i class="fas fa-female"></i> | <i class="fas fa-male"></i> <br> Banheiro privativo</h5>
                            </div>

                          <?php } if ($arrayGeral[$cont] == "predio"){ ?>

                            <div class="col-4 px-3 py-2">
                              <h6 style="color: grey; font-weight: 300;font-size:90%">O local<br></h6>
                              <h5 style=";font-size:90%"><i class="fas fa-building"></i> <br> É um Prédio</h5>
                            </div>

                            <?php $cont++;} if ($arrayGeral[$cont] == "casa"){ ?>

                              <div class="col-4 px-3 py-2">
                                <h6 style="color: grey; font-weight: 300;font-size:90%">O local<br></h6>
                                <h5 style=";font-size:90%"><i class="fas fa-building"></i> <br> É uma casa</h5>
                              </div>

                              <?php $cont++; } if ($arrayGeral[$cont++] == "sim"){ ?>

                                <div class="col-4 px-3 py-2">
                                  <h6 style="color: grey; font-weight: 300;font-size:90%">Possui<br></h6>
                                  <h5 style=";font-size:90%"><i class="fas fa-sort"></i> <br> Elevador no prédio</h5>
                                </div>

                              <?php } if ($arrayGeral[7] == "rotativo"){ ?>

                                <div class="col-4 px-3 py-2">
                                  <h6 style="color: grey; font-weight: 300;font-size:90%">Possui<br></h6>
                                  <h5 style=";font-size:90%"><i class="fas fa-sync"></i> <br> Estacionamento rotativo</h5>
                                </div>

                              <?php } if ($arrayGeral[7] == "proprio"){?>

                                <div class="col-4 px-3 py-2">
                                  <h6 style="color: grey; font-weight: 300;font-size:90%">Possui<br></h6>
                                  <h5 style=";font-size:90%"><i class="fas fa-sync"></i> <br> Estacionamento Proprio </h5>
                                </div>

                              <?php } if ($arrayGeral[8] == "sim") { ?>

                                <div class="col-4 px-3 py-2">
                                  <h6 style="color: grey; font-weight: 300;font-size:90%">Fácil acesso<br></h6>
                                  <h5 style=";font-size:90%"><i class="fas fa-bus"></i> <br> Ao transporte público <br> <span style="color: grey">(Até 5 min de distância)</span> </h5>
                                </div>

                              <?php } ?>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row" style="border-bottom: solid; border-width: 2px; border-color: #FFC107; border-top: solid; border-width: 2px; border-color: #FFC107;">

                <div class="desktop col-lg-6 col-md-6 col-sm-12 text-center justify-content-center">
                  <div class="row text-center justify-content-center pt-5">
                    <div class="col-lg-10 col-md-10 col-sm-12">
                      <h2> <b>Descrição:</b> </h2>
                      <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet dui ligula. Ut turpis urna, scelerisque sed accumsan eu, congue at dui. Nam justo lorem, aliquet ut efficitur et, tempus ut eros. Suspendisse maximus ante a iaculis blandit. Ut semper non quam nec volutpat. Sed ultricies mauris a mattis hendrerit. Phasellus a nisi a quam luctus facilisis. Sed facilisis interdum nulla, a sollicitudin mauris fermentum a. Aliquam erat volutpat. Donec ac lectus ac purus tincidunt facilisis sed sit amet lectus. Curabitur fermentum orci in condimentum varius. Integer vulputate eros ac nulla maximus, vel euismod ex aliquet. Vestibulum ornare vulputate leo, at commodo justo.</span>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 text-center justify-content-center">
                  <div class="col-12">

                    <div class="row">
                      <div class="col-12 mt-2">
                        <div class="row text-center justify-content-center">
                          <div class="col-12 py-3">
                            <h4 style="color: grey; font-weight: 600">Comodidades do local:</h4>
                            <div class="row text-center justify-content-center">
                              <div class="col-4 px-3 py-2">
                                <h6 style="color: grey; font-weight: 300;font-size:90%">Possui<br></h6>
                                <h5 style=";font-size:90%"><i class="fas fa-rss"></i> <br> Wi-Fi no local</h5>
                              </div>
                              <div class="col-4 px-3 py-2">
                                <h6 style="color: grey; font-weight: 300;font-size:90%">Possui<br></h6>
                                <h5 style=";font-size:90%"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                              </div>
                              <div class="col-4 px-3 py-2">
                                <h6 style="color: grey; font-weight: 300;font-size:90%">Possui<br></h6>
                                <h5 style=";font-size:90%"><i class="fas fa-rss"></i> <br> Wi-Fi no local</h5>
                              </div>
                              <div class="col-4 px-3 py-2">
                                <h6 style="color: grey; font-weight: 300;font-size:90%">Possui<br></h6>
                                <h5 style=";font-size:90%"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                              </div>
                              <div class="col-4 px-3 py-2">
                                <h6 style="color: grey; font-weight: 300;font-size:90%">Possui<br></h6>
                                <h5 style=";font-size:90%"><i class="fas fa-rss"></i> <br> Wi-Fi no local</h5>
                              </div>
                              <div class="col-4 px-3 py-2">
                                <h6 style="color: grey; font-weight: 300;font-size:90%">Possui<br></h6>
                                <h5 style=";font-size:90%"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                              </div>
                              <div class="col-4 px-3 py-2">
                                <h6 style="color: grey; font-weight: 300;font-size:90%">Possui<br></h6>
                                <h5 style=";font-size:90%"><i class="fas fa-rss"></i> <br> Wi-Fi no local</h5>
                              </div>
                              <div class="col-4 px-3 py-2">
                                <h6 style="color: grey; font-weight: 300;font-size:90%">Possui<br></h6>
                                <h5 style=";font-size:90%"><i class="fas fa-video"></i> <br> Monitoramento ou vigilância por câmera</h5>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="mobile col-lg-6 col-md-6 col-sm-12 text-center justify-content-center">
                  <div class="row text-center justify-content-center pt-5">
                    <div class="col-lg-10 col-md-10 col-sm-12">
                      <h2> <b>Descrição:</b> </h2>
                      <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet dui ligula. Ut turpis urna, scelerisque sed accumsan eu, congue at dui. Nam justo lorem, aliquet ut efficitur et, tempus ut eros. Suspendisse maximus ante a iaculis blandit. Ut semper non quam nec volutpat. Sed ultricies mauris a mattis hendrerit. Phasellus a nisi a quam luctus facilisis. Sed facilisis interdum nulla, a sollicitudin mauris fermentum a. Aliquam erat volutpat. Donec ac lectus ac purus tincidunt facilisis sed sit amet lectus. Curabitur fermentum orci in condimentum varius. Integer vulputate eros ac nulla maximus, vel euismod ex aliquet. Vestibulum ornare vulputate leo, at commodo justo.</span>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row" style="border-bottom: solid; border-width: 2px; border-color: #FFC107;">


                <div class="col-lg-12 col-md-12 col-sm-12 text-center justify-content-center">
                  <br>
                  <h2> <b>Foto(s) Panorâmica(s):</b> </h2>
                  <div class="row p-5">
                    <div class="col-6">
                      <div class="panorama">
                        <img src="img/panoramico.jpg" alt="" title="" />
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="panorama">
                        <img src="img/panoramico.jpg" alt="" title="" />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 text-center justify-content-center">
                  <div class="row text-center justify-content-center py-3">
                    <div class="col-lg-10 col-md-10 col-sm-12 text-center justify-content-center">
                      <h2> <b>Localização:</b> </h2>
                      <div id="map" style="height: 50vh; width: 100%"></div>
                      <script>
                      var citymap = {
                        marcador: {
                          center: {lat: -22.849616, lng: -43.313692},
                          multi: 10
                        }
                      };

                      function initMap() {
                        // Create the map.
                        var map = new google.maps.Map(document.getElementById('map'), {
                          zoom: 15,
                          center: {lat: -22.849616, lng: -43.313692},
                          mapTypeId: 'hybrid'
                        });
                        for (var city in citymap) {
                          // Add the circle for this city to the map.
                          var cityCircle = new google.maps.Circle({
                            strokeColor: '#FFC307',
                            strokeOpacity: 0.8,
                            strokeWeight: 2,
                            fillColor: '#FFC107',
                            fillOpacity: 0.35,
                            map: map,
                            center: citymap[city].center,
                            radius: Math.sqrt(citymap[city].multi) * 100
                          });
                        }
                      }
                      </script>
                      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDifilitpDCI1EoqZXV8QMnv3F27ui_7S8&callback=initMap">
                      </script>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row" style="border-bottom: solid; border-width: 2px; border-color: #FFC107;">
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
              </div>

              <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 text-center justify-content-center" style="background-color: black;">
                  <div class="row">
                    <div class="col-12 pt-4" style="background-color: black">
                      <div style="background-color: black" class="pt-3">

                        <div class="row">

                          <div class="col-6">
                            <div class="row">
                              <div class="col-12">
                                <a class="align-middle m-3"><img class="rounded-circle" src="img/usuario.jpg" style="height: 70px"></a>
                                <br><br>
                              </div>
                              <div class="col-12" style="color: white">
                                <h6 style="font-weight: 600">Nome da pessoa</h6>
                                <h6 style="font-weight: 300; font-size: 150%; color: #FFCE00" >&#9733;&#9733;&#9733;&#9733;&#9733; <span style="color: grey; font-size: 15px"> -4.7 <br>(3 avaliações)</span></h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-6" style="color: white">
                            <div class="col-12 pt-5">
                              <h6>15 vendas realizadas</h6>
                            </div>
                            <div class="col-12">
                              <h6>3 meses de Locou</h6>
                            </div>
                            <div class="col-12">
                              <h6>2 anuncios atualmente</h6>
                            </div>
                          </div>
                        </div>
                        <div class="row p-4">
                          <div class="col-1"></div>
                          <div class="col-lg-10 col-md-12 col-sm-12">
                            <button style="font-weight: 300" type="button" name="button" class="btn btn-outline-warning">Entrar em contato <br class="mobile"> com o anunciante</button>
                          </div>
                          <div class="col-1"></div>
                        </div>

                      </div>

                    </div>
                  </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 text-center justify-content-center">
                  <div class="row">
                    <div class="col-12" style="background-color: black; margin-bottom: 2vw">
                      <p style="margin-top: 1vw; margin-bottom: 1vw">
                        <h4 style="color:white">A partir de:</h4>
                        <h1 style="color:#FFCE00;font-weight: 600">R$ <?php echo $array['7']?></h1>
                        <h6 style="color:grey">E as taxas já estão inclusas!</h6>
                      </p>
                    </div>

                  </div>

                  <div class="row justify-content-center" style="margin-bottom: 2vw">

                    <div class="col-12 px-5">
                      <div class="row px-5 pb-5">
                        <div class="col-4">
                          <button onclick="calUnico()" style="font-weight: 300" type="button" name="button" class="btn btn-outline-warning">Aluguel Único</button>
                        </div>
                        <div class="col-4">
                          <button onclick="calReincidente()" style="font-weight: 300" type="button" name="button" class="btn btn-outline-warning">Aluguel Reincidente</button>
                        </div>
                        <div class="col-4">
                          <button onclick="calDireto()" style="font-weight: 300" type="button" name="button" class="btn btn-outline-warning">Aluguel Direto</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 px-5" style="background-color: black">
                      <div class="row my-5">
                        <div class="col-12">

                          <script>
                            function calUnico()
                            {
                              document.getElementById("calendario-unico").style.display = "";
                              document.getElementById("calendario-direto").style.display = "none";
                              document.getElementById("calendario-reincidente").style.display = "none";
                            }
                            function calDireto()
                            {
                              document.getElementById("calendario-unico").style.display = "none";
                              document.getElementById("calendario-direto").style.display = "";
                              document.getElementById("calendario-reincidente").style.display = "none";
                            }
                            function calReincidente()
                            {
                              document.getElementById("calendario-unico").style.display = "none";
                              document.getElementById("calendario-direto").style.display = "none";
                              document.getElementById("calendario-reincidente").style.display = "";
                            }
                          </script>

                          <div id="calendario-unico" style="display: none;" class="p-3 input-group date col-12 text-center justify-content-center">
                            <div class="row">
                              <div class="col-12">
                                <h6 style="color: white">Selecione a data e o horário em será alugado:</h6>
                                <br>
                                  <input type="text" name="data-unico-pick" id="datepicker">
                                <br>
                                <h3><i style="color: #FFC107" class="mt-3 far fa-calendar-alt"></i></h3>
                                <br>
                                <div id="hora-caixa-unico" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107;">
                                  <div class="row px-2">
                                    <div class="col-12" style="color: #FFCE00">
                                      <h6>Hora de início do Aluguel</h6>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="hora-inicio-unico" class="form-control" style="text-align: center" readonly value="12:00">
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
                                        <input type="text" name="hora-fim-unico" class="form-control" style="text-align: center" readonly  value="18:00">
                                        <br>
                                    </div>
                                    <div class="col-12">
                                        <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                                        <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div id="calendario-direto" style="display: none; background-color: black" class="p-3 input-group date col-12 text-center justify-content-center">
                            <div class="row">
                              <div class="col-12">
                                <h6 style="color: white">Selecione a quantidade de meses que será Alugado:</h6>
                                <br>
                                <div class="row text-center justify-content-center">
                                  <div class="col-6">
                                    <div class="row px-2">
                                      <div class="col-12">
                                          <input type="text" maxlength="2"name="hora-inicio-unico" class="form-control" style="text-align: center" readonly value="2">
                                          <br>
                                      </div>
                                      <div class="col-12">
                                          <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                                          <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
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
                                <br>
                                <h6 style="color: white">Selecione o período o qual vai ser alguado</h6>
                                <br>
                                <div class="row text-center justify-content-center">
                                  <div id="hora-caixa-unico" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107;">
                                    <div class="row px-2">
                                      <div class="col-12" style="color: #FFCE00">
                                        <h6>Hora de início do Aluguel</h6>
                                      </div>
                                      <div class="col-12">
                                          <input type="text" name="hora-inicio-unico" class="form-control" style="text-align: center" readonly value="12:00">
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
                                          <input type="text" name="hora-fim-unico" class="form-control" style="text-align: center" readonly  value="18:00">
                                          <br>
                                      </div>
                                      <div class="col-12">
                                          <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                                          <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div id="calendario-reincidente" style="display: none" class="col-12 pt-3 text-center" style="background-color: black">

                            <script>

                              function segunda_botao_periodo()
                              {
                                if(document.getElementById("segunda-bot-periodo").classList.contains("active") == false)
                                {
                                  document.getElementById("segunda-caixa-periodo").style.display = '';
                                  document.getElementById("segunda-bot-periodo").classList.add("active");
                                }
                                else
                                {
                                  document.getElementById("segunda-caixa-periodo").style.display = 'none';
                                  document.getElementById("segunda-bot-periodo").classList.remove("active");
                                }
                              }
                              function terca_botao_periodo()
                              {
                                if(document.getElementById("terca-bot-periodo").classList.contains("active") == false)
                                {
                                  document.getElementById("terca-caixa-periodo").style.display = '';
                                  document.getElementById("terca-bot-periodo").classList.add("active");
                                }
                                else
                                {
                                  document.getElementById("terca-caixa-periodo").style.display = 'none';
                                  document.getElementById("terca-bot-periodo").classList.remove("active");
                                }
                              }
                              function quarta_botao_periodo()
                              {
                                if(document.getElementById("quarta-bot-periodo").classList.contains("active") == false)
                                {
                                  document.getElementById("quarta-caixa-periodo").style.display = '';
                                  document.getElementById("quarta-bot-periodo").classList.add("active");
                                }
                                else
                                {
                                  document.getElementById("quarta-caixa-periodo").style.display = 'none';
                                  document.getElementById("quarta-bot-periodo").classList.remove("active");
                                }
                              }
                              function quinta_botao_periodo()
                              {
                                if(document.getElementById("quinta-bot-periodo").classList.contains("active") == false)
                                {
                                  document.getElementById("quinta-caixa-periodo").style.display = '';
                                  document.getElementById("quinta-bot-periodo").classList.add("active");
                                }
                                else
                                {
                                  document.getElementById("quinta-caixa-periodo").style.display = 'none';
                                  document.getElementById("quinta-bot-periodo").classList.remove("active");
                                }
                              }
                              function sexta_botao_periodo()
                              {
                                if(document.getElementById("sexta-bot-periodo").classList.contains("active") == false)
                                {
                                  document.getElementById("sexta-caixa-periodo").style.display = '';
                                  document.getElementById("sexta-bot-periodo").classList.add("active");
                                }
                                else
                                {
                                  document.getElementById("sexta-caixa-periodo").style.display = 'none';
                                  document.getElementById("sexta-bot-periodo").classList.remove("active");
                                }
                              }
                              function sabado_botao_periodo()
                              {
                                if(document.getElementById("sabado-bot-periodo").classList.contains("active") == false)
                                {
                                  document.getElementById("sabado-caixa-periodo").style.display = '';
                                  document.getElementById("sabado-bot-periodo").classList.add("active");
                                }
                                else
                                {
                                  document.getElementById("sabado-caixa-periodo").style.display = 'none';
                                  document.getElementById("sabado-bot-periodo").classList.remove("active");
                                }
                              }
                              function domingo_botao_periodo()
                              {
                                if(document.getElementById("domingo-bot-periodo").classList.contains("active") == false)
                                {
                                  document.getElementById("domingo-caixa-periodo").style.display = '';
                                  document.getElementById("domingo-bot-periodo").classList.add("active");
                                }
                                else
                                {
                                  document.getElementById("domingo-caixa-periodo").style.display = 'none';
                                  document.getElementById("domingo-bot-periodo").classList.remove("active");
                                }
                              }
                            </script>

                            <h6 style="color: white">Selecione os dias da semana e os horários em que será alguado o espaço:</h6>
                            <br>

                            <div class="row pb-4 justify-content-center p-3">
                              <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="segunda_botao_periodo()" class="btn btn-outline-warning" id="segunda-bot-periodo"><h6>Seg</h6></span><br><br>

                                <div id="segunda-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                                  <div class="row px-2">
                                    <div class="col-12" style="color: #FFCE00">
                                      <h6>Hora de início do Aluguel</h6>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="seg-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
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
                                        <input type="text" name="seg-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                                        <br>
                                    </div>
                                    <div class="col-12">
                                        <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                                        <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="terca_botao_periodo()" id="terca-bot-periodo" class="btn btn-outline-warning"><h6>Ter</h6></span>
                                <br><br>

                                <div id="terca-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                                  <div class="row px-2">
                                    <div class="col-12" style="color: #FFCE00">
                                      <h6>Hora de início do Aluguel</h6>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="ter-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
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
                                        <input type="text" name="ter-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                                        <br>
                                    </div>
                                    <div class="col-12">
                                        <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                                        <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="quarta_botao_periodo()" id="quarta-bot-periodo" class="btn btn-outline-warning"><h6>Qua</h6></span>
                                <br><br>

                                <div id="quarta-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                                  <div class="row px-2">
                                    <div class="col-12" style="color: #FFCE00">
                                      <h6>Hora de início do Aluguel</h6>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="qua-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
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
                                        <input type="text" name="qua-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                                        <br>
                                    </div>
                                    <div class="col-12">
                                        <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                                        <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="quinta_botao_periodo()" id="quinta-bot-periodo" class="btn btn-outline-warning"><h6>Qui</h6></span>
                                <br><br>

                                <div id="quinta-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                                  <div class="row px-2">
                                    <div class="col-12" style="color: #FFCE00">
                                      <h6>Hora de início do Aluguel</h6>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="qui-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
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
                                        <input type="text" name="qui-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                                        <br>
                                    </div>
                                    <div class="col-12">
                                        <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                                        <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="sexta_botao_periodo()" id="sexta-bot-periodo" class="btn btn-outline-warning"><h6>Sex</h6></span>
                                <br><br>

                                <div id="sexta-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                                  <div class="row px-2">
                                    <div class="col-12" style="color: #FFCE00">
                                      <h6>Hora de início do Aluguel</h6>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="sex-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
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
                                        <input type="text" name="sex-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                                        <br>
                                    </div>
                                    <div class="col-12">
                                        <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                                        <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="sabado_botao_periodo()" id="sabado-bot-periodo" class="btn btn-outline-warning"><h6>Sab</h6></span>
                                <br><br>

                                <div id="sabado-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                                  <div class="row px-2">
                                    <div class="col-12" style="color: #FFCE00">
                                      <h6>Hora de início do Aluguel</h6>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="sab-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
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
                                        <input type="text" name="sab-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                                        <br>
                                    </div>
                                    <div class="col-12">
                                        <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                                        <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                              <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="domingo_botao_periodo()" id="domingo-bot-periodo" class="btn btn-outline-warning"><h6>Dom</h6></span>
                                <br><br>

                                <div id="domingo-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                                  <div class="row px-2">
                                    <div class="col-12" style="color: #FFCE00">
                                      <h6>Hora de início do Aluguel</h6>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="dom-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                                        <br>
                                    </div>
                                    <div class="col-12">
                                        <span class="btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                                        <span class="btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row px-2">
                                    <div class="col-12" style="color: #FFCE00">
                                      <h6>Hora de fim do Aluguel</h6>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="dom-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                                        <br>
                                    </div>
                                    <div class="col-12">
                                        <span class="btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                                        <span class="btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                            <h6 style="color: white">Selecione quantas semanas seguidas o espaço será alugado</h6>
                            <br>
                            <div class="row text-center justify-content-center">
                              <div class="col-6">
                                <div class="row justify-content-center px-2">
                                  <div class="col-4">
                                      <input type="text" maxlength="2"name="hora-inicio-unico" class="form-control" style="text-align: center" readonly value="2">
                                      <br>
                                  </div>
                                  <div class="col-12">
                                      <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                                      <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
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

                  <div class="row p-3" style="border-top: solid; border-width: 2px; border-color: #FFC107; border-bottom: solid; border-width: 2px; border-color: #FFC107;background-color: black">
                    <div class="col-12">
                      <h5 style="color: white">Preço total: <br class="mobile"> <span style="color: #FFCE00" class="h4" id="preco-total">R$ <?php echo $array['7']?></span> </h5>
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

                    <div class="col-lg-3 col-md-6 col-sm-6">
                      <div style="background-color: black; height: 480px">
                        <a href="" style="text-decoration: none;">
                          <div class="row">
                            <div class="col-12">
                              <img src="img/item.png" class="img-fluid" style="height: 350px; width: 100%; object-fit: cover;">

                            </div>
                            <div class="col-12">
                              <h5 style="color:white">
                                Consultório ABC
                                <br>
                                <span style="color:grey">Ipanema | Rio de Janeiro </span>
                              </h5>
                              <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ 500</span> por hora </h6>
                            </div>
                          </div>
                        </a>
                      </div>
                      <br>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                      <div style="background-color: black; height: 480px">
                        <a href="" style="text-decoration: none;">
                          <div class="row">
                            <div class="col-12">
                              <img src="img/item.png" class="img-fluid" style="height: 350px; width: 100%; object-fit: cover;">

                            </div>
                            <div class="col-12">
                              <h5 style="color:white">
                                Consultório ABC
                                <br>
                                <span style="color:grey">Ipanema | Rio de Janeiro </span>
                              </h5>
                              <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ 500</span> por hora </h6>
                            </div>
                          </div>
                        </a>
                      </div>
                      <br>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                      <div style="background-color: black; height: 480px">
                        <a href="" style="text-decoration: none;">
                          <div class="row">
                            <div class="col-12">
                              <img src="img/item.png" class="img-fluid" style="height: 350px; width: 100%; object-fit: cover;">

                            </div>
                            <div class="col-12">
                              <h5 style="color:white">
                                Consultório ABC
                                <br>
                                <span style="color:grey">Ipanema | Rio de Janeiro </span>
                              </h5>
                              <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ 500</span> por hora </h6>
                            </div>
                          </div>
                        </a>
                      </div>
                      <br>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                      <div style="background-color: black; height: 480px">
                        <a href="" style="text-decoration: none;">
                          <div class="row">
                            <div class="col-12">
                              <img src="img/item.png" class="img-fluid" style="height: 350px; width: 100%; object-fit: cover;">

                            </div>
                            <div class="col-12">
                              <h5 style="color:white">
                                Consultório ABC
                                <br>
                                <span style="color:grey">Ipanema | Rio de Janeiro </span>
                              </h5>
                              <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ 500</span> por hora </h6>
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

          <div class="row mt-5 justify-content-center" style="color: white;background-color: black">
            <div class="col-3">
            </div>
            <div class="col-lg-6 col-md-10 col-sm-12">
              <div class="row" style="margin-top: 2vw; margin-bottom: 1.5vw">

                <div class="col-lg-4 col-md-4 col-sm-12" style="border-right: 2px solid grey;">
                  <img class="logo-navbar" src="img/locou_logo.png">
                  <br><br>
                  <h6>Locou texto Locou Texto</h6>
                  <br><br>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6" style="border-right: 2px solid grey;">
                  <h6>
                    <a href="#" style="color: white">Link para página</a>
                    <br><br>
                    <a href="#" style="color: white">Link para página</a>
                    <br><br>
                    <a href="#" style="color: white">Link para página</a>
                    <br><br>
                    <a href="#" style="color: white">Link para página</a>
                    <br><br>
                    <a href="#" style="color: white">Link para página</a>
                  </h6>
                  <br><br>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6">
                  <h6 style="color: grey">
                    Redes sociais
                    <br><br>
                  </h6>
                  <h6>
                    <a href="#" style="color: white">Rede social</a>
                    &nbsp;
                    <a href="#" style="color: white">Rede social</a>
                    &nbsp;
                    <a href="#" style="color: white">Rede social</a>
                    <br><br>
                  </h6>
                </div>

              </div>
            </div>
            <div class="col-3">
            </div>
          </div>

        </div>

        <script>
        $( document ).ready(function() {
          $(function() {
            $('div.panorama').paver();
          });
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
