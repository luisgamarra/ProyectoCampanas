<?php 

require_once ('../modelo/conexion.php');
require_once ('../modelo/reunion.php');

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


session_start();

    $reu=new Reunion();
    $reu->setTopic($_POST["txtasunto"]);
    $reu->setDates($_POST["txtfecha"]);     
    $reu->setUserid($_SESSION["cod"]);
    $reu->setCampaignid($_POST["camp"]);
    $guardar=$reu->guardar();


    echo "<script>alert('Registraste reunion')
 document.location=('../vista/planificar-reuniones.php')</script>";
    
    
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