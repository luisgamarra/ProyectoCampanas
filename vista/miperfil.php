<?php
require_once ('../modelo/conexion.php');
require_once ('../modelo/user.php');

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



        <?php

        $tipo =@$_SESSION['tipo'];

        if( $tipo == "1"){

        include("menuleft.php"); 

    }else{
        include("menu-usuario.php"); 
    }
    ?>

    

        
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
                            Mi perfil
                        </h1>
            
                  
      </div>

            



<form class="form-horizontal" action="../controlador/usuariocontrolador.php/modificar()" method="post">
  <?php
                
             conectar();
            $cod = $_SESSION["cod"];
            
            /**$sql = "select * from users where user_id='$cod'";
            $tabla = ejecutar($sql)or die(mysql_error());
            $r=  mysql_fetch_array($tabla) **/

            $l = new User();
            $l->setId($cod);
            $r = $l->getUserbyCode();
            
        ?>

                <div class="formRow">
                <div class="formRowTitle">
                                Nombre 
                </div>                            
                <div class="col-md-5" >
                <input value="<?=$r[1]?>" id="Nombre" name="txtnom" type="text" placeholder="Nombre" class="form-control input-md " required="">
                </div>
                </div>

            </br> </br> </br>

                <div class="formRow">
                <div class="formRowTitle">
                                Apellido 
                </div>                            
                <div class="col-md-5" >
                <input value="<?=$r[2]?>" id="Apellido" name="txtape" type="text" placeholder="Apellido" class="form-control input-md " required="">
                </div>
                </div>

            </br> </br> </br>

                <div class="formRow">
                <div class="formRowTitle">
                                email 
                </div>                            
                <div class="col-md-5" >
                <input value="<?=$r[3]?>" id="Email" name="txtemail" type="text" placeholder="Email" class="form-control input-md " required="">
                </div>
                </div>

            </br> </br> </br>

                <div class="formRow">
                <div class="formRowTitle">
                                Celular
                </div>                            
                <div class="col-md-5" >
                <input value="<?=$r[5]?>" id="Celular" name="txtcel" type="text" placeholder="Celular" class="form-control input-md " required="">
                </div>
                </div>

            </br> </br> </br>


        <div class="form-group">           
          <div class="col-md-2">
                                     
                                     <?php 

                                     if( $tipo == "1"){

            
                echo "<a class='btn btn-info col-md-offset-1' href='ListaCampania.php'>Cancelar</a>";}
                else{
                    echo "<a class='btn btn-info col-md-offset-1' href='modulousuario.php'>Cancelar</a>";
                }
            
                 ?>
        </div>

            <div class="col-md-2">
          <input type="hidden" value="modificar" name="action"/>                            
            <button class="btn btn-success" block="true" type="submit" value="modificar"> Guardar Cambios </button>
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

