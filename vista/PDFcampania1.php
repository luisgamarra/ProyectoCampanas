<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../libs/reportepdf/class.ezpdf.php');
conectar();
session_start();

date_default_timezone_set('america/lima');
setlocale(LC_TIME, 'spanish');
$d = date("Y-m-d");
$fecha = strftime("%A, %d de %B de %Y", strtotime($d));

$cod = $_SESSION["cod"];  
$user = $_SESSION["usuario"];
$cat = $_POST["cate"];
$lugar = $_POST["lug"];
$numeracion=1;
$fecha1 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha1"])));
$fecha2 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha2"])));

if($fecha1 < $fecha2){
$pdf = new Cezpdf('a4');
$pdf->ezText("\n\n$fecha\n",12,array('justification'=>'right'));
$pdf->ezText(utf8_decode("\n<u>Campañas Sociales</u>\n"),20,array('justification'=>'center'));
$pdf->ezText("Organizador: $user\n",12);
}else{
	echo "<script>alert('LA FECHA DE INICIO NO PUEDE SER MAYOR A LA FECHA FINAL')
    document.location=('../vista/generar-reporte.php')</script>"; 
}

if (isset($_POST["action"])){ 

//FILTRO(1) DESDE FECHA 1 HASTA FECHA 2
if(($_POST["txtfecha1"] != "" && $_POST["txtfecha2"] != "") && $_POST["cate"] == "" && $_POST["lug"] == ""){

if($fecha1 < $fecha2){
$pdf = new Cezpdf('a4');
$pdf->ezText("\n\n$fecha\n",12,array('justification'=>'right'));
$pdf->ezText(utf8_decode("\n<u>Campañas Sociales</u>\n"),20,array('justification'=>'center'));
$pdf->ezText("Organizador: $user\n",12);
$pdf->ezText("Desde: ".$_POST["txtfecha1"]."\n",12);
$pdf->ezText("Hasta: ".$_POST["txtfecha2"]."\n",12);

$campania = new Campania();
$fila2 = $campania->contardesdehasta($fecha1,$fecha2,$cod);

while($row = mysqli_fetch_array($fila2)){

$data[] = array('Nro.'=>$numeracion, 'Titulo'=>utf8_decode($row[0]),'Fecha Inicio'=>$row[1],'Fecha Final'=>$row[2],'Categoria'=>utf8_decode($row[3]),'Voluntarios'=>$row[4], 'Quedaron'=>"".$row[5]." vacantes",'Total'=>$row[6],'Estado'=>$row[7]);
    $numeracion++;    
}
$titles = array('Nro.'=>'<b>Nro.</b>', 'Titulo'=>'<b>Titulo</b>','Fecha Inicio'=>'<b>Fecha Inicio</b>','Fecha Final'=>'<b>Fecha Final</b>','Categoria'=>'<b>Categoria</b>','Voluntarios'=>'<b>Voluntarios</b>','Quedaron'=>'<b>Quedaron</b>','Total'=>'<b>Total</b>','Estado'=>'<b>Estado</b>');
}else{
	echo "<script>alert('LA FECHA DE INICIO NO PUEDE SER MAYOR A LA FECHA FINAL')
    document.location=('../vista/generar-reporte.php')</script>"; 
}


}//FIN FILTRO(1)


//FILTRO(2) DESDE FECHA 1 HASTA FECHA 2 Y CATEGORIA
elseif (($_POST["txtfecha1"] != "" && $_POST["txtfecha2"] !="") && $_POST["cate"] != "" && $_POST["lug"] == "") {
$fecha1 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha1"])));
$fecha2 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha2"])));

$consulta1 = "SELECT COUNT(*) as cantidad,ca.descripcion FROM campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id WHERE c.start_date>='$fecha1' and c.start_date<='$fecha2' and c.categoria_id=$cat and c.user_id=$cod GROUP BY ca.descripcion";
$fila1 = ejecutar($consulta1);
$resultado = mysqli_fetch_array($fila1);

if($fecha1 < $fecha2){
$pdf = new Cezpdf('a4');
$pdf->ezText("\n\n$fecha\n",12,array('justification'=>'right'));
$pdf->ezText(utf8_decode("\n<u>Campañas Sociales</u>\n"),20,array('justification'=>'center'));
$pdf->ezText("Organizador: $user\n",12);
$pdf->ezText("Desde: ".$_POST["txtfecha1"]."\n",12);
$pdf->ezText("Hasta: ".$_POST["txtfecha2"]."\n",12);
$pdf->ezText(utf8_decode("Categoria: ".$resultado[1]."\n"),12);
$pdf->ezText(utf8_decode("Cantidad: ".$resultado[0]." campañas\n\n"),12);

$consulta2 = "SELECT c.title,c.vacant,c.place,c.imagen,ca.descripcion,DATE_FORMAT(c.start_date, '%d-%m-%Y'),DATE_FORMAT(c.end_date, '%d-%m-%Y') FROM campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id WHERE c.start_date>='$fecha1' and c.start_date<='$fecha2' and c.categoria_id=$cat and c.user_id=$cod";       
$fila2 = ejecutar($consulta2);

while($row = mysqli_fetch_array($fila2)){

$data[] = array('Nro.'=>$numeracion, 'Titulo'=>$row[0], 'Categoria'=>utf8_decode($row[4]), 'Lugar'=>$row[2],'Fecha Inicio'=>$row[5],'Fecha Final'=>$row[6], 'Quedaron'=>"".$row[1]." vacantes");
    $numeracion++;    
}
$titles = array('Nro.'=>'<b>Nro.</b>', 'Titulo'=>'<b>Titulo</b>','Categoria'=>'<b>Categoria</b>','Lugar'=>'<b>Lugar</b>','Fecha Inicio'=>'<b>Fecha Inicio</b>','Fecha Final'=>'<b>Fecha Final</b>','Quedaron'=>'<b>Quedaron</b>');

}else{
	echo "<script>alert('LA FECHA DE INICIO NO PUEDE SER MAYOR A LA FECHA FINAL')
    document.location=('../vista/generar-reporte.php')</script>"; 
}


}//FIN FILTRO(2)


//FILTRO(3) DESDE FECHA 1 HASTA FECHA 2 CON CATEGORIA Y LUGAR
elseif (($_POST["txtfecha1"] != "" && $_POST["txtfecha2"] != "") && $_POST["cate"] != "" && $_POST["lug"] != "") {
$fecha1 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha1"])));
$fecha2 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha2"])));

$consulta1 = "SELECT COUNT(*) as cantidad,ca.descripcion,c.place FROM campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id WHERE c.start_date>='$fecha1' and c.start_date<='$fecha2' and c.categoria_id=$cat and c.place='$lugar' and c.user_id=$cod GROUP BY ca.descripcion";
$fila1 = ejecutar($consulta1);
$resultado = mysqli_fetch_array($fila1);

if($fecha1 < $fecha2){
$pdf = new Cezpdf('a4');
$pdf->ezText("\n\n$fecha\n",12,array('justification'=>'right'));
$pdf->ezText(utf8_decode("\n<u>Campañas Sociales</u>\n"),20,array('justification'=>'center'));
$pdf->ezText("Organizador: $user\n",12);
$pdf->ezText("Desde: ".$_POST["txtfecha1"]."\n",12);
$pdf->ezText("Hasta: ".$_POST["txtfecha2"]."\n",12);
$pdf->ezText(utf8_decode("Categoria: ".$resultado[1]."\n"),12);
$pdf->ezText(utf8_decode("Lugar: ".$resultado[2]."\n"),12);
$pdf->ezText(utf8_decode("Cantidad: ".$resultado[0]." campañas\n\n"),12);

$consulta2 = "SELECT c.title,c.vacant,c.place,c.imagen,ca.descripcion,DATE_FORMAT(c.start_date, '%d-%m-%Y'),DATE_FORMAT(c.end_date, '%d-%m-%Y') FROM campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id WHERE c.start_date>='$fecha1' and c.start_date<='$fecha2' and c.categoria_id=$cat and c.place='$lugar' and c.user_id=$cod";       
$fila2 = ejecutar($consulta2);

while($row = mysqli_fetch_array($fila2)){

$data[] = array('Nro.'=>$numeracion, 'Titulo'=>$row[0], 'Categoria'=>utf8_decode($row[4]), 'Lugar'=>$row[2],'Fecha Inicio'=>$row[5],'Fecha Final'=>$row[6], 'Quedaron'=>"".$row[1]." vacantes");
    $numeracion++;    
}
$titles = array('Nro.'=>'<b>Nro.</b>', 'Titulo'=>'<b>Titulo</b>','Categoria'=>'<b>Categoria</b>','Lugar'=>'<b>Lugar</b>','Fecha Inicio'=>'<b>Fecha Inicio</b>','Fecha Final'=>'<b>Fecha Final</b>','Quedaron'=>'<b>Quedaron</b>');
}else{
	echo "<script>alert('LA FECHA DE INICIO NO PUEDE SER MAYOR A LA FECHA FINAL')
    document.location=('../vista/generar-reporte.php')</script>"; 
}


}// FIN FILTRO(3)


//FILTRO(4) DESDE FECHA 1 HASTA FECHA 2 Y LUGAR
elseif (($_POST["txtfecha1"] != "" && $_POST["txtfecha2"] != "") && $_POST["cate"] == "" && $_POST["lug"] != "") {
$fecha1 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha1"])));
$fecha2 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha2"])));

$consulta1 = "SELECT COUNT(*) as cantidad,c.place FROM campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id WHERE c.start_date>='$fecha1' and c.start_date<='$fecha2' and c.place='$lugar' and c.user_id=$cod GROUP BY c.place";
$fila1 = ejecutar($consulta1);
$resultado = mysqli_fetch_array($fila1);

if($fecha1 < $fecha2){

$pdf = new Cezpdf('a4');
$pdf->ezText("\n\n$fecha\n",12,array('justification'=>'right'));
$pdf->ezText(utf8_decode("\n<u>Campañas Sociales</u>\n"),20,array('justification'=>'center'));
$pdf->ezText("Organizador: $user\n",12);
$pdf->ezText("Desde: ".$_POST["txtfecha1"]."\n",12);
$pdf->ezText("Hasta: ".$_POST["txtfecha2"]."\n",12);
$pdf->ezText(utf8_decode("Lugar: ".$resultado[1]."\n"),12);
$pdf->ezText(utf8_decode("Cantidad: ".$resultado[0]." campañas\n\n"),12);

$consulta2 = "SELECT c.title,c.vacant,c.place,c.imagen,ca.descripcion,DATE_FORMAT(c.start_date, '%d-%m-%Y'),DATE_FORMAT(c.end_date, '%d-%m-%Y') FROM campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id WHERE c.start_date>='$fecha1' and c.start_date<='$fecha2' and c.place='$lugar' and c.user_id=$cod";       
$fila2 = ejecutar($consulta2);

while($row = mysqli_fetch_array($fila2)){

$data[] = array('Nro.'=>$numeracion, 'Titulo'=>$row[0], 'Categoria'=>utf8_decode($row[4]), 'Lugar'=>$row[2],'Fecha Inicio'=>$row[5],'Fecha Final'=>$row[6], 'Quedaron'=>"".$row[1]." vacantes");
    $numeracion++;    
}
$titles = array('Nro.'=>'<b>Nro.</b>', 'Titulo'=>'<b>Titulo</b>','Categoria'=>'<b>Categoria</b>','Lugar'=>'<b>Lugar</b>','Fecha Inicio'=>'<b>Fecha Inicio</b>','Fecha Final'=>'<b>Fecha Final</b>','Quedaron'=>'<b>Quedaron</b>');

}else{
	echo "<script>alert('LA FECHA DE INICIO NO PUEDE SER MAYOR A LA FECHA FINAL')
    document.location=('../vista/generar-reporte.php')</script>"; 
}
}//FIN FILTRO(4)


//FILTRO(5) SOLO CATEGORIA
elseif ($_POST["cate"] != "" && $_POST["txtfecha1"] == "" && $_POST["txtfecha2"] == "" && $_POST["lug"] == ""){

$consulta1 = "select * from categorias where categoria_id=$cat";
$fila1 = ejecutar($consulta1);
$resultado1 = mysqli_fetch_array($fila1);

$consulta2= "SELECT COUNT(*) as cantidad FROM campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id WHERE c.user_id=$cod and c.categoria_id=$cat;";
$fila2 = ejecutar($consulta2);
$resultado2 = mysqli_fetch_array($fila2);

$pdf = new Cezpdf('a4');
$pdf->ezText("\n\n$fecha\n",12,array('justification'=>'right'));
$pdf->ezText(utf8_decode("\n<u>Campañas Sociales</u>\n"),20,array('justification'=>'center'));
$pdf->ezText("Organizador: $user\n",12);
$pdf->ezText(utf8_decode("Categoria: ".$resultado1[1]."\n"),12);
$pdf->ezText(utf8_decode("Cantidad: ".$resultado2[0]." campañas\n\n"),12);

$consulta3 = "SELECT c.title,c.vacant,c.place,c.imagen,ca.descripcion,DATE_FORMAT(c.start_date, '%d-%m-%Y'),DATE_FORMAT(c.end_date, '%d-%m-%Y') FROM campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id WHERE c.user_id=$cod and ca.categoria_id=$cat";       
$fila3 = ejecutar($consulta3);

while($row = mysqli_fetch_array($fila3)){

$data[] = array('Nro.'=>$numeracion,'Titulo'=>$row[0],'Fecha Inicio'=>$row[5],'Fecha Final'=>$row[6], 'Lugar'=>$row[2],'Quedaron'=>"".$row[1]." vacantes");
    $numeracion++;    
}
$titles = array('Nro.'=>'<b>Nro.</b>','Titulo'=>'<b>Titulo</b>','Fecha Inicio'=>'<b>Fecha Inicio</b>','Fecha Final'=>'<b>Fecha Final</b>','Lugar'=>'<b>Lugar</b>','Quedaron'=>'<b>Quedaron</b>');
}//FIN FILTRO(5)


//FILTRO(6) CATEGORIA Y LUGAR
elseif ($_POST["cate"] != "" && $_POST["txtfecha1"] == "" && $_POST["txtfecha2"] == "" && $_POST["lug"] != "") {
	$consulta1 = "select * from categorias where categoria_id=$cat";
$fila1 = ejecutar($consulta1);
$resultado1 = mysqli_fetch_array($fila1);

$consulta2= "SELECT COUNT(*) as cantidad,c.place FROM campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id WHERE c.user_id=$cod and c.categoria_id=$cat and c.place='$lugar'";
$fila2 = ejecutar($consulta2);
$resultado2 = mysqli_fetch_array($fila2);

$pdf = new Cezpdf('a4');
$pdf->ezText("\n\n$fecha\n",12,array('justification'=>'right'));
$pdf->ezText(utf8_decode("\n<u>Campañas Sociales</u>\n"),20,array('justification'=>'center'));
$pdf->ezText("Organizador: $user\n",12);
$pdf->ezText(utf8_decode("Categoria: ".$resultado1[1]."\n"),12);
$pdf->ezText(utf8_decode("Lugar: ".$resultado2[1]."\n"),12);
$pdf->ezText(utf8_decode("Cantidad: ".$resultado2[0]." campañas\n\n"),12);

$consulta3 = "SELECT c.title,c.vacant,c.place,c.imagen,ca.descripcion,DATE_FORMAT(c.start_date, '%d-%m-%Y'),DATE_FORMAT(c.end_date, '%d-%m-%Y') FROM campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id WHERE c.user_id=$cod and ca.categoria_id=$cat and c.place='$lugar'  ";       
$fila3 = ejecutar($consulta3);

while($row = mysqli_fetch_array($fila3)){

$data[] = array('Nro.'=>$numeracion,'Titulo'=>$row[0],'Fecha Inicio'=>$row[5],'Fecha Final'=>$row[6], 'Lugar'=>$row[2],'Quedaron'=>"".$row[1]." vacantes");
    $numeracion++;    
}
$titles = array('Nro.'=>'<b>Nro.</b>','Titulo'=>'<b>Titulo</b>','Fecha Inicio'=>'<b>Fecha Inicio</b>','Fecha Final'=>'<b>Fecha Final</b>','Lugar'=>'<b>Lugar</b>','Quedaron'=>'<b>Quedaron</b>'); 
}//FIN FILTRO(6)


//FILTRO(7) LUGAR
elseif ($_POST["lug"] != "" && $_POST["cate"] == "" && $_POST["txtfecha1"] == "" && $_POST["txtfecha2"] == "") {

$consulta1 = "SELECT COUNT(*) as cantidad FROM campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id WHERE c.user_id=$cod and c.place='$lugar'";
$fila1 = ejecutar($consulta1);
$resultado1 = mysqli_fetch_array($fila1);

$pdf = new Cezpdf('a4');
$pdf->ezText("\n\n$fecha\n",12,array('justification'=>'right'));
$pdf->ezText(utf8_decode("\n<u>Campañas Sociales</u>\n"),20,array('justification'=>'center'));
$pdf->ezText("Organizador: $user\n",12);
$pdf->ezText("Lugar: $lugar\n",12);
$pdf->ezText(utf8_decode("Cantidad: ".$resultado1[0]." campañas\n\n"),12);

$consulta2 = "SELECT c.title,c.vacant,c.place,c.imagen,ca.descripcion,DATE_FORMAT(c.start_date, '%d-%m-%Y'),DATE_FORMAT(c.end_date, '%d-%m-%Y') FROM campaigns c inner join categorias ca on c.categoria_id=ca.categoria_id WHERE c.user_id=$cod and c.place='$lugar'";       
$fila2 = ejecutar($consulta2);

while($row = mysqli_fetch_array($fila2)){

$data[] = array('Nro.'=>$numeracion, 'Titulo'=>$row[0], 'Categoria'=>utf8_decode($row[4]), 'Fecha Inicio'=>$row[5],'Fecha Final'=>$row[6], 'Quedaron'=>"".$row[1]." vacantes");
    $numeracion++;    
}
$titles = array('Nro.'=>'<b>Nro.</b>', 'Titulo'=>'<b>Titulo</b>','Categoria'=>'<b>Categoria</b>','Fecha Inicio'=>'<b>Fecha Inicio</b>','Fecha Final'=>'<b>Fecha Final</b>','Quedaron'=>'<b>Quedaron</b>');
}//FIN FILTRO(7)

$pdf->ezTable($data,$titles,'');
$pdf->ezStream();

}
?> 