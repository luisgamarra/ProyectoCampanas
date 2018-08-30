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

<body background="img/login.jpg">

<nav class="navbar navbar-default" style="background-color: #000000;">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php">Sistema de Campañas Sociales</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="login.php">Iniciar Sesión</a></li>
            <li><a href="registrousuario.php">Regístrate</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->

      </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <form class="form-horizontal" action="../controlador/usuariocontrolador.php" data-toggle="validator" method="post">
                
        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <center><img src="img/logeo.png" width="40%" height="40%" align="center"></center>
          <h3>Ingresa a tu cuenta</h3>
          <p>Escribe tu correo y contraseña:</p>
          </div>
        </div>      

        <div class="form-group"> 
          <div class="col-md-4"></div>
          <div class="col-md-4">                             
          <input type="email" name="txtemail" placeholder="Correo Electrónico" class="form-control input-md" data-error="correo invalido ej:luis@gmail.com" required>
          <div class="help-block with-errors"></div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">                                   
          <input type="password" name="txtpass" placeholder="Contraseña" class="form-control input-md" id="password" data-error="falta contraseña" required>
          <div class="help-block with-errors"></div>
          <a href="recuperarcontrasenia.php">recuperar contraseña</a>
          </div>
          </br>
        </div>

        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">     
          <input type="hidden" value="login" name="action"/>
          <button type="submit" class="btn btn-success" value="login">Ingresar</button>
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