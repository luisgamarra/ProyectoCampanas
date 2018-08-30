<?php
require_once ('../modelo/conexion.php');
conectar();
session_start();

$idcamp = $_REQUEST["idcamp"];
$id = $_SESSION["cod"];

$sql0 = "select * from details_campaigns where campaign_id = $idcamp and user_id = $id";
$tabla2 = ejecutar($sql0) or die(mysql_error());
if(mysqli_num_rows($tabla2) == 0){

$sql="insert into details_campaigns values(0,'$idcamp', '$id')";
	
	if(ejecutar($sql)){

		$sql2="update campaigns set vacant=vacant-1 where campaign_id = $idcamp";
		ejecutar($sql2);
		
		echo "<script>alert('Te sumaste a campaña')
			 document.location=('../vista/modulovoluntario.php')</script>";
	}

}else{
		echo "<script>alert('ya esta unido a campaña')
		document.location=('../vista/modulovoluntario.php')</script>";
}

?>