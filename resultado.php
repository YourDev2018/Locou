<!DOCTYPE html>

<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once 'Seguranca.php';
require_once 'BuscarEspacos.php';
require_once 'FunctionsDB.php';

$seg  = new Seguranca();
$tipo = $seg->filtro($_GET['t']);
$editText = $seg->filtro($_GET['q']);

if (!($tipo == "" || $tipo == null) ) {
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <div class="row text-center justify-content-center">
        <div class="col-12 py-3 px-5">
          <form class="form-inline justify-content-center desktop" action="resultado.php" method="get">
            <input type="text" name="q" style="width: 35%" class="form-control" placeholder="Ex: Tijuca, Ipanema, Consultório">
            <button type="submit" class="btn btn-warning">Buscar</button>
          </form>
        </div>
      </div>
      <div class="row text-left">
        <div class="col-12 py-4 px-4">
          <h6 style="color: grey">Categoria 1 > Query do usuario</h6>
        </div>
      </div>
      <div class="row text-left">
        <div class="col-12 py-3 px-4">
          <h5>Busca por Query do usuário <span class="h6" style="color: grey"> -  <?php  if($array!= "" || $array !=null ){ echo count($array)/6;} ?> resultado(s)</span> </h5>
        </div>
        <div class="col-12 pt-3 px-4">
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
        <?php if($array!= "" || $array !=null ){ $aux = count($array)/6;} for ($i=0; $i < $aux ; $i++) { ?>

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

  <div class="row justify-content-center" style="color: white; background-color: black">
    <div class="col-3">
    </div>
    <div class="col-lg-6 col-md-10 col-sm-12">
      <div class="row" style="margin-top: 2vw; margin-bottom: 1.5vw">

        <div class="col-lg-4 col-md-4 col-sm-12" style="border-right: 2px solid grey;">
          <img class="logo-navbar" src="img/locou_logo.png">
          <br><br>
          <h6>Conectando pessoas produtivas a espaços ociosos</h6>
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
            <a href="mailto:someone@contato@locou.co" target="_top" style="color: white">contato@locou.co</a>
          </h6>
          <br><br>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 text-left">
          <h6 class="text-center" style="color: grey">
            Nossas Redes sociais
            <br><br>
          </h6>
          <h6 class="text-center">
            <a href="https://www.facebook.com/locou.co/" style="color: white;text-decoration: none"><i class="fa fa-facebook-square" style="color: #6092F7; font-size: 200%"></i> <br><br> locou.com</a>
            <br><br>
            <a href="https://www.linkedin.com/company/locou/" style="color: white;text-decoration: none"><i class="fa fa-linkedin" style="color: #0077B5; font-size: 200%"></i> <br><br> locou</a>
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
