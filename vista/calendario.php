<?php 
require_once ('../db/conexion.php');

require_once ('../modelo/reunion.php');
session_start();
conectar();
include('templates/validar.php');
 ?>

 <?php 

$cod = $_SESSION["cod"];
$reunion=new Reunion();
$reunion->setUserid($cod);
$resultados = $reunion->reunionporusuario();

  ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset='utf-8' />
			
	<link href='css/fullcalendar.css' rel='stylesheet' />
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/notificacion.css" rel="stylesheet" >				
					
</head>
<body>

<?php include("templates/menutop.php"); ?>

<div id="wrapper">

<?php include("templates/menu-admin.php"); ?>

<div id="page-content-wrapper">
   <div class="container-fluid">

<div class="table table-responsive">
		<div id='calendar' style="width: 1000px;margin: 0 auto;"></div>
		<a href="planificar-reuniones.php"><<<<< Volver</a>
		</div>
</div>    
         

</div>
</div>         
<footer>        
</footer>
           
<script src='js/moment.min.js'></script>
<script src='js/jquery.min.js'></script>			
<script src='js/fullcalendar.js'></script>
<script src="js/bootstrap.min.js"></script>
<script src='js/locale-all.js'></script>





<script>
  $("#menu-toggle").click(function(e) {
      e.preventDefault();
  $("#wrapper").toggleClass("toggled");
        });

</script> 


<script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
					locale:'es',
					header: {
						left: 'prev,next today',
						center: 'title',
						//right: 'month,agendaWeek,agendaDay'
					},

					defaultDate: Date(),
					weekNumbers: true,
					navLinks: true, // can click day/week names to navigate views
					editable: false,
					eventLimit: true, // allow "more" link when too many events
					events: [
						<?php
							while($row_events = mysqli_fetch_array($resultados)){
								?>
								{
								id: '<?php echo $row_events['reunion_id']; ?>',
								title: "<?php echo $row_events['title'];
											echo '\n';
										 echo $row_events['topic']; 
											echo '\n';
										 echo $row_events['hours']; ?>",
								start: '<?php echo $row_events['dates']; ?>',
								end: '<?php echo $row_events['dates']; ?>',
								color: 'red',
								},<?php
							}
						?>
					]
				});
			});
		</script>

<?php 
include('templates/notificacion.php');
 ?>

</body>
</html>