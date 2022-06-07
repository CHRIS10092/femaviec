
<?php 
require_once'../modelos/reporte.php';
$adchb_data=new reporte(); 
?>
<style type="text/css">
	*{
		margin: 0;
		padding-right: 10px;
		padding-left: 10px;
	}
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
<span style="display:block;text-align: right;font-size: 18px;color: #F73E07;margin-bottom:75px; ">Reporte  Por Fechas</span>
<center><h3>FECHAS <?php echo $_GET['desde'] ?> al <?php echo $_GET['hasta'] ?></h3></center><br>
<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>CEDULA</th>
			<th>NOMBRE</th>
			<th >APELLIDO</th>
			<th >TEMPERATURA</th>
			<th>CARGO</th>
			<th>REGISTRO</th>
			

		</tr>
	</thead>
	<tbody>
		<?php echo $adchb_data->FechasCompras($_GET['desde'],$_GET['hasta']); ?>
	</tbody>
</table>
<hr style="border: 1px solid blue;">
