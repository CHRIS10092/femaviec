$('#btn-usuario').click(function(){
	usuario=$('#txt-usuario').val();

	if (!usuario) {
		toastr.error('Escribir la Nueva Cuenta de Usuario');
	}else if(usuario.length<8){
		toastr.error('la Nueva Cuenta de Usuario debe contener minimo 8 caracteres');
	}else{
		confirmar_usuario(usuario);
	}
})

function confirmar_usuario(usuario){

  alertify.confirm('Confirmar','Desea Cambiar la Constraseña de la Cuenta ?',
                   function(){
                    cambiar_usuario(usuario);
                   },
                   function(){alertify.error('ACCION CANCELADA')}
                  );
}

function cambiar_usuario(usuario){

  
  $.ajax({
    url: '../controladores/perfil/cambiar_usuario.php',
    type: 'POST',
    data: {usuario:usuario},
  })
  .done(function(r) {
    if(r==1){
      toastr.success('El cambio de Cuenta de Usuario ha sido Correcto');
      $('#txt-usuario').val('');
    }else{
      alertify.alert(r);
    }
  });
  
}

$('#btn-clave').click(function(){
  clave=$('#txt-clave').val();
  actual=$('#txt-clave-actual').val();
  nueva=$('#txt-clave-nueva').val();
  repita=$('#txt-clave-repita').val();

  if(!actual){
    toastr.error('Clave Actual campo vacio');
  }else if(clave!=actual){
    toastr.error('La clave Actual no Coincide ');
  }else if(!nueva){
    toastr.error('Clave Nueva campo vacio');
  }else if(!validar_clave(nueva)){
    toastr.error('Seguridad Baja la clave debe contener mayusculas,minusculas,nuemros,caracteres especiales y minimo de 8 caracteres');
  }else if(!repita){
    toastr.error('Repita la Clave');
  }else if(nueva!=repita){
    toastr.error('Clave Nueva  no coincide');
  }else{
    confirmar_clave(nueva);
  }
});

function confirmar_clave(clave){

  alertify.confirm('Confirmar','Desea Cambiar la Cuenta de Usuario ?',
                   function(){
                    cambiar_clave(clave);
                   },
                   function(){alertify.error('ACCION CANCELADA')}
                  );
}

function cambiar_clave(clave){

  
  $.ajax({
    url: '../controladores/perfil/cambiar_clave.php',
    type: 'POST',
    data: {clave:clave},
  })
  .done(function(r) {
    if(r==1){
      toastr.success('El cambio de Clave  ha sido Correcto pruebela en el proximo inicio de session');
   $('#txt-clave').val('');
   $('#txt-clave-actual').val('');
   $('#txt-clave-nueva').val('');
   $('#txt-clave-repita').val('');
    }else{
      alertify.alert(r);
    }
  });
  
}

function validar_clave(contrasenna)
    {
      if(contrasenna.length >= 8)
      {   
        var mayuscula = false;
        var minuscula = false;
        var numero = false;
        var caracter_raro = false;
        
        for(var i = 0;i<contrasenna.length;i++)
        {
          if(contrasenna.charCodeAt(i) >= 65 && contrasenna.charCodeAt(i) <= 90)
          {
            mayuscula = true;
          }
          else if(contrasenna.charCodeAt(i) >= 97 && contrasenna.charCodeAt(i) <= 122)
          {
            minuscula = true;
          }
          else if(contrasenna.charCodeAt(i) >= 48 && contrasenna.charCodeAt(i) <= 57)
          {
            numero = true;
          }
          else
          {
            caracter_raro = true;
          }
        }
        if(mayuscula == true && minuscula == true && caracter_raro == true && numero == true)
        {
          return true;
        }
      }
      return false;
    }