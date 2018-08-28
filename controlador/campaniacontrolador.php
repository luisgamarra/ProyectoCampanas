<?php 

require_once ('../modelo/conexion.php');

require_once ('../modelo/campania.php');

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

    $camp=new Campania();
    $camp->setTitle($_POST["txtitulo"]);
    $camp->setPlace($_POST["txtlugar"]);
    $camp->setVacant($_POST["txtvacante"]);
    $camp->setFecha($_POST["txtfecha"]);
    $camp->setImage($_FILES['txtimagen']['name']);
    $camp->setUserid($_SESSION["cod"]);
    $guardar=$camp->guardar();

$im = $_FILES['txtimagen']['tmp_name'];
$thumb_db = $_FILES['txtimagen']['name'];

$ruta = '../vista/img/' . $thumb_db;

move_uploaded_file($im, $ruta);

    echo "<script>alert('Registraste una nueva campania')
 document.location=('../../vista/listaCampania.php')</script>";
    
    
}
    

function modificar(){

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


   


 ?>