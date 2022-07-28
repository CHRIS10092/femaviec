<?php 
session_start();
require_once '../contenido/head.php';
if(isset($_SESSION['usuarios'])){?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-danger">
            <!-- /.box-header -->
            <div class="box-body">

                <div class="alert alert-danger alert-dismissible">
                            <center>
                                <h4><i class="fa fa-user"></i> Listado de Mensajes Recibidos </h4>
                    <div class="row">
                
                        <div class="form-group row">
                            <div class="col-md-2" style="padding-left: 33px;">
                            
                            </div>
                        </div>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mensajes"></div>

          



<?php
require_once '../contenido/foot.php';
?><script src="../helpers/mensajes.js"> </script>

 <?php } else{
    
header("Location:../");
}
 ?>
