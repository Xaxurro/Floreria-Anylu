<?php
if($_GET){
    include("../../Model/connection.php");
    $sql = "DELETE FROM foto WHERE id_producto = '".$_GET["id"]."';";
    if($con->query($sql)){
        echo "Se elimino Correctamente<br><br>";
    } else {
        echo "No se elimino<br><br>";
    }
    $sql = "DELETE FROM producto WHERE id = '".$_GET["id"]."';";
    if($con->query($sql)){
        echo "Se elimino Correctamente<br><br>";
    } else {
        echo "No se elimino<br><br>";
    }
    $con->close();
    header("Location: ./crud.php");
}
?>