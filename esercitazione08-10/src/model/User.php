<?php
namespace App\model;



class User{
    
    private int $id;
    private string $email;
    private string $name;
    private string $password;


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
?>