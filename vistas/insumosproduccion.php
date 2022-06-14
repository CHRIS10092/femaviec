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
                        <h4><i class="fa fa-user"></i> Registro de Insumos de Limpieza y para el  Cuidado  </h4>
                     
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
        <h4 class="box-title">Listado Insumos </h4>
    
        <div class="form-group row">
    <div class="col-md-4">
    <a href="../controladores/pdf/insumoProduccion.php" class="btn btn-danger" target="_blank">
                <i class="fa fa-print">Pdf</i>
            </a>
            <a  class="btn btn-warning href="buscador.php">Ir a Control de Ingresos</a>
            <button class="btn btn-warning pull-right" data-toggle="modal" data-target="#m-servicio">
            <i class="fa fa-plus"></i> Nuevo    
            </button>
    </div>
    <div class="col-md-4">
    
    </div>
    <div class="col-md-4">

    </div>


    </div>
            
        
        
        
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div id="listado"></div>
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
                    <div class="row">
                        <div class="col-md-7">
                            <label>Articulo</label>
                            <input class="form-control" type="text" name="articulo" id="txtArticulo"
                                class="form-control input-sm">
                            <label>Cantidad</label>
                            <input max="1000000" min="0" class="form-control" onkeypress="return solo_numeros(event)"  type="number" value="0.00" name="cantidad"
                                id="txtCantidad" class="form-control input-sm" alt="">
                            <label>Fecha de Ingreso </label>
                            <input class="form-control" type="date" name="fecha" value="<?php echo $fecha; ?>" id="txtFecha"
                                class="form-control input-sm" alt="">
                            <label>Precio Unitario</label>
                            <input class="form-control" type="text" onkeypress="return solo_numeros(event)" onkeydown="calcular()" value="0.00" name="precioUni"
                                id="txtPrecioUni" class="form-control input-sm" alt="">
                            <label>Precio Total</label>
                            <input class="form-control" type="text" onkeypress="return solo_numeros(event)"  name="precioTot" id="txtPrecioTot" alt=""
                                class="form-control input-sm" readonly value="">
                                <label>Tipo</label>
                            <select name="tipo" id="cmb-tipo" class="form-control input-sm">
                                
                                   <option value="0">Seleccionar</option>
                                <option value="Ingreso">Ingreso</option>
                                <option value="Egreso">Egreso</option>
                                

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
                            <input class="form-control" readonly type="text" name="id" id="txt-id"
                                class="form-control input-sm">

                            <label>Articulo</label>
                            <input class="form-control" type="text" name="articulou" id="txtArticulou"
                                class="form-control input-sm">
                            <label>Cantidad</label>
                            <input max="1000000" min="0" class="form-control" onkeypress="return solo_numeros(event)"  type="number" name="cantidadu"
                                id="txtCantidadu" class="form-control input-sm" value="0.00">
                            <label>Fecha de Ingreso </label>
                            <input class="form-control" type="date" name="fechau" id="txtFechau"
                                class="form-control input-sm" alt="">
                            <label>Precio Unitario</label>
                            <input class="form-control" type="text" onkeypress="return solo_numeros(event)"  onkeydown="calcular()" name="precioUniu"
                                id="txtPrecioUniu" class="form-control input-sm" alt="">
                            <label>Precio Total</label>
                            <input class="form-control" type="text" onkeypress="return solo_numeros(event)"  name="precioTotu" id="txtPrecioTotu" alt=""
                                class="form-control input-sm" readonly value="0.00">
                                      <label>Tipo</label>
                            <select name="tipou" id="cmb-tipou" class="form-control input-sm">
                                
                                   <option value="0">Seleccionar</option>
                                <option value="Ingreso">Ingreso</option>
                                <option value="Egreso">Egreso</option>
                                

                            </select>
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
<script src="../helpers/insumosproduccion.js"></script>
<?php } else {
    header("location: ../");
}
?>