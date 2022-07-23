<?php


session_start();
require '../contenido/head.php';

if (isset($_SESSION['usuarios'])) { ?>

<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<!-- /.box-header -->
			<div class="box-body">

				<div class="alert alert-danger alert-dismissible">
					<center><h4><i class="fa fa-pie-chart"></i> Artículos Distribuidos</h4></center>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>
<h2 class="blue"><b>REPORTES GENERALES</b></h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Numero factura</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody id="tbldetalle"></tbody>
            </table>
        </div>
    </div>

     

      
        

    

    <!-- /.box-body -->
</div>
<?php require_once '../contenido/foot.php' ?>
<script src="../helpers/notascredito.js"></script>
<?php } else {
    header("location: ../");
}
?>
  