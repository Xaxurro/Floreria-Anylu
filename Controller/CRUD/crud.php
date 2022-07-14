<?php
    include("../Placeholder/headerAdmin.php");
    if($_POST){
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"];
        $opcion = $_POST["opcion"];

        $sql = "INSERT INTO producto (nombre, descripcion, stock, precio, estado) VALUES ('$nombre', '$descripcion', $stock, $precio, 1);";
        if(!($con->query($sql))) {
            echo "No se inserto<br><br>";
        }
    }
?>

<body>
    <center>
        <fieldset>
            <legend><b><i>Productos:</i></b></legend>
            <div class="table">
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
            </div>
        </fieldset>
    </center>
    
    <br><br>
    <script src="../../JS/SortTable.js"></script>
    <br><br>

    <fieldset>
        <legend><b><i>Productos:</i></b></legend>
        <div class="table">
            <?php
                $sql = "SELECT * FROM producto;";
                $result = $con->query($sql);
                if($result->num_rows > 0){
                    echo '<center><table id="table">
                    <tr>
                        <th onclick="sortTable(0, true)">ID <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                            </svg></th>
                        <th onclick="sortTable(1, false)">Nombre <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                            </svg></th>
                        <th onclick="sortTable(2, false)">Descripcion <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                            </svg></th>
                        <th onclick="sortTable(3, true)">Stock <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                            </svg></th>
                        <th onclick="sortTable(4, true)">Precio <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                            </svg></th>
                        <th onclick="sortTable(5, false)">Disponible <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                            </svg></th>
                        <th colspan="3">Modificar</th>
                    </tr>';
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
                    echo"</table></center>";
                } else {
                    echo "<center><strong>No hay Productos en la base de datos.</strong></center>";
                }
            ?>
        </div>
    </fieldset>
</body>
</html>