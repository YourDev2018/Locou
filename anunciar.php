<!DOCTYPE html>
<?php error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css"  href="css/bootstrap-datepicker3.css">
    <link rel="stylesheet" type="text/css"  href="css/locou.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    <title>Locou | Anuncie Grátis</title>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/bootstrap-datepicker.min.js" ></script>
    <script src="js/clockpicker.js" ></script>
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


      <div id="completarCadastro" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Completar Cadastro</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center justify-content-center">
              <p style="font-size: 80%">Ops... precisamos de mais informações antes de você poder alugar esse espaço.
              <br><br>
              Complete essas informações antes de poder prosseguir
              <br>
              <hr>
             </p>
             <form action="" method="post">
               <div class="form-group">
                 <label for="nomeCompleto">Nome Completo</label>
                 <input type="text" name="nomeCompleto" class="form-control" id="nomeCompleto" placeholder="">
               </div>
               <div class="form-group">
                 <label for="cpf">CPF (Apenas Número)</label>
                 <input type="number" name="cpf" class="form-control" id="cpf" placeholder="12345665432">
               </div>
               <div class="form-group">
                 <label for="rg">Número do RG (Apenas Número)</label>
                 <input type="number" name="rg" class="form-control" id="rg" placeholder="">
               </div>
               <div class="form-group">
                 <label for="rgOrg">RG Orgão</label>
                 <input type="text" name="rgOrg" class="form-control" id="rgOrg" placeholder="">
               </div>
               <div class="form-group">
                 <label for="rgData">RG Data</label>
                 <input type="text" name="rgData" class="form-control" id="rgData" placeholder="">
               </div>
               <div class="form-group">
                 <label for="ddd">DDD (Apenas Número)</label>
                 <input type="number" name="ddd" class="form-control" id="ddd" placeholder="21">
               </div>
               <div class="form-group">
                 <label for="tel">Telefone (Apenas Número)</label>
                 <input type="number" name="tel" class="form-control" id="tel" placeholder="912345678">
               </div>
               <div class="form-group">
                 <label for="rua">Rua</label>
                 <input type="text" name="rua" class="form-control" id="rua" placeholder="Rua exemplo">
               </div>
               <div class="form-group">
                 <label for="ruaN">Número da Rua (Apenas Número)</label>
                 <input type="number" name="ruaN" class="form-control" id="ruaN" placeholder="157">
               </div>
               <div class="form-group">
                 <label for="complemento">Complemento</label>
                 <input type="text" name="complemento" class="form-control" id="complemento" placeholder="Complemento">
               </div>
               <div class="form-group">
                 <label for="bairroC">Bairro</label>
                 <input type="text" name="bairro" class="form-control" id="bairroC" placeholder="Nome Bairro">
               </div>
               <div class="form-group">
                 <label for="cep">CEP (Apenas Número)</label>
                 <input type="number" name="cep" class="form-control" id="cep" placeholder="21000-000">
               </div>
               <div class="form-group">
                 <label for="cidadeC">Cidade</label>
                 <input type="text" name="cidade" class="form-control" id="cidadeC" placeholder="Rio de Janeiro">
               </div>
               <div class="form-group">
                 <label for="estado">Estado</label>
                 <input type="text" name="estado" class="form-control" id="estado" placeholder="Rio de Janeiro">
               </div>
               <div class="form-group">
                 <label for="numBanco">Selecione o seu banco</label>
                 <select name="numBanco" class="form-control" id="numBanco">
                   <option value="001">Banco do Brasil</option>
                 </select>
               </div>
               <div class="form-group">
                 <label for="numAge">Número da Agência</label>
                 <input type="number" name="numAge" class="form-control" id="numAge" placeholder="">
               </div>
               <div class="form-group">
                 <label for="numCheckAge">Número de checagaem da Agência</label>
                 <input type="number" name="numCheckAge" class="form-control" id="numCheckAge" placeholder="">
               </div>
               <div class="form-group">
                 <label for="numConta">Numero da Conta</label>
                 <input type="number" name="numConta" class="form-control" id="numConta" placeholder="">
               </div>
               <div class="form-group">
                 <label for="numCheckConta">Número de checagaem da Conta</label>
                 <input type="number" name="numCheckConta" class="form-control" id="numCheckConta" placeholder="">
               </div>
             <span style="color: grey;font-size: 80%">Nunca vamos divulgar nenhuma informação sua!</span>
            </div>
            <div class="modal-footer">
              <button type="button" class="ml-3 btn btn-warning">Atualizar</button>
            </div>
             </form>
          </div>
        </div>
      </div>


    <!-- Seção Titulo -->

    <div class="container-fluid justify-content-center text-center" style="background-color: #FFC107;">
      <div class="row">
        <div class="col-lg-4 col-md-2 col-sm-1">
        </div>
        <div class="col-lg-4 col-md-8 col-sm-10 titulo-anuncie">
          <br>
          <h1>
            <b>Anuncie o seu espaço.</b>
            <br>
          </h1>
          <h3>
            Com o Locou você ganha dinheiro alugando naqueles intervalos que você não estiver usando.
          </h3>
          <br>
        </div>
        <div class="col-lg-4 col-md-2 col-sm-1">
        </div>
      </div>
    </div>

    <!-- Seção cadastro -->

    <div class="container-fluid justify-content-center text-center">

      <br><br>

      <form action="#" method="post">

        <div class="row" id="fora_do_rj" style="display: none">

            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>
            <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">

              <!-- TITULO PARTE 2 -->

              <div class="row" style="background-color: black">
                <div class="col-12" style="color: #FFC107">
                  <br>
                  <span class="btn btn-outline-warning"><h2>Ops...</h2></span>
                  <br><br>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <br>
                  <h3>Desculpe mas, por enquanto, ainda não estamos atuando na sua cidade. Mas se você nos contar o que está buscando, podemos começar a selecionar as melhores opções para te oferecer, assim que lançarmos o Locou na sua cidade!</h3>
                  <br><br>
                  <h5>Qual é o seu Nome?</h5>
                  <input type="text" class="form-control" id="form-fora-nome" name="fora-nome" placeholder="">
                  <br><br>
                  <h5>Qual é a Cidade que você gostaria de cadastrar?</h5>
                  <input type="text" class="form-control" id="form-fora-cidade" name="fora-cidade" placeholder="Ex: São Paulo">
                  <br><br>
                  <h5>Qual é o Estado que você gostaria de cadastrar?</h5>
                  <input type="text" class="form-control" id="form-fora-estado" name="fora-estado" placeholder="Ex: SP">
                  <br><br>
                  <h5>Qual é o seu Email?</h5>
                  <input type="text" class="form-control" id="form-fora-email" name="fora-email" placeholder="Ex: email@gmail.com">
                  <br><br>
                  <h5>Qual é o seu celular (com DDD e apenas números)?</h5>
                  <input type="text" class="form-control" id="form-fora-celular" name="fora-celular" placeholder="Ex: 21 912345678">
                  <br><br>
                  <h5>Qual seria o tipo do espaço?</h5>
                  <select class="form-control" name="fora-categoria" id="form-fora-categoria">
                    <option value="consultorio">Consultório</option>
                    <option value="workshop">Workshop</option>
                    <option value="palestra">Sala para Palestras</option>
                    <option value="aulas">Sala para Aulas</option>
                    <option value="ensaio">Sala para Ensaio e aulas</option>
                    <option value="cozinha">Cozinha</option>
                    <option value="fotografico">Estúdio fotográfico</option>
                    <option value="produtora">Produtora</option>
                    <option value="costura">Ateliês de costura</option>
                    <option value="academia">Estúdio ou Academia (RPG,Pilates e etc)</option>
                    <option value="artes">Ateliê de artes</option>
                  </select>
                  <br><br>
                  <h5>Quer adicionar outra informação? Utilize esse campo abaixo</h5>
                  <textarea class="form-control" id="form-fora-descricao" rows="4" style="resize: none;"></textarea>
                  <br>
                  <button type="submit" class="btn btn-warning" id="formulario-envio"><h4>Enviar formulário</h4></button>
                  <br><br>
                </div>
              </div>

            </div>
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>

        </div>

      </form>

      <form action="CadastrarAnuncio.php"  method="POST" enctype="multipart/form-data">


        <!-- CADASTRO PARTE 1-->

        <div class="row" id="dados_basicos">
          <div class="col-lg-2 col-md-1 col-sm-0">
          </div>
          <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">

            <!-- TITULO PARTE 1 -->

            <div class="row" style="background-color: black">
              <div class="col-12" style="color: #FFC107">
                <br>
                <span class="btn btn-outline-warning" onclick="dados_basicos_tip(this)"><h2>Dados Básicos</h2></span>
                <br><br>
              </div>
            </div>
            <div id="dados-basicos-tip-div" class="row text-center justify-content-center" style="background-color: #FFC107; display: none">
              <div class="col-8" style="color: black">
                <br>
                  <h5>Texto de auxilio Texto de auxilio Texto de auxilio Texto de auxilio Texto de auxilio </h5>
                <br>
              </div>
            </div>

            <br><br>

            <!-- TITULO DO ANUNCIO -->


            <div class="row">
              <div class="col-4 text-right">
                Título do anúncio:
              </div>
              <div class="col-5 text-left">
                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Ex: Consultório Odontológico">
                <br>
              </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-8">
                <span style="color: grey">Não especifique aqui o endereço, nomes ou marcas, <b>APENAS</b> uma descrição genérica de seu espaço. O anúncio que não seguir esta regra está sujeito a ser desconsiderado</span>
                <br><br>
              </div>
            </div>

            <!-- CATEGORIA ESPAÇO-->


            <div class="row">
              <div class="col-4 text-right">
                Categoria do espaço:
              </div>
              <div class="col-5 text-left">
                <select class="form-control" name="categoria" id="categoria">
                  <option value="consultorio">Consultório</option>
                  <option value="workshop">Workshop</option>
                  <option value="palestra">Sala para Palestras</option>
                  <option value="aulas">Sala para Aulas</option>
                  <option value="ensaio">Sala para Ensaio e aulas</option>
                  <option value="cozinha">Cozinha</option>
                  <option value="fotografico">Estúdio fotográfico</option>
                  <option value="produtora">Produtora</option>
                  <option value="costura">Ateliês de costura</option>
                  <option value="academia">Estúdio ou Academia (RPG,Pilates e etc)</option>
                  <option value="artes">Ateliê de artes</option>
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
                <select class="form-control" name="uf" id="uf">
                  <option>RJ</option>
                  <option value="outro">Outro estado</option>
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
                <select class="form-control" name="cidade" id="cidade">
                  <option>Rio de Janeiro</option>
                  <option value="outro">Outra cidade</option>
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
                <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Ex: Ipanema">
              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-4 text-right">
                Aluguel direto? <span title="We ask for your age only for statistical purposes." class="btn btn-warning" style="border-radius: 25px; font-size: 0.7vw"><b>?</b></span>
              </div>
              <div class="col-5 text-left">
                <!-- <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Ex: Ipanema"> -->
              </div>
            </div>


            <br><br>
          </div>
          <div class="col-lg-2 col-md-1 col-sm-0">
          </div>
        </div>


        <!-- CADASTRO PARTE 2 -->
        <br>

        <div class="row" id="descricao_geral" style="display: none">
          <div class="col-lg-2 col-md-1 col-sm-0">
          </div>
          <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">

            <!-- TITULO PARTE 2 -->

            <div class="row" style="background-color: black">
              <div class="col-12" style="color: #FFC107">
                <br>
                <span onclick="descricao_geral_tip(this)" class="btn btn-outline-warning"><h2>Descrição Geral</h2></span>
                <br><br>
              </div>
            </div>
            <div id="descricao_geral_tip-div" class="row text-center justify-content-center" style="background-color: #FFC107; display: none">
              <div class="col-8" style="color: black">
                <br>
                  <h5>Texto de auxilio Texto de auxilio Texto de auxilio Texto de auxilio Texto de auxilio </h5>
                <br>
              </div>
            </div>

            <!-- Metragem -->
            <br><br>

            <div class="row">
              <div class="col-4 text-right">
                Metragem (M² do local):
              </div>
              <div class="col-5 text-left">
                <input type="number" class="form-control" name="metragem" id="metragem" placeholder="Ex: 120">
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
                <input class="form-check-input" onclick="casaOUpredio_f()" type="radio" name="casaOUpredio" id="casaOUpredio-casa" value="casa">
                <label class="form-check-label" for="casaOUpredio-casa">Casa</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" onclick="casaOUpredio_f()" type="radio" name="casaOUpredio" id="casaOUpredio-predio" value="predio">
                <label class="form-check-label" for="casaOUpredio-predio">Prédio</label>
              </div>
            </div>
            <!-- Prédio tem elevador? -->

            <div class="row" id="elevador-geral" style="display: none">
              <div class="col-4 text-right">
                <br>
                O Prédio tem elevador?
              </div>
              <div class="col-4 text-left">
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="elevador" id="elevador-sim" value="sim">
                <label class="form-check-label" for="elevador-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                <br>
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
                <input class="form-check-input" onclick="estacionamento_f()" type="radio" name="estacionamento" id="estacionamento-sim" value="sim">
                <label class="form-check-label" for="estacionamento-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" onclick="estacionamento_f()" type="radio" name="estacionamento" id="estacionamento-nao" value="nao">
                <label class="form-check-label" for="estacionamento-nao">Não</label>
              </div>
            </div>

            <!-- Proprio ou rotativo -->

            <div class="row" id="estacionamento-geral" style="display: none">
              <div class="col-4 text-right">
                <br>
                O estacionamento é próprio ou rotativo?
              </div>
              <div class="col-4 text-left">
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="proprioOUrotativo" id="proprioOUrotativo-proprio" value="proprio">
                <label class="form-check-label" for="proprioOUrotativo-proprio">Próprio</label>
              </div>
              <div class="col-4 text-left">
                <br>
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
          <div class="col-lg-2 col-md-1 col-sm-0">
          </div>
        </div>


        <!-- CADASTRO PARTE 3 -->
        <br>

        <div class="row" id="periodo" style="display: none">
          <div class="col-lg-2 col-md-1 col-sm-0">
          </div>
          <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">

            <!-- TITULO PARTE 2 -->

            <div class="row" style="background-color: black">
              <div class="col-12" style="color: #FFC107">
                <br>
                <span onclick="periodo_tip(this)" class="btn btn-outline-warning"><h2>Período</h2></span>
                <br><br>
              </div>
            </div>
            <div id="periodo_tip-div" class="row text-center justify-content-center" style="background-color: #FFC107; display: none">
              <div class="col-8" style="color: black">
                <br>
                  <h5>Texto de auxilio Texto de auxilio Texto de auxilio Texto de auxilio Texto de auxilio </h5>
                <br>
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
                <input onclick="calendario_unico_f();calendario_reincidente_f();calendario_direto_f();" class="form-check-input" type="radio" name="tempoAluguel" id="tempoAluguel-unico" value="unico">
                <br><br>
              </div>
              <div class="col-4 text-center">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input onclick="calendario_unico_f();calendario_reincidente_f();calendario_direto_f();" class="form-check-input" type="radio" name="tempoAluguel" id="tempoAluguel-reincidente" value="reincidente">
                <br><br>
              </div>
              <div class="col-4 text-center">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input onclick="calendario_unico_f();calendario_reincidente_f();calendario_direto_f();" class="form-check-input" type="radio" name="tempoAluguel" id="tempoAluguel-direto" value="direto">
                <br><br>
              </div>

              <div id="calendario-unico" style="display: none; background-color: black" class="p-3 input-group date col-12 text-center justify-content-center">
                <div class="row">
                  <div class="col-12">
                    <h6 style="color: white">Selecione a data e o horário em que será disponibilizado</h6>
                    <br>
                      <input type="text" name="data-unico-pick" id="datepicker">
                    <br>
                    <h3><i style="color: #FFC107" class="mt-3 far fa-calendar-alt"></i></h3>
                    <br>
                    <div id="hora-caixa-unico" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107;">
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de início do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="hora-inicio-unico" class="form-control" style="text-align: center" readonly value="12:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                      <br>
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de fim do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="hora-fim-unico" class="form-control" style="text-align: center" readonly  value="18:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div id="calendario-direto" style="display: none; background-color: black" class="p-3 input-group date col-12 text-center justify-content-center">
                <div class="row">
                  <div class="col-12">
                    <h6 style="color: white">Selecione a quantidade de meses que o espaço será disponibilizado</h6>
                    <br>
                    <div class="row text-center justify-content-center">
                      <div class="col-6">
                        <select class="form-control" onchange="atualizarTempoAluguel()" style="text-align: center" id="tempo-mes-direto">
                          <option value="1">1 Mês</option>
                          <option value="2">2 Meses</option>
                          <option value="3">3 Meses</option>
                          <option value="4">4 Meses</option>
                        </select>
                        <br>
                        <h6 id="tempoDeAlguel" style="color: #FFC107"></h6>
                      </div>
                    </div>
                    <script>
                      function atualizarTempoAluguel()
                      {
                        var data = today;
                        data.setDate(data.getDate() + 31);
                        document.getElementById("tempoDeAlguel").innerHTML = "O prazo de alguel será do dia "+dd+"/"+mm+"/"+yyyy+" até "+data.getDate()+'/'+ (data.getMonth()+1) +'/'+data.getFullYear();;
                      }
                    </script>
                    <br>
                    <h6 style="color: white">Selecione o período o qual vai ser alguado</h6>
                    <br>
                    <div class="row text-center justify-content-center">
                      <div id="hora-caixa-unico" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107;">
                        <div class="row px-2">
                          <div class="col-12" style="color: #FFCE00">
                            <h6>Hora de início do Aluguel</h6>
                          </div>
                          <div class="col-12">
                              <input type="text" name="hora-inicio-unico" class="form-control" style="text-align: center" readonly value="12:00">
                              <br>
                          </div>
                          <div class="col-12">
                              <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                              <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                          </div>
                        </div>
                        <br>
                        <div class="row px-2">
                          <div class="col-12" style="color: #FFCE00">
                            <h6>Hora de fim do Aluguel</h6>
                          </div>
                          <div class="col-12">
                              <input type="text" name="hora-fim-unico" class="form-control" style="text-align: center" readonly  value="18:00">
                              <br>
                          </div>
                          <div class="col-12">
                              <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                              <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div id="calendario-reincidente" style="display: none" class="col-12 pt-3 text-center" style="background-color: black">

                <script>

                  function segunda_botao_periodo()
                  {
                    if(document.getElementById("segunda-bot-periodo").classList.contains("active") == false)
                    {
                      document.getElementById("segunda-caixa-periodo").style.display = '';
                      document.getElementById("segunda-bot-periodo").classList.add("active");
                    }
                    else
                    {
                      document.getElementById("segunda-caixa-periodo").style.display = 'none';
                      document.getElementById("segunda-bot-periodo").classList.remove("active");
                    }
                  }
                  function terca_botao_periodo()
                  {
                    if(document.getElementById("terca-bot-periodo").classList.contains("active") == false)
                    {
                      document.getElementById("terca-caixa-periodo").style.display = '';
                      document.getElementById("terca-bot-periodo").classList.add("active");
                    }
                    else
                    {
                      document.getElementById("terca-caixa-periodo").style.display = 'none';
                      document.getElementById("terca-bot-periodo").classList.remove("active");
                    }
                  }
                  function quarta_botao_periodo()
                  {
                    if(document.getElementById("quarta-bot-periodo").classList.contains("active") == false)
                    {
                      document.getElementById("quarta-caixa-periodo").style.display = '';
                      document.getElementById("quarta-bot-periodo").classList.add("active");
                    }
                    else
                    {
                      document.getElementById("quarta-caixa-periodo").style.display = 'none';
                      document.getElementById("quarta-bot-periodo").classList.remove("active");
                    }
                  }
                  function quinta_botao_periodo()
                  {
                    if(document.getElementById("quinta-bot-periodo").classList.contains("active") == false)
                    {
                      document.getElementById("quinta-caixa-periodo").style.display = '';
                      document.getElementById("quinta-bot-periodo").classList.add("active");
                    }
                    else
                    {
                      document.getElementById("quinta-caixa-periodo").style.display = 'none';
                      document.getElementById("quinta-bot-periodo").classList.remove("active");
                    }
                  }
                  function sexta_botao_periodo()
                  {
                    if(document.getElementById("sexta-bot-periodo").classList.contains("active") == false)
                    {
                      document.getElementById("sexta-caixa-periodo").style.display = '';
                      document.getElementById("sexta-bot-periodo").classList.add("active");
                    }
                    else
                    {
                      document.getElementById("sexta-caixa-periodo").style.display = 'none';
                      document.getElementById("sexta-bot-periodo").classList.remove("active");
                    }
                  }
                  function sabado_botao_periodo()
                  {
                    if(document.getElementById("sabado-bot-periodo").classList.contains("active") == false)
                    {
                      document.getElementById("sabado-caixa-periodo").style.display = '';
                      document.getElementById("sabado-bot-periodo").classList.add("active");
                    }
                    else
                    {
                      document.getElementById("sabado-caixa-periodo").style.display = 'none';
                      document.getElementById("sabado-bot-periodo").classList.remove("active");
                    }
                  }
                  function domingo_botao_periodo()
                  {
                    if(document.getElementById("domingo-bot-periodo").classList.contains("active") == false)
                    {
                      document.getElementById("domingo-caixa-periodo").style.display = '';
                      document.getElementById("domingo-bot-periodo").classList.add("active");
                    }
                    else
                    {
                      document.getElementById("domingo-caixa-periodo").style.display = 'none';
                      document.getElementById("domingo-bot-periodo").classList.remove("active");
                    }
                  }
                </script>

                <h6 style="color: white">Selecione os dias da semana e os horários em que serão disponibilizados para alugar:</h6>
                <br>

                <div class="row pb-4 justify-content-center p-3">
                  <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="segunda_botao_periodo()" class="btn btn-outline-warning" id="segunda-bot-periodo"><h6>Seg</h6></span><br><br>

                    <div id="segunda-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de início do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="seg-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                      <br>
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de fim do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="seg-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="terca_botao_periodo()" id="terca-bot-periodo" class="btn btn-outline-warning"><h6>Ter</h6></span>
                    <br><br>

                    <div id="terca-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de início do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="ter-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                      <br>
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de fim do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="ter-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="quarta_botao_periodo()" id="quarta-bot-periodo" class="btn btn-outline-warning"><h6>Qua</h6></span>
                    <br><br>

                    <div id="quarta-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de início do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="qua-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                      <br>
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de fim do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="qua-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="quinta_botao_periodo()" id="quinta-bot-periodo" class="btn btn-outline-warning"><h6>Qui</h6></span>
                    <br><br>

                    <div id="quinta-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de início do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="qui-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                      <br>
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de fim do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="qui-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="sexta_botao_periodo()" id="sexta-bot-periodo" class="btn btn-outline-warning"><h6>Sex</h6></span>
                    <br><br>

                    <div id="sexta-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de início do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="sex-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                      <br>
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de fim do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="sex-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="sabado_botao_periodo()" id="sabado-bot-periodo" class="btn btn-outline-warning"><h6>Sab</h6></span>
                    <br><br>

                    <div id="sabado-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de início do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="sab-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                      <br>
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de fim do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="sab-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="my-1 btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 my-2 p-2"><span onclick="domingo_botao_periodo()" id="domingo-bot-periodo" class="btn btn-outline-warning"><h6>Dom</h6></span>
                    <br><br>

                    <div id="domingo-caixa-periodo" class="p-3" style="border-style: solid; border-width: 0.5px; border-radius: 5%; border-color: #FFC107; display: none">
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de início do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="dom-inicio-periodo" class="form-control" style="text-align: center" readonly value="12:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                      <br>
                      <div class="row px-2">
                        <div class="col-12" style="color: #FFCE00">
                          <h6>Hora de fim do Aluguel</h6>
                        </div>
                        <div class="col-12">
                            <input type="text" name="dom-fim-periodo" class="form-control" style="text-align: center" readonly  value="18:00">
                            <br>
                        </div>
                        <div class="col-12">
                            <span class="btn btn-warning"><i class="fas fa-arrow-up"></i></span>
                            <span class="btn btn-warning"><i class="fas fa-arrow-down"></i></span>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
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
                  <input type="text" class="form-control" name="hora" id="hora" placeholder="Ex: 55 (números inteiros apenas)">
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
                  <input type="text" class="form-control" name="4hora" id="4hora" placeholder="Ex: 55 (números inteiros apenas)">
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
                  <input type="text" class="form-control" id="5hora" name="5hora" placeholder="Ex: 55 (números inteiros apenas)">
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
                  <input type="text" class="form-control" id="dia-turno" name="dia-turno" placeholder="Ex: 55 (números inteiros apenas)">
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
                  <input type="text" class="form-control" id="semana" name="semana" placeholder="Ex: 55 (números inteiros apenas)">
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
                  <input type="text" class="form-control" id="mes" name="mes" placeholder="Ex: 55 (números inteiros apenas)">
                </div>
              </div>
            </div>

            <br><br>
          </div>
          <div class="col-lg-2 col-md-1 col-sm-0">
          </div>
        </div>

        <!-- CADASTRO PARTE 3.1 CONSULTORIOS  -->
        <br>

        <div class="row" id="descricao_especifica_consultorio" style="display: none">
          <div class="col-lg-2 col-md-1 col-sm-0">
          </div>
          <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">

            <!-- TITULO PARTE 2 -->

            <div class="row" style="background-color: black">
              <div class="col-12" style="color: #FFC107">
                <br>
                <span onclick="consultorio_tip(this)" class="btn btn-outline-warning"><h2>Descrição do Consultório</h2></span>
                <br><br>
              </div>
            </div>
            <div id="consultorio_tip-div" class="row text-center justify-content-center" style="background-color: #FFC107; display: none">
              <div class="col-8" style="color: black">
                <br>
                  <h5>Texto de auxilio Texto de auxilio Texto de auxilio Texto de auxilio Texto de auxilio </h5>
                <br>
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
                <input class="form-check-input" onclick="climatizado_consultorio()" type="radio" name="climatizado-consultorio" id="climatizado-consultorio-sim" value="sim">
                <label class="form-check-label" for="climatizado-consultorio-sim">Sim</label>
              </div>
              <div class="col-4 text-left">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" onclick="climatizado_consultorio()" type="radio" name="climatizado-consultorio" id="climatizado-consultorio-nao" value="nao">
                <label class="form-check-label" for="climatizado-consultorio-nao">Não</label>
              </div>
            </div>


            <!-- Split ou paerde -->

            <div class="row" id="climatizado-consultorio-modelo" style="display: none">
              <div class="col-4 text-right">
                <br>
                O ar-condicionado é modelo Split ou de parede?
              </div>
              <div class="col-4 text-left">
                <br>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input class="form-check-input" type="radio" name="modelo-ar-consultorio" id="modelo-ar-consultorio-sim" value="split">
                <label class="form-check-label" for="modelo-ar-consultorio-sim">Ar-condicioando SPLIT</label>
              </div>
              <div class="col-4 text-left">
                <br>
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
                Quantidade de Macas
              </div>
            </div>
            <div class="row">
              <div class="col-3 text-center">
                <input type="text" class="form-control" name="mesa-consultorio" id="mesa-consultorio" placeholder="Ex: 2">
              </div>
              <div class="col-3 text-center">
                <input type="text" class="form-control" name="cadeira-consultorio" id="cadeira-consultorio" placeholder="Ex: 6">
              </div>
              <div class="col-3 text-center">
                <input type="text" class="form-control" name="lum-consultorio" id="lum-consultorio" placeholder="Ex: 4">
              </div>
              <div class="col-3 text-center">
                <input type="text" class="form-control" name="macas-consultorio" id="macas-consultorio" placeholder="Ex: 3">
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
                <textarea class="form-control" name="descricao-aberta-consultorio" id="descricao-aberta-consultorio" rows="6" style="resize: none;"></textarea>
              </div>
              <div class="col-1">
              </div>
            </div>

            <br><br>

          </div>

            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>

          </div>


          <!-- Descrição especifica workshop -->


          <div class="row" id="descricao_especifica_workshop" style="display: none">
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>
            <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">

              <!-- TITULO PARTE 2 -->

              <div class="row" style="background-color: black">
                <div class="col-12" style="color: #FFC107">
                  <br>
                  <span onclick="workshop_tip(this)" class="btn btn-outline-warning"><h2>Descrição da Sala <br class="mobile"> de Ensaio ou <br class="mobile"> Workshop</h2></span>
                  <br><br>
                </div>
              </div>
              <script>
                function dados_basicos_tip(botao)
                {
                  if(botao.classList.contains("active") == true)
                  {
                      botao.classList.remove("active");
                      document.getElementById("dados-basicos-tip-div").style.display = 'none';
                  }
                  else
                  {
                    botao.classList.add("active");
                    document.getElementById("dados-basicos-tip-div").style.display = '';
                  }
                }
                function descricao_geral_tip(botao)
                {
                  if(botao.classList.contains("active") == true)
                  {
                      botao.classList.remove("active");
                      document.getElementById("descricao_geral_tip-div").style.display = 'none';
                  }
                  else
                  {
                    botao.classList.add("active");
                    document.getElementById("descricao_geral_tip-div").style.display = '';
                  }
                }

                function periodo_tip(botao)
                {
                  if(botao.classList.contains("active") == true)
                  {
                      botao.classList.remove("active");
                      document.getElementById("periodo_tip-div").style.display = 'none';
                  }
                  else
                  {
                    botao.classList.add("active");
                    document.getElementById("periodo_tip-div").style.display = '';
                  }
                }
                function workshop_tip(botao)
                {
                  if(botao.classList.contains("active") == true)
                  {
                      botao.classList.remove("active");
                      document.getElementById("workshop_tip-div").style.display = 'none';
                  }
                  else
                  {
                    botao.classList.add("active");
                    document.getElementById("workshop_tip-div").style.display = '';
                  }
                }
              </script>
              <div id="workshop_tip-div" class="row text-center justify-content-center" style="background-color: #FFC107; display: none">
                <div class="col-8" style="color: black">
                  <br>
                    <h5>Texto de auxilio Texto de auxilio Texto de auxilio Texto de auxilio Texto de auxilio </h5>
                  <br>
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
                  <input class="form-check-input" onclick="climatizado_workshop()" type="radio" name="climatizado-workshop" id="climatizado-workshop-sim" value="sim">
                  <label class="form-check-label" for="climatizado-workshop-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" onclick="climatizado_workshop()" type="radio" name="climatizado-workshop" id="climatizado-workshop-nao" value="nao">
                  <label class="form-check-label" for="climatizado-workshop-nao">Não</label>
                </div>
              </div>



              <!-- Split ou paerde -->

              <div class="row" id="climatizado-workshop-modelo" style="display: none">
                <div class="col-4 text-right">
                  <br>
                  O ar-condicionado é modelo Split ou de parede?
                </div>
                <div class="col-4 text-left">
                  <br>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="modelo-ar-workshop" id="modelo-ar-workshop-sim" value="split">
                  <label class="form-check-label" for="modelo-ar-workshop-sim">Ar-condicioando SPLIT</label>
                </div>
                <div class="col-4 text-left">
                  <br>
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
                <div class="col-6 text-center">
                  Qtd de Mesa
                </div>
                <div class="col-6 text-center">
                  Qtd de Cadeira
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-6 text-center">
                  <input type="text" class="form-control" name="mesa-workshop" id="mesa-workshop" placeholder="Ex: 2">
                </div>
                <div class="col-6 text-center">
                  <input type="text" class="form-control" name="cadeira-workshop" id="cadeira-workshop" placeholder="Ex: 6">
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-6 text-center">
                  Qtd de Quadros
                </div>
                <div class="col-6 text-center">
                  Qtd de Lousa de vidro jateada
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-6 text-center">
                  <input type="text" class="form-control" name="quadro-workshop" id="quadro-workshop" placeholder="Ex: 4">
                </div>
                <div class="col-6 text-center">
                  <input type="text" class="form-control" name="lousa-workshop" id="lousa-workshop" placeholder="Ex: 1">
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
                  <input type="text" class="form-control" name="telao-workshop" id="telao-workshop" placeholder="Ex: 1">
                </div>
                <div class="col-6 text-center">
                  <input type="text" class="form-control" name="tv-workshop" id="tv-workshop" placeholder="Ex: 0">
                </div>
              </div>

              <!-- Projetor? -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Data Show?
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

              <!-- Caixa de som? -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Caixa de som?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="som-workshop" id="som-workshop-sim" value="sim">
                  <label class="form-check-label" for="som-workshop-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="som-workshop" id="som-workshop-nao" value="nao">
                  <label class="form-check-label" for="som-workshop-nao">Não</label>
                </div>
              </div>

              <!-- Computador com Windows e Office -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Computador com Windows e pacote Microsoft Office?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="computador-office-workshop" id="computador-office-workshop-sim" value="sim">
                  <label class="form-check-label" for="computador-office-workshop-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="computador-office-workshop" id="computador-office-workshop-nao" value="nao">
                  <label class="form-check-label" for="computador-office-workshop-nao">Não</label>
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
                  <textarea class="form-control" name="descricao-equipamento-workshop" id="descricao-equipamento-workshop" rows="3" style="resize: none;"></textarea>
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
                  <textarea class="form-control" name="descricao-aberta-workshop" id="descricao-aberta-workshop" rows="6" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <br><br>

            </div>

            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>

          </div>


          <div class="row" id="descricao_especifica_cozinha" style="display: none">
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>
            <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">

              <!-- TITULO PARTE 2 -->

              <div class="row" style="background-color: black">
                <div class="col-12" style="color: #FFC107">
                  <br>
                  <span class="btn btn-outline-warning"><h2>Descrição de cozinhas</h2></span>
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
                  <input class="form-check-input" onclick="climatizado_cozinha()" type="radio" name="climatizado-cozinha" id="climatizado-cozinha-sim" value="sim">
                  <label class="form-check-label" for="climatizado-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" onclick="climatizado_cozinha()" type="radio" name="climatizado-cozinha" id="climatizado-cozinha-nao" value="nao">
                  <label class="form-check-label" for="climatizado-cozinha-nao">Não</label>
                </div>
              </div>

              <script>
                function casaOUpredio_f()
                {
                  var radio = document.getElementById('casaOUpredio-predio').checked;
                  if(radio == true)
                  {
                    document.getElementById('elevador-geral').style.display = "";
                  }
                  else
                  {
                    document.getElementById('elevador-geral').style.display = "none";
                  }
                }

                function estacionamento_f()
                {
                  var radio = document.getElementById('estacionamento-sim').checked;
                  if(radio == true)
                  {
                    document.getElementById('estacionamento-geral').style.display = "";
                  }
                  else
                  {
                    document.getElementById('estacionamento-geral').style.display = "none";
                  }
                }

                function calendario_unico_f()
                {
                  var radio = document.getElementById('tempoAluguel-unico').checked;
                  if(radio == true)
                  {
                    document.getElementById('calendario-unico').style.display = "";
                  }
                  else
                  {
                    document.getElementById('calendario-unico').style.display = "none";
                  }
                }

                function calendario_direto_f()
                {
                  var radio = document.getElementById('tempoAluguel-direto').checked;
                  if(radio == true)
                  {
                    document.getElementById('calendario-direto').style.display = "";
                  }
                  else
                  {
                    document.getElementById('calendario-direto').style.display = "none";
                  }
                }

                function calendario_reincidente_f()
                {
                  var radio = document.getElementById('tempoAluguel-reincidente').checked;
                  if(radio == true)
                  {
                    document.getElementById('calendario-reincidente').style.display = "";
                    document.getElementById('calendario-reincidente').style.backgroundColor = "black";
                  }
                  else
                  {
                    document.getElementById('calendario-reincidente').style.display = "none";
                  }
                }

                function climatizado_consultorio()
                {
                  var radio = document.getElementById('climatizado-consultorio-sim').checked;
                  if(radio == true)
                  {
                    document.getElementById('climatizado-consultorio-modelo').style.display = "";
                  }
                  else
                  {
                    document.getElementById('climatizado-consultorio-modelo').style.display = "none";
                  }
                }

                function climatizado_workshop()
                {
                  var radio = document.getElementById('climatizado-workshop-sim').checked;
                  if(radio == true)
                  {
                    document.getElementById('climatizado-workshop-modelo').style.display = "";
                  }
                  else
                  {
                    document.getElementById('climatizado-workshop-modelo').style.display = "none";
                  }
                }
                function climatizado_cozinha()
                {
                  var radio = document.getElementById('climatizado-cozinha-sim').checked;
                  if(radio == true)
                  {
                    document.getElementById('climatizado-cozinha-modelo').style.display = "";
                  }
                  else
                  {
                    document.getElementById('climatizado-cozinha-modelo').style.display = "none";
                  }
                }
              </script>

              <!-- Split ou paerde -->


              <div class="row" id="climatizado-cozinha-modelo" style="display: none">
                <div class="col-4 text-right">
                  <br>
                  O ar-condicionado é modelo Split ou de parede?
                </div>
                <div class="col-4 text-left">
                  <br>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="modelo-ar-cozinha" id="modelo-ar-cozinha-sim" value="split">
                  <label class="form-check-label" for="modelo-ar-cozinha-sim">Ar-condicionado SPLIT</label>
                </div>
                <div class="col-4 text-left">
                  <br>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="modelo-ar-cozinha" id="modelo-ar-cozinha-nao" value="parede">
                  <label class="form-check-label" for="modelo-ar-cozinha-nao">Ar-condicionado de PAREDE</label>
                </div>
              </div>

              <!-- Área para eventos -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui área para realização de evento?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="area-evento-cozinha" id="area-evento-cozinha-sim" value="sim">
                  <label class="form-check-label" for="area-evento-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="area-evento-cozinha" id="area-evento-cozinha-nao" value="nao">
                  <label class="form-check-label" for="area-evento-cozinha-nao">Não</label>
                </div>
              </div>

              <!-- Itens da área de eventos -->

              <div class="row">
              </div>
              <div class="row">
                <br><br>
                <div class="col-6 text-center">
                  Qtd de Mesas de jantar
                </div>
                <div class="col-6 text-center">
                  Qtd de Cadeiras
                </div>
              </div>
              <div class="row">
                <div class="col-6 text-center">
                  <input type="text" class="form-control" name="mesa-cozinha" id="mesa-cozinha" placeholder="Ex: 1">
                </div>
                <div class="col-6 text-center">
                  <input type="text" class="form-control" name="cadeira-cozinha" id="cadeira-cozinha" placeholder="Ex: 0">
                </div>
              </div>

              <!-- Bar -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui espaço de Bar?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="bar-cozinha" id="bar-cozinha-sim" value="sim">
                  <label class="form-check-label" for="bar-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="bar-cozinha" id="bar-cozinha-nao" value="nao">
                  <label class="form-check-label" for="bar-cozinha-nao">Não</label>
                </div>
              </div>

              <!-- Espaço buffet -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui espaço de buffet?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="buffet-cozinha" id="buffet-cozinha-sim" value="sim">
                  <label class="form-check-label" for="buffet-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="buffet-cozinha" id="buffet-cozinha-nao" value="nao">
                  <label class="form-check-label" for="buffet-cozinha-nao">Não</label>
                </div>
              </div>

              <!-- Espaço buffet -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui espaço para um chefe dar uma aula de culinária?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="aula-cozinha" id="aula-cozinha-sim" value="sim">
                  <label class="form-check-label" for="aula-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="aula-cozinha" id="aula-cozinha-nao" value="nao">
                  <label class="form-check-label" for="aula-cozinha-nao">Não</label>
                </div>
              </div>

              <!-- Wifi -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Wi-Fi?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="wifi-cozinha" id="wifi-cozinha-sim" value="sim">
                  <label class="form-check-label" for="wifi-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="wifi-cozinha" id="wifi-cozinha-nao" value="nao">
                  <label class="form-check-label" for="wifi-cozinha-nao">Não</label>
                </div>
              </div>

              <!-- Monitoramento -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui monitoramento por câmeras?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="monitoramento-cozinha" id="monitoramento-cozinha-sim" value="sim">
                  <label class="form-check-label" for="monitoramento-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="monitoramento-cozinha" id="monitoramento-cozinha-nao" value="nao">
                  <label class="form-check-label" for="monitoramento-cozinha-nao">Não</label>
                </div>
              </div>

              <!-- armários -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui armários para armazenamento de mantimentos e utensílios dos profissionais que sublocam?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="armario-cozinha" id="armario-cozinha-sim" value="sim">
                  <label class="form-check-label" for="armario-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="armario-cozinha" id="armario-cozinha-nao" value="nao">
                  <label class="form-check-label" for="armario-cozinha-nao">Não</label>
                </div>
              </div>

              <!-- chave -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Os armários possuem chave?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="chave-armario-cozinha" id="chave-armario-cozinha-sim" value="sim">
                  <label class="form-check-label" for="chave-armario-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="chave-armario-cozinha" id="chave-armario-cozinha-nao" value="nao">
                  <label class="form-check-label" for="chave-armario-cozinha-nao">Não</label>
                </div>
              </div>

              <!-- estante -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui estante para estoque seco?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="estante-cozinha" id="estante-cozinha-sim" value="sim">
                  <label class="form-check-label" for="estante-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="estante-cozinha" id="estante-cozinha-nao" value="nao">
                  <label class="form-check-label" for="estante-cozinha-nao">Não</label>
                </div>
              </div>

              <!-- Faxina -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui faxina incluida?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="faxina-cozinha" id="faxina-cozinha-sim" value="sim">
                  <label class="form-check-label" for="faxina-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="faxina-cozinha" id="faxina-cozinha-nao" value="nao">
                  <label class="form-check-label" for="faxina-cozinha-nao">Não</label>
                </div>
              </div>

              <!-- Inventario -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Descreva o inventário de utensílios, louças e etc.
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10 text-center">
                  <textarea class="form-control" id="inventario-cozinha" name="inventario-cozinha" rows="4" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <!-- Freezer -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui freezer com espaço disponível para compartilhamento?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="freezer-cozinha" id="freezer-cozinha-sim" value="sim">
                  <label class="form-check-label" for="freezer-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="freezer-cozinha" id="freezer-cozinha-nao" value="nao">
                  <label class="form-check-label" for="freezer-cozinha-nao">Não</label>
                </div>
              </div>

              <!-- Geladeira -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui geladeira com espaço disponível para compartilhamento?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="geladeira-cozinha" id="geladeira-cozinha-sim" value="sim">
                  <label class="form-check-label" for="geladeira-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="geladeira-cozinha" id="geladeira-cozinha-nao" value="nao">
                  <label class="form-check-label" for="geladeira-cozinha-nao">Não</label>
                </div>
              </div>

              <!-- Fogão -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui fogão?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="fogao-cozinha" id="fogao-cozinha-sim" value="sim">
                  <label class="form-check-label" for="fogao-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="fogao-cozinha" id="fogao-cozinha-nao" value="nao">
                  <label class="form-check-label" for="fogao-cozinha-nao">Não</label>
                </div>
              </div>

              <!-- Tipo fogao -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Qual é o tipo do fogão?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="tipo-fogao-cozinha" id="tipo-fogao-cozinha-sim" value="caseiro">
                  <label class="form-check-label" for="tipo-fogao-cozinha-sim">Caseiro</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="tipo-fogao-cozinha" id="tipo-fogao-cozinha-nao" value="industrial">
                  <label class="form-check-label" for="tipo-fogao-cozinha-nao">Industrial</label>
                </div>
              </div>

              <!-- Especificar fogão -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Descreva o Fogão: Quantas bocas, marca, capacidade e outras características que desejar
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10 text-center">
                  <textarea class="form-control" name="fogao-caracteristicas-cozinha" id="fogao-caracteristicas-cozinha" rows="4" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <!-- Forno -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui forno?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="forno-cozinha" id="forno-cozinha-sim" value="sim">
                  <label class="form-check-label" for="forno-cozinha-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="forno-cozinha" id="forno-cozinha-nao" value="nao">
                  <label class="form-check-label" for="forno-cozinha-nao">Não</label>
                </div>
              </div>

              <!-- Tipo forno -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  O forno é elétrico ou à gás?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="forno-tipo-cozinha" id="forno-tipo-cozinha-sim" value="gas">
                  <label class="form-check-label" for="forno-tipo-cozinha-sim">Gás</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="forno-tipo-cozinha" id="forno-tipo-cozinha-nao" value="eletrico">
                  <label class="form-check-label" for="forno-tipo-cozinha-nao">Elétrico</label>
                </div>
              </div>

              <!-- Especificar exaustor -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Se possuir um exaustor, especifique aqui
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10 text-center">
                  <textarea class="form-control" id="exaustor-cozinha" name="exaustor-cozinha" rows="4" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <!-- Descrição aberta -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Quer adicionar mais algum detalhe sobre equipamentos ou algo de maneira geral? Utilize esse campo aberto de descrição.
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10 text-center">
                  <textarea class="form-control" name="descricao-aberta-cozinha" id="descricao-aberta-cozinha" rows="6" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <br><br>

            </div>
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>



          </div>

          <div class="row" id="descricao_especifica_ensaio" style="display: none">
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>
            <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">

              <!-- TITULO PARTE 2 -->

              <div class="row" style="background-color: black">
                <div class="col-12" style="color: #FFC107">
                  <br>
                  <span class="btn btn-outline-warning"><h2>Descrição de salas de ensaio e aulas</h2></span>
                  <br><br>
                </div>
              </div>

              <!-- É climatizado -->
              <br><br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui camarim?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="camarim-ensaio" id="camarim-ensaio-sim" value="sim">
                  <label class="form-check-label" for="camarim-ensaio-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="camarim-ensaio" id="camarim-ensaio-nao" value="nao">
                  <label class="form-check-label" for="camarim-ensaio-nao">Não</label>
                </div>
              </div>

              <!-- Split ou paerde -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui sala de apoio para produção?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="apoio-ensaio" id="apoio-ensaio-sim" value="sim">
                  <label class="form-check-label" for="apoio-ensaio-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="apoio-ensaio" id="apoio-ensaio-nao" value="nao">
                  <label class="form-check-label" for="apoio-ensaio-nao">Não</label>
                </div>
              </div>

              <!-- Split ou paerde -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui barra (para alongamento)
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="barra-ensaio" id="barra-ensaio-sim" value="sim">
                  <label class="form-check-label" for="barra-ensaio-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="barra-ensaio" id="barra-ensaio-nao" value="nao">
                  <label class="form-check-label" for="barra-ensaio-nao">Não</label>
                </div>
              </div>

              <!-- Split ou paerde -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui espelho?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="espelho-ensaio" id="espelho-ensaio-sim" value="sim">
                  <label class="form-check-label" for="espelho-ensaio-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="espelho-ensaio" id="espelho-ensaio-nao" value="nao">
                  <label class="form-check-label" for="espelho-ensaio-nao">Não</label>
                </div>
              </div>

              <!-- Descrição aberta -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Quer adicionar mais algum detalhe sobre infraestrutura ou algo de maneira geral? Utilize esse campo aberto de descrição.
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10 text-center">
                  <textarea class="form-control" name="descricao-aberta-ensaio" id="descricao-aberta-ensaio" rows="6" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <br><br>

            </div>
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>
          </div>

          <div class="row" id="descricao_especifica_fotografico" style="display: none">
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>
            <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">

              <!-- TITULO PARTE 2 -->

              <div class="row" style="background-color: black">
                <div class="col-12" style="color: #FFC107">
                  <br>
                  <span class="btn btn-outline-warning"><h2>Descrição de estúdio fotográfico</h2></span>
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
                  <input class="form-check-input" type="radio" name="climatizado-fotografico" id="climatizado-fotografico-sim" value="sim">
                  <label class="form-check-label" for="climatizado-fotografico-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="climatizado-fotografico" id="climatizado-fotografico-nao" value="nao">
                  <label class="form-check-label" for="climatizado-fotografico-nao">Não</label>
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
                  <input class="form-check-input" type="radio" name="modelo-ar-fotografico" id="modelo-ar-fotografico-sim" value="split">
                  <label class="form-check-label" for="modelo-ar-fotografico-sim">Ar-condicionado SPLIT</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="modelo-ar-fotografico" id="modelo-ar-fotografico-nao" value="parede">
                  <label class="form-check-label" for="modelo-ar-fotografico-nao">Ar-condicionado de PAREDE</label>
                </div>
              </div>

              <!-- Pe direito -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Qual é a altura do pé direito?
                </div>
                <div class="col-8 text-center">
                  <input type="text" class="form-control" name="altura-fotografico" id="altura-fotografico" placeholder="Ex: 2">
                </div>
              </div>

              <!-- wifi -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Wi-Fi?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="wifi-fotografico" id="wifi-fotografico-sim" value="sim">
                  <label class="form-check-label" for="wifi-fotografico-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="wifi-fotografico" id="wifi-fotografico-nao" value="nao">
                  <label class="form-check-label" for="wifi-fotografico-nao">Não</label>
                </div>
              </div>

              <!-- wifi -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Cozinha?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="cozinha-fotografico" id="cozinha-fotografico-sim" value="sim">
                  <label class="form-check-label" for="cozinha-fotografico-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="cozinha-fotografico" id="cozinha-fotografico-nao" value="nao">
                  <label class="form-check-label" for="cozinha-fotografico-nao">Não</label>
                </div>
              </div>

              <!-- banheiro -->
              <br>

              <div class="row">
                <div class="col-6 text-center">
                  Quantos banheiros?
                </div>
                <div class="col-6 text-center">
                  Quantos chuveiros?
                </div>
              </div>
              <div class="row">
                <div class="col-6 text-center">
                  <input type="text" class="form-control" name="banheiro-fotografico" id="banheiro-fotografico" placeholder="Ex: 3">
                </div>
                <div class="col-6 text-center">
                  <input type="text" class="form-control" name="chuveiro-fotografico" id="chuveiro-fotografico" placeholder="Ex: 1">
                </div>
              </div>

              <!-- camarim -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Camarim?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="camarim-fotografico" id="camarim-fotografico-sim" value="sim">
                  <label class="form-check-label" for="camarim-fotografico-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="camarim-fotografico" id="camarim-fotografico-nao" value="nao">
                  <label class="form-check-label" for="camarim-fotografico-nao">Não</label>
                </div>
              </div>

              <!-- camarim -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Frigobar?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="frigobar-fotografico" id="frigobar-fotografico-sim" value="sim">
                  <label class="form-check-label" for="frigobar-fotografico-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="frigobar-fotografico" id="frigobar-fotografico-nao" value="nao">
                  <label class="form-check-label" for="frigobar-fotografico-nao">Não</label>
                </div>
              </div>

              <!-- camarim -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Disponibiliza água filtrada?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="agua-fotografico" id="agua-fotografico-sim" value="sim">
                  <label class="form-check-label" for="agua-fotografico-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="agua-fotografico" id="agua-fotografico-nao" value="nao">
                  <label class="form-check-label" for="agua-fotografico-nao">Não</label>
                </div>
              </div>

              <!-- camarim -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui fundo infinito?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="fundo-fotografico" id="fundo-fotografico-sim" value="sim">
                  <label class="form-check-label" for="fundo-fotografico-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="fundo-fotografico" id="fundo-fotografico-nao" value="nao">
                  <label class="form-check-label" for="fundo-fotografico-nao">Não</label>
                </div>
              </div>

              <!-- camarim -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Chroma key?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="chroma-fotografico" id="chroma-fotografico-sim" value="sim">
                  <label class="form-check-label" for="chroma-fotografico-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="chroma-fotografico" id="chroma-fotografico-nao" value="nao">
                  <label class="form-check-label" for="chroma-fotografico-nao">Não</label>
                </div>
              </div>

              <!-- Descrição aberta -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Possui alguma iluminação disponível? Se sim, especifique
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10 text-center">
                  <textarea class="form-control" name="iluminacao-fotografico" id="iluminacao-fotografico" rows="4" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <!-- Descrição aberta -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Quer adicionar mais algum detalhe de maneira geral? Utilize esse campo aberto de descrição.
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10 text-center">
                  <textarea class="form-control" name="descricao-aberta-fotografico" id="descricao-aberta-fotografico" rows="6" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <br><br>

            </div>
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>

          </div>

          <div class="row" id="descricao_especifica_costura" style="display: none">
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>
            <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">

              <!-- TITULO PARTE 2 -->

              <div class="row" style="background-color: black">
                <div class="col-12" style="color: #FFC107">
                  <br>
                  <span class="btn btn-outline-warning"><h2>Descrição de ateliê de costura</h2></span>
                  <br><br>
                </div>
              </div>

              <!-- É climatizado -->
              <br><br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui recepção e atendimento?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="recepcao-costura" id="recepcao-costura-sim" value="sim">
                  <label class="form-check-label" for="recepcao-costura-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="recepcao-costura" id="recepcao-costura-nao" value="nao">
                  <label class="form-check-label" for="recepcao-costura-nao">Não</label>
                </div>
              </div>

              <!-- Descrição aberta -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Possui máquina de costura? Especifique se possuir.
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10 text-center">
                  <textarea class="form-control" id="maquina-costura" name="maquina-costura" rows="3" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <!-- Descrição aberta -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Especifique o seu mobiliário (Mesas, cadeiras e etc)
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10 text-center">
                  <textarea class="form-control" id="mobiliario-costura" name="mobiliario-costura" rows="4" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <!-- É climatizado -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui provador?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="provador-costura" id="provador-costura-sim" value="sim">
                  <label class="form-check-label" for="provador-costura-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="provador-costura" id="provador-costura-nao" value="nao">
                  <label class="form-check-label" for="provador-costura-nao">Não</label>
                </div>
              </div>

              <!-- É climatizado -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui armário e/ou espaço para armazenamento de objetos?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="armario-costura" id="armario-costura-sim" value="sim">
                  <label class="form-check-label" for="armario-costura-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="armario-costura" id="armario-costura-nao" value="nao">
                  <label class="form-check-label" for="armario-costura-nao">Não</label>
                </div>
              </div>

              <!-- Descrição aberta -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Quer adicionar mais algum detalhe de maneira geral? Utilize esse campo aberto de descrição.
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10 text-center">
                  <textarea class="form-control" name="descricao-geral-costura" id="descricao-geral-costura" rows="6" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <br><br>

            </div>
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>

          </div>

          <div class="row" id="descricao_especifica_academia" style="display: none">
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>
            <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">

              <!-- TITULO PARTE 2 -->

              <div class="row" style="background-color: black">
                <div class="col-12" style="color: #FFC107">
                  <br>
                  <span class="btn btn-outline-warning"><h2>Descrição da academia</h2></span>
                  <br><br>
                </div>
              </div>

              <!-- É climatizado -->
              <br><br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui tatame?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="tatame-academia" id="tatame-academia-sim" value="sim">
                  <label class="form-check-label" for="tatame-academia-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="tatame-academia" id="tatame-academia-nao" value="nao">
                  <label class="form-check-label" for="tatame-academia-nao">Não</label>
                </div>
              </div>

              <!-- É climatizado -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui armários individuais para guarda de objetos pessoais?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="armarios-academia" id="armarios-academia-sim" value="sim">
                  <label class="form-check-label" for="armarios-academia-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="armarios-academia" id="armarios-academia-nao" value="nao">
                  <label class="form-check-label" for="armarios-academia-nao">Não</label>
                </div>
              </div>

              <!-- É climatizado -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Bosu?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="bosu-academia" id="bosu-academia-sim" value="sim">
                  <label class="form-check-label" for="bosu-academia-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="bosu-academia" id="bosu-academia-nao" value="nao">
                  <label class="form-check-label" for="bosu-academia-nao">Não</label>
                </div>
              </div>

              <!-- É climatizado -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Rolo?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="rolo-academia" id="rolo-academia-sim" value="sim">
                  <label class="form-check-label" for="rolo-academia-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="rolo-academia" id="rolo-academia-nao" value="nao">
                  <label class="form-check-label" for="rolo-academia-nao">Não</label>
                </div>
              </div>

              <!-- É climatizado -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Maca?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="maca-academia" id="maca-academia-sim" value="sim">
                  <label class="form-check-label" for="maca-academia-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="maca-academia" id="maca-academia-nao" value="nao">
                  <label class="form-check-label" for="maca-academia-nao">Não</label>
                </div>
              </div>

              <!-- É climatizado -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Trapézio?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="trapezio-academia" id="trapezio-academia-sim" value="sim">
                  <label class="form-check-label" for="trapezio-academia-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="trapezio-academia" id="trapezio-academia-nao" value="nao">
                  <label class="form-check-label" for="trapezio-academia-nao">Não</label>
                </div>
              </div>

              <!-- É climatizado -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui Baqueta?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="baqueta-academia" id="baqueta-academia-sim" value="sim">
                  <label class="form-check-label" for="baqueta-academia-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="baqueta-academia" id="baqueta-academia-nao" value="nao">
                  <label class="form-check-label" for="baqueta-academia-nao">Não</label>
                </div>
              </div>

              <!-- É climatizado -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui bola de pilates?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="pilates-academia" id="pilates-academia-sim" value="sim">
                  <label class="form-check-label" for="pilates-academia-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="pilates-academia" id="pilates-academia-nao" value="nao">
                  <label class="form-check-label" for="pilates-academia-nao">Não</label>
                </div>
              </div>

              <!-- Descrição aberta -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Quer adicionar mais algum detalhe de maneira geral? Utilize esse campo aberto de descrição.
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10 text-center">
                  <textarea class="form-control" name="descricao-geral-academia" id="descricao-geral-academia" rows="6" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <br><br>

            </div>
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>

          </div>


          <div class="row" id="descricao_especifica_artes" style="display: none">
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>
            <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">

              <!-- TITULO PARTE 2 -->

              <div class="row" style="background-color: black">
                <div class="col-12" style="color: #FFC107">
                  <br>
                  <span class="btn btn-outline-warning"><h2>Descrição do ateliê de artes</h2></span>
                  <br><br>
                </div>
              </div>

              <!-- É climatizado -->
              <br><br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui forno para cerâmica?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="forno-artes" id="forno-artes-sim" value="sim">
                  <label class="form-check-label" for="forno-artes-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="forno-artes" id="forno-artes-nao" value="nao">
                  <label class="form-check-label" for="forno-artes-nao">Não</label>
                </div>
              </div>

              <!-- É climatizado -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui maçarico para cerâmica?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="macarico-artes" id="macarico-artes-sim" value="sim">
                  <label class="form-check-label" for="macarico-artes-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="macarico-artes" id="macarico-artes-nao" value="nao">
                  <label class="form-check-label" for="macarico-artes-nao">Não</label>
                </div>
              </div>

              <!-- É climatizado -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui formas e moldes para cerâmica?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="moldes-artes" id="moldes-artes-sim" value="sim">
                  <label class="form-check-label" for="moldes-artes-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="moldes-artes" id="moldes-artes-nao" value="nao">
                  <label class="form-check-label" for="moldes-artes-nao">Não</label>
                </div>
              </div>

              <!-- É climatizado -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui bancada?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="bancada-artes" id="bancada-artes-sim" value="sim">
                  <label class="form-check-label" for="bancada-artes-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="bancada-artes" id="bancada-artes-nao" value="nao">
                  <label class="form-check-label" for="bancada-artes-nao">Não</label>
                </div>
              </div>

              <!-- É climatizado -->
              <br>

              <div class="row">
                <div class="col-4 text-right">
                  Possui armário para armazenagem de equipamentos?
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="armario-artes" id="armario-artes-sim" value="sim">
                  <label class="form-check-label" for="armario-artes-sim">Sim</label>
                </div>
                <div class="col-4 text-left">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <input class="form-check-input" type="radio" name="armario-artes" id="armario-artes-nao" value="nao">
                  <label class="form-check-label" for="armario-artes-nao">Não</label>
                </div>
              </div>

              <!-- Descrição aberta -->
              <br>

              <div class="row">
                <div class="col-12 text-center">
                  Quer adicionar mais algum detalhe de maneira geral? Utilize esse campo aberto de descrição.
                </div>
              </div>
              <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10 text-center">
                  <textarea class="form-control" name="descricao-geral-artes" id="descricao-geral-artes" rows="6" style="resize: none;"></textarea>
                </div>
                <div class="col-1">
                </div>
              </div>

              <br><br>

            </div>
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>

          </div>

          <!-- Fotos -->

          <div class="row" id="fotos" style="display: none">
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>
            <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">

              <!-- TITULO PARTE 2 -->

              <div class="row" style="background-color: black">
                <div class="col-12" style="color: #FFC107">
                  <br>
                  <span class="btn btn-outline-warning"><h2>Fotos</h2></span>
                  <br><br>
                </div>
              </div>
              <br><br>

              <div class="row">
                <div class="col-12 text-center">
                  Faça o upload de no mínimo 3 e no máximo 5 fotos para o seu anúncio
                </div>
              </div>

              <br><br>

              <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto1" name="foto1">
                <label class="custom-file-label text-left" id="foto1-label" for="foto1">Escolha uma foto</label>
              </div>
              <br><br>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto2" name="foto2">
                <label class="custom-file-label text-left" id="foto2-label" for="foto2">Escolha uma foto</label>
              </div>
              <br><br>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto3" name="foto3">
                <label class="custom-file-label text-left" id="foto3-label" for="foto3">Escolha uma foto</label>
              </div>
              <br><br>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto4" name="foto4">
                <label class="custom-file-label text-left" id="foto4-label" for="foto4">Escolha uma foto</label>
              </div>
              <br><br>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto5" name="foto5">
                <label class="custom-file-label text-left" id="foto5-label" for="foto5">Escolha uma foto</label>
              </div>
              <br><br>

              <div class="row">
                <div class="col-12 text-center">
                  Caso deseje, faça o upload de 2 fotos panorâmicas abaixo (Opcional)
                </div>
              </div>

              <br><br>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="pano1" name="pano1">
                <label class="custom-file-label text-left" id="pano1-label" for="pano1">Escolha uma foto panorâmica</label>
              </div>
              <br><br>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="pano2" name="pano2">
                <label class="custom-file-label text-left" id="pano2-label" for="pano2">Escolha uma foto panorâmica</label>
              </div>

              <br><br>

            </div>
            <div class="col-lg-2 col-md-1 col-sm-0">
            </div>

          </div>

        <!-- CONTROLE DE MENU -->
        <br>

        <div class="row" style="background-color: black">
          <div class="col-2">
          </div>
          <div class="col-4 text-right" style="color: #FFC107">
            <br>
            <span class="btn btn-outline-warning" onclick="voltar();" style="display: none" id="voltar"><h4>Voltar</h4></span>
            <br><br>
          </div>
          <div class="col-4 text-left" style="color: #FFC107">
            <br>
            <span class="btn btn-outline-warning" onclick="proximo();" id="proximo"><h4>Próximo</h4></span>
            <button type="submit" class="btn btn-outline-warning" style="display: none" id="anunciar"><h4>Anunciar</h4></button>
            <!-- <br><br>
            <span class="ml-3 btn btn-outline-warning" data-toggle="modal" data-target="#completarCadastro">Popup completar cadastro</span> -->
          </div>
          <div class="col-2">
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

      </form>



    </div>


  </body>
  <script>
    // Upload Foto
    $('.custom-file-input').on('change',function(){
      var foto = $(this).val().split('\\').pop();
      var label = document.getElementById($(this).attr('id')+"-label");
      label.innerHTML = foto;
      console.log($(this).attr('id'));
      console.log($(this).attr('id')+"-label");
      console.log(foto);
    })
    //

    var pagina = 0;
    function proximo()
    {

      pagina = pagina + 1;
      var dbasicos = document.getElementById("dados_basicos");
      var dgeral = document.getElementById("descricao_geral");
      var perido = document.getElementById("periodo");
      var consultorio = document.getElementById("descricao_especifica_consultorio");
      var workshop = document.getElementById("descricao_especifica_workshop");
      var cozinha = document.getElementById("descricao_especifica_cozinha");
      var ensaio = document.getElementById("descricao_especifica_ensaio");
      var fotografico = document.getElementById("descricao_especifica_fotografico");
      var costura = document.getElementById("descricao_especifica_costura");
      var academia = document.getElementById("descricao_especifica_academia");
      var artes = document.getElementById("descricao_especifica_artes");
      var fotos = document.getElementById("fotos");
      var foraRJ = document.getElementById("fora_do_rj");

      var Bproximo = document.getElementById("proximo");
      var Bvoltar = document.getElementById("voltar");

      var SelectCategoria = document.getElementById("categoria");
      var categoria = SelectCategoria.options[SelectCategoria.selectedIndex].value

      var SelectCidade = document.getElementById("cidade");
      var SelectEstado = document.getElementById("uf");
      var cidade = SelectCidade.options[SelectCidade.selectedIndex].value
      var estado = SelectEstado.options[SelectEstado.selectedIndex].value



      if(pagina>4)
      {
        pagina = 4;
      }

      if(pagina!=0)
      {
        document.getElementById('voltar').style.display = '';
      }
      else
      {
        document.getElementById('voltar').style.display = 'none';
      }

      if(pagina == 0)
      {
        document.getElementById('proximo').style.display = '';
      }

      if(pagina == 1)
      {
        if(cidade == "outro" || estado == "outro")
        {
          document.getElementById('dados_basicos').style.display = 'none';
          document.getElementById('fora_do_rj').style.display = '';
          document.getElementById('proximo').style.display = 'none';
        }
        else
        {
          document.getElementById('dados_basicos').style.display = 'none';
          document.getElementById('descricao_geral').style.display = '';
        }
      }

      if(pagina == 2)
      {
        document.getElementById('descricao_geral').style.display = 'none';
        document.getElementById('periodo').style.display = '';
        document.getElementById('proximo').style.display = '';
        document.getElementById('anunciar').style.display = 'none';

        consultorio.style.display = "none";
        workshop.style.display = "none";
        cozinha.style.display = "none";
        ensaio.style.display = "none";
        fotografico.style.display = "none";
        costura.style.display = "none";
        academia.style.display = "none";
        artes.style.display = "none";


      }

      if(pagina == 3)
      {
        document.getElementById('proximo').style.display = '';
        document.getElementById('periodo').style.display = "none";
        document.getElementById('anunciar').style.display = 'none';
        fotos.style.display = "none";

        if(categoria == "consultorio")
        {
            consultorio.style.display = "";
        }
        if(categoria == "workshop" || categoria == "palestra")
        {
            workshop.style.display = "";
        }
        if(categoria == "cozinha")
        {
            cozinha.style.display = "";
        }
        if(categoria == "ensaio" || categoria == "aulas")
        {
            ensaio.style.display = "";
        }
        if(categoria == "fotografico" || categoria == "produtora")
        {
            fotografico.style.display = "";
        }
        if(categoria == "costura")
        {
            costura.style.display = "";
        }
        if(categoria == "academia")
        {
            academia.style.display = "";
        }
        if(categoria == "artes")
        {
            artes.style.display = "";
        }
      }

      if(pagina == 4)
      {
        fotos.style.display = "";
        consultorio.style.display = "none";
        workshop.style.display = "none";
        cozinha.style.display = "none";
        ensaio.style.display = "none";
        fotografico.style.display = "none";
        costura.style.display = "none";
        academia.style.display = "none";
        artes.style.display = "none";
        document.getElementById('anunciar').style.display = '';
        document.getElementById('proximo').style.display = 'none';
      }

      window.scrollTo(0, 0);

    }

    function voltar()
    {
      pagina = pagina - 1;
      var dbasicos = document.getElementById("dados_basicos");
      var dgeral = document.getElementById("descricao_geral");
      var perido = document.getElementById("periodo");
      var consultorio = document.getElementById("descricao_especifica_consultorio");
      var workshop = document.getElementById("descricao_especifica_workshop");
      var cozinha = document.getElementById("descricao_especifica_cozinha");
      var ensaio = document.getElementById("descricao_especifica_ensaio");
      var fotografico = document.getElementById("descricao_especifica_fotografico");
      var costura = document.getElementById("descricao_especifica_costura");
      var academia = document.getElementById("descricao_especifica_academia");
      var artes = document.getElementById("descricao_especifica_artes");
      var foraRJ = document.getElementById("fora_do_rj");

      var Bproximo = document.getElementById("proximo");
      var Bvoltar = document.getElementById("voltar");

      var SelectCategoria = document.getElementById("categoria");

      var categoria = SelectCategoria.options[SelectCategoria.selectedIndex].value

      if(pagina<0)
      {
        pagina = 0;
      }

      if(pagina!=0)
      {
        document.getElementById('voltar').style.display = '';
      }
      else
      {
        document.getElementById('voltar').style.display = 'none';
      }

      if(pagina == 0)
      {
        document.getElementById('dados_basicos').style.display = '';
        document.getElementById('descricao_geral').style.display = 'none';
        document.getElementById('fora_do_rj').style.display = 'none';
        document.getElementById('proximo').style.display = '';
      }

      if(pagina == 1)
      {
        document.getElementById('periodo').style.display = 'none';
        document.getElementById('descricao_geral').style.display = '';
      }

      if(pagina == 2)
      {
        document.getElementById('descricao_geral').style.display = 'none';
        document.getElementById('periodo').style.display = '';
        document.getElementById('proximo').style.display = '';
        document.getElementById('anunciar').style.display = 'none';

        consultorio.style.display = "none";
        workshop.style.display = "none";
        cozinha.style.display = "none";
        ensaio.style.display = "none";
        fotografico.style.display = "none";
        costura.style.display = "none";
        academia.style.display = "none";
        artes.style.display = "none";


      }

      if(pagina == 3)
      {
        document.getElementById('proximo').style.display = '';
        document.getElementById('periodo').style.display = "none";
        document.getElementById('anunciar').style.display = 'none';
        fotos.style.display = "none";

        if(categoria == "consultorio")
        {
            consultorio.style.display = "";
        }
        if(categoria == "workshop" || categoria == "palestra")
        {
            workshop.style.display = "";
        }
        if(categoria == "cozinha")
        {
            cozinha.style.display = "";
        }
        if(categoria == "ensaio" || categoria == "aulas")
        {
            ensaio.style.display = "";
        }
        if(categoria == "fotografico" || categoria == "produtora")
        {
            fotografico.style.display = "";
        }
        if(categoria == "costura")
        {
            costura.style.display = "";
        }
        if(categoria == "academia")
        {
            academia.style.display = "";
        }
        if(categoria == "artes")
        {
            artes.style.display = "";
        }
      }

      if(pagina == 4)
      {
        fotos.style.display = "";
        consultorio.style.display = "none";
        workshop.style.display = "none";
        cozinha.style.display = "none";
        ensaio.style.display = "none";
        fotografico.style.display = "none";
        costura.style.display = "none";
        academia.style.display = "none";
        artes.style.display = "none";
        document.getElementById('anunciar').style.display = '';
        document.getElementById('proximo').style.display = 'none';
      }

      window.scrollTo(0, 0);

    }
  </script>
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
