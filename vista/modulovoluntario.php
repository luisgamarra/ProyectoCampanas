<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/detallecampania.php');
conectar();
session_start();
include('templates/validar.php');
?>

<!DOCTYPE html>
<html > 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Campañas Sociales</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css"> 
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/colorbox.css">
    <link rel="stylesheet" href="css/jPages.css">
    <link rel="stylesheet" href="css/animate.css">
  
</head>

<body background="img/fondito1.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-voluntario.php"); ?>


<div id="page-content-wrapper">
    <div class="container-fluid">      

        <div class="header"> 
            <h1 class="page-header"> Campañas Sociales </h1>    
        </div> 

        <form class="form-horizontal" name="form1" method="post" action="" data-toggle="validator">
         <div class="col-md-4"></div>        
         <div class="col-md-4">
          <div class="input-group">
           <span class="input-group-btn">
            <h1>BUSCAR USUARIO</h1>
            <button class="btn btn-info" type="submit" name="submit" value="Buscar">Buscar</button>
            </span>
            <input type="text" name="busca" id="busca" class="form-control" required>
          </div>
        </div>
        <div class="col-md-4"></div>
        </form>     


<?php 

if(!empty($_POST["busca"])){  
  $ca = new Campania();  
  $r1 = $ca->buscar($_POST["busca"]);
 echo "<a class='btn btn-success' href='modulovoluntario.php'>volver</a>";
   
}
 ?>
          
          <section id="campanas" class="campanas contenedor seccion">

          <ul class="lista-campanas clearfix" id="itemContainer">               


<?php
                             
$cod = $_SESSION["cod"];                
                     

            $campania = new Campania();                
            $r = $campania->campanias();

if(empty($_POST["busca"])){
            while ($row = mysqli_fetch_array($r)) {
                         

                    echo "
                        <li>
                          <div class='campana'>";

                    echo "<a href='../controlador/campaniacontrolador.php?idcamp=".$row["0"]."&&nomcamp=".$row["1"]."&&action=sumarse'><button class='btn btn-primary btn-block'>Sumarse</button></a>";

                    echo       "<a class='campana-info' href='#campana".$row["0"]."'>
                            <img src='img/".$row["7"]."' alt='Campaña1'>
                            <p>".$row["1"]."</p>
                            </a>

                          </div>
                        </li>
                        <div style='display:none;'>
                          <div class='campana-info' id='campana".$row["0"]."'>
                              <h2>".$row["1"]."</h2>
                              <h3> <p>Lugar: ".$row["3"]."</p></h3>
                              <img src='img/".$row["7"]."' alt='Campaña1'>
                              <p>".$row["2"]."</p>
                              <p> Fecha de inicio :".$row["5"]."</p>
                              <p> Fecha final :".$row["6"]."</p>     
                              <p> Vacantes : ".$row["4"]."</p>  
                              
                              <br/>
                                    
                          </div>

                        </div>";
                                      }//fin while

                }//fin if
                else{
                  while ($row2 = mysqli_fetch_array($r1)) {
                     echo "
                        <li>
                          <div class='campana'>";

                    echo "<a href='../controlador/campaniacontrolador.php?idcamp=".$row2["0"]."&&nomcamp=".$row2["1"]."&&action=sumarse'><button class='btn btn-primary btn-block'>Sumarse</button></a>";

                    echo       "<a class='campana-info' href='#campana".$row2["0"]."'>
                            <img src='img/".$row2["7"]."' alt='Campaña1'>
                            <p>".$row2["1"]."</p>
                            </a>

                          </div>
                        </li>
                        <div style='display:none;'>
                          <div class='campana-info' id='campana".$row2["0"]."'>
                              <h2>".$row2["1"]."</h2>
                              <h3> <p>Lugar: ".$row2["3"]."</p></h3>
                              <img src='img/".$row2["7"]."' alt='Campaña1'>
                              <p>".$row2["2"]."</p>
                              <p> Fecha de inicio :".$row2["5"]."</p>
                              <p> Fecha final :".$row2["6"]."</p>     
                              <p> Vacantes : ".$row2["4"]."</p>  
                              
                              <br/>
                                    
                          </div>

                        </div>";
                                      }

                }//fin else
           

?>  
        </ul>
    </section>

    <center><div class="holder"></div></center>
                       
</div>
       
</div>

</div>   
 
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.colorbox-min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/jPages.js"></script>
  <script src="js/validator.js"></script> 


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
      startRange   : 1,
      midRange     : 1,
      endRange     : 1,
      animation   : "bounceInUp"
    });
  });

</script>

</body>

</html>

