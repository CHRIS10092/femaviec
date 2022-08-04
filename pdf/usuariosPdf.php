<style type="text/css">
table {
    width: 90%;
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
    width: 220px;
    heigth: 12px;
    margin-left:253px;
}
.centro{
    float:center;
    
     /*border: 1px solid #999;*/
    }
.derecha{
    float:right;
    
     /*border: 1px solid #999;*/
    }
    .izquierda{
        float:left;
        font-size:12px;
        margin-top:0px;
    margin-bottom: 0px;
    padding-left:40px;

        /*border: 1px solid #999;*/
    }

</style>
<?php
require_once '../modelos/reportes.php';
$obj = new reportes();
?>
<?php $row = $obj->usuarios(); ?>
<div class="row">

<div class="derecha">
<p style="font-size:16px;padding-top: -4px;margin-top:-3px;">Dirección:Bucay</p>
<p style="font-size:16px;padding-top: -4px;margin-top:-3px;">Página Web:Femavi.com.ec</p>
<p style="font-size:16px;padding-top: -4px;margin-top:-3px;">Correo:correo@femavi.com.ec</p>
</div>
<div class="centro">
<img src="../../img/f.png">

</div>
<div class="izquierda">
<p style="font-size:16px;padding-top: 1px;margin-top:-3px;">RUCCI:1725261521001</p>
<p style="font-size:16px;padding-top: -4px;margin-top:-3px;">Teléfono:0980073905</p>

</div>
</div>
<br>
<br>
<br>
<br>
<br>
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

