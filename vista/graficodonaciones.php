<?php
require_once('../db/conexion.php');
require_once ('../modelo/campania.php');
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
<div class="panel-heading" style="text-align:center;"><h2>Grafico de donaciones</h2></div>   


<form class="form-horizontal" id="form1" name="form1" method="post" action="" data-toggle="validator">  
<div class="form-group">
    </br>
    <label class="col-md-5 control-label" for="fil" >Seleccione un Filtro : </label>
    <div class="col-md-2"> 
    <select class="form-control" name="filtro" id="cbocamp" required>             
         <option value="" >-- Seleccione --</option>
         <option value="1">Filtrar por campañas</option>
         <option value="2">Filtrar por voluntarios</option>  
         <option value="3">Filtrar por categorias</option>                    
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
}elseif( $_POST["filtro"] == 2){
 echo "<div id='container2' style='min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto'></div>";
}else{
echo "<div id='container3' style='min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto'></div>";
}

}

$cod = $_SESSION["cod"];
if(isset($_POST["txtfecha1"]) and  isset($_POST["txtfecha2"])){
$f1=$_POST["txtfecha1"];
$f2=$_POST["txtfecha2"];
$fecha1 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha1"])));
$fecha2 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha2"])));
//Filtro 1
$consulta1 = "SELECT COUNT(*) as cantidad,c.title,c.campaign_id from donations d inner JOIN campaigns c on d.campaign_id=c.campaign_id where c.user_id=$cod and d.estado=1 and c.start_date>'$fecha1' and c.start_date<'$fecha2' GROUP BY c.title";

$resultados1 = ejecutar($consulta1); 

//Filtro 2
$consulta2 = "SELECT u.firstname,COUNT(*) as cantidad,u.user_id from donations d inner JOIN users u on d.user_id=u.user_id INNER JOIN campaigns c on c.campaign_id=d.campaign_id where d.estado = 1 and c.start_date>'$fecha1' and c.start_date<'$fecha2' GROUP BY u.firstname";

$resultados2 = ejecutar($consulta2);

//Filtro 3
$consulta3 = "SELECT SUM(d.quantility),cd.descripcion,cd.catdon_id FROM donations d inner join categoria_donacion cd on d.catdon_id=cd.catdon_id INNER JOIN campaigns c on c.campaign_id=d.campaign_id where d.estado=1 and c.start_date>'$fecha1' and c.start_date<'$fecha2' GROUP BY cd.descripcion";

$resultados3 = ejecutar($consulta3);
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
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
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
    chart: { type: 'column' },
    title: { text: 'Cantidad de donaciones por campaña <?php echo "<br/>Desde: $f1 Hasta: $f2" ?>' },    
    xAxis: { type: 'category' },
    yAxis: {
        title: { text: 'Donaciones' }
    },
    legend: { enabled: false },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: { enabled: true, }
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> donaciones<br/>'
    },

    "series": [
         {
            "name": "campaña",
            "colorByPoint": true,
            "data": [

             <?php while($row = mysqli_fetch_array($resultados1)){?>                       
                {
                    "name": "<?php echo "<a href='graficodonaciones2.php?idcamp=$row[2]'>$row[1]</a>"; ?>",
                    "y": <?php echo $row[0]; ?>,                    
                },
            <?php  }


             ?> 

            ]
        }
    ],    
});
</script>

<script>
Highcharts.chart('container2', {
    chart: { type: 'column' },
    title: { text: 'Cantidad de donaciones por voluntarios <?php echo "<br/>Desde: $f1 Hasta: $f2" ?>' },    
    xAxis: { type: 'category' },
    yAxis: { 
        title: { text: 'Donaciones' }
    },
    legend: { enabled: false },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: { enabled: true, }
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> donaciones<br/>'
    },

    "series": [
        {
            "name": "voluntario",
            "colorByPoint": true,
            "data": [

             <?php  
             while($row = mysqli_fetch_array($resultados2)){?>                       
                {
                    "name": "<?php echo "<a href='graficodonaciones2.php?idvol=$row[2]'>$row[0]</a>"; ?>",
                    "y": <?php echo $row[1]; ?>,                    
                },
            <?php  } ?>

            ]
        }
    ],    
});
</script>

<script>
Highcharts.chart('container3', {
    chart: { type: 'column' },
    title: { text: 'Cantidad de donaciones por categoria <?php echo "<br/>Desde: $f1 Hasta: $f2" ?>' },
    xAxis: { type: 'category' },
    yAxis: {
        title: { text: 'Donaciones' }
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: { enabled: true,}//format: '{point.y:.1f}%'     
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> <br/>'
    },

    "series": [
        {
            "name": "categoria",
            "colorByPoint": true,
            "data": [

             <?php  
             while($row = mysqli_fetch_array($resultados3)){?>                       
                {
                    "name": "<?php echo "<a href='graficodonaciones2.php?idcat=$row[2]'>$row[1]</a>"; ?>",
                    "y": <?php echo $row[0]; ?>,                    
                },
            <?php  } ?> 

            ]
        }
    ],
    
});
</script>


</body>
</html>

