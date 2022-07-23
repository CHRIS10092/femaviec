<?php
//print_r($_GET);
require_once "../../modelos/distribuir.php";
$obj = new  distribuir();
$datos = $obj->listar_stock($_GET["lote"], $_GET['galpon']);
?>
<br>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Stock Actual</th>
            <th>IdArticulo</th>
            <th>Articulo</th>
            <th>Cantidad Distribuidos</th>
            <th>Galpon</th>
            
            <th>medidas</th>
            
            <th>estado</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>

        <tr>
            <td> <?php echo  $dato["stock"] ?> </td>
            <td> <?php echo  $dato["codigo"] ?> </td>
            <td> <?php echo  $dato["articulo"] ?> </td>
            <td> <?php echo  $dato["cantidad_distribuidos"] ?> </td>
            <td> <?php echo  $dato["numero"] ?> </td>
            <td> <?php echo  $dato["medidas"] ?> </td>
            
            <td> <?php echo  $dato["estado"] ?> </td>
            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

 