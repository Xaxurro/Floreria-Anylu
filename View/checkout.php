<?php
    include("./Templates/header.php");
    include("../Model/token.php");
?>

<body>
    <div class="container">
        <div class="table-responsive">
            <?php
                $sql = "SELECT id_producto, cantidad FROM carrito_producto WHERE id_carrito = ".$_SESSION["id_carrito"].";";
                $resultCart = $con->query($sql);
                if($resultCart->num_rows > 0){
                ?><center><input type="text" id="filter" onkeyup="filterTable()" placeholder="Nombre del producto a buscar..."></center><br>
                    <form action="reserva.php" method="post">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>Opcion</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                    $nRow = 1;
                    $_SESSION["total"] = 0;
                    while($row = $resultCart->fetch_assoc()){
                        $sql = "SELECT nombre, precio FROM producto WHERE id = ".$row["id_producto"].";";
                        $resultProducto = $con->query($sql);
                        if($producto = $resultProducto->fetch_assoc()){
                            ?><tr>
                                <td><a href='deleteProduct.php?id=<?php echo $row["id_producto"];?>'><strong>Eliminar</strong></a></td>
                                <td><?php echo $producto["nombre"]?></td>
                                <td>$<?php echo $producto["precio"]?></td>
                                <td><input type='number' name="cantidad[]" id='<?php echo $nRow;?>' min='1' max='10' value='<?php echo $row["cantidad"]?>' onchange='updatePrice(<?php echo $nRow?>)'></td>
                                <td>$<?php echo ($row["cantidad"] * $producto["precio"])?></td>
                            </tr><?php 
                            $_SESSION["total"] += (int)$producto["precio"] * (int)$row["cantidad"];
                        }
                        $nRow++;
                    }
                    ?></tbody>
                        </table><br>
                        <label id="total"><center><strong>Total: $<?php echo $_SESSION["total"]; ?></strong></center></label><br>
                        <center><button type="submit">Enviar</button></center>
                        </form>
                    <?php
                } else {
                    $_SESSION["total"] = 0;
                    ?><center>No hay productos asociados al carrito.</center><?php
                }
            ?>
        </div>
    </div>
</body>
<script src="../JS/modifyProduct.js"></script>
<script src="../JS/filterTable.js"></script>
<?php
    include("./Templates/footer.php");
?>