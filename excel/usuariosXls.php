<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=usuarios.xls");
 ?>
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
</style>
<?php 
require_once'../modelos/reportes.php';
$obj=new reportes();
?>
<?php $row=$obj->usuarios();?>
<center><h3>Listado de Usuarios del Sistema Femavi</h3></center>
<table>
	<thead style="background: #26c6da;color: white;font-weight: bolder;">
	<tr>
		<td>Nombres</td>
		<td>Apellidos</td>
		<td>Cedula</td>
		<td>Correo</td>
	</tr>
	</thead>
 	<?php foreach ($row as $k): ?>
		<tr>
 			<td><?php echo $k['nombre']; ?></td>
 			<td><?php echo $k['apellido']; ?></td>
 			<td><?php echo $k['cedula']; ?></td>
 			<td><?php echo $k['correo']; ?></td>
 		</tr>
 		
 		
 	<?php endforeach ?>
</table>
