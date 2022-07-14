<?php 

include("../Model/connection.php");
include("./Templates/header.php");

?>
<fieldset>
    <legend><b>Datos:</b></legend>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <br>
        <label for="name">Nombre:</label><br>
        <input type="text" id="name" name="Name" placeholder="Nombre Apellido"> <br><br>
        <label for="mail">Correo:</label> <br>
        <input type="mail" id = "mail" name="Mail" placeholder="Example@example.com"><br><br>
        <label for="date">Selecciona un dia para su visita!</label><br>
        <input type="date" id = "date" min="<?php echo date('Y-m-d')?>" name="Date"><br><br>
        <label for="hour">Selecciona la hora de tu visita!</label><br>
        <input type="time" id = "hour" name="Hour"> <br> <br>
        <input type="submit" value="Agendar!"><br><br>

    </form>
</fieldset>

<?php 
    $Mail = $Date = $Hour = $Name = "";
    if ($_POST)
    {
        $Mail = $_POST["Mail"];
        $Date = $_POST["Date"];
        $Hour = $_POST["Hour"];
        $Name = $_POST["Name"];

        if (!empty($Date)){

            $sql = "INSERT INTO visita VALUES ('$Name','$Mail','$Date','$Hour');";
            
            if ($con -> query($sql)=== TRUE){
                echo "Visita agendada!.";
            }else{
                echo "Hubo un problema intentelo denuevo.";
            }
        }else{
            echo "Ingrese una fecha valida para su visita, intentelo nuevamente";
        }
    }
    include("./Templates/footer.php");
?>
