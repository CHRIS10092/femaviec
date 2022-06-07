<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title></title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="../contenido/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../contenido/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../contenido/assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="../contenido/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="../contenido/assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../contenido/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="../contenido/librerias/alertifyjs/css/alertify.css">
		<link rel="stylesheet" href="../template/assets/alertas/toastr.min.css">
		<link rel="stylesheet" type="text/css" href="../contenido/assets/css/select2.min.css">
		<script src="../contenido/assets/js/ace-extra.min.js"></script>
		<script src="../contenido/assets/js/ace-extra.min.js"></script>
	</head>
	<body class="skin-1">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a  class="navbar-brand">
						<small>
							<i class="fa fa-list"></i>
						   SISTEMA AVICOLA FEMAVI 
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="../img/avicola.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>BIENVENIDO</small>
									 <p>
                                        <?php echo $_SESSION['usuarios'][1] . " " . $_SESSION['usuarios'][2] ?><br>
                                        <?php echo 'PERFIL: ' . $_SESSION['usuarios'][3] ?>
                                    </p>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="../vistas/perfil.php">
										<i class="ace-icon fa fa-user"></i>
										Perfil
									</a>
								</li>
								<li class="divider"></li>
								<li>
									 <a onclick="salir();">
										<i class="ace-icon fa fa-power-off"></i>
										Salir
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<?php include 'nav.php'; ?>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">

					<div class="page-content">

						<div class="row">
							<div class="col-xs-12">