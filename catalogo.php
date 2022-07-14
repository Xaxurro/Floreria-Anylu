<?php
    include("./Model/connection.php");
    include("./View/header.php");
    define("KEY_TOKEN","grKfH-52.LQ*")
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floreria Anylu - Catalogo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
</head>
<body>
    <section id="cuerpo">
        <h1>Productos</h1>
        <div class="container">
            <div class="row" id="productos">
                <?php
                    $sql    ="SELECT * FROM producto";
                    $resultProducto = $con->query($sql);
                    
                    while($consulta = $resultProducto->fetch_assoc()){
                        $nombre = $consulta['nombre'];
                        $descripcion = $consulta['descripcion'];
                        $stock = $consulta['stock'];
                        $precio = $consulta['precio'];
                        $estado = $consulta['estado'];
                        $id = $consulta['id'];
                        echo '<div class="card" style="width: 18rem;">';

                        $sql    ="SELECT * FROM foto where id_producto = $id LIMIT 1;";
                        $resultFoto = $con->query($sql);
                        $foto = $resultFoto->fetch_assoc();
                        if($resultFoto->num_rows == 1){
                            echo '<img src="data:image/jpg;base64,'.base64_encode($foto['foto']).'" class="card-img-top" alt="...">';
                        }else{
                            echo '<img src="src/nodisp.png" class="card-img-top" alt="...">';
                        }
                        echo '<div class="card-body">
                                <h5 class="card-title">'.$nombre.'</h5>
                                <p class="card-text">'.$descripcion.'</p>
                                <p class="card-text">$'.$precio.'</p>
                                <a  href="producto.php?id='.$id.'& token='.hash_hmac('sha1',$id,KEY_TOKEN).'"  class="btn btn-primary id="boton" >Ver más</a>
                            </div>
                        </div>';
                    }
                ?>


            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</html>
<?php include("./View/footer.php"); ?>