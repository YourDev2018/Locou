<!DOCTYPE html>

<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once 'Seguranca.php';
require_once 'BuscarEspacos.php';
require_once 'FunctionsDB.php';
require_once 'FunctionsSession.php';

$session = new FunctionsSession();
$session->iniciarSession();

$seg  = new Seguranca();
$tipo = $seg->filtro($_GET['t']);
$editText = $seg->filtro($_GET['q']);

  $db = new FunctionsDB();
  $conn = $db->conectDB();

  $busca = new BuscarEspacos();

  $prefixo = "http://www.yourdev.com.br/clientes/locou/img/anuncio/";





if (!($tipo == "" || $tipo == null) ) {

  $cont=0;

  if ($tipo == "todos") {
      $auxBusca = false;
      if($editText == '' || $editText == null){
        $auxBusca = true;
      }
    $array = $busca -> buscarEspacoBairro($conn, $editText);

    if ($array == false) {
        $auxBusca = true;
        $array = $busca -> buscarEspacoBairro($conn, '');
    }


  }else{

    $auxBusca = false;
    if($editText == '' || $editText == null){
      $auxBusca = true;
    }

    $array = $busca -> buscarEspacoBairroTipo($conn, $tipo, $editText);

    if ($array == false) {
        $auxBusca = true;
        $array = $busca -> buscarEspacoBairroTipo($conn,$tipo, '');
    }

  }
  //  print_r ($array);

  // }else{
  // $array = $busca -> buscarEspacoBairroTipo($conn,$tipo, $editText);

  // }


}else{

    $array = $busca -> buscarEspacoBairro($conn, $editText);

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

  $(document).ready(function(){
    // document.getElementById('days');
    // document.getElementById('months');
    // document.getElementById('years');
    for (var i = 1; i < 32; i++) {
      var option = document.createElement("option");
      option.text = i;
      document.getElementById('days').add(option);
    }
    for (var i = 1; i < 13; i++) {
      var option = document.createElement("option");
      option.text = i;
      document.getElementById('months').add(option);
    }
    for (var i = 2018; i > 1899; i--) {
      var option = document.createElement("option");
      option.text = i;
      document.getElementById('years').add(option);
    }
  });

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
  <script>
  var url_string = window.location.href;
  var url = new URL(url_string);
  var t = url.searchParams.get("t");
  var q = url.searchParams.get("q");
  console.log(t);
  console.log(q);
  if(t == "")
  {
    window.location.href = "resultado.php?t="+"todos"+"&q="+q;
  }
  var p = "resultado.php?t=";
  function atualizarHref()
  {
    if(t == "todos")
    {
      t = "";
      document.getElementById('href-aula').href = p+"aula"+"&q="+q;
      document.getElementById('href-artes').href = p+"artes"+"&q="+q;
      document.getElementById('href-ensaio').href = p+"ensaio"+"&q="+q;
      document.getElementById('href-academia').href = p+"academia"+"&q="+q;
      document.getElementById('href-cozinhas').href = p+"cozinha"+"&q="+q;
      document.getElementById('href-workshop').href = p+"workshop"+"&q="+q;
      document.getElementById('href-palestras').href = p+"palestra"+"&q="+q;
      document.getElementById('href-consultorio').href = p+"consultorio"+"&q="+q;
      document.getElementById('href-produtora').href = p+"produtora"+"&q="+q;
      document.getElementById('href-fotografico').href = p+"fotografico"+"&q="+q;
      document.getElementById('href-costura').href = p+"costura"+"&q="+q;

    }
    else
    {
      document.getElementById('href-aula').href = p+t+","+"aula"+"&q="+q;
      document.getElementById('href-artes').href = p+t+","+"artes"+"&q="+q;
      document.getElementById('href-ensaio').href = p+t+","+"ensaio"+"&q="+q;
      document.getElementById('href-academia').href = p+t+","+"academia"+"&q="+q;
      document.getElementById('href-cozinhas').href = p+t+","+"cozinha"+"&q="+q;
      document.getElementById('href-workshop').href = p+t+","+"workshop"+"&q="+q;
      document.getElementById('href-palestras').href = p+t+","+"palestra"+"&q="+q;
      document.getElementById('href-consultorio').href = p+t+","+"consultorio"+"&q="+q;
      document.getElementById('href-produtora').href = p+t+","+"produtora"+"&q="+q;
      document.getElementById('href-fotografico').href = p+t+","+"fotografico"+"&q="+q;
      document.getElementById('href-costura').href = p+t+","+"costura"+"&q="+q;
    }
    if(q != "")
    {
      document.getElementById('querys-ativas').innerHTML = document.getElementById('querys-ativas').innerHTML + "<div class=\"col-12\"><h6 id=\"query-texto\" style=\"font-size: 1vw; padding: 5px; background-color: black; color: white\">"+q+"<span class=\"px-2\" style=\"font-size: 1vw;background-color: #2d2d2d;\" \" onclick=deletarQuery(\"query\") >X</span></h6></div>";
    }
    if(t != "todos")
    {
      console.log(t);
      t = t.split(",");
      console.log(t);
      if(t.length >= 1)
      {
        for(var i=0;i<t.length;i++)
        {
          if(t[i] == "costura")
          {
            document.getElementById('href-costura').removeAttribute("href");
            document.getElementById('href-costura').style.color = "white";
            document.getElementById('querys-ativas').innerHTML = document.getElementById('querys-ativas').innerHTML + "<div class=\"col-12\"><h6 id=\"query-costura\" style=\"font-size: 3vh; padding: 5px; background-color: black; color: white\">Cosutra<span class=\"px-2\" style=\"font-size: 2vh;background-color: #2d2d2d;\" \" onclick=deletarQuery(\"costura\") >X</span></h6></div>";
          }
          if(t[i] == "fotografico")
          {
            document.getElementById('href-fotografico').removeAttribute("href");
            document.getElementById('href-fotografico').style.color = "white";
            document.getElementById('querys-ativas').innerHTML = document.getElementById('querys-ativas').innerHTML + "<div class=\"col-12\"><h6 id=\"query-fotografico\" style=\"font-size: 3vh; padding: 5px; background-color: black; color: white\">Estúdio Fotografico<span class=\"px-2\" style=\"font-size: 2vh;background-color: #2d2d2d;\" \" onclick=deletarQuery(\"fotografico\") >X</span></h6></div>";
          }
          if(t[i] == "produtora")
          {
            document.getElementById('href-produtora').removeAttribute("href");
            document.getElementById('href-produtora').style.color = "white";
            document.getElementById('querys-ativas').innerHTML = document.getElementById('querys-ativas').innerHTML + "<div class=\"col-12\"><h6 id=\"query-produtora\" style=\"font-size: 3vh; padding: 5px; background-color: black; color: white\">Produtora<span class=\"px-2\" style=\"font-size: 2vh;background-color: #2d2d2d;\" \" onclick=deletarQuery(\"produtora\") >X</span></h6></div>";
          }
          if(t[i] == "consultorio")
          {
            document.getElementById('href-consultorio').removeAttribute("href");
            document.getElementById('href-consultorio').style.color = "white";
            document.getElementById('querys-ativas').innerHTML = document.getElementById('querys-ativas').innerHTML + "<div class=\"col-12\"><h6 id=\"query-consultorio\" style=\"font-size: 3vh; padding: 5px; background-color: black; color: white\">Consultórios<span class=\"px-2\" style=\"font-size: 2vh;background-color: #2d2d2d;\" \" onclick=deletarQuery(\"consultorio\") >X</span></h6></div>";
          }
          if(t[i] == "palestra")
          {
            document.getElementById('href-palestras').removeAttribute("href");
            document.getElementById('href-palestras').style.color = "white";
            document.getElementById('querys-ativas').innerHTML = document.getElementById('querys-ativas').innerHTML + "<div class=\"col-12\"><h6 id=\"query-palestra\" style=\"font-size: 3vh; padding: 5px; background-color: black; color: white\">Salas para Palestras<span class=\"px-2\" style=\"font-size: 2vh;background-color: #2d2d2d;\" \" onclick=deletarQuery(\"palestra\") >X</span></h6></div>";
          }
          if(t[i] == "workshop")
          {
            document.getElementById('href-workshop').removeAttribute("href");
            document.getElementById('href-workshop').style.color = "white";
            document.getElementById('querys-ativas').innerHTML = document.getElementById('querys-ativas').innerHTML + "<div class=\"col-12\"><h6 id=\"query-workshop\" style=\"font-size: 3vh; padding: 5px; background-color: black; color: white\">Workshop<span class=\"px-2\" style=\"font-size: 2vh;background-color: #2d2d2d;\" \" onclick=deletarQuery(\"workshop\") >X</span></h6></div>";
          }
          if(t[i] == "cozinha")
          {
            document.getElementById('href-cozinhas').removeAttribute("href");
            document.getElementById('href-cozinhas').style.color = "white";
            document.getElementById('querys-ativas').innerHTML = document.getElementById('querys-ativas').innerHTML + "<div class=\"col-12\"><h6 id=\"query-cozinha\" style=\"font-size: 3vh; padding: 5px; background-color: black; color: white\">Cozinhas Profissionais<span class=\"px-2\" style=\"font-size: 2vh;background-color: #2d2d2d;\" \" onclick=deletarQuery(\"cozinha\") >X</span></h6></div>";
          }
          if(t[i] == "academia")
          {
            document.getElementById('href-academia').removeAttribute("href");
            document.getElementById('href-academia').style.color = "white";
            document.getElementById('querys-ativas').innerHTML = document.getElementById('querys-ativas').innerHTML + "<div class=\"col-12\"><h6 id=\"query-academia\" style=\"font-size: 3vh; padding: 5px; background-color: black; color: white\">Estúdio ou Academia<span class=\"px-2\" style=\"font-size: 2vh;background-color: #2d2d2d;\" \" onclick=deletarQuery(\"academia\") >X</span></h6></div>";
          }
          if(t[i] == "ensaio")
          {
            document.getElementById('href-ensaio').removeAttribute("href");
            document.getElementById('href-ensaio').style.color = "white";
            document.getElementById('querys-ativas').innerHTML = document.getElementById('querys-ativas').innerHTML + "<div class=\"col-12\"><h6 id=\"query-ensaio\" style=\"font-size: 3vh; padding: 5px; background-color: black; color: white\">Salas de Ensaio<span class=\"px-2\" style=\"font-size: 2vh;background-color: #2d2d2d;\" \" onclick=deletarQuery(\"ensaio\") >X</span></h6></div>";
          }
          if(t[i] == "aula")
          {
            document.getElementById('href-aula').removeAttribute("href");
            document.getElementById('href-aula').style.color = "white";
            document.getElementById('querys-ativas').innerHTML = document.getElementById('querys-ativas').innerHTML + "<div class=\"col-12\"><h6 id=\"query-aula\" style=\"font-size: 3vh; padding: 5px; background-color: black; color: white\">Salas de Aula<span class=\"px-2\" style=\"font-size: 2vh;background-color: #2d2d2d;\" \" onclick=deletarQuery(\"aula\") >X</span></h6></div>";
          }
          if(t[i] == "artes")
          {
            document.getElementById('href-artes').removeAttribute("href");
            document.getElementById('href-artes').style.color = "white";
            document.getElementById('querys-ativas').innerHTML = document.getElementById('querys-ativas').innerHTML + "<div class=\"col-12\"><h6 id=\"query-artes\" style=\"font-size: 3vh; padding: 5px; background-color: black; color: white\">Ateilê de Artes<span class=\"px-2\" style=\"font-size: 2vh;background-color: #2d2d2d;\" \" onclick=deletarQuery(\"artes\") >X</span></h6></div>";
          }
        }
      }
    }
  }
  function deletarQuery(tipo)
  {
    console.log(tipo);
    console.log(t);
    var temp = "";
    if(t.length >= 1)
    {
      for(var i=0;i<t.length;i++)
      {
        if(t[i] == tipo)
        {
          var index = t.indexOf(tipo);
          if (index > -1) {
            t.splice(index, 1);
          }
        }
        else
        {
          temp = temp + t[i];
          if(i != t.length-1)
          {
            temp = temp+",";
          }
        }
      }
      console.log(temp);
      var t_teste = temp.substr(temp.length - 1);
      if(t_teste == ",")
      {
        temp = temp.substring(0, temp.length - 1);
      }
      if(tipo == "query")
      {
        console.log("alterando sem query");
        window.location.href = "resultado.php?t="+temp+"&q=";
      }
      else
      {
        if(tipo == "nova-query")
        {
          if(temp == "" || temp == null)
          {
            console.log(q);
            console.log(temp + "-teste");
            window.location.href = "resultado.php?t="+"todos"+"&q="+q;
          }
          else
          {
            console.log(q);
            console.log(temp);
            window.location.href = "resultado.php?t="+temp+"&q="+q;
          }
        }
      }
      if(tipo != "nova-query" && tipo != "query")
      {
        console.log(temp);
        window.location.href = "resultado.php?t="+temp+"&q="+q;
      }
    }
    console.log(t);
  }
  function queryInterna()
  {
    q = document.getElementById('query-interna').value;
    deletarQuery("nova-query");
  }
  </script>
  <script type='text/javascript'>
  $(document).ready(function()
  {
    atualizarHref();
  });
  </script>
  <script type='text/javascript'>
            $(document).ready(function(){
              var logado = "<?php echo $session->vereficarLogin()?>";
            if(logado!="false")
            {
              document.getElementById('anunciarF').innerHTML = '<a href="anunciar.php" style="color: white">Anuncie Aqui</a>';
              document.getElementById('anunciarSM').innerHTML = '<a href="anunciar.php"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>';
              document.getElementById('anunciarSD').innerHTML = '<a href="anunciar.php"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>';
            }
            else {
              document.getElementById('anunciarF').innerHTML = '<a onclick="$(\'#cadastroPop\').modal(\'show\');" style="cursor:pointer;color: white">Anuncie Aqui</a>';
              document.getElementById('anunciarSM').innerHTML = '<a onclick="$(\'#cadastroPop\').modal(\'show\');"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>';
              document.getElementById('anunciarSD').innerHTML = '<a onclick="$(\'#cadastroPop\').modal(\'show\');"><button type="button" class="btn btn-outline-warning">Anuncie Grátis</button></a>';
            }
            });
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

  <nav class="navbar desktop" style="background-color: rgba(0,0,0,1);">
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
              <span>Ainda não é cadastrado? <a href="cadastro.php"><span style="color:blue">Clique aqui</span></a> </span>
              <br>
              <span>Esqueceu a senha? <a href="alterarSenha.php"><span style="color:blue">Clique aqui</span></a> </span>
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
      <div class="col-lg-3 col-sm-12" style="background-color: #FFCE00;padding-top: 2.5vw">
        <div class="row pb-3" id="querys-ativas">
        </div>
        <div class="row" style="border-top: solid; border-width: 2px; border-color: black;">
          <div class="col-12 py-3">
            <h5><b>Categoria do espaço</b></h5>
          </div>
        </div>
        <div class="row text-left" style="border-bottom: solid; border-width: 2px; border-color: black;">
          <div class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: black" href="#" id="href-consultorio">Consultórios</a>
          </div>
          <div class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: grey" href="#" id="href-workshop-d">Workshop</a>
          </div>
          <div class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: grey" href="#" id="href-palestras-d">Salas para Palestras</a>
          </div>
          <div class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: grey" href="#" id="href-aula-d">Salas de Aula</a>
          </div>
          <div class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: grey" href="#" id="href-ensaio-d">Salas de Ensaio</a>
          </div>
          <div class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: grey" href="#" id="href-artes-d">Ateliê de Artes</a>
          </div>
          <div class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: grey" href="#" id="href-fotografico-d">Estúdio Fotografico</a>
          </div>
          <div class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: grey" href="#" id="href-produtora-d">Produtora</a>
          </div>
          <div class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: grey" href="#" id="href-costura-d">Ateliê de Costura</a>
          </div>
          <div class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: grey" href="#" id="href-academia-d">Estúdio ou Academia</a>
          </div>
          <div class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: grey" href="#" id="href-cozinhas-d">Cozinhas Profissionais</a>
          </div>

          <div style="display:none" class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: black" href="#" id="href-workshop">Workshop</a>
          </div>
          <div style="display:none" class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: black" href="#" id="href-palestras">Salas para Palestras</a>
          </div>
          <div style="display:none" class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: black" href="#" id="href-aula">Salas de Aula</a>
          </div>
          <div style="display:none" class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: black" href="#" id="href-ensaio">Salas de Ensaio</a>
          </div>
          <div style="display:none" class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: black" href="#" id="href-artes">Ateliê de Artes</a>
          </div>
          <div style="display:none" class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: black" href="#" id="href-fotografico">Estúdio Fotografico</a>
          </div>
          <div style="display:none" class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: black" href="#" id="href-produtora">Produtora</a>
          </div>
          <div style="display:none" class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: black" href="#" id="href-costura">Ateliê de Costura</a>
          </div>
          <div style="display:none" class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: black" href="#" id="href-academia">Estúdio ou Academia</a>
          </div>
          <div style="display:none" class="col-12 py-2 px-5">
            <a style="text-decoration: none;color: black" href="#" id="href-cozinhas">Cozinhas Profissionais</a>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-sm-12">
        <div class="row text-center justify-content-center">
          <div class="col-12 py-3 px-5">
            <form class="form-inline justify-content-center desktop" method="get">
              <input id="query-interna" type="text" name="q" style="width: 35%" class="form-control" placeholder="Ex: Tijuca, Ipanema, Consultório">
              <span class="btn btn-warning" onclick="queryInterna();">Buscar</span>
            </form>
          </div>
        </div>
        <div class="row text-left">
          <div class="col-12 py-4 px-4">
            <!-- <h6 style="color: grey">Categoria 1 > Query do usuario</h6> -->
          </div>
        </div>
        <div class="row text-left">
          <div class="col-12 py-3 px-4">
            <h5>A pesquisa retornou um total de <span class="h6" style="color: grey"> -  <?php  if($array!= "" || $array !=null ){ echo count($array)/6;} ?> resultado(s)</span> </h5>
          </div>
          <!-- <div class="col-12 pt-3 px-4">
            <select class="" name="ordemPesquisa">
              <option value="aleatorio">Aleatório</option>
              <option value="popular">Mais Popular</option>
              <option value="diaria">Menor valor de diária</option>
            </select>
          </div> -->
        </div>
        <div class="row text-center">
          <div class="col-12 px-4">
            <hr>
          </div>
        </div>

        <?php
          //<!-- //Printar aqui texto de sem resultados-->
          if ($auxBusca == true) {
              echo (
                '
                <div style="display:" class="row text-center">
                <div class="col-12 px-4">
                <h6>Não houve resultados com os termos pesquisados. Todos os anuncios disponíveis foram retornados.</h6>
                </div>
                </div>'

              );
          }

        ?>

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
            <h6 style="color: grey">Conectando pessoas produtivas a espaços ociosos</h6>
            <br><br>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6" style="border-right: 2px solid grey;">
            <h6>
              <a href="#" onclick="window.open('TermoUso.pdf', '_blank', 'fullscreen=yes');" style="color: white">Termo de Uso</a>
              <br><br>
              <a href="#" onclick="window.open('Privacidade.pdf', '_blank', 'fullscreen=yes');" style="color: white">Política de Privacidade</a>
              <br><br>
              <span id="anunciarF"></span>
              <br><br>
              <a href="resultado.php?t=todos&q=" style="color: white">Procure um espaço</a>
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
