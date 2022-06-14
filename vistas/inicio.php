<?php
session_start();
if (isset($_SESSION['usuarios'])) {
?>
<?php require_once '../contenido/head.php' ?>

<style>
    .bg-info{
        background-color:  #1c97d5
    }
    .bg-success{
        background-color:  #51c91f
    }
    .bg-warning{
        background-color:  #dfbf1a
    }
    .bg-danger{
        background-color:  #df471a
    }
</style>
<div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        150
                                    </h3>
                                    <p>
                                        New Orders
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        53<sup style="font-size: 20px">%</sup>
                                    </h3>
                                    <p>
                                        Bounce Rate
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        44
                                    </h3>
                                    <p>
                                        User Registrations
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        65
                                    </h3>
                                    <p>
                                        Unique Visitors
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div>
<!-- Apply any bg-* class to to the info-box to color it -->
<div class="info-box bg-red">
        <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Likes</span>
          <span class="info-box-number">41,410</span>
          <!-- The progress section is optional -->
          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
            70% Increase in 30 Days
          </span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
<div class="row">
<h2 class="h2">Bienvenido al Sistema Avícola</h2>
<div class="col-lg-3 col-6">

<div class="small-box bg-info">
<div class="inner">
<h3>150</h3>
<p>New Orders</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>


</div>

<?php
require_once "../modelos/reportes.php";
$obj = new reportes();

?>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
   <div class="inner">
             <?php 
             require_once "../modelos/reportes.php";
             $cn= new reportes();
             $row=$cn->contarpollos();
             foreach($row as $datos){?>
        
             <?php } ?>         
              
          
              <h3><?php  echo $datos['cantidad'];?></h3>  
              <p>todos Animales</p>
            </div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-warning">
<div class="inner">
<h3>44</h3>
<p>User Registrations</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
<h3>65</h3>
<p>Unique Visitors</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>
<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
    <!-- /.box-body -->
    

</div>


<style>
.h2 {
    font-size: 28px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-style: oblique;
    color: red;
    text-align: center;
}
</style>



<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="../img/avicola.jpg" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="../img/inicio1.png" alt="Chicago">
    </div>

    <div class="item">
      <img src="../img/inicio2.png" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<style type="text/css">
    .carousel-inner img {
    width: 100%;
    max-height: 460px;
}

.carousel-inner{
 height: 400px;
}

.navbar-brand {
  padding: 0px;
}
.navbar-brand>img {
  height: 100%;
  padding: 2px;
  width: auto;
}
</style>

<!--<h1>sddsds</h1>
<tr>
    <td>
    <label>
      <input type="text" name="Precio" id="Precio"  class="monto" value="0" onkeyup="multi();">
    </label>
  </td>
    <td>
    <label>
      <input type="text" name="Cantidad" id="Cantidad" value="0" class="monto" onkeyup="multi();">
    </label>
  </td>
  <td>
    <label id="Costo">
      <input type="text" name="Costo" value="0" disabled>
    </label>
  </td>
</tr>

-->
<script type="text/javascript">
    
    function multi(){
        var total = 0;

        $(".monto").each(function(){
            cantidad= parseFloat(document.getElementById('Cantidad').value);
            precio = parseFloat(document.getElementById('Precio').value);
            if (isNaN(parseFloat($(this).val())) || isNaN(parseFloat((document.getElementById('Cantidad').value))) || isNaN(parseFloat((document.getElementById('Precio').value))) ) {

                
                document.getElementById('Costo').innerHTML = 0;
            } else {
              //total += parseFloat($(this).val());
              cantidad= parseFloat(document.getElementById('Cantidad').value);
              precio = parseFloat(document.getElementById('Precio').value);
              total=cantidad*precio;
      }
    });

    document.getElementById('Costo').innerHTML = total;
}
</script>
<?php require_once '../contenido/foot.php' ?>
<?php

} else {
    header('location:../');
}
?>