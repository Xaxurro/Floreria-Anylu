<?php 
    include("./Templates/header.php"); 
    include("../Model/token.php");

    if(!isset($_COOKIE["user"])){
        setcookie("user", hash_hmac('sha1', date("l jS F Y H:i:s"), KEY_TOKEN), time() + 31536000, "/");
    }
?>
<section id="cuerpo">
    <a></a>
    <img src="../src/flores.jpg" alt="flores">
    
</section>
<?php include("./Templates/footer.php"); ?>