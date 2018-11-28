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

<a class="btn btn-success" href="graficocampanias.php">Volver</a>


<?php  


$anio = $_REQUEST["anio"];

echo "<div id='container1' style='min-width: 210px; height: 400px; margin: 0 auto'></div></br>";
echo "<div id='container2' style='min-width: 210px; height: 400px; margin: 0 auto'></div></br>";



$total = array();
for ($month = 1; $month <= 12; $month ++){
$sql3 = "SELECT COUNT(*) as cantidad,MONTHNAME(start_date) as mes from campaigns where MONTH(start_date)='$month' and YEAR(start_date)= '$anio' GROUP BY MONTHNAME(start_date)";

$resultados3 = ejecutar($sql3);    
$row = mysqli_fetch_array($resultados3);

if ($row[0] == 0) {
    $result = "0";
}else{
    $result = $row[0];
}


$total[]=$result;
         }         

    $tjan = $total[0];
    $tfeb = $total[1];
    $tmar = $total[2];
    $tapr = $total[3];
    $tmay = $total[4];
    $tjun = $total[5];
    $tjul = $total[6];
    $taug = $total[7];
    $tsep = $total[8];
    $toct = $total[9];
    $tnov = $total[10];
    $tdec = $total[11];
 
//Filtro 2
$sql4 ="SELECT COUNT(*) as cantidad,DAYNAME(start_date) as dia from campaigns where YEAR(start_date)= '$anio' GROUP BY DAYNAME(start_date)";
$resultados4 = ejecutar($sql4);


while ($row1 = mysqli_fetch_array($resultados4)) {
        if($row1[1] == 'Monday'){
            $lunes = $row1[0];
        }elseif($row1[1] == 'Tuesday'){
            $martes = $row1[0];
        }elseif($row1[1] == 'Wednesday'){
            $miercoles = $row1[0];
        }elseif($row1[1] == 'Thursday'){
            $jueves = $row1[0];
        }elseif($row1[1] == 'Friday'){
            $viernes = $row1[0];
        }elseif($row1[1] == 'Saturday'){
            $sabado = $row1[0];
        }elseif($row1[1] == 'Sunday'){
            $domingo = $row1[0];
        }
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
    chart: {type: 'column'},
    title: {
        text: 'cantidad de campañas por mes del año <?php echo $anio ?>'
    },   
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
        title: { text: 'Campañas' }
    },
    legend: {enabled: false },   
    series: [{
        name: 'Campañas',
        data: [     
            
            ['Enero', <?php echo $tjan ?>],
            ['Febrero', <?php echo $tfeb ?>],
            ['Marzo', <?php echo $tmar ?>],
            ['Abril', <?php echo $tapr ?>],
            ['Mayo', <?php echo $tmay ?>],
            ['Junio', <?php echo $tjun ?>],
            ['Julio', <?php echo $tjul ?>],
            ['Agosto', <?php echo $taug ?>],
            ['Setiembre', <?php echo $tsep ?>],
            ['Octubre', <?php echo $toct ?>],
            ['Noviembre', <?php echo $tnov ?>],
            ['Diciembre', <?php echo $tdec ?>],
              
        ],
        dataLabels: {
            enabled: true,
            //rotation: -90,
            color: '#FFFFFF',
            align: 'center',
            //format: '{point.y:.1f}', // one decimal
            y: 15, // 10 pixels down from the top
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
    chart: {
        type: 'areaspline'
    },
    title: {
        text: 'Cantidad de campañas por dia en el año <?php echo $anio ?>'
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    xAxis: {
        categories: [
            'Lunes',
            'Martes',
            'Miercoles',
            'Jueves',
            'Viernes',
            'Sabado',
            'Domingo'
        ],
        plotBands: [{ // visualize the weekend
            from: 4.5,
            to: 6.5,
            color: 'rgba(68, 170, 213, .2)'
        }]
    },
    yAxis: {
        title: {
            text: 'campañas'
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' campañas'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
        name: '<?php echo $anio ?>',
        data: [<?php echo $lunes ?>, <?php echo $martes ?>, <?php echo $miercoles ?>, <?php echo $jueves ?>, <?php echo $viernes ?>, <?php echo $sabado ?>, <?php echo $domingo ?>]
    }]
});
</script>   


</body>
</html>

