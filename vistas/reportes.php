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
        <h4 class="box-title">Reportes</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-4">
                <form id="frm-opcion">
                    <h4>Usuarios del Sistema </h4>
                    <label>
                        <div class="iradio_minimal-red">
                            <input type="radio" name="reportes" value="1" class="minimal-red">
                            <ins class="iCheck-helper"></ins>
                        </div>
                    </label>
                    <hr>

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
<script src="../helpers/reportes.js"></script>
<?php

} else {
	header('location:../');
}
?>