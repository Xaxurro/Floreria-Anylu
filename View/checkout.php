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
                            <th>Cantidad</th>
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
                                            <td><input type='number' name='a' id='".$nRow."' min='1' max='10' value='".$row["cantidad"]."' onchange='updatePrice($nRow)'></td>
                                            <td>$".($row["cantidad"] * $producto["precio"])."</td>
                                        </tr>";
                                    }
                                    $nRow++;
                                }
                            }
                        ?>
                        <tr>
                            <td colspan="3">Total:</td>
                            <td><label id="total">$0</label></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit">Enviar</button>
            </form>
        </div>
    
    </div>
</body>
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atención</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ¿Desea eliminar el producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button id="btn-elimina" type="button" class="btn btn-danger" onclick="elimina()" >Eliminar</button>
            </div>
        </div>
    </div>
</div>
<script src="../JS/modifyProduct.js"></script>
<?php
    include("./Templates/footer.php");
?>