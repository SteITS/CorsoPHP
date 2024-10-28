<?php
namespace App\Model;

class Product{
    private int $id;
    private int $userId;
    private int $categoryId;
    private string $name;
    private string $description;
    private float $price;
    private string $image;

    public function __construct(){


    }

    public function __get($name): mixed{
        return $this->$name;
    }

    public function __set($name,$value){
         $this->$name=$value;
    }

}