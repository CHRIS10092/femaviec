
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU DE NAVEGACION</li>
    <?php if ($_SESSION['usuarios'][4] == 1) : ?>
    
    <li>
        <a href="inicio.php">
            <i class="fa fa-home text-blue"></i> <span>Inicio</span>
            
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-lock"></i> <span> Administrar Acceso</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="rol.php"><i class="fa fa-cogs text-green"></i> Rol</a></li>
            <li><a href="usuarios.php"><i class="fa fa-users text-red"></i> Usuarios</a></li>
            <li><a href="empresas.php"><i class="fa fa-building-o text-blue"></i> Sucursal</a></li>
        </ul>
    </li>
    <?php endif ?>
    <?php if ($_SESSION['usuarios'][4] == 1 || $_SESSION['usuarios'][4] == 2) :  ?>
    <li class="treeview"  >
        <a  class="nav-link active"  href="#" >
            <i class="fa fa-wrench text-yellow"></i> <span>Produccion</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu"  >
            <li><a href="galpones.php"><i class="fa fa-university text-blue"></i> Galpones</a></li>
            <li><a href="alimentacion.php"><i class="fa fa-cutlery text-danger"></i> Alimentos</a></li>
            <li><a href="empleados.php"><i class="fa  fa-odnoklassniki text-success"></i>Cuidador</a></li>
            <li><a href="insumosProduccion.php"><i class="fa fa-heart text-aqua"></i> Insumos Producción</a></li>
            <li><a href="insumosCuidador.php"><i class="fa fa-users text-green"></i> Insumos Cuidador</a></li>
            
            <li><a href="datospollos.php"><i class="fa fa-file-code-o text-warning"></i> Datos del Pollo</a></li>

        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-cog text-blue"></i> <span>Control</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
              <li><a href="htemperatura.php"><i class="fa fa-eyedropper text-warning"></i>Herramientas temperatura</a>
          </li>
          <li><a href="ptemperatura.php"><i class="fa fa-thermometer text-red"></i> Parametros de Temperatura</a></li>


        </ul>
    </li>
    <li class="treeview">
        <a href="#" class="nav-link">
            <i class="fa fa-line-chart text-green"></i> <span>Monitoreo</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="vergalpones.php"><i class="fa fa-power-off text-red"></i> Registro de Encendido</a></li>
            <li><a href="envio.php"><i class="fa fa-exclamation-triangle text-blue"></i> Alertas y Control</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-bitbucket text-red"></i> <span>Bebedero</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="envio.php"><i class="fa fa-home text-red"></i> Conttrol de paso de Agua</a></li>
        </ul>
    </li>



    </li>
    <?php endif ?>
    <?php if ($_SESSION['usuarios'][4] == 2) : ?>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-cog text-blue"></i> <span>Control</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
              
            <li><a href="htemperatura.php"><i class="fa fa-eyedropper text-warning"></i>Herramientas temperatura</a>
          </li>
          <li><a href="ptemperatura.php"><i class="fa fa-thermometer text-red"></i> Parametros de Temperatura</a></li>


        </ul>
    </li>
    <?php endif ?>
    <!--<?php if ($_SESSION['usuarios'][4] == 3) : ?>
   

    <?php endif ?>
    -->
    <?php if ($_SESSION['usuarios'][4] == 1 || $_SESSION['usuarios'][4] == 2 || $_SESSION['usuarios'][4] == 3) : ?>
  
    <li class="treeview">
        <a href="#">
            <i class="fa fa-bar-chart text-info"></i> <span>Reportes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="reportes.php"><i class="fa fa-pie-chart text-aqua"></i> Generar</a></li>
            <li><a href="reporte_compras.php"><i class="fa fa-pie-chart text-aqua"></i> Por Mes Año</a></li>
            <li><a href="respaldos.php"><i class="fa fa-pie-chart text-aqua"></i> Respaldos</a></li>
        </ul>
    </li>
    <?php endif ?>
</ul>

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
