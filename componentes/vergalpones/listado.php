<?php
require_once "../../modelos/galpones.php";
$obj = new  galpones();
$datos = $obj->listar_datospollos($_GET["galpon"], $_GET['lote']);
?>
<br>

<table  class="table table-striped">
    <thead>
        <tr>
            <th>Código</th>
            <th>Galpón</th>
            <th>Lote</th>
            <th>Temperatuta Min</th>
            <th>Temperatura Max</th>
            <th>Húmedad </th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>

        <tr>
            <td bgcolor="#00aaf3"> <?php echo  $dato["codigo"] ?> </td>
            <td> <?php echo  $dato["numero"] ?> </td>
            <td> <?php echo  $dato["lote"] ?> </td>
            <td> <?php echo  $dato["maximotem"] ?>  </td>
            <td> <?php echo  $dato["minimotem"] ?>  </td>
            <td> <?php echo  $dato["maximohum"] ?> </td>
            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!--<table class="table table-striped">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Galpon</th>
            <th>Lote</th>
            <th>temperatuta Min</th>
            <th>temperatura Max</th>
            <th>temperatura Min</th>
            <th>Codigo</th>
            <th>Galpon</th>
            <th>Lote</th>
           
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datos as $dato) : ?>

        <tr>
            <td><?php echo  $dato["codigo"] ?> </td>
            <td><input type="text" value="<?php echo  $dato["bebedero1"] ?>" name="maximotem" id="txt-maximotemp" > </td>
            <td><input type="text" value="<?php echo  $dato["bebedero2"] ?>" name="minimotem" id="txt-minimotemp" > </td>
            <td><input type="text" value="<?php echo  $dato["bebedero3"] ?>" name="maximohum" id="txt-maximohum" ></td>
            <td><input type="text" value="<?php echo  $dato["bebedero4"] ?>" name="maximohum" id="txt-maximohum" ></td>
            <td><input type="text" value="<?php echo  $dato["bomba1"] ?>" name="maximohum" id="txt-maximohum" ></td>
            <td><input type="text" value="<?php echo  $dato["bomba2"] ?>" name="maximohum" id="txt-maximohum" ></td>
            <td><input type="text" value="<?php echo  $dato["bomba3"] ?>" name="maximohum" id="txt-maximohum" ></td>
            <td><input type="text" value="<?php echo  $dato["bomba4"] ?>" name="maximohum" id="txt-maximohum" ></td>
            
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>-->
<?php
require_once "../../modelos/galpones.php";
$obj = new  galpones();
$datos = $obj->listar_bebederos($_GET["galpon"], $_GET['lote']);
?>
<!--<center><button class="form control btn btn-success col-md-2" id="apagar">encender</button>
<button class="form control  btn btn-danger col-md-2" onclick="Verdatos();" id="encender">Apagar</button></center>


<script type="text/javascript">
    
    function Verdatos(){
        de=$('#txt-numero').val();
        lote=$('#txt-lote').val();
        max=$('#txt-maximotemp').val();
        min=$('#txt-minimotemp').val();
        hum=$('#txt-maximohum').val();
        encendido=1;
        alert("el galpom  es"+de+"el lote  es"+de+"el max  es"+max+"el min  es"+min+"el hum  es"+hum+"encedido"+encendido);
    }
</script>
-->

<table id="tbl_datos" class="table table-striped">
    <thead>
        <tr>
            <th>Código</th>
            <th>hora</th>
            <th>fecha</th>
            <th>Galpón</th>
            <th>Rango</th>
            <th>Ventilador</th>
        
          
            
        </tr>
    </thead>
    <tbody>
    
						
				
        <?php foreach ($datos as $dato) : ?>
            <?php if ($dato['idgalpon']==23): ?>
        <tr>
            <td><?php echo  $dato["id"] ?></td>
            <td><?php echo  $dato["hora"] ?> </td>
            <td><?php echo  $dato["fecha"] ?> </td>
            <td><?php echo  $dato["idgalpon"] ?> </td>
            <td><?php echo  $dato["rango"] ?> </td>
              
               
            <td><?php   if ($dato["ventilador"]==1) { ?>
                <img src="../img/encendido.gif" width="100" heigth="80">
                <?php } else {?>
                    <img src="../img/apagado.jpg" width="100" heigth="80">
                <?php } ?> </td>
               
            
            
        </tr>
        <?php endif ?>
        <?php endforeach; ?>
        				
     
           <?php foreach ($datos as $dato) : ?>
            <?php if ($dato['idgalpon']==1): ?>
        <tr>
            <td><?php echo  $dato["id"] ?></td>
            <td><?php echo  $dato["hora"] ?> </td>
            <td><?php echo  $dato["fecha"] ?> </td>
            <td><?php echo  $dato["idgalpon"] ?> </td>
            <td><?php echo  $dato["rango"] ?> </td>
              
               
                <td><?php   if ($dato["ventilador"]==1) { ?>
                <img src="../img/encendido.gif" width="100" heigth="80">
                <?php } else {?>
                    <img src="../img/apagado.jpg" width="100" heigth="80">
                <?php } ?> </td>
               
            
            
        </tr>
        <?php endif ?>
        <?php endforeach; ?>

        <?php foreach ($datos as $dato) : ?>
            <?php if ($dato['idgalpon']==2): ?>
        <tr>
            <td><?php echo  $dato["id"] ?></td>
            <td><?php echo  $dato["hora"] ?> </td>
            <td><?php echo  $dato["fecha"] ?> </td>
            <td><?php echo  $dato["idgalpon"] ?> </td>
            <td><?php echo  $dato["rango"] ?> </td>
              
               
            <td><?php   if ($dato["ventilador"]==1) { ?>
                <img src="../img/encendido.gif" width="100" heigth="80">
                <?php } else {?>
                    <img src="../img/apagado.jpg" width="100" heigth="80">
                <?php } ?> </td>
               
            
            
        </tr>
        <?php endif ?>
        <?php endforeach; ?>
        <?php foreach ($datos as $dato) : ?>
            <?php if ($dato['idgalpon']==3): ?>
        <tr>
            <td><?php echo  $dato["id"] ?></td>
            <td><?php echo  $dato["hora"] ?> </td>
            <td><?php echo  $dato["fecha"] ?> </td>
            <td><?php echo  $dato["idgalpon"] ?> </td>
            <td><?php echo  $dato["rango"] ?> </td>
            
            <td><?php   if ($dato["ventilador"]==1) { ?>
                <img src="../img/encendido.gif" width="100" heigth="80">
                <?php } else {?>
                    <img src="../img/apagado.jpg" width="100" heigth="80">
                <?php } ?> </td>
               
            
            
        </tr>
        <?php endif ?>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $('#tbl_datos').DataTable({
     language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
});
</script>