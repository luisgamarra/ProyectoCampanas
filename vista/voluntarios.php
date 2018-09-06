<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/detallecampania.php');
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
   <select class="form-control" name="cbocamp" id="cbocamp" onChange="submit()" >
    <option value="0" >-- Seleccione --</option>     

<?php

$cod = $_SESSION["cod"];
$codcamp =$_SESSION["camp"]=@$_POST["cbocamp"];

$campania = new Campania();
$campania->setUserid($cod);
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

    </br></br></br>
    <h4>Voluntarios inscritos : </h4>
    </br>
    <div class="table-responsive">
    <table class="table table-hover" border="2" >
    <tr>
    <th style="text-align:center;">Nº</th>
    <th style="text-align:center;">Nombre</th>
    <th style="text-align:center;">Apellido</th>
    <th style="text-align:center;">Email</th>
    <th style="text-align:center;">Celular</th>
    <th style="text-align:center;">Eliminar</th>
    </tr>    

<?php

    $numeracion = 1;

    $voluntario = new Detallecampania();
    $voluntario->setCampaignid($codcamp);
    $r = $voluntario->voluntariosporcampania();

    while($row=mysqli_fetch_array($r)){
    
    echo "<tr>
    <td align='center'>".$numeracion."</td>
    <td align='center'>".$row[0]."</td>
    <td align='center'>".$row[1]."</td>
    <td align='center'>".$row[2]."</td>
    <td align='center'>".$row[3]."</td>
    <td align='center'>
      <a class='btn btn-danger' href='../controlador/salircampania.php?idcamp=$codcamp&&idde=".$row["5"]."'>Eliminar</a></td>    
    </tr>";

    $numeracion++;
    }

?>

    </table>

</form>
  
    </div>
</div>
</div>  
           
<footer>        
</footer>
           
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

