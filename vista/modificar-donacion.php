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
<html > 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Campañas Sociales</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/notificacion.css"rel="stylesheet">     
    
</head>

<body background="img/fondito1.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>

<div id="page-content-wrapper">
   <div class="container-fluid">
                    
<div class="panel panel-info"> 
<div class="panel-heading"><h3 style="text-align:center;">Modifica el registro de donacion</h3></div>  
</div>   

      <?php 

      $iddon = $_REQUEST["iddon"];

      $don = new Donacion();
      $don->setId($iddon);
      $rd = $don->getDonacionbyCod();

      ?>
    
  <form name="form2" class="form-horizontal" action="" method="post" >

      <div class="form-group">
          <label class="col-md-4 control-label" for="camp" id="c">Para Campaña : </label>
          <div class="col-md-4">
          <select class="form-control" name="camp" id="camp" OnChange="submit()">
          

         <?php    

          $cod = $_SESSION["cod"];
          
          if($_POST["camp"] != ""){
          $codcamp = $_POST["camp"];
          }else{
            $codcamp = $rd[2];
          }

          if($_POST["vol"] != ""){
          $codvol=$_POST["vol"];
          }else{
            $codvol = $rd[1];
          }

          $campania = new campania();
          $campania->setUserid($cod);
          $r = $campania->campaniaporusuariomfechafinal();
          
          while($row=mysqli_fetch_array($r)){
          if($codcamp==$row[0]){
          echo "<option value='".$row[0]."' selected>".$row[1]."</option>";
          }else if($row[0] != $rd[2]){
          echo "<option value='".$row[0]."' >".$row[1]."</option>";   
          }else{
            echo " <option value=".$rd[2]." >".$rd[3]."</option>";
          }
          }
          ?>   

          </select>          
          </div>
         
      </div>

      <div class="form-group">
         <label class="col-md-4 control-label" for="vol" id="v">De Voluntario : </label>
         <div class="col-md-4">
         <select class="form-control" name="vol" id="vol" OnChange="submit()">
         

         <?php

         $voluntario = new detallecampania();
         $voluntario->setCampaignid($codcamp);
         $r = $voluntario->voluntariosporcampania();             

         while($row=mysqli_fetch_array($r)){
         if($codvol==$row[4]){
          echo "<option value='".$row[4]."' selected>".$row[1]."</option>";
          }else if($row[4] != $rd[1]){
          echo "<option value='".$row[4]."' >".$row[1]."</option>";   
          }else{
             echo " <option value=".$rd[1]." >".$rd[5]."</option>";
          }
          }
          ?>      
          </select>
          </div>
          
      </div>   
           
  </form>      
       
<?php  
    echo "<form class='form-horizontal' action='../controlador/donacioncontrolador.php?idcamp=".$codcamp."&&idvol=".$codvol."' method='post' data-toggle='validator' > " 
?>               

                   <input type="hidden" name="txtcod" value="<?=$rd[0]?>">

    <div class="form-group">
         <label class="col-md-4 control-label" for="cate" id="v">Categoria : </label>
         <div class="col-md-4">
         <select class="form-control" name="cate" id="cate" required=>
         <option value="<?=$rd[8]?>" ><?=$rd[9]?></option>

         <?php

         $cate=$_POST["cate"];

         $sql = "SELECT * from categoria_donacion";
         $r = ejecutar($sql);        

         while($row=mysqli_fetch_array($r)){
         if($cate==$row[0]){
          echo "<option value='".$row[0]."' selected>".$row[1]."</option>";
          }if ($row[0] != $rd[8]){
          echo "<option value='".$row[0]."' >".$row[1]."</option>"; 

          }
          }
          ?>      
          </select>
          </div>
          <div class="help-block with-errors"></div>

      </div>                         

    <div class="form-group">
          <label class="col-md-4 control-label" for="Descripcion" >Descripcion : </label>
          <div class="col-md-4">
          <input id="des" name="txtdes" type="text" placeholder="Descripcion" class="form-control input-md"  value="<?=$rd[6]?>" required>
          </div>
          <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
          <label class="col-md-4 control-label" for="cant">Cantidad : </label>
          <div class="col-md-4">
          <input id="cant" name="txtcant" type="text" onkeypress='return validaNumericos(event)' placeholder="Cantidad" class="form-control input-md" value="<?=$rd[7]?>" required>
          </div>
           <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">
                                 
        <button id="boton" class="btn btn-success" block="true" type="submit" name="action" value="modificar"> Actualizar </button>
        <a class='btn btn-info' href='lista-donaciones.php'>Cancelar</a>
          </div>
    </div>

     
    </form>                    

  </br>

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


<script >
function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}
</script>
</body>

</html>

