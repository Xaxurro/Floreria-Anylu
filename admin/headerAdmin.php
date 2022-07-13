<?php
include("../controller/connection.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/main.css" rel="stylesheet">
    <title>Floreria Anylu</title>
</head>
<body>
    <header>
        <div id="header">
            <div id="logo">

            <a href="indexAdmin.php"><img class="logo" src="../src/logo.png" alt="Logo" width="120cm"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="./indexAdmin.php">Inicio</a></li>
                    <li><a href="./crud.php">Gestionar Productos</a></li>
                    <li><a href="./visits.php">Visitas Agendadas</a></li>
                    <li><a href="../index.php"><b><i>Cerrar sesion</i></b></a></li>
                    
                </ul>
            </nav>
        </div>
    </header>