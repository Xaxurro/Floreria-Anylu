<?php
    include("./Templates/header.php");
    include("../Model/token.php");
?>

<body>
    <div class="container">
        <div class="table-responsive">
            <form action="updateCart.php" method="post">
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
                            $sql = "SELECT id_producto, cantidad FROM carrito_producto WHERE id_carrito = ".$_SESSION["id_carrito"].";";
                            $resultCart = $con->query($sql);
                            if($resultCart->num_rows > 0){
                                $nRow = 1;
                                $total = 0;
                                while($row = $resultCart->fetch_assoc()){
                                    $sql = "SELECT nombre, precio FROM producto WHERE id = ".$row["id_producto"].";";
                                    $resultProducto = $con->query($sql);
                                    if($producto = $resultProducto->fetch_assoc()){
                                        echo "<tr>
                                            <td><a href='deleteProduct.php?id=".$row["id_producto"]."'><strong>Eliminar</strong></a></td>
                                            <td>".$producto["nombre"]."</td>
                                            <td>$".$producto["precio"]."</td>
                                            <td><input type='number' name='a' id='".$nRow."' min='1' max='10' value='".$row["cantidad"]."' onchange='updatePrice($nRow)'></td>
                                            <td>$".($row["cantidad"] * $producto["precio"])."</td>
                                        </tr>";
                                        $total += (int)$producto["precio"] * (int)$row["cantidad"];
                                    }
                                    $nRow++;
                                }
                            }
                        ?>
                        <tr>
                            <td colspan="4">Total:</td>
                            <td><label id="total">$<?php echo $total; ?></label></td>
                        </tr>
                    </tbody>
                </table>
                <center><button type="submit">Enviar</button></center>
            </form>
        </div>
    </div>
</body>
<script src="../JS/modifyProduct.js"></script>
<?php
    include("./Templates/footer.php");
?>