<?php
    include("../connection.php");
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
<?php
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
?>
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
    </form><br><br><br>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
        <?php
        $sql = "SELECT * FROM product;";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <tr>
                    <td>".$row["id_producto"]."</td>
                    <td>".$row["nombre_producto"]."</td>
                    <td>".$row["descripcion_producto"]."</td>
                    <td>".$row["stock_producto"]."</td>
                    <td>".$row["precio_producto"]."</td>
                    <td>".$row["estado"]."</td>
                    <td>
                    <button type='submit' name='opcion' value='M'>Modificar</button>
                    <a href='delete.php?id=".$row["id"].">Eliminar</a>
                    </td>
                </tr>
                ";
            }
        }
        ?>
    </table>

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
        }
    }
    ?>
</body>
</html>