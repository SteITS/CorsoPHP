<?php
class Prodotto{
    private $id;
    private $nome;
    private $prezzo;

    public function &__get($name){
        return $this->$name;
    }
    function __set($name, $value){
        $this->$name = $value;
    }
    
}

?>