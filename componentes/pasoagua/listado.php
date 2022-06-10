<?php
require_once "../../modelos/galpones.php";
$obj = new  galpones();
$datos = $obj->listar_datospollos($_GET["galpon"], $_GET['lote']);
?>
<br>
<br>
<br>
<div class="panel panel-primary">

</div>

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
<table class="table table-striped">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>hora</th>
            <th>fecha</th>
            <th>Galpon</th>
            <th>Rango</th>
            <th>Bebedero</th>
            <th>Bomba</th>
          
            
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
                <td><?php   if ($dato["bebedero1"]==1) { ?>
                    <i class="fa fa-circle" aria-hidden="true">Lleno</i>

                <?php } else if ($dato["bebedero1"]==0) {?>
                    <i class="fa fa-circle-o" aria-hidden="true">Vacio</i>
                <?php } else { ?>
                    <i class="fa fa-dot-circle-o" aria-hidden="true">Con Agua</i>
                <?php  } ?>
            </td>
               
                <td><?php   if ($dato["bomba1"]==1) { ?>
                <span> encendido</span>
                <?php } else {?>
                    <span>apagado</span>
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
                <td><?php   if ($dato["bebedero2"]==1) { ?>
                    <i class="fa fa-circle" aria-hidden="true">Lleno</i>

                <?php } else if ($dato["bebedero2"]==0) {?>
                    <i class="fa fa-circle-o" aria-hidden="true">Vacio</i>
                <?php } else { ?>
                    <i class="fa fa-dot-circle-o" aria-hidden="true">Con Agua</i>
                <?php  } ?>
            </td>
               
                <td><?php   if ($dato["bomba2"]==1) { ?>
                <span> encendido</span>
                <?php } else {?>
                    <span>apagado</span>
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
                <td><?php   if ($dato["bebedero3"]==1) { ?>
                    <i class="fa fa-circle" aria-hidden="true">Lleno</i>

                <?php } else if ($dato["bebedero3"]==0) {?>
                    <i class="fa fa-circle-o" aria-hidden="true">Vacio</i>
                <?php } else { ?>
                    <i class="fa fa-dot-circle-o" aria-hidden="true">Con Agua</i>
                <?php  } ?>
            </td>
               
                <td><?php   if ($dato["bomba3"]==1) { ?>
                <span> encendido</span>
                <?php } else {?>
                    <span>apagado</span>
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
                <td><?php   if ($dato["bebedero4"]==1) { ?>
                    <i class="fa fa-circle" aria-hidden="true">Lleno</i>

                <?php } else if ($dato["bebedero4"]==0) {?>
                    <i class="fa fa-circle-o" aria-hidden="true">Vacio</i>
                <?php } else { ?>
                    <i class="fa fa-dot-circle-o" aria-hidden="true">Con Agua</i>
                <?php  } ?>
            </td>
               
                <td><?php   if ($dato["bomba4"]==1) { ?>
                <span> encendido</span>
                <?php } else {?>
                    <span>apagado</span>
                <?php } ?> </td>
               
            
            
        </tr>
        <?php endif ?>
        <?php endforeach; ?>
    </tbody>
</table>

 