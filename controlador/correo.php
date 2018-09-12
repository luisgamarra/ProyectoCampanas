<?php 
require_once ('../db/conexion.php');
require_once ('../modelo/user.php');
conectar();


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once ('../libs/phpmailer/Exception.php');
require_once ('../libs/phpmailer/PHPMailer.php');
require_once ('../libs/phpmailer/SMTP.php');


$nomcamp=$_REQUEST["nomcamp"];

$mensaje="<html>
<body style='background: #FFFFFF;font-family: Verdana; font-size: 14px;color:#1c1b1b;'>
<div style=''>
    <h2>Hola ".$_SESSION["usuario"]."</h2>
    <p style='font-size:17px;'>Te sumaste a campaña
    ".$nomcamp."</p>
  <br>
</html>"
;
      

$mail = new PHPMailer;
$mail->CharSet = "UTF-8";
$mail->isSMTP(); 
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'sistemacs2018@gmail.com'; // email
$mail->Password = 'PassW0rd2018'; // password
$mail->setFrom('sistemacs2018@gmail.com', 'Campañas System'); // From email and name
$address = $_SESSION["correo"];
$mail->addAddress($address, $address); // to email and name
$mail->Subject = 'Bienvenido';
$mail->msgHTML($mensaje); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
        echo "<script>alert('Te sumaste a campaña')
        document.location=('../vista/modulovoluntario.php')</script>"; 
}



 ?>