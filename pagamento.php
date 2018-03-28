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

    <div class="container-fluid justify-content-center text-left justify-content-center">

      <div class="row py-5 px-4 justify-content-center">
        <div class="col-10" style="border-style: solid; border-width: 2px; border-color: #FFC107">
          <div class="row px-5" style="background-color: black">
            <div class="col-12 px-3 py-3 text-center" style="color: white">
              <span class="h5">Adicione os dados para o método de pagamento</span>
            </div>
          </div>
          <form class="" action="" method="post">
            <div class="row px-5 py-4">
              <div class="col-12 px-3 py-3">
                <div class="form-group">
                    <label for="nomeC">Nome Completo</label>
                    <input type="text" class="form-control" id="nomeC" name="nomeC">
                </div>
                <br>
                <label>Data de nascimento</label>
                <br>
                <select id="days" name="dia"></select>
                <select id="months" name="mes"></select>
                <select id="years" name="ano"></select>
                <br><br><br>
                <div class="form-group">
                  <label for="cpf">CPF (Somente Números)</label>
                  <input type="text" class="form-control" id="cpf" name="cpf">
                </div>
              </div>
              <div class="col-3 px-3 py-2">
                <label for="cCD">Código do País</label>
              </div>
              <div class="col-3 px-3 py-2">
                <label for="ddd">DDD</label>
              </div>
              <div class="col-6 px-3 py-2">
                <label for="telefone">Número de Telefone</label>
              </div>
              <div class="col-3 px-3 py-1">
                <div class="form-group">
                    <input readonly type="number" class="form-control" id="cCD" name="cCD" placeholder="55">
                </div>
              </div>
              <div class="col-3 px-3 py-1">
                <div class="form-group">
                    <input type="text" class="form-control" id="ddd" name="ddd">
                </div>
              </div>
              <div class="col-6 px-3 py-1">
                <div class="form-group">
                    <input type="text" class="form-control" id="telefone" name="telefone">
                </div>
              </div>
              <div class="col-12 px-3 py-3">
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade">
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro">
                </div>
                <div class="form-group">
                    <label for="rua">Rua</label>
                    <input type="text" class="form-control" id="rua" name="rua">
                </div>
                <div class="form-group">
                    <label for="nRua">Número da Rua</label>
                    <input type="number" class="form-control" id="nRua" name="nRua">
                </div>
                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento">
                </div>
                <div class="form-group">
                    <label for="cep">CEP (Somente Números)</label>
                    <input type="number" class="form-control" id="cep" name="cep">
                </div>
                <label for="estado">Estado</label>
                <select class="form-control" name="estado">
  	               <option value="AC">Acre</option>
  	               <option value="AL">Alagoas</option>
  	               <option value="AP">Amapá</option>
  	               <option value="AM">Amazonas</option>
  	               <option value="BA">Bahia</option>
  	               <option value="CE">Ceará</option>
  	               <option value="DF">Distrito Federal</option>
  	               <option value="ES">Espírito Santo</option>
  	               <option value="GO">Goiás</option>
  	               <option value="MA">Maranhão</option>
  	               <option value="MT">Mato Grosso</option>
  	               <option value="MS">Mato Grosso do Sul</option>
  	               <option value="MG">Minas Gerais</option>
  	               <option value="PA">Pará</option>
  	               <option value="PB">Paraíba</option>
  	               <option value="PR">Paraná</option>
  	               <option value="PE">Pernambuco</option>
  	               <option value="PI">Piauí</option>
  	               <option value="RJ">Rio de Janeiro</option>
  	               <option value="RN">Rio Grande do Norte</option>
  	               <option value="RS">Rio Grande do Sul</option>
  	               <option value="RO">Rondônia</option>
  	               <option value="RR">Roraima</option>
  	               <option value="SC">Santa Catarina</option>
  	               <option value="SP">São Paulo</option>
  	               <option value="SE">Sergipe</option>
    	             <option value="TO">Tocantins</option>
                  </select>
                  <br>
                <div class="form-group">
                    <label for="pais">País</label>
                    <input readonly type="number" class="form-control" id="pais" name="pais" value="BRA" placeholder="Brasil">
                </div>
                <div class="form-group">
                    <label for="cartaoNum">Número do Cartão</label>
                    <input type="number" class="form-control" id="cartaoNum" name="cartaoNum">
                </div>
              </div>
              <div class="col-6 px-3 py-1">
                <div class="row">
                  <div class="col-12 text-center">
                    Data de Vencimento do cartão
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-6 px-3 py-1">
                        <select class="form-control"  name='expiraMes' id='expiraMes'>
                          <option value=''>MM</option>
                          <option value='01'>01</option>
                          <option value='02'>02</option>
                          <option value='03'>03</option>
                          <option value='04'>04</option>
                          <option value='05'>05</option>
                          <option value='06'>06</option>
                          <option value='07'>07</option>
                          <option value='08'>08</option>
                          <option value='09'>09</option>
                          <option value='10'>10</option>
                          <option value='11'>11</option>
                          <option value='12'>12</option>
                        </select>
                      </div>
                      <div class="col-6 px-3 py-1">
                        <select class="form-control"  name='expiraAno' id='expiraAno'>
                          <option value=''>YYYY</option>
                          <option value='18'>2018</option>
                          <option value='19'>2019</option>
                          <option value='20'>2020</option>
                          <option value='21'>2021</option>
                          <option value='22'>2022</option>
                          <option value='23'>2023</option>
                          <option value='24'>2024</option>
                          <option value='25'>2025</option>
                          <option value='26'>2026</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 px-3 py-1">
                <div class="form-group">
                    <label for="cartaoVer">Código Verificador</label>
                    <input type="number" class="form-control" id="cartaoVer" name="cartaoVer">
                </div>
              </div>
            </div>
            <div class="row px-5 text-center">
              <div class="col-12 px-5 py-2">
                <button type="submit" class="btn btn-warning m-3"><h4 style="font-weight: 300">Finalizar Reserva</h4></button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>

  </body>