<?php
require_once ('../db/conexion.php');
require_once ('../modelo/detallecampania.php');
require_once ('../modelo/campania.php');
conectar();
session_start();

$idcamp = $_REQUEST["idcamp"];
$id = $_SESSION["cod"];


$vol = new Detallecampania();
$vol->setCampaignid($idcamp);
$vol->setUserid($id);
$r = $vol->buscarporcampyvol();
$row = mysqli_fetch_array($r);

if(mysqli_num_rows($r) == 0){

	$vol2 = new Detallecampania();
	$vol2->setCampaignid($idcamp);
	$vol2->setUserid($id);
	$r2 = $vol->unirsecampania();
	
	if($r2){

		$rc = new Campania();
		$rc->setId($idcamp);
		$rc->restarvacante();
		
		echo "<script>alert('Te sumaste a campaña')
			 document.location=('../vista/modulovoluntario.php')</script>";
	}

}elseif(mysqli_num_rows($r) == 1 && $row['estado'] == 0){


	$sql0 = " update details_campaigns set estado = 1 where campaign_id = $idcamp and user_id = $id ";
	ejecutar($sql0);

	$rc = new Campania();
		$rc->setId($idcamp);
		$rc->restarvacante();
	
	echo "<script>alert('Te sumaste a campaña')
			 document.location=('../vista/modulovoluntario.php')</script>";


}else{
		echo "<script>alert('ya esta unido a campaña')
		document.location=('../vista/modulovoluntario.php')</script>";
}

?>