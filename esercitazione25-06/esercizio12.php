<?php
function fattoriale($n){
    $r=1;
    for($i = 1;$i<=$n;$i++){
        $r=$r*$i;
    }
    return $r;
}
$num=rand(2,12);
$r=fattoriale($num);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>fattoriale = <?=$r  ?> <br> num = <?=$num?></h1>
</body>
</html>