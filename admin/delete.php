<?php
if($_GET){
    include("../controller/connection.php");
    $sql = "DELETE FROM product WHERE id_producto = '".$_GET["id"]."';";
    if($con->query($sql)){
        echo "Se modifico Correctamente<br><br>";
    } else {
        echo "No se modifico<br><br>";
    }
    $con->close();
    header("Location: ./crud.php");
}
?>