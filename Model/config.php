<?php
$KEY_TOKEN = 'grKfH-52.LQ*';

$num_cart =0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}
?>