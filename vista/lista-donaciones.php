<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/detallecampania.php');
require_once ('../modelo/donacion.php');
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
         <link rel="stylesheet" href="css/jPages.css">

</head>

<body background="img/fondito1.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>

<div id="page-content-wrapper">
        <div class="container-fluid">
                    
<form id="form1" name="form1" method="post" action="">
  <h4>Seleccione una campaña:</h4>
  <div class="col-md-2">
   <select class="form-control" name="cbocamp" id="cbocamp" onChange="submit()" >
    <option value="0" >-- Seleccione --</option>     

<?php

$cod = $_SESSION["cod"];
$codcamp = $_POST["cbocamp"];
 $codvol=$_POST["vol"];

$campania = new Campania();
$campania->setuserid($cod);
$r = $campania->campaniaporusuario();

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

<br/><br/>
  <h4>Seleccione un voluntario:</h4>
  <div class="col-md-2">
         <select class="form-control" name="vol" id="vol" OnChange="submit()">
         <option value="0" >--Seleccione--</option>

         <?php

         $voluntario = new detallecampania();
         $voluntario->setCampaignid($codcamp);
         $r = $voluntario->voluntariosporcampania();             

         while($row=mysqli_fetch_array($r)){
         if($codvol==$row[4]){
          echo "<option value='".$row[4]."' selected>".$row[1]."</option>";
          }else{
          echo "<option value='".$row[4]."' >".$row[1]."</option>";   
          }
          }
          ?>      
          </select>
          </div>
        
</form>


    </br></br></br>        
    <h4>Donaciones recibidas : </h4>

<div class='holder'></div>
    

<?php

$numeracion = 1;

$donacion = new Donacion();
$donacion->setCampaignid($codcamp);
$r1 = $donacion->donacionesporcampania();

$donxvol = new Donacion();
$donxvol->setCampaignid($codcamp);
$donxvol->setuserid($codvol);
$r2 = $donxvol->donacionporvoluntario();

if($codcamp != 0 and $codvol == 0){

  echo "<div class='table-responsive'>
    <table class='table table-hover' border='2' >
    <tr bgcolor='#0EF381'>
    <th style='text-align:center;'>Nº</th>
    <th style='text-align:center;'>Nombre</th>
    <th style='text-align:center;'>Apellido</th>
    <th style='text-align:center;'>Descripcion</th>
    <th style='text-align:center;'>Cantidad</th>
    <th style='text-align:center;'>Modificar</th>
    <th style='text-align:center;'>Eliminar</th>
    </tr>    ";

echo "<tbody id='don'>";

while($row=mysqli_fetch_array($r1)){

  
    
    echo "<tr bgcolor='white'>
    <td align='center'>".$numeracion."</td>
    <td align='center'>".$row[1]."</td>
    <td align='center'>".$row[2]."</td>
    <td align='center'>".$row[3]."</td>
    <td align='center'>".$row[4]."</td>
    <td align='center'>
      <a class='btn btn-success' href='modificar-donacion.php?iddon=".$row["0"]."'>Modificar</a></td>
   <td align='center'>
      <a class='btn btn-danger' href='../controlador/donacioncontrolador.php?iddon=".$row["0"]."&&action=eliminar'>Eliminar</a></td></tr>";

    $numeracion++;
    }
echo "</tbody></table";

 } elseif ($codcamp != 0 and $codvol != 0) {



  echo "<div class='table-responsive'>
    <table class='table table-hover' border='2' >
    <tr bgcolor='#0EF381'>
    <th style='text-align:center;'>Nº</th>
    <th style='text-align:center;'>Nombre</th>
    <th style='text-align:center;'>Apellido</th>
    <th style='text-align:center;'>Descripcion</th>
    <th style='text-align:center;'>Cantidad</th>
    <th style='text-align:center;'>Modificar</th>
    <th style='text-align:center;'>Eliminar</th>
    </tr>    ";
   echo "<tbody id='don'>";
   while($row=mysqli_fetch_array($r2)){
    
    echo "<tr bgcolor='white'>
    <td align='center'>".$numeracion."</td>
    <td align='center'>".$row[1]."</td>
    <td align='center'>".$row[2]."</td>
    <td align='center'>".$row[3]."</td>
    <td align='center'>".$row[4]."</td>
    <td align='center'>
      <a class='btn btn-success' href='modificar-donacion.php?iddon=".$row["0"]."'>Modificar</a></td>
   <td align='center'>
      <a class='btn btn-danger' onclick='return Confirmation()' href='../controlador/donacioncontrolador.php?iddon=".$row["0"]."&&action=eliminar'>Eliminar</a></td></tr>";

    $numeracion++;
    }
    echo "</tbody></table";

 }



?>


</div>
           
</div>
       
</div>

</div>  
        
<footer></footer>
           
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
      containerID : "don",
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

</body>

</html>

