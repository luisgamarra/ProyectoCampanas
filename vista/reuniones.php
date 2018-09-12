<?php
require_once ('../db/conexion.php');
require_once ('../modelo/detallecampania.php');
require_once ('../modelo/reunion.php');
conectar();
session_start();
?>

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
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/normalize.css"> 
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/simple-sidebar.css">
  <link rel="stylesheet" href="css/colorbox.css">
  
</head>

<body>
  <?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php

   
        include("templates/menu-voluntario.php"); 
  
?>

<div id="page-content-wrapper">
    <div class="container-fluid">                    
        
  
  <section class="seccion contenedor">
    <h2>Calendario de Reuniones</h2>
    <form id="form1" name="form1" method="post" action="">

    <div class="form-group">
          <label class="col-md-4 control-label" for="camp" >Campaña : </label>
          <div class="col-md-4">
          <select class="form-control" name="camp" id="camp" OnChange="submit()">
         <option value="0" >-- Seleccione --</option>

         <?php    

          $cod = $_SESSION["cod"];
          $codcamp=$_POST["camp"];

          $campania = new Detallecampania();
          $campania->setUserid($cod);
          $rc = $campania->campaniasporvoluntario();  
          
          while($row=mysqli_fetch_array($rc)){
          if($codcamp == $row[5]){
          echo "<option value='".$row[5]."' selected>".$row[0]."</option>";
          }else{
          echo "<option value='".$row[5]."' >".$row[0]."</option>";   
          }
          }
          ?>      
          </select>
          
          </div>
        </br></br>
    </div>     



    <?php
            $reunion = new Reunion();
            $reunion->setCampaignid($codcamp);
            $r = $reunion->reunionporcampania();           
                                
?>

 <div class="calendario">
      <?php
      $calendario = array();
        while ($reuniones = $r->fetch_assoc()) {
            // captura la fecha de cada evento
            $fecha = $reuniones['dates'];


            $reunion = array(
            'Tema' => $reuniones['topic'],
            'Campaña' => $reuniones['title'],
            'Fecha' => $reuniones['dates'],
            /*'Hora' => $reuniones['time'],*/
            'Encargado' => $reuniones['firstname'] . " " . $reuniones['lastname'],
            );

            $calendario[$fecha][] = $reunion;
          ?>
  <?php } ?>


  <?php
  //imprimir todos los eventos
    foreach ($calendario as $dia => $lista_campanas) { ?>

    <h3>
        <i class="fas fa-calendar-alt" aria-hidden="true"> </i>
        <?php
        setlocale(LC_TIME, 'spanish');
        echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($dia))) ;
        ?>
    </h3>
    <?php foreach ($lista_campanas as $reunion) { ?>
      
      <div class="dia">

        <p class="titulo"> <?php echo $reunion['Tema']; ?>  </p>
        <p class="hora">
            <i class="fas fa-clock" aria-hidden="true"></i>
            <?php echo $reunion['Fecha']; ?>
        </p>
        <p><i class="fas fa-map-marker-alt"></i>  <?php echo $reunion['Campaña']; ?></p>
        <p>
          <i class="fas fa-user" aria-hidden="true"></i>
          <?php echo $reunion['Encargado']; ?>
        </p>

      </div>
    <?php }//for each campañas ?>
  <?php }  //For each días ?>


    </div>

          
    

    
    

    
</form>
    
  </section>

</div>
</div>
</div>

 



  <script src="js/jquery.colorbox-min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/main.js"></script>

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