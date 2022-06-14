<?php
session_start();
if (isset($_SESSION['usuarios'])) {
?>

<?php 
require_once "../contenido/head.php";
?>

<label class="col-md-4 control-label">Información Completa de Galpones</label>
<div class="col-md-3 control-label">
                          <span class="btn btn-primary pull-right" data-toggle="modal" data-target="#n-empresas">
                            Escoger Galpon <i class="glyphicon glyphicon-search"></i>
                          </span>
        </div>
<div class="form-group row">
<div class="col-md-4"></div>
<div class="col-md-4"></div>
<div class="col-md-4"></div>

</div>
<div id="n-empresas" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Buscar Galpon</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div id="list-empresas"></div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<br>
<table>
    <tr>
    <td><label>Código</label></td>
    <td><label>Numero </label></td>
    <td><label>Medidas </label></td>
    <td><label>Lote</label></td>
    <td><label>Rango</label></td>
    <td><label>Estado</label></td>
    </tr>
    <tr>
    <td><input type="text" name="codigo" id="txt-codigos"></td>
    <td><input type="text" name="numero" id="txt-numero"></td>
    <td><input type="text" name="medidas" id="txt-medidas"></td>
    <td><input type="text" name="lote" id="txt-lote"></td>
    <td><input type="text" name="rango" id="txt-rango"></td>
    <td><input type="text" name="estado" id="txt-estado"></td>
    </tr>

</table>

<form>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">codigo</label>
    <div class="col-sm-10">
      <input type="text" name="codigo" id="txt-codigo" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-2">
      <input type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>
  </div>
</form>

<br>
<div class="pull-right">
                <button type="button" class="btn btn-danger" >Generar Pdf</button>
            </div>







<?php 
require_once "../contenido/foot.php";?>
<script src="../helpers/reportestotal.js"></script>
<?php } else {
    header("location: ../");
}
?>