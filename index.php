<!DOCTYPE html>

<?php
  require_once 'BuscarEspacos.php';
  require_once 'FunctionsDB.php';
  require_once 'FunctionsSession.php';

  $session = new FunctionsSession();
  $session->iniciarSession();



$db = new FunctionsDB();
$conn = $db->conectDB();

$status = $_GET['status'];
$funcao= $_GET['funcao'];

$array = returnEspaco($conn);
$arrayConsultorio = returnConsultorio($conn);
$arrayCozinha = returnCozinha($conn);
$arrayWork = returnWorkShop($conn);
$arrayEnsaio = returnEnsaio($conn);
$prefixo = "http://www.yourdev.com.br/clientes/locou/img/anuncio/";
$link="img/categoria.jpg";
$cont= 0;
$conn = $db->closeDB($conn);


function returnEspaco($conn){

  $busca = new BuscarEspacos();
  $array = $busca->retornarEspacoMaisVistos($conn);

  return $array;
}

function returnConsultorio($conn){
  $busca = new BuscarEspacos();
  $array = $busca->retornarEspacoConsultorio($conn);

  return $array;

}

function returnCozinha($conn){
  $busca = new BuscarEspacos();
  $array = $busca->retornarEspacoCozinha($conn);

  return $array;

}

function returnWorkShop($conn){
  $busca = new BuscarEspacos();
  $array = $busca->retornarEspacoWorkShop($conn);

  return $array;

}

function returnEnsaio($conn){
  $busca = new BuscarEspacos();
  $array = $busca->retornarEspacoEnsaio($conn);

  return $array;

}


?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/locou.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    <title>Locou | Encontre o espaço de trabalho pelo tempo que precisar</title>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
//     $(function () {
//
//     for (i = new Date().getFullYear() ; i > 1900; i--) {
//         $('#years').append($('<option />').val(i).html(i));
//     }
//
//     for (i = 1; i < 13; i++) {
//         $('#months').append($('<option />').val(i).html(i));
//     }
//     updateNumberOfDays();
//
//     $('#years, #months').change(function () {
//
//         updateNumberOfDays();
//
//     });
//
// });
$(document).ready(function(){
  // document.getElementById('days');
  // document.getElementById('months');
  // document.getElementById('years');
  for (var i = 1; i < 32; i++) {
    document.getElementById('days').add(i);
  }
  for (var i = 1; i < 13; i++) {
    document.getElementById('months').add(i);
  }
  for (var i = 1900; i < 2019; i++) {
    document.getElementById('years').add(i);
  }
});


// function updateNumberOfDays() {
//     $('#days').html('');
//     month = $('#months').val();
//     year = $('#years').val();
//     days = daysInMonth(month, year);
//
//     for (i = 1; i < days + 1 ; i++) {
//         $('#days').append($('<option />').val(i).html(i));
//     }
//
// }

function daysInMonth(month, year) {
    return new Date(year, month, 0).getDate();
}
  </script>
  <script type='text/javascript'>
            $(document).ready(function(){
              var logado = "<?php echo $session->vereficarLogin()?>";
            if(logado!="false")
            {
              document.getElementById('anunciarSM').innerHTML = '<a href="anunciar.php"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>';
              document.getElementById('anunciarSD').innerHTML = '<a href="anunciar.php"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>';
            }
            else {
              document.getElementById('anunciarSM').innerHTML = '<a onclick="$(\'#cadastroPop\').modal(\'show\');"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>';
              document.getElementById('anunciarSD').innerHTML = '<a onclick="$(\'#cadastroPop\').modal(\'show\');"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>';
            }
            });
        </script>
  </head>
  <style>
  .thumbnail
  {
      position: relative;
  }

  .caption
  {
      position: absolute;
      top: 100%;
      left: 0;
      width: 100%;
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
    .menu-navbar
    {
      color: white;
      font-size: 15px;
      font-weight: 300;
    }
    .texto-secao1
    {
      color: white;
      font-size: 25px;
      font-weight: 600;
    }
    .secao1
    {
      margin-top: 20%;
      margin-bottom: 20%;
    }
    .texto-secao1-categoria
    {
      color: white;
      font-size: 20px;
    }
    .titulo-secao2
    {
      font-size: 30px;
      font-weight: 400;
    }
    .secao2
    {
      margin-top: 50px;
      margin-bottom: 50px;
    }
    .titulo-secao3
    {
      font-size: 30px;
      font-weight: 400;
    }
  }

  </style>
  <body style="font-family: 'Muli'">

    <!-- Navbar -->

    <nav class="navbar fixed-top desktop" style="background-color: rgba(0,0,0,1);">
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

        <span id="anunciarSD"></span>

        <?php if($_SESSION['id']!=null || $_SESSION['id'] != "" ){ ?>

          <a class="ml-3"><img class="rounded-circle" src="<?php echo $prefixo.$_SESSION['foto'] ?>" style="height: 40px"></a>

          <a style="display:none" class="mx-2"><i style="font-size: 120%" class="far fa-bell"></i></a>

          <a href="<?php echo "logout.php?pag=index"?>" style="color:white" class="mx-2">Logout</a>
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
          <span id="anunciarSM"></span>
          <br><br>
        </div>
        <div class="col-12">
          <span class="menu-navbar" style="color:white">
            <a href="index.php#comoFunciona" style="color: white;" class="mx-2">Como Funciona</a>
            <a href="index.php#sobre" style="color: white;" class="mx-2">Sobre</a>
            <br>
            <a href="resultado.php?t=todos&q=" style="color:white" class="mx-2">Procurar Espaços</a>
            <br><br>
            <?php if($_SESSION['id']==null && $_SESSION['id'] == "" ){ ?>
              <span style="cursor: pointer;" class="ml-3 " data-toggle="modal" data-target="#cadastroPop">Não é cadastrado?</span>
              <span style="cursor: pointer;" class="ml-3 " data-toggle="modal" data-target="#loginPop">Já sou cadastrado</span>
            <?php } ?>
            <?php if($_SESSION['id']!=null && $_SESSION['id'] != "" ){ ?>
              <a class="ml-5"><img class="rounded-circle" src="<?php echo $prefixo.$_SESSION['foto'] ?>" style="height: 40px"></a>

              <a style="display:none" class="mx-3"><i style="font-size: 120%" class="far fa-bell"></i></a>


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
                    <label for="telefone">Telefone (apenas número)</label>
                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="21 912345678">
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

    <div class="modal" id="loginPop" tabindex="-1" role="dialog">
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
              <form action="logar.php?pag=index" method="post">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email-login" name="email" placeholder="exemplo@exemplo.com">
                </div>
                <div class="form-group">
                  <label for="senha">Senha</label>
                  <input type="password" class="form-control" id="senha-login" name="senha">
                </div>
                <br>
                <br>
                <span>Ainda não é cadastrado? <a href="cadastro.php"><span style="color:blue">Clique aqui</span></a> </span>
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

    <!-- Seção 1 - Pesquisa -->

    <div class="img-responsive img-center imagem" style="background: url('img/fundo_1.jpg');">
      <div class="container-fluid text-center justify-content-center imagem-escura">

        <!-- Texto principal + pesquisa -->

        <div class="row">
          <div class="col-2">
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 texto-secao1 secao1 ">
            Por 1 hora, 1 tarde, 1 dia:
            <br>
            alugue aqui o seu espaço de trabalho
            <br><br>

            <div class="desktop">
              <form action="resultado.php" method="get" class="form-inline justify-content-center desktop">
                <select class="form-control custom-select" id="categoria" name="t">
                  <option value="todos">Todos</option>
                  <option value="consultorio">Consultórios</option>
                  <option value="workshop">Workshop</option>
                  <option value="palestra">Sala para Palestras</option>
                  <option value="aula">Sala para Aulas</option>
                  <option value="ensaio">Sala para Ensaio</option>
                  <option value="artes">Ateliê de Artes</option>
                  <option value="fotografico">Estúdio Fotográfico</option>
                  <option value="produtora">Produtora</option>
                  <option value="costura">Ateliê de Costura</option>
                  <option value="academia">Estúdio ou Academia</option>
                  <option value="cozinha">Cozinhas</option>
                </select>
                <input type="text" name="q" class="form-control" style="width:40%" id="query" placeholder="Ex: Tijuca, Ipanema, Consultório">
                <button type="submit" class="btn btn-warning">Buscar</button>
              </form>
            </div>

            <div class="mobile">
              <form action="resultado.php" method="get" class="form-inline justify-content-center">
                <select class="form-control custom-select" name="t" style="width:30%" id="categoriaM">
                  <option value="todos">Todos</option>
                  <option value="consultorio">Consultórios</option>
                  <option value="workshop">Workshop</option>
                  <option value="palestra">Sala para Palestras</option>
                  <option value="aula">Sala para Aulas</option>
                  <option value="ensaio">Sala para Ensaio</option>
                  <option value="artes">Ateliê de Artes</option>
                  <option value="fotografico">Estúdio Fotográfico</option>
                  <option value="produtora">Produtora</option>
                  <option value="costura">Ateliê de Costura</option>
                  <option value="academia">Estúdio ou Academia</option>
                  <option value="cozinha">Cozinhas</option>
                </select>
                <input type="text" name="q" class="form-control" style="width:60%" id="queryM" placeholder="Ex: Tijuca, Ipanema, Consultório">
                <button type="submit" class="btn btn-warning" style="width:25%">Buscar</button>
              </form>
            </div>

          </div>
          <div class="col-2">
          </div>
        </div>

        <!-- Sub menu -->

        <!-- <div class="row imagem-escura py-3">
          <div class="col-2">
          </div>
          <div class="col-8 texto-secao1-categoria">
            <a class="m-3">Consultórios</a>
            <a class="m-3">Escritórios</a>
            <a class="m-3">Cozinhas</a>
          </div>
          <div class="col-2">
          </div>
        </div> -->
      </div>
    </div>

    <!-- Seção 2 - Categorias populares -->

    <div class="container-fluid text-center justify-content-center">

      <!-- Titulo Seção -->

      <div class="row secao2">
        <div class="col-2">
        </div>
        <div class="col-lg-8 col-md-10 col-sm-12 titulo-secao2">
          Sugestões de espaços incríveis para você trabalhar
        </div>
        <div class="col-2">
        </div>
      </div>

      <!-- Cards de categorias -->

      <div class="row">
        <div class="col-12">

          <!-- COLUNA CARDS -->

          <div class="row">

            <!-- CARDS LINHA 1 -->

            <div class="col-lg-3 col-md-6 col-sm-6">
              <div style="background-color: black; height: 480px">
                <a href="<?php  $cont = 0; $aux = $arrayConsultorio[0]; echo "anuncio.php?id=".$aux   ?>" style="text-decoration: none;">
                  <div class="row">
                    <div class="col-12">
                      <img src="<?php $cont++ ; echo $prefixo.$arrayConsultorio[$cont]; ?>" class="img-fluid" style="height: 350px; width: 100%; object-fit: cover;">

                    </div>
                    <div class="col-12">
                      <h5 style="color:white">
                        <?php $cont++ ;  echo $arrayConsultorio[$cont]; ?>
                        <br>
                        <span style="color:grey"><?php $cont++ ; echo $arrayConsultorio[$cont]; ?> | <?php $cont++ ; echo $arrayConsultorio[$cont]; ?> </span>
                      </h5>
                      <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ <?php $cont++ ; echo $arrayConsultorio[$cont]; $cont++ ; ?></span> por hora </h6>
                    </div>
                  </div>
                </a>
              </div>
              <br>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
              <div style="background-color: black; height: 480px">
                <a href="<?php  $cont = 0; $aux = $arrayCozinha[0]; echo "anuncio.php?id=".$aux   ?>" style="text-decoration: none;">
                  <div class="row">
                    <div class="col-12">
                      <img src="<?php $cont = 0; $cont++ ; echo $prefixo.$arrayCozinha[$cont]; ?>" class="img-fluid" style="height: 350px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-12">
                      <h5 style="color:white">
                        <?php $cont++ ; echo $arrayCozinha[$cont]; ?>
                        <br>
                        <span style="color:grey"><?php  $cont++ ; echo $arrayCozinha[$cont]; ?> | <?php  $cont++ ; echo $arrayCozinha[$cont]; ?> </span>
                      </h5>
                      <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ <?php  $cont++ ; echo $arrayCozinha[$cont];; ?></span> por hora </h6>
                    </div>
                  </div>
                </a>
              </div>
              <br>
            </div>

           <div class="col-lg-3 col-md-6 col-sm-6">
              <div style="background-color: black; height: 480px">
                <a href="<?php  $cont = 0; $aux = $arrayWork[0]; echo "anuncio.php?id=".$aux   ?>" style="text-decoration: none;">
                  <div class="row">
                    <div class="col-12">
                      <img src="<?php $cont = 0; $cont++ ; echo $prefixo.$arrayWork[$cont]; ?>" class="img-fluid" style="height: 350px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-12">
                      <h5 style="color:white">
                        <?php  $cont++ ; echo $arrayWork[$cont]; ?>
                        <br>
                        <span style="color:grey"><?php $cont++ ; echo $arrayWork[$cont]; ?> | <?php  $cont++ ; echo $arrayWork[$cont]; ?> </span>
                      </h5>
                      <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ <?php  $cont++ ; echo $arrayWork[$cont]; ?></span> por hora </h6>
                    </div>
                  </div>
                </a>
              </div>
              <br>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
              <div style="background-color: black; height: 480px">
                <a href="<?php  $cont = 0; $aux = $arrayEnsaio[0]; echo "anuncio.php?id=".$aux ?>" style="text-decoration: none;">
                  <div class="row">
                    <div class="col-12">
                      <img src="<?php $cont = 0; $cont++ ; echo $prefixo.$arrayEnsaio[$cont]; ?>" class="img-fluid" style="height: 350px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-12">
                      <h5 style="color:white">
                        <?php $cont++ ; echo $arrayEnsaio[$cont]; ?>
                        <br>
                        <span style="color:grey"><?php $cont++ ; echo $arrayEnsaio[$cont]; ?> | <?php $cont++ ; echo $arrayEnsaio[$cont]; ?> </span>
                      </h5>
                      <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ <?php $cont++ ; echo $arrayEnsaio[$cont]; ; ?></span> por hora </h6>
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


    <!-- Seção 3 - Ultimas locações -->

    <div class="container-fluid justify-content-center">

      <!-- Titulo Seção -->

      <div class="row secao2">
        <div class="col-2">
        </div>
        <div class="col-lg-8 col-md-10 col-sm-12 titulo-secao3 text-center">
          Anúncios mais vistos recentemente
        </div>
        <div class="col-2">
        </div>
      </div>

      <!-- Cards Ultimas Locações -->

      <div class="row justify-content-center">
        <div class="col-10 justify-content-center">

          <!-- Linha de cards -->

          <div class="row text-center justify-content-center">

            <div class="col-lg-3 col-md-6 col-sm-6">
              <div style="background-color: black; height: 350px">
                <a href="<?php $aux = $array[0]; echo "anuncio.php?id=".$aux   ?> " style="text-decoration: none;">
                  <div class="row">
                    <div class="col-12">
                      <img src="<?php $cont=0; $cont++ ; echo $prefixo.$array[$cont]; ?>" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-12">
                      <h5 style="color:white">
                        <?php $cont++ ; echo $array[$cont]; ?>
                        <br>
                        <span style="color:grey"><?php $cont++ ; echo $array[$cont]; ?> | <?php $cont++ ; echo $array[$cont]; ?></span>
                      </h5>
                      <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ <?php $cont++ ; echo $array[$cont]; ?></span> por hora </h6>
                    </div>
                  </div>
                </a>
              </div>
              <br>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
              <div style="background-color: black; height: 350px">
                <a href="<?php $aux = $array[8]; echo "anuncio.php?id=".$aux   ?>" style="text-decoration: none;">
                  <div class="row">
                    <div class="col-12">
                      <img src="<?php $cont = 8; $cont++; echo $prefixo.$array[9]; ?>" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-12">
                      <h5 style="color:white">
                        <?php $cont++ ; echo $array[$cont]; ?>
                        <br>
                        <span style="color:grey"><?php $cont++ ; echo $array[$cont]; ?> | <?php $cont++ ; echo $array[$cont]; ?></span>
                      </h5>
                      <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ <?php $cont++ ; echo $array[$cont]; ; ?></span> por hora </h6>
                    </div>
                  </div>
                </a>
              </div>
              <br>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
              <div style="background-color: black; height: 350px">
                <a href="<?php  $aux = $array[16]; echo "anuncio.php?id=".$aux   ?>" style="text-decoration: none;">
                  <div class="row">
                    <div class="col-12">
                   <img src="<?php $cont = 16; $cont++ ; echo $prefixo.$array[$cont]; ?>" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-12">
                      <h5 style="color:white">
                        <?php $cont++ ; echo $array[$cont]; ?>
                        <br>
                        <span style="color:grey"><?php $cont++ ; echo $array[$cont]; ?> | <?php $cont++ ; echo $array[$cont]; ?></span>
                      </h5>
                      <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ <?php $cont++ ; echo $array[$cont]; $cont++ ; ?></span> por hora </h6>
                    </div>
                  </div>
                </a>
              </div>
              <br>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
              <div style="background-color: black; height: 350px">
                <a href="<?php  $aux = $array[24]; echo "anuncio.php?id=".$aux   ?>" style="text-decoration: none;">
                  <div class="row">
                    <div class="col-12">
                   <img src="<?php $cont = 24;$cont++ ; echo $prefixo.$array[$cont]; ?>" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-12">
                      <h5 style="color:white">
                        <?php $cont++ ; echo $array[$cont]; ?>
                        <br>
                        <span style="color:grey"><?php $cont++ ; echo $array[$cont]; ?> | <?php $cont++ ; echo $array[$cont]; ?></span>
                      </h5>
                      <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ <?php $cont++ ; echo $array[$cont]; $cont++ ; ?></span> por hora </h6>
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

    <!-- Seção 4 - Sobre + Vídeo -->

    <div class="container-fluid justify-content-center text-center secao4">

      <div class="row" style="background-color: black; color: white;">
        <div class="px-5 col-lg-12 col-md-12 col-sm-12">
          <br><br>
          <h1 id="comoFunciona">Como Funciona</h1>
          <br>

          <div class="row" style="margin-bottom: 1.5vw">

            <div class="col-lg-4 col-md-6 mt-4">
              <div class="row">
                <div class="col-12" style="height: 200px">
                  <img class="img-responsive img-center" src="img/alugar.png" height="100px">
                  <br><br>
                  <h4>Anuncie o seu espaço</h4>
                </div>
              </div>
              <p class="h6 text-justify" style="color:grey">Clique em <a href="anunciar.php" style="color: #FFCE00"><b>Anuncie Aqui</b></a> e preencha os campos para que os interessados conheçam os detalhes sobre mobiliários, equipamentos e o jeito que você organizou o seu espaço.
                <br><br>
                A cada pedido de aluguel, você será consultado antes e assim, você poderá aceitar ou recusar o pedido.
              </p>
            </div>

            <div class="col-lg-4 col-md-6 my-4">
              <div class="row">
                <div class="col-12" style="height: 200px">
                  <img class="img-responsive img-center" src="img/icone-como.png" height="100px">
                  <br><br>
                  <h4> Procure o espaço perfeito e agende sua locação</h4>
                </div>
              </div>
              <p class="h6 text-justify" style="color:grey">Faça uma busca para encontrar o seu espaço ideal de trabalho. Digite o seu ramo de atividade e a localização.
                <br><br>
                Escolha o espaço e clique em cima do anúncio para ver os detalhes, escolher o dia e horário que pretende alugar.
              </p>
            </div>

            <div class="col-lg-4 col-md-6 my-4">
              <div class="row">
                <div class="col-12" style="height: 200px">
                  <img class="img-responsive img-center" src="img/pagamento.svg" height="100px">
                  <br><br>
                  <h4>Realize o pagamento</h4>
                </div>
              </div>
              <p class="h6 text-justify" style="color:grey">Seu pedido será encaminhado ao proprietário. Se o pedido for aprovado, você deverá confirmar a reserva efetuando o pagamento no botão “confirmar reserva”.
              </p>
            </div>



          </div>

          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 my-4">
              <img class="img-responsive img-center" src="img/espaco.png" height="100px">
              <br><br>
              <h4>Use o espaço e aproveite!</h4>
              <br>
              <p class="h6 text-justify" style="color:grey">Que tal deixar o espaço ainda melhor do que quando você o encontrou? É com carinho que as melhores coisas são feitas!
              </p>
            </div>
            <div class="col-lg-4 col-md-6 my-4">
              <img class="img-responsive img-center" src="img/shape.svg" height="100px">
              <br><br>
              <h4>Conte para a gente o que achou</h4>
              <br>
              <p class="h6 text-justify" style="color:grey">Depois do aluguel realizado, é hora de avaliar a experiência! Não deixe de contar o que achou do espaço e do responsável pelo aluguel, pois sua opinião será fundamental para os próximos que forem alugar :)
              </p>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10 col-sm-12">
              <br><br>
              <h4><b>Veja como funciona nosso serviço:</b></h4>
              <br>
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/UtXJ8zut-KE?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
              </div>
            </div>
          </div>

          <br>

          <div class="row">

            <div class="col-12">
              <a href="resultado.php"><button type="button" class="btn btn-outline-warning"><h2>Procure <br class="mobile"> espaços</h2></button></a>
              <br><br>
            </div>

          </div>

        </div>
      </div>

      <div class="row text-justify" style="background-color: #FFCE00">
        <div class="col-lg-2 col-md-1 col-sm-0">
        </div>
        <div class="col-lg-8 col-md-10 col-sm-12">
          <div class="row text-center">
            <div class="col-12">
              <br>
              <h1 id="sobre"><b>Sobre</b><br><br></h1>
            </div>
          </div>
          <div class="row" justify-content-center>
            <div class="col-12 px-2">
              <h5>
                <b>
                  Conectamos espaços produtivos com os profissionais que precisam alugar por hora, turno, ou dia. São espaços totalmente equipados e montados que garantem flexibilidade aos profissionais para que se dediquem mais ao serviço prestado e não se preocupem com questões administrativas e burocráticas É um novo jeito de aluguel sem o comprometimento de um contrato de longo-prazo.
                  <br>
                  Trazemos a solução de aluguel sob demanda com facilidade e segurança que só uma plataforma especializada pode dar.
                </b>
              </h5>
              <br><br>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-12">
              <a href="anunciar.php"><button type="button" class="btn btn-outline-dark"><h2>Anuncie Agora. <br class="mobile"> É grátis</h2></button></a>
              <br><br>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-1 col-sm-0">
        </div>
      </div>

    </div>

    <!-- Footer -->

    <div class="container-fluid justify-content-center text-center" style="background-color: black">
      <div class="row justify-content-center" style="color: white;">
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
                <a href="mailto:contato@locou.co" target="_top" style="color: white">contato@locou.co  </a>
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
      $('.custom-file-input').on('change',function(){
        var foto = $(this).val().split('\\').pop();
        var label = document.getElementById($(this).attr('id')+"-label");
        label.innerHTML = foto;
        console.log($(this).attr('id'));
        console.log($(this).attr('id')+"-label");
        console.log(foto);
      })
      </script>

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

  </body>
