<?php

class PopolazioneEta{
    private int $eta;
    private int $femmine;
    private int $maschi;
    private int $totale;

    public function &__get($name){
        return $this->$name;
    }

    function __set($name, $value) {
        $this->$name = $value;
    }

}


?>