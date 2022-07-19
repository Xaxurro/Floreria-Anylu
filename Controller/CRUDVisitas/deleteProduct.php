<?php
    include("../../Model/connection.php");
    if($_GET){
        $sql = "DELETE FROM retiro WHERE id_retiro = '".$_GET["id"]."';";
        if($con->query($sql)){
            echo "Se elimino Correctamente<br><br>";
        } else {
            echo "No se elimino<br><br>";
        }
        $con->close();
        header("Location: ./productsReserved.php");
    }
?>