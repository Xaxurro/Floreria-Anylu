<?php
if($_GET){
    include("../connection.php");
    $sql = "DELETE FROM product WHERE id_producto = '$id';";
    if(mysqli_query($con, $sql)){
        echo "Se modifico Correctamente<br><br>";
    } else {
        echo "No se modifico<br><br>";
    }
    mysqli_close($con);
    header("Location: ".$_SERVER['HTTP_REFERER']."/crud/crud.php");
}
?>