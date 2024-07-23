<?php
include "Studente.php";

$studenti = file("studenti.txt");
$registro = [];

foreach ($studenti as $rigStudente){ //per ogni riga

    $parole = explode(",", $rigStudente); //spezzo la riga

    $registro[]= new Studente($parole[0], $parole[1]); //creo oggetto studente e aggiungo un array
}

foreach ($registro as $studente) {
    echo "<h1>" .$studente. "</h1>";
}

/*
$studente1 = new Studente("Mauro","Bogliaccino");

$studente1->nome= "Bakuretsu";
$studente1->cognome="Bau";
echo $studente1;
*/
?>