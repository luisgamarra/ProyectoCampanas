<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
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
    <link href="css/notificacion.css"rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">        
     
</head>

<body background="img/fondito1.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php

    $tipo =@$_SESSION['tipo'];
    if( $tipo == "1"){
        include("templates/menu-admin.php"); 
    }else{
        include("templates/menu-voluntario.php"); 
    }
?>
 
<div id="page-content-wrapper">
<div class="container-fluid">

<div class="panel panel-primary"> 
<div class="panel-heading"><h3 style="text-align:center;">Categorias de campañas</h3></div>  
</div>    

<?php 

$sql = "SELECT * from categorias";
$fila = ejecutar($sql);

while ($row = mysqli_fetch_array($fila)) {

?>

<div class="col-md-4">
<div class="panel panel-green">
 
  <div class="panel-heading"><h3 style="text-align:center;"><?php echo $row[1] ?></h3></div>
  <div class="panel-body">
<?php 
 $tipo =@$_SESSION['tipo'];
    if( $tipo == "1"){
       echo "<center><a href='vercategoria.php?idcat=".$row[0]."'>Ver campañas</a></center>";
        
    }else{
        echo "<center><a href='vercategoriavol.php?idcat=".$row[0]."'>Ver campañas</a></center>";
    }

 ?>

   <!-- <center><a href="vercategoria.php?idcat=<?php// echo $row[0];?>">Ver campañas</a></center>-->
  </div>
 
</div> 
</div>
<?php } ?>



</div>
</div>

</div>    
    
<footer>        
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

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

