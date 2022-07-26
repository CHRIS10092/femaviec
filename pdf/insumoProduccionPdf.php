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
img{
    width: 420px;
    heigth: 12px;
    margin-left:323px;
}
.derecha{
    float:right;
    
     /*border: 1px solid #999;*/
    }
    .izquierda{
        float:left;
        font-size:12px;
        margin-top:30px;
    margin-bottom: 0px;
    padding-left:40px;

        /*border: 1px solid #999;*/
    }
</style>
<?php
require_once '../modelos/reportes.php';
$obj = new reportes();
?>
<?php $row = $obj->insumoProduccion(); ?>

<div class="row">
<div class="derecha">
<img src="../../img/f.png">
</div>
<div class="izquierda">
<p style="font-size:16px;padding-top: 1px;margin-top:-3px;">RUCCI:1725261521001</p>
<p style="font-size:16px;padding-top: -4px;margin-top:-3px;">Teléfono:0980073905</p>
<p style="font-size:16px;padding-top: -4px;margin-top:-3px;">Dirección:Bucay</p>
<p style="font-size:16px;padding-top: -4px;margin-top:-3px;">Página Web:Femavi.com.ec</p>
<p style="font-size:16px;padding-top: -4px;margin-top:-3px;">Correo:correo@femavi.com.ec</p>
</div>
</div>

<center>
    <h3>Listado de  Insumo Producción del Sistema Avícola </h3>
</center>
<table>
    <thead style="background: #26c6da;color: white;font-weight: bolder;">
        <tr>
            <th>Codigo</th>
            <th>Articulo</th>
            <th>Cantidad</th>
            <th>Fecha</th>
                <th>Precio U</th>
            <th>Total</th>
        </tr>
    </thead>
    <?php foreach ($row as $k) : ?>
    <tr>
        <td><?php echo $k['codigo'] ?></td>
        <td><?php echo $k['articulo']  ?></td>
        <td><?php echo $k['cantidad']; ?></td>
        <td><?php echo $k['fecha']; ?></td>
            <td><?php echo $k['precioUni']; ?></td>
                <td><?php echo $k['precioTot']; ?></td>
    </tr>

    <?php endforeach ?>
</table>
