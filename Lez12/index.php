<?php

//spl_autoload_register(function($class):void{
//    $file = str_replace("\\","/",$class);
//    $file = str_replace('stwfy/','',$file);
//    $file = str_replace('app','model',$file);
//    $file = './' . $file. '.php';
//    include_once($file);
//});

//include '.'
include './database/ProdottoDAO.php';
include './model/Prodotto.php';
include './controller/ProdottiCtrl.php';

use stwfy\app\Prodotto;
use stwfy\app\ProdottiCtrl;

$p1 = new Prodotto('smartphone usato', 50, 5);
$p2 = new Prodotto('smartphone rubato', 20, 2);
$p3 = new Prodotto('smartphone rotto', 5, 3);

$dao = new ProdottoDAO();

$ctrl = new ProdottiCtrl();

$ctrl->addProdotto($p1);
$ctrl->addProdotto($p2);
$ctrl->addProdotto($p3);

foreach ($ctrl -> getProdotti() as $prodotto) {
    echo $prodotto->nome . '<br>';
    $dao->addProdotto($prodotto);
}

//echo '<pre>';
//var_dump($p);
//echo '</pre>';
?>