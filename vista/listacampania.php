<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
conectar();
session_start();
?>

<!DOCTYPE html>
<html> 
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
    
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>

<div id="page-content-wrapper">
    <div class="container-fluid">
             

            <div class="header"> 
                <h1 class="page-header"> Campañas Sociales </h1>            
            </div>

              

         <section id="campanas" class="campanas contenedor seccion">

          <ul class="lista-campanas clearfix">               

<?php                             
            
    $cod = $_SESSION["cod"];           

    $campania = new Campania();
    $campania->setUserid($cod);
    $r = $campania->campaniaporusuario();


                while ($row = mysqli_fetch_array($r)) {

                    echo "
                        <li>
                          <div class='campana'>
                            <a class='campana-info' href='#campana".$row["0"]."'>
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
                          </div>

                        </div>";
               }
  ?>                           
           
            </ul>
    </section>


    </div>
</div>

</div>   
    
<footer>        
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.colorbox-min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/main.js"></script>

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
    $("#wrapper").toggleClass("toggled");
        });
</script> 

</body>

</html>

