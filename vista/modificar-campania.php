<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
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

   
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>

<div id="page-content-wrapper">
      <div class="container-fluid">                    
          

                <div class="header"> 
                  <h1 class="page-header"> Modificar Campaña </h1>           
                </div>    
           
                <?php 

                $codcamp=$_REQUEST["idcamp"];

                    $camp=new Campania();
                    $camp->setId($codcamp);
                    $r = $camp->getCampaniabyCod();



                 ?>


  <form class="form-horizontal" action="../controlador/campaniacontrolador.php" method="post" enctype="multipart/form-data">           
         
                   <input value="<?=$r[0]?>" type="hidden" name="idcamp" />

         <div class="form-group">
          <label class="col-md-4 control-label" for="cat" >Categoria : </label>
          <div class="col-md-4">
          <select class="form-control" name="cat" id="cat" required>
            
         <option value="<?=$r[11]?>" ><?=$r[10]?></option>

         <?php              

          $codcat = $_POST["cat"];

          $cate = new Categoria();          
          $rc = $cate->listarcategorias();  
          
          while($row=mysqli_fetch_array($rc)){
          if($codcat == $row[0]){
          echo "<option value='".$row[0]."' selected>".$row[1]."</option>";
          }if ($row[1] != $r[10]){
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
          <input value="<?=$r[1]?>" id="title" name="txtitulo" type="text" class="form-control input-md" >
          <input value="<?=$r[1]?>" type="hidden" id="ht" />
          </div>
          
        </div>

        <div class="form-group" >
          <label class="col-md-4 control-label" for="des">Descripción : </label>
          <div class="col-md-5" >
         <textarea id="des" name="txtdes" class="form-control input-md" rows="6" ><?=$r[2]?></textarea> 
          <input value=" <?=$r[2]?>" type="hidden" id="hd" />         
          </div>
          
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="lugar" >Lugar : </label>
          <div class="col-md-5">
          <input value="<?=$r[3]?>" id="lugar" name="txtlugar" type="text" class="form-control input-md" >
          <input value="<?=$r[3]?>" type="hidden" id="hl" />
          </div>
          
        </div>
          
           <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="vacante" >Vacantes : </label>
          <div class="col-md-2">
          <input value="<?=$r[4]?>" id="vacante" name="txtvacante" type="text" class="form-control input-md" onkeypress='return validaNumericos(event)' onkeyup="es_vacio()">
          <input value="<?=$r[4]?>" type="hidden" id="hv" />
          </div>
         
        </div>

         <!--<?php 

        //$f1 = date('d/m/Y', strtotime(str_replace('/', '-', $r[8])));
        //echo $f1;
         ?>-->

        
        <div class="form-group">
          <label class="col-md-4 control-label" for="fecha1" >Fecha de inicio : </label>
          <div class="col-md-4">
        <input value="<?=$r[8]?>" id="fecha1" name="txtfecha1" type="text" class="form-control input-md" readonly >
        <input value="<?=$r[8]?>" type="hidden" id="hf1" />
          </div>
          
        </div>

       

        <div class="form-group">
          <label class="col-md-4 control-label" for="fecha2" >Fecha final : </label>
          <div class="col-md-4">
          <input value="<?=$r[9]?>" id="fecha2" name="txtfecha2" type="text" class="form-control input-md" readonly >
          <input value="<?=$r[9]?>" type="hidden" id="hf2" />
          </div>
          
        </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="imagen" >Imagen : </label>
          <div class="col-md-4">          
          <input type="file" onchange="validarFile(this);" name="txtim" id="image"/>
          <input value="<?=$r[7]?>" type="hidden" name="himage" />
          </div>
          
        </div>

        <div class="form-group">
            <div class="col-md-4"></div>    
            <div class="col-md-4">
               <?php   echo "<center><img src='img/".$r["7"]."' alt='Norway' width='50%' height='50%'></center> ";                       
                 ?>               
            </div>            
        </div>

               <!-- Button -->
        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">
                                 
        <button id="cambiar" class="btn btn-success" block="true" type="submit" name="action" value="modificar"> Guardar </button>
          <a class='btn btn-info col-md-offset-1' href='detallecampania.php'>Cancelar</a>
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

<script src="js/jquery-ui.js"></script>




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

