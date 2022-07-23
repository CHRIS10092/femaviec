$('#galpon').load('../componentes/vergalpones/listar-galpones1.php');

$('#lote').load('../componentes/vergalpones/listarlote1.php');



    

    function Ver(){
        galpon=$('#cmb-galpon').val();
   
        lote=$('#cmb-lote').val();
   
        $.ajax({
            url:'../componentes/vergalpones/listado1.php',
            type:'GET',
            data:{galpon:galpon,lote:lote},
            success:function(r){
                $("#listado-articulos").html(r);

            }
        })
    }

