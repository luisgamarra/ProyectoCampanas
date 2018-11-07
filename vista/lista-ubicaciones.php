<?php
require_once ('../db/conexion.php');
require_once ('../modelo/punto.php');
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
    <link href="css/notificacion.css" rel="stylesheet" >     
     
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>

<div id="page-content-wrapper">
<div class="container-fluid">

<div class="panel panel-primary"> 
<div class="panel-heading" style="text-align:center;"><h2>Registros de puntos de donacion</h2></div>          
</br>        
    <div class="table-responsive">
    <table class="table table-hover" id="tablita" border="0" >
    <thead>   
    <tr bgcolor="#0EF381  ">
    <th style="text-align:center;">Nº</th>
    <th style="text-align:center;">Direccion</th>
    <th style="text-align:center;">Coordenada X</th>
    <th style="text-align:center;">Coordenada Y</th>
    <th style="text-align:center;">Campaña</th>
    <th style="text-align:center;">Editar</th>
    <th style="text-align:center;">Eliminar</th>       
    </tr> 
    </thead>

    <?php

    $cod = $_SESSION["cod"];
    $numeracion = 1;

    $pun = new Punto();
    $pun->setUserid($cod);
    $r = $pun->listarpuntosbyusercod();

    while($row=mysqli_fetch_array($r)){
    
    echo "<tr bgcolor='white'>
    <td align='center'>".$numeracion."</td>
    <td align='center'>".$row[1]."</td>
    <td align='center'>".$row[2]."</td>
    <td align='center'>".$row[3]."</td>
    <td align='center'>".$row[4]."</td>
    <td align='center'><a class='btn btn-success' href='modificar-ubicacion.php?idubi=".$row["0"]."'>Modificar</a></td>
    <td align='center'><a class='btn btn-danger' onclick='return Confirmation()' href='../controlador/puntocontrolador.php?action=eliminar&&idubi=".$row["0"]."'>Eliminar</a></td>
    
    </tr>";

    $numeracion++;
    }
    ?>

    </table>   
            
        

        </div>
    </div>
       

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

<script type="text/javascript">
function Confirmation() {
 
  if (confirm('Esta seguro de eliminar el registro?')==true) {
      
      return true;
  }else{
      //alert('Cancelo la eliminacion');
      return false;
  }
}
</script>

      <?php 
include('templates/notificacion.php');
 ?>

</body>

</html>




