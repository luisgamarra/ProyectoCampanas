<?php
require_once ('../db/conexion.php');
require_once ('../modelo/campania.php');
conectar();
session_start();  

header('Content-Encoding: UTF-8');
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=campanias.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo "\xEF\xBB\xBF";


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <div class="table-responsive">        
                  <table class="table table-hover" id="tablita" border="2" >
                  	<center><h1>Campañas Sociales</h1></center>
                  	<h3>Organizador: <?php echo $_SESSION["usuario"] ?></h3>
                  	<h3>Fecha: <?php echo date("d/m/Y") ?></h3>
                  
                  	<h3>Hora: <?php 

                  		date_default_timezone_set('america/lima');
                  	echo date("H:i:s"); ?></h3>
                    <thead>
                  <tr bgcolor="#ABBCB7  ">
                  <th style="text-align:center;">N°</th>
                  <th style="text-align:center;">Nombre</th>
                  <th style="text-align:center;">Descripciòn</th>
                  <th style="text-align:center;">Lugar</th>
                  <th style="text-align:center;">Vacantes</th>
                  <th style="text-align:center;">Fecha Inicial</th>
                  <th style="text-align:center;">Fecha Final</th>                  
                  <th style="text-align:center;">Categoria</th>                
                  
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




  //categoria
echo "<td align='center'>".$row["10"]."</td>";


           
$numeracion++;

}


               
?>               
                
                </table>   



</body>
</html>