
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once 'Seguranca.php';
require_once 'FunctionsSession.php';
require_once 'FunctionsDB.php';

// descrição básica 
$seg = new Seguranca();
$titulo = $seg->filtro($_POST['titulo']);
$categoria = $seg->filtro($_POST['categoria']);
$bairro = $seg->filtro($_POST['bairro']);
$cidade = $seg->filtro($_POST['cidade']);
$uf = $seg->filtro($_POST['uf']);

// descrição geral
$metragem = $seg->filtro($_POST['metragem']);
$recepcao = $seg->filtro3($_POST['recepcao']);
$banheiroPrivativo = $seg->filtro3($_POST['banheiro-privativo']);
$banheiroComum = $seg->filtro3($_POST['banheiro']);
$casaPredio = $seg->filtro2($_POST['casaOUpredio']);

if ($casaPredio == "predio") {
    $elevador = $seg->filtro3($_POST['elevador']);
}

$estacionamento = $seg->filtro($_POST['estacionamento']);
if ($estacionamento == "sim") {
    $proprioRotativo = $seg->filtro($_POST['proprioOUrotativo']);
}

$transporte = $seg->filtro3($_POST['transporte']);

// consutório 


$db = new FunctionsDB();
$conn = $db->conectDB();
$db->loginEmailSenha($conn,"morgado@yourdev.com.br",md5("123"));

$session = new FunctionsSession();

    if ($session->vereficarLogin()) {
            $aux = basico($conn, $titulo, $categoria, $bairro, $cidade, $uf );

        if (is_numeric($aux)) {
            
            $result = $db->cadastrarAnuncioDescGeral($conn, $aux, $metragem, $recepcao, $banheiroPrivativo, $banheiroComum, $casaPredio, $elevador, $estacionamento, $proprioRotativo, $transporte  );    
            
            if ($result === true) {
               // print "Entrou true";
               // print $categoria;
                if ($categoria == "consultorio") {
                      print "Entrou consultorio";
                    $climatizado = $seg->filtro3($_POST['climatizado-consultorio']);
                    if ($climatizado == "sim") {
                        $modeloAr = $seg->filtro3($_POST['modelo-ar-consultorio']);
                    }
                    
                    $wifi = $seg->filtro3($_POST['wifi-consultorio']);
                    $monitoramento = $seg->filtro3($_POST['vigilancia-consultorio']);
                    $armarios = $seg->filtro3($_POST['armarios-consultorio']);
                    $secretaria = $seg->filtro3($_POST['secretaria-consultorio']);
                    $limpeza =  $seg->filtro3($_POST['limpeza-consultorio']);
                    $copa =   $seg->filtro3($_POST['copa-consultorio']);
                    $numMesa = $seg->filtro3($_POST['mesa-consultorio']);
                    $nunCadeira = $seg->filtro3($_POST['cadeira-consultorio']);
                    $numLuminaria = $seg->filtro3($_POST['lum-consultorio']);
                    $numCortina = $seg->filtro3($_POST['cortina-consultorio']);
                    $numMacas = $seg->filtro3($_POST['macas-consultorio']);
                    $balanca = $seg->filtro3($_POST['balanca-consultorio']);
                    $cafe = $seg->filtro3($_POST['cafe-consultorio']);
                    $agua= $seg->filtro3($_POST['agua-consultorio']);
                    $tv  = $seg->filtro3($_POST['tv-consultorio']);
                    $descricao = $seg->filtro($_POST['descricao-aberta-consultorio']);
                    
                    

                    print $resp = $db-> cadastrarConsultorio($conn,$aux, $climatizado,$modeloAr,
                       $wifi, $monitoramento, $armarios, $secretaria, $limpeza,$copa,
                            $numMesa, $nunCadeira, $numLuminaria,$numCortina, $nunMacas, $balanca,
                                $cafe, $agua, $tv, $descricao, $modeloAr);
                    
                    return $resp;

                }

                if ($categoria == "cozinha") {
                    
                   
                     $climatizado = $seg->filtro3($_POST['climatizado-cozinha']);
                    if ($climatizado == "sim") {
                        $modeloAr = $seg->filtro3($_POST['modelo-ar-consultorio']);
                    }
                    $areaEvento = $seg->filtro3($_POST['area-evento-cozinha']);
                    $numMesa= $seg->filtro2($_POST['mesa-cozinha']);
                    $numCadeira = $seg->filtro2($_POST['cadeira-cozinha']);
                    $bar = $seg->filtro3($_POST['bar-cozinha']);
                    $buffet = $seg->filtro3($_POST['buffet-cozinha']);
                    $aula= $seg->filtro3($_POST['aula-cozinha']);
                    $wifi= $seg->filtro3($_POST['wifi-cozinha']);
                    $monitoramento= $seg->filtro3($_POST['monitoramento-cozinha']);
                    $armario= $seg->filtro3($_POST['armario-cozinha']);
                    $chave= $seg->filtro3($_POST['chave-armario-cozinha']);
                    $estante= $seg->filtro3($_POST['estante-cozinha']);
                    $faxina= $seg->filtro3($_POST['faxina-cozinha']);
                    $inventario=  $seg->filtro($_POST['inventario-cozinha']);
                    $freezer=  $seg->filtro3($_POST['freezer-cozinha']);
                    $geladeira= $seg->filtro3($_POST['geladeira-cozinha']);
                    $fogao= $seg->filtro3($_POST['fogao-cozinha']);
                    $tipoFogao= $seg->filtro3($_POST['tipo-fogao-cozinha']);
                    $fogaoCaracteristica= $seg->filtro($_POST['fogao-caracteristicas-cozinha']);
                    $forno= $seg->filtro3($_POST['forno-cozinha']);
                    $fornoTipo= $seg->filtro3($_POST['forno-tipo-cozinha']);
                    $descricaoExaustor= $seg->filtro($_POST['exaustor-cozinha']);
                    $descricaoAberta=$seg->filtro($_POST['descricao-aberta-cozinha']);
               
                    print $resp = $db-> cadastrarCozinha($conn, $aux, $climatizado, $modeloAr, $areaEvento, $numMesa, $numCadeira, $bar, $buffet, $aula, $wifi, $monitoramento, $armario, $chave, $estante, $faxina, $inventario, $freezer, $geladeira, $fogao, $tipoFogao, $fogaoCaracteristica, $forno, $fornoTipo, $descricaoExaustor, $descricaoAberta);
                    return $resp;
                }

                if ($categoria == "workshop") {
                   
                    $climatizado = $seg->filtro3($_POST['climatizado-workshop']);
                    if ($climatizado == "sim") {
                        $modeloAr = $seg->filtro3($_POST['modelo-ar-workshop']);
                    }
                    $wifi = $seg->filtro3($_POST['wifi-workshop']);
                    $vigilancia = $seg->filtro3($_POST['vigilancia-workshop']);
                    $armarios = $seg->filtro3($_POST['armarios-workshop']);
                    $limpeza = $seg->filtro3($_POST['limpeza-workshop']);
                    $copa = $seg->filtro3($_POST['copa-workshop']);
                    $numMesa = $seg->filtro2($_POST['mesa-workshop']);
                    $numCadeira= $seg->filtro2($_POST['cadeira-workshop']);
                    $numQuadro = $seg->filtro2($_POST['quadro-workshop']);
                    $numLousa = $seg->filtro2($_POST['lousa-workshop']);
                    $numTelao = $seg->filtro2($_POST['telao-workshop']);
                    $numTv = $seg->filtro2($_POST['tv-workshop']);
                    $projetor = $seg->filtro3($_POST['projetor-workshop']);
                    $som = $seg->filtro3($_POST['som-workshop']);
                    $computador = $seg->filtro3($_POST['computador-office-workshop']);
                    $flip = $seg->filtro3($_POST['flip-workshop']);
                    $cafe = $seg->filtro3($_POST['cafe-workshop']);
                    $agua= $seg->filtro3($_POST['agua-workshop']);
                    $buffet = $seg->filtro3($_POST['buffet-workshop']);
                    $buffetExtra = $seg->filtro3($_POST['buffet-extra-workshop']);
                    $descricaoEquipamento = $seg->filtro($_POST['descricao-equipamento-workshop']);
                    $descricaoAberta = $seg->filtro($_POST['descricao-aberta-workshop']);

                    print $resp = $db-> cadastrarWorkShop($conn,$aux, $climatizado, $modeloAr, $wifi, $vigilancia, $armarios, $limpeza, $copa, $numMesa, $numCadeira, $numQuadro, $numLousa, $numTelao, $numTv, $projetor, $som, $computador, $flip, $cafe, $agua, $buffet, $buffetExtra, $descricaoEquipamento, $descricaoAberta);
                    
                }

                if ($categoria == "ensaio"){
                    $camarim = $seg->filtro3($_POST['camarim-ensaio']);
                    $apoio = $seg->filtro3($_POST['apoio-ensaio']);
                    $barra = $seg->filtro3($_POST['barra-ensaio']);
                    $espelho = $seg->filtro3($_POST['espelho-ensaio']);
                    $descricaoAberta = $seg->filtro($_POST['descricao-aberta-ensaio']);
                    print $resp = $db-> cadastrarEnsaio($conn, $aux, $camarim, $apoio, $barra, $espelho, $descricaoAberta);

                }





                
            }else {
                print "Não boolean";
            }
        }else{
            print "Não numérico";
            exit();
        }

    }else{
        print "Erro, usuário não conectado";
    }



function basico($conn,$titulo, $categoria, $bairro, $cidade, $uf ){

   
    $id = $_SESSION['id'];
    //var_dump ($_FILES['foto1']);
     $ext = strtolower(substr($_FILES['foto1']['name'],-4));

    $temp = $_FILES['foto1']['tmp_name'];
    
    $novo_nome = md5(time()).$ext;
    
    //$diretorio = "http://www.yourdev.com.br/clientes/locou/img/anuncio/";

   // move_uploaded_file($temp,$diretorio.$novo_nome);
    // http://www.yourdev.com.br/clientes/locou/img/anuncio/
    $db = new FunctionsDB();

    $aux = $db->cadastrarAnuncioBasico($conn,$id,$titulo,$categoria,$bairro,$cidade,$uf,$novo_nome);

    $servidor = 'yourdev-com-br.umbler.net'; // Endereço
    $usuario = 'yourdev-com-br'; // Usuário
    $senha = 'yourdev2017'; // Senha

    if (!$ftp = ftp_connect($servidor)){
        print "erro";
    } // Retorno: true ou false

     $login = ftp_login($ftp, $usuario, $senha); // Retorno: true ou fals

    $local_arquivo = $temp; // Localização (local)
    $ftp_pasta = '/public/clientes/locou/img/anuncio/'; // Pasta (externa)
    $ftp_arquivo = $_FILES['foto1']['name']; // Nome do arquivo (externo)
    $envio = ftp_put($ftp, $ftp_pasta.$novo_nome, $local_arquivo, FTP_BINARY);

    return $aux;

}


?>