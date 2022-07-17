<?php
    include("../Placeholder/headerAdmin.php");
    if($_GET){
        $sql = "SELECT nombre, cantidad FROM producto, carrito_producto WHERE (id = id_producto AND id_carrito = ".$_GET["id"].");";
        $result = $con->query($sql);
        ?>
        <script src="../../JS/sortTable.js"></script>
        <script src="../../JS/filterTable.js"></script>
        <fieldset><legend><b><i>Productos Reservados:</i></b></legend>
            <input type="text" id="filter" onkeyup="filterTable(0)" placeholder="Nombre del producto a buscar...">
            <div class="table">
            <center>
                <table id="table">
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                    </tr><?php
        while($row = $result->fetch_assoc()){
            ?>
                <tr>
                    <td><?php echo $row["nombre"];?></td>
                    <td><?php echo $row["cantidad"];?></td>
                <tr><?php
        }
        ?></table></div>
        <br><a href="productsReserved.php">Volver</a></center></fieldset><br>
        <?php
    }
    include("../Placeholder/footerAdmin.php");
?>