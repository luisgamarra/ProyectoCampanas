<?php
require_once ('../db/conexion.php');
require_once ('../modelo/detallecampania.php');
require_once ('../modelo/punto.php');
session_start();
include('templates/validar.php');
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
        
    
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-voluntario.php"); ?>

<div id="page-content-wrapper">
      <div class="container-fluid">                   
          
<div class="panel panel-success"> 
<div class="panel-heading"><h1 style="text-align:center;"><b>Encuentra el punto de donaciòn</b></div>  

          
           
<form id="formulario" class="form-horizontal" action="" method="post">           
</br>
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
          $rc = $campania->campaniasporvoluntariomfechafinal();  
          
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
</div>

          <?php 

          $puntos = new Punto();
          $puntos->setCampaignid($codcamp);
          $r = $puntos->puntosporcampania();
          $row = mysqli_fetch_array($r);

          ?>

  <div class="form-group">
          <label class="col-md-4 control-label" for="direccion" >Direccion : </label>
          <div class="col-md-4">
          <input value="<?=$row[0]?>" id="direccion" name="txtdir" type="text" class="form-control input-md " readonly >
          </div>
  </div>

  <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">                                 
          <button id="buscar" class="btn btn-primary" block="true" type="button" > Buscar </button>
          </div>
  </div>
     
  </form>
  </div>

<div id="mapita" class="mapa" style="width:95%;height: 500px;"></div>             
                      
                      
</div>
</div>

</div>            
    
<footer>
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script> 
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrRlyB1wnSlrXwpv3sQlarYU-hD3ysayc"></script>

<script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
</script>

<!--<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>-->
<script>
$(document).ready(function() { 


  function localizar(direccion) {


    var divmapita = document.getElementById('mapita');
  navigator.geolocation.getCurrentPosition(fn_ok , fn_mal);

  function fn_mal(){}
    function fn_ok(rta){
      var lat = rta.coords.latitude;
      var lon = rta.coords.longitude;

      var gLatLon = new google.maps.LatLng(lat,lon);
      var objConfig = {
          zoom: 14,
          center: gLatLon
        }

      var gMapa = new google.maps.Map(divmapita, objConfig);

      var objConfigMarker = {
        position: gLatLon,
        map: gMapa,
        animation : google.maps.Animation.DROP,
        draggable:true,
        title: "esta es tu posicion"
      }

      var gMarker = new google.maps.Marker(objConfigMarker);
         

      var gCoder = new google.maps.Geocoder();
      var objInformation = {
        address: direccion
      }

      gCoder.geocode(objInformation,fn_coder);

      function fn_coder(datos){
          var coordenadas = datos[0].geometry.location;

          var config = {
            map : gMapa,
            position : coordenadas,
            animation : google.maps.Animation.DROP,
            title : "friaje"
          }

          var gMarkerDV = new google.maps.Marker(config);
              gMarkerDV.setIcon('img/regalito.png');

         var objHTML = {
            content: '<div style="height:150px; width:300px"><h3>Este es lugar de donacion</h3></div>'
          }

          var gIW = new google.maps.InfoWindow(objHTML);

          google.maps.event.addListener(gMarkerDV,'click',function(){
              gIW.open(gMapa,gMarkerDV);
          });

          var objConfigDR = {
                map : gMapa,
                suppressMarkers : true
            }

            var objConfigDS = {
              origin: gLatLon, //latitud o longitud o direcion
              destination: objInformation.address,
              travelMode: google.maps.TravelMode.DRIVING
            }

            var ds = new google.maps.DirectionsService();//obtener coordenadas
            var dr = new google.maps.DirectionsRenderer(objConfigDR); //traduce coordenadas a la ruta visible

              ds.route(objConfigDS,fnRutear);

            function fnRutear(resultados, status){
              //mostrar la linea entre A y B
              if(status == 'OK'){
                dr.setDirections(resultados);
              }else{
                alert('Error' + status);
              }

            }  




      }//fn_coder


      
    }//fin fn_ok

  }
  
   
    $("#buscar").on("click", function() {
            var direccion = $("#direccion").val();
      if (direccion !== "") {
        localizar(direccion);
      }
       
  });

});
</script>

 
</body>

</html>

