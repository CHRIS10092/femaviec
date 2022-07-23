<style type="text/css">


caption,
td,
th {
    padding: 0.1em;
}

th,

caption {
    font-weight: bold;
    font-style: italic;
}
</style>
<?php
require_once '../modelos/reportes.php';
$obj = new reportes();
?>
<?php $row = $obj->usuarios(); ?>
<center>
    <h3>Listado de Usuarios del Sistema Avicola </h3>
</center>
<table class="table table-hover" width="90%">
    <thead style="background: #26c6da;color: white;font-weight: bolder;">
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Cedula</th>
            <td>Correo</td>
        </tr>
    </thead>
    <?php foreach ($row as $k) : ?>
    <tr>
        <td><?php echo $k['nombre'] ; ?></td>
        <td><?php echo $k['apellido'] ; ?></td>
        <td><?php echo $k['cedula']; ?></td>
        <td><?php echo $k['correo']; ?></td>
    </tr>

    <?php endforeach ?>
</table>
<!--<center>
    <h3>Numero de Grupos de Usuarios</h3>
</center>-->

