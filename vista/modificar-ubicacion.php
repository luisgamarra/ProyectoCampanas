<?php
require_once ('../db/conexion.php');
require_once ('../modelo/punto.php');
require_once ('../modelo/campania.php');
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
    <link href="css/notificacion.css"rel="stylesheet">     
  
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>

<div id="page-content-wrapper">
      <div class="container-fluid">                    
          

<div class="panel panel-info"> 
<div class="panel-heading"><h3 style="text-align:center;">Modifica el registro de punto de donacion</h3></div>  
</div>     
           
            <div id="mapa" style="width:100%;height: 400px;"></div>  

             <?php 

      $idubi = $_REQUEST["idubi"];

      $punto = new Punto();
      $punto->setId($idubi);
      $r = $punto->listarpuntosbycod();

      ?>  
 

<form id="formulario" class="form-horizontal" action="../controlador/puntocontrolador.php" data-toggle="validator" method="post">           
       
<br/><br/>

                    <input type="hidden" value="<?=$r[0]?>" name="id">
        
        <div class="form-group">
          <label class="col-md-4 control-label" for="camp" >Para Campaña : </label>
          <div class="col-md-4">
          <select class="form-control" name="camp" id="camp" required>
            
          <option value="<?=$r[4]?>" ><?=$r[5]?></option>

            <?php    

            $cod = $_SESSION["cod"];
            $codcamp=$_POST["camp"];

           $campania = new Campania();
            $campania->setUserid($cod);
            $r1 = $campania->campaniaporusuariomfechafinal(); 

            $array1 = array();
            while($fila1 = $r1->fetch_assoc()){
            $a =  array(
            'codigo' => $fila1['campaign_id'],
            'titulo' => $fila1['title']);            
            $array1[] = $a;
            } 

            $puntos = new Punto();
            $puntos->setUserid($cod);
            $r2 = $puntos->listarpuntosbyusercod();

            $array2 = array();
            while($fila2 = $r2->fetch_assoc()){
            $b =  array(
            'codigo' => $fila2['campaign_id'],
            'titulo' => $fila2['title']);            
            $array2[] = $b;
            } 

            foreach ($array1 as $value1) {
             $encontrado=false;
            foreach ($array2 as $value2) {
              if ($value1 == $value2){
               $encontrado=true;                                     
                  }
             }
              if ($encontrado == false){
                  if($codcamp == $value1["codigo"]){
                  echo "<option value='".$value1["codigo"]."' selected>".$value1["titulo"]."</option>";
                  }if ($value1["codigo"] != $r[4]){
                  echo "<option value='".$value1["codigo"]."' >".$value1["titulo"]."</option>"; 
                  }
             }
            } 
          
          
            ?>  

            </select>          
          </div>
                    <div class="help-block with-errors"></div>

        </div>     

        <div class="form-group" >
          <label class="col-md-4 control-label" for="dir" >Direcciòn : </label>
          <div class="col-md-4" >
            <input type="hidden" name="di" value="<?=$r[1]?>">
          <input id="dir" name="direccion" type="text" placeholder="direccion" class="form-control input-md" value="<?=$r[1]?>" required> 
                
          </div>
          <div class="help-block with-errors"></div>          
        </div>

                
       
          <input id="cx" name="cx" type="hidden" placeholder="cx" class="form-control input-md" value="<?=$r[2]?>" readonly>
          
        
        
          <input id="cy" name="cy" type="hidden" placeholder="cy" class="form-control input-md" value="<?=$r[3]?>" readonly>
         
                            
        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">                                    
           <button type="submit" id="boton" class="btn btn-success" name="action" value="modificar">Actualizar</button>
            <button id="buscar" class="btn btn-primary" block="true" type="button" > Buscar </button>  
           <a class='btn btn-info' href='lista-ubicaciones.php'>Cancelar</a>
          </div>
        </div>      
                    
  </form>              
                      
                      
      </div>
</div>

</div>            
    
<footer>
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script> 

<script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
</script>
 

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrRlyB1wnSlrXwpv3sQlarYU-hD3ysayc"></script>
    <!--<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js" ></script> -->
<script>
    //VARIABLES GENERALES
    //declaras fuera del ready de jquery
    var nuevos_marcadores = [];
    //var marcadores_bd= [];
    var mapa = null; //VARIABLE GENERAL PARA EL MAPA
    //FUNCION PARA QUITAR MARCADORES DE MAPA
   function limpiar_marcadores(lista)
    {
        for(i in lista)
        {
            //QUITAR MARCADOR DEL MAPA
            lista[i].setMap(null);
        }
    }

    $(document).on("ready", function(){
        
        //VARIABLE DE FORMULARIO
        var divmapa = document.getElementById('mapa');
        var formulario = $("#formulario");
        
        var punto = new google.maps.LatLng(-12.0431800,-77.0282400);
        var config = {
            zoom:13,
            center:punto,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        mapa = new google.maps.Map( divmapa, config );

       

        google.maps.event.addListener(mapa, "click", function(event){         


           var coordenadas = event.latLng.toString();
           
           coordenadas = coordenadas.replace("(", "");
           coordenadas = coordenadas.replace(")", "");
           
           var lista = coordenadas.split(",");
           
           var dircor = new google.maps.LatLng(lista[0], lista[1]);

          formulario.find("input[name='cx']").val(lista[0]);
          formulario.find("input[name='cy']").val(lista[1]);
          
           var marcador = new google.maps.Marker({
               //titulo:prompt("Titulo del marcador?"),
               position:dircor,
               map: mapa, 
               animation:google.maps.Animation.DROP,
               draggable:false
           });
           
           nuevos_marcadores.push(marcador);
                               
           //BORRAR MARCADORES NUEVOS
           limpiar_marcadores(nuevos_marcadores);
           marcador.setMap(mapa);
        });
      });

listar();

     function listar()
    {
        //ANTES DE LISTAR MARCADORES
        //SE DEBEN QUITAR LOS ANTERIORES DEL MAPA
       //limpiar_marcadores(marcadores_bd);
       
       $.ajax({
               type:"POST",
               url:"../controlador/puntocontrolador.php",
               dataType:"JSON",
               data:"&action=listar",
               success:function(data){
                   if(data.estado=="ok")
                    {
                        //alert("Hay puntos en la BD");
                        $.each(data.mensaje, function(i, item){
                            //OBTENER LAS COORDENADAS DEL PUNTO
                            var posi = new google.maps.LatLng(item.cx, item.cy);//bien
                            //CARGAR LAS PROPIEDADES AL MARCADOR
                            var marca = new google.maps.Marker({
                                IdPunto:item.point_id,
                                position:posi,
                                direccion: item.direccion,
                                cx:item.cx,
                                cy:item.cy
                            });
                           
                            var objHTML = {
                            content: item.title
                            }

                             var gIW = new google.maps.InfoWindow(objHTML);
                             gIW.open(mapa,marca);
                            //AGREGAR EL MARCADOR A LA VARIABLE MARCADORES_BD
                            //marcadores_bd.push(marca);
                            //UBICAR EL MARCADOR EN EL MAPA
                            marca.setMap(mapa);
                        });
                    }
                else
                    {
                        alert("NO hay puntos en la BD");
                    }
               },
              
           });
    }
      </script> 


      <script>
        
        $(document).ready(function() { 
         var formulario = $("#formulario");

function localizar(direccion) {
  
      var gCoder = new google.maps.Geocoder();
      var objInformation = {
        address: direccion
      }

      gCoder.geocode(objInformation,fn_coder);

      function fn_coder(datos){
          var coordenadas = datos[0].geometry.location;
          var latb = datos[0].geometry.location.lat();
          var langb = datos[0].geometry.location.lng()

          formulario.find("input[name='cx']").val(latb);
          formulario.find("input[name='cy']").val(langb);

          var config = {
            map : mapa,            
            position : coordenadas,
            animation : google.maps.Animation.DROP,
            
          }

          var gMarkerDV = new google.maps.Marker(config);
              

              nuevos_marcadores.push(gMarkerDV);
             limpiar_marcadores(nuevos_marcadores);
             gMarkerDV.setMap(mapa);
            }

             

}




$("#buscar").on("click", function() {
            var direccion = $("#dir").val();
      if (direccion !== "") {
        localizar(direccion);
      }
       
  });
        })


      </script>

</body>

</html>