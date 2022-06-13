<?php
session_start();

if (isset($_SESSION['usuario'])) {

    require_once 'contenido/head.php';

    ?>
<form id="frmProceso" enctype="multipart/form-data">
<ul class="nav nav-pills">
  <li class="active"><a data-toggle="pill" href="#paso1" id="btnPaso1">PASO 1</a></li>
  <li id="liPaso2" class="disabled"><a data-toggle="pill"   id="btnPaso2" >PASO 2</a></li>
  <li id="liPaso3" class="disabled"><a data-toggle="pill"   id="btnPaso3">PASO 3</a></li>
</ul>

<div class="tab-content">
  <div id="paso1" class="tab-pane fade in active">
    <br>
    <div class="row">
      <div class="col-md-6">

      </div>
      <label class="col-md-1">Fecha:</label>
      <div class="col-md-2">
        <input type="date"  id="txtFechaVenta" class="form-control" readonly value="<?php echo date('Y-m-d') ?>">
      </div>
      <label class="col-md-1">Venta:</label>
      <div class="col-md-2">
        <input type="text"  id="txtNumeroVenta" class="form-control" readonly>
      </div>
    </div>
    <hr>
    <div class="row">
      <label class="col-md-1">Ruc/Ci:</label>
      <div class="col-md-3">
        <input type="number"  id="txtRucCliente" class="form-control">
      </div>
      <label class="col-md-1">Nombre:</label>
      <div class="col-md-3">
        <input type="text"  id="txtNombreCliente" class="form-control">
      </div>
      <label class="col-md-1">Apellido:</label>
      <div class="col-md-3">
        <input type="text"  id="txtApellidoCliente" class="form-control">
      </div>
    </div>
    <br>
    <div class="row">
      <label class="col-md-1">Direccion:</label>
      <div class="col-md-3">
        <input type="text"  id="txtDireccionCliente" class="form-control">
      </div>
      <label class="col-md-1">Correo:</label>
      <div class="col-md-3">
        <input type="text"  id="txtCorreoCliente" class="form-control">
      </div>
      <label class="col-md-1">Celular:</label>
      <div class="col-md-3">
        <input type="number"  id="txtCelularCliente" class="form-control">
      </div>
    </div>
    <br>
    <button style="margin-left: 43%" id="btnArticulos" class="btn btn-success" data-toggle="modal" data-target="#m-articulos">
      <i class="fa fa-search"></i>
        Agregar Articulos
    </button>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Stock</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Total</th>
              <th>Quitar</th>
            </tr>
          </thead>
          <tbody id="tblDatosDetalle"></tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <ul class="list-group">
              <li class="list-group-item">SUBTOTAL: <div id="subtotal-venta" style="float:right;">0.00</div></li>
              <li class="list-group-item">IVA %12: <div id="iva-venta" style="float:right;">0.00</div></li>
              <li class="list-group-item">TOTAL: <div id="total-venta" style="float:right;">0.00</div></li>
            </ul>
      </div>
      <br>
      <button class="btn btn-success" id="btnRegistrarVenta">Registrar</button>
    </div>
  </div>

  <div id="paso2" class="tab-pane fade">
      <h2 class="blue" style="text-align: center;">Tenedor <i class="ice-icon fa fa-user blue"></i></h2>
      <h4 class="blue">Datos Personales</h4>
      <hr>
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <label class="col-md-1">Cedula:</label>
            <div class="col-md-4">
              <input type="number"  id="txtCedulaTenedor" class="form-control">
            </div>
            <label class="col-md-2">Fecha Nacimiento:</label>
            <div class="col-md-3">
              <input type="date"  id="txtFechaTenedor" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <label class="col-md-1">P.Nombre:</label>
            <div class="col-md-4">
              <input type="text"  id="txtPrimerNombre" class="form-control">
            </div>
            <label class="col-md-2">Segundo Nombre:</label>
            <div class="col-md-3">
              <input type="text"  id="txtSegundoNombre" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <label class="col-md-1">Apellido.P:</label>
            <div class="col-md-4">
              <input type="text"  id="txtApellidoPaterno" class="form-control">
            </div>
            <label class="col-md-2">Apellido Materno:</label>
            <div class="col-md-3">
              <input type="text"  id="txtApellidoMaterno" class="form-control">
            </div>
          </div>
          <h4 class="blue">Datos de Informacion</h4>
          <hr>
          <div class="row">
            <label class="col-md-1">Correo:</label>
            <div class="col-md-4">
              <input type="text"  id="txtCorreoTenedor" class="form-control">
            </div>
            <label class="col-md-1">Celular:</label>
            <div class="col-md-4">
              <input type="text"  id="txtCelularTenedor" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <label class="col-md-1">Provincia:</label>
            <div class="col-md-4">
              <select class="form-control" id="cmbProvinciaTenedor">
                <option value="0">-seleccionar--</option>
              </select>
            </div>
            <label class="col-md-1">Canton:</label>
            <div class="col-md-4">
              <select class="form-control" id="cmbCantonTenedor">
                <option value="0">-seleccionar--</option>
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <label class="col-md-1">Parroquia:</label>
            <div class="col-md-4">
              <select class="form-control" id="cmbParroquiaTenedor">
                <option value="0">-seleccionar--</option>
              </select>
            </div>
            <label class="col-md-1">Barrio:</label>
            <div class="col-md-4">
              <input type="text"  id="txtBarrioTenedor" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <label class="col-md-1">Calle.P:</label>
            <div class="col-md-4">
              <input type="text"  id="txtCallePrincipal" class="form-control">
            </div>
            <label class="col-md-1">Calle.S:</label>
            <div class="col-md-4">
              <input type="text"  id="txtCalleSecundaria" class="form-control">
            </div>
          </div>
          <br>
          <div class="row">
            <label class="col-md-1">N#.Casa:</label>
            <div class="col-md-4">
              <input type="text"  id="txtNumeroCasa" class="form-control">
            </div>
            <label class="col-md-1">Ref.Casa</label>
            <div class="col-md-4">
              <input type="text"  id="txtReferenciaCasa" class="form-control">
            </div>
          </div>
          <br>
        </div>
        <div class="col-md-4">
          <h3 class="blue" style="text-align: center;">Foto <i class="ice-icon glyphicon glyphicon-picture blue"></i></h3>
          <hr>
          <input type="file" name="imagen-tenedor" id="txtImgenTenedor">
          <br>
          <div id="previewTenedor"></div>
        </div>
      </div>
  </div>
  <div id="paso3" class="tab-pane fade">

      <h2 class="blue" style="text-align: center;">Mascotas <i class="ice-icon fa fa-paw blue"></i></h2>
      <p><i class="fa fa-plus bigger-200 blue"></i> <input type="number" id="txtNumeroMascotas" value="0" min="1"></p>
      <hr>
      <div id="datos-mascotas"></div>
      <center><button id="btnRegistrarProceso" disabled class="btn btn-success">Registrar</button></center>
  </div>

</div>
</form>


<!-- ARTICULOS MODAL -->
<div id="m-articulos" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Listado de Articulos <i class="ace-icon fa fa-list blue"></i></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Descripcion</th>
                  <th>Stock</th>
                  <th>Precio</th>
                  <th>Seleccionar</th>
                </tr>
              </thead>
              <tbody id="tblDatosArticulos"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- FIN ARTICULOS MODAL -->

<?php require_once 'contenido/foot.php';?>

<script src="../js/procesar.js"></script>

<?php

} else {

    header("location: ../");
}

?>