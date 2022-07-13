<?php
if($_POST){
    include("../../Model/connection.php");

    $id_producto = $_POST["id_producto"];
    $foto = addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));

    if(isset($_POST["id_foto"])){
        $sql = "UPDATE foto SET foto = '$foto' WHERE id_foto = '".$_POST["id_foto"]."';";
    } else {
        $sql = "INSERT INTO foto (id_producto, foto) VALUES ($id_producto, '$foto');";
    }

    if($con->query($sql)){
        echo "Se modifico Correctamente<br><br>";
    } else {
        echo "No se modifico<br><br>";
    }
    $con->close();
    header("Location: ./crudImg.php?id=$id_producto");
}
?>