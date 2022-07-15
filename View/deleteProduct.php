<?php 
    session_start();
    include("../Model/connection.php");
    if($_GET){
        $id = $_GET["id"];
        $sql = "DELETE FROM carrito_producto WHERE id_carrito = ".$_SESSION["id_carrito"]." AND id_producto = $id;";
        if($con->query($sql)){
            echo "Se elimino el producto.";
            header("Location: checkout.php");
        } else {
            echo "Ocurrio un error al tratar de eliminar el producto.";
        }
    }
?>