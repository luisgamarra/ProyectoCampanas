<div id="sidebar-wrapper">
    <ul class="sidebar-nav">

       <li class="sidebar-brand">
         <a href="panelcontrol.php"> Menú </a>
       </li>       

       <li data-toggle="collapse" data-target="#campanias" class="collapsed">
         <a href="#"><i class=""></i> Gestionar campañas <span class="caret"></span></a>
       </li>
       <ul class="sub-menu collapse" id="campanias">
          <li><a href="listacampania.php">Listado de campañas</a></li>
          <li><a href="registrocampania.php">Registrar campaña</a></li>
          <li><a href="detallecampania.php">Detalle de campañas</a></li>
       </ul>

       <li data-toggle="collapse" data-target="#voluntario" class="collapsed">
         <a href="#"><i class=""></i> Gestionar voluntarios <span class="caret"></span></a>
       </li>
       <ul class="sub-menu collapse" id="voluntario">
          <li><a href="voluntarios.php">Voluntarios</a></li>                
       </ul>

       <li data-toggle="collapse" data-target="#reunion" class="collapsed">
         <a href="#"><i class=""></i> Gestionar reuniones <span class="caret"></span></a>
       </li>
       <ul class="sub-menu collapse" id="reunion">          
          <li><a href="planificar-reuniones.php">Planificar reuniones</a></li>                
       </ul>

       <li data-toggle="collapse" data-target="#donacion" class="collapsed">
         <a href="#"><i class=""></i> Gestionar donaciones <span class="caret"></span></a>
       </li>
       <ul class="sub-menu collapse" id="donacion">
          <li><a href="donaciones.php">Registrar donaciones</a></li>
          <li><a href="lista-donaciones.php">Lista de donaciones</a></li>                
       </ul>

       <li data-toggle="collapse" data-target="#usuario" class="collapsed">
         <a href="#"><i class=""></i> Configuracion de usuario <span class="caret"></span></a>
       </li>
       <ul class="sub-menu collapse" id="usuario">
          <li><a href="miperfil.php">Mi perfil</a></li>
          <li><a href="cambiarcontra.php">Cambiar contraseña</a></li>         
       </ul>

        </br></br>

        <?php    
        echo "<center><img src='img/".$_SESSION['photo']."' alt='Norway' width='50%'' height='50%'></center>";         
        ?>

    </ul>
</div>

<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Ir al Menú</a>
