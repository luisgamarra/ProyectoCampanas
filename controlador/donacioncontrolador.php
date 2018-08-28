<?php 

require_once ('../modelo/conexion.php');
require_once ('../modelo/donacion.php');

conectar();


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
$idusu = $_REQUEST["idusu"];
session_start();

    $don=new Donacion();
    $don->setCategory($_POST["txtcate"]);
    $don->setName($_POST["txtnombre"]);  
    $don->setDescription($_POST["txtdes"]);
    $don->setQuantility($_POST["txtcant"]);   
    $don->setUserid($idusu);
    $don->setCampaignid($idcam);
    $guardar=$don->guardar();


    echo "<script>alert('Registraste Donacion')
 document.location=('../vista/donaciones.php')</script>";
    
    
}
    

/**function modificar(){

session_start();

$idcamp = $_REQUEST["idcamp"];

    
 
    $camp = new Campania();
    $camp->setTitle($_POST["txtitle"]);
    $camp->setPlace($_POST["txtplace"]);
    $camp->setVacant($_POST["txtvacant"]);    
    $camp->setId($idcamp);
    $actualizar = $camp->actualizar();

    echo "<script>alert('Actualizado Correctamente')
 document.location=('../vista/detallecampania.php')</script>";
}

function eliminar(){

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