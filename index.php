<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Femavi</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- carga de librerias -->
    <link rel="stylesheet" href="template/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="template/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="template/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" type="text/css" href="template/assets/alertas/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="helpers/css/index.css">
</head>
<style type="text/css">
#loading {
    text-align: center;
    display: none;
}
</style>

<body class="hold-transition login-page">
    <div id="loading">
        <img src="img/spinner.gif" width="20%"><br>
        <span class="load-palabra">Bienvenido Espere...</span>
    </div>
    <div class="login-box">
        <div class="login-logo">
            <a><b>Femavi</b> Ec</a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Bienvenido Iniciar Sesion</p>

            <form id="frm-login">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Usuario" id="txt-usuario" name="usuario">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" id="txt-clave" name="clave">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    
                  
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-5">
                        <span class="btn btn-danger btn-block btn-flat" id="btn-entrar">Acceder <i
                                class="fa fa-key"></i></span>
                    </div>
                    <div class="col-xs-6">
                        <a href="#" data-toggle="modal" data-target="#m-recuperar">recupera clave</a>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <div class="modal fade" id="m-recuperar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 id="exampleModalLabel">Recuperacion de la Clave</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txt-detalle" class="col-md-5 control-label">Correo Electronico de Registro:</label>
                        <div class="col-md-7">
                            <input type="text" id="txt-correo" class="form-control input-sm">
                        </div>
                    </div><br><br>
                    <div class="form-group" id="frm-temporal" style="display: none;">
                        <label for="txt-detalle" class="col-md-5 control-label">Clave Temporal:</label>
                        <div class="col-md-7">
                            <input type="text" id="txt-temporal" class="form-control input-sm">
                        </div>
                    </div><br><br>
                    <div class="form-group" id="frm-boton" style="display: none;">
                        <label class="col-md-5 control-label"></label>
                        <div class="col-md-7">
                            <button id="btn-verificar" class="btn-danger form-control"> Verificar</button>
                        </div>
                    </div><br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" id="btn-enviar">
                        Enviar
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="template/dist/js/jquery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="template/assets/alertas/toastr.min.js"></script>
<script src="helpers/index.js"></script>