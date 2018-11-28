<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/detallecampania.php');
require_once ('../modelo/donacion.php');
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

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="css/notificacion.css"rel="stylesheet">     
    <link href="css/remodal.css" rel="stylesheet">
    <link href="css/remodal-default-theme.css" rel="stylesheet">   

</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>

<div id="page-content-wrapper">
      <div class="container-fluid">                   
          
<div class="panel panel-primary"> 
<div class="panel-heading"><h3 style="text-align:center;">Genera reportes </h3></div>  
</div> 

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading"></h4>
  <center>
    <h2><i>Campañas</i></h2>
    <a href="#modal1" class="btn btn-danger"><h3>PDF</h3></a>
    <a href="graficocampanias.php" class="btn btn-danger"><h3>Grafico</h3></a>
  <center>
</div>

<?php include('reporte-campania.php'); ?>
 
 <div class="alert alert-info" role="alert">
  <h4 class="alert-heading"></h4>
  <center>
    <h2><i>Voluntarios</i></h2>
    <a href="#modal2" class="btn btn-danger"><h3>PDF</h3></a>
    <a href="graficovoluntario.php" class="btn btn-danger"><h3>Grafico</h3></a>
  <center>  
</div>

<?php include('reporte-voluntario.php'); ?>         
          
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading"></h4>
  <center>
    <h2><i>Donaciones</i></h2>
    <a href="#modal3" class="btn btn-danger"><h3>PDF</h3></a>
    <a href="graficodonaciones.php" class="btn btn-danger"><h3>Grafico</h3></a>
  <center>  
</div>       

<?php include('reporte-donaciones.php'); ?>  
                      
      </div>
</div>

</div>            
    
<footer>
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script> 
<script src="js/jquery-ui.js"></script>
<script src="js/remodal.js"></script>


<script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
</script>
 
<script>
  
 var dateToday = new Date(); 

$("#fecha1").datepicker({  
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],  
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    dateFormat: 'dd/mm/yy',     
     //minDate: dateToday 
    
});

$("#fecha2").datepicker({  
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],  
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    dateFormat: 'dd/mm/yy',     
     //minDate: dateToday 
    
});
 
  </script> 

<?php 
include('templates/notificacion.php');
 ?>

 <script>
function ValidarFechaInicial()
{

var f1 = document.getElementById("fecha1").value;
var f2 = document.getElementById("fecha2").value;
 
if (($.datepicker.parseDate('dd/mm/yy', f1) > $.datepicker.parseDate('dd/mm/yy', f2)) && f2 != ""){
     alert("La Fecha Inicial no puede ser mayor que la Fecha Final");
     document.getElementById("fecha1").value = "";
     return
}else{ 
}
}
 
</script>

<script>
function ValidarFechaFinal()
{

var f1 = document.getElementById("fecha1").value;
var f2 = document.getElementById("fecha2").value;
 
if ($.datepicker.parseDate('dd/mm/yy', f2) < $.datepicker.parseDate('dd/mm/yy', f1)){
     alert("La Fecha Final no puede ser menor que la Fecha Inicial");
     document.getElementById("fecha2").value = "";
     return
}else{ 
}
}
 
</script>


</body>

</html>

