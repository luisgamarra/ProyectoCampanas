<?php
require_once ('../db/conexion.php');
require_once ('../modelo/detallecampania.php');
require_once ('../modelo/reunion.php');
conectar();
session_start();
include('templates/validar.php');
?>

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Campañas sociales</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/normalize.css"> 
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/simple-sidebar.css">
  <link rel="stylesheet" href="css/colorbox.css">
  <link rel="stylesheet" href="css/jPages.css">
  <link rel="stylesheet" href="css/animate.css">
      
</head>

<body background="img/fondito1.jpg">
  <?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php
include("templates/menu-voluntario.php");    
?>

<div id="page-content-wrapper">
    <div class="container-fluid">                    
        
 <div class="panel panel-success"> 
  <div class="panel-heading"><h1 style="text-align:center;"><b>Calendario de reuniones</b></div>  
  

    <form class="form-horizontal" id="form1" name="form1" method="post" action="">
    <div class="form-group">
    </br>
    <label class="col-md-5 control-label" for="mes" >Elige Campaña : </label>
    <div class="col-md-2">
    <select class="form-control" name="mes" id="mes" OnChange="submit()">         

    <?php   
         $meses = array('-- Seleccione --','enero','febrero','marzo','abril','mayo','junio','julio',
               'agosto','septiembre','octubre','noviembre','diciembre');

          $cod = $_SESSION["cod"];
          $mes=$_POST["mes"];

          for ($i=0; $i<sizeof($meses); $i++){
            if($mes == $i){
          echo "<option value='$i' selected>".$meses[$i]."</option>";
           } else{
            echo "<option value='$i' >".$meses[$i]."</option>"; 
           }
         }         
          
      ?>      
    </select>
    </div>        
    </div>     
    </form>


    <?php
        $reunion = new Reunion();            
        $r = $reunion->getReunionbyMonthandVol($cod,$mes);                                       
    ?>
  <section class="seccion contenedor">
    <div class="calendario" id="itemContainer">
    <?php      
    if($mes != 0) {
        while ($row = mysqli_fetch_array($r)) {
            // captura la fecha de cada evento          
          echo "<div class='dia'>
               <h4>
               <i class='fas fa-calendar-alt' aria-hidden='true'> </i>";
               setlocale(LC_TIME, 'spanish');
               echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($row[2]))) ;

          echo "</h4>
                <p class='titulo'> ".$row[1]."  </p>
                <p class='hora'>
                <i class='fas fa-clock' aria-hidden='true'></i>
                ".$row[3]."
                </p>
                <p><i class='fas fa-map-marker-alt'></i>  ".$row[0]."</p>
                <p><i class='fas fa-user' aria-hidden='true'></i>".$row[5]." ".$row[6]."</p>
                </div>";

          }}  ?>
       </div>       
    </section>


<center><div class="holder"></div></center>
</div>

</div>
</div>
</div>

<script src="js/jquery.colorbox-min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jPages.js"></script>

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
    $("#wrapper").toggleClass("toggled");
        });
</script>

<script>
  
$(function(){
    $("div.holder").jPages({
      containerID  : "itemContainer",
      perPage      : 6,
      startPage    : 1,
      startRange   : 3,
      midRange     : 1,
      endRange     : 1,
      animation   : "bounceInUp"
    });
  });

</script>


</body>

</html>