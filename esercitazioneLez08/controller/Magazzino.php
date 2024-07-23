<?php
include_once("../model/Prodotto.php");
include_once("../repos/ProdottoDAO.php");

$nome = $_POST["nome"];
$prezzo = $_POST["prezzo"];

$prodotto = new Prodotto();
$prodotto->nome = $nome;
$prodotto->prezzo = $prezzo;

$dao = new ProdottoDAO();
$dao->addProdotto($prodotto);

print_r($dao->getProdotti());

?>