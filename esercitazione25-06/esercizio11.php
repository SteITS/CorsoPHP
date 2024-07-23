<?php
function sommaNum($n1,$n2){
    return $n1+$n2;
}
$sum=sommaNum(20,10);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?= $sum  ?></h1>
</body>
</html>