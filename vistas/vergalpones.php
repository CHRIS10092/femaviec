<?php


session_start();
require '../contenido/head.php';

if (isset($_SESSION['usuarios'])) { ?>

<div class="box box-danger">
    <div class="box-header with-border">
        <h4 class="box-title"><i class="fa fa-home"></i> Historial de Encendido de Ventiladores </h4><br>
        <span style="color:green;"><icon class="fa fa-power-off">1=Encendido</icon> </span><br>
        <span style="color:red;"><icon class="fa fa-power-off">2=Apagado</icon></span><br>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="col-md-2">
            <label for="">Galpon</label>
            <div id="galpon"> </div>
        </div>


        <div class="col-md-2">
            <label for="">Lote</label>
            <div id="lotes"></div>
        </div>
        <br>
        <div class="col-md-2">
            <label for=""></label>
            <div>
                <button id="ver" class="btn-success" name="ver" onclick="Ver();">BUSCAR</button>
            </div>

        </div>
        <div id="listado-articulos"></div>

      
    </div>
     

      
        

    

    <!-- /.box-body -->
</div>
<?php require_once '../contenido/foot.php' ?>
<script src="../helpers/vergalpones.js"></script>
<?php } else {
    header("location: ../");
}
?>