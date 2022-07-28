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
 

 <?php } else if($_POST['reportes']==2){ $row=$obj->galpones();?>
<table class="table table-striped">
	<tr>
		<td colspan="6">
			<center><a href="../controladores/pdf/galpones.php" target="_blank" class="btn btn-danger">Pdf</a></center>
		</td>
	</tr>
	<tr>
		<th>Galpon</th>
		<th>Medidas</th>
		<th>Cantidad Pollos</th>
		<th>Galpon</th>
		<th>Medidas</th>
	</tr>
 	<?php foreach ($row as $k): ?>
 		<tr>
 			<td><?php echo $k['numero']; ?></td>
 			<td><?php echo $k['medidas']; ?></td>
 			<td><?php echo $k['n_pollos']; ?></td>
 			<td><?php echo $k['numero']; ?></td>
 			<td><?php echo $k['medidas']; ?></td>
 		</tr>
 		
 	<?php endforeach ?>
</table>
<?php } else if($_POST['reportes']==3){ 		 
		 
	require_once '../../modelos/reporte.php';
	$obj=new reporte();
	date_default_timezone_set("America/Guayaquil");
	$fechat = date("Y-m-d");
	$fecha=explode('-',$fechat);
	$anio=$fecha[0];
	$mes=$fecha[1];
	$total=0;
	$row=$obj->ReporteOrdenesMensuales1($anio,$mes);
	 ?>
	 <input type="hidden" value="" name="fecha" id="txt-fecha">
	 <button style="display:none" id="btn-buscar">  BUSCAR</button>
	 <script type="text/javascript">

$('#btn-buscar').click(function(){
	mes=$('#txt-mes').val();
	if(mes==''){
		mensajes('Seleccionar un mes del anio');
	}else{
		buscar_listado(mes);
		
	}
})

function buscar_listado($mes){
	$.ajax({
		url:'../componentes/reportes/reporte_ordenes_listado.php',
		type: 'POST',
		data: {mes:mes},
	})
	.done(function(r) {
		$('#resultado1').html(r);
	});
	
}
	 </script>
	 <table class="table table-bordered" >
		 <tr class="alert-info">
			 <th colspan="3"><center>Listado de Artículos por Mes y Anio</center></th>
		 </tr>
		 <tr>
			 
			 <th>Código</th>
			 <th>Nombre Artículo</th>
			 <th>Fecha</th>
		 </tr>
		 <?php foreach ($row as $datos): ?>
			 
			 <tr>
				 
				 <td><?php echo $datos['codigo'] ?></td>
				 <td><?php echo $datos['articulo'] ?></td>
				 <td><?php echo date_format(new \DateTime($datos['fecha']),'d-m-Y'); ?></td>
			 </tr>
			 <?php endforeach ?>
		 </table>
		 
	 
<?php } else if($_POST['reportes']==4){ $row=$obj->insumoproduccion();?>
<table class="table table-striped">

<tr>
		<td colspan="6">
			<center><a href="../controladores/pdf/insumoproduccion.php" target="_blank" class="btn btn-danger">Pdf</a></center>
		</td>
	</tr>
	<tr>
		<th>Codigo</th>
		<th>Nombre Articulo</th>
		<th>Cantidad</th>
		
	</tr>
 	<?php foreach ($row as $k): ?>
 		<tr>
 			<td><?php echo $k['codigo']; ?></td>
 			<td><?php echo $k['articulo']; ?></td>
 			<td><?php echo $k['cantidad']; ?></td>

 		</tr>
 		
 	<?php endforeach ?>
</table>
 

<?php } else if($_POST['reportes']==5){ $row=$obj->datospollos();?>
<table class="table table-striped">

<tr>
		<td colspan="6">
			<center><a href="../controladores/pdf/datospollos.php" target="_blank" class="btn btn-danger">Pdf</a></center>
		</td>
	</tr>
	<tr>
		<th>Usuario</th>
		<th>Caso</th>
		<th>Cantidad</th>
		
	</tr>
 	<?php foreach ($row as $k): ?>
 		<tr>
 			<td><?php echo $k['galpon']; ?></td>
 			<td><?php echo $k['caso']; ?></td>
 			<td><?php echo $k['cantidad']; ?></td>

 		</tr>
 		
 	<?php endforeach ?>
</table>
 
<?php } ?>