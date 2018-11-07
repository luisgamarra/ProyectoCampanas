<?php
require_once ('../db/conexion.php');
require_once ('../modelo/user.php');
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
    <link href="css/notificacion.css" rel="stylesheet" >        
   
</head>

<body background="img/fondito1.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php

    $tipo =@$_SESSION['tipo'];
    if( $tipo == "1"){
        include("templates/menu-admin.php"); 
    }else{
        include("templates/menu-voluntario.php"); 
    }
?>

<div id="page-content-wrapper">
    <div class="container-fluid">
                    
<div class="panel panel-primary"> 
<div class="panel-heading"><h3 style="text-align:center;">Mi Perfil</h3></div>  
</div>         

<form class="form-horizontal" action="../controlador/usuariocontrolador.php" method="post" enctype="multipart/form-data" data-toggle="validator">

  <?php

    $cod = $_SESSION["cod"];           
            
    $usuario = new User();
    $usuario->setId($cod);
    $r = $usuario->getUserbyCode();
            
    ?>      
        <div class="form-group">
            <div class="col-md-4"></div>    
            <div class="col-md-4">
               <?php   echo "<center><img src='img/".$r["6"]."' alt='Norway' width='50%' height='50%'></center> ";                       
                 ?>               
            </div>            
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="photo" >Foto : </label>
          <div class="col-md-4">          
          <input type="file" name="txtphoto" id="photo" onchange="validarFile(this);"  />
          <input value="<?=$r[6]?>" type="hidden" name="himage" />
          </div>
        </div>

       <div class="form-group">
          <label class="col-md-4 control-label" for="Nombre" >Nombre : </label>
          <div class="col-md-4">
          <input value="<?=$r[1]?>" id="Nombre" name="txtnom" type="text" class="form-control input-md" required>         
          </div>
          <div class="help-block with-errors"></div>
       </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="Apellido" >Apellido : </label>
          <div class="col-md-4">
          <input value="<?=$r[2]?>" id="Apellido" name="txtape" type="text" class="form-control input-md" required>         
          </div>
          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="Email" >Email : </label>
          <div class="col-md-4">
          <input value="<?=$r[3]?>" id="Email" name="txtemail" type="text" class="form-control input-md " required>         
          </div>
          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="celular" >Celular : </label>
          <div class="col-md-4">                 
          <input value="<?=$r[5]?>" id="Celular" name="txtcel" type="text"  class="form-control input-md " onkeypress='return validaNumericos(event)' required>         
          </div>
          <div class="help-block with-errors"></div>
        </div>       


        <div class="form-group">           
          <div class="col-md-4"></div>
           <div class="col-md-2">
                                     
            <?php 
                if( $tipo == "1"){            
                    echo "<a class='btn btn-info col-md-offset-1' href='listacampania.php'>Cancelar</a>";}
                else{
                    echo "<a class='btn btn-info col-md-offset-1' href='modulovoluntario.php'>Cancelar</a>";
                }            
                 ?>
            </div>

            <div class="col-md-2">
                                       
            <button id="cambiar" class="btn btn-success" block="true" type="submit" name="action" value="modificar" > Guardar Cambios </button>
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

<script >
function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}
</script>

<script>
  function validarFile(all)
{
    //EXTENSIONES Y TAMANO PERMITIDO.
    var extensiones_permitidas = [".png",".jpg", ".jpeg", ];
    //var tamano = 8; // EXPRESADO EN MB.
    var rutayarchivo = all.value;
    var ultimo_punto = all.value.lastIndexOf(".");
    var extension = rutayarchivo.slice(ultimo_punto, rutayarchivo.length);
    if(extensiones_permitidas.indexOf(extension) == -1)
    {
        alert("Extensión de archivo no valida");
        document.getElementById(all.id).value = "";
        return; // Si la extension es no válida ya no chequeo lo de abajo.
    }}
</script>

      <?php 
include('templates/notificacion.php');
 ?>



</body>

</html>

