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
    document.location=('../vista/participarforo.php?foroid=$fi')</script>";    
    }

    
    
}
    

function modificar(){

$idcome = $_POST["comid"];
$idforo = $_REQUEST["foroid"];    
 
    $comentario = new Comentario();
    $comentario->setDescription($_POST["txtcomen"]);     
    $comentario->setId($idcome);
    $actualizar = $comentario->actualizar();

    echo "<script>alert('Actualizado Correctamente')
    document.location=('../vista/participarforo.php?foroid=$idforo')</script>"; 
}


function eliminar(){

$idcome = $_REQUEST["idcome"];
$idforo = $_REQUEST["foroid"];     
 
    $come = new Comentario();    
    $come->setId($idcome);
    $eliminar = $come->eliminar();

    if($eliminar){
        $restar = new Foro();
        $restar->setId($idforo);
        $restar->restaresp();

    
    echo "<script>alert('comentario eliminado')
document.location=('../vista/participarforo.php?foroid=$idforo')</script>";
}

} 

   


 ?>