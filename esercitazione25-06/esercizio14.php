<?php 
function MCD($n1,$n2){
    $r=1;
    if($n1<$n2){
        $temp=$n1;
        $n1=$n2;
        $n2=$temp;
    }
    if($n1==0 || $n2== 0){
        $r= 0;
    }
    while ($r!=0){
        $r=$n1%$n2;
        if($r!=0){
            $n2=$r;
        }
        return $r;
    }
    return $r;
}   
$n1=rand(0,200);
$n2= rand(0,200);
$ris=MCD($n1,$n2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>n1: <?= $n1 ?> <br>n2: <?= $n2 ?> <br>MCD: <?= $ris ?> </h1>
</body>
</html>