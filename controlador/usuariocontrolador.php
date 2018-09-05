<?php 

require_once ('../modelo/conexion.php');
require_once ('../modelo/user.php');
require_once ('../modelo/class.phpmailer.php');
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
            case 'login' :
                login();
                break;
            case 'logout' :
                logout();
                break;
            case 'cambiarcontrasenia' :
                cambiarcontrasenia();
                break;
            case 'recuperar' :
                recuperar();
                break;    
            
        }
    }
	

function create(){

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
    
}
	
}


function modificar(){    

    $cod=$_SESSION["cod"];
    
    $us = new User();
    $us->setFirstName($_POST["txtnom"]);
    $us->setLastname($_POST["txtape"]);
    $us->setEmail($_POST["txtemail"]);
    $us->setCellphone($_POST["txtcel"]);
    $us->setPhoto($_FILES['txtphoto']['name']);
    $us->setId($cod);
    $actualizar = $us->update();

$im = $_FILES['txtphoto']['tmp_name'];
$thumb_db = $_FILES['txtphoto']['name'];

$ruta = '../vista/img/' . $thumb_db;

move_uploaded_file($im, $ruta);

    echo "<script>alert('Actualizado Correctamente')
         document.location=('../vista/miperfil.php')</script>";
}


function login(){

    $usu = new User();
    $usu->setEmail($_POST["txtemail"]);
    $usu->setPassword($_POST["txtpass"]);
    $log = $usu->logeo();
    if($log){
        if($log[7] == "1"){
                $_SESSION["cod"] = $log[0];
                $_SESSION["photo"] = $log[6];
                $_SESSION["tipo"] = $log[7];
                $_SESSION["usuario"]=$log[1]." ".$log[2];
        echo "<script>alert('Bienvenido Administrador')
              document.location=('../vista/panelcontrol.php')</script>";  
        }else{
            $_SESSION["cod"] = $log[0];
            $_SESSION["photo"] = $log[6];
            $_SESSION["usuario"]=$log[1]." ".$log[2];
        echo "<script>alert('Bienvenido Voluntario')
             document.location=('../vista/modulovoluntario.php')</script>";  
        }  

    }else{
	       echo "<script>alert('EMAIL y/o CONTRASEÑA INCORRECTOS')
	       document.location=('../vista/login.php')</script>";
    }
}


function cambiarcontrasenia(){

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

function recuperar(){

    $usu = new User();
    $usu->setEmail($_POST["txtemail"]);
    $row = $usu->getUserbyEmail();
    
    if($row){

$mail = new PHPMailer();
//indico a la clase que use SMTP
$mail->IsSMTP(); 
//Debo de hacer autenticación SMTP

$mail->SMTPAuth   = true; 
$mail->SMTPSecure = "tls";  
//indico el servidor de Hotmail para SMTP
$mail->Host = "smtp.live.com"; 
//indico el puerto que usa Hotmail
$mail->Port       = 25;  
//indico un usuario / clave de un usuario de Hotmail
$mail->Username   = "luisg_038@hotmail.com";
$mail->Password   = "ALBERTO"; 
$mail->SetFrom('luisg_038@hotmail.com', 'luisg_038@hotmail.com'); // El segundo parametro es el nombre del mail o seudonimo
$mail->Subject    = "RECUPERACION DE CONTRASENIA";  // Asunto
$mail->MsgHTML("Te enviamos tu contrasenia: '".$row[4]."'");
//indico destinatario
$address = $_POST["txtemail"];
$mail->AddAddress($address, $address); // Segundo parametro es el seudonimo
if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Enviamos un correo";
}


        echo "<script>alert('SE HA ENVIADO A SU CORREO')
        document.location=('../vista/login.php')</script>";
    }else{    
        echo "<script>alert('EL CORREO QUE HA INGRESADO NO EXISTE')
        document.location=('../vista/recuperarcontrasenia.php')</script>";       

}}


 ?>