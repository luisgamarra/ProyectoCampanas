<?php
require_once ('../modelo/conexion.php');
require_once ('../modelo/campania.php');
 conectar();
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
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

        <?php include("menu-usuario.php"); ?>

    

        
<!--<li><li><a href="MyProfile.php"><i class="fa fa-user fa-fw"></i> My Profile</a>
</li>
<a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
</li> -->

<div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
      

                       <div class="header"> 
                        <h1 class="page-header">
                            Campañas Sociales
                        </h1>     
                       <!-- <a href='RegistroCampania.php'><button class='btn btn-primary '>Crear</button></a>
                         <a href='CampaniaSocial.php'><button class='btn btn-primary '>Detalle</button></a>  -->

                    </div>

</br>  

      
          

<?php
                              
$cod = $_SESSION["cod"];  

                
                     

            $campania = new Campania();
            $campania->setId($cod);            
            $r = $campania->campanias();
 while ($row = mysqli_fetch_array($r)) {



echo "
        
        <div class='col-md-4 col-sm-6 col-xs-12 hero-feature' >
            <div class='w3-container' >
                <div class='w3-card-4' >
                    <img src='img/".$row["5"]."' alt='Norway' width='100%'' height='200'>
                    <div class='w3-container w3-center' >
                        <br/>
                        <p>".$row["1"]."</p>
                        <p>".$row["2"]."</p> 
                        <p> Vacantes : ".$row["3"]."</p>                     
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

