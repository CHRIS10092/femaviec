let detalle = []
$("#listadoProductos").load("../data/facturar/listadoProductos.php")
$("#listadoClientes").load("../data/facturar/listadoClientes.php")
//$('#numeroventa').load('../data/facturar/numeroventa.php')
function capturarCliente(e){

	let cliente = JSON.parse(e.target.dataset.cliente)
	$("#idcliente").val(cliente.idcliente)
	//$("#").val(producto.inv_codigo)
	$("#identificacion").val(cliente.cli_rucci)
	$("#cliente").val(cliente.cli_nombre+" "+cliente.cli_apellido)
	$("#correo").val(cliente.cli_correo)
	$("#direccion").val(cliente.cli_direccion)
	$("#celular").val(cliente.cli_celular)
	$('#m-clientes').modal('hide')
	
}
function capturarProducto(e){

	let producto = JSON.parse(e.target.dataset.producto)
	$("#idproducto").val(producto.inv_id)
	//$("#").val(producto.inv_codigo)
	$("#detalle").val(producto.detalle)
	$("#stock").val(producto.inv_stock)
	$("#precio").val(producto.inv_valorpvp)
	$("#chip").val(producto.chip)
	$('#m-productos').modal('hide')
	
}

function agregarDetalle(){
	let tbldetalle = document.getElementById('tbldetalle')
	tbldetalle.innerHTML =""
	detalle.map(x =>{
		tbldetalle.innerHTML+=`<tr id="${x.item}">
		                       <td>
		                       <input type="hidden" value="${x.chip}">
		                       ${x.item}
		                       </td>
		                       <td>${x.detalle}</td>
		                       <td>${x.cantidad}</td>
		                       <td>${x.precio}</td>
		                       <td>${x.total}</td>
		                       <td>
		                           <button class="btn btn-danger btn-sm" onclick="eliminarProducto(${x.item})">
		                               <i class="fa fa-remove"></i>
		                            </button>
		                            <input type="hidden" value="${x.id}">
		                            </td>
		                       </tr>`
	})
}

function verificarProducto(id){
	let res = detalle.filter(x =>{
		return x.id == id
	})

	return res
}

function limpiarProducto(){
	$("#idproducto").val("")
	//$("#").val("")
	$("#detalle").val("")
	$("#stock").val("")
	$("#precio").val("")
	$("#chip").val("")
	$("#cantidad").val("1")
}

function eliminarProducto(id){
	detalle = []
	$('#table-detalle tbody tr#' + id).remove()
	let rowctr = $('#table-detalle tbody tr');
	for(let i = 0;i< rowctr.length;i++){
		let properties = {}
		properties.item  = i+1
		properties.detalle  = $(rowctr[i]).find("td:eq(1)").html()
		properties.cantidad  = $(rowctr[i]).find("td:eq(2)").html()
		properties.precio  = $(rowctr[i]).find("td:eq(3)").html()
		properties.total  = $(rowctr[i]).find("td:eq(4)").html()
		properties.id  = $(rowctr[i]).find("td:eq(5) input[type='hidden']").val()
		detalle.push(properties)
	}

    agregarDetalle()
    calculoTotales()
}

function calculoTotales(){
    let subtotal = 0.00
    let total = 0.00
    let iva = 0.00
	detalle.map(x=>{
		subtotal = subtotal + parseFloat(x.total)
	})
	iva = subtotal * 0.12
	total = subtotal + iva

	$("#subtotal").val(subtotal.toFixed(2))
	$("#iva").val(iva.toFixed(2))
	$("#total").val(total.toFixed(2))
}

$('#btnAgregarProducto').click(function(){
	if($('#idproducto').val() == ""){
        alertify.error("Debe seleccionar un producto")
	}else if($('#cantidad').val() == ""){
		alertify.error("Digite la cantidad del producto requerido")
	}else if(parseInt($("#stock").val()) < parseInt($("#cantidad").val())){
		alertify.error("La cantidad requerida soprepasa el stock")
	}else if(verificarProducto($("#idproducto").val()).length > 0){
		alertify.error("El producto ya existe en la lista de detalle")
	}else{
		let item = detalle.length+1
		detalle.push({"item":item,
			          "detalle":$("#detalle").val(),
			          "cantidad":$("#cantidad").val(),
			          "precio":$("#precio").val(),
			          "total":parseFloat($("#precio").val())*parseInt($("#cantidad").val()),
			          "id":$("#idproducto").val(),
			           "chip":$("#chip").val()
			        })
		agregarDetalle()
		limpiarProducto()
		calculoTotales()
	}
	
})

$('#btnFacturar').click(function(){
	let tbldetalle = document.getElementById('tbldetalle').rows.length
	if($("#identificacion").val() == "" || $("#cliente").val() == "" || $("#correo").val() == ""||$("#direccion").val()==""){
     alertify.error("Todos los campos del clientes son obligatorios")
	}else if(tbldetalle == 0){
    alertify.error("El detalle de la venta debe tener al menos un producto")
	}else if($('#fecha').val() == ""){
		alertify.error("El campo fecha es obligatorio")
	}else{
		let detalleChips = CollectChips()
		let datos = new FormData(document.getElementById('frmVenta'))

		datos.append('detalle',JSON.stringify(detalle))
		datos.append('chipsDetails',JSON.stringify(detalleChips))
		fetch('../controladores/venta/FacturarController.php',{
			body:datos,
			method:"POST"
		}).then(res => res.text())
		  .then(res => {
		  	alertify.success(res)
		  	$('#btnFacturar').prop('disabled',false)
		  	setTimeout(()=>{
		  		GenerarTicket() 

		  	},500)
		  	
		  })
	}
})

/*
funcion guadado json de solo chips
*/

function CollectChips(){
  
	let arrayChips = []
	let rowctr = $('#table-detalle tbody tr');
	for(let i = 0;i< rowctr.length;i++){
		chip  = $(rowctr[i]).find("td:eq(0) input[type='hidden']").val()
		numero  =     $(rowctr[i]).find("td:eq(2)").html()
		if(chip && chip !=""){
			if(chip == "2"){
				for (var j = 0; j < parseInt(numero); j++) {
				let objChips ={}
				objChips.id = `chip${j+1}`
				objChips.quantity = `${j+1}`
				objChips.state = `inactive`
		    arrayChips.push(objChips)
			}
			}
			
		}
	}
 return arrayChips
}


function GenerarTicket(){
	agregarDetalleTicket()
	document.getElementById('tick').style.display = "block"
	document.getElementById('btnImprimir').style.display = "block"
	$('#t-fecha').html($('#fecha').val())

}

function agregarDetalleTicket(){
	let tbldetalle = document.getElementById('t-detalle')
	tbldetalle.innerHTML =""
	detalle.map(x =>{
		tbldetalle.innerHTML+=`<tr id="${x.item}">
		                       <td>${x.item}</td>
		                       <td>${x.detalle}</td>
		                       <td>${x.cantidad}</td>
		                       <td>${x.precio}</td>
		                       <td>${x.total}</td>
		                       </tr>`
	})
}

// #region funciones auxiliares
function soloLetras(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    //tecla para poder borrar
    if (tecla == 8) {
      return true;
  }
    // expresion para generar espacios \s|$
    patron = /[a-z-A-Z-\s|$]/;
    teclaFinal = String.fromCharCode(tecla);
    return patron.test(teclaFinal);
}

function soloNumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    //tecla para poder borrar
    if (tecla == 8) {
      return true;
  }
  patron = /[0-9]/;
  teclaFinal = String.fromCharCode(tecla);
  return patron.test(teclaFinal);
}

function imprim1(){
var printContents = document.getElementById('tick').innerHTML;
        w = window.open();
        w.document.write(printContents);
        w.document.close(); // necessary for IE >= 10
        w.focus(); // necessary for IE >= 10
		w.print();
		w.close();
        return true;}
// #endregion

document.getElementById('frmVenta').addEventListener('submit',function(e){
	   e.preventDefault();
})
