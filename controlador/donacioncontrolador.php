<?php 
header("X-XSS-Protection: 1; mode=block"); 
require_once ('../db/conexion.php');
require_once ('../modelo/notificacion.php'); // para enviar notificacion
require_once ('../modelo/campania.php'); // para buscar por campaña
require_once ('../modelo/donacion.php');

conectar();
session_start();

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

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
            case 'paypal' : 
                paypal();
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

$idcam = $_REQUEST["idcam"];

if($idcam != "" ){

    $don=new Donacion();    
    $don->setDescription($_POST["txtdes"]);
    $don->setQuantility($_POST["txtcant"]);   
    $don->setUserid($_POST["vol"]);
    $don->setCampaignid($idcam);
    $don->setCatdon($_POST["cate"]);
    $guardar=$don->guardar();


    echo "<script>alert('Registraste Donacion')
    document.location=('../vista/lista-donaciones.php')</script>";    
    }else{
          echo "<script>alert('Selecciona una campaña')
    document.location=('../vista/registrodonacion.php')</script>";    
   }
}
    
function modificar(){

$idvol = $_REQUEST["idvol"];    
$idcamp = $_REQUEST["idcamp"];

 
    $don = new Donacion();
    $don->setDescription($_POST["txtdes"]);
    $don->setQuantility($_POST["txtcant"]);   
    $don->setUserid($idvol);
    $don->setCampaignid($idcamp);
    $don->setCatdon($_POST["cate"]);
    $don->setId($_POST["txtcod"]);
    $actualizar = $don->actualizar();

    echo "<script>alert('Actualizado Correctamente')
    document.location=('../vista/lista-donaciones.php')</script>";
}


function eliminar(){

$iddon = $_REQUEST["iddon"];    
 
    $don = new Donacion();    
    $don->setId($iddon);
    $eliminar = $don->eliminar();

    echo "<script>alert('Donacion eliminada')
 document.location=('../vista/lista-donaciones.php')</script>";
}

function paypal()
{

require '../vista/config.php';

 
$producto = 'Paypal';
$cambio = $_POST['txtcant'] * 0.30;
$precio = $cambio;
$envio = 0;
$total = $precio + $envio;

$compra = new Payer();
$compra->setPaymentMethod('paypal');


$articulo = new Item();
$articulo->setName($producto)
      ->setCurrency('USD')
      ->setQuantity(1)
      ->setPrice($precio);
      
      
$listaArticulos = new ItemList();
$listaArticulos->setItems(array($articulo));
  
$detalles = new Details();
$detalles->setShipping($envio)
          ->setSubtotal($precio); 
          
          
$cantidad = new Amount();
$cantidad->setCurrency('USD')
          ->setTotal($total)
          ->setDetails($detalles);
          
$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
               ->setItemList($listaArticulos)
               ->setDescription('Pago')
               ->setInvoiceNumber(uniqid());
               

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "misdonaciones.php?exito=true")
              ->setCancelUrl(URL_SITIO . "misdonaciones.php?exito=false");
              
              
$pago = new Payment();
$pago->setIntent("sale")
     ->setPayer($compra)
     ->setRedirectUrls($redireccionar)
     ->setTransactions(array($transaccion));
     
     try {
       $pago->create($apiContext);
     } catch (PayPal\Exception\PayPalConnectionException $pce) {
       // Don't spit out errors or use "exit" like this in production code
       echo '<pre>';print_r(json_decode($pce->getData()));exit;
   }

$aprobado = $pago->getApprovalLink();


if($aprobado){

$cod = $_SESSION["cod"];
$camp = $_POST["camp"];
//$soles = "S/.";
$soles = $_POST['txtcant'];

    $don=new Donacion();    
    $don->setDescription($producto);
    $don->setQuantility($soles);   
    $don->setUserid($cod);
    $don->setCampaignid($camp);
    $don->setCatdon(5);
    $guardar=$don->guardar();

    header("Location: {$aprobado}");
}

if($aprobado){

  $camp = new Campania();
  $camp->setId($_POST["camp"]);
  $fila = $camp->getCampania();

  $nomcamp = $fila[1];
  $usercampania = $fila[2];


  $cod = $_SESSION["cod"];
  $nom = $_SESSION["usuario"];
  $des = " $nom ha hecho una donacion de S/. $soles para la campaña $nomcamp";



  $noti = new Notificacion();
  $noti->setDescription($des);
  $noti->setUserid($cod);
  $noti->setPara($usercampania);
  $noti->insertar(); 
}


}
   


 ?>