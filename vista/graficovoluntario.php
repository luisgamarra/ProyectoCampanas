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
    
   
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>


<div id="page-content-wrapper">
<div class="container-fluid">

<div class="panel panel-primary"> 
<div class="panel-heading" style="text-align:center;"><h2>Grafico de voluntarios</h2></div>   


<form class="form-horizontal" id="form1" name="form1" method="post" action="">  
<div class="form-group">
    </br>
    <label class="col-md-5 control-label" for="fil" >Seleccione un Filtro : </label>
    <div class="col-md-2">  
    <select class="form-control" name="filtro" id="cbocamp" onChange="submit()" >             
         <option value="0" >-- Seleccione --</option>
         <option value="1">Filtrar por campañas</option>
         <option value="2">Filtrar por voluntarios</option>                    
     </select>          
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
$sql1 = "SELECT c.title,COUNT(*) as cantidad from details_campaigns d inner JOIN campaigns c on d.campaign_id=c.campaign_id where d.estado = 1 GROUP BY c.title";

$resultados1 = ejecutar($sql1);

//Filtro 2
$sql2 = "SELECT u.firstname,u.lastname,COUNT(*) as cantidad from details_campaigns d inner JOIN users u on d.user_id=u.user_id where d.estado = 1 GROUP BY d.user_id";

$resultados2 = ejecutar($sql2);

?>  
   
</div>

</div>
</div>

</div>
   
<footer>        
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>



<script>
    $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
</script> 

<?php 
include('templates/notificacion.php');
 ?>

<script>            
Highcharts.chart('container1', {
    chart: { type: 'column'},
    title: { text: 'cantidad de voluntarios por campaña' },   
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
    title: { text: 'cantidad de campañas por voluntario' },   
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

