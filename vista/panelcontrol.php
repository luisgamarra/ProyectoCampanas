<?php
require_once('../db/conexion.php');
conectar();
session_start();

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
</head>

<body background="img/utpnoche.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>


<div id="page-content-wrapper">
<div class="container-fluid">

    
<div class="col-md-4" align="center">
<?php 

echo "<img src='img/campanias.jpg' class='img-thumbnail' width='78%'  >";

$sql1 = "SELECT COUNT(campaign_id) from campaigns";
$resp1 = ejecutar($sql1);
$r1 = mysqli_fetch_array($resp1);



echo "<h1 style='color: #FFFFFF'> $r1[0] campañas</h1>";
?>
</div>


<div class="col-md-4" align="center">
<?php 

echo "<img src='img/voluntarios.jpg' class='img-thumbnail' width='78%'>";

$sql = "SELECT COUNT(user_id) from users where type_id=2";
$resp = ejecutar($sql);
$r = mysqli_fetch_array($resp);

echo "<h1 style='color: #FFFFFF'>$r[0] voluntarios</h1>";

?>
</div>

<div class="col-md-4" align="center">
<?php 

echo "<img src='img/donaciones.jpg' class='img-thumbnail' >";
$sql2 = "SELECT COUNT(donation_id) from donations";
$resp2 = ejecutar($sql2);
$r2 = mysqli_fetch_array($resp2);

echo "<h1 style='color: #FFFFFF'>$r2[0] donaciones</h1>";

 ?>
</div>
      
</div>
</div>

</div>
   
<footer>        
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
    $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
</script> 

</body>

</html>

