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
                            <th>Producto </th>
                            <th>Precio</th>
                            <th>Subtotal </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT id_producto, cantidad FROM carrito_producto WHERE id_carrito = ".$_SESSION["id_carrito"].";";
                            $resultCart = $con->query($sql);
                            if($resultCart->num_rows > 0){
                                $nRow = 1;
                                while($row = $resultCart->fetch_assoc()){
                                    $sql = "SELECT nombre, precio FROM producto WHERE id = ".$row["id_producto"].";";
                                    $resultProducto = $con->query($sql);
                                    if($producto = $resultProducto->fetch_assoc()){
                                        echo "<tr>
                                            <td>".$producto["nombre"]."</td>
                                            <td>$".$producto["precio"]."</td>
                                            <td>$".($row["cantidad"] * $producto["precio"])."</td>
                                        </tr>";
                                    }
                                    $nRow++;
                                }
                            }
                        ?>
                        <tr>
                            <td colspan="2">Total:</td>
                            <td><label id="total"><?php echo $_SESSION["total"]; ?></label></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit">Reservar </button>
            </form>
        </div>
    
    </div>
</body>
<?php
    include("./Templates/footer.php");
?>