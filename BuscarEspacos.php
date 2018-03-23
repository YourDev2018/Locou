<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
require_once 'Espaco.php';
class BuscarEspacos 
{

    public function retornarEspaco($db){

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
    
}


?>
