<?php 
require_once'../../modelos/reportes.php';
$obj=new reportes();
?>
 <?php if($_POST['reportes']==1){ $row=$obj->usuarios();?>
<table class="table table-striped">
	<tr>
		<td colspan="4">
			<center><a href="../controladores/pdf/usuarios.php" target="_blank" class="btn btn-danger">Pdf</a><a href="../excel/usuariosXls.php" target="_blank" class="btn btn-success">Excel</a></center>
		</td>
	</tr>
	<tr>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Cédula</th>
		<th>Correo</th>
	</tr>
 	<?php foreach ($row as $k): ?>
 		<tr>
 			<td><?php echo $k['nombre']; ?></td>
 			<td><?php echo $k['apellido']; ?></td>
 			<td><?php echo $k['cedula']; ?></td>
 			<td><?php echo $k['correo']; ?></td>
 		</tr>
 		
 	<?php endforeach ?>
</table>
 

 <?php } else if($_POST['reportes']==2){ $row=$obj->ingresos();?>
<table class="table table-striped">
	<tr>
		<td colspan="6">
			<center><a href="../controladores/pdf/ingresos.php" target="_blank" class="btn btn-danger">Pdf</a><a href="../excel/ingresosXls.php" target="_blank" class="btn btn-success">Excel</a></center>
		</td>
	</tr>
	<tr>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Fecha de Inicio</th>
		<th>Historia</th>
		<th>Puesto</th>
	</tr>
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
<?php } else if($_POST['reportes']==3){ $row=$obj->atenciones();?>
<table class="table table-striped">
	<tr>
		<th>Usuario</th>
		<th>Numero de Atenciones</th>
		<th>Historia</th>
		<th>Ver</th>
	</tr>
 	<?php foreach ($row as $k): ?>
 		<tr>
 			<td><?php echo $k['usuario']; ?></td>
 			<td><?php echo $k['cont']; ?></td>
 			<td><?php echo $k['historia']; ?></td>
 			<td>
 				<a target="_blank" href="../controladores/pdf/evaluacion.php?id=<?php echo $k['idficha']; ?>" class="btn btn-danger"> Pdf</a>
 			</td>
 		</tr>
 		
 	<?php endforeach ?>
</table>
 
<?php } ?>