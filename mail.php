<?php 

include("./controller/connection.php");
include("./view/header.php");

?>
<fieldset>
    <legend><b>Datos:</b></legend>
    <form>
        <br>
        <label for="mail">Correo:</label> <br>
        <input type="mail" id = "mail" name="Mail"><br><br>
        <label for="date">Selecciona un dia para su visita!</label><br>
        <input type="date" id = "date" min="2022-01-01" name="date"><br><br>
        <label for="hour">Selecciona la hora de tu visita!</label><br>
        <input type="time" id = "hour" name="" value="">

    </form>

</fieldset>
