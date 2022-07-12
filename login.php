<?php

include("conn.php");

if($_POST){
    
    $id = $_POST['id'];
    $password = $_POST['password'];
    $_SESSION['id']=$id;
    
    $query="SELECT * FROM admin WHERE id_admin='$id' and password_admin='$password'";
    $sql = mysqli_query($con,$query);
    
    $rows = mysqli_num_rows($sql);
    if($rows){
        header('location:index.php');
    }else{
        ?>
        <h1>ERROR, ID O CONTRASEÑA INCORRECTOS</h1>
        <?php
    }
    mysqli_free_result($sql);
    mysqli_close($con);
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="POST">
    <p>id:<input type="text" name="id" maxlength="255"></p>
    <p>Contraseña:<input type="password" name="password" maxlength="50"></p>
    <input type="submit" name="option" value="Login"><br>
    </form>
</body>
</html>