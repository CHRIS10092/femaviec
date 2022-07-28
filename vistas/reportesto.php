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
                    <center>
                        <h4><i class="fa fa-file"></i> Generar Reportes </h4>
                    </center>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<div class="box box-danger">
    <div class="box-header with-border">
        
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-4">
                <form id="frm-opcion">
                    
                    <label>
                        <div class="iradio_minimal-red">
                            <input type="radio" name="reportes" value="1" class="minimal-red">
                            <span>Seleccione reporte por Usuarios del Sistema </span>
                        </div>
                        
                    </label>
                    <hr>
                    <label>
                        <div class="iradio_minimal-red">
                            <input type="radio" name="reportes" value="2" class="minimal-red">
                            <span>Reporte de galpones, aves y lotes </span>
                        </div>
                        
                    </label>

                    <hr>
                  <label>
                        <div class="iradio_minimal-red">
                            <input type="radio" name="reportes" value="3" class="minimal-red">
                            <span>Reporte de producción por mes y año </span>
                        </div>
                        
                    </label>

                    <hr>

                    <label>
                        <div class="iradio_minimal-red">
                            <input type="radio" name="reportes" value="4" class="minimal-red">
                            <span>Reporte de insumos de cuidado </span>
                        </div>
                        
                    </label>

                    <hr>
                    <label>
                    <div class="iradio_minimal-red">
                            <input type="radio" name="reportes" value="5" class="minimal-red">
                            <span>Reporte de datos pollos </span>
                        </div>
                    </label>

                </form>
                <center><button class="btn btn-success" id="btn-generar"> Generar Reporte</button></center><br>
            </div>
            <div class="col-md-8">
                <div id="grafico"></div>
                <div id="listado"></div>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<?php require_once '../contenido/foot.php' ?>
<script src="../helpers/reportesto.js"></script>
<?php

} else {
	header('location:../');
}
?>