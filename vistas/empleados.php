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
					<center><h4><i class="fa fa-user"></i> Registro del Cuidador</h4></center>
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
		<button class="btn btn-warning btn-group-lg" data-toggle="modal" data-target="#m-servicio">
			<i class="fa fa-plus"></i> Nuevo
		</button>
		<a href="../controladores/pdf/cuidador.php" class="btn btn-danger" target="_blank">
                <i class="fa fa-print">Pdf</i>
            </a>
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
				<h4  id="exampleModalLabel">Nuevo Usuario</h4>
			</div>
			<div class="modal-body">
				<form id="frm-servicios">
					<div class="row">
						<div class="col-md-6">
							<label>Primer Nombre</label>
							<input type="text" name="primerNombre" placeholder="SOLO LETRAS" onkeypress="return solo_letras(event)" id="txt-primerNombre" class="form-control input-sm">
							<label>Apellido Paterno</label>
							<input type="text" name="paterno" placeholder="SOLO LETRAS" onkeypress="return solo_letras(event)" id="txt-paterno" class="form-control input-sm">
							<label>Fecha de Nacimiento</label>
							<input type="date" name="fecha" value="<?php echo $fecha;?>" id="txt-fecha" class="form-control input-sm">
							<label>Sexo</label>
							<select class="form-control input-sm" id="cmb-sexo" name="sexo">
								<option value="0">--seleccionar</option>
								<option value="Masculino">Masculino</option>
								<option value="Femenino">Femenino</option>
							</select>
						</div>
						<div class="col-md-6">
							<label>Segundo Nombre</label>
							<input type="text" name="segundoNombre" placeholder="SOLO LETRAS" onkeypress="return solo_letras(event)" id="txt-segundoNombre" class="form-control input-sm">
							<label>Apellido Materno</label>
							<input type="text" name="materno" placeholder="SOLO LETRAS" onkeypress="return solo_letras(event)" id="txt-materno" class="form-control input-sm">
							<label>Edad</label>
							<input type="text" name="edad" readonly id="txt-edad" class="form-control input-sm">
							<label>Empresa Perteneciente</label>
							<div id="listar-empresas"></div>
						</div>
					</div>
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
					<div class="row">
						<div class="col-md-6">
							<input type="hidden" name="id" id="txt-id">
							<label>Primer Nombre</label>
							<input type="text" name="primerNombre" id="txt-primerNombreu" class="form-control input-sm">
							<label>Apellido Paterno</label>
							<input type="text" name="paterno" id="txt-paternou" class="form-control input-sm">
							<label>Fecha de Nacimiento</label>
							<input type="date" name="fecha" id="txt-fechau" class="form-control input-sm">
							<label>Sexo</label>
							<select class="form-control input-sm" id="cmb-sexou" name="sexo">
								<option value="0">--seleccionar</option>
							<option value="Masculino">Masculino</option>
								<option value="Femenino">Femenino</option>
							</select>
						</div>
						<div class="col-md-6">
							<label>Segundo Nombre</label>
							<input type="text" name="segundoNombre" id="txt-segundoNombreu" class="form-control input-sm">
							<label>Apellido Materno</label>
							<input type="text" name="materno" id="txt-maternou" class="form-control input-sm">
							<label>Edad</label>
							<input type="text" name="edad" readonly id="txt-edadu" class="form-control input-sm">
							<label>Empresa Perteneciente</label>
							<div id="listar-empresasu"></div>
						</div>
					</div>
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
<script src="../helpers/empleados.js"></script>
<?php } else {
    header("location: ../");
}
?>