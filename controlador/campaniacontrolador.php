<?php 

require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');

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

    $camp=new Campania();
    $camp->setTitle($_POST["txtitulo"]);
    $camp->setDescription($_POST["txtdes"]);
    $camp->setPlace($_POST["txtlugar"]);
    $camp->setVacant($_POST["txtvacante"]);
    $camp->setStartdate($_POST["txtfecha1"]);
    $camp->setEnddate($_POST["txtfecha2"]);
    $camp->setImage($_FILES['txtimagen']['name']);
    $camp->setUserid($_SESSION["cod"]);
    $guardar=$camp->guardar();

$im = $_FILES['txtimagen']['tmp_name'];
$thumb_db = $_FILES['txtimagen']['name'];

$ruta = '../vista/img/' . $thumb_db;

move_uploaded_file($im, $ruta);

    echo "<script>alert('Registraste una nueva campania')
    document.location=('../vista/listaCampania.php')</script>";    
    
}
    

function modificar(){

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


   


 ?>