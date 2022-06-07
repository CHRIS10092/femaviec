<style type="text/css">
table {
    width: 100%;
    border: 1px solid #999;
    text-align: left;
    border-collapse: collapse;
    margin: 0 0 1em 0;
    caption-side: top;
}

caption,
td,
th {
    padding: 0.3em;
}

th,
td {
    border-bottom: 1px solid #999;
    width: 25%;
}

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
<table>
    <thead style="background: #26c6da;color: white;font-weight: bolder;">
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Sexo</th>
            <th>Fecha Nacimiento</th>
        </tr>
    </thead>
    <?php foreach ($row as $k) : ?>
    <tr>
        <td><?php echo $k['primer_nombre'] . ' ' . $k['segundo_nombre']; ?></td>
        <td><?php echo $k['apellido_paterno'] . ' ' . $k['apellido_materno']; ?></td>
        <td><?php echo $k['sexo']; ?></td>
        <td><?php echo $k['fecha']; ?></td>
    </tr>

    <?php endforeach ?>
</table>
<center>
    <h3>Numero de Grupos de Usuarios</h3>
</center>
<?php $row1 = $obj->grafico_usuarios(); ?>
<?php foreach ($row1 as $k) : ?>
<?php echo "sexo: " . $k['sexo']; ?>
<div style="width:<?php echo $k['cont'] ?>%;border: solid 1px black;height: 5%;background: red;"></div>
<?php echo $k['cont']; ?><br>
<?php endforeach ?>