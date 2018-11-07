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
            case 'like' : 
                like();
                break;
            case 'dislike' : 
                dislike();
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

function like(){
    $post_id = $_POST['post_id'];
    $cod = $_SESSION["cod"];
try {
    $qry = "select * from like_unlike where comentario_id = $post_id and user_id=$cod";
    $res = ejecutar($qry);
    if(mysqli_num_rows($res) == 0) {
               
        $insertquery = "INSERT INTO like_unlike(id,type,user_id,comentario_id) values(null,1,".$cod.",".$post_id.")";
        $result = ejecutar($insertquery);
        }else {
        $updatequery = "UPDATE like_unlike SET type=1 where user_id=" . $cod . " and comentario_id=" . $post_id;
        $result = ejecutar($updatequery);
    }

    if($result) {

$SQL1 = "SELECT COUNT(*) FROM like_unlike where type = 1 and comentario_id = $post_id";
$fila1 = ejecutar($SQL1);
$filita1 = mysqli_fetch_array($fila1);

$SQL2 = "SELECT COUNT(*) FROM like_unlike where type = 0 and comentario_id = $post_id";
$fila2 = ejecutar($SQL2);
$filita2 = mysqli_fetch_array($fila2);

                    echo $filita1[0].'|'.$filita2[0];
                }

            } catch (Exception $e) {
            echo "Error : " .$e->getMessage();
        }
}   

function dislike(){
    $post_id = $_POST['post_id'];
    $cod = $_SESSION["cod"];
try {
    $qry = "select * from like_unlike where comentario_id = $post_id and user_id=$cod";
    $res = ejecutar($qry);
    if(mysqli_num_rows($res) == 0) {
               
        $insertquery = "INSERT INTO like_unlike(id,type,user_id,comentario_id) values(null,0,".$cod.",".$post_id.")";
        $result = ejecutar($insertquery);
        }else {
        $updatequery = "UPDATE like_unlike SET type=0 where user_id=" . $cod . " and comentario_id=" . $post_id;
        $result = ejecutar($updatequery);
    }

    if($result) {

$SQL1 = "SELECT COUNT(*) FROM like_unlike where type = 1 and comentario_id = $post_id";
$fila1 = ejecutar($SQL1);
$filita1 = mysqli_fetch_array($fila1);

$SQL2 = "SELECT COUNT(*) FROM like_unlike where type = 0 and comentario_id = $post_id";
$fila2 = ejecutar($SQL2);
$filita2 = mysqli_fetch_array($fila2);

                    echo $filita1[0].'|'.$filita2[0];
                }

            } catch (Exception $e) {
            echo "Error : " .$e->getMessage();
        }
}   


 ?>