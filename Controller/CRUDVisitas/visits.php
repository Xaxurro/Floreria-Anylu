<?php
    include("../Placeholder/headerAdmin.php");
?>

<fieldset>
    <legend><b><i>Pedidos para el dia de hoy:</i></b></legend>

    <center>
        <div class="table">
            <script src="../../JS/SortTable.js"></script>
            <?php
                $current_day = date('Y-m-d');
                $sql = "SELECT nombre, hora, correo, telefono, descripcion, id_carrito FROM visita WHERE dia = '$current_day' AND id_carrito = 0 ORDER BY hora;";
                $result = $con->query($sql);
                if($result->num_rows > 0){
                    ?><table>
                    <tr>
                        <th onclick="sortTable(0, false)">Nombre</th>
                        <th onclick="sortTable(1, false)">Hora</th>
                        <th onclick="sortTable(2, false)">Correo</th>
                        <th onclick="sortTable(3, false)">Teléfono</th>
                        <th onclick="sortTable(4, false)">Descripcion del pedido</th>
                    </tr><?php
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row["nombre"];?></td>
                            <td><?php echo $row["hora"];?></td>
                            <td><?php echo $row["correo"];?></td>
                            <td><?php echo $row["telefono"];?></td>
                            <td><?php 
                                if($row["descripcion"] == Null){
                                    echo 'No tiene.';
                                } else {
                                    echo $row["descripcion"];
                                }
                            ?></td>
                        </tr>
                        <?php
                    }
                    ?></table><?php
                } else {
                    ?><center><strong>No hay Visitas agendadas para hoy.</center></strong><?php
                }
            ?>
        </div>
    </center>
</fieldset>
<?php 
    include("../Placeholder/footerAdmin.php");
?>