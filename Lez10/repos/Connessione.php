<?php

class Connessione{

    private const DB_NAME = 'java';
    private const HOST = 'mysql:host=localhost:3306;dbname='.self::DB_NAME;
    private const USER = "root";
    private const PASS = "";

    private $conn = null;

    public function getConn(){

        if ($this->conn == null) $this->connetti();//solo se non sei già connesso, chiamo il metodo connetti

        return $this->conn;//in tutti i casi ritorno 
    }

    private function connetti(){
        try {
            $this->conn = new PDO(self::HOST,self::USER,self::PASS);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

    }


}

