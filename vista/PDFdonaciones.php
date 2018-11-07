<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/detallecampania.php');
require_once ('../modelo/donacion.php');
require_once ('../libs/reportepdf/class.ezpdf.php');

conectar();
session_start();

date_default_timezone_set('america/lima');
setlocale(LC_TIME, 'spanish');
$d = date("Y-m-d");
$fecha = strftime("%A, %d de %B de %Y", strtotime($d));
$cod = $_SESSION["cod"];  
$codcamp = $_POST["cbocamp"]; 
$codvol = $_POST["vol"];  
$user = $_SESSION["usuario"];
$numeracion=1;

$camp = new Campania();
$camp->setId($codcamp);
$resultado1 = $camp->getCampaniabyCod();

$vol = new Donacion();
$vol->setId($codvol);
$resultado2 = $vol->getDonacionbycod();

$pdf = new Cezpdf('a4'); 
$pdf->ezSetMargins(20, 80,80, 50);
$pdf->ezText("\n\n$fecha\n",12,array('justification'=>'right'));
$pdf->ezText(utf8_decode("<u>Campañas Sociales</u>\n"),20,array('justification'=>'center'));
$pdf->ezText("Organizador: $user",12);

$consulta1 = "SELECT COUNT(*) from donations where campaign_id=$codcamp and estado=1";
$fila1= ejecutar($consulta1);
$resultado3 = mysqli_fetch_array($fila1);

$consulta2 = "SELECT COUNT(*) FROM donations WHERE user_id=$codvol and estado=1";
$fila2 = ejecutar($consulta2);
$resultado4 = mysqli_fetch_array($fila2);

$consulta3 = "SELECT COUNT(*) FROM donations WHERE user_id=$codvol and campaign_id=$codcamp and estado=1";
$fila3 = ejecutar($consulta3);
$resultado5 = mysqli_fetch_array($fila3);

if($codcamp != 0 && $codvol == 0 ){
$pdf->ezText(utf8_decode("\nCampaña: $resultado1[1]"),12);
$pdf->ezText("\nCantidad: $resultado3[0] donaciones",12);
}elseif ($codvol != 0 && $codcamp == 0  ) {
$pdf->ezText("\nVoluntario: $resultado2[4] $resultado2[5]",12);
$pdf->ezText("\nCantidad: $resultado4[0] donaciones",12);
}elseif($codvol != 0 && $codcamp != 0  ) {
$pdf->ezText(utf8_decode("\nCampaña: $resultado1[1]"),12);	
$pdf->ezText("\nVoluntario: $resultado2[4] $resultado2[5]",12);
$pdf->ezText("\nCantidad: $resultado5[0] donaciones",12);
}
$pdf->ezText("\n",10);
$pdf->ezText("Donaciones\n",15,array('justification'=>'center'));

$consulta4 ="SELECT d.donation_id,u.firstname,u.lastname,d.description,d.quantility,cd.descripcion from donations d inner join users u on d.user_id=u.user_id inner join categoria_donacion cd on cd.catdon_id=d.catdon_id where d.campaign_id = $codcamp and d.estado=1";   
$resultado6 = ejecutar($consulta4);

$consulta5 = "SELECT d.description,d.quantility,c.title,cd.descripcion FROM donations d inner join campaigns c on d.campaign_id=c.campaign_id inner join categoria_donacion cd on d.catdon_id=cd.catdon_id where d.user_id=$codvol";
$resultado7 = ejecutar($consulta5);

$consulta6 = "SELECT d.description,d.quantility,c.title,cd.descripcion FROM donations d inner join campaigns c on d.campaign_id=c.campaign_id inner join categoria_donacion cd on d.catdon_id=cd.catdon_id where d.user_id=$codvol and d.campaign_id=$codcamp";
$resultado8 = ejecutar($consulta6);           

if($codcamp != 0 and $codvol==0){
while($row = mysqli_fetch_array($resultado6)){
	
 $data[] = array('Nro.'=>$numeracion, 'Nombre'=>$row[1], 'Apellido'=>$row[2], 'Descripcion'=>$row[3], 'Cantidad'=>$row[4],'categoria'=>$row[5]);
 $numeracion++;
}

$titles = array('Nro.'=>'Nro.', 'Nombre'=>'Nombre','Apellido'=>'Apellido','Descripcion'=>'Descripcion', 'Cantidad'=>'Cantidad','categoria'=>'categoria');

}elseif ($codvol != 0 and $codcamp==0) {

while($row2 = mysqli_fetch_array($resultado7)){
	
$data[] = array('Nro.'=>$numeracion, 'Descripcion'=>$row2[0], 'Cantidad'=>$row2[1],utf8_decode('Campaña')=>$row2[2],'Categoria'=>$row2[3]); 
$numeracion++;
}

$titles = array('Nro.'=>'Nro.', 'Descripcion'=>'Descripcion','Cantidad'=>'Cantidad',utf8_decode('Campaña')=>utf8_decode('Campaña'),'Categoria'=>'Categoria');

}elseif($codvol != 0 and $codcamp != 0){

while($row2 = mysqli_fetch_array($resultado8)){
	
$data[] = array('Nro.'=>$numeracion, 'Descripcion'=>$row2[0], 'Cantidad'=>$row2[1],utf8_decode('Campaña')=>$row2[2],'Categoria'=>$row2[3]); 
$numeracion++;
}

$titles = array('Nro.'=>'Nro.', 'Descripcion'=>'Descripcion','Cantidad'=>'Cantidad',utf8_decode('Campaña')=>utf8_decode('Campaña'),'Categoria'=>'Categoria');

}


$pdf->ezTable($data,$titles,'');
$pdf->ezStream();

?> 