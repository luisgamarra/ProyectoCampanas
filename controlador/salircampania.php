<?php
require_once ('../db/conexion.php');
require_once ('../modelo/detallecampania.php');
require_once ('../modelo/campania.php');
conectar();
session_start();

$idcamp = $_REQUEST["idcamp"];

$idde = $_REQUEST["idde"];

$id = $_SESSION["cod"];

$tipo =@$_SESSION["tipo"];



	$sql0 = " update details_campaigns set estado = 0 where detail_campaign_id = $idde ";
	$r2 = ejecutar($sql0);
	
	if($r2){

		$sql = "update campaigns set vacant=vacant+1 where campaign_id= $idcamp ";
		ejecutar($sql);

		if ($tipo == 1){
		echo "<script>alert('Eliminaste voluntario')
			 document.location=('../vista/voluntarios.php')</script>";
		}else{
			echo "<script>alert('Saliste de campaña')
			 document.location=('../vista/modulovoluntario.php')</script>";
		}
	}



?>