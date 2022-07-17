<?php
    include('./Templates/header.php');

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $token = isset($_GET['token']) ? $_GET['token'] : null;

    if($id == null || $token == null){
        echo 'Error al procesar la petición';
        exit;
    }else{
        $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);
        
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

                $sql = "SELECT * FROM foto where id_producto=$id LIMIT 1;";
                $resultFoto = $con->query($sql);
                $foto = $resultFoto->fetch_assoc();
                if($resultFoto->num_rows > 0){
                    $imagen = "data:image/jpg;base64,".base64_encode($foto['foto']); 
                }else{
                    $imagen = '../src/nodisp.png';
                }
            } else {
                echo 'No hay productos disponibles.';
                exit;
            }
        }
    }
    $con->close();
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<section id="cuerpo">
<div class="container">
    <div class="row">
        <div class="col-md-6 order-md-1">
            <?php 
                echo '<img src="'.$imagen.'" class="card-img-top" alt="...">'; 
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
                <form action="addProduct.php#productos" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="number" name="cantidad" id="cantidad" min="1" value="1"><br><br>
                    <button class="btn btn-primary" type="submit" name="buy">Comprar ahora</button></a>
                    <button class="btn btn-outline-primary" type="submit" name="add">Añadir al carrito</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<?php 
    include("./Templates/footer.php");
?>