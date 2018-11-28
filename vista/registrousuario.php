<?php 
header( 'X-Content-Type-Options: nosniff' );
header( 'X-Frame-Options: SAMEORIGIN' );
header( 'X-XSS-Protection: 1;mode=block' );
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
    <link rel="stylesheet" href="css/main.css">
</head>

<body background="img/registro.jpg">

<nav class="navbar navbar-default" style="background-color: #da273e;">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php" style="color:#FFFFFF">Sistema de Campañas Sociales</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php" style="color: #FFFFFF">Iniciar Sesión</a></li>
            <li class="active"><a href="registrousuario.php" style="color:#FFFFFF">Regístrate</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->

      </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <form class="form-horizontal" action="../controlador/usuariocontrolador.php" data-toggle="validator" method="post">
       
        <legend>Regístrate</legend>       

        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Nombre" >Nombre</label>
          <div class="col-md-4">
          <input id="Nombre" name="txtnom" type="text" placeholder="Nombre" class="form-control input-md" data-error="completa tu nombre" required>
          <div class="help-block with-errors"></div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Apellido" >Apellidos</label>
          <div class="col-md-4">
          <input id="Apellido" name="txtape" type="text" placeholder="Apellido" class="form-control input-md" data-error="completa tu apellido" required>
          <div class="help-block with-errors"></div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Email" >Correo Electrónico</label>     
          <div class="col-md-4">      
          <input id="Email" name="txtcorreo" type="email" placeholder="Correo Electrónico" class="form-control input-md" 
          data-error="correo invalido ej:luis@gmail.com" required>
           <div class="help-block with-errors"></div>  
           </div>        
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Contrasena" >Contraseña</label>
          <div class="col-md-4">
          <input id="Contrasena" name="txtclave" type="password" placeholder="Contraseña" class="form-control input-md" data-minlength="6" autocomplete="off" required>
          <div class="help-block">Mínimo de seis (6) digitos</div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="cc" >Confirma Contraseña</label>
          <div class="col-md-4">
          <input id="cc" name="txtrc" type="password" placeholder="Repite contraseña" class="form-control input-md" 
          data-match="#Contrasena" data-match-error="escribe la misma contraseña" required>
          <div class="help-block with-errors"></div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="celular" >Celular</label>
          <div class="col-md-4">
          <input id="celular" name="txtcel" type="text"  onkeypress='return validaNumericos(event)' placeholder="Celular" class="form-control input-md" data-error="Introduce tu celular" required>
          <div class="help-block with-errors"></div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-sm-4 control-label" for="tipo" >Tipo de usuario</label>
           <div class="col-md-4">                             
          <select class="form-control" id="tipo" name="txtipo" data-error="selecciona un tipo" required>
            <option value="">-- Seleccionar --</option>
            <option value="1">Organizador</option>
            <option value="2">Voluntario</option>         
          </select>   
          <div class="help-block with-errors"></div>       
          </div>         
        </div>
      
        <!-- Button -->
        <div class="form-group">
           <div class="col-md-4"></div>
           <div class="col-md-4">
                                     
           <button class="btn btn-primary" block="true" type="submit" name="action" value="create"> Aceptar </button>
           </div>
        </div>  



    </form>
</div>    
    
<footer>        
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script> 
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

