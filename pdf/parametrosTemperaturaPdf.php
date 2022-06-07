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
<?php $row = $obj->parametrosTemperatura(); ?>
<center>
    <h3>Listado de  Herramientas del Sistema Avicola </h3>
</center>
<table>
    <thead style="background: #26c6da;color: white;font-weight: bolder;">
        <tr>
           <th>Codigo</th>
            <th>Galpon</th>
            <th>Maxima Temp</th>
            <th>Minimo Temp</th>
            <th>Humedad</th>
            
        </tr>
    </thead>
    <?php foreach ($row as $k) : ?>
    <tr>
        <td><?php echo $k['codigo'] ?></td>
        <td><?php echo $k['galpon']  ?></td>
        <td><?php echo $k['maximotem']; ?></td>
        <td><?php echo $k['minimotem']; ?></td>
        <td><?php echo $k['maximohum']; ?></td>
    </tr>

    <?php endforeach ?>
</table>
