<?php
require_once ('../db/conexion.php');
require_once ('../modelo/detallecampania.php');
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

    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/simple-sidebar.css" >
    <link rel="stylesheet" href="css/normalize.css"> 
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/colorbox.css">
    <link rel="stylesheet" href="css/jPages.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">   
   
</head>

<body background="img/fondito1.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-voluntario.php"); ?>

<div id="page-content-wrapper">
    <div class="container-fluid">    

    <div id="dialog" title="Guia">
  <p>1.<b>Tendrás</b> la opción de <b>salir</b> de la campaña antes de la <b>fecha de inicio.</b></p>
  <p>2.<b>No</b> podrás <b>salirte</b> de la campaña cuando ya empezó.</p>
  <p>3.Las campañas en actividad estarán <b style="color:green">En curso.</b></p>
  <p>4.Se mostrará una mensaje de <b style="color:red">Concluido</b> si la campaña terminó.</p>
  <p>5.Podrás ver la descripción de la campaña haciendo click en la <b>Imagen.</b></p>
</div>
             
      
 <div class="panel panel-success"> 
  <div class="panel-heading"><h1 style="text-align:center;"><b>Campañas Sumadas</b>
    <button id="opener"><span class="glyphicon glyphicon-question-sign"></span></button> 
  </div>  
  </div>

        <form class="form-horizontal" name="form1" method="post" action="" data-toggle="validator">
         <div class="col-md-4"></div>        
         <div class="col-md-4">
          <div class="input-group">
           <span class="input-group-btn">
            
            <button class="btn btn-info" type="submit" name="submit" value="Buscar">Buscar</button>
            </span>
            <input type="text" name="busca" id="busca" class="form-control" placeholder="Ingresa el nombre de campaña" required>
          </div>
        </div>
        <div class="col-md-4"></div>
        </form>     

<?php 

if(!empty($_POST["busca"])){
  $cod = $_SESSION["cod"]; 
  $ca = new Detallecampania();
  $ca->setUserid($cod);
  $r1 = $ca->GETcampaniasporvoluntario($_POST["busca"]);
 echo "<a class='btn btn-success' href='miscampanas.php'>volver</a>";   
}

 ?>

        <section id="campanas" class="campanas contenedor seccion">

          <ul class="lista-campanas clearfix" id="itemContainer">     
               
<?php                           
                
            $cod = $_SESSION["cod"];           

            $campania = new Detallecampania();
            $campania->setUserid($cod);
            $r = $campania->campaniasporvoluntario();

            date_default_timezone_set('america/lima');
            $d = date("Y-m-d");

if(empty($_POST["busca"])){
            while ($row = mysqli_fetch_array($r)) {

            echo "<li>
                  <div class='campana'>";
            if( $row[9] > $d){              
            echo "<a href='../controlador/campaniacontrolador.php?idcamp=".$row["5"]."&&idde=".$row["6"]."&&action=saliroeliminar'><button class='btn btn-danger btn-block'>Salir</button></a>";
               }       
            echo "<a class='campana-info' href='#campana".$row["6"]."'>";

            if( $row[9] > $d){        
              echo "<img src='img/".$row["4"]."' alt='Campaña1' width='400px' height='200px'>";
            }else {
              echo "<img src='img/".$row["4"]."' alt='Campaña1' width='400px' height='235px'>";
            }         

            echo  "<p>".$row["0"]."</p>
                  </a></div>";

            if( $row[10] > $d){       
              echo "<p style='color:green'><b>En curso</b></p>";
            }else{
              echo "<p style='color:red'><b>Concluido</b></p>";
            }                                  
                      
            echo   "</li>
                    <div style='display:none;'>
                    <div class='campana-info' id='campana".$row["6"]."'>
                    <h2>".$row["0"]."</h2>
                    <h3> <p>Lugar: ".$row["1"]."</p></h3>
                    <img src='img/".$row["4"]."' alt='Campaña1'>
                    <p>".$row["7"]."</p>
                    <p> Fecha de inicio :".$row["2"]."</p>
                    <p> Fecha final :".$row["3"]."</p>
                    <p> Vacantes : ".$row["8"]."</p>   
                    <br/>                                    
                    </div>
                    </div>";
               }//fin while
}//fin if
else{
            while ($row2 = mysqli_fetch_array($r1)) {

            echo "<li>
                  <div class='campana'>";
            if( $row2[9] > $d){        
            echo "<a href='../controlador/campaniacontrolador.php?idcamp=".$row2["5"]."&&idde=".$row2["6"]."&&action=saliroeliminar'><button class='btn btn-danger btn-block'>Salir</button></a>";
            }

            echo "<a class='campana-info' href='#campana".$row2["6"]."'>";

            if( $row2[9] > $d){    
            echo "<img src='img/".$row2["4"]."' alt='Campaña1' width='400px' height='200px'>";
            }else{
            echo "<img src='img/".$row2["4"]."' alt='Campaña1' width='400px' height='235px'>";
            }

            echo "<p>".$row2["0"]."</p>
                  </a></div>";

            if( $row2[10] > $d){       
              echo "<p style='color:green'><b>En curso</b></p>";
            }else{
              echo "<p style='color:red'><b>Concluido</b></p>";
            }         

            echo "</li>
                  <div style='display:none;'>
                  <div class='campana-info' id='campana".$row2["6"]."'>
                  <h2>".$row2["0"]."</h2>
                  <h3> <p>Lugar: ".$row2["1"]."</p></h3>
                  <img src='img/".$row2["4"]."' alt='Campaña1'>
                  <p>".$row2["7"]."</p>
                  <p> Fecha de inicio :".$row2["2"]."</p>
                  <p> Fecha final :".$row2["3"]."</p>     
                  <p> Vacantes : ".$row2["8"]."</p>
                  <br/>                                    
                  </div>
                  </div>";
            }//fin while
} // fin else          

?>        
 </ul>
    </section>

    <center><div class="holder"></div></center>

  
</div>
       
</div>

</div>     

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
      startRange   : 3,
      midRange     : 1,
      endRange     : 1,
      animation   : "bounceInUp"
    });
  });

</script>

<script>
  $( function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
    $( "#opener" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });
  } );
  </script>   



</body>

</html>

