<?php
include("./View/header.php");

include("./Model/token.php");

$producto = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
$lista_carrito = array();
if($producto != null){
    foreach($producto as $clase => $cantidad){
        $sql    ="SELECT id, nombre, precio, $cantidad AS cantidad FROM producto";
        $resultProducto = $con->query($sql);
        $lista_carrito[] = $resultProducto->fetch_assoc();
        
    }
}

/*
while(
    $nombre = $consulta['nombre'];
    $descripcion = $consulta['descripcion'];
    $stock = $consulta['stock'];
    $precio = $consulta['precio'];
    $estado = $consulta['estado'];
    $id = $consulta['id'];

}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto </th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php if($lista_carrito == null){
                        echo '<tr><td colspan="5" class="text-center"><b>Lista Vacia</b</td></tr>' ;
                    }else{
                        $total = 0;
                        foreach($lista_carrito as $producto){
                            $_id = $producto['id'];
                            $_nombre = $producto['nombre'];
                            $_stock = $producto['stock'];
                            $_precio = $producto['precio'];
                            $cantidad = $producto['cantidad'];
                            $subtotal = $cantidad * $_precio;
                            $total += $subtotal;
                        ?>
                    <tr>
                        <td> <?php echo $nombre;?> </td>
                        <td>$<?php echo $_precio;?> </td>
                        <td>
                            <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad; ?>" size="5" id="cantidad_<?php echo $_id; ?>" onchange="">
                        </td>
                        <td> 
                            <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">$<?php echo $subtotal;?> </div>
                        </td>
                        <td> <a href="#" id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>" data-ds-toogle="modal" data-bs-target="eliminaModal">Eliminar </a> </td>
                    </tr>
                    <?php } ?>

                    <tr> 
                        <td colspan="3"> </td>
                        <td colspan="2"> 
                            <p class="h3" id="total">$<?php echo $total; ?> </p>
                        </td>
                    </tr>
                    <div>
                        <div class="col-md-5 offset-md-7 d-grid gap-2">
                            <button class="btn btn-primary btn-lg">Reservar Productos</button>
                    </div>
                </tbody>
                <?php } ?>
            </table>
        </div>
    
    </div>
</body>
</html>