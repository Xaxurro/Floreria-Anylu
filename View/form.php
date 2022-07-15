<?php
    session_start();
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
                    echo "<tr>
                        <td>".$producto["nombre"]."</td>
                        <td>$".$producto["precio"]."</td>
                        <td>$".($row["cantidad"] * $producto["precio"])."</td>
                    </tr>";
                }
            }
        } 
        $nombre = $_POST['nombre'];
        $rut = $_POST['rut'];
        $correo = $_POST['email'];
        $telefono = $_POST['telefono'];
        $sql = "INSERT INTO reservas (rut, nombre, correo, telefono, id_producto, nombre_producto, cantidad_producto, valor) VALUES ('$RUT','$nombre','$correo','$telefono','".$producto["id_producto"]."','".$producto["nombre"]."','".$producto["cantidad"]."', 5);";
        if(!($con->query($sql))) {
            echo "No se inserto<br><br>";
        }
    }

?>

<body>
    <form method="POST" action="form.php">
        <h1>INGRESE SUS DATOS</h1>
        <a>NOMBRE: <input type="text" name="nombre" maxlength="255"> </input> </a>
        <a>RUT: <input type="text" name="rut" maxlength="255"> </input> </a>
        <a>CORREO: <input type="text" name="email" maxlength="255"> </input> </a>
        <a>TELEFONO: <input type="text" name="telefono" maxlength="255"> </input> </a>
        
        <button type="submit" value="Enviar"></button>
    </form>
</body>
<?php
    include("./Templates/footer.php");
?>