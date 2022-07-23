<?php
session_start();
if (isset($_SESSION['usuario_temp'])) {
  # code...

?>
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

<body class="hold-transition login-page"><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item active">
                        <center>Informacion de Usuario <i class="fa fa-table"></i></center>
                    </li>
                    <li class="list-group-item"><i class="fa fa-user"></i> <?php echo $_SESSION['usuario_temp'][1]; ?>
                        <?php echo $_SESSION['usuario_temp'][2]; ?></li>
                    <li class="list-group-item"><?php echo $_SESSION['usuario_temp'][3]; ?></li>
                    <li class="list-group-item">LA CLAVE DE SEGURIDAD DEBE CONTENER LETRAS <br>
                        NUMEROS <br> CARACTERES ESPECIALES <br> MINIMO DE 8 CARACTERES</li>
                </ul>
            </div>
         
            <div class="col-md-6" style="
    background: white;
    margin: initial;
    padding-top: 21px;
    margin-top: 3px;
">
                <div class="alert alert-danger">
                    <center><i class="fa fa-lock"></i> Recuperacion de Clave de Seguridad</center>
                </div>
                <div class="form-group">
                    <label for="txt-detalle" style="background: white;" class="col-md-5 control-label">Clave Nueva:</label>
                    <div class="col-md-7">
                        <input type="password" id="txt-clave" class="form-control input-sm">
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label for="txt-detalle" style="background: white;" class="col-md-5 control-label">Repita la Clave:</label>
                    <div class="col-md-7">
                        <input type="password" id="txt-repita" class="form-control input-sm">
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label class="col-md-5 control-label"></label>
                    <div class="col-md-7">
                        <center><button class="btn btn-info" id="btn-nuevo">Generar Nueva Clave <i
                                    class="fa fa-key"></i></button></center>
                    </div>
                </div><br><br>

            </div>
        
        </div>
    </div>
</body>

</html>
<script src="template/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="template/assets/alertas/toastr.min.js"></script>
<script type="text/javascript">
$('#btn-nuevo').click(function() {
    clave = $('#txt-clave').val();
    repita = $('#txt-repita').val();

    if (clave == "") {
        toastr.error("La Clave Nueva esta vacia");
    } else if (!validar_clave(clave)) {
        toastr.warning("La Nueva Clave de Seguridad es muy Debil");
    } else if (repita == "") {
        toastr.error("Repita la Nueva Clave");
    } else if (repita != clave) {
        toastr.error("Repita la Clave no Coincide");
    } else {
        confirmar(clave);
    }
})

function confirmar(clave) {
    ok = confirm("Generar Nueva Clave ?");
    if (ok) {
        cambiar(clave);
    } else {
        alert("Cancelado");
    }
}

function cambiar(clave) {


    $.ajax({
            url: 'controladores/login/cambiar.php',
            type: 'POST',
            data: {
                clave: clave
            },
        })
        .done(function(r) {
            window.location.href = 'index.php';
        });

}


function validar_clave(contrasenna) {
    if (contrasenna.length >= 8) {
        var mayuscula = false;
        var minuscula = false;
        var numero = false;
        var caracter_raro = false;

        for (var i = 0; i < contrasenna.length; i++) {
            if (contrasenna.charCodeAt(i) >= 65 && contrasenna.charCodeAt(i) <= 90) {
                mayuscula = true;
            } else if (contrasenna.charCodeAt(i) >= 97 && contrasenna.charCodeAt(i) <= 122) {
                minuscula = true;
            } else if (contrasenna.charCodeAt(i) >= 48 && contrasenna.charCodeAt(i) <= 57) {
                numero = true;
            } else {
                caracter_raro = true;
            }
        }
        if (mayuscula == true && minuscula == true && caracter_raro == true && numero == true) {
            return true;
        }
    }
    return false;
}
</script>
<?php
} else {
  header("location: index.php");
} ?>