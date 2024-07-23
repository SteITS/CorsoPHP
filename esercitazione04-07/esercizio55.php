<?php
function conta_parole($st) {
    $parole=explode(' ',$st);
    return count($parole);
}

$st = "Brab Brub Brib Brob";
echo "n di parole nella frase: ". $st. '; sono: ' . conta_parole($st);
?>