<?php
    include("../../Model/connection.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/main.css" rel="stylesheet">
    <title>Floreria Anylu</title>
</head>
<body>
    <header>
        <div id="header">
            <div id="logo">
            <a href="../Placeholder/indexAdmin.php"><img class="logo" src="../../src/logo.png" alt="Logo" width="120px"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="../Placeholder/indexAdmin.php">Inicio</a></li>
                    <li><a href="../CRUD/crud.php">Gestionar Productos</a></li>
                    <li><a href="../CRUDVisitas/visits.php">Visitas Agendadas</a></li>
                    <li><a href="../CRUDVisitas/productsReserved.php">Productos Reservados</a></li>
                    <li><a href="../../View/index.php"><b><i>Cerrar sesion</i></b></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <br><br><br>