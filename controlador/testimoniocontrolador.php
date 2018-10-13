<?php 

require_once ('../db/conexion.php');
require_once ('../modelo/testimonio.php');


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

    $cod = $_SESSION["cod"];
  

    $test=new Testimonio();
    $test->setDescription($_POST["txtdes"]);    
    $test->setUserid($cod);  
    $guardar=$test->guardar();       

    echo "<script>alert('TESTIMONIO AÑADIDO')
   document.location=('../vista/lista-testimonio.php')</script>";  
  

    
}
    

function modificar(){

$testid = $_POST["testid"];
   
 
    $test = new Testimonio();
    $test->setDescription($_POST["txtest"]);     
    $test->setId($testid);
    $actualizar = $test->actualizar();

    echo "<script>alert('Actualizado Correctamente')
    document.location=('../vista/lista-testimonio.php')</script>"; 
}


function eliminar(){


$testid = $_REQUEST["testid"];     
 
    $test = new Testimonio();    
    $test->setId($testid);
    $eliminar = $test->eliminar();

    

    
    echo "<script>alert('Testimonio eliminado')
document.location=('../vista/lista-testimonio.php')</script>";


} 

   


 ?>