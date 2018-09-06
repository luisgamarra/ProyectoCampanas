<div id="sidebar-wrapper">
    <ul class="sidebar-nav">

        <li class="sidebar-brand">
            <a href="modulovoluntario.php"> Menú </a>
        </li>       

        <li data-toggle="collapse" data-target="#campanias" class="collapsed">
            <a href="#"><i class=""></i> Campañas sociales <span class="caret"></span></a>
        </li>
        <ul class="sub-menu collapse" id="campanias">
           <li><a href="modulovoluntario.php">Todas las Campañas</a></li>
           <li><a href="miscampanas.php">Mis Campañas</a></li>    
           <li><a href="reuniones.php">reuniones</a></li>         
        </ul>

        <li data-toggle="collapse" data-target="#usuario" class="collapsed">
          <a href="#"><i class=""></i> Configuracion de usuario <span class="caret"></span></a>
        </li>
        <ul class="sub-menu collapse" id="usuario">
          <li><a href="miperfil.php">Mi perfil</a></li>
          <li><a href="cambiarcontra.php">Cambiar Contraseña</a></li>         
        </ul> 

        </br></br>

        <?php    
        echo "<center><img src='img/".$_SESSION['photo']."' alt='Norway' width='50%'' height='50%'></center>";         
        ?>

    </ul>
</div>

<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Ir al Menú</a>
