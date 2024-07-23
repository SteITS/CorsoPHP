<?php
class Connessione{

    private const NOME_DB= "java";
    private const USER="root";
    private const PASS="";

    private $conn;

    public function getConn(){
        if(is_null($this->conn)){
            $this->connetti();
        }return $this->conn;
    }
   
    private function connetti(){
        try{
            $this->conn= new PDO("mysql:host=localhost:3306;dbname=".self::NOME_DB,self::USER,self::PASS);
        } 
    catch (PDOException $eccezione){
        echo "".$eccezione->getMessage();
    }
    
}
public function disconnetti(){
    $this->conn=null; 
}
}
?>