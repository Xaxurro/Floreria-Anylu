<?php
if($_GET){
    include("../controller/connection.php");
    $sql = "DELETE FROM product WHERE id_producto = '".$_GET["id"]."';";
    if(mysqli_query($con, $sql)){
        echo "Se modifico Correctamente<br><br>";
    } else {
        echo "No se modifico<br><br>";
    }
    mysqli_close($con);
    header("Location: ".$_SERVER['HTTP_REFERER']."/crud/crud.php");
}
?>