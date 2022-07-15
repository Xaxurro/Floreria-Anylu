<?php
    include("./Templates/header.php");
    include("../Model/token.php");


    
    if($_POST){
        $sql = "SELECT id_producto, cantidad FROM carrito_producto WHERE id_carrito = ".$_SESSION["id_carrito"].";";
        $resultCart = $con->query($sql);
        if($resultCart->num_rows > 0){
            $nRow = 1;
            while($row = $resultCart->fetch_assoc()){
                $sql = "SELECT nombre, precio FROM producto WHERE id = ".$row["id_producto"].";";
                $resultProducto = $con->query($sql);
                if($producto = $resultProducto->fetch_assoc()){
                    $id_producto = $row["id_producto"];
                    $cant_producto = $row["cantidad"];
                    $nom_producto = $producto["nombre"];
                    $precio_producto = $producto["precio"];
                    $total = $_SESSION["total"];
                    echo "<tr>
                        <td>".$producto["nombre"]."</td>
                        <td>$".$producto["precio"]."</td>
                        <td>$".($row["cantidad"] * $producto["precio"])."</td>
                        <td>$".$_SESSION['total']."</td>
                        <td>$".$row["cantidad"]."</td>
                    </tr>";
                }
            }
        } 
        $nombre = $_POST['nombre'];
        $rut = $_POST['rut'];
        $correo = $_POST['email'];
        $telefono = $_POST['telefono'];
        $sql = "INSERT INTO reservas (rut, nombre, correo, telefono, id_producto, nombre_producto, cantidad_producto, valor) VALUES ('$rut','$nombre','$correo','$telefono','$id_producto','$nom_producto','$cant_producto','$total');";
        if(!($con->query($sql))) {
            echo "No se inserto<br><br>";
        }
    }

?>

<body>
    <form method="POST" action="form.php">
        <center><h1>INGRESE SUS DATOS</h1><br>
        <a>NOMBRE: <input type="text" name="nombre" maxlength="255"> </input></a><br><br>
        <a>RUT: <input type="text" name="rut" maxlength="255"> </input></a><br><br>
        <a>CORREO: <input type="text" name="email" maxlength="255"> </input></a><br><br>
        <a>TELEFONO: <input type="text" name="telefono" maxlength="255"> </input></a><br><br>
        
        <button type="submit" value="Enviar">Enviar</button></center>
    </form>
</body>
<?php
    include("./Templates/footer.php");
?>