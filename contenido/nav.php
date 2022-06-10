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
						 <i class="menu-icon fa fa-lock red"></i>
							<span class="menu-text">Administración</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/rol.php">

								<i class="fa fa-cogs text-green"></i>
									Roles
								</a>

								<b class="arrow"></b>
							</li>
							<li class="nav-item">
								<a href="../vistas/usuarios.php" class="nav-link">
								<i class="fa fa-users text-red"></i>
									Usuarios
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/empresas.php">

									<i class="fa fa-building-o text-blue"></i>
									Sucursales
								</a>

								<b class="arrow"></b>
							</li>
								<li class="">
								<a href="../vistas/reportes.php">

									<i class="fa fa-building-o text-blue"></i>
									Respaldo Usuario
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

					</li>
					
				
	               
				
					<li class="">
						<a href="cliente.php" class="dropdown-toggle">
							<i class="menu-icon fa fa-wrench yellow"></i>
							<span class="menu-text">Producción</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/galpones.php">
								<i class="fa fa-university text-blue"></i>
									Galpones 
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/alimentacion.php">
									<i class="fa fa-cutlery text-danger"></i>
									Actividades
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/empleados.php">

									<i class="fa  fa-odnoklassniki text-success"></i>
									Cuidador
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/insumosproduccion.php">
								<i class="fa fa-heart text-aqua"></i> 
									Insumos
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/datospollos.php">

									<i class="fa fa-file-code-o text-warning"></i>
									Datos Pollos
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>

						<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog green"></i>
							<span class="menu-text">Control</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/htemperatura.php">

									<i class="fa fa-eyedropper text-warning"></i>
									Herramientas T
								</a>

								<b class="arrow"></b>
							</li>
							<li class="nav-item">
								<a href="../vistas/ptemperatura.php" class="nav-link">
								<i class="fa fa-print text-success"></i>
									Parámetros
								</a>

								<b class="arrow"></b>
							</li>
								<li class="nav-item">
								<a href="../vistas/buscador.php" class="nav-link">
								<i class="fa fa-print text-success"></i>
									Control de  Ingresos
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>

					</li>
					
						<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-line-chart pink"></i>
							<span class="menu-text">Monitoreo</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/vergalpones.php">

									<i class="fa fa-power-off text-warning"></i>
									Registro de Encendido
								</a>

								<b class="arrow"></b>
							</li>
							<li class="nav-item">
								<a href="../vistas/envios.php" class="nav-link">
								<i class="fa fa-exclamation-triangle text-info"></i>
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

									<i class="fa fa-home text-danger"></i>
									Paso de agua
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>

					</li>
					
					<?php endif ?>
						<?php if ($_SESSION['usuarios'][4]==2): ?>
						               
				
					<li class="">
						<a href="cliente.php" class="dropdown-toggle">
							<i class="menu-icon fa fa-wrench yellow"></i>
							<span class="menu-text">Producción</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/galpones.php">
								<i class="fa fa-university text-blue"></i>
									Galpones 
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/alimentacion.php">
									<i class="fa fa-cutlery text-danger"></i>
									Actividades
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/empleados.php">

									<i class="fa  fa-odnoklassniki text-success"></i>
									Cuidador
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/insumosproduccion.php">
								<i class="fa fa-heart text-aqua"></i> 
									Insumos
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="../vistas/datospollos.php">

									<i class="fa fa-file-code-o text-warning"></i>
									Datos Pollos
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>

						<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cog green"></i>
							<span class="menu-text">Control</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/htemperatura.php">

									<i class="fa fa-eyedropper text-warning"></i>
									Herramientas T
								</a>

								<b class="arrow"></b>
							</li>
							<li class="nav-item">
								<a href="../vistas/ptemperatura.php" class="nav-link">
								<i class="fa fa-print text-success"></i>
									Parámetros
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>

					</li>
					
						<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-line-chart pink"></i>
							<span class="menu-text">Monitoreo</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="../vistas/envios.php">

									<i class="fa fa-power-off text-warning"></i>
									Registro de Encendido
								</a>

								<b class="arrow"></b>
							</li>
							<li class="nav-item">
								<a href="../vistas/envios.php" class="nav-link">
								<i class="fa fa-exclamation-triangle text-info"></i>
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

									<i class="fa fa-home text-danger"></i>
									Paso de agua
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>

					</li>
					
					<?php endif ?>
						<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file blue"></i>
							<span class="menu-text">Reportes</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
							<li class="">
								<a href="../vistas/reporte_compras.php">
								<i class="fa fa-chart" aria-hidden="true"></i>
									Producción por Mes y Año
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>


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
