<?php 

require_once ('../modelo/conexion.php');

require_once ('../modelo/user.php');


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
            case 'login' :
                login();
                break;
            case 'logout' :
                logout();
                break;
            case 'cambiarcontrasenia' :
                cambiarcontrasenia();
                break;
            
        }
    }
	

function create(){

conectar();

$u = new User();
$u->setEmail($_POST["txtcorreo"]);
$row = $u->getUserbyEmail();
if($row){
    echo "<script>alert('EL CORREO YA EXITE, VUELVA INTENTAR CON OTRO CORREO')
 document.location=('../vista/registrousuario.php')</script>";
}else{    
    $usuario=new User();
    $usuario->setFirstName($_POST["txtnom"]);
    $usuario->setLastname($_POST["txtape"]);
    $usuario->setEmail($_POST["txtcorreo"]);
    $usuario->setPassword($_POST["txtclave"]);
    $usuario->setCellphone($_POST["txtcel"]);
    $usuario->setType($_POST["txtipo"]);
    $save=$usuario->save();

    echo "<script>alert('Registro Correcto')
 document.location=('../vista/login.php')</script>";
    //header("location:../../View/Login.php");
    
}
	//$sql1="insert into users values(null,'$nom','$ape','$cor','$cla','$cel',$tipo)";
    //ejecutar($sql1) or die(mysql_error());
    //header("location:../../View/Login.php");
}


function modificar(){
    session_start();

    $cod=$_SESSION["cod"];
    conectar();
    $us = new User();
    $us->setFirstName($_POST["txtnom"]);
    $us->setLastname($_POST["txtape"]);
    $us->setEmail($_POST["txtemail"]);
    $us->setCellphone($_POST["txtcel"]);
    $us->setId($cod);
    $actualizar = $us->update();

    echo "<script>alert('Actualizado Correctamente')
 document.location=('../../vista/miperfil.php')</script>";
}




function login(){
session_start();
conectar();

    $usu = new User();
    $usu->setEmail($_POST["txtusu"]);
    $usu->setPassword($_POST["txtpass"]);
    $log = $usu->logeo();
    if($log){
        if($log[6] == "1"){
        $_SESSION["cod"] = $log[0];
        $_SESSION["tipo"] = $log[6];
        $_SESSION["usuario"]=$log[1]." ".$log[2];
        echo "<script>alert('Bienvenido Administrador')
    document.location=('../vista/panelcontrol.php')</script>";  
        }else{
            $_SESSION["cod"] = $log[0];
        $_SESSION["usuario"]=$log[1]." ".$log[2];
        echo "<script>alert('Bienvenido Voluntario')
    document.location=('../vista/modulousuario.php')</script>";  
        }  

}else{

	echo "<script>alert('EMAIL y/o CONTRASEÑA INCORRECTOS')
	document.location=('../vista/login.php')</script>";
}

}


function cambiarcontrasenia(){
session_start();
conectar();

    $usu = new User();
    $usu->setPassword($_POST["txtca"]);
    $row = $usu->getUserbypass();
    if($row){
        $u = new User();
        $u->setPassword($_POST["txtcn"]);
        $u->setId($_SESSION["cod"]);
        $u->updatepass();

        echo "<script>alert('CONTRASEÑA ACTUALIZADA')
    document.location=('../vista/login.php')</script>";

}else{

    echo "<script>alert('CONTRASEÑA INCORRECTA')
    document.location=('../vista/cambiarcontra.php')</script>";
}

}

function logout(){

   session_start();
   session_destroy();
   echo "<script>alert('SALISTE DEL SISTEMA')
	document.location=('../index.html')</script>";

  
}



 ?>