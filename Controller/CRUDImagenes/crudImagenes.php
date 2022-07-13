<?php
    include("../Placeholder/headerAdmin.php");
    if($_GET){
        $id_producto = $_GET["id"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Imagenes</title>
</head>
<body>
    <form action="updateImg.php" method="post" enctype="multipart/form-data">
        <label for="foto">Imagen: </label>
        <input type="file" name="foto" id="foto"><br>

        <button type="submit" name="id_producto" value="<?php echo $id_producto?>">Añadir</button>
    </form>

    <br><br>
    <a href='../CRUD/crud.php'>Volver</a>
    <br><br>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Opciones</th>
        </tr>
        <?php
        $sql = "SELECT * FROM photo WHERE id_producto = $id_producto;";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>".$row["id_foto"]."</td>
                    <td><img height='125px' width='125px' src='data:image/jpg;base64,".base64_encode($row["foto"])."'></td>
                    <td>
                    <form action='updateImg.php' method='post' enctype='multipart/form-data'>
                    <input type='file' name='foto' id='foto'>
                    <input type='hidden' name='id_producto' value='".$id_producto."'>
                    <button type='submit' name='id_foto' value='".$row["id_foto"]."'>Modificar</button>
                    </form>
                    <a href='deleteImg.php?id_producto=".$row["id_producto"]."&id_foto=".$row["id_foto"]."'>Eliminar</a>
                    </td>
                </tr>
                ";
            }
        }
        ?>
    </table>
</body>
</html>