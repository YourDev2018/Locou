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

        <div class="row" id="dados_basicos">
          <div class="col-2">
          </div>
          <div class="col-8" style="border-style: solid; border-width: 2px; border-color: #FFC107">

            <!-- TITULO PARTE 1 -->

            <div class="row" style="background-color: black">
              <div class="col-12" style="color: #FFC107">
                <br>
                <span class="btn btn-outline-warning"><h2>Dados Básicos</h2></span>
                <br><br>
              </div>
            </div>

            <br><br>

            <!-- TITULO DO ANUNCIO -->


            <div class="row">
              <div class="col-4 text-right">
                Título:
              </div>
              <div class="col-5 text-left">
                <input type="text" class="form-control" id="titulo" placeholder="Ex: Consultório Odontológico">
                <br>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <span style="color: grey">Não especifique aqui o endereço, nomes ou derivados, <b>APENAS</b> um nome genérico de seu espaço. <br> O anúncio que não seguir esta regra está sujeito a ser apagado. </span>
                <br><br>
              </div>
            </div>

            <!-- CATEGORIA ESPAÇO-->


            <div class="row">
              <div class="col-4 text-right">
                Categoria do espaço:
              </div>
              <div class="col-5 text-left">
                <select class="form-control" id="categoria">
                  <option>Consultório</option>
                  <option>Cowork</option>
                  <option>Cozinha</option>
                  <option>Estúdio</option>
                  <option>Outro</option>
                </select>
              </div>
            </div>


            <!-- ESTADO -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Estado (UF):
              </div>
              <div class="col-5 text-left">
                <select class="form-control" id="uf">
                  <option>RJ</option>
                  <option>Outro estado</option>
                </select>
              </div>
            </div>

            <!-- CIDADE -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Cidade:
              </div>
              <div class="col-5 text-left">
                <select class="form-control" id="cidade">
                  <option>Rio de Janeiro</option>
                  <option>Outra cidade</option>
                </select>
              </div>
            </div>

            <!-- BAIRRO -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Bairro:
              </div>
              <div class="col-5 text-left">
                <input type="text" class="form-control" id="bairro" placeholder="Ex: Ipanema">
              </div>
            </div>


            <br><br>
          </div>
          <div class="col-2">
          </div>
        </div>


        <!-- CADASTRO PARTE 2 -->
        <br>

        <div class="row" id="descricao_geral">
          <div class="col-2">
          </div>
          <div class="col-8" style="border-style: solid; border-width: 2px; border-color: #FFC107">

            <!-- TITULO PARTE 2 -->

            <div class="row" style="background-color: black">
              <div class="col-12" style="color: #FFC107">
                <br>
                <span class="btn btn-outline-warning"><h2>Descrição Geral</h2></span>
                <br><br>
              </div>
            </div>

            <!-- Metragem -->
            <br><br>

            <div class="row">
              <div class="col-4 text-right">
                Metragem (M² do local):
              </div>
              <div class="col-5 text-left">
                <input type="text" class="form-control" id="metragem" placeholder="Ex: 120">
              </div>
            </div>

            <!-- Recepção -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Tem recepção?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="recepcao" id="recepcao-sim" value="sim">
                <label class="form-check-label" for="recepcao-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="recepcao" id="recepcao-nao" value="nao">
                <label class="form-check-label" for="recepcao-nao">Não</label>
              </div>
            </div>

            <!-- Banheiro Privativo -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Tem banheiro privativo?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="banheiro-privativo" id="banheiro-privativo-sim" value="sim">
                <label class="form-check-label" for="banheiro-privativo-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="banheiro-privativo" id="banheiro-privativo-nao" value="nao">
                <label class="form-check-label" for="banheiro-privativo-nao">Não</label>
              </div>
            </div>

            <!-- Banheiro -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Tem banheiro comum?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="banheiro" id="banheiro-sim" value="sim">
                <label class="form-check-label" for="banheiro-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="banheiro" id="banheiro-nao" value="nao">
                <label class="form-check-label" for="banheiro-nao">Não</label>
              </div>
            </div>

            <!-- Casa/Predio -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                É casa ou prédio?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="casaOUpredio" id="casaOUpredio-casa" value="casa">
                <label class="form-check-label" for="casaOUpredio-casa">Casa</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="casaOUpredio" id="casaOUpredio-predio" value="predio">
                <label class="form-check-label" for="casaOUpredio-predio">Prédio</label>
              </div>
            </div>

            <!-- Prédio tem elevador? -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                O Prédio tem elevador?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="elevador" id="elevador-sim" value="sim">
                <label class="form-check-label" for="elevador-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="elevador" id="elevador-nao" value="nao">
                <label class="form-check-label" for="elevador-nao">Não</label>
              </div>
            </div>

            <!-- Estacionamento -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                O local possui estacionamento?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="estacionamento" id="estacionamento-sim" value="sim">
                <label class="form-check-label" for="estacionamento-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="estacionamento" id="estacionamento-nao" value="nao">
                <label class="form-check-label" for="estacionamento-nao">Não</label>
              </div>
            </div>

            <!-- Proprio ou rotativo -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                O estacionamento é próprio ou rotativo?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="proprioOUrotativo" id="proprioOUrotativo-proprio" value="proprio">
                <label class="form-check-label" for="proprioOUrotativo-proprio">Próprio</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="proprioOUrotativo" id="proprioOUrotativo-rotativo" value="rotativo">
                <label class="form-check-label" for="proprioOUrotativo-rotativo">Rotativo</label>
              </div>
            </div>

            <!-- Acesso a transporte público -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Possui acesso fácil a transporte público (Metro, Ônibus e etc) em até 2 quarteirões?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="transporte" id="transporte-sim" value="sim">
                <label class="form-check-label" for="transporte-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="transporte" id="transporte-nao" value="nao">
                <label class="form-check-label" for="transporte-nao">Não</label>
              </div>
            </div>

            <br><br>
          </div>
          <div class="col-2">
          </div>
        </div>


        <!-- CADASTRO PARTE 3 -->
        <br>

        <div class="row" id="periodo">
          <div class="col-2">
          </div>
          <div class="col-8" style="border-style: solid; border-width: 2px; border-color: #FFC107">

            <!-- TITULO PARTE 2 -->

            <div class="row" style="background-color: black">
              <div class="col-12" style="color: #FFC107">
                <br>
                <span class="btn btn-outline-warning"><h2>Período</h2></span>
                <br><br>
              </div>
            </div>

            <!-- Tempo de aluguel -->
            <br>

            <div class="row">
              <div class="col-12 text-center">
                Qual é o período de aluguel?
                <br><br>
              </div>

              <!-- Labels -->

              <div class="col-4 text-center">
                <label class="form-check-label" for="tempoAluguel-unico">Aluguel Único (Para um dia específico)</label>
              </div>
              <div class="col-4 text-center">
                <label class="form-check-label" for="tempoAluguel-reincidente">Aluguel Reincidente</label>
              </div>
              <div class="col-4 text-center">
                <label class="form-check-label" for="tempoAluguel-direto">Aluguel Direto</label>
              </div>

              <!-- Checkbox -->

              <div class="col-4 text-center">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="tempoAluguel" id="tempoAluguel-unico" value="unico">
              </div>
              <div class="col-4 text-center">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="tempoAluguel" id="tempoAluguel-reincidente" value="reincidente">
              </div>
              <div class="col-4 text-center">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="tempoAluguel" id="tempoAluguel-direto" value="direto">
              </div>
            </div>


            <!-- Calendario-->
            <br><br>

            <div class="row">
              <div class="col-12 text-center">
              </div>
            </div>

            <!-- Preço Hora-->
            <br><br>

            <div class="row">
              <div class="col-4 text-right">
                Preço por hora
              </div>
              <div class="col-5 text-left">
                <div class="input-group-prepend">
                  <div class="input-group-text">R$</div>
                  <input type="text" class="form-control" id="hora" placeholder="Ex: 55 (números inteiros apenas)">
                </div>
              </div>
            </div>

            <!-- Preço 4 horas-->
            <br><br>

            <div class="row">
              <div class="col-4 text-right">
                Preço por turno de 4 horas
              </div>
              <div class="col-5 text-left">
                <div class="input-group-prepend">
                  <div class="input-group-text">R$</div>
                  <input type="text" class="form-control" id="4hora" placeholder="Ex: 55 (números inteiros apenas)">
                </div>
              </div>
            </div>

            <!-- Preço 5 horas-->
            <br><br>

            <div class="row">
              <div class="col-4 text-right">
                Preço por turno de 5 horas
              </div>
              <div class="col-5 text-left">
                <div class="input-group-prepend">
                  <div class="input-group-text">R$</div>
                  <input type="text" class="form-control" id="5hora" placeholder="Ex: 55 (números inteiros apenas)">
                </div>
              </div>
            </div>

            <!-- Preço reincidente dia/turno-->
            <br><br>

            <div class="row">
              <div class="col-4 text-right">
                Preço reincidente por dia/turno
              </div>
              <div class="col-5 text-left">
                <div class="input-group-prepend">
                  <div class="input-group-text">R$</div>
                  <input type="text" class="form-control" id="dia-turno" placeholder="Ex: 55 (números inteiros apenas)">
                </div>
              </div>
            </div>

            <!-- Preço semana-->
            <br><br>

            <div class="row">
              <div class="col-4 text-right">
                Preço por semana
              </div>
              <div class="col-5 text-left">
                <div class="input-group-prepend">
                  <div class="input-group-text">R$</div>
                  <input type="text" class="form-control" id="semana" placeholder="Ex: 55 (números inteiros apenas)">
                </div>
              </div>
            </div>

            <!-- Preço mês-->
            <br><br>

            <div class="row">
              <div class="col-4 text-right">
                Preço por mês
              </div>
              <div class="col-5 text-left">
                <div class="input-group-prepend">
                  <div class="input-group-text">R$</div>
                  <input type="text" class="form-control" id="mes" placeholder="Ex: 55 (números inteiros apenas)">
                </div>
              </div>
            </div>

            <br><br>
          </div>
          <div class="col-2">
          </div>
        </div>

        <!-- CADASTRO PARTE 3.1 CONSULTORIOS  -->
        <br>

        <div class="row" id="descricao_especifica_consultorio">
          <div class="col-2">
          </div>
          <div class="col-8" style="border-style: solid; border-width: 2px; border-color: #FFC107">

            <!-- TITULO PARTE 2 -->

            <div class="row" style="background-color: black">
              <div class="col-12" style="color: #FFC107">
                <br>
                <span class="btn btn-outline-warning"><h2>Descrição do Consultório</h2></span>
                <br><br>
              </div>
            </div>

            <!-- É climatizado -->
            <br><br>

            <div class="row">
              <div class="col-4 text-right">
                É climatizado o local? (Possui ar-condicioando)
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="climatizado-consultorio" id="climatizado-consultorio-sim" value="sim">
                <label class="form-check-label" for="climatizado-consultorio-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="climatizado-consultorio" id="climatizado-consultorio-nao" value="nao">
                <label class="form-check-label" for="climatizado-consultorio-nao">Não</label>
              </div>
            </div>

            <!-- Split ou paerde -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                O ar-condicionado é modelo Split ou de parede?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="modelo-ar-consultorio" id="modelo-ar-consultorio-sim" value="split">
                <label class="form-check-label" for="modelo-ar-consultorio-sim">Ar-condicioando SPLIT</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="modelo-ar-consultorio" id="modelo-ar-consultorio-nao" value="parede">
                <label class="form-check-label" for="modelo-ar-consultorio-nao">Ar-condicioando de PAREDE</label>
              </div>
            </div>

            <!-- Tem wifi? -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Tem Wi-Fi?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="wifi-consultorio" id="wifi-consultorio-sim" value="sim">
                <label class="form-check-label" for="wifi-consultorio-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="wifi-consultorio" id="wifi-consultorio-nao" value="nao">
                <label class="form-check-label" for="wifi-consultorio-nao">Não</label>
              </div>
            </div>

            <!-- Vigilancia -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Tem monitoramento ou vigilância com câmeras?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="vigilancia-consultorio" id="vigilancia-consultorio-sim" value="sim">
                <label class="form-check-label" for="vigilancia-consultorio-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="vigilancia-consultorio" id="vigilancia-consultorio-nao" value="nao">
                <label class="form-check-label" for="vigilancia-consultorio-nao">Não</label>
              </div>
            </div>

            <!-- Armarios -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Armários com escaninhos para guardar pertences dos profissionais que sublocam?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="armarios-consultorio" id="armarios-consultorio-sim" value="sim">
                <label class="form-check-label" for="armarios-consultorio-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="armarios-consultorio" id="armarios-consultorio-nao" value="nao">
                <label class="form-check-label" for="armarios-consultorio-nao">Não</label>
              </div>
            </div>

            <!-- Secretária -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Secretária compartilhada para agendamentos e assistência em geral?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="secretaria-consultorio" id="secretaria-consultorio-sim" value="sim">
                <label class="form-check-label" for="secretaria-consultorio-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="secretaria-consultorio" id="secretaria-consultorio-nao" value="nao">
                <label class="form-check-label" for="secretaria-consultorio-nao">Não</label>
              </div>
            </div>

            <!-- Limpeza -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Serviço de limpeza e conservação?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="limpeza-consultorio" id="limpeza-consultorio-sim" value="sim">
                <label class="form-check-label" for="limpeza-consultorio-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="limpeza-consultorio" id="limpeza-consultorio-nao" value="nao">
                <label class="form-check-label" for="limpeza-consultorio-nao">Não</label>
              </div>
            </div>

            <!-- Copa? -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Serviço de copa?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="copa-consultorio" id="copa-consultorio-sim" value="sim">
                <label class="form-check-label" for="copa-consultorio-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="copa-consultorio" id="copa-consultorio-nao" value="nao">
                <label class="form-check-label" for="copa-consultorio-nao">Não</label>
              </div>
            </div>

            <!-- Mobiliario -->
            <br>

            <div class="row">
              <div class="col-12 text-center">
                Qual é a quantidade do Mobiliario do local?
              </div>
            </div>
            <div class="row">
              <div class="col-3 text-center">
                Qtd de Mesa
              </div>
              <div class="col-3 text-center">
                Qtd de Cadeira
              </div>
              <div class="col-3 text-center">
                Qtd de Luminária
              </div>
              <div class="col-3 text-center">
                Qtd de Cortina
              </div>
            </div>
            <div class="row">
              <div class="col-3 text-center">
                <input type="text" class="form-control" id="mesa-consultorio" placeholder="Ex: 2">
              </div>
              <div class="col-3 text-center">
                <input type="text" class="form-control" id="cadeira-consultorio" placeholder="Ex: 6">
              </div>
              <div class="col-3 text-center">
                <input type="text" class="form-control" id="lum-consultorio" placeholder="Ex: 4">
              </div>
              <div class="col-3 text-center">
                <input type="text" class="form-control" id="cortina-consultorio" placeholder="Ex: 1">
              </div>
            </div>

            <!-- Macas -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Quantidade de Macas
              </div>
              <div class="col-5 text-center">
                <input type="text" class="form-control" id="macas-consultorio" placeholder="Ex: 3">
              </div>
            </div>

            <!-- Balança? -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Possui balança?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="balanca-consultorio" id="balanca-consultorio-sim" value="sim">
                <label class="form-check-label" for="copa-consultorio-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="balanca-consultorio" id="balanca-consultorio-nao" value="nao">
                <label class="form-check-label" for="balanca-consultorio-nao">Não</label>
              </div>
            </div>

            <!-- Café? -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Oferece café?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="cafe-consultorio" id="cafe-consultorio-sim" value="sim">
                <label class="form-check-label" for="cafe-consultorio-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="cafe-consultorio" id="cafe-consultorio-nao" value="nao">
                <label class="form-check-label" for="cafe-consultorio-nao">Não</label>
              </div>
            </div>

            <!-- Água? -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Oferece água filtrada?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="agua-consultorio" id="agua-consultorio-sim" value="sim">
                <label class="form-check-label" for="agua-consultorio-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="agua-consultorio" id="agua-consultorio-nao" value="nao">
                <label class="form-check-label" for="agua-consultorio-nao">Não</label>
              </div>
            </div>

            <!-- TV? -->
            <br>

            <div class="row">
              <div class="col-4 text-right">
                Possui TV na recepção?
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="tv-consultorio" id="tv-consultorio-sim" value="sim">
                <label class="form-check-label" for="tv-consultorio-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="tv-consultorio" id="tv-consultorio-nao" value="nao">
                <label class="form-check-label" for="tv-consultorio-nao">Não</label>
              </div>
            </div>

            <!-- descrição aberta -->
            <br>

            <div class="row">
              <div class="col-12 text-center">
                Quer adicionar mais algum detalhe? Utilize esse campo aberto de descrição.
              </div>
            </div>
            <div class="row">
              <div class="col-1">
              </div>
              <div class="col-10 text-center">
                <textarea class="form-control" id="descricao-aberta-consultorio" rows="6" style="resize: none;"></textarea>
              </div>
              <div class="col-1">
              </div>
            </div>

            <br><br>

          </div>

            <div class="col-2">
            </div>

          </div>


          <!-- Descrição especifica workshop -->


          <div class="row" id="descricao_especifica_workshop">
            <div class="col-2">
            </div>
            <div class="col-8" style="border-style: solid; border-width: 2px; border-color: #FFC107">

              <!-- TITULO PARTE 2 -->

              <div class="row" style="background-color: black">
                <div class="col-12" style="color: #FFC107">
                  <br>
                  <span class="btn btn-outline-warning"><h2>Descrição da Sala de Ensaio ou Workshop</h2></span>
                  <br><br>
                </div>
              </div>

              <!-- É climatizado -->
              <br><br>

              <div class="row">
                <div class="col-4 text-right">
                  É climatizado o local? (Possui ar-condicioando)
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="climatizado-workshop" id="climatizado-workshop-sim" value="sim">
                  <label class="form-check-label" for="climatizado-workshop-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="climatizado-workshop" id="climatizado-workshop-nao" value="nao">
                  <label class="form-check-label" for="climatizado-workshop-nao">Não</label>
                </div>
              </div>

              <!-- Split ou paerde -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  O ar-condicionado é modelo Split ou de parede?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="modelo-ar-workshop" id="modelo-ar-workshop-sim" value="split">
                  <label class="form-check-label" for="modelo-ar-workshop-sim">Ar-condicioando SPLIT</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="modelo-ar-workshop" id="modelo-ar-workshop-nao" value="parede">
                  <label class="form-check-label" for="modelo-ar-workshop-nao">Ar-condicioando de PAREDE</label>
                </div>
              </div>

              <!-- Tem wifi? -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Tem Wi-Fi?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="wifi-workshop" id="wifi-workshop-sim" value="sim">
                  <label class="form-check-label" for="wifi-workshop-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="wifi-workshop" id="wifi-workshop-nao" value="nao">
                  <label class="form-check-label" for="wifi-workshop-nao">Não</label>
                </div>
              </div>

              <!-- Vigilancia -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Tem monitoramento ou vigilância com câmeras?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="vigilancia-workshop" id="vigilancia-workshop-sim" value="sim">
                  <label class="form-check-label" for="vigilancia-workshop-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="vigilancia-workshop" id="vigilancia-workshop-nao" value="nao">
                  <label class="form-check-label" for="vigilancia-workshop-nao">Não</label>
                </div>
              </div>

              <!-- Armarios -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Armários com escaninhos para guardar pertences dos profissionais que sublocam?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="armarios-workshop" id="armarios-workshop-sim" value="sim">
                  <label class="form-check-label" for="armarios-consultorio-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="armarios-workshop" id="armarios-workshop-nao" value="nao">
                  <label class="form-check-label" for="armarios-workshop-nao">Não</label>
                </div>
              </div>

              <!-- Limpeza -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Serviço de limpeza e conservação?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="limpeza-workshop" id="limpeza-workshop-sim" value="sim">
                  <label class="form-check-label" for="limpeza-workshop-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="limpeza-workshop" id="limpeza-workshop-nao" value="nao">
                  <label class="form-check-label" for="limpeza-workshop-nao">Não</label>
                </div>
              </div>

              <!-- Copa? -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Serviço de copa?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="copa-workshop" id="copa-workshop-sim" value="sim">
                  <label class="form-check-label" for="copa-workshop-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="copa-workshop" id="copa-workshop-nao" value="nao">
                  <label class="form-check-label" for="copa-workshop-nao">Não</label>
                </div>
              </div>

              <!-- Mobiliario -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Qual é a quantidade do Mobiliario do local?
                </div>
              </div>
              <div class="row">
                <div class="col-4 text-center">
                  Qtd de Mesa
                </div>
                <div class="col-4 text-center">
                  Qtd de Cadeira
                </div>
                <div class="col-4 text-center">
                  Qtd de Quadros
                </div>
              </div>
              <div class="row">
                <div class="col-4 text-center">
                  <input type="text" class="form-control" id="mesa-workshop" placeholder="Ex: 2">
                </div>
                <div class="col-4 text-center">
                  <input type="text" class="form-control" id="cadeira-workshop" placeholder="Ex: 6">
                </div>
                <div class="col-4 text-center">
                  <input type="text" class="form-control" id="quadro-workshop" placeholder="Ex: 4">
                </div>
              </div>

              <!-- Projetor? -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui projetor?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="projetor-workshop" id="projetor-workshop-sim" value="sim">
                  <label class="form-check-label" for="projetor-workshop-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="projetor-workshop" id="projetor-workshop-nao" value="nao">
                  <label class="form-check-label" for="projetor-workshop-nao">Não</label>
                </div>
              </div>

              <!-- Telão/TV -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Qual é a quantidade de Telões ou TV`s
                </div>
              </div>
              <div class="row">
                <div class="col-6 text-center">
                  Qtd de Telões
                </div>
                <div class="col-6 text-center">
                  Qtd de TV`s
                </div>
              </div>
              <div class="row">
                <div class="col-6 text-center">
                  <input type="text" class="form-control" id="telao-workshop" placeholder="Ex: 1">
                </div>
                <div class="col-6 text-center">
                  <input type="text" class="form-control" id="tv-workshop" placeholder="Ex: 0">
                </div>
              </div>

              <!-- Flipchart? -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Flipchart?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="flip-workshop" id="flip-workshop-sim" value="sim">
                  <label class="form-check-label" for="flip-workshop-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="flip-workshop" id="flip-workshop-nao" value="nao">
                  <label class="form-check-label" for="flip-workshop-nao">Não</label>
                </div>
              </div>

              <!-- Café? -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Oferece café?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="cafe-workshop" id="cafe-workshop-sim" value="sim">
                  <label class="form-check-label" for="cafe-workshop-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="cafe-workshop" id="cafe-workshop-nao" value="nao">
                  <label class="form-check-label" for="cafe-workshop-nao">Não</label>
                </div>
              </div>

              <!-- Água? -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Oferece água filtrada?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="agua-workshop" id="agua-workshop-sim" value="sim">
                  <label class="form-check-label" for="agua-workshop-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="agua-workshop" id="agua-workshop-nao" value="nao">
                  <label class="form-check-label" for="agua-workshop-nao">Não</label>
                </div>
              </div>

              <!-- Buffet? -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Oferece serviço de buffet?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="buffet-workshop" id="buffet-workshop-sim" value="sim">
                  <label class="form-check-label" for="buffet-workshop-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="buffet-workshop" id="buffet-workshop-nao" value="nao">
                  <label class="form-check-label" for="buffet-workshop-nao">Não</label>
                </div>
              </div>

              <!-- Permite Buffet? -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Permite permite a contratação desse serviço extra?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="buffet-extra-workshop" id="buffet-extra-workshop-sim" value="sim">
                  <label class="form-check-label" for="buffet-extra-workshop-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="buffet-extra-workshop" id="buffet-extra-workshop-nao" value="nao">
                  <label class="form-check-label" for="buffet-extra-workshop-nao">Não</label>
                </div>
              </div>

              <!-- descrição equipamento -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Quer adicionar mais algum detalhe sobre equipamentos? Utilize esse campo aberto de descrição.
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10 text-center">
                  <textarea class="form-control" id="descricao-equipamento-workshop" rows="3" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <!-- descrição aberta -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Quer adicionar mais algum detalhe em geral? Utilize esse campo aberto de descrição.
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10 text-center">
                  <textarea class="form-control" id="descricao-aberta-workshop" rows="6" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <br><br>

            </div>

            <div class="col-2">
            </div>

          </div>


        <!-- CONTROLE DE MENU -->
        <br>

        <div class="row" style="background-color: black">
          <div class="col-2">
          </div>
          <div class="col-4 text-right" style="color: #FFC107">
            <br>
            <span class="btn btn-outline-warning" id="voltar"><h4>Voltar</h4></span>
            <br><br>
          </div>
          <div class="col-4 text-left" style="color: #FFC107">
            <br>
            <span class="btn btn-outline-warning" id="proximo"><h4>Próximo</h4></span>
            <br><br>
          </div>
          <div class="col-2">
          </div>
        </div>

      </form>
    </div>


  </body>
