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

                $sql = "SELECT * FROM foto where id_producto = $id;";
                $resultFoto = $con->query($sql);
                $imagenes = [];
                if($resultFoto->num_rows > 0){
                    $x = 0;
                    while($foto = $resultFoto->fetch_assoc()){
                        $imagenes[$x] = "data:image/jpg;base64,".base64_encode($foto['foto']);
                        $x++;
                    }
                }else{
                    $imagenes[0] = '../src/nodisp.png';
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
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <?php
                        for($x = 1; $x < count($imagenes); $x++){
                            ?><li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $x;?>"></li><?php
                        }
                    ?>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo $imagenes[0];?>" width="450" height="450">
                    </div>
                    <?php
                        for($x = 1; $x < count($imagenes); $x++){
                        ?><div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo $imagenes[$x];?>" width="450" height="450">
                        </div><?php
                        }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
        </div>
        <div class="col-md-6 order-md-2">
            <h2><?php echo $nombre; ?></h2>
            <h2>$<?php echo $precio; ?></h2>
            <h2>Cantidad Disponible: <?php echo $stock; ?></h2>
            <p class="lead">
                <?php echo $descripcion; ?>
            </p>
            <form action="addProduct.php#productos" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <label for="cantidad">Cantidad a Comprar: </label>
                <input type="number" name="cantidad" id="cantidad" min="1" max="10" value="1"><br><br>
                <button class="btn btn-primary" type="submit" name="buy">Comprar ahora</button></a>
                <button class="btn btn-outline-primary" type="submit" name="add">Añadir al carrito</button>
            </form>
        </div>
    </div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<?php 
    include("./Templates/footer.php");
?>