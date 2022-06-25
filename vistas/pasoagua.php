<?php


session_start();
require '../contenido/head.php';

if (isset($_SESSION['usuarios'])) { ?>

<div class="box box-danger">
    <div class="box-header with-border">
    <h1 class="box-title"><i class="fa fa-home"></i> Control de Paso de Agua </h1><br>
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <div class="col-md-2">
            <label for="">Galpón</label>
            <div id="galpon"> </div>
        </div>


        <div class="col-md-2">
            <label for="">Lote</label>
            <div id="lotes"></div>
        </div>
        <br>
        <div class="col-md-2">
            
            <div>
                <button id="ver" class="form control btn btn-success" name="ver" onclick="Ver();">Buscar</button>
            </div>

        </div>


        <br>
        <br>
        <br>
        <div class="panel panel-info">
      <div class="panel-heading">
      
        
        <i class="fa fa-circle" aria-hidden="true">Lleno</i>

      </div> 
      <div class="panel-body">

      <i class="fa fa-dot-circle-o" aria-hidden="true">Con Agua</i>

      </div>
      <div class="panel-footer">
      <i class="fa fa-circle-o" aria-hidden="true">Vacio</i>
      </div>
    </div>
        <div  id="listado-articulos"></div>

      
    </div>
     

      
        

    

    <!-- /.box-body -->
</div>
<?php require_once '../contenido/foot.php' ?>
<script src="../helpers/pasoagua.js"></script>
<?php } else {
    header("location: ../");
}
?>