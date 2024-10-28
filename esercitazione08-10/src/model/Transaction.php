<?php

namespace App\model;

class Transaction{
    private int $id;

    private \DateTime $date;

    private string $receipt;
    private int $user_id;
    private string $description;
    private float $amount;
    private string $category;


    public function __construct(
        
    ){

    }

    public function __get($name){
        return $this->$name;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }

}