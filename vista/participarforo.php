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
    <link href="css/jPages.css" rel="stylesheet">
    <link href="css/remodal.css" rel="stylesheet" >
    <link href="css/remodal-default-theme.css" rel="stylesheet" >

    <style >
      .jumbotron {
       background-image: url("img/cabecera.jpg"); } 

       .like {
        background-image: url('img/like.png');
         margin-right: 30px;
        }
      .like:hover {
    background-image: url('img/liked.png');
  }
  .dislike {
    background-image: url('img/dislike.png');

  }
  .dislike:hover {
    background-image: url('img/disliked.png');
  }
  .like,.dislike {
    /*height:55px;*/
    width:74px;
    background-repeat: no-repeat;
    float: left;
    background-size: 35%;
    cursor: pointer;
  }

  .counter {
    /*position: absolute;
    bottom: 0;*/
    padding-left:35px;
  }

    </style>
  
    
</head>

<body background="img/fondito.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-voluntario.php"); ?>

<div id="page-content-wrapper">
    <div class="container-fluid">
             

<div class="panel panel-success"> 
<div class="panel-heading"><h1 style="text-align:center;"><b>Tema</b></div>     
</div>  

    <?php  

    $foroid=$_REQUEST["foroid"];           

    $f = new Foro();
    $f->setId($foroid);
    $r = $f->foroporid();   
             
    echo "<div class='jumbotron' >
          <center><h1 style='color:yellow'>".$r["1"]."</h1></center>    
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

    echo "<div class='panel panel-primary'>
          <div class='panel-heading'>
          <img src='img/".$row["5"]."' class='img-circle' width='35px' height='35px' >  <i>".$row["3"]." ".$row["4"]."</i>
          </div>
                    
          <div class='panel-body'>
          <p> ".$row["1"]." </p> 
          <p style='text-align:right;'>";

    setlocale(LC_TIME, 'spanish');   
    $fecha = strftime("%d de %B de %Y", strtotime($row["2"]));
    echo "<i>$fecha</i>";
    echo "</p>";

    if ($row["7"] == $cod){   

    echo "<pre><a href='#modal".$row[0]."'><img src='img/editar.png'></a>";                      
                           
    echo "  <a onclick='return Confirmation()' href='../controlador/comentariocontrolador.php?idcome=".$row[0]." &&foroid=$foroid&&action=eliminar'><img src='img/delete.png'></a></pre>";

      include ('modificar-comentario.php');
      
    }

$id = $row[0];
$SQL1 = "SELECT COUNT(*) FROM like_unlike where type = 1 and comentario_id = $id";
$fila1 = ejecutar($SQL1);
$filita1 = mysqli_fetch_array($fila1);

$SQL2 = "SELECT COUNT(*) FROM like_unlike where type = 0 and comentario_id = $id";
$fila2 = ejecutar($SQL2);
$filita2 = mysqli_fetch_array($fila2);

   echo "<form action='' method='post' id='".$row[0]."'>
         <input type='hidden' name='post_id' id='post_id' value='".$row[0]."'>
         <div class='like-dislike'>
         <div class='like'><div class='counter'>".$filita1[0]."</div></div>
         <div class='dislike'><div class='counter'>".$filita2[0]."</div></div>
         <div class='clearfix'></div>
         </div>
         </form>";

  echo"</div>
       </div>";
               }
  ?>                           
</ul>
</div>  

    <div class="col-md-6">
      <form class="form-horizontal" action="../controlador/comentariocontrolador.php" method="post" data-toggle="validator">          </br></br>     
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

<script type="text/javascript">
  
  $(document).ready(function() {
     $('.like, .dislike').click(function() {
      var action = $(this).attr('class');
      var post_id = $(this).parent().parent().parent().find("#post_id").val(); 

               
            $.ajax({
              url: "../controlador/comentariocontrolador.php",
              method: 'post',
              data:{action:action, post_id:post_id},
              success: function(resp){
                resp = $.trim(resp);
                console.log(resp);
                if(resp != '') {
                  resp = resp.split('|');
                  $('form#'+post_id+' .like .counter').html(resp[0]);
                  $('form#'+post_id+' .dislike .counter').html(resp[1]);
                }
              }
            });
        
      
    
     });
});
</script>


</body>

</html>

