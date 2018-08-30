<?php
require_once ('../modelo/conexion.php');
require_once ('../modelo/user.php');
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

<body>

<?php include("menutop.php"); ?>

<div id="wrapper">

<?php

    $tipo =@$_SESSION['tipo'];
    if( $tipo == "1"){
        include("menu-admin.php"); 
    }else{
        include("menu-voluntario.php"); 
    }
?>

<div id="page-content-wrapper">
    <div class="container-fluid">
                    
      <div class="header"> 
             <h1 class="page-header"> Mi perfil  </h1>           
      </div>          

<form class="form-horizontal" action="../controlador/usuariocontrolador.php" method="post" enctype="multipart/form-data">

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
          <input type="file" name="txtphoto" id="photo"/>
          </div>
        </div>

       <div class="form-group">
          <label class="col-md-4 control-label" for="Nombre" >Nombre : </label>
          <div class="col-md-4">
          <input value="<?=$r[1]?>" id="Nombre" name="txtnom" type="text" class="form-control input-md " required="">
          </div>
       </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="Apellido" >Apellido : </label>
          <div class="col-md-4">
          <input value="<?=$r[2]?>" id="Apellido" name="txtape" type="text" class="form-control input-md " required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="Email" >Email : </label>
          <div class="col-md-4">
          <input value="<?=$r[3]?>" id="Email" name="txtemail" type="text" class="form-control input-md " required="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="Apellido" >Apellido : </label>
          <div class="col-md-4">                 
          <input value="<?=$r[5]?>" id="Celular" name="txtcel" type="text"  class="form-control input-md " required="">
          </div>
        </div>       


        <div class="form-group">           
          <div class="col-md-4"></div>
           <div class="col-md-2">
                                     
            <?php 
                if( $tipo == "1"){            
                    echo "<a class='btn btn-info col-md-offset-1' href='ListaCampania.php'>Cancelar</a>";}
                else{
                    echo "<a class='btn btn-info col-md-offset-1' href='modulovoluntario.php'>Cancelar</a>";
                }            
                 ?>
            </div>

            <div class="col-md-2">
            <input type="hidden" value="modificar" name="action"/>                            
            <button class="btn btn-success" block="true" type="submit" value="modificar"> Guardar Cambios </button>
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

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
    $("#wrapper").toggleClass("toggled");
        });
</script>

</body>

</html>

