<?php
if($_GET){
    include("../../Model/connection.php");
    $sql = "DELETE FROM producto WHERE id = '".$_GET["id"]."';";
    if($con->query($sql)){
        echo "Se modifico Correctamente<br><br>";
    } else {
        echo "No se modifico<br><br>";
    }
    $con->close();
    header("Location: ./crud.php");
}
?>