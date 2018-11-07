<?php 

require_once ('../db/conexion.php');
require_once ('../modelo/punto.php');

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
            case 'listar' :
                listar();
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

  $contestado = 0;  
  


$cod = $_SESSION["cod"];

    $p = new Punto();
    $p->setCampaignid($_POST["camp"]);
    $r = $p->puntosporcampania();
    //$row = mysqli_fetch_array($r);

    while($fila = mysqli_fetch_array($r)){
        if($fila['estado'] == 1 ){
             $contestado++;  
        
    }

 }

if(mysqli_num_rows($r) == 0){   

    
    $point = new Punto();
    $point->setDireccion($_POST["direccion"]);    
    $point->setCx($_POST["cx"]);
    $point->setCy($_POST["cy"]);
    $point->setCampaignid($_POST["camp"]);
    $point->setUserid($cod);
    $guardar=$point->guardar();

    
        echo "<script>alert('Se registro la localizacion')
    document.location=('../vista/registrolocalizacion.php')</script>";

}elseif (mysqli_num_rows($r) >= 1 && $contestado == 0) {
    
    $point = new Punto();
    $point->setDireccion($_POST["direccion"]);    
    $point->setCx($_POST["cx"]);
    $point->setCy($_POST["cy"]);
    $point->setCampaignid($_POST["camp"]);
    $point->setUserid($cod);
    $guardar=$point->guardar();

    
        echo "<script>alert('Se registro la localizacion')
   document.location=('../vista/registrolocalizacion.php')</script>";
   
    
    
}else{
     echo "<script>alert('la campaña ya tiene ubicacion')
   document.location=('../vista/registrolocalizacion.php')</script>";    
}
    
    
}
    

function modificar(){

    $dir = 0;
  $contestado = 0;


    $cod = $_SESSION["cod"];
    $idubi = $_POST["id"]; 
    $di = $_POST["di"];

    $p = new Punto();
    $p->setCampaignid($_POST["camp"]);
    $r = $p->puntosporcampania();
    //$row = mysqli_fetch_array($r);

    while($fila = mysqli_fetch_array($r)){
        if($fila['estado'] == 1 ){
             $contestado++;  
        }if($fila['direccion'] == $di) {
            $dir++;
        }
    }

if(mysqli_num_rows($r) == 0){         
 
    $punto = new Punto();
    $punto->setDireccion($_POST["direccion"]);
    $punto->setCx($_POST["cx"]);
    $punto->setCy($_POST["cy"]);
    $punto->setCampaignid($_POST["camp"]);      
    $punto->setId($idubi);
    $actualizar = $punto->actualizar();

    echo "<script>alert('Actualizado Correctamente')
    document.location=('../vista/lista-ubicaciones.php')</script>";

}elseif(mysqli_num_rows($r) >= 1 && $contestado == 1 && $dir == 1) {
    $punto = new Punto();
    $punto->setDireccion($_POST["direccion"]);
    $punto->setCx($_POST["cx"]);
    $punto->setCy($_POST["cy"]);
    $punto->setCampaignid($_POST["camp"]);      
    $punto->setId($idubi);
    $actualizar = $punto->actualizar();

    echo "<script>alert('Actualizado Correctamente')
   document.location=('../vista/lista-ubicaciones.php')</script>";

}elseif(mysqli_num_rows($r) >= 1 && $contestado == 0 ){
     $punto = new Punto();
    $punto->setDireccion($_POST["direccion"]);
    $punto->setCx($_POST["cx"]);
    $punto->setCy($_POST["cy"]);
    $punto->setCampaignid($_POST["camp"]);      
    $punto->setId($idubi);
    $actualizar = $punto->actualizar();

    echo "<script>alert('Actualizado Correctamente')
   document.location=('../vista/lista-ubicaciones.php')</script>";

}else{
     echo "<script>alert('la campaña ya tiene ubicacion')
    document.location=('../vista/modificar-ubicacion.php?idubi=$idubi')</script>";    
}    
}


function eliminar(){

$idubi = $_REQUEST["idubi"];    
 
    $punto = new Punto();    
    $punto->setId($idubi);
    $eliminar = $punto->eliminar();

    echo "<script>alert('Ubicacion eliminada')
 document.location=('../vista/lista-ubicaciones.php')</script>";
}


 function listar(){

    $cod=$_SESSION["cod"];

    $p = new Punto();
    $p->setUserid($cod);
    $resultados=$p->listarpuntos();

    if(sizeof($resultados)>0)
        {
            $r["estado"] = "ok";
            $r["mensaje"] = $resultados;
        }
        else
        {
            $r["estado"] = "error";
            $r["mensaje"] = "No hay registros";
        }
    echo json_encode($r);
 }  


 ?>