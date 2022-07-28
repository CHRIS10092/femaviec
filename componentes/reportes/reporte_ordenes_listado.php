<?php 
require_once'../../modelos/reporte.php';

$obj=new reporte();
$fecha=explode('-',$_POST['mes']);
$anio=$fecha[0];
$mes=$fecha[1];
$total=0;
$row=$obj->ReporteOrdenesMensuales1($anio,$mes);
 ?>
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