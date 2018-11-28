

<section class="seccion contenedor">
  <h2>Campañas</h2>

  <?php
    try {
      require_once('db/conexion.php');
      conectar();
      $sql = "SELECT campaign_id, title,description, place, start_date, imagen ";
      $sql .= " FROM campaigns ";
      $sql .= " WHERE estado='1' and start_date>CURDATE()";
      $sql .= " ORDER BY start_date DESC ";

      $resultado = ejecutar($sql);
    } catch (\Exception $e) {
      echo $e->getMessage();
    }
  ?>

<center><div class="holder">
      </div></center>

    <section id="campanas" class="campanas contenedor seccion">

          <ul class="lista-campanas clearfix" id="itemContainer">
                <?php while ($campanas = $resultado -> fetch_assoc() ) {?>
                        <li>
                          <div class="campana">
                            <a class="campana-info" href="#campana<?php echo $campanas['campaign_id']; ?>">
                            <img src="vista/img/<?php echo $campanas['imagen'] ?>" alt="Campaña1" width='400px' height='200px'>
                            <p><?php echo $campanas['title'] ?></p>
                            </a>
                          </div>
                        </li>
                        <div style="display:none;">
                          <div class="campana-info" id="campana<?php echo $campanas['campaign_id']; ?>">
                              <h2><?php echo $campanas['title'] ?></h2>
                              <h3> <p>Lugar: <?php echo $campanas['place'] ?></p></h3>
                              <img src="vista/img/<?php echo $campanas['imagen'] ?>" alt="Campaña1">
                              <p><?php echo $campanas['description'] ?></p>
                          </div>

                        </div>
                <?php } ?>
          </ul>
    </section>






  </div>

  
</section>
