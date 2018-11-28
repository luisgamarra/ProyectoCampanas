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
<?php 
 $tipo =@$_SESSION['tipo'];
if( $tipo == "1"){
 ?>
  <li>
    <a href="" id="notificacionLink" data-toggle="dropdown" style="color:#FFFFFF">
    <span id="notification_count">
      <?php 
        require_once('../modelo/notificacion.php');
        $cod = $_SESSION["cod"];
        $cont = new Notificacion();
        $cont->setPara($cod);
        $fila = $cont->contarvistas();

                echo $fila[0];
       ?>
    

    </span> Notificaciones</a>
    <ul class="dropdown-menu" style="width: 400px;">
        <div id="notificationContainer">
        <div id="notificationTitle">Notificaciones</div>
        <div id="notificationsBody">

          <?php 
          
          date_default_timezone_set('america/lima');
          

          $noti = new Notificacion();
          $noti->setPara($cod);
          $r = $noti->listarnotiporuser();             


              while ($row = mysqli_fetch_array($r)) {
                echo 

                 "<div id='noti' class='col-md-12'>  
                 <div class='col-md-4'>               
                 <img src='../vista/img/".$row[5]."' class='img-circle' width='80px' height='80px' ></div> 
                 <div class='col-md-8'>
                 <i>".$row[1]."</i></div>
                 </br></br></br>";
                 
                 
                 $fecha = strtotime($row[2]);                 
                 hace($fecha);
                 

                 echo "</div>";

                            }                           

          ?>
            
        </div>
       
        </div>
    </ul>
</li>      
<?php } ?>

<li><a href="#" style="color:#FFFFFF"><span class="glyphicon glyphicon-user "></span> <?php echo $_SESSION["usuario"]; ?></a></li>
  <li><a href="../controlador/usuariocontrolador.php?action=logout" style="color:#FFFFFF"><span class="glyphicon glyphicon-log-in"> </span> Cerrar Sesión</a></li>

      </ul>
    </div>

  </div>
</nav>


<?php 
function hace($fecha){
$diferencia = time() - $fecha ;
$segundos = $diferencia ;
$minutos = round($diferencia / 60 );
$horas = round($diferencia / 3600 );
$dias = round($diferencia / 86400 );
$semanas = round($diferencia / 604800 );
$mes = round($diferencia / 2419200 );
$anio = round($diferencia / 29030400 );

if($segundos <= 60){
echo "<p style='text-align:right;'><i>hace segundos</i></p>";

}else if($minutos <=60){
if($minutos==1){
echo "<p style='text-align:right;'><i>hace 1 minuto</i></p>";
}else{
echo "<p style='text-align:right;'><i>hace $minutos minutos</i></p>";
}
}else if($horas <=24){
if($horas==1){
echo "<p style='text-align:right;'><i>hace 1 hora</i></p>";
}else{
echo "<p style='text-align:right;'><i>hace $horas horas</i></p>";
}
}else if($dias <= 7){
if($dias==1){
echo "<p style='text-align:right;'><i>hace 1 dia</i></p>";
}else{
echo "<p style='text-align:right;'><i>hace $dias dias</i></p>";
}
}else if($semanas <= 4){
if($semanas==1){
echo "<p style='text-align:right;'><i>hace 1 semana</i></p>";
}else{
echo "<p style='text-align:right;'><i>hace $semanas semanas</i></p>";
}
}else if($mes <=12){
if($mes==1){
echo "<p style='text-align:right;'><i>hace 1 mes</i></p>";
}else{
echo "<p style='text-align:right;'><i>hace $mes meses</i></p>";
}
}else{
if($anio==1){
echo "<p style='text-align:right;'><i>hace 1 año</i></p>";
}else{
echo "<p style='text-align:right;'><i>hace $anio años</i></p>";
}
}
} 


 ?>