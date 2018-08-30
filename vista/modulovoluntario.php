<?php
require_once ('../modelo/conexion.php');
require_once ('../modelo/campania.php');
conectar();
session_start();
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>

<?php include("menutop.php"); ?>

<div id="wrapper">

<?php include("menu-voluntario.php"); ?>


<div id="page-content-wrapper">
    <div class="container-fluid">      

        <div class="header"> 
            <h1 class="page-header"> Campañas Sociales </h1>    
        </div>      
          

<?php
                              
$cod = $_SESSION["cod"];                 
                     

            $campania = new Campania();                
            $r = $campania->campanias();
            while ($row = mysqli_fetch_array($r)) {

            echo "
        
            <div class='col-md-4 col-sm-6 col-xs-12 hero-feature' >
            <div class='w3-container' >
                <div class='w3-card-4' >
                    <img src='img/".$row["7"]."' alt='Norway' width='100%'' height='200'>
                    <div class='w3-container w3-center' >
                        <br/>
                        <p>".$row["1"]."</p>
                        <p> Fecha de inicio : ".$row["5"]."</p>    
                        <p> Fecha final : ".$row["6"]."</p>                             
                        <p> Vacantes : ".$row["4"]."</p>                     
                        <br/>

                 <a href='../controlador/sumarsecampania.php?idcamp=".$row["0"]."'><button class='btn btn-primary btn-block'>Sumarse</button></a>         

                    <br/>

                    </div>
                </div>
            </div>
            <br/>            
            </div> ";
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

