<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once 'Espaco.php';
class BuscarEspacos 
{

    public function retornarEspacoMaisVistos($db){

            $result =  $db->query("SELECT * FROM AnuncioBasico ORDER BY contadorVisualizacoes DESC LIMIT 4 ") ;
            $cont = mysqli_num_rows($result);
        
            if ($cont <=0) {
                print "Select buscar espaço Erro";
            }else{
                    $array = [];
                    $cont=0;
                    while ($row=$result->fetch_assoc()) {


                        $array[$cont] = $row['idAnuncio'];
                        $cont++;

                        $array[$cont] = trim($row['fotoUm']);
                        $cont++;

                        $array[$cont] = $row['titulo'];
                        $cont++;
                        $array[$cont] = $row['bairro'];
                        $cont++;
                        $array[$cont] = $row['cidade'];
                        $cont++;
                        $array[$cont] = $row['preco'];
                        $cont++;

                        $array[$cont] = $row['uf'];
                        $cont++;

                        $array[$cont] = $row['categoria'];
                        $cont++;
                    }
                   // print_r($array);
                    return $array;
            }       

    }

    public function retornarAnuncioBasicoId($db,$idAnuncio){

        $result =  $db->query("SELECT * FROM AnuncioBasico WHERE idAnuncio = '$idAnuncio' ") ;
            $cont = mysqli_num_rows($result);
        
            if ($cont <=0) {
                print "Select buscar espaço Erro";
            }else{
                    $array = [];
                    $cont=0;
                    while ($row=$result->fetch_assoc()) {
                        $array[$cont] = $row['idAnuncio'];  // 0
                        $cont++;

                        $array[$cont] = trim($row['fotoUm']); // 1
                        $cont++;

                         $array[$cont] = trim($row['fotoDois']); // 2
                        $cont++; 

                         $array[$cont] = trim($row['fotoTres']); // 3
                        $cont++;



                        $array[$cont] = $row['titulo']; // 4
                        $cont++;
                        $array[$cont] = $row['bairro']; // 5
                        $cont++;
                        $array[$cont] = $row['cidade']; // 6
                        $cont++;
                        $array[$cont] = $row['preco']; // 7
                        $cont++;

                        $array[$cont] = $row['uf'];  // 8
                        $cont++;

                        $array[$cont] = $row['categoria']; // 9
                        $cont++; 
                        
                        $array[$cont] = $row['rua']; // 10
                        $cont++;

                        $array[$cont] = $row['numero']; // 11
                        $cont++;



                    }
                    // print_r($array);
                    return $array;
            }  
    }

    public function retornarEspacoConsultorio($db){

            $result =  $db->query("SELECT * FROM AnuncioBasico WHERE categoria = 'consultorio' ORDER BY idAnuncio DESC LIMIT 1  ") ;
            $cont = mysqli_num_rows($result);
        
            if ($cont <=0) {
                print "Select buscar espaço Erro";
            }else{
                    $array = [];
                    $cont=0;
                    while ($row=$result->fetch_assoc()) {

                        $array[$cont] = $row['idAnuncio'];
                        $cont++;

                        $array[$cont] = $row['fotoUm'];
                        $cont++;

                        $array[$cont] = $row['titulo'];
                        $cont++;
                        $array[$cont] = $row['bairro'];
                        $cont++;
                        $array[$cont] = $row['cidade'];
                        $cont++;
                        $array[$cont] = $row['preco'];
                        $cont++;

                        $array[$cont] = $row['uf'];
                        $cont++;

                        $array[$cont] = $row['categoria'];
                        $cont++;
                    }
                    // print_r($array);
                    return $array;
            }       

    }

    public function retornarEspacoCozinha($db){

             $result =  $db->query("SELECT * FROM AnuncioBasico WHERE categoria = 'cozinha' ORDER BY idAnuncio DESC LIMIT 1  ") ;
            $cont = mysqli_num_rows($result);
        
            if ($cont <=0) {
                print "Select buscar espaço Erro";
            }else{
                    $array = [];
                    $cont=0;
                    while ($row=$result->fetch_assoc()) {
                        $array[$cont] = $row['idAnuncio'];
                        $cont++;

                         $array[$cont] = $row['fotoUm'];
                        $cont++;

                        $array[$cont] = $row['titulo'];
                        $cont++;
                        
                        $array[$cont] = $row['bairro'];
                        $cont++;
                        $array[$cont] = $row['cidade'];
                        $cont++;
                        $array[$cont] = $row['preco'];
                        $cont++;
                    }
                   
                    return $array;
            }       

    }

    public function retornarEspacoWorkShop($db){

             $result =  $db->query("SELECT * FROM AnuncioBasico WHERE categoria = 'workshop' ORDER BY idAnuncio DESC LIMIT 1  ") ;
            $cont = mysqli_num_rows($result);
        
            if ($cont <=0) {
                print "Select buscar espaço Erro";
            }else{
                    $array = [];
                    $cont=0;
                    while ($row=$result->fetch_assoc()) {
                        $array[$cont] = $row['idAnuncio'];
                        $cont++;

                         $array[$cont] = $row['fotoUm'];
                        $cont++;

                        $array[$cont] = $row['titulo'];
                        $cont++;
                        $array[$cont] = $row['bairro'];
                        $cont++;
                        $array[$cont] = $row['cidade'];
                        $cont++;
                        $array[$cont] = $row['preco'];
                        $cont++;
                    }
                    
                    return $array;
            }        

    }


    public function retornarEspacoEnsaio($db){

             $result =  $db->query("SELECT * FROM AnuncioBasico WHERE categoria = 'ensaio' ORDER BY idAnuncio DESC LIMIT 1  ") ;
            $cont = mysqli_num_rows($result);
        
            if ($cont <=0) {
                print "Select buscar espaço Erro";
            }else{
                    $array = [];
                    $cont=0;
                    while ($row=$result->fetch_assoc()) {
                        $array[$cont] = $row['idAnuncio'];
                        $cont++;

                         $array[$cont] = $row['fotoUm'];
                        $cont++;

                        $array[$cont] = $row['titulo'];
                        $cont++;
                        $array[$cont] = $row['bairro'];
                        $cont++;
                        $array[$cont] = $row['cidade'];
                        $cont++;
                        $array[$cont] = $row['preco'];
                        $cont++;
                    }
                    
                    return $array;
            }       

    }

    public function retornarDescGeral($db,$idAnuncio){

        $result =  $db->query("SELECT * FROM AnuncioDescricaoGeral WHERE idAnuncio = '$idAnuncio' ") ;
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0 || $cont >1) {
            print "Select buscar espaço Erro";
        }else{
            
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
                $array[$cont] = $row['metragem']; //0
                $cont++;

                $array[$cont] = $row['recepcao'];//1
                $cont++;

                $array[$cont] = $row['banheiroPrivativo'];//2
                $cont++;
                $array[$cont] = $row['banheiro'];//3
                $cont++;
                $array[$cont] = $row['casaOuPredio'];//4
                $cont++;
                $array[$cont] = $row['elevador'];//5
                $cont++;

                $array[$cont] = $row['estacionamento'];//6
                $cont++;

                $array[$cont] = $row['proprioOuRotativo'];//7
                $cont++;

                $array[$cont] = trim($row['transporte']);//8
                $cont++;

                $array[$cont] = trim($row['fotoPanoramicaUm']);//9
                $cont++;

                $array[$cont] = trim($row['fotoPanoramicaDois']);//10
                $cont++;

                 $array[$cont] = trim($row['quatroHora']);//11
                $cont++;

                 $array[$cont] = trim($row['cincoHora']);//12
                $cont++;

                 $array[$cont] = trim($row['turno']);//13
                $cont++;

                 $array[$cont] = trim($row['semana']);//14
                $cont++;

                 $array[$cont] = trim($row['mes']);//15
                $cont++;

            }
                // print_r($array);
            return $array;        
        }

    }




    public function retornarConsultorioDetalhado($db, $idAnuncio){

        $result =  $db->query("SELECT * FROM AnuncioConsultorio WHERE idAnuncio = '$idAnuncio' ") ;
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
            print "Não é um consultório";
        }else{
            
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {


                
                $array[$cont] = $row['numMesa'];
                $cont++;

                $array[$cont] = $row['numCadeira'];
                $cont++;

                $array[$cont] = $row['numLuminaria'];
                $cont++;

                $array[$cont] = $row['climatizado'];
                $cont++;

                $array[$cont] = $row['modeloAr'];
                $cont++;

                $array[$cont] = $row['wifi'];
                $cont++;

                $array[$cont] = $row['monitoramento'];
                $cont++;
                $array[$cont] = $row['armarios'];
                $cont++;
                $array[$cont] = $row['secretaria'];
                $cont++;
                $array[$cont] = $row['limpeza'];
                $cont++;

                $array[$cont] = $row['copa'];
                $cont++;


                $array[$cont] = $row['nunMacas'];
                $cont++;

                $array[$cont] = $row['balanca'];
                $cont++;

                $array[$cont] = $row['cafe'];
                $cont++;
                
                $array[$cont] = $row['agua'];
                $cont++;

                $array[$cont] = $row['tv'];
                $cont++;

                $array[$cont] = $row['descricao'];
                $cont++;

             

            }
                // print_r($array);
            return $array;        
        }

    }

     public function retornarCozinhaDetalhado($db, $idAnuncio){

        $result =  $db->query("SELECT * FROM AnuncioCozinha WHERE idAnuncio = '$idAnuncio' ") ;
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
            print "Não é uma cozinha";
        }else{
            
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
            

                $array[$cont] = $row['numMesa'];
                $cont++;
                $array[$cont] = $row['numCadeira'];
                $cont++;

                $array[$cont] = $row['climatizado'];
                $cont++;

                $array[$cont] = $row['modeloAr'];
                $cont++;

                $array[$cont] = $row['areaEvento'];
                $cont++;

                

                $array[$cont] = $row['bar'];
                $cont++;
                $array[$cont] = $row['buffet'];
                $cont++;

                $array[$cont] = $row['aula'];
                $cont++;

                $array[$cont] = $row['wifi'];
                $cont++;

                $array[$cont] = $row['monitoramento'];
                $cont++;

                $array[$cont] = $row['armario'];
                $cont++;

                $array[$cont] = $row['chave'];
                $cont++;

                $array[$cont] = $row['estante'];
                $cont++;

                $array[$cont] = $row['faxina'];
                $cont++;
                
                $array[$cont] = $row['inventario'];
                $cont++;

                $array[$cont] = $row['freezer'];
                $cont++;

                 $array[$cont] = $row['geladeira'];
                $cont++;

                 $array[$cont] = $row['fogao'];
                $cont++;

                 $array[$cont] = $row['forno'];
                $cont++;

                 $array[$cont] = $row['fornoTipo'];
                $cont++;
                 $array[$cont] = $row['tipoFogao'];
                $cont++;
                 $array[$cont] = $row['descricaoExaustor'];
                $cont++;

                $array[$cont] = $row['descricaoAberta'];
                $cont++;



             

            }
                // print_r($array);
            return $array;        
        }

    }

    public function retornarWorkShopDetalhado($db, $idAnuncio){
        $result =  $db->query("SELECT * FROM AnuncioCozinha WHERE idAnuncio = '$idAnuncio' ") ;
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
            print "Não é uma cozinha";
        }else{
            
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
            

                $array[$cont] = $row['numMesa'];
                $cont++;
                $array[$cont] = $row['numCadeira'];
                $cont++;

                 $array[$cont] = $row['numQuadro'];
                $cont++;

                 $array[$cont] = $row['numLousa'];
                $cont++;

                 $array[$cont] = $row['numTelao'];
                $cont++;

                $array[$cont] = $row['numTv'];
                $cont++;

               
                $array[$cont] = $row['climatizado'];
                $cont++;

                $array[$cont] = $row['modeloAr'];
                $cont++;


                $array[$cont] = $row['wifi'];
                $cont++;

                $array[$cont] = $row['vigilancia'];
                $cont++;

                $array[$cont] = $row['armarios'];
                $cont++;

                $array[$cont] = $row['limpeza'];
                $cont++;
                
                $array[$cont] = $row['copa'];
                $cont++;
               
                $array[$cont] = $row['projetor'];
                $cont++;
           
                $array[$cont] = $row['som'];
                $cont++;
           
                $array[$cont] = $row['computador'];
                $cont++;
             
                $array[$cont] = $row['flip'];
                $cont++;
          
                $array[$cont] = $row['cafe'];
                $cont++;
         
                $array[$cont] = $row['agua'];
                $cont++;

                $array[$cont] = $row['buffet'];
                $cont++;

                 $array[$cont] = $row['buffetExtra'];
                $cont++;

                 $array[$cont] = $row['descricaoEquipamento'];
                $cont++;

                 $array[$cont] = $row['descricaoAberta'];
                $cont++;

            }
                // print_r($array);
            return $array;        
        }

    }

    public function retornarAnuncioAcademiaDetalhado($db, $idAnuncio){

        $result =  $db->query("SELECT * FROM AnuncioAcademia WHERE idAnuncio = '$idAnuncio' ") ;
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
            print "Não é uma Academia";
        }else{
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
                
                $array[$cont] = $row['tatame'];
                $cont++;
                
                $array[$cont] = $row['armarios'];
                $cont++;
                
                $array[$cont] = $row['bosu'];
                $cont++;
                
                $array[$cont] = $row['rolo'];
                $cont++;

                $array[$cont] = $row['maca'];
                $cont++;

                $array[$cont] = $row['trapezio'];
                $cont++;

                $array[$cont] = $row['baqueta'];
                $cont++;

                $array[$cont] = $row['pilates'];
                $cont++;
                
                $array[$cont] = $row['descricao'];
            }
           
        }

        return $array;

    }

     public function retornarAnuncioArtesDetalhado($db, $idAnuncio){

        $result =  $db->query("SELECT * FROM AnuncioArtes WHERE idAnuncio = '$idAnuncio' ") ;
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
            print "Não é uma Academia";
        }else{
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
            
                $array[$cont] = $row['forno'];
                $cont++;
                
                $array[$cont] = $row['macarico'];
                $cont++;
                
                $array[$cont] = $row['moldes'];
                $cont++;
                
                $array[$cont] = $row['bancada'];
                $cont++;

                $array[$cont] = $row['armario'];
                $cont++;

                $array[$cont] = $row['descricao'];
            }
        }

        return $array;

    }

     public function retornarAnuncioAulasDetalhado($db, $idAnuncio){

        $result =  $db->query("SELECT * FROM AnuncioCostura WHERE idAnuncio = '$idAnuncio' ") ;
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
            print "Não é uma Aula";
        }else{
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
                
                $array[$cont] = $row['camarim'];
                $cont++;
                
                $array[$cont] = $row['apoio'];
                $cont++;
                
                $array[$cont] = $row['barra'];
                $cont++;
                
                $array[$cont] = $row['espelho'];
                $cont++;

                $array[$cont] = $row['descricaoAberta'];
            }
         
        }

        return $array;

    }

    public function retornarAnuncioCosturaDetalhado($db, $idAnuncio){

        $result =  $db->query("SELECT * FROM AnuncioAulas WHERE idAnuncio = '$idAnuncio' ") ;
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
            print "Não é uma Aula";
        }else{
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
            
                $array[$cont] = $row['recepcao'];
                $cont++;
                
                $array[$cont] = $row['maquina'];
                $cont++;
                
                $array[$cont] = $row['mobiliario'];
                $cont++;
                
                $array[$cont] = $row['provador'];
                $cont++;

                $array[$cont] = $row['armario'];
                $cont++;

                $array[$cont] = $row['descricao'];
            }
         
        }

        return $array;

    }

    public function retornarAnuncioEnsaioDetalhado($db, $idAnuncio){

        $result =  $db->query("SELECT * FROM AnuncioEnsaio WHERE idAnuncio = '$idAnuncio' ") ;
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
            print "Não é uma Aula";
        }else{
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
            
                $array[$cont] = $row['camarim'];
                $cont++;
                
                $array[$cont] = $row['apoio'];
                $cont++;
                
                $array[$cont] = $row['barra'];
                $cont++;
                
                $array[$cont] = $row['espelho'];
                $cont++;

                $array[$cont] = $row['descricaoAberta'];
            }
            
         
        }

        return $array;

    }

    public function retornarAnuncioFotograficoDetalhado($db, $idAnuncio){

        $result =  $db->query("SELECT * FROM AnuncioEnsaio WHERE idAnuncio = '$idAnuncio' ") ;
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
            print "Não é uma Aula";
        }else{
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
            
                $array[$cont] = $row['climatizado'];
                $cont++;
                
                $array[$cont] = $row['modeloAr'];
                $cont++;
                
                $array[$cont] = $row['altura'];
                $cont++;
                
                $array[$cont] = $row['wifi'];
                $cont++;

                $array[$cont] = $row['cozinha'];
                $cont++;

                $array[$cont] = $row['banheiro'];
                $cont++;
                
                $array[$cont] = $row['chuveiro'];
                $cont++;
                
                $array[$cont] = $row['camarim'];
                $cont++;

                $array[$cont] = $row['frigobar'];
                $cont++;

                $array[$cont] = $row['agua'];
                $cont++;

                $array[$cont] = $row['fundo'];
                $cont++;

                $array[$cont] = $row['chroma'];
                $cont++;


                $array[$cont] = $row['iluminacao'];
                $cont++;

                $array[$cont] = $row['descricaoAberta'];
            }      
        }

        return $array;  

    }

    public function retornarAnuncioPalestraDetalhado($db, $idAnuncio){

        $result =  $db->query("SELECT * FROM AnuncioPalestra WHERE idAnuncio = '$idAnuncio' ") ;
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
            print "Não é uma Aula";
        }else{
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
            
                $array[$cont] = $row['numMesa'];
                $cont++;
                $array[$cont] = $row['numCadeira'];
                $cont++;

                 $array[$cont] = $row['numQuadro'];
                $cont++;

                 $array[$cont] = $row['numLousa'];
                $cont++;

                 $array[$cont] = $row['numTelao'];
                $cont++;

                $array[$cont] = $row['numTv'];
                $cont++;

               
                $array[$cont] = $row['climatizado'];
                $cont++;

                $array[$cont] = $row['modeloAr'];
                $cont++;


                $array[$cont] = $row['wifi'];
                $cont++;

                $array[$cont] = $row['vigilancia'];
                $cont++;

                $array[$cont] = $row['armarios'];
                $cont++;

                $array[$cont] = $row['limpeza'];
                $cont++;
                
                $array[$cont] = $row['copa'];
                $cont++;
               
                $array[$cont] = $row['projetor'];
                $cont++;
           
                $array[$cont] = $row['som'];
                $cont++;
           
                $array[$cont] = $row['computador'];
                $cont++;
             
                $array[$cont] = $row['flip'];
                $cont++;
          
                $array[$cont] = $row['cafe'];
                $cont++;
         
                $array[$cont] = $row['agua'];
                $cont++;

                $array[$cont] = $row['buffet'];
                $cont++;

                 $array[$cont] = $row['buffetExtra'];
                $cont++;

                 $array[$cont] = $row['descricaoEquipamento'];
                $cont++;

                 $array[$cont] = $row['descricaoAberta'];
                $cont++;
            
            }   
        }

          return $array;  

    }

    public function retornarAnuncioProdutoraDetalhado($db, $idAnuncio){

         $result =  $db->query("SELECT * FROM AnuncioProdutora WHERE idAnuncio = '$idAnuncio' ") ;
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
            print "Não é uma Aula";
        }else{

             while ($row=$result->fetch_assoc()) {

                $array[$cont] = $row['climatizado'];
                $cont++;

                $array[$cont] = $row['modeloAr'];
                $cont++;

                $array[$cont] = $row['altura'];
                $cont++;

                $array[$cont] = $row['wifi'];
                $cont++;

                

                  $array[$cont] = $row['cozinha'];
                $cont++;

                  $array[$cont] = $row['banheiro'];
                $cont++;

                  $array[$cont] = $row['chuveiro'];
                $cont++;

                  $array[$cont] = $row['camarim'];
                $cont++;

                  $array[$cont] = $row['frigobar'];
                $cont++;

                  $array[$cont] = $row['agua'];
                $cont++;

                  $array[$cont] = $row['fundo'];
                $cont++;

                  $array[$cont] = $row['chroma'];
                $cont++;

                  $array[$cont] = $row['iluminacao'];
                $cont++;

                  $array[$cont] = $row['descricaoAberta'];
               

             }

        }
        
    }

    public function addContador($db, $idAnuncio){
        
        $result =  $db->query("SELECT contadorVisualizacoes FROM AnuncioBasico WHERE idAnuncio = '$idAnuncio' ") ;
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0 ) {
            print "Não é um consultório";
        }else{
            
            $aux;
            $cont=0;
            while ($row=$result->fetch_assoc()) {
                $aux = $row['contadorVisualizacoes'];
                
            }
            
            $aux = $aux  +1;
            $result =  $db->query("UPDATE AnuncioBasico SET contadorVisualizacoes = '$aux' WHERE idAnuncio = '$idAnuncio' ") ;
            

            return $aux;        
        }

    }

    public function buscarEspacoBairro($db, $busca){

        $result =  $db->query("SELECT idAnuncio,titulo,bairro,cidade,preco,fotoUm FROM AnuncioBasico WHERE titulo LIKE '%{$busca}%' OR  bairro LIKE '%{$busca}%' OR cidade LIKE '%{$busca}%' ORDER BY idAnuncio DESC ") ; //
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
         //    print "erro buscar espaço bairro";
        }else{
            
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
                        
                        $array[$cont] = $row['idAnuncio'];
                        $cont++;

                        $array[$cont] = $row['fotoUm'];
                        $cont++;

                        $array[$cont] = $row['titulo'];
                        $cont++;

                        $array[$cont] = $row['bairro'];
                        $cont++;

                        $array[$cont] = $row['cidade'];
                        $cont++;

                        $array[$cont] = $row['preco'];
                        $cont++;
                       
            }
                // print_r($array);
            return $array;        
        }


    }

    public function buscarEspacoBairroTipo($db, $tipo, $busca){

        $result =  $db->query(" SELECT *
                                FROM AnuncioBasico 
                                WHERE ( titulo LIKE '%{$busca}%' OR  bairro LIKE '%{$busca}%' OR cidade LIKE '%{$busca}%' ) 
                                AND categoria LIKE '$tipo' ORDER BY idAnuncio DESC ") ; // OR titulo = '$busca' OR cidade = '$busca' 

        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
        //    print "erro buscar espaço Bairro Tipo";
        }else{
            
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
                        
                        $array[$cont] = $row['idAnuncio'];
                       // print " ".$array[$cont];
                        $cont++;

                        $array[$cont] = $row['fotoUm'];
                        $cont++;

                        $array[$cont] = $row['titulo'];
                        $cont++;
                        $array[$cont] = $row['bairro'];
                        $cont++;
                        $array[$cont] = $row['cidade'];
                        $cont++;
                        $array[$cont] = $row['preco'];
                        $cont++;
                

            }
                // print_r($array);
            return $array;        
        }


    }

    public function buscarEspacoParecido($db, $tipo ){

        $result =  $db->query(" SELECT *
                                FROM AnuncioBasico 
                                WHERE categoria LIKE '$tipo' ORDER BY idAnuncio DESC LIMIT 4  ") ; // OR titulo = '$busca' OR cidade = '$busca' 
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
            print "erro buscar espaço Bairro Tipo";
        }else{
            
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
                        
                        $array[$cont] = $row['idAnuncio'];
                      //  print " ".$array[$cont];
                        $cont++;

                        $array[$cont] = $row['fotoUm'];
                        $cont++;

                        $array[$cont] = $row['titulo'];
                        $cont++;
                        $array[$cont] = $row['bairro'];
                        $cont++;
                        $array[$cont] = $row['cidade'];
                        $cont++;
                        $array[$cont] = $row['preco'];
                        $cont++;
                

            }
                // print_r($array);
            return $array;        
        }


    }

    public function retornarDiasCadastrados($db, $id){

      $result =  $db->query(" SELECT dataEntrada
                                FROM RegistroAnunciosDisponiveis 
                                WHERE idAnuncio = '$id' ") ; // OR titulo = '$busca' OR cidade = '$busca' 
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
          //  print "erro buscar espaço Bairro Tipo";
        }else{
            
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
                        
                        $array[$cont] = $row['dataEntrada'];
                        $cont++;         

            }
                // print_r($array);
            return $array;        
        }

    }

    public function retornarDiasNaoDisponiveis($db, $id){



    }
    
}


?>
