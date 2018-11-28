<?php
require_once('../db/conexion.php');
session_start();
include('templates/validar.php');
conectar();
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
    <link href="css/notificacion.css" rel="stylesheet"> 
     <link href="css/jquery-ui.css" rel="stylesheet">  
   
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>


<div id="page-content-wrapper">
<div class="container-fluid">

<div class="panel panel-primary"> 
<div class="panel-heading" style="text-align:center;"><h2>Grafico de voluntarios</h2></div>   


<form class="form-horizontal" id="form1" name="form1" method="post" action="" data-toggle="validator">  
<div class="form-group">
    </br>
    <label class="col-md-5 control-label" for="fil" >Seleccione un Filtro : </label>
    <div class="col-md-2">  
    <select class="form-control" name="filtro" id="cbocamp" required>             
         <option value="" >-- Seleccione --</option>
         <option value="1">Filtrar por campañas</option>
         <option value="2">Filtrar por voluntarios</option>                    
     </select>          
   </div> 
   <div class="help-block with-errors"></div>     
</div>
<div class="form-group">
          <label class="col-md-5 control-label" for="fecha" >Desde : </label>
          <div class="col-md-2">
          <input id="fecha1" onchange="ValidarFechaInicial();" name="txtfecha1" type="text" placeholder="desde" class="form-control input-md" required>      
          </div>
           <div class="help-block with-errors"></div>
        </div>
         <div class="form-group">    
          <label class="col-md-5 control-label" for="fecha" >Hasta : </label>
          <div class="col-md-2">
          <input id="fecha2" onchange="ValidarFechaFinal();" name="txtfecha2" type="text" placeholder="hasta" class="form-control input-md" required>
          </div>
            <div class="help-block with-errors"></div>      
</div>

<div class="form-group">
    <div class="col-md-5"></div>
    <div class="col-md-6">                                    
    <button class="btn btn-info" block="true" type="submit" name="action" value="create"> Generar Reporte </button>      
    </div>
</div>  
</form>    
</br>

<?php 
if(isset($_POST["filtro"])){

if ( $_POST["filtro"] == 1){
echo "<div id='container1' style='min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto'></div>"; 
}else{
echo "<div id='container2' style='min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto'></div>";
}

}

//Filtro 1
if(isset($_POST["txtfecha1"]) and  isset($_POST["txtfecha2"])){
$f1=$_POST["txtfecha1"];
$f2=$_POST["txtfecha2"];
$fecha1 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha1"])));
$fecha2 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha2"])));

$sql1 = "SELECT c.title,COUNT(*) as cantidad from details_campaigns d inner JOIN campaigns c on d.campaign_id=c.campaign_id where d.estado = 1 and c.start_date>'$fecha1' and c.start_date<'$fecha2' GROUP BY c.title";

$resultados1 = ejecutar($sql1);

//Filtro 2
$sql2 = "SELECT u.firstname,u.lastname,COUNT(*) as cantidad from details_campaigns d inner JOIN users u on d.user_id=u.user_id INNER JOIN campaigns c on c.campaign_id=d.campaign_id where d.estado = 1 and c.start_date>'$fecha1' and c.start_date<'$fecha2' GROUP BY d.user_id";

$resultados2 = ejecutar($sql2);
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
<script src="js/validator.js"></script> 
<script src="js/jquery-ui.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>



<script>
    $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
</script> 

<script>
 
$("#fecha1").datepicker({  
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],  
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    dateFormat: 'dd/mm/yy',     
     
    
});

$("#fecha2").datepicker({  
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],  
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    dateFormat: 'dd/mm/yy',     
    
});

</script>

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

<?php 
include('templates/notificacion.php');
 ?>

<script>            
Highcharts.chart('container1', {
    chart: { type: 'column'},
    title: { text: 'cantidad de voluntarios por campaña <?php echo "<br/>Desde: $f1 Hasta: $f2" ?>' },   
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: { text: 'voluntarios' }
    },
    legend: { enabled: false },   
    series: [{
        name: 'voluntarios',
        data: [

        <?php  
             while($row = mysqli_fetch_array($resultados1)){?>
            ['<?php echo $row[0]; ?>', <?php echo $row[1]; ?>],
            
        <?php  } ?> 
        ],
        dataLabels: {
            enabled: true,
            //rotation: -90,
            color: '#FFFFFF',
            align: 'center',
            //format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script> 

<script>            
Highcharts.chart('container2', {
    chart: { type: 'column'},
    title: { text: 'cantidad de campañas por voluntario <?php echo "<br/>Desde: $f1 Hasta: $f2" ?>' },   
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: { text: 'campañas' }
    },
    legend: { enabled: false },   
    series: [{
        name: 'campañas',
        data: [

        <?php  
             while($row = mysqli_fetch_array($resultados2)){?>
            ['<?php echo $row[0]; ?> <?php echo $row[1]; ?>', <?php echo $row[2]; ?>],
            
        <?php  } ?> 
        ],
        dataLabels: {
            enabled: true,
            //rotation: -90,
            color: '#FFFFFF',
            align: 'center',
            //format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>   

</body>

</html>

