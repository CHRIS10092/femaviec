<?php 
session_start();
date_default_timezone_set("America/Guayaquil");
$fecha = date("Y-m-d");
if (isset($_SESSION['usuarios'])) {
 ?>

<?php require_once '../contenido/head.php' ?>
<h2 class="blue">
	<i class="ace-icon fa fa-bar-chart bigger-110"></i>
Ver Reportes de Insumos en la Producción 
</h2>
<div class="row">
	
<div class="col-md-12 col-sm-10 widget-container-col ui-sortable" id="widget-container-col-4">
	<div class="widget-box ui-sortable-handle" id="widget-box-5">
		<div class="widget-header widget-header-large">
			<h4 class="widget-title">Registros por fechas</h4>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<div class="row">
					<div id="alertas"></div>
					<div class="col-md-5">
						<label>Desde</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar bigger-110"></i>
							</span>

							<input class="form-control" type="date" value="<?php echo $fecha; ?>" name="date-range-picker" id="txt-desde">
						</div>
					</div>
					<div class="col-md-5">
						<label>Hasta</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar bigger-110"></i>
							</span>

							<input class="form-control" type="date" value="<?php echo $fecha; ?>" name="date-range-picker" id="txt-hasta">
						</div>
					</div>
					<div class="col-md-2"><br>
						<button class="btn btn-purple " style="margin-top:1px" id="btn-reporte-fecha">
							Generar
						</button>
					</div>
				</div><br>
				<div id="list-compras-fechas"></div>
			</div>
		</div>
	</div>
</div>
</div>

<?php require_once '../contenido/foot.php' ?>
<script src="../helpers/reportesinsumo.js"></script>
<?php } else {
    header("location: ../");
}
?>
