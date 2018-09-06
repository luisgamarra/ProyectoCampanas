<?php 

require_once ('../db/conexion.php');
require_once ('../modelo/donacion.php');

conectar();
session_start();

 $action = '';
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'create' : 
                create();
                break;
            case 'modificar' : 
                modificar();
                break;
            case 'eliminar' :
                eliminar();
                break;           
            
        }
    }


function create(){

$idcam = $_REQUEST["idcam"];
$idvol = $_REQUEST["idvol"];

    $don=new Donacion();    
    $don->setDescription($_POST["txtdes"]);
    $don->setQuantility($_POST["txtcant"]);   
    $don->setUserid($idvol);
    $don->setCampaignid($idcam);
    $guardar=$don->guardar();


    echo "<script>alert('Registraste Donacion')
    document.location=('../vista/lista-donaciones.php')</script>";    
    
}
    
function modificar(){

$iddon = $_REQUEST["iddon"];    
 
    $don = new Donacion();
    $don->setDescription($_POST["txtdes"]);
    $don->setQuantility($_POST["txtcant"]);   
    $don->setId($iddon);
    $actualizar = $don->actualizar();

    echo "<script>alert('Actualizado Correctamente')
    document.location=('../vista/lista-donaciones.php')</script>";
}


/**function eliminar(){

session_start();

$idcamp = $_REQUEST["idcamp"];

    
 
    $camp = new Campania();    
    $camp->setId($idcamp);
    $eliminar = $camp->eliminar();

    echo "<script>alert('Campania eliminada')
 document.location=('../vista/detallecampania.php')</script>";
}


   

**/
 ?>