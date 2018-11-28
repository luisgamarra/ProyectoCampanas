<?php
require_once('../db/conexion.php');
require_once('../modelo/testimonio.php');
require_once('../modelo/notificacion.php');
session_start();
include('templates/validar.php');
conectar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema de campañas sociales</title>   
    <link href="css/bootstrap.min.css" rel="stylesheet">        
    <link href="css/sb-admin-2.css" rel="stylesheet">        
    <link href="css/morris.css" rel="stylesheet">    
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">   
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/notificacion.css" rel="stylesheet"> 
</head>

<body>

    <?php include("templates/menutop.php"); ?>

    <div id="wrapper">

    <?php include("templates/menu-admin.php"); ?>
        <!-- Navigation -->
      
            <!-- /.navbar-top-links -->

           

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">


                    <?php 
                    $cod = $_SESSION["cod"];

                    $sql1 = "SELECT COUNT(campaign_id) from campaigns where estado = 1 and user_id=$cod";
                    $resp1 = ejecutar($sql1);
                    $r1 = mysqli_fetch_array($resp1);

                    ?>
                                    <div class="huge"><?php echo $r1[0] ; ?></div>
                                    <div>Campañas !</div>
                                </div>
                            </div>
                        </div>
                        <a href="detallecampania.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                    <?php 

                    $sql2 = "SELECT COUNT(c.user_id),c.title,d.description from donations d INNER JOIN campaigns c on d.campaign_id=c.campaign_id where c.user_id=$cod and d.estado = 1 and c.estado=1";
                    $resp2 = ejecutar($sql2);
                    $r2 = mysqli_fetch_array($resp2);

                    ?>            

                                    <div class="huge"><?php echo $r2[0] ; ?></div>
                                    <div>Donaciones !</div>
                                </div>
                            </div>
                        </div>
                        <a href="lista-donaciones.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                    <?php 

                    $sql3 = "SELECT COUNT(d.user_id) from campaigns c inner join details_campaigns d on c.campaign_id=d.campaign_id and d.estado=1 and c.user_id=$cod";
                    $resp3 = ejecutar($sql3);
                    $r3 = mysqli_fetch_array($resp3);

                    ?>
                                    <div class="huge"><?php echo $r3[0] ; ?></div>
                                    <div>Voluntarios !</div>
                                </div>
                            </div>
                        </div>
                        <a href="voluntarios.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                    <?php 
                    $cod = $_SESSION["cod"];

                    $sql0 = "SELECT COUNT(*) from notificaciones where estado = 1 and para=$cod";
                    $resp0 = ejecutar($sql0);
                    $r0 = mysqli_fetch_array($resp0);

                    ?>
                                    <div class="huge"><?php echo $r0[0]; ?></div>
                                    <div>Notifcaciones !</div>
                                </div>
                            </div>
                        </div>
                        <a href="#pnoti">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                       
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Trafico de datos
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
          
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i> Testimonios
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul style="list-style:none;">

                    <?php 

                    $test = new Testimonio();
                    $r = $test->listartestimonios();

                    while ($row = mysqli_fetch_array($r)) {   
   
echo "<li class='alert alert-success'>
    <div><center><img src='img/".$row[4]."' alt='User Avatar' class='img-circle' width='60px' height='55px'></center>
    </div>
    <div>
    <div>
    <center><h4 style='color:black'>".$row[2]." ".$row[3]."</h4></center>    
    </div>
    <div >
    <p>“".$row[1]."”</p>
    </div>
    </div>
    </li>";

}
                    ?>
                              
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">

                    <!-- /.panel -->
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading" id="pnoti">
                            <i class="fa fa-comments fa-fw"></i> Panel de Notificaciones                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul class="chat">

                    <?php 
          
          date_default_timezone_set('america/lima');          
        
          $cod = $_SESSION["cod"];
          $noti = new Notificacion();
          $noti->setPara($cod);
          $r = $noti->listarnotiporuser();      

              while ($row = mysqli_fetch_array($r)) {?>
               

                 <li class="left clearfix">
                    <span class="chat-img pull-left">
                        <img src="img/<?php echo $row[5] ?>" alt="User Avatar" class="img-circle" width="50px" height="50px"/>
                        </span>
                        <div class="chat-body clearfix">
                     <div class="header">
                    <strong class="primary-font"><?php echo $row[3]; ?> <?php echo $row[4] ?></strong>
                    <small class="pull-right text-muted">
                    <i class="fa fa-clock-o fa-fw"></i> 
                    <?php  $fecha = strtotime($row[2]);                 
                    hace($fecha); ?>
                    </small>
                     </div>
                    <p>
                <?php echo $row[1] ?>
                    </p>
                    </div>
                </li>
                
                          <?php }  ?>                           
      
                               
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        
                    </div>
                    <!-- /.panel .chat-panel -->
                    
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Datos totales
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


   
<footer>        
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/morris.min.js"></script>
<script src="js/raphael.min.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
</script> 

<?php 
include('templates/notificacion.php');
include('templates/morris-data.php');
 ?>


</body>

</html>


