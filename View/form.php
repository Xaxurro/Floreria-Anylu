<?php
    include("./Templates/header.php");

    if($_POST){
        $nombre = $_POST['name'];
        $correo = $_POST['mail'];
        $telefono = $_POST['phone'];
        $dia = $_POST['date'];
        $hora = $_POST['hour'];
        $descripcion = $_POST['description'];
        $sql = "INSERT INTO visita(nombre, correo, telefono, descripcion, id_carrito, dia, hora) VALUES ('$nombre', '$correo', '$telefono', '$descripcion', ".$_SESSION["id_carrito"].", '$dia', '$hora');";
        if($con->query($sql)) {
            unset($_SESSION["user"]);
            header("Location: index.php");
        } else {
            echo "No se inserto<br><br>";
        }
    }
?>

<body>
    <form method="POST" action="form.php">
        <center><h1>INGRESE SUS DATOS</h1><br>
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="name" placeholder="Nombre Apellido" required><br><br>
        <label for="phone">Telefono:</label><br>
        <input type="text" name="phone" maxlength="255" required></input><br><br>
        <label for="mail">Correo:</label><br>
        <input type="mail" id="mail" name="mail" placeholder="Example@example.com" required><br><br>
        <label for="date">Selecciona un dia para su visita!</label><br>
        <input type="date" id="date" min="<?php echo date('Y-m-d')?>" name="date" required><br><br>
        <label for="hour">Selecciona la hora de tu visita!</label><br>
        <input type="time" id="hour" name="hour" required><br><br>
        <label for="description">Descripcion:</label><br>
        <textarea name="description" id="description" name="description" cols="50" rows="10"></textarea><br>
        <button type="submit" value="Enviar">Enviar</button></center>
    </form>
</body>
<?php
    include("./Templates/footer.php");
?>