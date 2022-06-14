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
					<center><h4><i class="fa fa-users"></i> Usuarios Registrados</h4></center>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>
<div class="box box-danger">
	<div class="box-header with-border">
		<h4 class="box-title">Listado de Usuarios</h4>
		<button class="btn btn-default btn-group-lg pull-right" data-toggle="modal" data-target="#m-usuario">
			<i class="fa fa-plus"></i> Nuevo
		</button>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div id="listado"></div>
	</div>
	<!-- /.box-body -->
</div>
<div class="modal fade" id="m-perfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4  id="exampleModalLabel">Nuevo Perfil</h4>
			</div>
			<div class="modal-body">
				<form id="frm-perfil">
					<div class="form-group">
					
					
						<label for="txt-usuario" class="col-md-2 control-label">Perfil:</label>
						<div class="col-md-8">
						
						</div>
					</div><br><br>
					<div class="form-group">
						<label for="cmb-mm" class="col-md-2 control-label">Rol de Usuario:</label>
						<div class="col-md-8">
							
						</div>
					</div><br><br>

						<div class="form-group">

						<label for="txt-estado" class="col-md-2 control-label">Estado:</label>
						<div class="col-md-8">
						
						</div><br><br>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btn-jjj">
					Guardar <i class="glyphicon glyphicon-floppy-disk"></i>
				</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal registro -->
<div class="modal fade" id="m-usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4  id="exampleModalLabel">Nuevo Usuario</h4>
			</div>
			<div class="modal-body">
				<form id="frm-usuarios">
					
				<div class="form-group">
						<label for="txt-cedula" class="col-md-2 control-label">Cédula:</label>
						<div class="col-md-8">
							<input type="text" name="cedula"  id="txt-cedula" class="form-control input-sm" onkeypress="return solo_numeros(event)">
						</div>
					</div><br><br><div class="form-group">
						<label for="txt-nombre" class="col-md-2 control-label">Nombre:</label>
						<div class="col-md-8">
							<input type="text" name="nombre"  id="txt-nombre" class="form-control input-sm" onkeypress="return solo_letras(event)">
						</div>
					</div><br><br>
					<div class="form-group">
						<label for="txt-apellido" class="col-md-2 control-label">Apellido:</label>
						<div class="col-md-8">
							<input type="text" name="apellido"  id="txt-apellido" class="form-control input-sm" onkeypress="return solo_letras(event)">
						</div>
					</div><br><br>
					<div class="form-group">
						<label for="txt-correo" class="col-md-2 control-label">Correo:</label>
						<div class="col-md-8">
							<input type="text" name="correo"  id="txt-correo" class="form-control input-sm">
						</div>
					</div><br><br>
					<div class="form-group">
						<label for="txt-usuario" class="col-md-2 control-label">Usuario:</label>
						<div class="col-md-8">
							<input type="text" name="usuario"  id="txt-usuario" class="form-control input-sm">
						</div>
					</div><br><br>
					<div class="form-group">
						<label for="cmb-rol" class="col-md-2 control-label">Rol de Usuario:</label>
						<div class="col-md-8">
							<div id="listado-roles"></div>
						</div>
					</div><br><br>

						<div class="form-group">

						<label for="txt-estado" class="col-md-2 control-label">Estado:</label>
						<div class="col-md-8">
							<select type="text" name="estado"  id="txt-estado" class="form-control input-sm">
								<option value="Act">Activo</option>
								<option value="Ina">Inactivo</option>
							</select>
						</div><br><br>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btn-guardar">
					Guardar <i class="glyphicon glyphicon-floppy-disk"></i>
				</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal registro -->
<div class="modal fade" id="m-usuariou" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4  id="exampleModalLabel">Editar Usuario</h4>
			</div>
			<div class="modal-body">
				<form id="frm-usuariosu">
				<div class="form-group">
				<input type="hidden" name="id" id="txt-id">
						<label for="txt-cedulau" class="col-md-2 control-label">Cedula:</label>
						<div class="col-md-8">
							<input type="text" name="cedulau"  id="txt-cedulau" class="form-control input-sm" onkeypress="return solo_numeros(event)">
						</div>
					</div><br><br>
					<div class="form-group">
						
						<label for="txt-nombreu" class="col-md-2 control-label">Nombre:</label>
						<div class="col-md-8">
							<input type="text" name="nombreu"  id="txt-nombreu" class="form-control input-sm" onkeypress="return solo_letras(event)">
						</div>
					</div><br><br>
					<div class="form-group">
						<label for="txt-apellidou" class="col-md-2 control-label">Apellido:</label>
						<div class="col-md-8">
							<input type="text" name="apellidou"  id="txt-apellidou" class="form-control input-sm" onkeypress="return solo_letras(event)">
						</div>
					</div><br><br>
					<div class="form-group">
						<label for="txt-correou" class="col-md-2 control-label">Correo:</label>
						<div class="col-md-8">
							<input type="text" name="correou"  id="txt-correou" class="form-control input-sm">
						</div>
					</div><br><br>
					<div class="form-group">
						<label for="txt-usuariou" class="col-md-2 control-label">Usuario:</label>
						<div class="col-md-8">
							<input type="text" name="usuariou"  id="txt-usuariou" class="form-control input-sm">
						</div>
					</div><br><br>
					<div class="form-group">
						<label for="cmb-rolu" class="col-md-2 control-label">Rol de Usuario:</label>
						<div class="col-md-8">
							<div id="listado-rolesu"></div>
						</div>

					</div><br></br>
					<div class="form-group">
					<label for="txt-estadou" class="col-md-2 control-label">Estado:</label>
						<div class="col-md-8">
							<select type="text" name="estadou"  id="txt-estadou" class="form-control input-sm">
								<option value="Act">Activo</option>
								<option value="Ina">Inactivo</option>
							</select>
						</div>
</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="btn-editar">
					Actualizar <i class="glyphicon glyphicon-floppy-disk"></i>
				</button>
			</div>
		</div>
	</div>
</div>
<?php require_once '../contenido/foot.php' ?>

    

<script src="../helpers/usuarios.js"></script>
<?php } else {
    header("location: ../");
}
?>
