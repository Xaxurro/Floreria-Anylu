<?php
    include("../../Model/connection.php");
    if($_GET){
        $sql = "DELETE FROM visita WHERE id_visita = '".$_GET["id"]."';";
        if($con->query($sql)){
            echo "Se elimino Correctamente<br><br>";
        } else {
            echo "No se elimino<br><br>";
        }
        $con->close();
        header("Location: ./productsReserved.php");
    }
?>