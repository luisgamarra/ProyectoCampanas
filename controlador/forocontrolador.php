<?php 
header("X-XSS-Protection: 1; mode=block");
require_once ('../db/conexion.php');
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

    $foro=new Foro();
    $foro->setTitle($_POST["txtitulo"]);    
    $foro->setUserid($_SESSION["cod"]);
    $guardar=$foro->guardar();

    echo "<script>alert('Creaste un foro')
    document.location=('../vista/listaforo.php')</script>";    
    
}
    

function modificar(){

$idf = $_POST["foroid"];    
 
    $foro = new Foro();
    $foro->setTitle($_POST["txtforo"]);
    $foro->setId($idf) ;
    $actualizar = $foro->actualizar();

    echo "<script>alert('Actualizado Correctamente')
    document.location=('../vista/listaforo.php')</script>";
}


function eliminar(){

$idf = $_REQUEST["idf"];    
 
    $foro = new Foro();    
    $foro->setId($idf);
    $eliminar = $foro->eliminar();

    echo "<script>alert('Foro eliminado')
 document.location=('../vista/listaforo.php')</script>";
}


   


 ?>