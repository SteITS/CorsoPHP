<?php 

$immagini = [
    "https://static.boredpanda.com/blog/wp-content/uploads/2015/11/cute-snakes-wear-hats-120__700.jpg",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlL7BG_-VLgghcqQXsa64fsOMQYDaEHZR7SA&s",
    "https://regalol.it/wp-content/uploads/2019/04/statuetta-gesu-molleggiato-cruscotto-auto-regalol.jpg",
    "https://i.redd.it/90isj054yvs61.png",
    "https://staging.cohostcdn.org/attachment/8bd167ee-a599-4c6e-8c84-e811d91b9bf0/guilty-gear-may-dolphin.gif",
];

$counter = isset($_POST["counter"]) ? $_POST["counter"] : 0;

function incrementa() {
    global $counter, $immagini;

    if($counter == count($immagini) -1)
        $counter=0;
    else
        $counter++;
}

function decrementa() {
    global $counter,$immagini;
    if  ($counter==0)
        $counter = count($immagini) -1;
    else
        $counter--;
}

if (isset($_POST["azione"])) {
    if ($_POST["azione"]=="incrementa") incrementa();
    if ($_POST["azione"]=="decrementa") decrementa();
}

?>

<form action="?page=galleria" method="post">
    <input type="hidden" name="azione" value="decrementa">
    <input type="hidden" name="counter" value="<?=$counter?>">
    <button class="btn btn-succes">-</button>
</form>

<form action="?page=galleria" method="post">
    <input type="hidden" name="azione" value="incrementa">
    <input type="hidden" name="counter" value="<?=$counter?>">
    <button class="btn btn-succes">+</button>
</form>

<div id="result">
    <img src="<?=$immagini[$counter]?>" alt="">
    <?= $counter ?>
</div>

    