<?php

class Connessione {

    private const URL = 'localhost';
    private const USER = 'root';
    private const PASSW = '';
    private const DB_NAME = 'java';

    private ?PDO $conn=null;

    public function getConn(){

        if ($this->conn == null) $this->connetti();//solo se non sei già connesso, chiamo il metodo connetti

        return $this->conn;//in tutti i casi ritorno 
    }

    private function connetti(){
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname='.self::DB_NAME,self::USER,self::PASSW);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

    }

}

?>