<?php
    $id = $_GET["id"];
    
    if($_POST){
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"];
        $estado = $_POST["estado"];

        include("../../Model/connection.php");

        $sql = "UPDATE product SET nombre = '$nombre', descripcion = '$descripcion', stock = $stock, precio = $precio, estado = $estado WHERE id = '$id';";
        if($con->query($sql)){
            echo "Se modifico Correctamente<br><br>";
        } else {
            echo "No se modifico<br><br>";
        }
        $con->close();
        header("Location: ./crud.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
</head>
<body>
    <form action="update.php" method="post">
        <!-- TODO Añadir en JS la validacion del formulario-->
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $_GET["nombre"];?>"><br><br>
        
        <label for="descripcion">Descripcion: </label>
        <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" value="<?php echo $_GET["descripcion"];?>"><br><br>
        
        <label for="stock">Stock: </label>
        <input type="text" name="stock" id="stock" placeholder="Stock" value="<?php echo $_GET["stock"];?>"><br><br>
        
        <label for="precio">Precio: </label>
        <input type="text" name="precio" id="precio" placeholder="Precio" value="<?php echo $_GET["precio"];?>"><br><br>
        
        <input type="radio" name="estado" id="estado" value="1" <?php if($_GET["estado"] == 1){echo "checked";}?>>
        <label for="estado">Disponible</label>
        
        <input type="radio" name="estado" id="estado" value="0" <?php if($_GET["estado"] == 0){echo "checked";}?>>
        <label for="estado">No Disponible</label>
        <!-- TODO Añadir en JS la validacion del formulario-->

        <button type="submit" name="id" value="<?php echo $id?>">Modificar</button>
    </form>
</body>
</html>