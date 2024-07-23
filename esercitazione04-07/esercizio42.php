<?php
function calcolaDifferenza($data1,$data2){
    return date_diff($data1,$data2);
}

$data1=date_create("2024-07-04");
$data2=date_create("2024-07-27");
$ris=calcolaDifferenza($data1,$data2);
echo('La differenza tra le due date e: '.$ris->format("%R%a giorni"));
?>