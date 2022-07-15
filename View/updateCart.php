<?php
include("../Model/token.php");
include("../Model/configCart.php");
include("../Model/connection.php");

if(isset($_POST['action'])){

    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : 0;

    if($action == 'agregar'){
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $respuesta = agregar($id, $cantidad);
        if($respuesta>0){
            $datos['ok'] = true;
        }else{
            $datos['ok'] = false;
        }
        $datos['sub'] = '$'. number_format($respuesta);
    }else if($action == 'eliminar'){
        $datos['ok'] = eliminar($id);

    }else{
        $datos['ok'] = false;
        
    }
}else{
    $datos['ok'] = false;
}

echo json_encode($datos);

function agregar($id, $cantidad){
    $res = 0;

    if($id > 0 && $cantidad > 0 & is_numeric(($cantidad))){
        if(isset($_SESSION['carrito']['productos'][$id])){
            $_SESSION['carrito']['productos'][$id] = $cantidad;

            $sql    ="SELECT * FROM producto where id = $id;";
            $resultProducto = $con->query($sql);
            $consulta = $resultProducto->fetch_assoc();
            $precio = $consulta['precio'];
            $estado = $consulta['estado'];
            $res = $cantidad * $precio;

            return $res;
        }
    }else{
        return $res;
    }
}

function eliminar($id){
    if($id > 0){
        if(isset($_SESSION['carrito']['productos'][$id])){
            unset($_SESSION['carrito']['productos'][$id]);
            return true;
        }

    }else{
        return false;
    }
}
?>