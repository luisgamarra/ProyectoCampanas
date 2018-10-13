<?php
require_once ('../db/conexion.php');
require_once ('../modelo/foro.php');
require_once ('../modelo/comentario.php');
conectar();
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
     <link rel="stylesheet" href="css/jPages.css">
  <link rel="stylesheet" href="css/remodal.css">
  <link rel="stylesheet" href="css/remodal-default-theme.css">
    <style >
      .jumbotron {
  background-image: url("img/cabecera.jpg");
 
} 
    </style>
  
    
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-voluntario.php"); ?>

<div id="page-content-wrapper">
    <div class="container-fluid">
             

            <div class="header"> 
                <h1 class="page-header"> Tema </h1>            
            </div>    

            <?php  


    $foroid=$_REQUEST["foroid"];
           

    $f = new Foro();
    $f->setId($foroid);
    $r = $f->foroporid();   


             
              echo "<div class='jumbotron' >
    <center><h1 style='color:red'>".$r["1"]."</h1></center> 
    
  </div>";
            ?>         

         
<div class="col-md-6">
   <center><div class="holder"></div></center>
   <ul id="itemContainer">

<?php                             
            
    $cod = $_SESSION["cod"];  

    $foroid=$_REQUEST["foroid"];
           

    $comentario = new Comentario();
    $comentario->setForoid($foroid);
    $r = $comentario->listacomentarios();   

                      

                while ($row = mysqli_fetch_array($r)) {

                    echo "
                        <div class='panel panel-primary'>
  <div class='panel-heading'>
  <img src='img/".$row["5"]."' width='30px' ><i>".$row["3"]." ".$row["4"]."</i>
  </div>

  <div class='panel-body'>";


   echo "<p> ".$row["1"]." </p>"; 
   echo "<p style='text-align:right;'>".$row["2"]."</p>";

if ($row["7"] == $cod){   

  echo "<pre><a href='#modal".$row[0]."'><img src='img/editar.png'></a>";                      
                           
  echo "  <a onclick='return Confirmation()' href='../controlador/comentariocontrolador.php?idcome=".$row[0]." &&foroid=$foroid&&action=eliminar'><img src='img/delete.png'></a></pre>";

                      include ('modificar-comentario.php');

      
}


  echo"</div>
</div>";
               }
  ?>                           
         </ul>
         </div>  

         <div class="col-md-6">
            <form class="form-horizontal" action="../controlador/comentariocontrolador.php" method="post" data-toggle="validator" >           
         
        <!-- Text input-->
        <div class="form-group" >
          <label class="col-md-4 control-label" for="comentar" >Comentar : </label>
          <div class="col-md-5" >
          <textarea id="des" name="txtdes" rows="6" cols="50" required></textarea>
          <div class="help-block with-errors"></div>
          </div>          
        </div>      

               <!-- Button -->
        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">
                                 
           <input type="hidden" name="fi" value="<?php echo $foroid?>">
                                     
          <button class="btn btn-primary" block="true" type="submit" name="action" value="create"> Comentar </button>
          </div>
        </div>
      
  </form>              
         </div>
   

    </div>
</div>

</div>   
    
<footer>        
</footer>
           
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.js"></script>
<script src="js/jPages.js"></script>
<script src="js/remodal.js"></script>


<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
    $("#wrapper").toggleClass("toggled");
        });
</script> 

<script>
  
$(function(){
    $("div.holder").jPages({
      containerID  : "itemContainer",
      perPage      : 4,
      startPage    : 1,
      startRange   : 1,
      midRange     : 1,
      endRange     : 1
      
    });
  });

</script>

<script type="text/javascript">
function Confirmation() {
 
  if (confirm('Esta seguro de eliminar este comentario?')==true) {
      
      return true;
  }else{
      //alert('Cancelo la eliminacion');
      return false;
  }
}
</script>


</body>

</html>

