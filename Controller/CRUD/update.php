<?php
    include("../Placeholder/headerAdmin.php");
    $id = $_GET["id"];
    
    if($_POST){
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"];
        $estado = $_POST["estado"];

        include("../../Model/connection.php");

        $sql = "UPDATE producto SET nombre = '$nombre', descripcion = '$descripcion', stock = $stock, precio = $precio, estado = $estado WHERE id = '$id';";
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
    <center>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $_GET["nombre"];?>" required><br><br>
            
            <label for="descripcion">Descripcion: </label>
            <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" value="<?php echo $_GET["descripcion"];?>" required><br><br>
            
            <label for="stock">Stock: </label>
            <input type="text" name="stock" id="stock" placeholder="Stock" value="<?php echo $_GET["stock"];?>" required><br><br>
            
            <label for="precio">Precio: </label>
            <input type="text" name="precio" id="precio" placeholder="Precio" value="<?php echo $_GET["precio"];?>" required><br><br>
            
            <input type="radio" name="estado" id="estado" value="1" <?php if($_GET["estado"] == 1){echo "checked";}?>>
            <label for="estado">Disponible</label>
            
            <input type="radio" name="estado" id="estado" value="0" <?php if($_GET["estado"] == 0){echo "checked";}?>>
            <label for="estado">No Disponible</label><br><br>
            
            <button type="submit" name="id" value="<?php echo $id?>">Modificar</button>
        </form>
    </center>
<?php 
    include("../Placeholder/footerAdmin.php");
?>