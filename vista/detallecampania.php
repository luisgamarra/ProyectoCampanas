<?php
require_once ('../modelo/conexion.php');
require_once ('../modelo/campania.php');
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body background="img/fondito1.jpg">

<?php include("menutop.php"); ?>

<div id="wrapper">

<?php include("menu-admin.php"); ?>
 
<div id="page-content-wrapper">
                <div class="container-fluid">                 
     
                <div class="table-responsive">        
                  <table class="table table-hover"  border="2" >
                  <tr>
                  <th style="text-align:center;">N°</th>
                  <th style="text-align:center;">Nombre</th>
                  <th style="text-align:center;">Lugar</th>
                  <th style="text-align:center;">Vacantes</th>
                  <th style="text-align:center;">Fecha Inicial</th>
                  <th style="text-align:center;">Fecha Final</th>               
                  <th style="text-align:center;">Editar</th>
                  <th style="text-align:center;">Eliminar</th>
                  </tr>

<?php               
          
          $cod = $_SESSION["cod"];           

          $campania = new Campania();
          $campania->setUserid($cod);
          $r = $campania->campaniaporusuario();
                
          $numeracion=1;

if(empty($_GET['idcamp'])){

}else {
    echo "<form action='../controlador/campaniacontrolador.php?idcamp=".$_GET['idcamp']."' method='post'>";
}


while ($row = mysqli_fetch_array($r)) {

echo "<tr><td align='center'>".$numeracion."</td>";

//Titulo
if(empty($_GET['idcamp'])){
echo "<td align='center'>".$row["1"]."</td>";
}else {
  if ($_GET['idcamp']==$row["0"]) {
    echo "<td align='center'>          
          <input align='right' type='text' class='form-control' id='txtitle' name='txtitle' value='".$row["1"]."'>
          </td>";
  }else {
    echo "<td align='center'>".$row["1"]."</td>";
  }
}

//Lugar
if(empty($_GET['idcamp'])){
echo "<td align='center'>".$row["3"]."</td>";
}else {
  if ($_GET['idcamp']==$row["0"]) {
    echo "<td align='center'>
          <input type='text' class='form-control' id='txtplace' name='txtplace' value='".$row["3"]."'>
          </td>";
  }else {
    echo "<td align='center'>".$row["3"]."</td>";
  }
}

//Vacantes
if(empty($_GET['idcamp'])){
echo "<td align='center'>".$row["4"]."</td>";
}else {
  if ($_GET['idcamp']==$row["0"]) {
    echo "<td align='center'>
          <input type='text' class='form-control' id='txtvacant' name='txtvacant' value='".$row["4"]."'>
          </td>";
  }else {
    echo "<td align='center'>".$row["4"]."</td>";
  }
}

//Fecha inicial
if(empty($_GET['idcamp'])){
echo "<td align='center'>".$row["5"]."</td>";
}else {
  if ($_GET['idcamp']==$row["0"]) {
    echo "<td align='center'>
        <input type='date' class='form-control'  id='txtfecha1' name='txtfecha1' value='".$row["5"]."'>
        </td>";
  }else {
    echo "<td align='center'>".$row["5"]."</td>";
  }
}

//Fecha Final
if(empty($_GET['idcamp'])){
echo "<td align='center'>".$row["6"]."</td>";
}else {
  if ($_GET['idcamp']==$row["0"]) {
    echo "<td align='center'>
          <input type='date' class='form-control'  id='txtfecha2' name='txtfecha2' value='".$row["6"]."'>
          </td>";
  }else {
    echo "<td align='center'>".$row["6"]."</td>";
  }
}

//Modificar
if(empty($_GET['idcamp'])){
echo "<td align='center'><a class='btn btn-success' href='detallecampania.php?idcamp=".$row["0"]."'>Modificar</a></td>";
}else {
  if ($_GET['idcamp']==$row["0"]) {
    echo "<td align='center'>
          <input type='hidden' value='modificar' name='action'/>  
          <input class='btn btn-warning' id='modificar' type='submit' value='Guardar' name='btnenviar'>
          <a class='btn btn-info' href='detallecampania.php'>Cancelar</a></td></div>";
  }else {
    echo "<td align='center'><a class='btn btn-success' href='detallecampania.php?idcamp=".$row["0"]."'>Modificar</a></td>";
  }
}

//Eliminar
echo "<td align='center'>
      <a class='btn btn-danger' href='../controlador/eliminarcampania.php?idcamp=".$row["0"]."'>Eliminar</a></td></tr>";
           
$numeracion++;

}

if(empty($_GET['idcamp'])){

}else {
  echo "</form>";
}
               
?>               
                
                </table>                  
              </div>

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

