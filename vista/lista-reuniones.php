<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/reunion.php');
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

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/jPages.css" rel="stylesheet" >
    <link href="css/notificacion.css" rel="stylesheet" >       

</head>

<body background="img/fondito1.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>    

<div id="page-content-wrapper">
    <div class="container-fluid">
 
<div class="panel panel-primary"> 
<div class="panel-heading" style="text-align:center;"><h2>Registros de reuniones</h2></div>

<form class="form-horizontal" id="form1" name="form1" method="post" action="">
  <div class="form-group">
    </br>
   <label class="col-md-5 control-label" for="camp" >Elige Campaña : </label>
   <div class="col-md-2">
   <select class="form-control" name="cbocamp" id="cbocamp" onChange="submit()" >
   <option value="0" >-- Seleccione --</option>     

   <?php

    $cod = $_SESSION["cod"];
    $codcamp =$_POST["cbocamp"];

    $campania = new Campania();
    $campania->setUserid($cod);
    $r = $campania->campaniaporusuariomfechafinal();

    while($row=mysqli_fetch_array($r)){
    if($codcamp==$row[0]){
    echo "<option value='".$row[0]."' selected>".$row[1]."</option>";
    }else{
    echo "<option value='".$row[0]."' >".$row[1]."</option>";   
    }
    }
    ?>
    </select>
   </div>
   </div>
   </form>
    
    <center><h4>Reuniones : </h4></center>    

    <center><div class="holder"></div></center>

    <?php  
    if( $codcamp != 0){
    echo "
    <div class='table-responsive'>
    <table class='table table-hover' border='0' >
    <tr bgcolor='#F3F00E'>
    <th style='text-align:center;''>Nº</th>
    <th style='text-align:center;'>Asunto</th>
    <th style='text-align:center;'>Fecha</th>
    <th style='text-align:center;'>Hora</th>
    <th style='text-align:center;'>Campaña</th>
    <th style='text-align:center;'>Modificar</th>
    <th style='text-align:center;'>Eliminar</th>        
    </tr>";}

    echo "<tbody id='reu'>";

    $numeracion = 1;

    $reunion = new Reunion();
    $reunion->setCampaignid($codcamp);
    $r = $reunion->reunionporcampania();

    while($row=mysqli_fetch_array($r)){
    
    echo "<tr bgcolor='white'>
    <td align='center'>".$numeracion."</td>
    <td align='center'>".$row[1]."</td>
    <td align='center'>".$row[2]."</td>
    <td align='center'>".$row[3]."</td>
    <td align='center'>".$row[4]."</td>
    <td align='center'>
      <a class='btn btn-success' href='modificar-reunion.php?idreu=".$row["0"]."'>Modificar</a></td>
   <td align='center'>
      <a class='btn btn-danger' onclick='return Confirmation()' href='../controlador/reunioncontrolador.php?idreu=".$row["0"]."&&action=eliminar'>Eliminar</a></td></tr>";

    $numeracion++;
    }

    ?>
    </tbody>
    </table>

</div>
  
</div>
</div>
</div>  
           
<footer>        
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
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
      containerID : "reu",
      previous : "←",
      next : "→",
      perPage : 4,
      delay : 20
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

<?php 
include('templates/notificacion.php');
 ?>

</body>

</html>

