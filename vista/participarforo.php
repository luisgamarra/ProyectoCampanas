<?php
require_once ('../db/conexion.php');
require_once ('../modelo/comentario.php');
conectar();
session_start();
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
             

            <div class="header"> 
                <h1 class="page-header"> Tema </h1>            
            </div>    

            <?php  
              $ftitle = $_REQUEST["ft"];  
              echo "<div class='jumbotron'>
    <center><h1>".$ftitle."</h1></center> 
    
  </div>";
            ?>         

         
<div class="col-md-6">
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
  <img src='img/".$row["5"]."' width='30px' >".$row["3"]." ".$row["4"]."
  </div>

  <div class='panel-body'>
   <p> ".$row["1"]." </p>
    <p style='text-align:right;'>".$row["2"]."</p>
  </div>
</div>";
               }
  ?>                           
         
         </div>  

         <div class="col-md-6">
            <form class="form-horizontal" action="../controlador/comentariocontrolador.php" method="post" data-toggle="validator" >           
         
        <!-- Text input-->
        <div class="form-group" >
          <label class="col-md-4 control-label" for="comentar" >Comentar : </label>
          <div class="col-md-5" >
          <textarea id="des" name="txtdes"  rows="6" cols="50" required> </textarea>
          </div>
          <div class="help-block with-errors"></div>
        </div>      

               <!-- Button -->
        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-4">
                                 
           <input type="hidden" name="fi" value="<?php echo $foroid?>">
           <input type="hidden" name="ft" value="<?php echo $ftitle?>">                          
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



<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
    $("#wrapper").toggleClass("toggled");
        });
</script> 

</body>

</html>

