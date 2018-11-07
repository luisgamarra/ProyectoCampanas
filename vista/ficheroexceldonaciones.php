<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/detallecampania.php');
require_once ('../modelo/donacion.php');
conectar();
session_start();  

header('Content-Encoding: UTF-8');
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=donaciones.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo "\xEF\xBB\xBF";

$cod = $_SESSION["cod"];  
$codcamp = $_REQUEST["idcamp"]; 
$codvol = $_REQUEST["idvol"];  
$user = $_SESSION["usuario"];



$camp = new Campania();
$camp->setId($codcamp);
$fila = $camp->getCampaniabyCod();

$vol = new Donacion();
$vol->setId($codvol);
$fila2 = $vol->getDonacionbycod();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 


$numeracion = 1;

$donacion = new Donacion();
$donacion->setCampaignid($codcamp);
$r1 = $donacion->donacionesporcampania();

$donxvol = new Donacion();
$donxvol->setCampaignid($codcamp);
$donxvol->setuserid($codvol);
$r2 = $donxvol->donacionporvoluntario();

if($codcamp != 0 and $codvol == 0){

  echo "<div class='table-responsive'>
    <table class='table table-hover' border='2' >
    <h1>CAMPAÑAS SOCIALES</h1>
    <h3>Organizador: ".$_SESSION["usuario"]."</h3>
    <h3>Campaña: ".$fila[1]."</h3>
    <h3>Voluntario: ".$fila2[4]." ".$fila2[5]."</h3>

    <tr bgcolor='#0EF381'>
    <th style='text-align:center;'>Nº</th>
    <th style='text-align:center;'>Nombre</th>
    <th style='text-align:center;'>Apellido</th>
    <th style='text-align:center;'>Descripcion</th>
    <th style='text-align:center;'>Cantidad</th>    
    </tr>";

echo "<tbody id='don'>";

while($row=mysqli_fetch_array($r1)){
    
    echo "<tr bgcolor='white'>
    <td align='center'>".$numeracion."</td>
    <td align='center'>".$row[1]."</td>
    <td align='center'>".$row[2]."</td>
    <td align='center'>".$row[3]."</td>
    <td align='center'>".$row[4]."</td>
    </tr>";

    $numeracion++;
    }
echo "</tbody></table";

 } elseif ($codcamp != 0 and $codvol != 0) {



  echo "<div class='table-responsive'>
    <table class='table table-hover' border='2' >
    <h1>CAMPAÑAS SOCIALES</h1>
    <h3>Organizador: ".$_SESSION["usuario"]."</h3>
    <h3>Campaña: ".$fila[1]."</h3>
    <h3>Voluntario: ".$fila2[4]." ".$fila2[5]."</h3>
    <tr bgcolor='#0EF381'>
    <th style='text-align:center;'>Nº</th>
    <th style='text-align:center;'>Nombre</th>
    <th style='text-align:center;'>Apellido</th>
    <th style='text-align:center;'>Descripcion</th>
    <th style='text-align:center;'>Cantidad</th>    
    </tr>";
   echo "<tbody id='don'>";
   while($row=mysqli_fetch_array($r2)){
    
    echo "<tr bgcolor='white'>
    <td align='center'>".$numeracion."</td>
    <td align='center'>".$row[1]."</td>
    <td align='center'>".$row[2]."</td>
    <td align='center'>".$row[3]."</td>
    <td align='center'>".$row[4]."</td>
    </tr>";

    $numeracion++;
    }
    echo "</tbody></table";

 }





 ?>

 
               



</body>
</html>