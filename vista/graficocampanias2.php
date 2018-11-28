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
<div class="panel-heading" style="text-align:center;"><h2>Grafico de campañas</h2></div>   

<form class="form-horizontal" id="form1" name="form1" method="post" action="grafcamp.php" data-toggle="validator"> 
</br> 
<div class="form-group">
          <label class="col-md-4 control-label" for="fecha1" >Desde : </label>
          <div class="col-md-4">
        <input id="fecha1" onchange="ValidarFechaInicial();" name="txtfecha1" type="text" placeholder="Fecha de inicio" class="form-control input-md" required>
          </div>
          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="fecha2" >Hasta : </label>
          <div class="col-md-4">
          <input id="fecha2" onchange="ValidarFechaFinal();" name="txtfecha2" type="text" placeholder="Fecha final" class="form-control input-md"  required>
          </div>
          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">
                                 
          <button class="btn btn-primary" block="true" type="submit" name="action" value="aceptar"> graficar </button>
         
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

//Filtro 1
$sql1 = "SELECT count(*) as cantidad, ca.descripcion from campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id where c.user_id = $cod and c.estado = 1 GROUP BY c.categoria_id";
$resultados1 = ejecutar($sql1);

//Filtro 2
$sql2 = "SELECT COUNT(*) as cantidad,place from campaigns where user_id=$cod and estado = 1 GROUP BY place";
$resultados2 = ejecutar($sql2);

//Filtro 3
$sql3 = "SELECT count(*) as cantidad, YEAR(c.start_date) from campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id where c.user_id = $cod and c.estado = 1 GROUP BY YEAR(c.start_date)";
$resultados3 = ejecutar($sql3);
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

<?php 
include('templates/notificacion.php');
 ?>

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
Highcharts.chart('container1', {
    chart: {type: 'column'},
    title: {
        text: 'cantidad de campañas por categoria'
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
            <?php  
             while($row = mysqli_fetch_array($resultados1)){?>
            ['<?php echo $row[1]; ?>', <?php echo $row[0]; ?>],
            
              <?php  } ?>           
              
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
    chart: {type: 'column'},
    title: {
        text: 'cantidad de campañas por lugar'
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
            <?php  
             while($row = mysqli_fetch_array($resultados2)){?>
            ['<?php echo $row[1]; ?>', <?php echo $row[0]; ?>],
            
              <?php  } ?>           
              
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
Highcharts.chart('container3', {
    chart: {type: 'column'},
    title: {
        text: 'cantidad de campañas por año'
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
            <?php  
             while($row = mysqli_fetch_array($resultados3)){?>
            ["<?php echo "<a href='graficocampaniames.php?anio=$row[1]'>$row[1]</a>"; ?>", <?php echo $row[0]; ?>],
            
              <?php  } ?>           
              
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

</body>

</html>

