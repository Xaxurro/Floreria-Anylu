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
        <center>
            <label for="foto">Imagen: </label>
            <input type="file" name="foto" id="foto" required><br>
            
            <button type="submit" name="id_producto" value="<?php echo $id_producto?>">Añadir</button>
        </center>
    </form>

    <br><br>
    <center><a href='../CRUD/crud.php'>Volver</a></center>
    <br><br>

    <fieldset>
        <legend><b><i>Imagenes del producto <?php echo $id_producto;?>:</i></b></legend>
        <div class="table">
            <?php
                $sql = "SELECT * FROM foto WHERE id_producto = $id_producto;";
                $result = $con->query($sql);
                if($result->num_rows > 0){
                    ?><center><table>
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Opciones</th>
                    </tr><?php
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["id_foto"];?></td>
                            <td><img height='125px' width='125px' src='data:image/jpg;base64,<?php echo base64_encode($row["foto"]);?>'></td>
                            <td>
                            <form action='updateImg.php' method='post' enctype='multipart/form-data'>
                            <input type='file' name='foto' id='foto' required>
                            <input type='hidden' name='id_producto' value='<?php echo $id_producto;?>'>
                            <button type='submit' name='id_foto' value='<?php echo $row["id_foto"];?>'>Modificar</button>
                            </form>
                            <a href='deleteImg.php?id_producto=<?php echo $row["id_producto"];?>&id_foto=<?php echo $row["id_foto"];?>'>Eliminar</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?></table></center><?php
                } else {
                    ?><center><strong>No hay fotos asociadas al producto <?php echo $id_producto;?></strong></center><?php
                }
            ?>
        </div>
    </fieldset>
<?php 
    include("../Placeholder/footerAdmin.php");
?>