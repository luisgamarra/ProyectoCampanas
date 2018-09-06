<?php 
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');

conectar();
session_start();

$idcamp = $_REQUEST["idcamp"];    
 
    $camp = new Campania();    
    $camp->setId($idcamp);
    $eliminar = $camp->eliminar();

    echo "<script>alert('Campania eliminada')
	document.location=('../vista/detallecampania.php')</script>";

 ?>