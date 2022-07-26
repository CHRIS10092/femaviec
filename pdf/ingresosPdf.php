<style type="text/css">
	table {
   width: 100%;
   border: 1px solid #999;
   text-align: left;
   border-collapse: collapse;
   margin: 0 0 1em 0;
   caption-side: top;
}
caption, td, th {
   padding: 0.3em;
}
th, td {
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
require_once'../modelos/reportes.php';
$obj=new reportes();
?>
<?php $row=$obj->ingresos();?>
<center><h3>Listado de Fechas de Ingresos al  Sistema Ocupacional</h3></center>
<table>
	<thead style="background: #26c6da;color: white;font-weight: bolder;">
	<tr>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Fecha de Inicio</th>
		<th>Historia</th>
		<th>Puesto</th>
	</tr>
	</thead>
 	<?php foreach ($row as $k): ?>
 		<tr>
 			<td><?php echo $k['primer_nombre'].' '.$k['segundo_nombre']; ?></td>
 			<td><?php echo $k['apellido_paterno'].' '.$k['apellido_materno']; ?></td>
 			<td><?php echo $k['fecha_inicio']; ?></td>
 			<td><?php echo $k['historia']; ?></td>
 			<td><?php echo $k['puesto']; ?></td>
 		</tr>
 		
 	<?php endforeach ?>
</table>
<center><h3>Numero de Ingresos por Fechas</h3></center>
<?php $row1=$obj->grafico_ingreso(); ?>
<?php foreach ($row1 as $k): ?>
	<?php echo "fecha: ".$k['fecha_inicio']; ?>
	<div  style="width:<?php echo $k['cont'] ?>%;border: solid 1px black;height: 5%;background: green;"></div><?php echo $k['cont']; ?><br>
<?php endforeach ?>