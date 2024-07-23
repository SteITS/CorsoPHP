<?php

function media($l){
    $n = array();
    $media = 0;
    $n1 = 0;
    for($i=0; $i<$l; $i++){
        $n1=rand(1,100);
        echo($n1."\n");
        $n[]=$n1;
        $media += $n1; 
    }
    $media = $media/count($n);
    return $media;
}

$n=media(rand(5,50));
echo("La media è: ".$n);

?>
