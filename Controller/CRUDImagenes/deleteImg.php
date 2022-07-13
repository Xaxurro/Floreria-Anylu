<?php
if($_GET){
    include("../../Model/connection.php");
    $sql = "DELETE FROM foto WHERE id_foto = '".$_GET["id_foto"]."';";
    if($con->query($sql)){
        echo "Se modifico Correctamente<br><br>";
    } else {
        echo "No se modifico<br><br>";
    }
    $con->close();
    header("Location: ./crudImg.php?id=".$_GET["id_producto"]);
}
?>