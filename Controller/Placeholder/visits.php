<?php
    include("headerAdmin.php");
?>

<fieldset>
    <legend><b><i>Pedidos para el dia de hoy:</i></b></legend>

    <div class="table">
        <script src="../../JS/SortTable.js"></script>
        <?php
            $current_day = date('Y-m-d');
            $sql = "SELECT nombre, hora FROM visita WHERE dia = '$current_day' ORDER BY hora;";
            $result = $con->query($sql);
            if($result->num_rows > 0){
                echo '<table>
                <tr>
                    <th onclick="sortTable(0, false)">Nombre</th>
                    <th onclick="sortTable(1, false)">Hora</th>
                    <th onclick="sortTable(2, true)">Total Pedido($)</th>
                    <th onclick="sortTable(3, true)">Descripcion del pedido</th>
                    <th onclick="sortTable(4, true)">Estado</th>
                </tr>';
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>".$row["nombre"]."</td>
                        <td>".$row["hora"]."</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    
                    </tr>
                    ";
                }
                echo "</table>";
            } else {
                echo "<center><strong>No hay Visitas agendadas para hoy.</center></strong>";
            }
        ?>
    </div>
</fieldset>
