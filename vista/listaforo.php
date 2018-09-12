<?php
require_once ('../db/conexion.php');
require_once ('../modelo/foro.php');
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
    
    
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-voluntario.php"); ?>

<div id="page-content-wrapper">
    <div class="container-fluid">
             

              
         
    <div class="table-responsive">
    <table class="table table-hover" border="2" border-color="red" >
      <tr BGCOLOR="#8bb033"><th colspan="5" style="color:white;">Foros</tr>
    <tr BGCOLOR="#76848e">
    <th style="text-align:right;"></th>
    <th style="text-align:center; color:white;">Usuario</th>
    <th style="text-align:center; color:white;">Tema</th>
    <th style="text-align:center; color:white;">Fecha</th>
    <th style="text-align:center; color:white;">Respuestas</th>   
    </tr>    
  
  


<?php                             
            
    $cod = $_SESSION["cod"];           

    $foro = new Foro();    
    $r = $foro->listaforos();




                while ($row = mysqli_fetch_array($r)) {

                  echo "<tr BGCOLOR='white'>
                            <td align='center'><img src='img/".$row["5"]."' width='40px'></td>
                            <td align='center'>".$row["3"]." ".$row["4"]."</td>
                            <td align='center'><a href='participarforo.php?foroid=".$row["0"]."&&ft=".$row["1"]."'> ".$row["1"]."</a></td>
                            <td align='center'>".$row["2"]."</td>
                            <td align='center'>".$row["6"]."</td></tr>";

   
               }
  ?>                           
           
   

    </div>
</div>

</div>   
    
<footer>        
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
    $("#wrapper").toggleClass("toggled");
        });
</script> 

</body>

</html>
