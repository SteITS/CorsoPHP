<?php

class PopolazioneRegione{
    private int $id;
    private string $comune;
    private int $femmine;
    private int $maschi;
    private string $regione;
    private int $totale;

    public function &__get($name){
        return $this->$name;
    }

    function __set($name, $value) {
        $this->$name = $value;
    }

    public function serialize(){
        return get_object_vars($this);
    }


}



?>