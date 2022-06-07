<?php
require_once "../../modelos/galpones.php";
$obj = new  galpones();
$datos = $obj->listar_bebederos($_GET["galpon"], $_GET['lote']);
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>hora</th>
            <th>fecha</th>
            <th>Galpon</th>
            <th>Rango</th>
            <th>Ventilador</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>

        <tr>
            <td><?php echo  $dato["id"] ?> </td>
            <td><?php echo  $dato["hora"] ?> </td>
            <td><?php echo  $dato["fecha"] ?> </td>
            <td><?php echo  $dato["idgalpon"] ?> </td>
            <td><?php echo  $dato["rango"] ?> </td>
                <td><?php   if ($dato["ventilador"]==1) { ?>
                 <img width="40" height="50" src="../img/encendido.gif"> 
                <?php } else {?>
                     <img width="40" height="50" src="../img/apagado.jpg"> 
                <?php } ?> </td>
                

            <td>
                <button class="btn btn-primary">Pdf</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>