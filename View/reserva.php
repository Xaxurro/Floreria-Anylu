<?php
    include("./Templates/header.php");
    include("../Model/token.php");
    if($_POST){
        $cantidad = $_POST["cantidad"];
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
                                            <td>$<?php echo ($cantidad[$i] * $producto["precio"]); $i++;?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        <tr>
                            
                            <td colspan="3"><strong>Total:</strong></td>
                            <td><label id="total"><strong>$<?php echo $_SESSION["total"]; ?></strong></label></td>
                        </tr>
                    </tbody>
                </table><br>
                <center><button type="submit">Reservar </button></center>
            </form>
        </div>
    </div>
</body>
<?php
    } else {
        echo "Se produjo un error al procesar la reserva";
    }
    include("./Templates/footer.php");
?>