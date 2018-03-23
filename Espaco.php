<?php

class Espaco 
{
    
    public $titulo;
    public $bairro;
    public $cidade;
    public $preco;

    public function getTitulo(){
        return $this->$titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
}


?>