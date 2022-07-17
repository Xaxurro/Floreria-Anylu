
<?php
    include("../Placeholder/headerAdmin.php");
?>

<script src="../../JS/sortTable.js"></script>
<script src="../../JS/filterTable.js"></script>
<fieldset>
    <center>
        <legend><b><i>Productos Reservados:</i></b></legend>
        <div class="table">
            <?php
                $sql = "SELECT * FROM visita WHERE id_carrito != 0;";
                $result = $con->query($sql);
                if($result->num_rows > 0){
                    ?><input type="text" id="filter" onkeyup="filterTable(1)" placeholder="Nombre del producto a buscar..."><br><br>
                    <center><table id="table">
                    <tr>
                        <th onclick="sortTable(0, true)">ID</th>
                        <th onclick="sortTable(1, false)">Nombre</th>
                        <th onclick="sortTable(2, false)">Correo</th>
                        <th onclick="sortTable(4, true)">Telefono</th>
                        <th onclick="sortTable(5, false)">Descripcion</th>
                        <th onclick="sortTable(6, false)">Total</th>
                        <th onclick="sortTable(7, false)">Cantidad De Productos</th>
                        <th onclick="sortTable(8, false)">Dia</th>
                        <th onclick="sortTable(9, false)">Hora</th>
                        <th onclick="sortTable(10, false)" colspan="2">Opciones</th>
                    </tr><?php
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["id_visita"];?></td>
                            <td><?php echo $row["nombre"];?></td>
                            <td><?php echo $row["correo"];?></td>
                            <td><?php echo $row["telefono"];?></td>
                            <td><?php if($row["descripcion"] == Null){
                                    echo 'No tiene.';
                                } else {
                                    echo $row["descripcion"];
                                }?></td>
                            <td><?php 
                            $sql = "SELECT SUM(precio * cantidad) as total FROM producto, carrito_producto WHERE id = id_producto and id_carrito = ".$row["id_carrito"].";";
                            $resultTotal = $con->query($sql);
                            if($total = $resultTotal->fetch_assoc()){
                                echo $total["total"];
                            }
                            ?></td>
                            <td><?php echo $row["dia"];?></td>
                            <td><?php echo $row["hora"];?></td>
                            <td><a href="readProducts.php?id=<?php echo $row["id_carrito"];?>">Ver Productos</a></td>
                            <td><a href="deleteProduct.php?id=<?php echo $row["id_visita"];?>">Eliminar</a></td><?php
                    }
                    ?></table></center><?php
                } else {
                    ?><center><strong>No hay Productos reservados en la base de datos.</strong></center><?php
                }
            ?>
        </div>
    </center>
</fieldset>
<?php
    include("../Placeholder/footerAdmin.php");
?>