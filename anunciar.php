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
  .circle
  {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    font-size: 25px;
    color: #fff;
    line-height: 50px;
    text-align: center;
    background: #FFC107
  }
  </style>
  <body style="font-family: 'Muli'">

    <nav class="navbar" style="background-color: black">
      <a class="navbar-brand ml-5">
        <img class="logo-navbar" src="img/locou_logo.png">
      </a>
      <span class="navbar-brand menu-navbar mr-5">
        <a class="mx-3">Sobre</a>
        <a class="mx-3">Cadastre-se</a>
        <a class="mx-3">Login</a>
        <button type="button" class="btn btn-outline-warning">Anuncie Grátis</button>
      </span>
    </nav>

    <!-- Seção Titulo -->

    <div class="container-fluid justify-content-center text-center" style="background-color: #FFC107">
      <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4 titulo-anuncie">
          <br>
          <h1>
            <b>Texto de anuncio</b>
            <br>
          </h1>
          <h3>
            Texto de anúncio Texto de anúncio Texto de anúncio Texto de anúncio Texto de anúncio
          </h3>
          <br>
        </div>
        <div class="col-4">
        </div>
      </div>
    </div>

    <!-- Seção cadastro -->

    <div class="container-fluid justify-content-center text-center">
      <form>
        <br><br>

        <!-- CADASTRO PARTE 1-->

        <div class="row">
          <div class="col-2">
          </div>
          <div class="col-8" style="border-style: solid; border-width: 2px; border-color: #FFC107">
            <br>
            <div class="row">
              <div class="col-1">
                <div class="circle">01</div>
              </div>
            </div>

            <!-- TITULO DO ANUNCIO -->


            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-2 text-right">
                Título:
              </div>
              <div class="col-4 text-left">
                <input type="text" class="form-control" id="titulo" placeholder="Ex: Coworking Odontológico">
                <br>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <span style="color: grey">Não especifique aqui o endereço, nomes ou derivados, <b>APENAS</b> um nome genérico de seu espaço. <br> O anúncio que não seguir esta regra está sujeito a ser apagado. </span>
                <br><br>
              </div>
            </div>


            <!-- ESTADO -->
            <br>

            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-2 text-right">
                Estado (UF):
              </div>
              <div class="col-2 text-left">
                <select class="form-control" id="uf">
                  <option>AC</option>
                  <option>AL</option>
                  <option>AM</option>
                  <option>AP</option>
                  <option>BA</option>
                  <option>CE</option>
                  <option>DF</option>
                  <option>ES</option>
                  <option>GO</option>
                  <option>MA</option>
                  <option>MG</option>
                  <option>MS</option>
                  <option>MT</option>
                  <option>PA</option>
                  <option>PB</option>
                  <option>PE</option>
                  <option>PI</option>
                  <option>PR</option>
                  <option>RJ</option>
                  <option>RN</option>
                  <option>RO</option>
                  <option>RR</option>
                  <option>RS</option>
                  <option>SC</option>
                  <option>SE</option>
                  <option>SP</option>
                  <option>TO</option>
                </select>
              </div>
            </div>

            <!-- CIDADE -->
            <br>

            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-2 text-right">
                Cidade:
              </div>
              <div class="col-4 text-left">
                <input type="text" class="form-control" id="cidade" placeholder="Ex: Rio de Janeiro">
              </div>
            </div>

            <!-- BAIRRO -->
            <br>

            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-2 text-right">
                Bairro:
              </div>
              <div class="col-4 text-left">
                <input type="text" class="form-control" id="bairro" placeholder="Ex: Ipanema">
              </div>
            </div>


            <br><br>
          </div>
          <div class="col-2">
          </div>
        </div>


        <!-- CADASTRO PARTE 2 -->
        <br><br>

        <div class="row">
          <div class="col-2">
          </div>
          <div class="col-8" style="border-style: solid; border-width: 2px; border-color: #FFC107">
            <br>

            <div class="row">
              <div class="col-1">
                <div class="circle">02</div>
              </div>
            </div>

            <!-- Metragem -->

            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-2 text-right">
                Metragem (M² do local):
              </div>
              <div class="col-4 text-left">
                <input type="text" class="form-control" id="metragem" placeholder="Ex: 120">
              </div>
            </div>

            <!-- Recepção -->
            <br>

            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-2 text-right">
                Tem recepção?
              </div>
              <div class="col-2 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="recepcao" id="recepcao-sim" value="sim">
                <label class="form-check-label" for="recepcao-sim">Sim</label>
              </div>
              <div class="col-2 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="recepcao" id="recepcao-nao" value="nao">
                <label class="form-check-label" for="recepcao-nao">Não</label>
              </div>
            </div>

            <!-- Banheiro Privativo -->
            <br>

            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-2 text-right">
                Tem banheiro privativo?
              </div>
              <div class="col-2 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="banheiro-privativo" id="banheiro-privativo-sim" value="sim">
                <label class="form-check-label" for="banheiro-privativo-sim">Sim</label>
              </div>
              <div class="col-2 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="banheiro-privativo" id="banheiro-privativo-nao" value="nao">
                <label class="form-check-label" for="banheiro-privativo-nao">Não</label>
              </div>
            </div>

            <!-- Banheiro -->
            <br>

            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-2 text-right">
                Tem banheiro comum?
              </div>
              <div class="col-2 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="banheiro" id="banheiro-sim" value="sim">
                <label class="form-check-label" for="banheiro-sim">Sim</label>
              </div>
              <div class="col-2 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="banheiro" id="banheiro-nao" value="nao">
                <label class="form-check-label" for="banheiro-nao">Não</label>
              </div>
            </div>

            <br><br>
          </div>
          <div class="col-2">
          </div>
        </div>


      </form>
    </div>


  </body>
