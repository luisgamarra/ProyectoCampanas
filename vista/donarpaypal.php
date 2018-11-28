<?php
require_once ('../db/conexion.php');
require_once ('../modelo/detallecampania.php');
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

    
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-voluntario.php"); ?>

<div id="page-content-wrapper">
    <div class="container-fluid">

<div class="panel panel-success"> 
<div class="panel-heading"><h1 style="text-align:center;"><b>Haz tu aporte economico via Paypal</b></div>     
</br>    
       
            
          <form class="form-horizontal" action="../controlador/donacioncontrolador.php" method="post" data-toggle='validator'>

          <div class="form-group">
          <label class="col-md-4 control-label" for="camp" >Campaña : </label>
          <div class="col-md-4">
          <select class="form-control" name="camp" id="camp" required >
          <option value="" >-- Seleccione --</option>

         <?php    

          $cod = $_SESSION["cod"];
          $codcamp=$_POST["camp"];

          $campania = new Detallecampania();
          $campania->setUserid($cod);
          $rc = $campania->campaniasporvoluntariomfechafinal();  
          
          while($row=mysqli_fetch_array($rc)){
          if($codcamp == $row[5]){
          echo "<option value='".$row[5]."' selected>".$row[0]."</option>";
          }else{
          echo "<option value='".$row[5]."' >".$row[0]."</option>";   
          }
          }
          ?>      
          </select>
          
        </div>
        <div class="help-block with-errors"></div>
        </div>
                    
                      
          <div class="form-group">
          <label class="col-md-4 control-label" for="cant" >Cantidad : </label>
          <div class="col-md-2">
          <input id="cant" name="txtcant" type="text" placeholder="cantidad" class="form-control input-md" onkeypress="return filterFloat(event,this);" required>
          <span class="help-block">La cantidad que estas ingresando es soles (S/.)</span>
          </div>

          <div class="help-block with-errors"></div>
          </div>
                    
          <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">
                                 
          <button  block="true" type="submit" name="action" value="paypal"> <img src="img/donpa.png" width="100px"> </button>
          <a class='btn btn-info' href='misdonaciones.php'>Cancelar</a>
          </div>
          </div>       
        
          </form>
       
</div>


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

<script type="text/javascript">
<!--
function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;    
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{       
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {     
              return true;              
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{       
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }
    
}
</script>


</body>

</html>
