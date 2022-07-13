<?php

include("./controller/connection.php");
include("./view/header.php");

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
}?>
    <form action="login.php" method="POST">
    <p>id:<input type="text" name="id" maxlength="255"></p>
    <p>Contraseña:<input type="password" name="password" maxlength="24"></p>
    <input type="submit" name="option" value="Login"><br>
    </form>
<?php include("./view/footer.php"); ?>