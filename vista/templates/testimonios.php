

<section class="seccion contenedor">
  <h2>Testimonios</h2>

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

<center><div class="holder1"></div></center>
      <div class="customBtns">
      <span class="arrowPrev"></span>
      <span class="arrowNext"></span>
    </div>

    <section id="campanas" class="campanas contenedor seccion">

         <ul class="lista-campanas clearfix" id="itemContainer1">

                <?php 

                    while ($row = mysqli_fetch_array($r)) {


                      echo "<center><li>
                       <div class='card' style='width: 240px;background-color:#0EF387;border:5px solid;border-color:#0EF387'>
                      <img class='card-img-top' src='vista/img/".$row[4]."' class='img-rounded' width='230px' height='200px' >
                      <div class='card-body'>
                      <h6 class='card-subtitle mb-2 text-muted'>".$row[2]." ".$row[3]."</h6>
                      <p class='card-text'><i>“".$row[1]."”</i></p>
                      </div>
                      </div>
                      </li></center>";
                     
                    }




                ?>
          </ul>


    </section>






  </div>

  
</section>

