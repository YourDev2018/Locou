
<?php

    require_once 'BuscarEspacos.php';
    require_once 'FunctionsDB.php';

    $db = new FunctionsDB();
    $conn = $db->conectDB();

    $hashId = $_GET['id'];
//    $hashId = 'c9e1074f5b3f9fc8ea15d152add07294';

    $busca= new BuscarEspacos();
    $array = $busca->getHashId($conn,$hashId);

    $idPedido = $array[5];
    $idOrder = $array[7];
    $tipo = $array[6];

    $seg = json_encode(false);
    $ter = json_encode(false);
    $qua = json_encode(false);
    $qui = json_encode(false);
    $sex = json_encode(false);
    $sab = json_encode(false);
    $dom = json_encode(false);
 
    $arrayPedidosDB = $busca->getPedidosDB($conn,$hashId);
    if ($arrayPedidosDB != false) {
        echo 'Pedido já autorizado';
        exit();
    }

      $idUsuario = $array[1];

      $arrayUserBasico =  $db->getUsuarioBasico($conn,$idUsuario);
      $nome = $arrayUserBasico[0];


    if ($tipo == 'unico') {
          

        $arrayDetalhes = $busca -> getPedidosTemporariosUnico($conn,$idPedido);
        $entrada = $arrayDetalhes[0];
        $entrada = date('d/m/Y', strtotime($entrada));
    }

    
    if ($tipo == 'direto') {

        $arrayDetalhes = $busca -> getPedidosTemporariosUnico($conn,$idPedido);

       $entrada = $arrayDetalhes[0];
       $entrada = date('d/m/Y', strtotime($entrada));

       $saida = date('d/m/Y', strtotime( $arrayDetalhes[1]));
       $semana = $arrayDetalhes[2];
    }

    if ($tipo == 'reincidente') {

    $result = $busca->getPedidosTemporariosReincidentes($conn,$idPedido);
    
    // resgatar os valores de e colocar no email 
    if ($result == false) {
        print 'erro';
    }else{



        $segC = 0;
        $terC = 0;
        $quaC = 0;
        $quiC = 0;
        $sexC = 0;
        $sabC = 0;
        $domC = 0;
      
        $maiorNumero = 0;

      while ($row=$result->fetch_assoc()) {
              
        $day = date("N", strtotime($row['dataAnuncio']));

        if($day == 1){
        $seg =  json_encode(true);
        $segC = $segC + 1;
         $entradaSeg = $row['horaEntrada'];
         $saidaSeg = $row['horaSaida'];
        }
        if($day == 2){
        $ter=  json_encode(true);
        $terC= $terC + 1;
         $entradaTer = $row['horaEntrada'];
         $saidaTer = $row['horaSaida'];
        }
        if($day == 3){
        $qua =  json_encode(true);
        $quaC = $quaC + 1;
         $entradaQua = $row['horaEntrada'];
         $saidaQua = $row['horaSaida'];
        }
        if($day == 4){
        $qui = json_encode(true);
        $quiC = $quiC + 1;
         $entradaQui = $row['horaEntrada'];
         $saidaQui = $row['horaSaida'];
        }
        if($day == 5){
        $sex =  json_encode(true);
        $sexC = $sexC +1;
         $entradaSex = $row['horaEntrada'];
         $saidaSex = $row['horaSaida'];
        }
        if($day == 6){
        $sab =  json_encode(true);
        $sabC = $sabC + 1;
         $entradaSab = $row['horaEntrada'];
         $saidaSab = $row['horaSaida'];
        }
        if($day == 7){
        $dom = json_encode(true);
        $domC = $domC + 1;
         $entradaDom = $row['horaEntrada'];
         $saidaDom = $row['horaSaida'];
        }

        if ($segC > $maiorNumero) {
            $maiorNumero = $segC;
           
        }

        if ($terC > $maiorNumero) {
            $maiorNumero = $terC;
        }

        if ($quaC > $maiorNumero) {
            $maiorNumero = $quaC;
        }

        if ($quiC > $maiorNumero) {
            $maiorNumero = $quiC;
        }

        if ($sexC > $maiorNumero) {
            $maiorNumero = $sexC;
        }

        if ($sabC > $maiorNumero) {
            $maiorNumero = $sabC;
        }

        if ($domC > $maiorNumero) {
            $maiorNumero = $domC;
        }

        $corpo .= "Data : ". date("d/m/Y ", strtotime( $row['dataAnuncio'])). "<br>";  // 0
        $corpo .= "Entrada : ". $row['horaEntrada']. "<br>"; // 1
        $corpo .= "Saida : ". $row['horaSaida']. "<p>"; // 2


        //$corpo .= "</body></html>";
      }
    }    
  }
    
?>


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
          <b>Confirme o pedido de aluguel</b>
          <br>
        </h2>
        <h4>
          Com o Locou você ganha dinheiro alugando naqueles intervalos que você não estiver usando.
        </h4>
        <br>
      </div>
    </div>


    <div class="row justify-content-center text-center py-5" id="dados_basicos">
      <div class="col-lg-8 col-md-10 col-sm-12" style="border-style: solid; border-width: 2px; border-color: #FFC107">
        <div class="row justify-content-center text-center">
          <div class="col-12 py-3" style="color: #FFC107; background-color: black">
            <span class="btn btn-outline-warning" onclick="dados_basicos_tip(this)"><span style="font-size: 2em">Confirmar Aluguel</span></span>
          </div>
          <div class="col-10">
            <div class="px-5 pt-4" style="background-color:white; color: black">
              <span class="h5">
                Seu espaço acabou de ter um pedido para alugar! Caso aceite o pedido, anote as informações abaixo do seu locatário na sua agenda e reserve o espaço para o mesmo.
              </span>
              <br><br><br>
              <script>
              $( document ).ready(function() {
                var tipo = "<?php echo $tipo ?>";
                if(tipo == "unico")
                {
                  document.getElementById('unico').style.display = "";
                } else if (tipo == "reincidente") {
                  document.getElementById('reincidente').style.display = "";
                  var segunda = <?php echo $seg?>;
                  var terca = <?php echo $ter?>;
                  var quarta = <?php echo $qua?>;
                  var quinta = <?php echo $qui?>;
                  var sexta = <?php echo $sex?>;
                  var sabado = <?php echo $sab?>;
                  var domingo = <?php echo $dom?>;
                  if(segunda)
                  {
                    document.getElementById('seg').style.display = '';
                  }
                  if(terca)
                  {
                    document.getElementById('ter').style.display = '';
                  }
                  if(quarta)
                  {
                    document.getElementById('qua').style.display = '';
                  }
                  if(quinta)
                  {
                    document.getElementById('qui').style.display = '';
                  }
                  if(sexta)
                  {
                    document.getElementById('sex').style.display = '';
                  }
                  if(sabado)
                  {
                    document.getElementById('sab').style.display = '';
                  }
                  if(domingo)
                  {
                    document.getElementById('dom').style.display = '';
                  }
                } else if (tipo == "direto") {
                  document.getElementById('direto').style.display = "";
                }
              });
              </script>
              <div style="display: none" id="unico" class="row justify-content-center">
                <div class="col-10 py-2 text-left">
                  <span class="h5"><b>Número do Pedido: </b><?php echo $idOrder  ?></span>
                </div>
                <div class="col-10 py-2 text-left">
                  <span class="h5"><b>Nome do locatário: </b> <?php echo $nome ?></span>
                </div>
                <div class="col-10 py-2 text-left">
                  <span class="h5"><b>Dia selecionado: </b> <?php echo $entrada ?></span>
                </div>
              </div>
              <div style="display: none" id="reincidente" class="row justify-content-center">
                <div class="col-10 py-2 text-left">
                  <span class="h5"><b>Número do Pedido: </b><?php echo $idOrder  ?></span>
                </div>
                <div class="col-10 py-2 text-left">
                  <span class="h5"><b>Nome do locatário: </b><?php echo $nome ?></span>
                </div>
                <div id="seg" style="display: none" class="col-10 py-2 text-left">
                  <span class="h5"><b>Segunda-Feira: </b> <?php echo $entradaSeg.' até '.$saidaSeg ?></span>
                </div>
                <div id="ter" style="display: none" class="col-10 py-2 text-left">
                  <span class="h5"><b>Terca-Feira: </b> <?php echo $entradaTer.' até '.$saidaTer ?></span>
                </div>
                <div id="qua" style="display: none" class="col-10 py-2 text-left">
                  <span class="h5"><b>Quarta-Feira: </b> <?php echo $entradaQua.' até '.$saidaQua ?></span>
                </div>
                <div id="qui" style="display: none" class="col-10 py-2 text-left">
                  <span class="h5"><b>Quinta-Feira: </b> <?php echo $entradaQui.' até '.$saidaQui ?></span>
                </div>
                <div id="sex" style="display: none" class="col-10 py-2 text-left">
                  <span class="h5"><b>Sexta-Feira: </b> <?php echo $entradaSex.' até '.$saidaSex ?></span>
                </div>
                <div id="sab" style="display: none" class="col-10 py-2 text-left">
                  <span class="h5"><b>Sábado: </b> <?php echo $entradaSab.' até '.$saidaSab ?>)</span>
                </div>
                <div id="dom" style="display: none" class="col-10 py-2 text-left">
                  <span class="h5"><b>Domingo: </b> <?php echo $entradaDom.' até '.$saidaDom ?></span>
                </div>
                <div class="col-10 py-2 text-left">
                  <span class="h5"><b>Número de semanas seguidas: </b> <?php echo $maiorNumero; ?></span>
                </div>
              </div>
              <div style="display: none" id="direto" class="row justify-content-center">
                <div class="col-10 py-2 text-left">
                  <span class="h5"><b>Número do Pedido: </b><?php echo $idOrder; ?></span>
                </div>
                <div class="col-10 py-2 text-left">
                  <span class="h5"><b>Nome do locatário: </b> <?php echo $nome; ?></span>
                </div>
                <div class="col-10 py-2 text-left">
                  <span class="h5"><b>Período selecionado: </b> <?php echo $entrada.' até '.$saida.' - 9h as 18h' ?></span>
                </div>
              </div>
              <br><br><br>
              <form action="index.html" method="post">
                <input type="text" name="hash" style="display:none" value="">
                <a href="<?php echo "redirecionamento.php?id=$hashId"?>"<span class="btn btn-warning" style="font-size: 1.3em">Aprovar pedido</span></a>
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
