<?php
session_start();
require '../contenido/head.php';

if (isset($_SESSION['usuarios'])) { ?>

<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<!-- /.box-header -->
			<div class="box-body">

				
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>

    <hr>
	<h2 class="blue">
		<i class="ace-icon fa fa-bar-chart bigger-110"></i>
		Reportes de Mes y Año
	</h2>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 col-sm-8 widget-container-col ui-sortable" id="widget-container-col-4">
			<div class="widget-box ui-sortable-handle" id="widget-box-4">

				<div class="widget-body">
					<div class="widget-main">
						<div class="row">
							<div id="alertas"></div><br>
						<div class="col-md-3">
							<label>MES DE :</label>
						</div>
						<div class="col-md-4">
							<input type="month" id="txt-mes">
						</div>
						<div class="col-md-3">
							<button class="btn btn-primary" id="btn-buscar"> BUSCAR</button>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div id="resultado1"></div>
		</div>
		
	</div>
     

      
        

    

    <!-- /.box-body -->
</div>
<?php require_once '../contenido/foot.php' ?>
<script src="../helpers/reporte_ordenes.js"></script>
<?php } else {
    header("location: ../");
}
?>
  