<?php 
require_once ('../modelo/conexion.php');
require_once ('../modelo/donacion.php');

conectar();
session_start();

$iddon = $_REQUEST["iddon"];    
 
    $don = new donacion();    
    $don->setId($iddon);
    $eliminar = $don->eliminar();

    echo "<script>alert('Donacion eliminada')
 	document.location=('../vista/lista-donaciones.php')</script>";

 ?>