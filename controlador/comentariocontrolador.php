<?php 

require_once ('../db/conexion.php');
require_once ('../modelo/comentario.php');
require_once ('../modelo/foro.php');

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
            
        }
    }


function create(){

    $fi = $_POST["fi"];
    $ft = $_POST["ft"];

    $comentario=new Comentario();
    $comentario->setDescription($_POST["txtdes"]);    
    $comentario->setUserid($_SESSION["cod"]);
    $comentario->setForoid($_POST["fi"]);
    $guardar=$comentario->guardar();

    if($guardar){
        $sumar = new Foro();
        $sumar->setId($_POST["fi"]);
        $sumar->sumaresp();

        echo "<script>alert('tu comentario se añadio')
    document.location=('../vista/participarforo.php?foroid=$fi&&ft=$ft')</script>";    
    }

    
    
}
    

/**function modificar(){

$idcamp = $_REQUEST["idcamp"];    
 
    $camp = new Campania();
    $camp->setTitle($_POST["txtitle"]);
    $camp->setPlace($_POST["txtplace"]);
    $camp->setVacant($_POST["txtvacant"]);
    $camp->setStartdate($_POST["txtfecha1"]);
    $camp->setEnddate($_POST["txtfecha2"]);    
    $camp->setId($idcamp);
    $actualizar = $camp->actualizar();

    echo "<script>alert('Actualizado Correctamente')
    document.location=('../vista/detallecampania.php')</script>";
}


function eliminar(){

$idcamp = $_REQUEST["idcamp"];    
 
    $camp = new Campania();    
    $camp->setId($idcamp);
    $eliminar = $camp->eliminar();

    echo "<script>alert('Campania eliminada')
 document.location=('../vista/detallecampania.php')</script>";
}
**/

   


 ?>