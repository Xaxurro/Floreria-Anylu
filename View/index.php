<?php 
    include("./Templates/header.php"); 
    include("../Model/token.php");

    if(!isset($_COOKIE["user"])){
        setcookie("user", hash_hmac('sha1', date("l jS F Y H:i:s"), KEY_TOKEN), time() + 31536000, "/");
    }
?>
<section id="cuerpo">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../src/flores.jpg" class="d-block w-100" alt="flor1" id="Carousel">
            </div>
            <div class="carousel-item">
                <img src="../src/flores2.jpg" class="d-block w-100" alt="flor2" id="Carousel">
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

</section>
<?php include("./Templates/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>