<?php
function america($c){
    return ($c*1.8)+32;
}
$c=rand(1,100);
echo($c. "C in Farhrenait sono: ". america($c)."F");
?>