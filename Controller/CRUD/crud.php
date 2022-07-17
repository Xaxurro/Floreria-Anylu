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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <label for="nombre">Nombre: </label><br>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" required><br><br>
                
                    <label for="descripcion">Descripcion: </label><br>
                    <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" required><br><br>
                    
                    <label for="stock">Stock: </label><br>
                    <input type="text" name="stock" id="stock" placeholder="Stock" required><br><br>
                    
                    <label for="precio">Precio: </label><br>
                    <input type="text" name="precio" id="precio" placeholder="Precio" required><br><br>
                    
                    <button type="submit" name="opcion">Añadir</button>
                </form>
            </div>
        </fieldset>
    </center>
    
    <br><br>
    <script src="../../JS/sortTable.js"></script>
    <script src="../../JS/filterTable.js"></script>
    <br><br>

    <fieldset>
        <legend><b><i>Productos:</i></b></legend>
        <div class="table">
            <?php
                $sql = "SELECT * FROM producto;";
                $result = $con->query($sql);
                if($result->num_rows > 0){
                    ?><input type="text" id="filter" onkeyup="filterTable(1)" placeholder="Nombre del producto a buscar..."><br><br>
                    <center><table id="table">
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
                    </tr><?php
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["id"];?></td>
                            <td><?php echo $row["nombre"];?></td>
                            <td><?php echo $row["descripcion"];?></td>
                            <td><?php echo $row["stock"];?></td>
                            <td><?php echo $row["precio"];?></td><?php
                        if($row["estado"] == 1){
                            ?><td>Si</td><?php
                        } else {
                            ?><td>No</td><?php
                        }
                        ?>
                            <td><span><a href='../CRUDImagenes/crudImg.php?id=<?php echo $row["id"]?>'>Imagen</a></span></td>
                            <td><span><a href='update.php?id=<?php echo $row["id"]?>&&nombre=<?php echo $row["nombre"]?>&&descripcion=<?php echo $row["descripcion"]?>&&stock=<?php echo $row["stock"]?>&&precio=<?php echo $row["precio"]?>&&estado=<?php echo $row["estado"]?>'>Producto</a></span></td>
                            <td><span><a href='delete.php?id=<?php echo $row["id"]?>'>Eliminar</a></span></td>
                        <?php
                    }
                    ?></table></center><?php
                } else {
                    ?><center><strong>No hay Productos en la base de datos.</strong></center><?php
                }
            ?>
        </div>
    </fieldset>
<?php 
    include("../Placeholder/footerAdmin.php");
?>