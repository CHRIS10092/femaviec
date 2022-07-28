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
                        <h4><i class="fa fa-user"></i> </h4>
                    </center>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<div class="row">
    <div class="col-md-3">
    <label>Tipo de Articulo</label>
    <div id="listado-tipos"></div>
    </div>
    <div class="col-md-2"><br>
        <button class="btn btn-success" id="btnBuscarTipo">BUSCAR</button>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-7">
        <div id="listado-articulos"></div>
    </div>
    <div class="col-md-2">
        <div id="listado-zonas"></div>
    </div>

    <div class="col-md-2">
        <div id="elementos"></div>
    </div>
</div>

<?php require_once '../contenido/foot.php' ?>

    

<script src="../helpers/distribuir.js"></script>
<?php } else {
    header("location: ../");
}
?>
