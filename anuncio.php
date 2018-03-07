<!DOCTYPE html>
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
  </head>
  <body style="font-family: 'Muli'">

    <nav class="navbar" style="background-color: black">
      <a class="navbar-brand ml-5" href="http://www.yourdev.com.br/clientes/locou/" >
        <img class="logo-navbar" src="img/locou_logo.png">
      </a>
      <span class="navbar-brand menu-navbar mr-5">
        <a class="mx-3">Sobre</a>
        <a class="mx-3">Cadastre-se</a>
        <a class="mx-3">Login</a>
        <a href="http://www.yourdev.com.br/clientes/locou/anunciar.php"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>
      </span>
    </nav>

    <!-- Titulo Anuncio -->

    <div class="container-fluid justify-content-center text-center" style="margin-top: 1.5vw">
      <div class="row">

        <div class="col-2">
        </div>
        <div class="col-8">
          <h1><b>Nome do anúncio</b></h1>
          <h5 style="color: grey">Estado | Cidade | Bairro - Categoria</h5>
        </div>
        <div class="col-2">
        </div>

      </div>
    </div>

    <!-- Fotos e dados básicos -->

    <div class="container-fluid justify-content-center text-center" style="margin-top: 1vw; border-top: 2.5px solid #FFCE00;">
      <br>
      <div class="row">

        <div class="col-1">
        </div>
        <div class="col-10">

          <div class="row">

            <!-- Carousel Fotos -->

            <div class="col-6">
              <div class="c-wrapper">
                <div id="carousel-fotos" class="carousel" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-fotos" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-fotos" data-slide-to="1"></li>
                    <li data-target="#carousel-fotos" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner"style="width:100%; height: 25vw">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="img/item.png">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="img/categoria.jpg">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="img/item.png">
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

            <!-- Seção caracteristicas e infos - Barra da direita -->

            <div class="col-6">

              <!-- Preço -->

              <div class="row">

                <div class="col-3">
                </div>
                <div class="col-6" style="background-color: black; margin-bottom: 2vw">
                  <p style="margin-top: 1vw; margin-bottom: 1vw">
                    <h4 style="color:white">A partir de:</h4>
                    <h1 style="color:#FFCE00;font-weight: 600">R$ 000,00</h1>
                    <h6 style="color:grey">E as taxas já estão inclusas!</h6>
                  </p>
                </div>
                <div class="col-3">
                </div>

              </div>

              <!-- Preço dinamico e reserva -->

              <div class="row">

                <div class="col-3">
                </div>
                <div class="col-6" style="margin-bottom: 2vw">

                </div>
                <div class="col-3">
                </div>

              </div>

            </div>

          </div>

        </div>
        <div class="col-1">
        </div>

      </div>
    </div>

  </body>
