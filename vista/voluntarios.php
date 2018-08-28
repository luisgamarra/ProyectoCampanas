<?php
require_once ('../modelo/conexion.php');
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

 <form id="form1" name="form1" method="post" action="">
<td style="text-align:right">Campañas</td>
   <select class="form-control" name="cbocam" id="cbocam" onChange="submit()" >
    <option value="0" >Seleccione</option>     

<?php
    
/**$sql="select u.firstname,u.lastname,u.email,u.cellphone, from users u inner join campaigns c on u.user_id=c.user_id
inner join details_campaigns d on c.campaign_id=d.campaign_id 
where Idesp='$esp'";**/

$cod = $_SESSION["cod"];
$c =$_SESSION["ca"]=@$_POST["cbocam"];

$sql="select campaign_id,title from campaigns where user_id = $cod";
$result=ejecutar($sql);
while($row=mysqli_fetch_array($result)){
    if($c==$row[0]){
    echo "<option value='".$row[0]."' selected>".$row{1}."</option>";
    }else{
    echo "<option value='".$row[0]."' >".$row{1}."</option>";   
    }
}

?>
</select>


         <div align="center"><br />
    <h3>Voluntarios</h3><br>
    <table class="table table-responsive table-striped" width="500" border="2" >
      <tr>
        <th>Nº</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Email</th>
    <th>Celular</th>
    
    </tr>    

<?php

$numeracion = 1;

$consul="select u.firstname,u.lastname,u.email,u.cellphone from details_campaigns d inner join users u on d.user_id=u.user_id where d.campaign_id = '$c'";
$result=ejecutar($consul);

while($row=mysqli_fetch_array($result)){
    
    echo "<tr>
    <td>".$numeracion."</td>
    <td>".$row[0]."</td>
    <td>".$row[1]."</td>
    <td>".$row[2]."</td>
    <td>".$row[3]."</td>
    
    </tr>";
    $numeracion++;
    }

?>
</table>

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

