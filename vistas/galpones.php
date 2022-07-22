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
                        <h4><i class="fa fa-user"></i> Registro de Galpones</h4>
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
        <h4 class="box-title"><?php $nbps;$nbps;?>        Descargar </h4>
        <button class="btn btn-warning btn-group-lg " data-toggle="modal" data-target="#m-servicio">
            <i class="fa fa-plus"></i> Nuevo
        </button>
            <a href="../controladores/pdf/galpones.php" class="btn btn-danger" target="_blank">
                <i class="fa fa-print">Pdf</i>
            </a>
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
                <h4 id="exampleModalLabel">Nuevo Galpón</h4>
            </div>
            <div class="modal-body">
                <form id="frm-servicios">
                    <div class="row">
                        <div class="col-md-7">
                            <label>Número Galpón</label>
                            <input class="form-control" type="text" placeholder=" INGRESE SOLO NUMEROS" onkeydown="return solo_numeros(event)" name="galpon"
                                id="txtGalpon" class="form-control input-sm">
                            <label>Medidas</label>
                            <input class="form-control"  placeholder="INGRESE NUMERO Y LETRAS" type="text" name="medidas" id="txtMedidas"
                                class="form-control input-sm" alt="">
                            <label>Cantidad Pollos </label>
                            <input class="form-control" onkeypress="return solo_numeros(event)" placeholder="INGRESE SOLO NUMEROS" type="number" min="1" max="1000000" name="n_pollos"
                                id="txtNpollos" class="form-control input-sm" alt="">
                            <label>Lote</label>
                            <input class="form-control" type="number" onkeypress="return solo_numeros(event)" placeholder="INGRESE SOLO NUMEROS" name="lote" id="txtLote"
                                class="form-control input-sm" alt="">
                            <label>Rango</label>
                            <select name="rango" id="cmb-rango" class="form-control input-sm">
                                <option value="Pequeno">Pequeño</option>
                                <option value="Mediano">Mediano</option>
                                <option value="Grande">Grande</option>

                            </select>
                            <label>Estado</label>
                            <select name="estado" id="cmb-estado" class="form-control input-sm">
                                <option value="Act">Activo</option>
                                <option value="Ina">Inactivo</option>


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
                            <label>Id </label>
                            <input class="form-control" readonly type="text" name="id" id="txt-id"
                                class="form-control input-sm">

                            <label>Número Galpón</label>
                            <input class="form-control" type="text" onkeypress="solo_numeros(event);" name="galponu"
                                id="txtGalponu" class="form-control input-sm">
                            <label>Medidas</label>
                            <input class="form-control" placeholder="INGRESE NUMERO Y LETRAS" type="text" name="medidasu" id="txtMedidasu"
                                class="form-control input-sm" alt="">
                            <label>Cantidad Pollos </label>
                            <input class="form-control" onkeypress="return solo_numeros(event)" placeholder="SOLO NUMEROS" type="number" min="1" max="1000000" name="n_pollosu"
                                id="txtNpollosu" class="form-control input-sm" alt="">
                            <label>Lote</label>
                            <input class="form-control" onkeypress="return solo_numeros(event)" placeholder="SOLO NUMEROS" type="number" name="loteu" id="txtLoteu"
                                class="form-control input-sm" alt="">
                            <label>Rango</label>
                            <select name="rangou" id="cmb-rangou" class="form-control input-sm">
                                <option value="Pequeno">Pequeño</option>
                                <option value="Mediano">Mediano</option>
                                <option value="Grande">Grande</option>

                            </select>
                            <label>Estado</label>
                            <select name="estadou" id="cmb-estadou" class="form-control input-sm">
                                <option value="Act">Activo</option>
                                <option value="Ina">Inactivo</option>


                            </select>
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
<script src="../helpers/galpones.js"></script>
<?php } else {
    header("location: ../");
}
?>