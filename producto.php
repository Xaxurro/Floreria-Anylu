<?php
include('Model/connection.php');
include('view/header.php');
define("KEY_TOKEN","grKfH-52.LQ*");

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if($id == '' || $token == ''){
    echo 'Error al procesar la petición';
    exit;
}else{
    $token_tmp = hash_hmac('sha1',$id,KEY_TOKEN );
    
    if($token == $token_tmp){

        $sql    ="SELECT count(id_producto) FROM product ";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            $query = mysqli_query($con,"SELECT * FROM product where id_producto = $id");
            $consulta = mysqli_fetch_array($query);
            $nombre = $consulta['nombre_producto'];
            $descripcion = $consulta['descripcion_producto'];
            $stock = $consulta['stock_producto'];
            $precio = $consulta['precio_producto'];
            $estado = $consulta['estado'];
            /*$dir_imagen = '';
            $rutaImg = $dir_imagen . 'principal.jpg';

            if(!file_exists($rutaImg)){
                $rutaImg = 'src/nodisp.png';
            }
            
            */
        }

    }else{
        echo 'Error al procesar la petición';
        exit;
        
    }
}
$con->close();
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
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-1">
                <img src="src/logo.png">
            </div>
            <div class="col-md-6 order-md-2">
                <h2><?php echo $nombre; ?></h2>
                <h2>$<?php echo $precio; ?></h2>
                <h2>Cantidad Disponible: <?php echo $stock; ?></h2>
                <p class="lead">
                    <?php echo $descripcion; ?>
                </p>
                <div class="d-grid gap-3 col-10 mx-auto">
                    <button class="btn btn-primary" type="button">Comprar ahora</button>
                    <button class="btn btn-outline-primary" type="button">Añadir al carrito</button>

                </div>

            </div>


        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</html>