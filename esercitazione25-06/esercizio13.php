<?php
function contaVocali($s){
    $c=0;
    $st= str_split($s);
    foreach ($st as $k) {
        if ($k=="a" || $k== "e" || $k== "i" || $k== "o" || $k== "u") {
            $c=$c+1;
        }
    }
    return $c;
}

$s="lorem ipsum lorem ipsum";
$v=contaVocali($s);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Frase: <?= $s ?>  <br>Numero Vocali: <?= $v ?></h1>
</body>
</html>