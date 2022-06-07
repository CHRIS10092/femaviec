<?php 
session_start();
if (isset($_SESSION['usuarios'])) {

	require_once'../modelos/usuarios.php';
	$maqv_obj=new usuarios();
	$maqv_result=$maqv_obj->informacion_usuario($_SESSION['usuarios'][0]);
	foreach ($maqv_result as $key) {
		$nombre=$key["nombre"]." ".$key["apellido"];
		$correo=$key["correo"];
		$rol=$key["rol"];
		$usuario=$key["usuario"];
		$clave=$key["clave"];
	}
 ?>

<?php require_once '../contenido/head.php' ?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-danger">
			<!-- /.box-header -->
			<div class="box-body">

				<div class="alert alert-danger alert-dismissible">
					<center><h4><i class="fa fa-user"></i> Perfil de Usuario</h4></center>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>
<div class="box box-primary">
	<div class="box-header with-border">
		<h4 class="box-title">Ver Datos de Usuario <i class="fa fa-eye"></i></h4>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#informacion" data-toggle="tab">Informacion</a></li>
						<li><a href="#editar" data-toggle="tab">Editar Perfil</a></li>
					</ul>
					<div class="tab-content">
						<div class="active tab-pane" id="informacion">
							<div class="row">
								<div class="col-md-5">
									<div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../template/dist/img/user2-160x160.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $nombre; ?></h3>

              <p class="text-muted text-center">Perfil: <?php echo $rol; ?></p>

              <ul class="list-group list-group-unbordered">
              	 <li class="list-group-item">
                  <b>Usuario</b> <a class="pull-right"><?php echo $usuario; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Correo</b> <a class="pull-right"><?php echo $correo; ?></a>
                </li>
               
              </ul>
            </div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="editar">
							<div class="row">
								<div class="col-md-4"><hr>
									<center><label>Usuario Actual</label><br>
									<span><?php echo $usuario; ?></span><br></center>
									<label>Nuevo Usuario</label>
									<input type="text" id="txt-usuario" class="form-control"><br>
									<center><button class="btn btn-success" id="btn-usuario">
										Actualizar Usuario
									</button></center>
								</div>

								<div class="col-md-4"><hr>
									<input type="hidden"  id="txt-clave" value="<?php echo $clave; ?>">
									<center><label>Clave Actual</label>
									<input type="password" id="txt-clave-actual" class="form-control">
									<label>Clave Nueva</label>
									<input type="password" id="txt-clave-nueva" class="form-control">
									<label>Repita la Clave Nueva</label>
									<input type="password" id="txt-clave-repita" class="form-control"><br>
									<center><button class="btn btn-danger" id="btn-clave">
										Cambiar Clave
									</button></center>
								</div>
							</div>
						</div>
					</div>
					<!-- /.tab-content -->
				</div>
			</div>
		</div>
	</div>
	<!-- /.box-body -->
</div>


<?php require_once '../contenido/foot.php' ?>
<script src="../helpers/perfil.js"></script>
<?php } else {
    header("location: ../");
}
?>
