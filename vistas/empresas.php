<?php 
session_start();
if (isset($_SESSION['usuarios'])) {
 ?>
<?php require_once '../contenido/head.php' ?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<!-- /.box-header -->
			<div class="box-body">

				<div class="alert alert-danger alert-dismissible">
					<center><h4><i class="fa fa-home"></i> Registro de Sucursales</h4></center>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>
<div class="box box-danger">
	<div class="box-header with-border">
		<h4 class="box-title">Listado de Empresas</h4>
		<button class="btn btn-warning btn-group-lg" data-toggle="modal" data-target="#m-servicio">
			<i class="fa fa-plus"></i> Nuevo
		</button>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div id="listado"></div>
	</div>
	<!-- /.box-body -->
</div>
<!-- Modal registro -->
<div class="modal fade" id="m-servicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4  id="exampleModalLabel">Nueva Empresa</h4>
			</div>
			<div class="modal-body">
				<form id="frm-servicios">
					<div class="form-group">
						<label for="txt-ruc" class="col-md-2 control-label">Ruc:</label>
						<div class="col-md-8">
							<input type="text" name="ruc"  id="txt-ruc" class="form-control input-sm" onkeypress="return solo_numeros(event)" maxlength="13">
						</div>
					</div><br><br>
					<div class="form-group">
						<label for="txt-nombre" class="col-md-2 control-label">Nombre:</label>
						<div class="col-md-8">
							<input type="text" name="nombre"  id="txt-nombre" class="form-control input-sm" onkeypress="return solo_letras(event)">
						</div>
					</div><br><br>
					<div class="form-group">
						<label for="cmb-ciudad" class="col-md-2 control-label">Ciudad:</label>
						<div class="col-md-8">
							<select class="form-control input-sm" name="ciudad" id="cmb-ciudad">
								<option value="0">--Seleccionar--</option>
								<option value="Quito">Quito</option>
								<option value="Guayaquil">Guayaquil</option>
								<option value="Cuenca">Cuenca</option>
							</select>
						</div>
					</div><br><br>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btn-registrar">
					Guardar <i class="glyphicon glyphicon-floppy-disk"></i>
				</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="m-serviciou" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4  id="exampleModalLabel">Editar Datos</h4>
			</div>
			<div class="modal-body">
				<form id="frm-serviciosu">
					<input type="hidden" name="id" id="txt-id">
					<div class="form-group">
						<label for="txt-rucu" class="col-md-2 control-label">Ruc:</label>
						<div class="col-md-8">
							<input type="text" name="ruc"  id="txt-rucu" class="form-control input-sm" onkeypress="return solo_numeros(event)" maxlength="13">
						</div>
					</div><br><br>
					<div class="form-group">
						<label for="txt-nombreu" class="col-md-2 control-label">Nombre:</label>
						<div class="col-md-8">
							<input type="text" name="nombre"  id="txt-nombreu" class="form-control input-sm" onkeypress="return solo_letras(event)">
						</div>
					</div><br><br>
					<div class="form-group">
						<label for="cmb-ciudad" class="col-md-2 control-label">Ciudad:</label>
						<div class="col-md-8">
							<select class="form-control input-sm" name="ciudad" id="cmb-ciudadu">
								<option value="0">--Seleccionar--</option>
								<option value="Quito">Quito</option>
								<option value="Guayaquil">Guayaquil</option>
								<option value="Cuenca">Cuenca</option>
							</select>
						</div>
					</div><br><br>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="btn-editar">
					Editar <i class="glyphicon glyphicon-floppy-disk"></i>
				</button>
			</div>
		</div>
	</div>
</div>

<?php require_once '../contenido/foot.php'?>
<script src="../helpers/empresas.js"></script>
<?php } else {
    header("location: ../");
}
?>
