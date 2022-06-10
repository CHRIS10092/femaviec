$('#galpon').load('../componentes/pasoagua/listar-galpones.php');

$('#lote').load('../componentes/pasoagua/listarlotes.php');



function listar_lotes(){
    galpon=$('#cmb-galpon').val();
    
    $.ajax({
    url:'../componentes/pasoagua/listarlote.php',
    type:'POST',
    data:{galpon:galpon}
    
    })
    .done(function(r){
    
     $('#lotes').html(r);
    
    })
        
    }
    

    function Ver(){
        galpon=$('#cmb-galpon').val();
   
        lote=$('#cmb-lote').val();
   
        $.ajax({
            url:'../componentes/pasoagua/listado.php',
            type:'GET',
            data:{galpon:galpon,lote:lote},
            success:function(r){
                $("#listado-articulos").html(r);

            }
        })
    }


   function sendEmail(){
  let correo =document.getElementById('txt-correo').value;
  $.ajax({
type:'POST',
url:'../controladores/galpones/correo.php',
data:{correo:correo},
    })
    .done(function(r){
        console.log(r);


  });

}
  
   /* function historial(){
       

        galpon=$('#cmb-galpon').val();
   
        lote=$('#cmb-lote').val();
   
        $.ajax({
            url:'../componentes/vergalpones/listar-datos.php',
            type:'GET',
            data:{galpon:galpon,lote:lote},
            success:function(r){
                $("#listado").html(r);
                
            }
        })
    }
    */