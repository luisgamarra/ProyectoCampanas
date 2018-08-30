<?php
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

<body>

<?php include("menutop.php"); ?>

<div id="wrapper">

<?php include("menu-admin.php"); ?>


<div id="page-content-wrapper">
<div class="container-fluid">
<div class="col-lg-12">
      
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

