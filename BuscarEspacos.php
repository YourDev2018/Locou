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
                    }

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
                    }
                    print_r($array);
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
                    print_r($array);
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
                    print_r($array);
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
                    print_r($array);
                    return $array;
            }       

    }
    
}


?>
