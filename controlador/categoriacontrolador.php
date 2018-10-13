<?php 

require_once ('../db/conexion.php');
require_once ('../modelo/categoria.php');


conectar();
session_start();

 $action = '';
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'agregar' : 
                agregar();
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


function agregar(){ 

   $cat = new Categoria();
   $cat->setDescription($_POST["txtcate"]);
   $buscar = $cat->categoriapordes(); 
  
if($buscar){

    echo "<script>alert('ESA CATEGORIA YA EXISTE')
    document.location=('../vista/registrocampania.php')</script>"; 
      
    
}else{
    $cate=new Categoria();
    $cate->setDescription($_POST["txtcate"]);    
    $cate->setUserid($_SESSION["cod"]);
   
    $guardar=$cate->guardar();
   

        echo "<script>alert('LA CATEGORIA SE AÑADIO')
    document.location=('../vista/registrocampania.php')</script>";  
     
}
    
    
}
    

/**function modificar(){

$idcome = $_REQUEST["idcome"];
$idforo = $_REQUEST["foroid"];    
 
    $comentario = new Comentario();
    $comentario->setDescription($_POST["txtdes0"]);     
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
**/
   


 ?>