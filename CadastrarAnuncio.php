
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
            
            $aux = $db->cadastrarAnuncioDescGeral($conn, $aux, $metragem, $recepcao, $banheiroPrivativo, $banheiroComum, $casaPredio, $elevador, $estacionamento, $proprioRotativo, $transporte  );    
            
            if ($aux === true) {
                print "Entrou true";
                print $categoria;
                if ($categoria == "consultorio") {
                      print "Entrou consultorio";
                    $climatizado = $seg->filtro3($_POST['climatizado-consultorio']);
                    if ($climatizado == "sim") {
                        $modeloAr = $seg->filtro($_POST['modelo-ar-consultorio']);
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

                    print $aux = $db-> cadastrarConsultorio($conn,$idAnuncio, $climatizado,$modeloAr,
                       $wifi, $monitoramento, $armarios, $secretaria, $limpeza,$copa,
                            $numMesa, $nunCadeira, $numLuminaria,$numCortina, $nunMacas, $balanca,
                                $cafe, $agua, $tv, $descricao, $modeloAr);
                    
                    return $aux;

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
    $db = new FunctionsDB();
    $aux = $db->cadastrarAnuncioBasico($conn,$id,$titulo,$categoria,$bairro,$cidade,$uf);

    return $aux;

}


?>