<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
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
    <link href="css/datatables.css" rel="stylesheet">
    <link href="css/notificacion.css"rel="stylesheet">     
</head>

<body background="img/fondito1.jpg">

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>
 
<div id="page-content-wrapper">
                <div class="container-fluid"> 

 

     <div class="panel panel-primary">
 
  <div class="panel-heading" style="text-align:center;"><h2>Registros de Campañas</h2></div>
  </br>
  <center><a href="ficheroexcelcampanias.php" class="btn btn-success">Exportar Excel</a></center>
  </br> </br> 
  <div class="table-responsive">        
                  <table class="table table-hover" id="tablita" border="0" >
                    <thead>
                  <tr bgcolor="#ABBCB7  ">
                  <th style="text-align:center;">N°</th>
                  <th style="text-align:center;">Nombre</th>
                  <th style="text-align:center;">Descripciòn</th>
                  <th style="text-align:center;">Lugar</th>
                  <th style="text-align:center;">Vacantes</th>
                  <th style="text-align:center;">Fecha Inicial</th>
                  <th style="text-align:center;">Fecha Final</th> 
                  <th style="text-align:center;">Imagen</th>
                  <th style="text-align:center;">Categoria</th>                
                  <th style="text-align:center;">Editar</th>
                  <th style="text-align:center;">Eliminar</th>
                  </tr>
                </thead>


<?php               
          
          $cod = $_SESSION["cod"];           

          $campania = new Campania();
          $campania->setUserid($cod);
          $r = $campania->campaniaporusuario();
                
          $numeracion=1;




while ($row = mysqli_fetch_array($r)) {

echo "<tr BGCOLOR='white'><td align='center'>".$numeracion."</td>";

//Titulo
echo "<td align='center'>".$row["1"]."</td>";

//Descripcion
$des = substr($row["2"],0,50);  
echo "<td align='center' style= 'font-size:12px;'>".$des."</td>";

//Lugar
echo "<td align='center'>".$row["3"]."</td>";

//Vacantes
echo "<td align='center'>".$row["4"]."</td>";

//Fecha inicial
echo "<td align='center'>".$row["5"]."</td>";

//Fecha Final
echo "<td align='center'>".$row["6"]."</td>";

//imagen
echo "<td align='center'><img src='img/".$row["7"]."' width='75px'  ></td>";

//categoria
echo "<td align='center'>".$row["10"]."</td>";

//Modificar
echo "<td align='center'><a class='btn btn-success' href='modificar-campania.php?idcamp=".$row["0"]."'>Modificar</a></td>";

//Eliminar
echo "<td align='center'>      
       <a class='btn btn-danger' onclick='return Confirmation()' href='../controlador/campaniacontrolador.php?action=eliminar&&idcamp=".$row["0"]."'>Eliminar</a></td</tr>";
           
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

<script src="https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"></script>
<script src="js/datatables.js"></script>

<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script> 

<script>
  
  $(document).ready(function() {
    $('#tablita').DataTable( {

      
        lengthMenu: [[5,10,20,-1],["5","10","20","Todos"]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",

        }


      })
} );

</script>

<script type="text/javascript">
function Confirmation() {
 
  if (confirm('Esta seguro de eliminar el registro?')==true) {
      
      return true;
  }else{
      //alert('Cancelo la eliminacion');
      return false;
  }
}
</script>



<?php 
include('templates/notificacion.php');
 ?>

</body>

</html>

