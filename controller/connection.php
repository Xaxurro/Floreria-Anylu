<?php
$dir="localhost";
$user="root";
$password="";
$db="floreria";

$con = new mysqli($dir,$user,$password,$db);

if($con->connect_error == false){
    echo "ERROR EN LA CONEXIÓN A LA BASE DE DATOS<br>".$con->connect_error;
}

?>