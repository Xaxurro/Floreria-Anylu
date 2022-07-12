<?php
$dir="localhost";
$user="root";
$password="";
$db="floreria";

$con = mysqli_connect($dir,$user,$password,$db);

if($con == false){
    echo "ERROR EN LA CONEXIÓN A LA BASE DE DATOS";
}

?>