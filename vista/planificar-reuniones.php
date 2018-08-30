<?php
require_once ('../modelo/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/reunion.php');
conectar();
session_start();
?>

<!DOCTYPE html>
<html > 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Campañas Sociales</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">    
</head>

<body>

<?php include("menutop.php"); ?>

<div id="wrapper">

<?php include("menu-admin.php"); ?>

<div id="page-content-wrapper">
   <div class="container-fluid">
                    
      <div class="header"> 
         <h1 class="page-header"> Reuniones </h1>           
      </div>   
    
  <form class="form-horizontal" action="../controlador/reunioncontrolador.php" method="post">      
                            
        <!-- Text input-->
        <div class="form-group" >
          <label class="col-md-4 control-label" for="asunto" >Asunto : </label>
          <div class="col-md-4" >
          <input id="asunto" name="txtasunto" type="text" placeholder="Asunto" class="form-control input-md" required="">
          </div>
        </div>        

        <div class="form-group">
          <label class="col-md-4 control-label" for="fecha" >Fecha : </label>
          <div class="col-md-4">
          <input id="fecha" name="txtfecha" type="date" placeholder="Fecha" class="form-control input-md"  required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="camp" >Para Campaña : </label>
          <div class="col-md-4">
          <select class="form-control" name="camp" id="camp">
         <option value="0" >-- Seleccione --</option>

         <?php    

          $cod = $_SESSION["cod"];
          $codcamp=$_SESSION["cam"]=@$_POST["camp"];

          $campania = new Campania();
          $campania->setId($cod);
          $r = $campania->campaniaporusuario();  
          
          while($row=mysqli_fetch_array($r)){
          if($codcamp == $row[0]){
          echo "<option value='".$row[0]."' selected>".$row[1]."</option>";
          }else{
          echo "<option value='".$row[0]."' >".$row[1]."</option>";   
          }
          }
          ?>      
          </select>
          </div>
        </div>     
          
        <!-- Button -->
        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">
          <input type="hidden" value="create" name="action"/>                            
          <button class="btn btn-primary" block="true" type="submit" value="create"> Guardar </button>
          </div>
        </div>

  </form>    

  </br>

    <div class="table-responsive">
    <table class="table table-striped" border="2" >
    <tr>
    <th style="text-align:center;">Nº</th>
    <th style="text-align:center;">Asunto</th>
    <th style="text-align:center;">Fecha</th>
    <th style="text-align:center;">Campaña</th>
    <th style="text-align:center;">Modificar</th>
    <th style="text-align:center;">Eliminar</th>        
    </tr>    

<?php

$numeracion = 1;

$cod = $_SESSION["cod"];
           
$reunion = new Reunion();
$reunion->setUserid($cod);
$r = $reunion->reunionporusuario();
           
if(empty($_GET['idreu'])){

}else {
    echo "<form action='../controlador/reunioncontrolador.php?idreu=".$_GET['idreu']."' method='post'>";
}

while ($row = mysqli_fetch_array($r)) {

echo "<tr><td align='center'>".$numeracion."</td>";

//Asunto
if(empty($_GET['idreu'])){
    echo "<td align='center'>".$row["1"]."</td>";
}else {
  if ($_GET['idreu']==$row["0"]) {
    echo "<td align='center'>
          <input type='text' id='txtasunto' class='form-control' name='txtasunto' value='".$row["1"]."'>
          </td>";
  }else {
    echo "<td align='center'>".$row["1"]."</td>";
  }
}

//Fecha
if(empty($_GET['idreu'])){
echo "<td align='center'>".$row["2"]."</td>";
}else {
  if ($_GET['idreu']==$row["0"]) {
    echo "<td align='center'>
          <input type='date' id='txtfecha' class='form-control' name='txtfecha' value='".$row["2"]."'>
          </td>";
  }else {
    echo "<td align='center'>".$row["2"]."</td>";
  }
}

//Campania
echo "<td align='center'>".$row["3"]."</td>";

//Modificar
if(empty($_GET['idreu'])){
    echo "<td align='center'>
          <a class='btn btn-success' href='planificar-reuniones.php?idreu=".$row["0"]."'>Modificar</a></td>";
}else {
  if ($_GET['idreu']==$row["0"]) {
    echo "<div class='form-group row'><td align='center'>
          <input type='hidden' value='modificar' name='action'/>  
          <input class='btn btn-warning' id='modificar' type='submit' value='Guardar' name='btnenviar'>
          <a class='btn btn-info col-md-offset-1' href='planificar-reuniones.php'>Cancelar</a></td></div>";
  }else {
    echo "<td align='center'><a class='btn btn-success' href='planificar-reuniones.php?idreu=".$row["0"]."'>Modificar</a></td>";
  }

}

//Eliminar
echo "<td align='center'>
      <a class='btn btn-danger' href='../controlador/eliminareunion.php?idreu=".$row["0"]."'>Eliminar</a></td></tr>";

                
    $numeracion++;

}

if(empty($_GET['idreu'])){

}else {
    echo "</form>";    
}

?>             

       </table>                                  
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

