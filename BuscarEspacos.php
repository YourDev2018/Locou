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
                        $array[$cont] = $row['idAnuncio'];
                        $cont++;

                        $array[$cont] = trim($row['fotoUm']);
                        $cont++;

                         $array[$cont] = trim($row['fotoDois']);
                        $cont++;

                         $array[$cont] = trim($row['fotoTres']);
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
                $array[$cont] = $row['metragem'];
                $cont++;

                $array[$cont] = $row['recepcao'];
                $cont++;

                $array[$cont] = $row['banheiroPrivativo'];
                $cont++;
                $array[$cont] = $row['banheiro'];
                $cont++;
                $array[$cont] = $row['casaOuPredio'];
                $cont++;
                $array[$cont] = $row['elevador'];
                $cont++;

                $array[$cont] = $row['estacionamento'];
                $cont++;

                $array[$cont] = $row['proprioOuRotativo'];
                $cont++;

                $array[$cont] = trim($row['transporte']);
                


            }
                // print_r($array);
            return $array;        
        }

    }

    public function retornarConsultorioDetalhado($db){

        $result =  $db->query("SELECT * FROM AnuncioConsultorio WHERE idAnuncio = '$idAnuncio' ") ;
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
            print "Não é um consultório";
        }else{
            
            $array = [];
            $cont=0;
            while ($row=$result->fetch_assoc()) {
                $array[$cont] = $row['climatizado'];
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

                $array[$cont] = $row['proprioOuRotativo'];
                $cont++;

                $array[$cont] = $row['transporte'];
                

            }
                // print_r($array);
            return $array;        
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

        $result =  $db->query("SELECT idAnuncio,titulo,bairro,cidade,preco,fotoUm FROM AnuncioBasico WHERE bairro = '$busca' OR titulo = '$busca' OR cidade = '$busca' ") ; //
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
             print "erro buscar espaço bairro";
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

        $result =  $db->query("SELECT idAnuncio,titulo,bairro,cidade,preco,fotoUm FROM AnuncioBasico WHERE categoria ='$tipo' AND bairro = '$busca' OR titulo = '$busca' OR cidade = '$busca' ") ; // OR titulo = '$busca' OR cidade = '$busca' 
        $cont = mysqli_num_rows($result);
    
        if ($cont <=0) {
            print "erro buscar espaço Bairro Tipo";
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
                

            }
                // print_r($array);
            return $array;        
        }


    }
    
}


?>
