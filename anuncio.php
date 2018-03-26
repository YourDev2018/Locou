  <!DOCTYPE html>

  <?php
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



  //print_r ($idAnuncio) ;
  //print_r ($array) ;

  $busca = new BuscarEspacos();
  $arrayGeral = $busca->retornarDescGeral($conn, $idAnuncio);





  $busca->addContador($conn, $idAnuncio);

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

      <!-- Titulo Anuncio -->

      <div class="container-fluid justify-content-center text-center" style="margin-top: 1.5vw">
        <div class="row">

          <div class="col-2">
          </div>
          <div class="col-8">
<<<<<<< HEAD
            <h1><b><?php $cont = 4; echo $array[$cont]?></b></h1>
            <h5 style="color: grey"><?php $cont++; echo $array[$cont]?> |<?php $cont++; echo $array[$cont]?> | <?php $cont =6; echo $array[6]?> - <?php $cont++; echo $array[$cont]?> </h5>
=======
            <h1><b><?php $cont = 2; echo $array[$cont]?></b></h1>
            <h5 style="color: grey"><?php $cont++; echo $array[$cont]?> | <?php $cont++; echo $array[$cont]?> | <?php $cont =6; echo $array[6]?> - <?php $cont++; echo $array[$cont]?> </h5>
            <h6 style="font-weight: 300; font-size: 150%; color: #FFCE00" >&#9733;&#9733;&#9733;&#9733;&#9733; <span style="color: grey; font-size: 15px"> - 5.0 <br> (2 avaliações)</span></h6>
>>>>>>> f0f5a4891946495865fa4da10e0c2bde34975a98
          </div>
          <div class="col-2">
          </div>

        </div>
      </div>

      <!-- Fotos e dados básicos -->
      <form class="" action="#" method="post">

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
                      <div class="carousel-inner" style="width:100%; height: 30vw">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="<?php $cont = 1; echo $prefixo.$array[$cont++]?>">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="<?php  echo $prefixo.$array[$cont++]?>">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="<?php  echo $prefixo.$array[$cont++]?>">
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
                    <div class="row">
                      <div class="col-12 mt-2">
                        <div class="row text-left">
                          <div class="col-12" style="border-bottom: solid; border-width: 2px; border-color: #FFC107;">
                            <!-- <h4><?php $cont = 6; echo $array[$cont]?></h4> -->
                            <h2><?php $cont =2 ; echo $array[$cont]?> </h2>
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

              <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 text-center justify-content-center" style="border-bottom: solid; border-width: 2px; border-color: #FFC107;">
                  <div class="row text-center justify-content-center py-3">
                    <div class="col-lg-6 col-md-10 col-sm-12 text-center justify-content-center">
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

                <div class="col-lg-6 col-md-6 col-sm-12 text-center justify-content-center" style="background-color: black;border-left: solid; border-width: 2px; border-color: #FFC107;">
                  <div class="row">
                    <div class="col-12 pt-4" style="border-top: solid; border-width: 1px; border-color: #FFC107; background-color: black">
                      <div style="background-color: black" class="pt-3">

                        <div class="row">

                          <div class="col-12">
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

                          <!-- <div class="col-6" style="color: white">
                            <div class="col-12 pt-5">
                              <h6>Conquistas</h6>
                            </div>
                            <div class="col-12">
                              <h6>Conquistas</h6>
                            </div>
                            <div class="col-12">
                              <h6>Conquistas</h6>
                            </div>
                          </div> -->

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

              </div>

              <div class="row">

                  <div class="col-lg-12 col-md-12 col-sm-12 text-center justify-content-center">
                    <div class="row">
                      <div class="col-12" style="background-color: black; margin-bottom: 2vw">
                        <p style="margin-top: 1vw; margin-bottom: 1vw">
                          <h4 style="color:white">A partir de:</h4>
                          <h1 style="color:#FFCE00;font-weight: 600">R$ 000,00</h1>
                          <h6 style="color:grey">E as taxas já estão inclusas!</h6>
                        </p>
                      </div>

                    </div>

                    <div class="row" style="margin-bottom: 2vw">



                    </div>

                    <div class="row p-3" style="border-top: solid; border-width: 2px; border-color: #FFC107; border-bottom: solid; border-width: 2px; border-color: #FFC107;background-color: black">
                      <div class="col-12">
                        <h5 style="color: white">Preço total: <br class="mobile"> <span style="color: #FFCE00" class="h4" id="preco-total">R$ 000,00</span> </h5>
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



      </form>

    </body>
