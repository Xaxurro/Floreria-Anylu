<?php
    include("./Templates/header.php");
    $id = $password = "";
    if($_POST){
        $id = $_POST['id'];
        $password = $_POST['password'];
        $_SESSION['id']=$id;
        
        $sql ="SELECT * FROM admin WHERE id_admin='$id' and contraseña='$password';";
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
                <label for="id">ID:</label><br>
                <input type="text" name="id" maxlength="255"><br><br>
                
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