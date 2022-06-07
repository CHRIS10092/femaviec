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
<?php $row = $obj->datospollos(); ?>
<center>
    <h3>Listado de Datos Pollos del Sistema Avicola </h3>
</center>
<table>
    <thead style="background: #26c6da;color: white;font-weight: bolder;">
        <tr class="info">
            <th>codigo</th>
            <th>Caso</th>
            <th>Cantidad</th>
            <th>Rango</th>
            <th>Galpon</th>
            <th>Lote</th>
            <th>Responsable</th>
            <th>Observacion</th>
            
        </tr>
    </thead>
    <?php foreach ($row as $k) : ?>
    <tr>
        <td><?php echo $k['codigo'] ?></td>
        <td><?php echo $k['caso']  ?></td>
        <td><?php echo $k['cantidad']; ?></td>
        <td><?php echo $k['rango']; ?></td>
        <td><?php echo $k['galpon']; ?></td>
        <td><?php echo $k['lote']; ?></td>
        <td><?php echo $k['responsable']; ?></td>
        <td><?php echo $k['observacion']; ?></td>
    </tr>

    <?php endforeach ?>
</table>
