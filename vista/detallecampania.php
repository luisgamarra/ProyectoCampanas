<?php
require_once ('../modelo/conexion.php');
require_once ('../modelo/campania.php');
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
            


      
                       
                           <div class="table-responsive">        
                  <table class="table table-bordered table-dark" width="500" border="3" >
                <tr><th>N°</th><th>Nombre</th><th>Lugar</th><th>Vacantes</th><th>Fecha</th></th><th>Editar</th></th><th>Eliminar</th></tr>
                <?php
                
            conectar();
            $cod = $_SESSION["cod"];
           

            $c = new Campania();
            $c->setId($cod);
            $r = $c->campaniaporusuario();


                
               /** $a=$_SESSION["cod"];
                $sql = "select * from campaigns where user_id='$a'";
                $result = ejecutar($sql);*/
                $numeracion=1;

if(empty($_GET['idcamp'])){

}else {

    echo "<form action='../controlador/campaniacontrolador.php?idcamp=".$_GET['idcamp']."' method='post'>
    <div class='form-group row'>";

}



                while ($row = mysqli_fetch_array($r)) {

                echo "<tr><td align='center'>".$numeracion."</td>";
//titulo
if(empty($_GET['idcamp'])){
echo "<td align='center'>".$row["1"]."</td>";
}else {
  if ($_GET['idcamp']==$row["0"]) {
    echo "<td align='center'>
<div class='container col-sm-6 col-md-offset-3'>
        <input type='text' class='form-control' id='txtitle' name='txtitle' placeholder='".$row["1"]."'>

    </td>";
  }else {
    echo "<td align='center'>".$row["1"]."</td>";
  }

}
//lugar
if(empty($_GET['idcamp'])){
echo "<td align='center'>".$row["2"]."</td>";
}else {
  if ($_GET['idcamp']==$row["0"]) {
    echo "<td align='center'>
<div class='container col-sm-6 col-md-offset-3'>
        <input type='text' class='form-control' id='txtplace' name='txtplace' placeholder='".$row["2"]."'>

    </td>";
  }else {
    echo "<td align='center'>".$row["2"]."</td>";
  }

}
//vacantes
if(empty($_GET['idcamp'])){
echo "<td align='center'>".$row["3"]."</td>";
}else {
  if ($_GET['idcamp']==$row["0"]) {
    echo "<td align='center'>
<div class='container col-sm-6 col-md-offset-3'>
        <input type='text' class='form-control' id='txtvacant' name='txtvacant' placeholder='".$row["3"]."'>

    </td>";
  }else {
    echo "<td align='center'>".$row["3"]."</td>";
  }

}
//Fecha
echo "<td align='center'>".$row["4"]."</td>";
//Modificar
if(empty($_GET['idcamp'])){
echo "<td align='center'>
<a class='btn btn-success' href='detallecampania.php?idcamp=".$row["0"]."'>Modificar</a></td>";
}else {
  if ($_GET['idcamp']==$row["0"]) {
    echo "<div class='form-group row'><td align='center'>
     <input type='hidden' value='modificar' name='action'/>  
    <input class='btn btn-warning' id='modificar' type='submit' value='Guardar' name='btnenviar'>
    <a class='btn btn-info col-md-offset-1' href='detallecampania.php'>Cancelar</a></td></div>";
  }else {
    echo "<td align='center'><a class='btn btn-success' href='detallecampania.php?idcamp=".$row["0"]."'>Modificar</a></td>";
  }

}

//Eliminar
echo "<td align='center'>
    <a class='btn btn-danger' href='../controlador/eliminarcampania.php?idcamp=".$row["0"]."'>Eliminar</a></td></tr>";






                
                $numeracion++;
            }

            if(empty($_GET['idcamp'])){

}else {

echo "</div></form>";
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

