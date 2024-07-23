<?php
session_start();
define("TITOLO","Lancia dadi");
define("IMG_PATH","./dadi/f");
define("EXT",".jpg");

$dado1 = rand(1,6);
$dado2 = rand(1,6);

$img_dado1 =IMG_PATH.$dado1.EXT;
$img_dado2 =IMG_PATH.$dado2.EXT;

$risultato = "";

if(isset($_SESSION["partite"])){ //ho gia giocato
    $_SESSION["partite"]++ ;
}else{ //non ho mai giocato
    $_SESSION["partite"] = 0; //setto var a 0
}




if($dado1 == $dado2){
    $risultato = "Hai Vinto!";
    if(isset($_SESSION["vittorie"])){
        $_SESSION["vittorie"]++ ;
    }else{
        $_SESSION["vittorie"] = 1;
    }
} else {
    $risultato = "Hai Perso!";
}
//$titolo = "Lancia dadi";

?>