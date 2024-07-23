<?php

function random($l){
    $n = array();
    for($i=0; $i<$l; $i++){
        $n[]=rand(1,100);
    }
    return $n;
}

$n=random(rand(5,50));
echo "Numeri casuali: " .implode(", ", $n);

?>
