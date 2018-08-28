<?php
require_once ('../modelo/conexion.php');
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

        <?php include("menuleft.php"); ?>

    

        
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
                            Registrar Campaña
                        </h1>
            
                  
      </div>


      
       
     

        <form class="form-horizontal" action="../controlador/campaniacontrolador.php/create()" method="post" enctype="multipart/form-data">
        
                    
      
          <div class="form-bottom">
        <!-- Text input-->
        <div class="form-group" >
          <label class="col-md-4 control-label" for="title" style="color: #000000" >Titulo : </label>
          <div class="col-md-5" >
          <input id="title" name="txtitulo" type="text" placeholder="Titulo" class="form-control input-md" required="">
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="lugar" style="color: #000000" >Lugar : </label>
          <div class="col-md-5">
          <input id="lugar" name="txtlugar" type="text" placeholder="Lugar" class="form-control input-md" required="">
          </div>
        </div>

          
           <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="vacante" style="color: #000000" >Vacantes : </label>
          <div class="col-md-4">
          <input id="vacante" name="txtvacante" type="number" placeholder="Vacantes" class="form-control input-md"  required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="fecha" style="color: #000000" >Fecha : </label>
          <div class="col-md-4">
          <input id="fecha" name="txtfecha" type="date" placeholder="Fecha" class="form-control input-md"  required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="imagen" style="color: #000000" >Imagen : </label>
          <div class="col-md-4">
          
        <input type="file" name="txtimagen" id="imagen"/>
        </div>
        </div>
          
               <!-- Button -->
        <div class="form-group">
           <div class="col-md-4">
           </div>
          <div class="col-md-4">
          <input type="hidden" value="create" name="action"/>                            
            <button class="btn btn-primary" block="true" type="submit" value="create"> Guardar </button>
          </div>
        </div>

      </div>
    </form>                
                        
        
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

