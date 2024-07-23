<?php
function isPrimo($n){
    $primo = False;
    $j=0;
    for ($i = 2; $i < $n; $i++){
        if ($n % $i == 0){
            $j++;
        }
    }  
    if($j==0){
        $primo = True;
    }
    return $primo;
}
$n=rand(1,100);
$b=isPrimo($n);
if($b==0){
    $st='False';
}else{
    $st= 'True';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?= $n ?></h1>
</body>
</html>