<?php
class Studente{
    public $nome;

    private $cognome;

    public function __construct($nome, $cognome){
        $this->nome = $nome;
        $this->cognome = $cognome;
    }

    public function __get($variable){
        return $this->$variable;
    }

    public function __set($variable, $value){
        $this->$variable = $value;
    }
    public function __tostring(){
        return $this->nome." ".strtoupper($this->cognome);
    }
}
?>