<?php
    session_start();
    include("../Model/connection.php");
    include("../Model/token.php");

    function getCartID($con, $user){
        $sql = "SELECT id_carrito FROM carrito WHERE usuario = '$user';";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            return $row["id_carrito"];
        } else {
            $sql = "INSERT INTO carrito(usuario, confirmado) VALUES('$user', 0);";
            if($con->query($sql)){
                return getCartID($con, $user);
            } else {
                echo "Error al Insertar Datos";
            }
        }
    }

    if($_POST){
        $_SESSION["id_carrito"] = $id_carrito = getCartID($con, $_COOKIE["user"]);
        $id_producto = $_POST["id"];
        $cantidad = $_POST["cantidad"];

        $sql = "SELECT id_producto FROM carrito_producto WHERE id_carrito = $id_carrito;";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            if(isset($_POST['buy'])){
                header("Location: ./checkout.php");
            }else if(isset($_POST['add'])){
                header("Location: ./catalogo.php");
            }   
        }
        $sql = "INSERT INTO carrito_producto VALUES ($id_carrito, $id_producto, $cantidad);";
        if($con->query($sql)){
            echo "Se insertaron los datos correctamente";
            if(isset($_POST['buy'])){
                header("Location: ./checkout.php");
            }else if(isset($_POST['add'])){
                header("Location: ./catalogo.php");
            }
        } else {
            echo "Error al Insertar Datos";
        }
        
    }
?>