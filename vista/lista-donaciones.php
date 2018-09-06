<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/donacion.php');
conectar();
session_start();
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
</head>

<body background="img/fondito1.jpg">

<?php include("menutop.php"); ?>

<div id="wrapper">

<?php include("menu-admin.php"); ?>

<div id="page-content-wrapper">
        <div class="container-fluid">
                    
<form id="form1" name="form1" method="post" action="">
  <h4>Seleccione una campaña:</h4>
  <div class="col-md-2">
   <select class="form-control" name="cbocamp" id="cbocam"p onChange="submit()" >
    <option value="0" >Seleccione</option>     

<?php

$cod = $_SESSION["cod"];
$codcamp = $_SESSION["campania"]=@$_POST["cbocamp"];

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
</form>


    </br></br></br>        
    <h4>Donaciones recibidas : </h4>
    <div class="table-responsive">
    <table class="table table-hover" border="2" >
    <tr>
    <th style="text-align:center;">Nº</th>
    <th style="text-align:center;">Nombre</th>
    <th style="text-align:center;">Apellido</th>
    <th style="text-align:center;">Descripcion</th>
    <th style="text-align:center;">Cantidad</th>
    <th style="text-align:center;">Modificar</th>
    <th style="text-align:center;">Eliminar</th>
    </tr>    

<?php

$numeracion = 1;

$donacion = new Donacion();
$donacion->setCampaignid($codcamp);
$r = $donacion->donacionesporvoluntario();

if(empty($_GET['iddon'])){

}else {
    echo "<form action='../controlador/donacioncontrolador.php?iddon=".$_GET['iddon']."' method='post'>  ";
}

while($row=mysqli_fetch_array($r)){
    
echo "<tr><td align='center'>".$numeracion."</td>";

//Nombre voluntario
echo "<td align='center'>".$row["1"]."</td>";

//Apellido voluntario   
echo "<td align='center'>".$row["2"]."</td>";

//Nombre del producto
if(empty($_GET['iddon'])){
echo "<td align='center'>".$row["3"]."</td>";
}else {
  if ($_GET['iddon']==$row["0"]) {
    echo "<td align='center'>
          <input type='text' class='form-control' id='txtdes' name='txtdes' value='".$row["3"]."'>
          </td>";
  }else {
    echo "<td align='center'>".$row["3"]."</td>";
  }
}

//Cantidad
if(empty($_GET['iddon'])){
echo "<td align='center'>".$row["4"]."</td>";
}else {
  if ($_GET['iddon']==$row["0"]) {
    echo "<td align='center'>     
          <input type='number' class='form-control'  id='txtcant' name='txtcant' value='".$row["4"]."'>
          </td>";
  }else {
    echo "<td align='center'>".$row["4"]."</td>";
  }
}

//Modificar
if(empty($_GET['iddon'])){
echo "<td align='center'>
      <a class='btn btn-success' href='lista-donaciones.php?iddon=".$row["0"]."'>Modificar</a></td>";
}else {
  if ($_GET['iddon']==$row["0"]) {
    echo "<div class='form-group row'><td align='center'>
          
          <button type='submit' class='btn btn-warning' name='action' value='modificar'>Guardar</button>
          <a class='btn btn-info col-md-offset-1' href='lista-donaciones.php'>Cancelar</a></td></div>";
  }else {
    echo "<td align='center'><a class='btn btn-success' href='lista-donaciones.php?iddon=".$row["0"]."'>Modificar</a></td>";
  }
}

//Eliminar
echo "<td align='center'>
      <a class='btn btn-danger' href='../controlador/eliminardonacion.php?iddon=".$row["0"]."'>Eliminar</a></td></tr>";

    $numeracion++;

            }

if(empty($_GET['iddon'])){

}else {
echo "</form>";
}

?>
        </table>

</div>
           
</div>
       
</div>

</div>  
        
<footer></footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
    $("#wrapper").toggleClass("toggled");
        });
</script> 

</body>

</html>

