<?php
session_start();
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
                        <h4><i class="fa fa-user"></i> Registro de Herramienta Temperatura </h4>
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
        <h4 class="box-title">Listado Herramientas Temperatura</h4>
        <button class="btn btn-default btn-group-lg pull-right" data-toggle="modal" data-target="#m-servicio">
            <i class="fa fa-plus"></i> Nuevo
        </button>
        <a href="../controladores/pdf/HerramientasTemperatura.php" class="btn btn-danger" target="_blank">
                <i class="fa fa-print">Pdf</i>
            </a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="htemperatura"></div>
    </div>
    <!-- /.box-body -->
</div>

<!-- Modal registro -->
<div class="modal fade" id="m-servicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 id="exampleModalLabel">Nuevo Dato</h4>
            </div>
            <div class="modal-body">
                <form id="frm-servicios">
                  
        
            <label>Articulo</label>
            <input class="form-control input-sm" type="text" name="articulo" id="txtArticulo" alt="">
        
        
            <label>Parametro</label>
            <select class="form-control" type="text" name="parametro" id="txtParametro" >
                <option value="Temperatura">Temperatura</option>
                <option value="Humedad">Humedad</option>

            </select>
        
            <label>Fecha de Ingreso</label>
            <input class="form-control" type="date" name="fecha" value="<?php echo $fecha; ?>" id="txtFecha" alt="">
        <br>
        
    
  <div class="form-group row">
    <div class="col-sm-3">
      <label>Precio
      <input type="text" name="valorUni" id="txtValorUni" onkeypress="return solo_numeros(event);" class="monto" value="0" onkeyup="multi();">
    </label>
  
    </div>
    &nbsp;&nbsp;
    <div class="col-sm-3">
      <label>Cantidad
      <input type="text" name="cantidad" id="txtCantidad" value="0" onkeypress="return solo_numeros(event);" class="monto" onkeyup="multi();">
    </label>
  
    </div>
    &nbsp;&nbsp;
    <div class="col-sm-4">
    <label style="
    width: 1882px;
    padding-left: 44px;
">Total</label>

<label id="txtValorTot"  style="
    border-left-width: 11px;
    padding-left: 44px;
"> <input type="text" id="txtValorTot" name="valorTot" disabled></label>      
    </div>
  </div>
<br>
<div class="form-group row">
    <div class="col-sm-7">
      <label>Observacion</label>
            <input class="form-control" type="text" name="observacion" id="txtObservacion" alt="">
       

  
    </div>
    <div class="col-sm-3">
      <label>Estado</label>
            <select name="estado" id="cmbEstado" alt="">
                <option value="0">Seleccionar</option>
                <option value="Funcionando">En Funcionamiento</option>
                <option value="Nofunciona">No funciona</option>

            </select>
  
    </div>
            
        </div>
    


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-registrar">
                    Guardar <i class="glyphicon glyphicon-floppy-disk"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
  function multi(){
        var total = 0;

        $(".monto").each(function(){
            cantidad= parseFloat(document.getElementById('txtCantidad').value);
            precio = parseFloat(document.getElementById('txtValorUni').value);
            if (isNaN(parseFloat($(this).val())) || isNaN(parseFloat((document.getElementById('txtCantidad').value))) || isNaN(parseFloat((document.getElementById('txtValorUni').value))) ) {

                
                document.getElementById('txtValorTot').innerHTML = 0;
            } else {
              //total += parseFloat($(this).val());
              cantidad= parseFloat(document.getElementById('txtCantidad').value);
              precio = parseFloat(document.getElementById('txtValorUni').value);
              total=cantidad*precio;
      }
    });

    document.getElementById('txtValorTot').innerHTML = total;
}
  function multiu(){
        var total = 0;

        $(".monto").each(function(){
            cantidad= parseFloat(document.getElementById('txtCantidadu').value);
            precio = parseFloat(document.getElementById('txtValorUniu').value);
            if (isNaN(parseFloat($(this).val())) || isNaN(parseFloat((document.getElementById('txtCantidadu').value))) || isNaN(parseFloat((document.getElementById('txtValorUni').value))) ) {

                
                document.getElementById('valortu').innerHTML = 0;
            } else {
              //total += parseFloat($(this).val());
              cantidad= parseFloat(document.getElementById('txtCantidadu').value);
              precio = parseFloat(document.getElementById('txtValorUniu').value);
              total=cantidad*precio;
      }
    });

    document.getElementById('valortu').innerHTML = total;
}
</script>

<div class="modal fade" id="m-serviciou" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 id="exampleModalLabel">Editar Datos</h4>
            </div>
            <div class="modal-body">
                <form id="frm-serviciosu">
                    <div class="row">
                        <div class="col-md-6">
             <label>Codigo</label>
            <input class="form-control input-sm" type="text" name="id" id="txt-id" alt="">
                         
             <label>Articulo</label>
            <input class="form-control input-sm" type="text" name="articulou" id="txtArticulou" alt="">
        
        
            
        
            <label>Parametro</label>
            
            <select class="form-control" type="text" name="parametrou" id="txtParametrou" >
                <option value="Temperatura">Temperatura</option>
                <option value="Humedad">Humedad</option>

            </select>
            <label>Fecha de Ingreso</label>
            <input class="form-control" type="date" name="fechau" id="txtFechau" alt="">
             <div class="form-group row">
    <div class="col-sm-3">
      <label>Precio
      <input type="text" name="valorUniu" id="txtValorUniu" onkeypress="return solo_numeros(event);"  class="monto"  onkeyup="multiu();">
    </label>
  
    </div>
    &nbsp;&nbsp;
    <div class="col-sm-3">
      <label>Cantidad
      <input type="text" name="cantidadu" id="txtCantidadu" onkeypress="return solo_numeros(event);" class="monto" onkeyup="multiu();">
    </label>
  
    </div>
    &nbsp;&nbsp;
    <div class="col-sm-4">
    <label style="
    width: 1882px;
    padding-left: 44px;
">Total</label>


<label id="valortu"  style="
    border-left-width: 11px;
    padding-left: 44px;
"> <input type="text" name="valortu" id="txtValorTotu" disabled></label>      
    </div>
  </div>
            
            <label>Observacion</label>
            <input class="form-control" type="text" name="observacionu" id="txtObservacionu" alt="">
       

        <div class="col-sm-2">
            <label>Estado</label>
            <select name="estadou" class="form-control" id="cmbEstadou" style="width: 166px;" alt="">
                <option value="Funcionando">En Funcionamiento</option>
                <option value="Nofunciona">No funciona</option>

            </select>
        </div>


                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn-editar">
                    Editar <i class="glyphicon glyphicon-floppy-disk"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<?php require_once '../contenido/foot.php' ?>
<script src="../helpers/htemperatura.js"></script>
<?php } else {
    header("location: ../");
}
?>