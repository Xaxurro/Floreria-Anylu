<?php
    session_start();
    include("../Model/connection.php");
    include("../Model/token.php");

    if($_POST){
        
        $id_producto = $_POST["id"];
        $cantidad = $_POST["cantidad"];

        $sql = "SELECT id_producto FROM carrito_producto WHERE id_carrito = ".$_SESSION["id_carrito"].";";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            if(isset($_POST['buy'])){
                header("Location: ./checkout.php");
            }else if(isset($_POST['add'])){
                header("Location: ./catalogo.php");
            }   
        }
        $sql = "INSERT INTO carrito_producto VALUES (".$_SESSION["id_carrito"].", $id_producto, $cantidad);";
        if($con->query($sql)){
            echo "Se insertaron los datos correctamente";
            if(isset($_POST['buy'])){
                header("Location: ./checkout.php");
            }else if(isset($_POST['add'])){
                header("Location: ./catalogo.php#productos");
            }
        } else {
            echo "Error al Insertar Datos";
        }
        
    }
?>