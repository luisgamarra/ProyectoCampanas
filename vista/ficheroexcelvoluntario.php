<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/detallecampania.php');
conectar();
session_start();
include('templates/validar.php');

header('Content-Encoding: UTF-8');
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=voluntarios.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo "\xEF\xBB\xBF";


$user = $_SESSION["usuario"];
$nomcamp = $_REQUEST["nomcamp"];
$codcamp = $_REQUEST["idcamp"];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <?php

    $numeracion = 1;

    $voluntario = new Detallecampania();
    $voluntario->setCampaignid($codcamp);
    $r = $voluntario->voluntariosporcampania();

    if($codcamp != 0){
    echo "<div class='table-responsive' >
    <table class='table table-hover' border='2' >
    <h1>CAMPAÑAS SOCIALES</h1>
    <h3>Organizador: ".$_SESSION["usuario"]."</h3>
    <h3>Campaña: ".$nomcamp."</h3>
   
    <thead >
    <tr bgcolor='F3BC0E'>
    <th style='text-align:center;'>Nº</th>
    <th style='text-align:center;'>Nombre</th>
    <th style='text-align:center;'>Apellido</th>
    <th style='text-align:center;'>Email</th>
    <th style='text-align:center;'>Celular</th>
    </tr><thead>    ";
    }
?>
<tbody id='volu'>
<?php 
    while($row=mysqli_fetch_array($r)){
    
    echo "<tr bgcolor='white'>
    <td align='center'>".$numeracion."</td>
    <td align='center'>".$row[0]."</td>
    <td align='center'>".$row[1]."</td>
    <td align='center'>".$row[2]."</td>
    <td align='center'>".$row[3]."</td>
          </tr>";

    $numeracion++;
    }

?>
</tbody>
    </table>



</body>
</html>