<?php
require_once ('../db/conexion.php');
require_once ('../modelo/Detallecampania.php');
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

<body background="img/fondito1.jpg">

<?php include("menutop.php"); ?>

<div id="wrapper">

<?php include("menu-voluntario.php"); ?>

<div id="page-content-wrapper">
    <div class="container-fluid">                  
      
        <div class="header"> 
            <h1 class="page-header">Campañas Sociales </h1>     
        </div>

        <section id="campanas" class="campanas contenedor seccion">

          <ul class="lista-campanas clearfix">     
               
<?php                           
                
            $cod = $_SESSION["cod"];           

            $campania = new Detallecampania();
            $campania->setUserid($cod);
            $r = $campania->campaniasporvoluntario();
            while ($row = mysqli_fetch_array($r)) {

                    echo "
                        <li>
                          <div class='campana'>
                          <a href='../controlador/salircampania.php?idcamp=".$row["5"]."&&idde=".$row["6"]."'><button class='btn btn-danger btn-block'>Salir</button></a>
                            <a class='campana-info' href='#campana".$row["6"]."'>
                            <img src='img/".$row["4"]."' alt='Campaña1'>
                            <p>".$row["0"]."</p>
                            </a>

                          </div>
                        </li>
                        <div style='display:none;'>
                          <div class='campana-info' id='campana".$row["6"]."'>
                              <h2>".$row["0"]."</h2>
                              <h3> <p>Lugar: ".$row["1"]."</p></h3>
                              <img src='img/".$row["4"]."' alt='Campaña1'>
                              <p>".$row["7"]."</p>
                              <p> Fecha de inicio :".$row["2"]."</p>
                              <p> Fecha final :".$row["3"]."</p>     
                              
                              <br/>
                                    
                          </div>

                        </div>";
               }
            /**while ($row = mysqli_fetch_array($r)) {

            echo "        
                <div class='col-md-4 col-sm-6 col-xs-12 hero-feature' >
                <div class='w3-container' >
                <div class='w3-card-4' >
                    <img src='img/".$row["4"]."' alt='Norway' width='100%'' height='200'>
                    <div class='w3-container w3-center' >
                        <br/>
                        <p>".$row["0"]."</p>
                        <p>".$row["2"]."</p>
                        <p>".$row["3"]."</p>                      
                        <br/>
                 <a href='../controlador/salircampania.php?idcamp=".$row["5"]."&&idde=".$row["6"]."'><button class='btn btn-danger btn-block'>Salir</button></a>
                 </br>

                 <a style='color:red' href='vercampania.php?idcamp=".$row["5"]."'>Ver campaña</a>        
                    </div>
                </div>
                </div>
                <br/>               
                </div> ";
            }**/

?>        
 </ul>
    </section>

            
</div>
       
</div>

</div>     

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

