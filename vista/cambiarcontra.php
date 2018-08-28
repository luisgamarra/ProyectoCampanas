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

        <?php

        $tipo =@$_SESSION['tipo'];

        if( $tipo == "1"){

        include("menuleft.php"); 

    }else{
        include("menu-usuario.php"); 
    }
    ?>

    

        
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
                            Cambiar contraseña
                        </h1>
            
                  
      </div>


      
       
     

        <form class="form-horizontal" action="../controlador/usuariocontrolador.php" data-toggle="validator" method="post">        
                        
           <div class="form-group">
          <label class="col-md-4 control-label" for="ca" >Contraseña actual</label>
          <div class="col-md-4">
          <input id="ca" name="txtca" type="password" placeholder="Contraseña actual" class="form-control input-md" 
           required>
          <div class="help-block with-errors"></div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="cn" >Contraseña Nueva</label>
          <div class="col-md-5">
          <input id="cn" name="txtcn" type="password" placeholder="Contraseña nueva" class="form-control input-md" data-minlength="6" required>
          <span class="help-block">Mínimo de seis (6) digitos</span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="cc" >Confirma Contraseña</label>
          <div class="col-md-5">
          <input id="cc" name="txtcc" type="password" placeholder="Confirma contraseña" class="form-control input-md" 
         data-match="#cn" data-match-error="escribe la misma contraseña" required>
         <div class="help-block with-errors"></div>
          </div>
        </div>

         <div class="form-group">
           <div class="col-md-4">
           </div>
          <div class="col-md-4">
          <input type="hidden" value="cambiarcontrasenia" name="action"/>                            
            <button class="btn btn-primary" block="true" type="submit" value="cambiarcontrasenia"> Aceptar </button>
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
<script src="js/validator.js"></script>

        <script src="js/bootstrap.min.js"></script>


        <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        </script>
 

</body>

</html>

