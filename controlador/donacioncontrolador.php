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
              }
            
        }else{
        $action = $_REQUEST["action"];
        switch ($action) {
            case 'eliminar':
                eliminar();
                break;           
            
        
    }}
    


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
$idcamp = $_REQUEST["idcamp"];
 
    $don = new Donacion();
    $don->setDescription($_POST["txtdes"]);
    $don->setQuantility($_POST["txtcant"]);   
    $don->setId($iddon);
    $don->setCampaignid($idcamp);
    $actualizar = $don->actualizar();

    echo "<script>alert('Actualizado Correctamente')
    document.location=('../vista/lista-donaciones.php')</script>";
}


function eliminar(){

$iddon = $_REQUEST["iddon"];    
 
    $don = new Donacion();    
    $don->setId($iddon);
    $eliminar = $don->eliminar();

    echo "<script>alert('Donacion eliminada')
 document.location=('../vista/lista-donaciones.php')</script>";
}


   


 ?>