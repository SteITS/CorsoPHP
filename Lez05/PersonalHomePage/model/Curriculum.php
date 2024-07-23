<?php

Class Curriculum{
    private $nome;
    private $cognome;

    public function __construct($nome,$cognome){
        $this->nome = $nome;
        $this->cognome = $cognome;
    }

    public function __get($name){
        return $this->$name;

    }
    public function __set($name,$value){
        $this->$name = $value;
    }
}

?>