<?php
include("./controller/connection.php");
include("./view/header.php");
define("KEY_TOKEN","grKfH-52.LQ*")
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
</head>
<body>
    <section id="cuerpo">
        <h1>Productos</h1>
        <div class="container">
            <div class="row" id="productos">
                <?php
                $query = mysqli_query($con,"SELECT * FROM product");
                while($consulta = mysqli_fetch_array($query)){
                    echo '<div class="card" style="width: 18rem;">
                    <img src="src/flores.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                            <h5 class="card-title">'.$consulta['nombre_producto'].'</h5>
                            <p class="card-text">'.$consulta['descripcion_producto'].'</p>
                            <p class="card-text">$'.$consulta['precio_producto'].'</p>
                            <a  href="producto.php?id='.$consulta['id_producto'].'& token='.hash_hmac('sha1',$consulta['id_producto'],KEY_TOKEN).'"  class="btn btn-primary id="boton" >Ver más</a>

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