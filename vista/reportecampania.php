<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once('../libs/reportepdf/class.ezpdf.php');
conectar();
session_start();


$pdf = new Cezpdf('a4');

$pdf->selectFont('fonts/YanoneKaffeesatz-Regular.eot');
$pdf->ezText("<b>REPORTE DE CAMPANIAS EN EL ANIO</b>\n",20);
$pdf->ezText("\n\n\n",10);

$cod = $_SESSION["cod"];           

$campania = new Campania();
$campania->setUserid($cod);
$r = $campania->campaniaporusuario();
                
$numeracion=1;

while($row=  mysqli_fetch_array($r)){
    $data[] = array('Nº'=>$numeracion, 'nombre'=>$row[1], 'lugar'=>$row[3], 'vacantes'=>$row[4], 'Fecha inicial'=>$row[5], 'Fecha final'=>$row[6]);
    $numeracion++;
}
$titles = array('Nº'=>'<b>Nª</b>', 'nombre'=>'Nombre</b>','lugar'=>'<b>Lugar</b>', 
    'vacantes'=>'<b>Vacantes</b>', 'Fecha inicial'=>'<b>Fecha inicial</b>', 'Fecha final'=>'<b>Fecha Final</b>');

$pdf->ezTable($data,$titles,'');

$pdf->ezText("\n\n<b>Fecha:</b> ".date("d/m/Y"), 12);

$pdf->ezStream();
?>