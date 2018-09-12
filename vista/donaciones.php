<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
require_once ('../modelo/detallecampania.php');
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

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>

<div id="page-content-wrapper">
    <div class="container-fluid">
                    
        <div class="header"> 
             <h1 class="page-header"> Donaciones </h1>  
        </div>  

  <form name="form2" class="form-horizontal" action="" method="post" >

      <div class="form-group">
          <label class="col-md-4 control-label" for="camp" >Para Campaña : </label>
          <div class="col-md-4">
          <select class="form-control" name="camp" id="camp" OnChange="submit()">
          <option value="0" >Seleccione</option>

         <?php    

          $cod = $_SESSION["cod"];
          $codcamp = $_POST["camp"];
          $codvol=$_POST["vol"];

          $campania = new campania();
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
      </div>

      <div class="form-group">
         <label class="col-md-4 control-label" for="vol" >De Voluntario : </label>
         <div class="col-md-4">
         <select class="form-control" name="vol" id="vol" OnChange="submit()">
         <option value="0" >Seleccione</option>

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
      </div>   
           
  </form>      
       
<?php  
    echo "<form class='form-horizontal' action='../controlador/donacioncontrolador.php?idcam=".$codcamp."&&idvol=".$codvol."' method='post' data-toggle='validator' > " 
?>               

    <div class="form-group">
          <label class="col-md-4 control-label" for="Descripcion" >Descripcion : </label>
          <div class="col-md-4">
          <input id="Descripcion" name="txtdes" type="text" placeholder="Descripcion" class="form-control input-md"  required>
          </div>
          <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
          <label class="col-md-4 control-label" for="Cantidad">Cantidad : </label>
          <div class="col-md-4">
          <input id="cantidad" name="txtcant" type="number" placeholder="Cantidad" class="form-control input-md"  required>
          </div>
           <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">
                                 
          <button class="btn btn-primary" block="true" type="submit" name="action" value="create"> Guardar </button>
          </div>
    </div>

     
    </form>                    
        
      </div>           
</div>
       
</div>        
    
<footer>      
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script> 

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
    $("#wrapper").toggleClass("toggled");
        });
</script>
 
</body>

</html>

