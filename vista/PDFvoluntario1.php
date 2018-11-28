<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/detallecampania.php');
require_once ('../libs/reportepdf/class.ezpdf.php');

conectar();
session_start();

date_default_timezone_set('america/lima');
setlocale(LC_TIME, 'spanish');
$d = date("Y-m-d");
$fecha = strftime("%A, %d de %B de %Y", strtotime($d));
$cod = $_SESSION["cod"];
$user = $_SESSION["usuario"];
$camp = $_POST["cbocamp"];
//$par = $_POST["par"];

$numeracion = 1;


 

	 if($_POST["cbocamp"] != "" ){

$consulta = "SELECT * FROM campaigns where campaign_id = $camp";
$fila = ejecutar($consulta);
$resultado = mysqli_fetch_array($fila);

$consulta2="SELECT COUNT(*) as cantidad from details_campaigns d inner JOIN campaigns c on d.campaign_id=c.campaign_id where c.campaign_id=$camp and d.estado=1 and c.estado=1";
$fila2 = ejecutar($consulta2);
$resultado2 = mysqli_fetch_array($fila2);

$pdf = new Cezpdf('a4');
//$pdf->ezImage('img/logo.png',0, 100, 'none', 'left');
$pdf->ezSetMargins(20, 80,80, 50);
$pdf->ezText("\n\n$fecha\n",12,array('justification'=>'right'));
$pdf->ezText(utf8_decode("<u>Campañas Sociales</u>\n"),20,array('justification'=>'center'));
$pdf->ezText("Organizador: $user\n",12);
$pdf->ezText(utf8_decode("Campaña: ".$resultado[1]."\n"),12);
$pdf->ezText("Cantidad: ".$resultado2[0]." voluntarios\n",12);
$pdf->ezText("\n",10);    

$voluntario = new Detallecampania();
$voluntario->setCampaignid($camp);
$r = $voluntario->voluntariosporcampania();
                
$numeracion=1;

$pdf->ezText("Voluntarios\n",15,array('justification'=>'center'));

while($row = mysqli_fetch_array($r)){
	
 $data[] = array('Nro.'=>$numeracion, 'Nombre'=>$row[0], 'Apellido'=>$row[1], 'Email'=>$row[2], 'Celular'=>$row[3]);    
 $numeracion++;
}
$titles = array('Nro.'=>'Nro.', 'Nombre'=>'Nombre','Apellido'=>'Apellido','Email'=>'Email', 'Celular'=>'Celular');

$pdf->ezTable($data,$titles,'');

$pdf->ezStream();


}else{
	echo "<script>alert('Eliga una campaña')
	document.location=('generar-reporte.php')</script>";
}








?> 