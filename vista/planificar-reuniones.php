<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/reunion.php');
conectar();
session_start();
include('templates/validar.php');
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
    <link href="css/jquery.timepicker.css" rel="stylesheet" >
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="css/notificacion.css" rel="stylesheet" >     

</head>

<body background="img/fondito1.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>

<div id="page-content-wrapper">
   <div class="container-fluid">
                    
     <div class="panel panel-primary"> 
      <div class="panel-heading"><h3 style="text-align:center;">Crea reuniones para tus campañas</h3></div>  
      </div>    
    
  <form class="form-horizontal" action="../controlador/reunioncontrolador.php" data-toggle="validator" method="post">      
                            
        <!-- Text input-->
        <div class="form-group" >
          <label class="col-md-4 control-label" for="asunto" >Asunto : </label>
          <div class="col-md-4" >
          <input id="asunto" name="txtasunto" type="text" placeholder="Asunto" class="form-control input-md" required>          
          </div>
          <div class="help-block with-errors"></div>
        </div>        

        <div class="form-group">
          <label class="col-md-4 control-label" for="fecha" >Fecha : </label>
          <div class="col-md-4">
          <input id="fecha" name="txtfecha" type="text" placeholder="Fecha" class="form-control input-md" required >          
          </div>
          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="hora" >Hora : </label>
          <div class="col-md-4">
        <input  type="text" id="time" name="txthora" class="form-control input-md"  required>
          </div>
          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="camp" >Para Campaña : </label>
          <div class="col-md-4">
          <select class="form-control" name="camp" id="camp" required>
            
         <option value="" >-- Seleccione --</option>

         <?php    

          $cod = $_SESSION["cod"];
          $codcamp=$_POST["camp"];

          $campania = new Campania();
          $campania->setUserid($cod);
          $rc = $campania->campaniaporusuariomfechafinal();  
          
          while($row=mysqli_fetch_array($rc)){
          if($codcamp == $row[0]){
          echo "<option value='".$row[0]."' selected>".$row[1]."</option>";
          }else{
          echo "<option value='".$row[0]."' >".$row[1]."</option>"; 

          }
          }
          ?>  

          </select>
          
          </div>
          <div class="help-block with-errors"></div>
        </div>     
          
        <!-- Button -->
        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">
                                    
          <button class="btn btn-primary" block="true" type="submit" name="action" value="create"> Guardar </button>
          <a class="btn btn-primary" href="calendario.php">Ver calendario</a>
          <a class='btn btn-info' href='panelcontrol.php'>Cancelar</a>
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
<script src="js/jquery.timepicker.js"></script>
<script src="js/jquery-ui.js"></script>

<script>
  $("#menu-toggle").click(function(e) {
      e.preventDefault();
  $("#wrapper").toggleClass("toggled");
        });

 $('#time').timepicker();
</script> 


<script>
  
 var dateToday = new Date(); 

$("#fecha").datepicker({  
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],  
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    dateFormat: 'dd/mm/yy',     
     minDate: dateToday 
    
});
</script>

<?php 
include('templates/notificacion.php');
 ?>

</body>

</html>

