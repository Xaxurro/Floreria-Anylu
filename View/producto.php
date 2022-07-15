<?php
include('../Model/connection.php');
include('./Templates/header.php');
include("../Model/token.php");

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';

if($id == '' || $token == ''){
    echo 'Error al procesar la petición';
    exit;
}else{
    $token_tmp = hash_hmac('sha1',$id,KEY_TOKEN );
    
    if($token == $token_tmp){

        $sql    ="SELECT count(id) FROM producto;";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            $sql    ="SELECT * FROM producto where id = $id;";
            $resultProducto = $con->query($sql);
            $consulta = $resultProducto->fetch_assoc();
            $nombre = $consulta['nombre'];
            $descripcion = $consulta['descripcion'];
            $stock = $consulta['stock'];
            $precio = $consulta['precio'];
            $estado = $consulta['estado'];
            $sql    ="SELECT * FROM foto where id_producto=$id LIMIT 1;";
            $resultFoto = $con->query($sql);
            $foto = $resultFoto->fetch_assoc();
            if($resultFoto->num_rows > 0){
                $imagen = $foto['foto']; 
            }else{
                $imagen = '../src/nodisp.png';
            }
        } else {
            echo 'Error al procesar la petición';
            exit;
        }
    }
}
$con->close();
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-md-6 order-md-1">
            <?php 
            if($resultFoto->num_rows > 0){
                $imagen = $foto['foto'];
                echo '<img src="data:image/jpg;base64,'.base64_encode($imagen).'" class="card-img-top" alt="...">'; 
            }else{
                echo '<img src="../src/nodisp.png" class="card-img-top" alt="...">';
            }
            
            ?>
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
                <button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $id; ?>,'<?php echo $token_tmp; ?>')">Añadir al carrito</button>

            </div>

        </div>


    </div>

</div>
<script src="../JS/addProduct.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<?php 
    include("./Templates/footer.php");
?>