<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/detallecampania.php');
conectar();
session_start();
include('templates/validar.php');
?>

<!DOCTYPE html>
<html > 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Campañas Sociales</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/simple-sidebar.css" >
    <link rel="stylesheet" href="css/normalize.css"> 
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/colorbox.css">
    <link rel="stylesheet" href="css/jPages.css">
    <link rel="stylesheet" href="css/animate.css">
    
  
</head>

<body background="img/fondito1.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-voluntario.php"); ?>


<div id="page-content-wrapper">
    <div class="container-fluid">      

 <div class="panel panel-success"> 
  <div class="panel-heading"><h1 style="text-align:center;"><b>Sumate a las campañas</b></div>  
  </div>

        <form class="form-horizontal" name="form1" method="post" action="" data-toggle="validator">
         <div class="col-md-4"></div>        
         <div class="col-md-4">
          <div class="input-group">
           <span class="input-group-btn">
            
            <button class="btn btn-info" type="submit" name="submit" value="Buscar">Buscar</button>
            </span>
            <input type="text" name="busca" id="busca" class="form-control" placeholder="Ingresa el nombre de campaña" required>
          </div>
        </div>
        <div class="col-md-4"></div>
        </form>     


<?php 

if(!empty($_POST["busca"])){  
  $ca = new Campania();  
  $buscador = $ca->buscar($_POST["busca"]);

  $array3 = array();
  while($fila3 = $buscador->fetch_assoc()){
  $c =  array(
            'codigo' => $fila3['campaign_id'],
            'titulo' => $fila3['title'],
            'descripcion' => $fila3['description'],
            'imagen' => $fila3['imagen'],
            'lugar'  => $fila3['place'],
            'vacante'  => $fila3['vacant'],
            'inicio'  => $fila3['inicio'],
            'final'  => $fila3['final']);
            
  $array3[] = $c;
  }
 echo "<a class='btn btn-success' href='modulovoluntario.php'>volver</a>";
   
}
 ?>
          
          <section id="campanas" class="campanas contenedor seccion">

          <ul class="lista-campanas clearfix" id="itemContainer">               


<?php
                             
$cod = $_SESSION["cod"];             
                     
$campania = new Campania();                
$r1 = $campania->campanias();
                  
$campvol = new Detallecampania();
$campvol->setUserid($cod);
$r2 = $campvol->campaniasporvoluntario();

$array1 = array();
while($fila1 = $r1->fetch_assoc()){
$a =  array(
            'codigo' => $fila1['campaign_id'],
            'titulo' => $fila1['title'],
            'descripcion' => $fila1['description'],
            'imagen' => $fila1['imagen'],
            'lugar'  => $fila1['place'],
            'vacante'  => $fila1['vacant'],
            'inicio'  => $fila1['inicio'],
            'final'  => $fila1['final']);
            
$array1[] = $a;
}


$array2 = array();
while($fila2 = $r2->fetch_assoc()){
$b =   array(
            'codigo' => $fila2['campaign_id'],
            'titulo' => $fila2['title'],
            'descripcion' => $fila2['description'],
            'imagen' => $fila2['imagen'],
            'lugar'  => $fila2['place'],
            'vacante'  => $fila2['vacant'],
            'inicio'  => $fila2['inicio'],
            'final'  => $fila2['final']);
$array2[] = $b;
}



if(empty($_POST["busca"])){

  foreach ($array1 as $value1) {
    $encontrado=false;
    foreach ($array2 as $value2) {
       if ($value1 == $value2){
        $encontrado=true;                                     
       }
   }
    if ($encontrado == false){
          echo "<li>
                <div class='campana'>

          <a href='../controlador/campaniacontrolador.php?idcamp=".$value1["codigo"]."&&action=sumarse'><button class='btn btn-primary btn-block'>Sumarse</button></a>

         <a class='campana-info' href='#campana".$value1["codigo"]."'>
                            <img src='img/".$value1["imagen"]."' alt='Campaña1' width='400px' height='200px'>
                            <p>".$value1["titulo"]."</p>
                            </a>

                          </div>
                        </li>
                        <div style='display:none;'>
                          <div class='campana-info' id='campana".$value1["codigo"]."'>
                              <h2>".$value1["titulo"]."</h2>
                              <h3> <p>Lugar: ".$value1["lugar"]."</p></h3>
                              <img src='img/".$value1["imagen"]."' alt='Campaña1'>
                              <p>".$value1["descripcion"]."</p>
                              <p> Fecha de inicio :".$value1["inicio"]."</p>
                              <p> Fecha final :".$value1["final"]."</p>     
                              <p> Vacantes : ".$value1["vacante"]."</p>  
                              
                              <br/>
                                    
                          </div>

                        </div>";
    }
}

            

                }//fin if
                else{

    foreach ($array3 as $value3) {
    $encontrado=false;
    foreach ($array2 as $value2) {
       if ($value3 == $value2){
        $encontrado=true;                                     
       }
   }
    if ($encontrado == false){
          echo "<li>
                <div class='campana'>

          <a href='../controlador/campaniacontrolador.php?idcamp=".$value3["codigo"]."&&nomcamp=".$value3["titulo"]."&&action=sumarse'><button class='btn btn-primary btn-block'>Sumarse</button></a>

         <a class='campana-info' href='#campana".$value3["codigo"]."'>
                            <img src='img/".$value3["imagen"]."' alt='Campaña1' width='400px' height='200px'>
                            <p>".$value3["titulo"]."</p>
                            </a>

                          </div>
                        </li>
                        <div style='display:none;'>
                          <div class='campana-info' id='campana".$value3["codigo"]."'>
                              <h2>".$value3["titulo"]."</h2>
                              <h3> <p>Lugar: ".$value3["lugar"]."</p></h3>
                              <img src='img/".$value3["imagen"]."' alt='Campaña1'>
                              <p>".$value3["descripcion"]."</p>
                              <p> Fecha de inicio :".$value3["inicio"]."</p>
                              <p> Fecha final :".$value3["final"]."</p>     
                              <p> Vacantes : ".$value3["vacante"]."</p>  
                              
                              <br/>
                                    
                          </div>

                        </div>";
    }
}

                }//fin else
           

?>  
        </ul>
    </section>

    <center><div class="holder"></div></center>
                       
</div>
       
</div>

</div>   
 
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.colorbox-min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/main.js"></script>
<script src="js/jPages.js"></script>
<script src="js/validator.js"></script> 


<script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
</script> 

<script>
  
$(function(){
    $("div.holder").jPages({
      containerID  : "itemContainer",
      perPage      : 6,
      startPage    : 1,
      startRange   : 1,
      midRange     : 1,
      endRange     : 1,
      animation   : "bounceInUp"
    });
  });
</script>

</body>

</html>

