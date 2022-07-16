<?php
    include("./Templates/header.php");
    include('../Model/token.php');
?>

    
</head>

<section id="cuerpo">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../src/flores.jpg" class="d-block w-100" alt="flor1" id="Carousel">
            </div>
            <div class="carousel-item">
                <img src="../src/flores2.jpg" class="d-block w-100" alt="flor1" id="Carousel">
            </div>
            <div class="carousel-item">
                <img src="../src/flores3.jpg" class="d-block w-100" alt="flor3" id="Carousel">
            </div>
            <div class="carousel-item">
                <img src="../src/flores4.jpg" class="d-block w-100" alt="flor4" id="Carousel">
            </div>
            <div class="carousel-item">
                <img src="../src/flores5.jpg" class="d-block w-100" alt="flor5" id="Carousel">
            </div>
        </div>
    </div>
<br>
<h1 id="Productos"><i><b> Productos</b></i></h1> <br>
<br>
<div class="container">
    <div class="row" id="productos">
        <?php
            $sql    ="SELECT * FROM producto  WHERE estado=1";
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
                    echo '<img src="../src/nodisp.png" class="card-img-top" alt="...">';
                }
                echo '<div class="card-body">
                        <h5 class="card-title">'.$nombre.'</h5>
                        <p class="card-text">'.$descripcion.'</p>
                        <p class="card-text">$'.$precio.'</p>
                        <a  href="producto.php?id='.$id.'& token='.hash_hmac('sha1', $id, KEY_TOKEN).'"  class="btn btn-primary id="boton" >Ver más</a>
                    </div>
                </div>';
            }
        ?>
    </div>
</div>
</section>

</html>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<?php include("./Templates/footer.php"); ?>