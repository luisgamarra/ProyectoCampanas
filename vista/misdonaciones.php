<?php
require_once ('../db/conexion.php');
require_once ('../modelo/donacion.php');
conectar();
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
    <link href="css/datatables.css" rel="stylesheet">
    
    
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-voluntario.php"); ?>

<div id="page-content-wrapper">
    <div class="container-fluid">

<div class="panel panel-success"> 
<div class="panel-heading"><h1 style="text-align:center;"><b>Mis donaciones</b></div>     
</br>           
    <div class="table-responsive">
    <table class="table table-hover" id="tablita" border="0" >
    <thead>   
    <tr bgcolor="#0EF381  ">
    <th style="text-align:center;">Nº</th>
    <th style="text-align:center;">Nombre</th>
    <th style="text-align:center;">Apellido</th>
    <th style="text-align:center;">Descripcion</th>
    <th style="text-align:center;">Cantidad</th>
    <th style="text-align:center;">Campaña</th>    
    </tr> 
    </thead>

    <?php

    $cod = $_SESSION["cod"];
    $numeracion = 1;

    $don = new Donacion();
    $don->setUserid($cod);
    $r = $don->donxvol();

    while($row=mysqli_fetch_array($r)){

        if($row[3] == 'Paypal'){
            $resul = "S/.".$row[4]."";
        }else{
            $resul = "".$row[4]." Unidades";
        }
    
    echo "<tr bgcolor='white'>
    <td align='center'>".$numeracion."</td>
    <td align='center'>".$row[1]."</td>
    <td align='center'>".$row[2]."</td>
    <td align='center'>".$row[3]."</td>    
    <td align='center'>".$resul."</td>
    <td align='center'>".$row[5]."</td>
    </tr>";

    $numeracion++;
    }

    ?>
    </table>   
    </div> 
    </div>      
            <?php

            if(isset($_GET['exito']) and isset($_GET['paymentId'])){
                $resultado = (bool) $_GET['exito'];
                $paymentId = $_GET['paymentId'];
    

                if($resultado == true) {
                      echo "El pago se realizo correctamente! ";
                      echo "El id es {$paymentId} ";
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
<script src="js/validator.js"></script> 

<script src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"></script>
<script src="js/datatables.js"></script>


<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
    $("#wrapper").toggleClass("toggled");
        });
</script> 

<script>
  
  $(document).ready(function() {
    $('#tablita').DataTable( {

      
        lengthMenu: [[5,10,20,-1],["5","10","20","Todos"]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",

        }


      })
} );

</script>


</body>

</html>




