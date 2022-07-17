<?php
    include("./Templates/header.php");
    if($_POST){
        $cantidad = $_POST["cantidad"];
        $producto = $_POST["id_producto"];
        for($i = 0; $i < count($cantidad); $i++){
            $sql = "UPDATE carrito_producto SET cantidad = ".$cantidad[$i]." WHERE id_carrito = ".$_SESSION["id_carrito"]." AND id_producto = ".$producto[$i].";";
            if(!($con->query($sql))){
                echo "No se modifico<br><br>";
            }
        }
        $i = 0;
        ?>

<body>
    <div class="container">
        <div class="table-responsive">
            <form action="form.php" method="post">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th>Producto </th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT id_producto, cantidad FROM carrito_producto WHERE id_carrito = ".$_SESSION["id_carrito"].";";
                            $resultCart = $con->query($sql);
                            $total = 0;
                            if($resultCart->num_rows > 0){
                                while($row = $resultCart->fetch_assoc()){
                                    $sql = "SELECT nombre, precio FROM producto WHERE id = ".$row["id_producto"].";";
                                    $resultProducto = $con->query($sql);
                                    if($producto = $resultProducto->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td><?php echo $producto["nombre"];?></td>
                                            <td>$<?php echo $producto["precio"];?></td>
                                            <td><?php echo $cantidad[$i];?></td>
                                            <td>$<?php echo ($cantidad[$i] * $producto["precio"]);?></td>
                                        </tr>
                                        <?php
                                        $total += $cantidad[$i] * (int)$producto["precio"];
                                        $i++;
                                    }
                                }
                            }
                        ?>
                    </tbody>
                </table><br>
                <br>
                <label><center><strong>Total: $<?php echo $total; ?></strong></center></label><br>

                <center><button type="submit">Reservar</button></center>
            </form>
        </div>
    </div>
</body>
<script src="../JS/filterTable.js"></script>
<?php
    } else {
        echo "Se produjo un error al procesar la reserva";
    }
    include("./Templates/footer.php");
?>