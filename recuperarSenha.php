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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
.panorama {
  height: 400px;
  overflow-x: scroll;
  overflow-y: hidden;
  img {
    height: 100%;
  }
}
</style>
<body style="font-family: 'Muli'">

  <nav class="navbar desktop" style="background-color: rgba(0,0,0,1)">
    <a class="navbar-brand ml-5" >
      <img  class="logo-navbar" src="img/locou_logo.png">
    </a>
  </nav>

  <nav class="navbar mobile" style="background-color: rgba(0,0,0,1)">
    <div class="row justify-content-center text-center">
      <div class="col-12">
        <a>
          <img class="logo-navbar" src="img/locou_logo.png">
          <br><br>
        </a>
      </div>
    </div>
  </nav>

  <div class="container-fluid justify-content-center text-center">

    <div class="row justify-content-center text-center" style="background-color: #FFC107;">
      <div class="col-lg-11 col-md-11 col-sm-11 titulo-anuncie">
        <br>
        <h2>
          <b>Recuperar a senha</b>
          <br>
        </h2>
        <h4>

        </h4>
        <br>
      </div>
    </div>


    <div class="row justify-content-center text-center py-5" id="dados_basicos">
      <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">
        <div class="row justify-content-center text-center">
          <div class="col-12 py-3" style="color: #FFC107; background-color: black">
            <span class="btn btn-outline-warning" onclick="dados_basicos_tip(this)"><span style="font-size: 2em">Recuperar a senha</span></span>
          </div>
          <div class="col-10">
            <div class="px-5 pt-4" style="background-color:white; color: black">
              <span class="h5">
                Digite no campo abaixo a nova senha para a sua conta.
              </span>
              <br><br><br>

              <form class="" action="index.php" method="post">
                <input required type="password" name="senha" value="" size="30" placeholder="Digite aqui sua nova senha" id="senha">
                <br><br><br>
                <button type="submit" class="btn btn-warning" name="button">Atualizar Senha</button>
              </form>

              <br><br>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center text-center py-5" style="color: white;background-color: black">
      <div class="col-lg-6 col-md-10 col-sm-12">
        <div class="row" style="margin-top: 2vw; margin-bottom: 1.5vw">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <img class="logo-navbar" src="img/locou_logo.png">
            <br><br>
            <h6 style="color: grey">Conectando pessoas produtivas a espaços ociosos</h6>
            <br><br>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
