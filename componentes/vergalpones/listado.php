<?php
require_once "../../modelos/galpones.php";
$obj = new  galpones();
$datos = $obj->listar_datospollos($_GET["galpon"], $_GET['lote']);
?>
<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Galpon</th>
            <th>Lote</th>
            <th>Numero pollos</th>
            <th>temperatura Max</th>
            <th>temperatura Min</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>

        <tr>
            <td><?php echo  $dato["codigo"] ?> </td>
            <td><?php echo  $dato["numero"] ?> </td>
            <td><?php echo  $dato["lote"] ?> </td>
            <td><?php echo  $dato["maximotem"] ?> </td>
            <td><?php echo  $dato["minimotem"] ?> </td>
            <td><?php echo  $dato["maximohum"] ?> </td>
            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
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
            <th>Correo</th>
            <th>Enviar Correo</th>

            
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
                <td><input type="text" name="correo" id="txt-correo"></td>
                <td><button onclick="sendEmail();">Enviar</button></td>
                

            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

 