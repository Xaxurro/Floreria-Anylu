<?php
    include("connection.php");
    if($_POST){
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"];
        $opcion = $_POST["opcion"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Base de Datos</title>
</head>
<body>
    <form action="crud.php" method="post">
        <label for="id">Id: </label>
        <input type="text" name="id" id="id" placeholder="Id"><br><br>
        
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre"><br><br>
        
        <label for="descripcion">Descripcion: </label>
        <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion"><br><br>
        
        <label for="stock">Stock: </label>
        <input type="text" name="stock" id="stock" placeholder="Stock"><br><br>
        
        <label for="precio">Precio: </label>
        <input type="text" name="precio" id="precio" placeholder="Precio"><br><br>

        <button type="submit" name="opcion" value="A">Añadir</button>
        <button type="submit" name="opcion" value="M">Modificar</button>
        <button type="submit" name="opcion" value="E">Eliminar</button>
    </form><br><br><br>

    
    <?php
    if($_POST){
        switch($opcion){
            case "A":
                $sql = "INSERT INTO product (nombre_producto, descripcion_producto, stock_producto, precio_producto, estado) VALUES ('$nombre', '$descripcion', $stock, $precio, 1);";
                if(mysqli_query($con, $sql)){
                    echo "Se inserto Correctamente<br><br>";
                } else {
                    echo "No se inserto<br><br>";
                }
                mysqli_close($con);
                break;
            case "M":
                $sql = "UPDATE product SET nombre_producto = '$nombre', descripcion_producto = '$descripcion', stock_producto = '$stock', precio_producto = '$precio' WHERE id_producto = '$id';";
                if(mysqli_query($con, $sql)){
                    echo "Se elimino Correctamente<br><br>";
                } else {
                    echo "No se elimino<br><br>";
                }
                mysqli_close($con);
                break;
            case "E":
                $sql = "DELETE FROM product WHERE id_producto = '$id';";
                if(mysqli_query($con, $sql)){
                    echo "Se modifico Correctamente<br><br>";
                } else {
                    echo "No se modifico<br><br>";
                }
                mysqli_close($con);
                break;
        }
    }
    ?>
</body>
</html>