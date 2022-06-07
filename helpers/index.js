//verificacion de los campos al hacer click sobre el boton acceder
$("#btn-entrar").click(function () {
	let cont=0;
	usuario=$("#txt-usuario");
	clave=$("#txt-clave");
	if(!usuario.val()){
		avisos('usuario campo vacio ',usuario);

	}else if(!clave.val()){
		avisos('clave campo vacio',clave);
	}else{
		//acceder(usuario.val(),clave.val());
		acceder(usuario.val(),clave.val());
	}
	
});

function intentos(usuario,clave){
    
    let cont=0;
	$.ajax({
		type:'POST',
		url:'controladores/login/intentos.php',
		data:{usuario:usuario,clave:clave},
		success:function(r){
			if(r==1){
				toastr.info('Acceso Incorrecto',cont++);
			}else if(r==2){
				acceder(usuario.val(),clave.val());
				};
			}

})
}

//funcion para envio de datos al controlador y verificar credenciales

function acceder(usuario,clave){
    
    
	$.ajax({
		type:'POST',
		url:'controladores/login/acceso.php',
		data:{usuario:usuario,clave:clave},
		success:function(r){
			if(r==11){
				toastr.info('Acceso Incorrecto');
			}else if(r==21){
				$("#loading").css("display","none");
				$(".login-box-body").fadeOut(500,function(){
				})
				$("#loading").fadeIn(2000,function(){
					accediendo();
				});
			}else if(r==31){

		toastr.info('Contactarse con el Administrador Usuario Bloqueado'+usuario);		
			}
			console.log(r)
		}

	})

}

//funciones complemetarias para cambiar el borde a los inputs y efecto visual para acceder al sistema

function avisos(mensaje,campo){

	toastr.error(mensaje);
	campo.css("border","solid 1px red");

}

function accediendo(){
	$("#loading").fadeOut(2000,function(){

		window.location.href='vistas/inicio.php';
	});
}

$('#btn-enviar').click(function(){
	correo=$('#txt-correo').val();
	if(correo==""){
		toastr.info("Debe Escribir el Correo de Registro");
	}else{
		verificar_correo(correo)
	}
})

function verificar_correo(correo){
	$.ajax({
		url: 'http://localhost/femaviec/controladores/login/correo.php',
		type: 'POST',
		data: {correo: correo},
	})
	.done(function(r) {
		if(r==1){
			toastr.success("Correo Enviado a: "+correo+" Revise la Bandeja de Entrada");
			$('#btn-enviar').prop('disabled',true);
			$('#txt-correo').prop('disabled',true);
			$('#frm-temporal').css('display','block');
			$('#frm-boton').css('display','block');
		}else if(r==2){
			toastr.warning("Problemas al Enviar el Correo Electronico");
		}
	});
	
}



$('#btn-verificar').click(function(){
	temporal=$('#txt-temporal').val();
	if(temporal==""){
		toastr.info("Debe Escribir la clave temporal");
	}else{
		verificar_temporal(temporal);
	}
})

function verificar_temporal(temporal){
	$.ajax({
		url: 'controladores/login/verificar.php',
		type: 'POST',
		data: {temporal: temporal},
	})
	.done(function(r) {
		if(r==1){
			window.location.href='recuperacion_clave.php';
		}else if(r==2){
			toastr.warning("Clave temporal Incorrecta");
		}
	});
	
}