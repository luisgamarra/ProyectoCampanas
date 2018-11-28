<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
conectar();
session_start();
include('templates/validar.php');
?>

<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Campañas Sociales</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <link rel="stylesheet" href="css/normalize.css"> 
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/colorbox.css">
    <link rel="stylesheet" href="css/jPages.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/notificacion.css" >      
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>

<div id="page-content-wrapper">
    <div class="container-fluid">         

  <div class="panel panel-primary"> 
  <div class="panel-heading"><h1 style="text-align:center;"><b>Campañas Sociales</b></div>  
  </div>               

  <form class="form-horizontal" name="form1" method="post" action="" data-toggle="validator">
     <div class="col-md-4"></div>        
     <div class="col-md-4">
     <div class="input-group">
      <span class="input-group-btn">        
        <button class="btn btn-info" type="submit" name="submit" value="Buscar">Buscar</button>
      </span>
      <input type="text" name="busca" id="busca" class="form-control" placeholder="Ingresa un nombre de campaña" required>
     </div>
     <div class="help-block with-errors"></div>
     </div>
     <div class="col-md-4"></div> 
  </form>

<?php 
if(!empty($_POST["busca"])){ 

  $cod = $_SESSION["cod"]; 
  $ca = new Campania();
  $ca->setUserid($cod);
  $r1 = $ca->buscarcampania($_POST["busca"]);
  echo "<a class='btn btn-success' href='listacampania.php'>volver</a>";   
}
?>
              

         <section id="campanas" class="campanas contenedor seccion">

          <ul class="lista-campanas clearfix" id="itemContainer">   
                      

<?php                             
            
    $cod = $_SESSION["cod"];           

    $campania = new Campania();
    $campania->setUserid($cod);
    $r = $campania->campaniaporusuario();

if(empty($_POST["busca"])){
                while ($row = mysqli_fetch_array($r)) {

                    echo "
                        <li>                        
                          <div class='campana'>
                            <a class='campana-info' href='#campana".$row["0"]."'>
                            <img src='img/".$row["7"]."' width='400px' height='200px'>
                            <p>".$row["1"]."</p>
                            </a>
                          </div>
                        </li>
                        <div style='display:none;'>
                          <div class='campana-info' id='campana".$row["0"]."'>
                              <h2>".$row["1"]."</h2>
                              <h3> <p>Lugar: ".$row["3"]."</p></h3>
                              <img src='img/".$row["7"]."' >
                              <p>".$row["2"]."</p>
                              <p> Fecha de inicio :".$row["5"]."</p>
                              <p> Fecha final :".$row["6"]."</p>     
                              <p> Vacantes : ".$row["4"]."</p>       
                          </div>

                        </div>";
               }
             }else{
                while ($row2 = mysqli_fetch_array($r1)) {

                    echo "
                        <li>                        
                          <div class='campana'>
                            <a class='campana-info' href='#campana".$row2["0"]."'>
                            <img src='img/".$row2["7"]."' width='400px' height='200px'>
                            <p>".$row2["1"]."</p>
                            </a>
                          </div>
                        </li>
                        <div style='display:none;'>
                          <div class='campana-info' id='campana".$row2["0"]."'>
                              <h2>".$row2["1"]."</h2>
                              <h3> <p>Lugar: ".$row2["3"]."</p></h3>
                              <img src='img/".$row2["7"]."' >
                              <p>".$row2["2"]."</p>
                              <p> Fecha de inicio :".$row2["5"]."</p>
                              <p> Fecha final :".$row2["6"]."</p>     
                              <p> Vacantes : ".$row2["4"]."</p>       
                          </div>

                        </div>";}

             }

  ?>                           
           
            </ul>
    </section>




<center><div class="holder"></div></center>

    </div>
</div>

</div>   
    

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script>
<script src="js/jquery.colorbox-min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/main.js"></script>
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
      startRange   : 1,
      midRange     : 1,
      endRange     : 1,
      animation   : "bounceInUp"
    });
  });

</script>

<?php 
include('templates/notificacion.php');
 ?>

</body>

</html>

