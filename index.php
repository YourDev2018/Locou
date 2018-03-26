<!DOCTYPE html>

<?php
  require_once 'BuscarEspacos.php';
  require_once 'FunctionsDB.php';
  require_once 'FunctionsSession.php';

$db = new FunctionsDB();
$conn = $db->conectDB();
$session = new FunctionsSession();
$session->iniciarSession();
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
    <link rel="stylesheet" href="css/locou.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    <title>Locou | Encontre o espaço de trabalho pelo tempo que precisar</title>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

    <nav class="navbar fixed-top desktop" style="background-color: rgba(0,0,0,1)">
      <a class="navbar-brand ml-5" href="index.php" >
        <img  class="logo-navbar" src="img/locou_logo.png">
      </a>
      <span style="float:right;" class="navbar-brand menu-navbar mr-5 ml-auto">
        <a class="mx-3">Sobre</a>
        <a class="mx-3">Como Funciona</a>
        <a href="resultado.php" style="color:white" class="mx-3">Procurar Espaços</a>
        <a href="anunciar.php"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>
        <a class="ml-5"><img class="rounded-circle" src="img/usuario.jpg" style="height: 40px"></a>
        <a class="mx-3"><i style="font-size: 120%" class="far fa-bell"></i></a>
        <span class="ml-3 btn btn-outline-warning" data-toggle="modal" data-target="#myModal">Logar</span>
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
            <a class="mx-2"><img class="rounded-circle" src="img/usuario.jpg" style="height: 60px"></a>
            <br><br>
            <span class="btn btn-outline-warning">Logar</span>
            <br><br>
          </span>
        </div>
      </div>
    </nav>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content text-center justify-content-center">
      <div class="modal-head">
        <div class="row py-4" style="background-color: black">
          <div class="col-12">
            <span class="btn btn-outline-warning active" id="logar-b" onclick="logar(this);"><h3 style="font-weight: 300">Logar</h3></span>
            <br class="mobile"><br class="mobile">
            <span class="px-5 h4" style="color: white; font-weight: 300">ou</span>
            <br class="mobile"><br class="mobile">
            <span class="btn btn-outline-warning" id="cadastrar-b" onclick="cadastrar(this);"><h3 style="font-weight: 300">Cadastrar</h3></span>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <br>
        <div class="pt-2" id="logar-div" style="background-color:white">
          <form action="#" method="post">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email-login" name="email" placeholder="exemplo@exemplo.com">
            </div>
            <div class="form-group">
              <label for="senha">Senha</label>
              <input type="password" class="form-control" id="senha-login" name="senha">
            </div>
            <button type="submit" class="btn btn-warning m-3"><h4 style="font-weight: 300">Login</h4></button>
          </form>
        </div>
        <div class="pt-2" id="cadastrar-div" style="display: none; background-color:white">
          <form action="#" method="post">
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
                <select id="days"></select>
                <select id="months"></select>
                <select id="years"></select>
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
            <button type="submit" class="btn btn-warning m-3"><h4 style="font-weight: 300">Cadastrar</h4></button>
          </form>
        </div>
      </div>
      </div>
    </div>
  </div>
  <script>
    function logar(botao) {
      botao.classList.add("active");
      document.getElementById("cadastrar-b").classList.remove("active");
      document.getElementById("cadastrar-div").style.display = 'none';
      document.getElementById("logar-div").style.display = '';
    }
    function cadastrar(botao) {
      botao.classList.add("active");
      document.getElementById("logar-b").classList.remove("active");
      document.getElementById("logar-div").style.display = 'none';
      document.getElementById("cadastrar-div").style.display = '';
    }
  </script>

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
              <form class="form-inline justify-content-center">
                <select class="form-control custom-select" style="width:30%" id="categoria">
                  <option value="todos">Todos</option>
                  <option value="consultorio">Consultórios</option>
                  <option value="cozinha">Cozinhas</option>
                </select>
                <input type="text" class="form-control" style="width:60%" id="query" placeholder="Ex: Tijuca, Ipanema, Consultório">
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
          Encontre pertinho de você seu espaço de trabalho
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
              <div style="background-color: black">
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
              <div style="background-color: black;">
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
              <div style="background-color: black">
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
              <div style="background-color: black">
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
              <div style="background-color: black">
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
              <div style="background-color: black">
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
              <div style="background-color: black">
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
              <div style="background-color: black">
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
        <div class="col-lg-2 col-md-1 col-sm-0">
        </div>
        <div class="col-lg-8 col-md-10 col-sm-12">
          <br><br>
          <h1>Como Funciona</h1>
          <br><br><br>

          <div class="row" style="margin-bottom: 2.5vw">

            <div class="col-lg-3 col-md-6 my-4">
              <img class="img-responsive img-center" src="img/icone-como.png" height="100px">
              <br><br>
              <h6>Procure o espaço perfeito e agende sua locação</h6>
            </div>

            <div class="col-lg-3 col-md-6 my-4">
              <img class="img-responsive img-center" src="img/icone-como.png" height="100px">
              <br><br>
              <h6>Procure o espaço perfeito e agende sua locação</h6>
            </div>

            <div class="col-lg-3 col-md-6 my-4">
              <img class="img-responsive img-center" src="img/icone-como.png" height="100px">
              <br><br>
              <h6>Procure o espaço perfeito e agende sua locação</h6>
            </div>

            <div class="col-lg-3 col-md-6 my-4">
              <img class="img-responsive img-center" src="img/icone-como.png" height="100px">
              <br><br>
              <h6>Procure o espaço perfeito e agende sua locação</h6>
            </div>

          </div>

          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10 col-sm-12">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/58VlTRFUKg4?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
              </div>
            </div>
          </div>

          <br>

          <div class="row">

            <div class="col">
              <a href="resultado.php"><button type="button" class="btn btn-outline-warning"><h2>Procure espaços</h2></button></a>
              <br><br>
            </div>

          </div>

        </div>
        <div class="col-lg-2 col-md-1 col-sm-0">
        </div>
      </div>

      <div class="row" style="background-color: #FFCE00">
        <div class="col-lg-2 col-md-1 col-sm-0">
        </div>
        <div class="col-lg-8 col-md-10 col-sm-12">
          <br>
          <h1><b>O que é?</b><br><br></h1>
          <h5>
            <b>
              Imagine poder potencializar sua produção sem a obrigação de investir em uma estrutura própria? E, de quebra, trocar experiências com gente nova e ganhar mais visibilidade?
              <br><br>
              Cozinhas, consultórios, estúdios fotográficos e produtoras: independente do negócio, o Locou te conecta a quem já tem um espaço produtivo e possibilita um novo formato de aluguel sob demanda.
              <br><br>
              Essa é a sua nova oportunidade de fazer essa conexão com a facilidade, a diversidade e a segurança que só uma plataforma especializada pode dar.
            </b>
          </h5>

          <br><br>
        </div>
        <div class="col-lg-2 col-md-1 col-sm-0">
        </div>
      </div>

    </div>

    <!-- Footer -->

    <div class="container-fluid justify-content-center text-center" style="background-color: black">

      <!-- Linha 1 -->

      <!-- <div class="row" style="margin-bottom: 7vw">
        <div class="col-2">
        </div>
        <div class="col-8">
          <br>
          <span class="h3" style="color: white">Texto do footer Texto do footer Texto do footer Texto do footer</span>
        </div>
        <div class="col-2">
        </div>
      </div> -->

      <!-- Linha 2 -->

      <div class="row justify-content-center" style="color: white;">
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

  </body>
