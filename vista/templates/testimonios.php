

<section class="seccion contenedor">
  <h2>Testimonios</h2>
 <center><div class="holder1"></div></center>      
  

  <?php
    try {
      require_once('db/conexion.php');
      require_once('modelo/testimonio.php');
      conectar();

      $test = new Testimonio();
      $r = $test->listartestimonios();
      
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  ?>



    
<section id="campanas" class="campanas contenedor seccion">
         <ul class="lista-campanas clearfix" id="itemContainer1">

                <?php 

                    while ($row = mysqli_fetch_array($r)) {


                      echo "<li>
                       <div class='card' style='width: 300px;background-color:#0EF387;border:5px solid;border-color:#0EF387'>
                      <img class='card-img-top' src='vista/img/".$row[4]."' class='img-rounded' width='290px' height='200px' >
                      <div class='card-body'>
                      <h6 class='card-subtitle mb-2 text-muted' style='text-align:center'>".$row[2]." ".$row[3]."</h6>
                      <p class='card-text'><i>“".$row[1]."”</i></p>
                      </div>
                      </div>
                      </li>";
                     
                    }




                ?>
          </ul>
</section>
  
</section>

