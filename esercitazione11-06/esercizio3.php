<?php
$n1=rand(-100,100);

if ($n1>0){
    echo("Il numero ".$n1." è positivo");
}elseif ($n1 == 0){
    echo("Il numero ".$n1." è 0");
}elseif ($n1 < 0){
    echo("Il numero ".$n1." è negativo");
}

?>