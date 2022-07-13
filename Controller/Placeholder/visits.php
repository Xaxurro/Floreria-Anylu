<?php include("headerAdmin.php");?>


<fieldset>
    <legend><b><i>Pedidos para el dia de hoy:</i></b></legend>

    <div class="table">
    <table>
        <tr>
            <th>Nombre</th>
            <th>Hora</th>
            <th>Total Pedido($)</th>
            <th>Descripcion del pedido</th>
            <th>Estado</th>
        </tr>
        <?php
        $current_day = date('Y-m-d');
        $sql = "SELECT name, hour FROM visit WHERE day = '$current_day' ORDER BY hour;";
        $result = $con->query($sql);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>".$row["name"]."</td>
                    <td>".$row["hour"]."</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                
                </tr>
                ";
            }
        }
        ?>
    </table>
    </div>
</fieldset>
