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
    
   
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>


<div id="page-content-wrapper">
<div class="container-fluid">

<a class="btn btn-success" href="graficodonaciones.php">Volver</a>


<?php  


$codcamp = "";
$codvol = "";
$codcatdon = "";
if(isset($_REQUEST["idcamp"])){
  $codcamp = $_REQUEST["idcamp"];
echo "<div id='container1' style='min-width: 210px; height: 400px; margin: 0 auto'></div>";
}
elseif(isset($_REQUEST["idvol"])){
  $codvol = $_REQUEST["idvol"];
echo "<div id='container2' style='min-width: 310px; height: 400px; margin: 0 auto'></div>";
}
elseif(isset($_REQUEST["idcat"])){
  $codcatdon = $_REQUEST["idcat"];
echo "<div id='container3' style='min-width: 310px; height: 400px; margin: 0 auto'></div>";
}

//Filtro 1
if(isset($_REQUEST["idcamp"])){
$cons = "SELECT * FROM campaigns where campaign_id=$codcamp";
$fila = ejecutar($cons);
$res = mysqli_fetch_array($fila); 

$consulta1 = "SELECT u.firstname,COUNT(*) as cantidad from donations d inner JOIN users u on d.user_id=u.user_id where d.campaign_id=$codcamp and d.estado = 1 GROUP BY u.firstname";
$resultados1 = ejecutar($consulta1);
}

//Filtro 2
if(isset($_REQUEST["idvol"])){
$cons2 = "SELECT * FROM users where user_id=$codvol";
$fila2 = ejecutar($cons2);
$res2 = mysqli_fetch_array($fila2);

$consulta2 = "SELECT COUNT(*) as cantidad,c.title from donations d inner JOIN campaigns c on d.campaign_id=c.campaign_id where d.user_id=$codvol and d.estado=1 GROUP BY c.title";
$resultados2 = ejecutar($consulta2); 
}


//Filtro 3
if(isset($_REQUEST["idcat"])){
$cons3 = "SELECT * FROM categoria_donacion where catdon_id=$codcatdon";
$fila3 = ejecutar($cons3);
$res3 = mysqli_fetch_array($fila3);

$consulta3 = "SELECT SUM(d.quantility),u.firstname,u.lastname FROM donations d inner join users u on d.user_id=u.user_id where d.catdon_id='$codcatdon' GROUP BY d.user_id";

$resultados3 = ejecutar($consulta3);

}
?> 

      
</div>
</div>

</div>
   
<footer>        
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
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
    chart: { type: 'column' },
    title: { text: "Cantidad de donaciones por voluntario en la campaña <?php echo $res[1] ?>" },    
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

             <?php while($row = mysqli_fetch_array($resultados1)){?>                       
                {
                    "name": "<?php echo $row[0]; ?>",
                    "y": <?php echo $row[1]; ?>,                    
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
    title: { text: "Cantidad de donaciones por campaña del voluntario <?php echo $res2[1] ?> <?php echo $res2[2] ?>" },    
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

             <?php while($row = mysqli_fetch_array($resultados2)){?>                       
                {
                    "name": "<?php echo $row[1]; ?>",
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
Highcharts.chart('container3', {
    chart: { type: 'column' },
    title: { text: "Cantidad de donaciones por voluntario de la categoria <?php echo $res3[1] ?>" },    
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

             <?php while($row = mysqli_fetch_array($resultados3)){?>                       
                {
                    "name": "<?php echo $row[1]; ?> <?php echo $row[2]; ?>",
                    "y": <?php echo $row[0]; ?>,                    
                },
            <?php  }


             ?> 

            ]
        }
    ],    
});
</script>

</body>
</html>

