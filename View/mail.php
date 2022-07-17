<?php 
    include("./Templates/header.php");
    if ($_POST){
        $name = $_POST["Name"];
        $mail = $_POST["Mail"];
        $phone = $_POST["Phone"];
        $date = $_POST["Date"];
        $hour = $_POST["Hour"];
        if (!empty($date)){
            $sql = "INSERT INTO visita(nombre, correo, telefono, id_carrito, dia, hora) VALUES ('$name', '$mail', '$phone', 0, '$date', '$hour');";
            if (!($con -> query($sql))){
                echo "Hubo un problema intentelo denuevo.";
            }
        }
    }
?>
<fieldset>
    <legend><b>Agendar Visita:</b></legend>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <br>
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="Name" placeholder="Nombre Apellido"> <br><br>
        <label for="mail">Correo:</label> <br>
        <input type="mail" id = "mail" name="Mail" placeholder="Example@example.com"><br><br>
        <label for="Phone">Telefono:</label><br>
        <input type="text" name="Phone" maxlength="255" required></input><br><br>
        <label for="date">Selecciona un dia para su visita!</label><br>
        <input type="date" id = "date" min="<?php echo date('Y-m-d')?>" name="Date"><br><br>
        <label for="hour">Selecciona la hora de tu visita!</label><br>
        <input type="time" id = "hour" name="Hour"> <br> <br>
        <input type="submit" value="Agendar!"><br><br>

    </form>
</fieldset>

<?php 
    
    include("./Templates/footer.php");
?>
