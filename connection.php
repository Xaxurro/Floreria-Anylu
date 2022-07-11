<?php
$json = file_get_contents('connection.json');
$data = json_decode($json,true);

foreach($data as $row){
    $dir=$row['dir'];
    $user=$row['user'];
    $password=$row['password'];
    $db=$row['db'];
}


$con = mysqli_connect($dir,$user,$password,$db);

if($con == false){
    echo "ERROR EN LA CONEXIÓN A LA BASE DE DATOS";
}

?>