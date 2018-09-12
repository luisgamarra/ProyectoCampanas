
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Campañas sociales</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
  <link rel="stylesheet" href="vista/css/all.min.css">
  <link rel="stylesheet" href="vista/css/normalize.css"> 
  <link rel="stylesheet" href="vista/css/main.css">
  <link rel="stylesheet" href="vista/css/bootstrap.min.css">
  <link rel="stylesheet" href="vista/css/simple-sidebar.css">
  <link rel="stylesheet" href="vista/css/colorbox.css">
  
</head>

<body>

  <?php include_once ('vista/templates/header.php'); ?>

<nav class=" barra navbar navbar-default" style="background-color: #da273e;">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="vista/img/logo.png" height="30px" alt="logo de la UTP" style="background: white;" ></a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right" >
              
               <li><a href="vista/templates/calendario.php" style="color: #FFFFFF">Calendario</a></li>
              
              <li><a href="vista/login.php" style="color: #FFFFFF">Ingresar</a></li>
              <li><a href="vista/registrousuario.php" style="color: #FFFFFF">Registrar</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->

        </div><!-- /.container-fluid -->
  </nav>

  <section class="seccion contenedor">
    <h2>REGALANDO SONRISAS</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </section>

  <section id="reuniones" class="programa">
    <div class="contenedor-video">
        <video autoplay loop poster="vista/img/bg-talleres.jpg">
          <source src="video/video.mp4" type="video/mp4">
          <source src="video/video.webm" type="video/webm">
          <source src="video/video.ogv" type="video/ogv">
        </video>
    </div><!--Contenedor del video-->

        <div class="contenido-programa">
          <div class="contenedor">
            <div class="programa-evento">
              <h2>Reuniones de planificacion</h2>
              <nav class="menu-programa">
                <a href="#Taller1"><i class="fas fa-snowflake" aria-hidden="true"></i> Friaje </a>
                <a href="#Taller2"><i class="fas fa-home" aria-hidden="true"></i> Asilos</a>
                <a href="#Taller3"><i class="fas fa-warehouse" aria-hidden="true"></i> Horfanatos</a>
                <a href="#Taller3"><i class="fas fa-university" aria-hidden="true"></i> Hospitales</a>
              </nav>

              <div id="talleres" class="info-curso ocultar clearfix">
                <div class="detalle-evento">
                  <h3>Friaje</h3>
                  <p><i class="fas fa-clock" aria-hidden="true"></i> 14:00 hrs</p>
                  <p><i class="fas fa-calendar" aria-hidden="true"></i> 15 Setiembre</p>
                  <p><i class="fas fa-user" aria-hidden="true"></i> Erick Rojas</p>
                </div>

                <div class="detalle-evento">
                  <h3>Asilos</h3>
                  <p><i class="fas fa-clock" aria-hidden="true"></i> 18:00 hrs</p>
                  <p><i class="fas fa-calendar" aria-hidden="true"></i> 29 Setiembre</p>
                  <p><i class="fas fa-user" aria-hidden="true"></i> Luis Gamarra</p>
                </div>

                <div class="detalle-evento">
                  <h3>Hospitales</h3>
                  <p><i class="fas fa-clock" aria-hidden="true"></i> 20:00 hrs</p>
                  <p><i class="fas fa-calendar" aria-hidden="true"></i> 15 Agosto</p>
                  <p><i class="fas fa-user" aria-hidden="true"></i> Yamil Quiñones</p>
                </div>

                
              </div>
            </div>
          </div>
        </div>
  </section>

  <?php include_once ('vista/templates/campanas.php'); ?>

<div class="contador parallax">
  <div class="contenedor">
      <ul class="resumen-campana clearfix">
        <li> <p class="numero">52</p>Voluntarios</li>
        <li> <p class="numero">9</p>Campañas</li>
        <li> <p class="numero">107</p>Donativos</li>
      </ul>

  </div>

</div>

<?php include_once ('vista/templates/footer.php'); ?>

 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="vista/js/bootstrap.min.js"></script>


  <script src="vista/js/jquery.colorbox-min.js"></script>
  <script src="vista/js/jquery.animateNumber.min.js"></script>
  <script src="vista/js/main.js"></script>
</body>

</html>
