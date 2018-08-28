<?php
require_once ('../modelo/conexion.php');
require_once ('../modelo/reunion.php');
conectar();
session_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Campañas Sociales</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


</head>

<body>

<?php include("menutop.php"); ?>

    <div id="wrapper">

        <?php include("menuleft.php"); ?>

    

        
<!--<li><li><a href="MyProfile.php"><i class="fa fa-user fa-fw"></i> My Profile</a>
</li>
<a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
</li> -->

<div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">

                           <div class="header"> 
                        <h1 class="page-header">
                            Reuniones
                        </h1>
            
                  
      </div>    
       
     

        <form class="form-horizontal" action="../controlador/reunioncontrolador.php" method="post" enctype="multipart/form-data">
        
                    
      
          <div class="form-bottom">
        <!-- Text input-->
        <div class="form-group" >
          <label class="col-md-4 control-label" for="asunto" style="color: #000000" >Asunto : </label>
          <div class="col-md-5" >
          <input id="asunto" name="txtasunto" type="text" placeholder="Asunto" class="form-control input-md" required="">
          </div>
        </div>        

        <div class="form-group">
          <label class="col-md-4 control-label" for="fecha" style="color: #000000" >Fecha : </label>
          <div class="col-md-4">
          <input id="fecha" name="txtfecha" type="date" placeholder="Fecha" class="form-control input-md"  required="">
          </div>
        </div>



        <div class="form-group">
          <label class="col-md-4 control-label" for="camp" style="color: #000000" >Para Campaña : </label>
          <div class="col-md-4">
          <select class="form-control" name="camp" id="camp">
         <option value="0" >Seleccione</option>

         <?php    

          $cod = $_SESSION["cod"];
          $c =$_SESSION["ca"]=@$_POST["camp"];

          $sql="select campaign_id,title from campaigns where user_id = $cod";
          $result=ejecutar($sql);
          while($row=mysqli_fetch_array($result)){
          if($c==$row[0]){
          echo "<option value='".$row[0]."' selected>".$row[1]."</option>";
          }else{
          echo "<option value='".$row[0]."' >".$row[1]."</option>";   
          }
          }
          ?>      
       </select>
          </div>
        </div>
     
          
               <!-- Button -->
        <div class="form-group">
           <div class="col-md-4">
           </div>
          <div class="col-md-4">
          <input type="hidden" value="create" name="action"/>                            
            <button class="btn btn-primary" block="true" type="submit" value="create"> Guardar </button>
          </div>
        </div>

      </div>
    </form>    

   </br>
    <table class="table table-responsive table-striped" width="500" border="2" >
      <tr>
        <th>Nº</th>
    <th>Asunto</th>
    <th>Fecha</th>
    <th>Campaña</th>
    
    
    </tr>    

<?php

$numeracion = 1;

 $cod = $_SESSION["cod"];
           

            $reu = new Reunion();
            $reu->setUserid($cod);
            $r = $reu->reunionporusuario();
 while ($row = mysqli_fetch_array($r)) {
    
    echo "<tr>
    <td>".$numeracion."</td>
    <td>".$row[0]."</td>
    <td>".$row[1]."</td>
    <td>".$row[2]."</td>
    
    
    </tr>";
    $numeracion++;
    }

?>
</table>            
                        
        
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

