<?php
require_once ('../db/conexion.php');
require_once ('../modelo/categoria.php');
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
    <link href="css/jquery-ui.css" rel="stylesheet">
     <link rel="stylesheet" href="css/remodal.css">
  <link rel="stylesheet" href="css/remodal-default-theme.css">




   
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>

<div id="page-content-wrapper">
      <div class="container-fluid">                    
          

                <div class="header"> 
                  <h1 class="page-header"> Registrar Campaña </h1>           
                </div>    
           
  <form class="form-horizontal" action="../controlador/campaniacontrolador.php" method="post" data-toggle="validator" enctype="multipart/form-data"> 

         <div class="form-group">
          <label class="col-md-4 control-label" for="cat" >Categoria : </label>
          <div class="col-md-4">
          <select class="form-control" name="cat" id="cat" required>
            
         <option value="" >-- Seleccione --</option>

         <?php              

          $codcat = $_POST["cat"];

          $cate = new Categoria();          
          $rc = $cate->listarcategorias();  
          
          while($row=mysqli_fetch_array($rc)){
          if($codcat == $row[0]){
          echo "<option value='".$row[0]."' selected>".$row[1]."</option>";
          }else{
          echo "<option value='".$row[0]."' >".$row[1]."</option>"; 

          }
          }
          ?>  

          </select>
          
          </div>
          <div class="help-block with-errors"></div>
        </div>               
         
        <!-- Text input-->
        <div class="form-group" >
          <label class="col-md-4 control-label" for="title" >Titulo : </label>
          <div class="col-md-5" >
          <input id="title" name="txtitulo" type="text" placeholder="Titulo" class="form-control input-md" required>
          </div>
          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group" >
          <label class="col-md-4 control-label" for="des">Descripción : </label>
          <div class="col-md-5" >
          <textarea id="des" name="txtdes" class="form-control input-md" rows="4" > </textarea>
         <!-- <div class="help-block with-errors"></div>-->
          </div>
          
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="lugar" >Lugar : </label>
          <div class="col-md-5">
          <input id="lugar" name="txtlugar" type="text" placeholder="Lugar" class="form-control input-md" required>
          </div>
          <div class="help-block with-errors"></div>
        </div>
          
           <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="vacante" >Vacantes : </label>
          <div class="col-md-2">
          <input id="vacante" name="txtvacante" type="text" placeholder="Vacantes" class="form-control input-md" onkeypress='return validaNumericos(event)'required>
          </div>
          <div class="help-block with-errors"></div>
        </div>

        
        <div class="form-group">
          <label class="col-md-4 control-label" for="fecha1" >Fecha de inicio : </label>
          <div class="col-md-4">
        <input id="fecha1" name="txtfecha1" type="text" placeholder="Fecha de inicio" class="form-control input-md" required>
          </div>
          <div class="help-block with-errors"></div>
        </div>

        <!--<?php 

        //$newDate = date('Y/m/d', strtotime(str_replace('/', '-', '27/12/2018')));
        //echo $newDate;

         ?>-->

        <div class="form-group">
          <label class="col-md-4 control-label" for="fecha2" >Fecha final : </label>
          <div class="col-md-4">
          <input id="fecha2" name="txtfecha2" type="text" placeholder="Fecha final" class="form-control input-md"  required>
          </div>
          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="imagen" >Imagen : </label>
          <div class="col-md-4">          
          <input type="file" onchange="validarFile(this);" name="txtimagen" id="file" required/>
          </div>
          <div class="help-block with-errors"></div>
        </div>

               <!-- Button -->
        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">
                                 
          <button id="guardar" class="btn btn-primary" block="true" type="submit" name="action" value="create"> Guardar </button>
          <a class="btn btn-success" href="#modal">Agregar categoria</a>
          <a class='btn btn-info' href='panelcontrol.php'>Cancelar</a>
          </div>
        </div>
      
  </form>  
  


<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
    <h2 id="modal1Title">Agregar Categoria</h2>
    <p id="modal1Desc">
      <form class="form-horizontal" action="../controlador/categoriacontrolador.php" method="post" data-toggle="validator">
        <div class="form-group" >
          <label class="col-md-4 control-label" for="cate" >Ingrese categoria : </label>
          <div class="col-md-5" >
          <input id="cate" name="txtcate" type="text" placeholder="categoria" class="form-control input-md" required>
          </div>
          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">                                
            
  <button class="btn btn-primary" type="submit" name="action" value="agregar">Guardar</button>
          </div>
        </div>
      </form>
    </p>
  </div>
  <button data-remodal-action="cancel" class="remodal-cancel" >Cancel</button>
</div>

                      
      </div>
</div>

</div>            
    
<footer>
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script> 
<script src="js/jquery-ui.js"></script>
<script src="js/remodal.js"></script>


<script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
</script>
 
<script>
  
 var dateToday = new Date(); 

$("#fecha1").datepicker({  
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],  
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    dateFormat: 'dd/mm/yy',     
     minDate: dateToday 
    
});

$("#fecha2").datepicker({  
monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],  
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    dateFormat: 'dd/mm/yy',     
     minDate: dateToday 
    
});
 
  </script>

  <script >
function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}
</script>

<script>
  function validarFile(all)
{
    //EXTENSIONES Y TAMANO PERMITIDO.
    var extensiones_permitidas = [".png",".jpg", ".jpeg", ];
    //var tamano = 8; // EXPRESADO EN MB.
    var rutayarchivo = all.value;
    var ultimo_punto = all.value.lastIndexOf(".");
    var extension = rutayarchivo.slice(ultimo_punto, rutayarchivo.length);
    if(extensiones_permitidas.indexOf(extension) == -1)
    {
        alert("Extensión de archivo no valida");
        document.getElementById(all.id).value = "";
        return; // Si la extension es no válida ya no chequeo lo de abajo.
    }}
</script>



</body>

</html>

