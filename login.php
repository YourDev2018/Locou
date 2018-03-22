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
    <title>Locou | Anuncie Grátis</title>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
<style>
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
  <body>

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
        <div class="col-12">
          <div class="row text-center justify-content-center">
            <div class="py-5 col-lg-8 col-md-12 col-sm-12">
              <div class="my-5 row text-center justify-content-center" style="border-style: solid; border-width: 2px; border-color: #FFC107">
                <div class="py-5 col-12" style="background-color: black;">
                  <span class="btn btn-outline-warning active" id="logar-b" onclick="logar(this);"><h3 style="font-weight: 300">Logar</h3></span>
                  <br class="mobile"><br class="mobile">
                  <span class="px-5 h4" style="color: white; font-weight: 300">ou</span>
                  <br class="mobile"><br class="mobile">
                  <span class="btn btn-outline-warning" id="cadastrar-b" onclick="cadastrar(this);"><h3 style="font-weight: 300">Cadastrar</h3></span>
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
                <div class="pt-5 col-8" id="logar-div">
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
                <div class="pt-5 col-8" id="cadastrar-div" style="display: none">
                  <form action="#" method="post">
                    <div class="form-group">
                      <label for="nome">Nome</label>
                      <input type="text" class="form-control" id="nome" name="nome">
                    </div>
                    <div class="form-group">
                      <label for="sobrenome">Sobrenome</label>
                      <input type="text" class="form-control" id="sobrenome" name="sobrenome">
                    </div>
                    <div class="form-group">
                      <label>Data de nascimento</label>
                      <br>
                      <select id="days"></select>
                      <select id="months"></select>
                      <select id="years"></select>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@exemplo.com">
                    </div>
                    <div class="form-group">
                      <label for="senha">Senha</label>
                      <input type="password" class="form-control" id="senha" name="senha">
                    </div>
                    <button type="submit" class="btn btn-warning m-3"><h4 style="font-weight: 300">Cadastrar</h4></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </body>
