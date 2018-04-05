
<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once 'Seguranca.php';
require_once 'FunctionsSession.php';
require_once 'FunctionsDB.php';

$servidor = 'yourdev-com-br.umbler.net'; // Endereço
$usuario = 'yourdev-com-br'; // Usuário
$senha = 'yourdev2017'; // Senha

$ftp = ftp_connect($servidor);
$login = ftp_login($ftp, $usuario, $senha); // Retorno: true ou fals

// descrição básica 
$seg = new Seguranca();
$titulo = $seg->filtro($_POST['titulo']);
$categoria = $seg->filtro($_POST['categoria']);
$bairro = $seg->filtro($_POST['bairro']);
$cidade = $seg->filtro($_POST['cidade']);
$uf = $seg->filtro($_POST['uf']);
print $precoHora = $seg->filtro($_POST['hora']);

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

$fotoPanoramica1 = $_FILES['pano1']['tmp_name'];
$fotoPanoramica2 = $_FILES['pano2']['tmp_name'];


print ' '.$preco4Hora = $seg->filtro($_POST['4hora']);
print ' '. $preco5Hora = $seg->filtro($_POST['5hora']);
print ' '.$precoTurno = $seg->filtro($_POST['dia-turno']);
print ' '.$precoSemana = $seg->filtro($_POST['semana']);
print ' '.$precoMes = $seg->filtro($_POST['mes']);
print ' '.$reservaInsta = $seg->filtro($_POST['reservaInsta']);// consutório //Perguntar ao proprietario ou direto


if($reservaInsta=='on'){
    $reservaInsta = 'sim';
}else{
    $reservaInsta = 'nao';
}

$db = new FunctionsDB();
$conn = $db->conectDB();
$db->loginEmailSenha($conn,"morgado@yourdev.com.br",md5("123"));

$session = new FunctionsSession();

    if ($session->vereficarLogin()) {
            $aux = basico($ftp, $conn, $titulo, $categoria, $bairro, $cidade, $uf, $precoHora);

        if (is_numeric($aux)) {

            $ftp_pasta = '/public/clientes/locou/img/anuncio/'; // Pasta (externa)
            
            if($fotoPanoramica1 == '' || $fotoPanoramica1 == NULL){
                $novo_nome_pan = '';
            }else{
                $temp_pan1  = $_FILES['pano1']['tmp_name'];
                $ext = strtolower(substr($_FILES['pano1']['name'],-4));
                $novo_nome_pan = md5(time().$temp_pan1).$ext;
                $envio = ftp_put($ftp, $ftp_pasta.$novo_nome_pan, $temp, FTP_BINARY);
            }

             if($fotoPanoramica2 == '' || $fotoPanoramica2 == NULL){
                $novo_nome_pan = '';
            }else{
                $temp_pan2  = $_FILES['pano2']['tmp_name'];
                $ext = strtolower(substr($_FILES['pano2']['name'],-4));
                $novo_nome_pan2 = md5(time().$temp_pan2).$ext;
                $envio = ftp_put($ftp, $ftp_pasta.$novo_nome_pan2, $temp, FTP_BINARY);
            }

            $result = $db->cadastrarAnuncioDescGeral($conn, $aux, $metragem, $recepcao, $banheiroPrivativo, $banheiroComum, $casaPredio, $elevador, $estacionamento, $proprioRotativo, $transporte, $reservaInsta, $novo_nome_pan,$novo_nome_pan2, $quatroHora, $cincoHora, $turno, $semana, $mes);    
            
            
            
            
            if ($result === true) {

                $tipoAluguel = $_POST['tipoAluguel'];

                if($tipoAluguel == 'unico'){

                    $data = $_POST['data-unico-pick'];
                    $horaInicio = $_POST['hora-inicio-unico'];
                    $horaFim = $_POST['hora-fim-unico'];

                    $result = $db-> cadastrarHorariosDisponiveis($conn,$aux,$data,$data,$horaInicio,$horaFim);

                    if ($result == true) {

                        cadastrarEspacoEspecifico($conn, $categoria);

                    }else{

                        print "Erro ao cadastrar horário único";

                    }        
                }
                
                /*
                if($tipoAluguel == 'direto'){

                    $data = $_POST['data-unico-pick'];
                    $aux = str_split($data);
                    $dia = $aux[0].$aux[1];
                    $mes =  $aux[3].$aux[4];
                    $ano =  $aux[6].$aux[7].$aux[8].$aux[9];
                   
                
                    $horaInicio = $_POST['hora-inicio-unico'];
                    $horaFim = $_POST['hora-fim-unico'];
                    $nunMes = 2;
                    $mes = $mes +$nunMes;
                    $dataFim = $ano.$mes.$dia;
                    //aqui tem um bug

                    $result = $db-> cadastrarHorariosDisponiveis($conn,$aux,$data,$dataFim,$horaInicio,$horaFim);

                    if ($result == true) {

                        cadastrarEspacoEspecifico($categoria);

                    }else{
                        print "Erro ao cadastrar horário único";
                    }        
                }
                */

                
                if($tipoAluguel == 'reincidente'){
                    

                    $sem = $_POST['semana-unico'];
                   // $data = date('Ymd');

                    $nextSunday = date('Ymd', strtotime("next Sunday"));
                    $nextMonday = date('Ymd', strtotime("next Monday"));
                    $nextTuesday = date('Ymd', strtotime("next Tuesday"));
                    $nextWednesday = date('Ymd', strtotime("next Wednesday"));
                    $nextThursday = date('Ymd', strtotime("next Thursday"));
                    $nextFriday = date('Ymd', strtotime("next Friday"));
                    $nextSaturday= date('Ymd', strtotime("next Saturday"));
                    
                    $domI = $_POST['dom-inicio-periodo'];
                    $domF = $_POST['dom-fim-periodo'];

                    $segI = $_POST['seg-inicio-periodo'];
                    $segF = $_POST['seg-fim-periodo'];

                    $terI = $_POST['ter-inicio-periodo'];
                    $terF = $_POST['ter-fim-periodo'];

                    $quaI = $_POST['qua-inicio-periodo'];
                    $quaF = $_POST['qua-fim-periodo'];

                    $quiI = $_POST['qui-inicio-periodo'];
                    $quiF = $_POST['qui-fim-periodo'];

                    $sexI = $_POST['sex-inicio-periodo'];
                    $sexF = $_POST['sex-fim-periodo'];

                    $sabI = $_POST['sab-inicio-periodo'];
                    $sabF = $_POST['sab-fim-periodo'];


                    for( $i=0;$i<$sem;$i++){

                         if(!($domI == null || $domF == null || $domI == '' || $domF == '' )){

                            $data = (string)$nextSunday;
                            $date = new DateTime($data);
                            $dias = $i*7;
                            $date->add(new DateInterval('P'.$dias.'D'));
                            $data = $date->format('Ymd');
                            $result = $db-> cadastrarHorariosDisponiveis($conn,$aux,$data,$data,$domI,$domF);
                        }
                        
                        if(!($segI == null || $segF == null || $segI == '' || $segF == '' )){

                            
                            $data = (string)$nextMonday;
                            $date = new DateTime($data);
                            $dias = $i*7;
                            $date->add(new DateInterval('P'.$dias.'D'));
                            $data = $date->format('Ymd');
                            $result = $db-> cadastrarHorariosDisponiveis($conn,$aux,$data,$data,$segI,$segF);
                        }

                        

                        if(!($terI == null || $terF == null || $terI == '' || $terF == '' )){

                            $data = (string)$nextTuesday;
                            $date = new DateTime($data);
                            $dias = $i*7;
                            $date->add(new DateInterval('P'.$dias.'D'));
                            $data = $date->format('Ymd');
                            $result = $db-> cadastrarHorariosDisponiveis($conn,$aux,$data,$data,$terI,$terF);
                        }

                        if(!($quaI == null || $quaI == null || $quaI == '' || $quaF == '' )){

                            $data = (string)$nextWednesday;
                            $date = new DateTime($data);
                            $dias = $i*7;
                            $date->add(new DateInterval('P'.$dias.'D'));
                            $data = $date->format('Ymd');
                            $result = $db-> cadastrarHorariosDisponiveis($conn,$aux,$data,$data,$quaI,$quaF);
                        }


                        if(!($quiI == null || $quiI == null || $quiI == '' || $quiF == '' )){

                            $data = (string)$nextThursday;
                            $date = new DateTime($data);
                            $dias = $i*7;
                            $date->add(new DateInterval('P'.$dias.'D'));
                            $data = $date->format('Ymd');
                            $result = $db-> cadastrarHorariosDisponiveis($conn,$aux,$data,$data,$quiI,$quiF);
                        }
                        
                        if(!($sexI == null || $sexI == null || $sexI == '' || $sexF == '' )){

                            $data = (string)$nextFriday;
                            $date = new DateTime($data);
                            $dias = $i*7;
                            $date->add(new DateInterval('P'.$dias.'D'));
                            $data = $date->format('Ymd');
                            $result = $db-> cadastrarHorariosDisponiveis($conn,$aux,$data,$data,$sexI,$sexF);
                        }

                        if(!($sabI == null || $sabI == null || $sabI == '' || $sabF == '' )){

                            $data = (string)$nextSaturday;
                            $date = new DateTime($data);
                            $dias = $i*7;
                            $date->add(new DateInterval('P'.$dias.'D'));
                            $data = $date->format('Ymd');
                            $result = $db-> cadastrarHorariosDisponiveis($conn,$aux,$data,$data,$sabI,$sabF);
                        }
                    }

                     if ($result == true) {

                            cadastrarEspacoEspecifico($categoria);

                        }else{
                            print "Erro ao cadastrar horário único";
                    } 
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



function basico($ftp, $conn,$titulo, $categoria, $bairro, $cidade, $uf, $precoHora ){

   
    $id = $_SESSION['id'];
 
    $ext = strtolower(substr($_FILES['foto1']['name'],-4));
    $ext2 = strtolower(substr($_FILES['foto2']['name'],-4));
    $ext3 = strtolower(substr($_FILES['foto3']['name'],-4));
    $ext4 = strtolower(substr($_FILES['foto4']['name'],-4));
    $ext5 = strtolower(substr($_FILES['foto5']['name'],-4));

    $ftp_pasta = '/public/clientes/locou/img/anuncio/'; // Pasta (externa)

    $temp  = $_FILES['foto1']['tmp_name'];
    if($temp == null || $temp == ''){
        $novo_nome = '';
    }else{
        $novo_nome = md5(time().$temp).$ext;
        $envio = ftp_put($ftp, $ftp_pasta.$novo_nome, $temp, FTP_BINARY);
    }

    $temp2 = $_FILES['foto2']['tmp_name'];
     if($temp2 == null || $temp2 == ''){
        $novo_nome2 = '';
    }else{
        $novo_nome2 = md5(time().$temp2).$ext;
        $envio = ftp_put($ftp, $ftp_pasta.$novo_nome2, $temp2, FTP_BINARY);
    }

    $temp3 = $_FILES['foto3']['tmp_name'];
      if($temp3 == null || $temp3 == ''){
        $novo_nome3 = '';
    }else{
        $novo_nome3 = md5(time().$temp3).$ext;
        $envio = ftp_put($ftp, $ftp_pasta.$novo_nome3, $temp3, FTP_BINARY);
    }

    $temp4  = $_FILES['foto4']['tmp_name'];
    if($temp4 == null || $temp4 == ''){
        $novo_nome4 = '';
    }else{
        $novo_nome4 = md5(time().$temp4).$ext;
        $envio = ftp_put($ftp, $ftp_pasta.$novo_nome4, $temp4, FTP_BINARY);
    }

    $temp5  = $_FILES['foto5']['tmp_name'];
    if($temp5 == null || $temp5 == ''){
        $novo_nome5 = '';
    }else{
        $novo_nome5 = md5(time().$temp5).$ext;
        $envio = ftp_put($ftp, $ftp_pasta.$novo_nome5, $temp5, FTP_BINARY);
    }

    $db = new FunctionsDB();

    $aux = $db->cadastrarAnuncioBasico($conn,$id,$titulo,$categoria,$bairro,$cidade,$uf,$precoHora, $novo_nome,$novo_nome2,$novo_nome3,$novo_nome4,$novo_nome5);

  //  ftp_close($ftp);
    return $aux;

    
    //$diretorio = "http://www.yourdev.com.br/clientes/locou/img/anuncio/";

   // move_uploaded_file($temp,$diretorio.$novo_nome);
    // http://www.yourdev.com.br/clientes/locou/img/anuncio/

}

function cadastrarEspacoEspecifico($conn,$categoria){
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

                        if($categoria == "artes"){

                            $forno = $seg->filtro3($_POST['forno-artes']);
                            $macarico = $seg->filtro3($_POST['macarico-artes']);
                            $moldes = $seg->filtro3($_POST['moldes-artes']);
                            $bancada = $seg->filtro3($_POST['bancada-artes']);
                            $armario = $seg->filtro3($_POST['armario-artes']);
                            $descricao = $seg->filtro($_POST['descricao-geral-artes']);

                            print $resp = $db-> cadastrarArtes($conn,$idAnuncio, $forno, $macarico, $moldes, $bancada, $armario, $descricao);
                            
                        }

                        if($categoria == "costura"){
                            
                            $recepcao = $seg->filtro3($_POST['recepcao']);
                            $maquina = $seg->filtro3($_POST['maquina']);
                            $mobiliario = $seg->filtro3($_POST['mobiliario']);
                            $provador = $seg->filtro3($_POST['provador']);
                            $armario = $seg->filtro3($_POST['armario']);
                            $descricao = $seg->filtro3($_POST['descricao']);

                            print $resp = $db-> cadastrarCostura($db,$idAnuncio, $recepcao, $maquina, $mobiliario, $provador, $armario, $descricao);


                        }

                        if($categoria == "fotografico"){
                            
                            $climatizado = $seg->filtro3($_POST['climatizado-fotografico']);
                            if ($climatizado == "sim") {
                                $modeloAr = $seg->filtro3($_POST['modelo-ar-fotograficoaltura-fotografic']);
                            }
                            $altura = $seg->filtro3($_POST['altura-fotografico']);
                            $wifi = $seg->filtro3($_POST['wifi-fotografico']);
                            $cozinha = $seg->filtro3($_POST['cozinha-fotografico']);
                            $banheiro = $seg->filtro3($_POST['banheiro-fotografico']);
                            $chuveiro = $seg->filtro3($_POST['chuveiro-fotografico']);
                            $camarim = $seg->filtro3($_POST['camarim-fotografico']);
                            $frigobar = $seg->filtro3($_POST['frigobar-fotografico']);
                            $agua = $seg->filtro3($_POST['agua-fotografico']);
                            $agua = $seg->filtro3($_POST['fundo-fotografico']);
                            $iluminacao = $seg->filtro3($_POST['chroma-fotografico']);
                            $descricaoAberta = $seg->filtro3($_POST['iluminacao-fotografico']);
                            //  $ = $seg->filtro3($_POST['']);
                                
                            print $resp = $db-> AnuncioFotografico($conn, $idAnuncio, $climatizado, $modeloAr, $altura, $wifi, $cozinha, $banheiro, $chuveiro, $camarim,
                            $frigobar, $agua, $fundo, $chroma, $iluminacao, $descricaoAberta);
                        }

                        if($categoria == "academia"){
                            
                            $tatame = $seg->filtro3($_POST['tatame-academia']);
                            $armario = $seg->filtro3($_POST['armarios-academia']);
                            $bosu = $seg->filtro3($_POST['bosu-academiarolo-academia']);
                            $rolo = $seg->filtro3($_POST['rolo-academia']);
                            $maca = $seg->filtro3($_POST['maca-academia']);
                            $trapezio = $seg->filtro3($_POST['trapezio-academia']);
                            $baqueta = $seg->filtro3($_POST['baqueta-academia']);
                            $pilates = $seg->filtro3($_POST['pilates-academia']);
                            $descricaoAberta = $seg->filtro3($_POST['descricao-geral-academia']);
                            
                            print $resp = $db-> cadastrarAcademia($idAnuncio, $tatame, $armarios, $bosu, $rolo, $maca, $trapezio, $baqueta, $pilates, $descricao);

                        }

                        if($categoria == "palestra"){
                            // workshop
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

                            print $resp = $db-> cadastrarPalestras($conn,$aux, $climatizado, $modeloAr, $wifi, $vigilancia, $armarios, $limpeza, $copa, $numMesa, $numCadeira, $numQuadro, $numLousa, $numTelao, $numTv, $projetor, $som, $computador, $flip, $cafe, $agua, $buffet, $buffetExtra, $descricaoEquipamento, $descricaoAberta);
                        }

                        if($categoria == "aulas"){
                            // ensaio
                            $camarim = $seg->filtro3($_POST['camarim-ensaio']);
                            $apoio = $seg->filtro3($_POST['apoio-ensaio']);
                            $barra = $seg->filtro3($_POST['barra-ensaio']);
                            $espelho = $seg->filtro3($_POST['espelho-ensaio']);
                            $descricaoAberta = $seg->filtro($_POST['descricao-aberta-ensaio']);
                            print $resp = $db-> cadastrarAulas($conn, $aux, $camarim, $apoio, $barra, $espelho, $descricaoAberta);

                        }

                        if($categoria == "produtora"){

                            $climatizado = $seg->filtro3($_POST['climatizado-fotografico']);
                            $modeloAr = $seg->filtro3($_POST['modelo-ar-fotograficoaltura-fotografic']);
                            $altura = $seg->filtro3($_POST['altura-fotografico']);
                            $wifi = $seg->filtro3($_POST['wifi-fotografico']);
                            $cozinha = $seg->filtro3($_POST['cozinha-fotografico']);
                            $banheiro = $seg->filtro3($_POST['banheiro-fotografico']);
                            $chuveiro = $seg->filtro3($_POST['chuveiro-fotografico']);
                            $camarim = $seg->filtro3($_POST['camarim-fotografico']);
                            $frigobar = $seg->filtro3($_POST['frigobar-fotografico']);
                            $agua = $seg->filtro3($_POST['agua-fotografico']);
                            $agua = $seg->filtro3($_POST['fundo-fotografico']);
                            $iluminacao = $seg->filtro3($_POST['chroma-fotografico']);
                            $descricaoAberta = $seg->filtro3($_POST['iluminacao-fotografico']);

                            print $resp = $db-> AnuncioProdutora($conn, $idAnuncio, $climatizado, $modeloAr, $altura, $wifi, $cozinha, $banheiro, $chuveiro, $camarim,
                            $frigobar, $agua, $fundo, $chroma, $iluminacao, $descricaoAberta);

                        }
}


?>