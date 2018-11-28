<?php 
require_once ('../db/conexion.php');
require_once ('../modelo/reunion.php');
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

$fecha = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha"])));

$cod = $_SESSION["cod"];    

$re = new Reunion();
$re->setDates($fecha);
$re->setHours($_POST["txthora"]);
$re->setUserid($cod);
$fila = $re->getReunionbyFechayHora();
    
if(mysqli_num_rows($fila)==0){  

    $reu=new Reunion();
    $reu->setTopic($_POST["txtasunto"]);
    $reu->setDates($fecha);
    $reu->setHours($_POST["txthora"]);       
    $reu->setUserid($_SESSION["cod"]);
    $reu->setCampaignid($_POST["camp"]);
    $guardar=$reu->guardar();

    echo "<script>alert('Registraste reunion')
    document.location=('../vista/lista-reuniones.php')</script>";    
    
   }else{
         echo "<script>alert('La FECHA Y HORA YA ESTAN REGISTRADAS ANTERIORMENTE')
    document.location=('../vista/planificar-reuniones.php')</script>";   

   } 
}
    

function modificar(){

$idreu = $_POST["txtcod"];    

$fecha = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha"])));

$cod = $_SESSION["cod"];    

$re = new Reunion();
$re->setDates($fecha);
$re->setHours($_POST["txthora"]);
$re->setUserid($cod);
$fila = $re->getReunionbyFechayHora();
$resul = mysqli_fetch_array($fila);

if(mysqli_num_rows($fila) == 0){  
 
    $reu = new Reunion();
    $reu->setTopic($_POST["txtasunto"]);
    $reu->setDates($fecha);
    $reu->setHours($_POST["txthora"]);
    $reu->setCampaignid($_POST["camp"]);       
    $reu->setId($_POST["txtcod"]);
    $actualizar = $reu->actualizar();

    echo "<script>alert('Actualizado Correctamente')
    document.location=('../vista/lista-reuniones.php')</script>";

}elseif(mysqli_num_rows($fila) == 1 && $resul[0]==$_POST["txtcod"]){
    $reu = new Reunion();
    $reu->setTopic($_POST["txtasunto"]);
    $reu->setDates($fecha);
    $reu->setHours($_POST["txthora"]);
    $reu->setCampaignid($_POST["camp"]);       
    $reu->setId($_POST["txtcod"]);
    $actualizar = $reu->actualizar();

    echo "<script>alert('Actualizado Correctamente')
    document.location=('../vista/lista-reuniones.php')</script>";

}else{
         echo "<script>alert('LA FECHA Y HORA YA ESTAN REGISTRADAS ANTERIORMENTE')
    document.location=('../vista/modificar-reunion.php?idreu=$idreu')</script>";   

   } 
}

function eliminar(){

$idreu = $_REQUEST["idreu"];    
 
$reu = new Reunion();    
$reu->setId($idreu);
$eliminar = $reu->eliminar();

echo "<script>alert('Reunion eliminada')
 document.location=('../vista/lista-reuniones.php')</script>";
}


   


 ?>