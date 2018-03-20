<?php

    class Seguranca
    {
        
        function filtro($string){
            $aux = $this->getSqlInjection($string);
            $aux = $this->getXSS($aux);
            return $aux;
        }

       private function getSqlInjection($string){
            $aux = addslashes($string);
            return $aux;
        }

       private function getXSS($string){
            $aux = htmlspecialchars($string);
            return $aux;
        }

        // ---------------------------------------------------------------------

        function filtro2($string){

             $aux = $this->getSqlInjection($string);
             $aux = $this->getXSS($aux);
             $aux = $this->letras($aux);
             return $aux;

        }

       private function letras($string){
            $aux =  preg_replace('/[^[:alpha:]_]/', '',$string);
            return $aux;
       }


    }
    

?>