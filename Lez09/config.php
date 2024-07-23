<?php

error_reporting(0);

$host = "localhost:3306";
$user = "root";
$pass = "";
$db_name = "java";

$conn = mysqli_connect($host,$user,$pass,$db_name);

if ($conn){
    //echo "Sei connesso!";
}else{
    die("NON connesso" . mysqli_error($conn));
}



?>