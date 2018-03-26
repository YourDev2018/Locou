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
      <a class="navbar-brand" href="http://www.yourdev.com.br/clientes/locou/" >
        <img class="pl-5 logo-navbar" src="img/locou_logo.png">
      </a>
      <span style="float:right;" class="navbar-brand menu-navbar mr-5 ml-auto">
        <a class="mx-3">Sobre</a>
        <a class="mx-3">Como Funciona</a>
        <a class="mx-3">Procurar Espaços</a>
        <a href="http://www.yourdev.com.br/clientes/locou/anunciar.php"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>
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
          </span>
        </div>
      </div>
    </nav>

    <div class="container-fluid justify-content-center text-center">

      <div class="row">
        <div class="col-3" style="background-color: #FFCE00;padding-top: 2.5vw">
          <div class="row pb-3">
            <div class="col-4">
              <h6 style="font-size: 1vw; padding: 5px; background-color: black; color: white">
                Rio de janeiro
                <span class="px-2" style="font-size: 1vw;background-color: #2d2d2d;" >X</span>
              </h6>
            </div>
            <div class="col-4">
              <h6 style="font-size: 1vw;padding: 5px; background-color: black; color: white">
                Barra da Tijuca
                <span class="px-2" style="font-size: 1vw;background-color: #2d2d2d;" >X</span>
              </h6>
            </div>
            <div class="col-4">
              <h6 style="font-size: 1vw;padding: 5px; background-color: black; color: white">
                Ipanema Rj Rio de janeiro
                <span class="px-2" style="font-size: 1vw;background-color: #2d2d2d;" >X</span>
              </h6>
            </div>
          </div>
          <div class="row" style="border-top: solid; border-width: 2px; border-color: black;">
            <div class="col-12 py-3">
              <h5><b>Categoria do espaço</b></h5>
            </div>
          </div>
          <div class="row text-left" style="border-bottom: solid; border-width: 2px; border-color: black;">
            <div class="col-12 py-2 px-5">
              <input type="checkbox" class="form-check-input" disabled>
              Consultórios
            </div>
            <div class="col-12 py-2 px-5">
              <input type="checkbox" class="form-check-input" disabled>
              WorkShop
            </div>
            <div class="col-12 py-2 px-5">
              <input type="checkbox" class="form-check-input" disabled>
              Salas de aula
            </div>
            <div class="col-12 py-2 px-5">
              <input type="checkbox" class="form-check-input" disabled>
              Ateliê de arte
            </div>
            <div class="col-12 py-2 px-5">
              <input type="checkbox" class="form-check-input" disabled>
              Cozinhas Profissionais
            </div>
          </div>
          <div class="row">
            <div class="col-12 py-3">
              <h5><b>Comodidades do espaço</b></h5>
            </div>
          </div>
          <div class="row text-left" style="border-bottom: solid; border-width: 2px; border-color: black;">
            <div class="col-12 py-2 px-5">
              <input type="checkbox" class="form-check-input" disabled>
              Estacionamento
            </div>
            <div class="col-12 py-2 px-5">
              <input type="checkbox" class="form-check-input" disabled>
              Ar condicionado
            </div>
          </div>
        </div>
        <div class="col-9">
          <div class="row text-left">
            <div class="col-12 py-4 px-4">
              <h6 style="color: grey">Categoria 1 > Categoria 2 > Query do usuario</h6>
            </div>
          </div>
          <div class="row text-left">
            <div class="col-9 py-3 px-4">
              <h5>Busca por Query do usuário <span class="h6" style="color: grey"> 10 resultado(s)</span> </h5>
            </div>
            <div class="col-3 pt-3 px-4">
              <select class="" name="ordemPesquisa">
                <option value="aleatorio">Aleatório</option>
                <option value="popular">Mais Popular</option>
                <option value="diaria">Menor valor de diária</option>
              </select>
            </div>
          </div>
          <div class="row text-center">
            <div class="col-12 px-4">
              <hr>
            </div>
          </div>
          <div class="row px-4 py-4 text-left text-center">

            <div class="col-lg-4 col-md-6 col-sm-6">
              <div style="background-color: black">
                <a href="" style="text-decoration: none;">
                  <div class="row" style="height: 350px;">
                    <div class="col-12">
                      <img src="img/item.png" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-12">
                      <h5 style="color:white">
                        Alguel de CoWork
                        <br>
                        <span style="color:grey">Ipanema | Rio de Janeiro</span>
                      </h5>
                      <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ 1000</span> por hora </h6>
                    </div>
                  </div>
                </a>
              </div>
              <br>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div style="background-color: black">
                <a href="" style="text-decoration: none;">
                  <div class="row" style="height: 350px;">
                    <div class="col-12">
                      <img src="img/item.png" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-12">
                      <h5 style="color:white">
                        Alguel de CoWork
                        <br>
                        <span style="color:grey">Ipanema | Rio de Janeiro</span>
                      </h5>
                      <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ 1000</span> por hora </h6>
                    </div>
                  </div>
                </a>
              </div>
              <br>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div style="background-color: black">
                <a href="" style="text-decoration: none;">
                  <div class="row" style="height: 350px;">
                    <div class="col-12">
                      <img src="img/item.png" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-12">
                      <h5 style="color:white">
                        Alguel de CoWork
                        <br>
                        <span style="color:grey">Ipanema | Rio de Janeiro</span>
                      </h5>
                      <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ 1000</span> por hora </h6>
                    </div>
                  </div>
                </a>
              </div>
              <br>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div style="background-color: black">
                <a href="" style="text-decoration: none;">
                  <div class="row" style="height: 350px;">
                    <div class="col-12">
                      <img src="img/item.png" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                    </div>
                    <div class="col-12">
                      <h5 style="color:white">
                        Alguel de CoWork
                        <br>
                        <span style="color:grey">Ipanema | Rio de Janeiro</span>
                      </h5>
                      <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$ 1000</span> por hora </h6>
                    </div>
                  </div>
                </a>
              </div>
              <br>
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

  </body>
