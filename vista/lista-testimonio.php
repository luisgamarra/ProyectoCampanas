<?php
require_once ('../db/conexion.php');
require_once('../modelo/testimonio.php');
 conectar();

session_start();
include('templates/validar.php');
?>

<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Campañas Sociales</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/simple-sidebar.css" >
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/remodal.css">
    <link rel="stylesheet" href="css/remodal-default-theme.css">
    <link rel="stylesheet" href="css/jPages.css">
    <link rel="stylesheet" href="css/animate.css">


   
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-voluntario.php"); ?>

<div id="page-content-wrapper">
      <div class="container-fluid">                    
          

<div class="panel panel-success"> 
<div class="panel-heading"><h1 style="text-align:center;"><b>Testimonios</b></div>  
 </div>
           
  <div class="col-md-5"></div>
  <a href='#modalregistrotest'><button class='btn btn-primary'>Agregar Testimonio</button></a>
  <?php include('registrotestimonio.php') ?>

  <form class="form-horizontal" name="form1" method="post" action="" data-toggle="validator">
  </br>
  <div class="col-md-4"></div>        
  <div class="col-md-4">
  <div class="input-group">
  <span class="input-group-btn">       
  <button class="btn btn-info" type="submit" name="submit" value="Buscar">Buscar</button>
  </span>
  <input type="text" name="busca" id="busca" class="form-control" placeholder="Ingresa un nombre del voluntario" required>
  </div>
  <div class="help-block with-errors"></div>
  </div>

  <div class="col-md-4"></div> 

  <?php 
  if(!empty($_POST["busca"])){
  
  $test = new Testimonio(); 
  $r1 = $test->buscartestimonio($_POST["busca"]);
  echo "<a class='btn btn-success' href='lista-testimonio.php'>volver</a>";   
  }
  ?>
  </form>


<div class="container" id="itemContainer">
</br></br></br>
  <?php 
  $cod = $_SESSION["cod"];

  $test = new Testimonio();
  $r = $test->listartestimonios();
  ?>           


  <?php 
  if(empty($_POST["busca"])){

    while ($row = mysqli_fetch_array($r)) {

      echo "<div class='col-md-4 col-sm-6 hero-feature'>
            <div class='w3-container'>
                <div class='w3-card-4' style='background-color:#0EA7F3'>
                    <img src='img/".$row[4]."' alt='Norway' width='100%' height='200'>
                    <div class='w3-container w3-center' >
                        <br/>
                       <center><h6 class='card-subtitle mb-2 text-muted' style='color:white'>".$row[2]." ".$row[3]."</h6> </center>
                        <p><i>“".$row[1]."”</i></p>
                        ";
    if($row[5] == $cod){
        echo "<a href='#modal".$row[0]."'><button class='btn btn-success'>Editar</button></a>";
        echo " <a class='btn btn-danger' onclick='return Confirmation()' href='../controlador/testimoniocontrolador.php?testid=".$row[0]."&&action=eliminar'>Eliminar</a>";
                       include ('modificar-testimonio.php');
        }

        echo "<br/><br/>
                    </div>
                </div>
            </div>
            <br/>
        </div>";
                     
                    }
}else{

while ($row = mysqli_fetch_array($r1)) {

  echo "<div class='col-md-4 col-sm-6 hero-feature'>
            <div class='w3-container'>
                <div class='w3-card-4' style='background-color:#0EA7F3'>
                    <img src='img/".$row[4]."' alt='Norway' width='100%' height='200'>
                    <div class='w3-container w3-center' >
                        <br/>
                       <center><h6 class='card-subtitle mb-2 text-muted' style='color:white'>".$row[2]." ".$row[3]."</h6> </center>
                        <p>".$row[1]."</p>
                        ";
   if($row[5] == $cod){
      echo "<a href='#modal".$row[0]."'><button class='btn btn-success'>Editar</button></a>";
      echo "<a class='btn btn-danger' onclick='return Confirmation()' href='../controlador/testimoniocontrolador.php?testid=".$row[0]."&&action=eliminar'>Eliminar</a>";
                       include ('modificar-testimonio.php');
                      
      }

    echo"<br/> <br/>
                    </div>
                </div>
            </div>
            <br/>
        </div>";
                     
                    }
  }

  ?>

</div>             
              

<center><div class="holder"></div></center>

</div>
</div>

</div>            
    
<footer>
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script> 
<script src="js/remodal.js"></script>
<script src="js/jPages.js"></script>


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
<script type="text/javascript">
function Confirmation() {
 
  if (confirm('Esta seguro de eliminar el registro?')==true) {
      
      return true;
  }else{
      //alert('Cancelo la eliminacion');
      return false;
  }
}
</script>
 


</body>

</html>

