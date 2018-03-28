<!DOCTYPE html>

<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once 'Seguranca.php';
require_once 'BuscarEspacos.php';
require_once 'FunctionsDB.php';

  $seg  = new Seguranca();
  $tipo = $seg->filtro($_GET['t']);
  $editText = $seg->filtro($_GET['q']);

  $db = new FunctionsDB();
  $conn = $db->conectDB();

  $busca = new BuscarEspacos();


 $cont=0;

  // if ($tipo == "todos") {
     $array = $busca -> buscarEspacoBairro($conn, $editText);

   //  print_r ($array);

 // }else{
    // $array = $busca -> buscarEspacoBairroTipo($conn,$tipo, $editText);

 // }

  $prefixo = "http://www.yourdev.com.br/clientes/locou/img/anuncio/";

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
        <div class="row">
          <div class="col-6">
            <form class="form-inline justify-content-center desktop" action="index.html" method="post">
              <input type="text" name="q" style="width: 20vw" class="form-control" placeholder="Ex: Tijuca, Ipanema, Consultório">
              <button type="submit" class="btn btn-warning">Buscar</button>
            </form>
          </div>
          <div class="col-6">
            <a href="anunciar.php"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>
            <a class="ml-5"><img class="rounded-circle" src="img/usuario.jpg" style="height: 40px"></a>
            <a class="mx-3"><i style="font-size: 120%" class="far fa-bell"></i></a>
            <span class="ml-3 btn btn-outline-warning" data-toggle="modal" data-target="#myModal">Logar</span>
          </div>
        </div>
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
          <form class="form-inline justify-content-center mobile" action="index.html" method="post">
            <input type="text" name="q" class="form-control" placeholder="Ex: Tijuca, Ipanema, Consultório">
            <button type="submit" class="btn btn-warning">Buscar</button>
          </form>
          <br>
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
              <br>
              <span style="font-size: 90%; color:red; display: none">Login e/ou senha incorreto(s)</span>
              <br>
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
              <br>
              <span style="font-size: 90%; color:red; display: none">Um ou mais dados estão incorretos/faltando. Verifique novamente se os dados estão corretos</span>
              <br>
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

    <div class="container-fluid justify-content-center text-center">

      <div class="row">
        <div class="col-3" style="background-color: #FFCE00;padding-top: 2.5vw">
          <div class="row pb-3">
            <div class="col-12">
              <h6 style="font-size: 1vw; padding: 5px; background-color: black; color: white">
                Rio de janeiro
                <span class="px-2" style="font-size: 1vw;background-color: #2d2d2d;" >X</span>
              </h6>
            </div>
            <div class="col-12">
              <h6 style="font-size: 1vw;padding: 5px; background-color: black; color: white">
                Barra da Tijuca
                <span class="px-2" style="font-size: 1vw;background-color: #2d2d2d;" >X</span>
              </h6>
            </div>
            <div class="col-12">
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
              Salas para Palestras
            </div>
            <div class="col-12 py-2 px-5">
              <input type="checkbox" class="form-check-input" disabled>
              Salas de Aula
            </div>
            <div class="col-12 py-2 px-5">
              <input type="checkbox" class="form-check-input" disabled>
              Salas de Ensaio
            </div>
            <div class="col-12 py-2 px-5">
              <input type="checkbox" class="form-check-input" disabled>
              Ateliê de Artes
            </div>
            <div class="col-12 py-2 px-5">
              <input type="checkbox" class="form-check-input" disabled>
              Estúdio ou Academia
            </div>
            <div class="col-12 py-2 px-5">
              <input type="checkbox" class="form-check-input" disabled>
              Cozinhas Profissionais
            </div>
          </div>
        </div>
        <div class="col-9">
          <div class="row text-left">
            <div class="col-12 py-4 px-4">
              <h6 style="color: grey">Categoria 1 > Query do usuario</h6>
            </div>
          </div>
          <div class="row text-left">
            <div class="col-9 py-3 px-4">
              <h5>Busca por Query do usuário <span class="h6" style="color: grey"> -  <?php echo count($array)/6; ?> resultado(s)</span> </h5>
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
            <?php $aux = count($array)/6; for ($i=0; $i < $aux ; $i++) { ?>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div style="background-color: black">
                  <a href="anuncio.php?id=<?php echo $array[$cont++] ?>" style="text-decoration: none;">
                    <div class="row" style="height: 350px;">
                      <div class="col-12">
                        <img src="<?php  echo  $prefixo.$array[$cont++]; ?>" class="img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                      </div>
                      <div class="col-12">
                        <h5 style="color:white">
                          <?php echo  $array[$cont++]; ?>
                          <br>
                          <span style="color:grey"> <?php echo  $array[$cont++]; ?> |  <?php echo  $array[$cont++] ?> </span>
                        </h5>
                        <h6 style="color: white"> A partir de : <span class="h4" style="color: #FFCE00">R$  <?php echo  $array[$cont++]; ?></span> por hora </h6>
                      </div>
                    </div>
                  </a>
                </div>
                <br>
              </div>

          <?php } ?>
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
    <script>
      window.onload = alimentarQuery;

      function alimentarQuery()
      {
        var saida = "";
        var qtdObj = <?php  echo (count($array)/6) ?>;
      for(i = 0; i < qtdObj; i++)
       {

          console.log("Rodando "+i);

          <?php ?>
       }

        document.getElementById("resultadoJS").innerHTML = saida;
      }



    </script>

  </body>
