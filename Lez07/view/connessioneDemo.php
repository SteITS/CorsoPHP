<?php
include ("../model/Libro.php");
include ("../repos/Connessione.php");

$miaconn = new Connessione;

$miaconn->getConn();

$a= "prezzo";


?>