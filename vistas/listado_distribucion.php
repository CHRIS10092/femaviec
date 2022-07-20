<?php 
session_start();
date_default_timezone_set("America/Guayaquil");
$fecha = date("Y-m-d");
if (isset($_SESSION['usuarios'])) {
 ?>
<?php require_once '../contenido/head.php' ?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<!-- /.box-header -->
			<div class="box-body">

				<div class="alert alert-danger alert-dismissible">
					<center><h4><i class="fa fa-user"></i> Listado de Distribuición</h4></center>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>
<div class="box box-danger">
	<div class="box-header with-border">
		<h4 class="box-title">Listado Datos del Cuidador</h4>
		
		<a href="../controladores/pdf/distribucion.php" class="btn btn-danger" target="_blank">
                <i class="fa fa-print">Pdf</i>
            </a>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div id="listado-distri"></div>
	</div>
	<!-- /.box-body -->
</div>

<?php require_once '../contenido/foot.php' ?>

    

<script src="../helpers/distribuir.js"></script>
<?php } else {
    header("location: ../");
}
?>
