<?php 

require_once ('../db/conexion.php');
require_once ('../modelo/reunion.php');
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

    $reu=new Reunion();
    $reu->setTopic($_POST["txtasunto"]);
    $reu->setDates($_POST["txtfecha"]);     
    $reu->setUserid($_SESSION["cod"]);
    $reu->setCampaignid($_POST["camp"]);
    $guardar=$reu->guardar();

    echo "<script>alert('Registraste reunion')
    document.location=('../vista/planificar-reuniones.php')</script>";    
    
}
    

function modificar(){

$idreu = $_REQUEST["idreu"];    
 
    $reu = new Reunion();
    $reu->setTopic($_POST["txtasunto"]);
    $reu->setDates($_POST["txtfecha"]);       
    $reu->setId($idreu);
    $actualizar = $reu->actualizar();

    echo "<script>alert('Actualizado Correctamente')
    document.location=('../vista/planificar-reuniones.php')</script>";
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