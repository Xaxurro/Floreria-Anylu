<?php
    include("../controller/connection.php");
    if($_POST){
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"];
        $opcion = $_POST["opcion"];

        $sql = "INSERT INTO product (nombre_producto, descripcion_producto, stock_producto, precio_producto, estado) VALUES ('$nombre', '$descripcion', $stock, $precio, 1);";
        if($con->query($sql)){
            echo "Se inserto Correctamente<br><br>";
        } else {
            echo "No se inserto<br><br>";
        }
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
        <!-- TODO Añadir en JS la validacion del formulario-->
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre"><br><br>
        
        <label for="descripcion">Descripcion: </label>
        <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion"><br><br>
        
        <label for="stock">Stock: </label>
        <input type="text" name="stock" id="stock" placeholder="Stock"><br><br>
        
        <label for="precio">Precio: </label>
        <input type="text" name="precio" id="precio" placeholder="Precio"><br><br>

        <button type="submit" name="opcion">Añadir</button>
        <!-- TODO Añadir en JS la validacion del formulario-->
    </form><br><br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Disponible</th>
            <th>Opciones</th>
        </tr>
        <?php
        $sql = "SELECT * FROM product;";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>".$row["id_producto"]."</td>
                    <td>".$row["nombre_producto"]."</td>
                    <td>".$row["descripcion_producto"]."</td>
                    <td>".$row["stock_producto"]."</td>
                    <td>".$row["precio_producto"]."</td>";
                if($row["estado"] == 1){
                    echo "<td>Si</td>";
                } else {
                    echo "<td>No</td>";
                }
                echo "
                    <td>
                    <a href='updateImg.php?id=".$row["id_producto"]."'>Modificar Imagenes</a>
                    <a href='update.php?id=".$row["id_producto"]."&&nombre=".$row["nombre_producto"]."&&descripcion=".$row["descripcion_producto"]."&&stock=".$row["stock_producto"]."&&precio=".$row["precio_producto"]."'>Modificar</a>
                    <a href='delete.php?id=".$row["id_producto"]."id=".$row["id_producto"]."'>Eliminar</a>
                    </td>
                </tr>
                ";
            }
        }
        ?>
    </table>
</body>
</html>