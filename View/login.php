<?php
    include("./Templates/header.php");
    if($_POST){
        $_SESSION['user'] = $Usuario = $_POST['user'];
        $password = $_POST['password'];
        
        $sql ="SELECT * FROM admin WHERE usuario = '$Usuario' AND contraseña = '$password';";
        $result = $con -> query($sql);
        
        if ($result-> num_rows > 0){
            header('Location:../Controller/Placeholder/indexAdmin.php');
        } else {
            echo "Error, contraseña o id de administrador no valido";
        }
        $con->close();
    }
?>
    <fieldset>
        <legend><b><i>Inicie Sesion:</i></b></legend>
        <center>
            <br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <label for="user">Usuario:</label><br>
                <input type="text" name="user" maxlength="255"><br><br>
                
                <label for="password">Contraseña:</label><br>
                <input type="password" name="password" maxlength="24"><br><br>
                
                <input type="submit" value="Login"><br>
            </form>
            <br>
        </center>
    </fieldset>
<?php
include("./Templates/footer.php"); 
?>