<?php
require_once ('../db/conexion.php');
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
          

                <div class="header"> 
                  <h1 class="page-header"> Crear Foro </h1>           
                </div>    
           
  <form class="form-horizontal" action="../controlador/forocontrolador.php" method="post" data-toggle="validator" >           
         
        <!-- Text input-->
        <div class="form-group" >
          <label class="col-md-4 control-label" for="title" >Titulo : </label>
          <div class="col-md-5" >
          <input id="title" name="txtitulo" type="text" placeholder="Titulo" class="form-control input-md" required>
          </div>
          <div class="help-block with-errors"></div>
        </div>      

               <!-- Button -->
        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">
                                 
          <button class="btn btn-primary" block="true" type="submit" name="action" value="create"> Crear </button>
          </div>
        </div>
      
  </form>              
                      
                      
      </div>
</div>

</div>            
    
<footer>
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script> 

<script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
</script>
 

</body>

</html>

