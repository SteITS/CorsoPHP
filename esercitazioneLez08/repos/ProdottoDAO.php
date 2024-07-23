<?php
include_once "../model/Prodotto.php";
include_once "../repos/Connessione.php";

class ProdottoDAO{
    private Connessione $connessione;
    private $conn;
    public function __construct(){
        $this->connessione = new Connessione();
        $this->conn = $this->connessione->getConn();
    }

    public function addProdotto($prodotto){
        $query = "INSERT INTO prodottiphp (nome,prezzo) values (:nome,:prezzo)";
        $st = $this->conn->prepare($query);

        $st->bindParam(':nome', $prodotto->nome, PDO::PARAM_STR);
        $st->bindParam(':prezzo', $prodotto->prezzo, PDO::PARAM_STR);

        $st->execute();
        }

    public function getProdotti(){
        $query = "SELECT * FROM prodottiphp";

        $resultSet = $this->conn->query($query);

        $resultSet->setFetchMode(PDO::FETCH_CLASS, 'Prodotto');

        $prodotti = [];

        while ($prodotto = $resultSet->fetch()){
            array_push($prodotti, $prodotto);
        }
        return $prodotti;
    }

}


?>