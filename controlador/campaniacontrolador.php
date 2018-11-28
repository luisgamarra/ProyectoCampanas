<?php 
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/detallecampania.php');

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
            case 'sumarse' :
                sumarse();
                break;
            case 'saliroeliminar' :
                saliroeliminar();
                break;           
            
        }
    }


function create(){

$fecha1 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha1"])));
$fecha2 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha2"])));

    $camp=new Campania();
    $camp->setTitle($_POST["txtitulo"]);
    $camp->setDescription($_POST["txtdes"]);
    $camp->setPlace($_POST["txtlugar"]);
    $camp->setVacant($_POST["txtvacante"]);
    $camp->setStartdate($fecha1);
    $camp->setEnddate($fecha2);
    $camp->setImage($_FILES['txtimagen']['name']);
    $camp->setUserid($_SESSION["cod"]);
    $camp->setCategoriaid($_POST["cat"]);
    $guardar=$camp->guardar();

$im = $_FILES['txtimagen']['tmp_name'];
$thumb_db = $_FILES['txtimagen']['name'];

$ruta = '../vista/img/' . $thumb_db;

move_uploaded_file($im, $ruta);

    echo "<script>alert('Registraste una nueva campania')
    document.location=('../vista/listacampania.php')</script>";    
    
}
    

function modificar(){

$idcamp = $_POST["idcamp"]; 

$fecha1 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha1"])));
$fecha2 = date('Y/m/d', strtotime(str_replace('/', '-', $_POST["txtfecha2"])));

$image = "";
if($_FILES['txtim']['name'] == "") {
    $image = $_POST["himage"];
}else{
    $image = $_FILES['txtim']['name'];
}   


    $camp = new Campania();
    $camp->setTitle($_POST["txtitulo"]);
    $camp->setDescription($_POST["txtdes"]);
    $camp->setPlace($_POST["txtlugar"]);
    $camp->setVacant($_POST["txtvacante"]);
    $camp->setStartdate($fecha1);
    $camp->setEnddate($fecha2);
    $camp->setImage($image);
    $camp->setCategoriaid($_POST["cat"]);     
    $camp->setId($idcamp);
    $actualizar = $camp->actualizar();

    $im = $_FILES['txtim']['tmp_name'];
$thumb_db = $_FILES['txtim']['name'];

$ruta = '../vista/img/' . $thumb_db;

move_uploaded_file($im, $ruta);

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


function sumarse(){

$idcamp = $_REQUEST["idcamp"];
$id = $_SESSION["cod"];


$vol = new Detallecampania();
$vol->setCampaignid($idcamp);
$vol->setUserid($id);
$r = $vol->buscarporcampyvol();
$row = mysqli_fetch_array($r);

$camp = new Campania();
$camp->setId($idcamp);
$fila = $camp->getCampaniabyCod();

if(mysqli_num_rows($r) == 0 && $fila[4] != 0){

    $vol2 = new Detallecampania();
    $vol2->setCampaignid($idcamp);
    $vol2->setUserid($id);
    $r2 = $vol2->unirsecampania();
    
    if($r2){

        $rc = new Campania();
        $rc->setId($idcamp);
        $rc->restarvacante();
        
        //include ('../vista/templates/correo.php');
        echo "<script>alert('Te sumaste a campaña')
        document.location=('../vista/miscampanas.php')</script>"; 
        
    }

}elseif(mysqli_num_rows($r) == 1 && $row['estado'] == 0 && $fila[4] != 0){


    $sql0 = " update details_campaigns set estado = 1 where campaign_id = $idcamp and user_id = $id ";
    ejecutar($sql0);

        $rc = new Campania();
        $rc->setId($idcamp);
        $rc->restarvacante();
    
    //include ('../vista/templates/correo.php');
        echo "<script>alert('Te sumaste a campaña')
        document.location=('../vista/miscampanas.php')</script>"; 

}elseif ($fila[4] == 0) {
    echo "<script>alert('No hay vacantes suficientes')
        document.location=('../vista/modulovoluntario.php')</script>";

}else{
        echo "<script>alert('YA ESTAS SUMADO A ESTA CAMPAÑA')
        document.location=('../vista/modulovoluntario.php')</script>";
}

}

function saliroeliminar(){
$idcamp = $_REQUEST["idcamp"];

$idde = $_REQUEST["idde"];

$id = $_SESSION["cod"];

$tipo =@$_SESSION["tipo"];

$vol = new Detallecampania();
$vol->setId($idde);
$r2 = $vol->elivolysalcamp();

    //$sql0 = " update details_campaigns set estado = 0 where detail_campaign_id = $idde ";
    //$r2 = ejecutar($sql0);
    
    if($r2){

        $sumar = new Campania();
        $sumar->setId($idcamp);
        $sumar->sumarvacante();

        //$sql = "update campaigns set vacant=vacant+1 where campaign_id= $idcamp ";
        //ejecutar($sql);

        if ($tipo == 1){
        echo "<script>alert('Eliminaste voluntario')
             document.location=('../vista/voluntarios.php')</script>";
        }else{
            echo "<script>alert('Saliste de campaña')
             document.location=('../vista/modulovoluntario.php')</script>";
        }
    }

}

   


 ?>