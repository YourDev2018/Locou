<!DOCTYPE html>
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
  </head>
  <script>
  $(document).ready(function(){
$(window).on("scroll",function(){
  var wn = $(window).scrollTop();
  if(wn > 600){
    $(".navbar").css("background","rgba(0,0,0,0.5)");
  }
  else{
    $(".navbar").css("background","rgba(0,0,0,1)");
  }
});
});
  </script>
  <style>
  .thumbnail
  {
      position: relative;
  }

  .caption
  {
      position: absolute;
      top: 70%;
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
      <a class="navbar-brand ml-5" href="http://www.yourdev.com.br/clientes/locou/" >
        <img  class="logo-navbar" src="img/locou_logo.png">
      </a>
      <span style="float:right;" class="navbar-brand menu-navbar mr-5 ml-auto">
        <a class="mx-3">Sobre</a>
        <a class="mx-3">Como Funciona</a>
        <a class="mx-3">Procurar Espaços</a>
        <a href="http://www.yourdev.com.br/clientes/locou/anunciar.php"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>
        <a class="ml-5"><img class="rounded-circle" src="img/usuario.jpg" style="height: 40px"></a>
        <a class="mx-3"><i style="font-size: 120%" class="far fa-bell"></i></a>
      </span>
    </nav>

    <nav class="navbar mobile " style="background-color: rgba(0,0,0,1)">
      <div class="row justify-content-center text-center">
        <div class="col-12">
          <a href="http://www.yourdev.com.br/clientes/locou/" >
            <img class="logo-navbar" src="img/locou_logo.png">
            <br><br>
          </a>
        </div>
        <div class="col-12">
          <a href="http://www.yourdev.com.br/clientes/locou/anunciar.php"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>
          <br><br>
        </div>
        <div class="col-12">
          <span class="menu-navbar" style="color:white">
            <a class="mx-2">Sobre</a>
            <a class="mx-2">Como Funciona</a>
            <a class="mx-2">Procurar Espaços</a>
            <br><br>
            <a class="mx-2"><img class="rounded-circle" src="img/usuario.jpg" style="height: 60px"></a>
            <br><br>
          </span>
        </div>
      </div>
    </nav>

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
              <form class="form-inline justify-content-center desktop">
                <select class="form-control custom-select" id="categoria">
                  <option value="todos">Todos</option>
                  <option value="consultorio">Consultórios</option>
                  <option value="cozinha">Cozinhas</option>
                </select>
                <input type="text" class="form-control" style="width:40%" id="query" placeholder="Ex: Tijuca, Ipanema, Consultório">
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
              <a href="#">
                <div class="thumbnail text-center">
                  <img src="img/categoria.jpg" class="img-fluid">
                  <div class="caption">
                    <p style="color:white; background-color: rgba(0,0,0,0.6)">
                      <span class="h4">Consultórios</span>
                    </p>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
              <a href="#">
                <div class="thumbnail text-center">
                  <img src="img/categoria.jpg" class="img-fluid">
                  <div class="caption">
                    <p style="color:white; background-color: rgba(0,0,0,0.6)">
                      <span class="h4">Consultórios</span>
                    </p>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
              <a href="#">
                <div class="thumbnail text-center">
                  <img src="img/categoria.jpg" class="img-fluid">
                  <div class="caption">
                    <p style="color:white; background-color: rgba(0,0,0,0.6)">
                      <span class="h4">Consultórios</span>
                    </p>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
              <a href="#">
                <div class="thumbnail text-center">
                  <img src="img/categoria.jpg" class="img-fluid">
                  <div class="caption">
                    <p style="color:white; background-color: rgba(0,0,0,0.6)">
                      <span class="h4">Consultórios</span>
                    </p>
                  </div>
                </div>
              </a>
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
          Acabaram de alugar
        </div>
        <div class="col-2">
        </div>
      </div>

      <!-- Cards Ultimas Locações -->

      <div class="row justify-content-center">
        <div class="col-10 justify-content-center">

          <!-- Linha de cards -->

          <div class="row justify-content-center">

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

              <a href="#" style="text-decoration: none">
                <div class="img-responsive img-center" style="background: url('img/categoria.jpg'); height: 20vh; width: 25vh; background-repeat: no-repeat; background-size: cover; background-position: center;">
                </div>
                <p style="background-color: black; max-width: 25vh; padding: 0.5vw; color: white">
                  <span class="h5" >Coworking Odontológico</span>
                  <br>
                  <span class="h6" style="color: #FFCE00">Barra da Tijuca | Rio de Janeiro</span>
                </p>
              </a>

            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

              <a href="#" style="text-decoration: none">
                <div class="img-responsive img-center" style="background: url('img/item.png'); height: 20vh; width: 25vh; background-repeat: no-repeat; background-size: cover; background-position: center;">
                </div>
                <p style="background-color: black; max-width: 25vh; padding: 0.5vw; color: white">
                  <span class="h5" >Coworking Odontológico</span>
                  <br>
                  <span class="h6" style="color: #FFCE00">Barra da Tijuca | Rio de Janeiro</span>
                </p>
              </a>

            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

              <a href="#" style="text-decoration: none">
                <div class="img-responsive img-center" style="background: url('img/usuario.jpg'); height: 20vh; width: 25vh; background-repeat: no-repeat; background-size: cover; background-position: center;">
                </div>
                <p style="background-color: black; max-width: 25vh; padding: 0.5vw; color: white">
                  <span class="h5" >Coworking Odontológico</span>
                  <br>
                  <span class="h6" style="color: #FFCE00">Barra da Tijuca | Rio de Janeiro</span>
                </p>
              </a>

            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

              <a href="#" style="text-decoration: none">
                <div class="img-responsive img-center" style="background: url('img/item.png'); height: 20vh; width: 25vh; background-repeat: no-repeat; background-size: cover; background-position: center;">
                </div>
                <p style="background-color: black; max-width: 25vh; padding: 0.5vw; color: white">
                  <span class="h5" >Coworking Odontológico</span>
                  <br>
                  <span class="h6" style="color: #FFCE00">Barra da Tijuca | Rio de Janeiro</span>
                </p>
              </a>

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

          <div class="row">

            <div class="col">
              <button type="button" class="btn btn-outline-warning"><h2>Procure espaços</h2></button>
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
          <br>
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10 col-sm-12">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/58VlTRFUKg4?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
              </div>
            </div>
          </div>
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
          <div class="row" style="margin-top: 3.5vw; margin-bottom: 1.5vw">

            <div class="col" style="border-right: 2px solid grey;">
              <img class="logo-navbar" src="img/locou_logo.png">
              <br><br>
              <h6>Locou texto Locou Texto</h6>
            </div>

            <div class="col" style="border-right: 2px solid grey;">
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
            </div>

            <div class="col">
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

  </body>
