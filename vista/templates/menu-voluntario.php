<div id="sidebar-wrapper">
    <ul class="sidebar-nav">

        <li class="sidebar-brand">
            <a href="modulovoluntario.php"> Menú </a>
        </li>       

        <li data-toggle="collapse" data-target="#campanias" class="collapsed">
            <a href="#"><i class=""></i> Campañas sociales <span class="caret"></span></a>
        </li>
        <ul class="sub-menu collapse" id="campanias">
           <li><a href="modulovoluntario.php">Sumate!!</a></li>
           <li><a href="categoriacampania.php">Categorias</a></li>          
           <li><a href="miscampanas.php">Mis campañas</a></li>            
           <li><a href="reuniones.php">Reuniones</a></li>     
           <li><a href="ubicaciones.php">Ubicaciones</a></li>    
        </ul>

        <li data-toggle="collapse" data-target="#donaciones" class="collapsed">
          <a href="#"><i class=""></i> Donaciones <span class="caret"></span></a>
        </li>
        <ul class="sub-menu collapse" id="donaciones">  
          <li><a href="misdonaciones.php">Mis donaciones</a></li>         
          <li><a href="donarpaypal.php">Donar con paypal</a></li>         
        </ul> 

         <li data-toggle="collapse" data-target="#foro" class="collapsed">
          <a href="#"><i class=""></i> Foro <span class="caret"></span></a>
        </li>
        <ul class="sub-menu collapse" id="foro">          
          <li><a href="listaforo.php">Participar</a></li>         
        </ul> 

         <li data-toggle="collapse" data-target="#testimonios" class="collapsed">
          <a href="#"><i class=""></i> Testimonios <span class="caret"></span></a>
        </li>
        <ul class="sub-menu collapse" id="testimonios">  
          <li><a href="lista-testimonio.php">Agregar Testimonio</a></li>         
                
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
