<?php


session_start();
require '../contenido/head.php';

if (isset($_SESSION['usuarios'])) { ?>

<div class="box box-danger">
    <div class="box-header with-border">
        <center><h4 class="box-title"><i class="fa fa-home"></i> Historial de Articulos  Distribuidos  </h4><br></center>
        
    </div>
    <!-- /.box-header -->
  </div>
        
    <div class="row">
        <div class="form-group row">
            <div class="col-md-2" style="padding-left: 33px;">
            
            
            </div>
            <div class="col-md-8" style="border-color:red;border:solid 0.3px;padding-bottom: 55px;">

            <div class="col-md-4">
            <label for="">Galpón</label>
            <div id="galpon"> </div>
        </div>


        <div class="col-md-4">
            <label for="">Articulo</label>
            <div id="lote"></div>
        </div>
        <br>
        <div class="col-md-3">
            
            <div>
                <button id="ver" class="form control btn btn-success" style="border-radius: 33px;" name="ver" onclick="Ver();"><i class="fa fa-search"></i>Buscar</button>
            </div>

        </div>
            </div>
            <div class="col-md-2" style="padding-left: 33px;">

            

            </div>
            </div>
    </div>


        <div id="listado-articulos"></div>

      
    </div>
     

      
        

    

    <!-- /.box-body -->
</div>
<?php require_once '../contenido/foot.php' ?>
<script src="../helpers/listado-distribucion.js"></script>
<?php } else {
    header("location: ../");
}
?>