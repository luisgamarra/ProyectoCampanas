<?php 

require_once ('../db/conexion.php');
require_once ('../modelo/user.php');

require_once ('../libs/phpmailer/Exception.php');
require_once ('../libs/phpmailer/PHPMailer.php');
require_once ('../libs/phpmailer/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//require $_SERVER['DOCUMENT_ROOT'] . '/libs/phpmailer/Exception.php';
//require $_SERVER['DOCUMENT_ROOT'] . '/libs/phpmailer/PHPMailer.php';
//require $_SERVER['DOCUMENT_ROOT'] . '/libs/phpmailer/SMTP.php';


ini_set('max_execution_time', 300);

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
            case 'cambiarcontrasenia' :
                cambiarcontrasenia();
                break;
            case 'recuperar' :
                recuperar();
                break;    
            
       }
            
        }else{
        $action = $_REQUEST["action"];
        switch ($action) {
            case 'logout':
                logout();
                break;           
            
        
    }}
	

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

$image = "";
if($_FILES['txtphoto']['name'] == "") {
    $image = $_POST["himage"];
}else{
    $image = $_FILES['txtphoto']['name'];
}

    $cod=$_SESSION["cod"];
    
    $us = new User();
    $us->setFirstName($_POST["txtnom"]);
    $us->setLastname($_POST["txtape"]);
    $us->setEmail($_POST["txtemail"]);
    $us->setCellphone($_POST["txtcel"]);
    $us->setPhoto($image);
    $us->setId($cod);
    $actualizar = $us->update();

$im = $_FILES['txtphoto']['tmp_name'];
$thumb_db = $_FILES['txtphoto']['name'];

$ruta = '../vista/img/' . $thumb_db;

move_uploaded_file($im, $ruta);

    echo "<script>alert('Actualizado Correctamente')
        document.location=('../vista/miperfil.php')</script></script>";
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
                $_SESSION['verificado'] = true;
        echo "<script>alert('Bienvenido Organizador')
              document.location=('../vista/panelcontrol.php')</script>";  
        }else{
            $_SESSION["cod"] = $log[0];
            $_SESSION["photo"] = $log[6];
            $_SESSION["usuario"]=$log[1]." ".$log[2];
            $_SESSION["correo"] = $log[3];
            $_SESSION['verificado'] = true;
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

 $mensaje="<html>
<body style='background: #FFFFFF;font-family: Verdana; font-size: 14px;color:#1c1b1b;'>
<div style=''>
    <h2>Estimado usuario, ".$row["firstname"]." ".$row["lastname"]."</h2>
    <p style='font-size:17px;'>Su clave es: 
    ".$row["4"]."</p>
  <br>
</html>"
;
      

$mail = new PHPMailer;
$mail->CharSet = "UTF-8";
$mail->isSMTP(); 
//$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'sistemacs2018@gmail.com'; // email
$mail->Password = 'PassW0rd2018'; // password
$mail->setFrom('sistemacs2018@gmail.com', 'Campañas System'); // From email and name
$address = $_POST["txtemail"];
$mail->addAddress($address, $address); // to email and name
$mail->Subject = 'Reenvio de contrasenia';
$mail->msgHTML($mensaje); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
        echo "<script>alert('TU CONTRASEÑA SE HA ENVIADO A SU CORREO')
        document.location=('../vista/login.php')</script>"; 
}



      
    }else{    
        echo "<script>alert('EL CORREO QUE HA INGRESADO NO EXISTE')
        document.location=('../vista/recuperarcontrasenia.php')</script>";       

}}


function logout(){


   session_destroy();

header("location:../vista/login.php");
}


 ?>
