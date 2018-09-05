<nav class="navbar navbar-default" style="background-color: #da273e;">
  <div class="container-fluid">

    <div class="navbar-header" >
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="" style="color:#FFFFFF">SISTEMA DE CAMPAÑAS SOCIALES</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#" style="color:#FFFFFF"><span class="glyphicon glyphicon-user "></span> <?php echo $_SESSION["usuario"]; ?></a></li>
        <li><a href="../controlador/logout.php" style="color:#FFFFFF"><span class="glyphicon glyphicon-log-in"> </span> Cerrar Sesión</a></li>
      </ul>
    </div>

  </div>
</nav>
