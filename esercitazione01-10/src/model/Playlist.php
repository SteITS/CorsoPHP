<?php

namespace App\Yt\model;

class Playlist{
    private int $id;
    

    public function __construct(
        private int $user_id,
        private string $title,
        private string $cover_image
    ){

    }

    public function __get($name){
        return $this->$name;
    }

    public function __set($name, $value){
        $this->$name = $value;
    }

}