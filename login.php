<?php

include("./controller/connection.php");
include("./view/header.php");
$id = $password = "";

?>
    <form action="login.php" method="POST">
    
    <label for="id">id:</label><br>
    <input type="text" name="id" maxlength="255"><br><br>
    
    <label for="password">Contraseña:</label><br>
    <input type="password" name="password" maxlength="24"><br><br>

    <input type="submit" value="Login"><br>
    </form>
<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $id = $_POST['id'];
    $password = $_POST['password'];
    $_SESSION['id']=$id;
    
    $sql ="SELECT * FROM admin WHERE id_admin='$id' and password_admin='$password'";
    $result = $con -> query($sql);
    
    if ($result-> num_rows > 0){
   
        header('Location:./admin/indexAdmin.php');
        
    }else{
        echo "Error, contrasenia o id de administrador no valido";
    }
        
    // $result -> free_result;
    // mysqli_close($con);
}

















// include("./view/footer.php"); ?>