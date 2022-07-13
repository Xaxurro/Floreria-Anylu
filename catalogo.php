<?php
    include("./Modelo/connection.php");
    include("./View/header.php");
    define("KEY_TOKEN","grKfH-52.LQ*")
?>

<!DOCTYPE html>
<html lang="en">
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
                $query = mysqli_query($con,"SELECT * FROM producto");
                
                
                while($consulta = mysqli_fetch_array($query)){
                    /*
                    while($fotos = mysqli_fetch_array($query2)){

                    } 
                    */
                    $nombre = $consulta['nombre_producto'];
                    $descripcion = $consulta['descripcion_producto'];
                    $stock = $consulta['stock_producto'];
                    $precio = $consulta['precio_producto'];
                    $estado = $consulta['estado'];
                    $id = $consulta['id_producto'];
                    echo '<div class="card" style="width: 18rem;">';
                    $query2 = mysqli_query($con,"SELECT * FROM photo where id_producto=$id LIMIT 1;");
                    $foto = mysqli_fetch_array($query2);
                    if(mysqli_num_rows($query2) == 1){
                        $imagen = $foto['foto'];
                        echo '<img src="data:image/jpg;base64,'.base64_encode($imagen).'" class="card-img-top" alt="...">';
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
<?php include("./view/footer.php"); ?>