<?php 

//session_start();

$verificado = !empty($_SESSION['verificado']) ? $_SESSION['verificado'] : false;

if(!$verificado){
	header('Location: login.php');
	exit();
}
?>