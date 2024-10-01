<?php

namespace model;

class CartaPokemon{

    public function __construct(
        private string $nome,
        private float $prezzo
    )
    {}

    function __tostring() : string {
        return $this->nome . ' '.$this->prezzo;
    }

}

?>