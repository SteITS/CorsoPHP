<?php

require '../vendor/autoload.php';

use model\Prodotto;
use model\CartaPokemon;

echo "hello catalin!";

$prodotto = new Prodotto("Iphone rubato",50);

echo '<pre>';
var_dump($prodotto);
echo '</pre>';

$carta = new CartaPokemon("pikachu", 50);
echo '<pre>';
var_dump($carta);
echo '</pre>';
?>