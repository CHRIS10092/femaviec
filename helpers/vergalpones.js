$('#galpon').load('../componentes/vergalpones/listar-galpones.php');

$('#lote').load('../componentes/vergalpones/listarlotes.php');



function listar_lotes(){
    galpon=$('#cmb-galpon').val();
    
    $.ajax({
    url:'../componentes/vergalpones/listarlote.php',
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
            url:'../componentes/vergalpones/listado.php',
            type:'GET',
            data:{galpon:galpon,lote:lote},
            success:function(r){
                $("#listado-articulos").html(r);

            }
        })
    }

