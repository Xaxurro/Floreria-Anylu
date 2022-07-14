<?php
    include("../Placeholder/headerAdmin.php");
    if($_POST){
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"];
        $opcion = $_POST["opcion"];

        $sql = "INSERT INTO producto (nombre, descripcion, stock, precio, estado) VALUES ('$nombre', '$descripcion', $stock, $precio, 1);";
        if($con->query($sql)){
            echo "Se inserto Correctamente<br><br>";
        } else {
            echo "No se inserto<br><br>";
        }
    }
?>

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

    <script src="../../JS/SortTable.js"></script>
    <table id="table">
        <tr>
            <th onclick="sortTable(0, true)">ID</th>
            <th onclick="sortTable(1, false)">Nombre</th>
            <th onclick="sortTable(2, false)">Descripcion</th>
            <th onclick="sortTable(3, true)">Stock</th>
            <th onclick="sortTable(4, true)">Precio</th>
            <th onclick="sortTable(5, false)">Disponible</th>
            <th colspan="3">Modificar</th>
        </tr>
        <?php
        $sql = "SELECT * FROM producto;";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["nombre"]."</td>
                    <td>".$row["descripcion"]."</td>
                    <td>".$row["stock"]."</td>
                    <td>".$row["precio"]."</td>";
                if($row["estado"] == 1){
                    echo "<td>Si</td>";
                } else {
                    echo "<td>No</td>";
                }
                echo "
                    <td><span><a href='../CRUDImagenes/crudImg.php?id=".$row["id"]."'>Imagen</a></span></td>
                    <td><span><a href='update.php?id=".$row["id"]."&&nombre=".$row["nombre"]."&&descripcion=".$row["descripcion"]."&&stock=".$row["stock"]."&&precio=".$row["precio"]."&&estado=".$row["estado"]."'>Producto</a></span></td>
                    <td><span><a href='delete.php?id=".$row["id"]."'>Eliminar</a></span></td>
                ";
            }
        }
        ?>
    </table>
</body>
</html>