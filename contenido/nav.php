<ul class="nav nav-list">
					<li class="">
						<a href="../vistas/inicio.php" class="nav-link">
							<i class="menu-icon fa fa-home blue"></i>
							<span class="menu-text"> Inicio </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if ($_SESSION['usuarios'][4]==1): ?>
					<li class="">
						<a href="#" class="dropdown-toggle">
						 <img src="../img/icono_administración.png" width="20px" height="20px">
							<span class="menu-text">Administración</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/rol.php">

								<img src="../img/icono_roles_usuarios.png" width="20px" height="20px">
									Crear Rol
								</a>

								<b class="arrow"></b>
							</li>
							<li class="nav-item">
								<a href="../vistas/usuarios.php" class="nav-link">
								<img src="../img/icono_de_usuarios.png" width="20px" height="20px">
									Usuarios
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/empresas.php">

									<img src="../img/icono_sucursales.png" width="20px" height="20px">
									Sucursales
								</a>

								<b class="arrow"></b>
							</li>
								<li class="">
								<a href="../vistas/reportes.php">

									<img src="../img/icono_respaldo_usuarios.png" width="20px" height="20px">
									Respaldo Usuario
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/index.php">

									<img src="../img/icono_base_de_datosmysql.png" width="20px" height="20px">

									Respaldo BD
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

					</li>
					
				
	               
				
					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../img/icono_producción.png" width="20px" height="20px">
							<span class="menu-text">Producción</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/galpones.php">
								<img src="../img/icono_de_galpones.png" width="20px" height="20px">
									Galpones 
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/alimentacion.php">
									<img src="../img/icono_de_actividades.png" width="20px" height="20px">
									Actividades
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/empleados.php">

									<img src="../img/icono_registro_del_cuidador.png" width="20px" height="20px">
									Cuidador
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/insumosproduccion.php">
								<img src="../img/icono_de_insumos.png" width="20px" height="20px">
								
									Insumos
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/listado_distribucion.php">
								<img src="../img/icons8-control-panel-48.png" width="20px" height="20px">
								
									Listado Distribución
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/datospollos.php">

								<img src="../img/icono_registro_de_pollos.png" width="20px" height="20px">
									Datos Pollos
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>

						<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../img/icono_de_control.png" width="20px" height="20px">
							<span class="menu-text">Control</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/htemperatura.php">

								<img src="../img/icons8-high-herramienta.png" width="20px" height="20px">
									Herramientas T
								</a>

								<b class="arrow"></b>
							</li>
							<li class="nav-item">
								<a href="../vistas/ptemperatura.php" class="nav-link">
								<img src="../img/icons8-PARAMETRO.png" width="20px" height="20px">
									Parámetros
								</a>

								<b class="arrow"></b>
							</li>
							
							
						</ul>

					</li>
					
						<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../img/icono_de_monitoreo.png" width="20px" height="20px">
							<span class="menu-text">Monitoreo</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/vergalpones.php">

								<img src="../img/icons-Encendido.png" width="20px" height="20px">
									Registro de Encendido
								</a>

								<b class="arrow"></b>
							</li>
							<li class="nav-item">
								<a href="../vistas/envios.php" class="nav-link">
								<img src="../img/icons-Alerta_Control.png" width="20px" height="20px">
								
									Alertas y Control
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>

					</li>
					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-bitbucket skyblue"></i>
							<span class="menu-text">Bebedero</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/pasoagua.php">
								<img src="../img/icons-Pasodegua.png" width="20px" height="20px">
							

									Paso de agua
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>

					</li>
					
					<?php endif ?>
						
					<?php if ($_SESSION['usuarios'][4]==2 && $_SESSION['usuarios'][4]!=1 ): ?>
						
					<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../img/icono_producción.png" width="20px" height="20px">
							<span class="menu-text">Producción</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/galpones.php">
								<img src="../img/icono_de_galpones.png" width="20px" height="20px">
									Galpones 
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/alimentacion.php">
									<img src="../img/icono_de_actividades.png" width="20px" height="20px">
									Actividades
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/empleados.php">

									<img src="../img/icono_registro_del_cuidador.png" width="20px" height="20px">
									Cuidador
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/insumosproduccion.php">
								<img src="../img/icono_de_insumos.png" width="20px" height="20px">
								
									Insumos
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/listado_distribucion.php">
								<img src="../img/icons8-control-panel-48.png" width="20px" height="20px">
								
									Listado Distribución
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/datospollos.php">

								<img src="../img/icono_registro_de_pollos.png" width="20px" height="20px">
									Datos Pollos
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>

						<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../img/icono_de_control.png" width="20px" height="20px">
							<span class="menu-text">Control</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/htemperatura.php">

								<img src="../img/icons8-high-herramienta.png" width="20px" height="20px">
									Herramientas T
								</a>

								<b class="arrow"></b>
							</li>
							<li class="nav-item">
								<a href="../vistas/ptemperatura.php" class="nav-link">
								<img src="../img/icons8-PARAMETRO.png" width="20px" height="20px">
									Parámetros
								</a>

								<b class="arrow"></b>
							</li>
							
							
						</ul>

					</li>
					
						<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../img/icono_de_monitoreo.png" width="20px" height="20px">
							<span class="menu-text">Monitoreo</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/vergalpones.php">

								<img src="../img/icons-Encendido.png" width="20px" height="20px">
									Registro de Encendido
								</a>

								<b class="arrow"></b>
							</li>
							<li class="nav-item">
								<a href="../vistas/envios.php" class="nav-link">
								<img src="../img/icons-Alerta_Control.png" width="20px" height="20px">
								
									Alertas y Control
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>

					</li>
					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-bitbucket skyblue"></i>
							<span class="menu-text">Bebedero</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/pasoagua.php">
								<img src="../img/icons-Pasodegua.png" width="20px" height="20px">
							

									Paso de agua
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>

					</li>
					
						<?php endif ?>
						<?php if ($_SESSION['usuarios'][4]==3 && $_SESSION['usuarios'][4]!=1): ?>
						
							<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../img/icono_de_control.png" width="20px" height="20px">
							<span class="menu-text">Control</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/htemperatura.php">

								<img src="../img/icons8-high-herramienta.png" width="20px" height="20px">
									Herramientas T
								</a>

								<b class="arrow"></b>
							</li>
							<li class="nav-item">
								<a href="../vistas/ptemperatura.php" class="nav-link">
								<img src="../img/icons8-PARAMETRO.png" width="20px" height="20px">
									Parámetros
								</a>

								<b class="arrow"></b>
							</li>
							
							
						</ul>

					</li>
					
						<li class="">
						<a href="#" class="dropdown-toggle">
							<img src="../img/icono_de_monitoreo.png" width="20px" height="20px">
							<span class="menu-text">Monitoreo</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/vergalpones.php">

								<img src="../img/icons-Encendido.png" width="20px" height="20px">
									Registro de Encendido
								</a>

								<b class="arrow"></b>
							</li>
							<li class="nav-item">
								<a href="../vistas/envios.php" class="nav-link">
								<img src="../img/icons-Alerta_Control.png" width="20px" height="20px">
								
									Alertas y Control
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>

					</li>
					
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-bitbucket skyblue"></i>
							<span class="menu-text">Bebedero</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/pasoagua.php">
								<img src="../img/icons-Pasodegua.png" width="20px" height="20px">
							

									Paso de agua
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>

					</li>
					
					
						<?php endif ?>
						
					<script type="text/javascript">
function salir() {
    alertify.confirm('Confirmar', 'Desea Cerrar la Session ?',
        function() {
            window.location.href = 'salir.php';
        },
        function() {
            alertify.error('ACCION CANCELADA')
        }
    );
}


</script>
