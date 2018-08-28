<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Campañas Sociales</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">


</head>

<body>

<nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sistema de Campañas Sociales</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <!-- <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Software</a></li>

          </ul>-->

          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php">Iniciar Sesión</a></li>
            <li class="active"><a href="registrousuario.php">Regístrate</a></li>

          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

<div class="container">
    <form class="form-horizontal" action="../controlador/usuariocontrolador.php" data-toggle="validator" method="post">
        <div class="container">
          <fieldset>
           <!-- Form Name
           style="color: #F0FFFF" -->
          <legend  >Regístrate</legend>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Nombre" >Nombre</label>
          <div class="col-md-5">
          <input id="Nombre" name="txtnom" type="text" placeholder="Nombre" class="form-control input-md" data-error="completa tu nombre" required>
          <div class="help-block with-errors"></div>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Apellido" >Apellidos</label>
          <div class="col-md-5">
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
          <div class="col-md-5">
          <input id="Contrasena" name="txtclave" type="password" placeholder="Contraseña" class="form-control input-md" data-minlength="6" required>
          <span class="help-block">Mínimo de seis (6) digitos</span>
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="RC" >Confirma Contraseña</label>
          <div class="col-md-5">
          <input id="RC" name="txtrc" type="password" placeholder="Repite contraseña" class="form-control input-md" 
         data-match="#Contrasena" data-match-error="escribe la misma contraseña" required>
         <div class="help-block with-errors"></div>
          </div>
        </div>

           <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="Celular" >Celular</label>
          <div class="col-md-4">
          <input id="Celular" name="txtcel" type="number" placeholder="Celular" class="form-control input-md" maxlength="9" required="">
          <div class="help-block with-errors"></div>
          </div>
        </div>

           <!-- Text input-->

        <div class="form-group">
          <label class="col-md-4 control-label" for="Tipo" >Tipo de usuario</label>
          <div class="col-md-4">          
        <select class="form-control" id="Tipo" name="txtipo">
         <option value="1">Organizador</option>
         <option value="2">Voluntario</option>         
        </select>
          </div>
        </div>
      
               <!-- Button -->
        <div class="form-group">
           <div class="col-md-4">
           </div>
          <div class="col-md-4">
          <input type="hidden" value="create" name="action"/>                            
            <button class="btn btn-primary" block="true" type="submit" value="create"> Aceptar </button>
          </div>
        </div>

       

    </form>

</div>


         
    
        <footer>
        
        </footer>
           
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script>
 

</body>

</html>

