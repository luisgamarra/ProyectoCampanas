<?php 
require_once ('../db/conexion.php');
require_once ('../modelo/reunion.php');

conectar();
session_start();

$idreu = $_REQUEST["idreu"];
    
    $reu = new Reunion();    
    $reu->setId($idreu);
    $eliminar = $reu->eliminar();

    echo "<script>alert('Reunion eliminada')
 	document.location=('../vista/planificar-reuniones.php')</script>";

 ?>