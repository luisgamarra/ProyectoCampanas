<div class="remodal" data-remodal-id="modal3" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
    <h2 id="modal1Title"></h2>
    <p id="modal1Desc">
      </br>
      <form class="form-horizontal" action="PDFdonaciones.php" method="post" data-toggle="validator">
        
        <div class="form-group">
                  <label class="col-md-4 control-label" for="fecha" >Campaña : </label>

  <div class="col-md-4">
   <select class="form-control" name="cbocamp" id="cbocamp" >
    <option value="0" >-- Seleccione --</option>     

<?php

$cod = $_SESSION["cod"];
$codcamp = $_POST["cbocamp"];
 $codvol=$_POST["vol"];

$campania = new Campania();
$campania->setuserid($cod);
$r = $campania->campaniaporusuario();

while($row=mysqli_fetch_array($r)){
    if($codcamp==$row[0]){
    echo "<option value='".$row[0]."' selected>".$row[1]."</option>";
    }else{
    echo "<option value='".$row[0]."' >".$row[1]."</option>";   
    }
}

?>
    </select>
   </div>
 </div>


  <div class="form-group">
                  <label class="col-md-4 control-label" for="vol" >Voluntario : </label>
  <div class="col-md-4">
         <select class="form-control" name="vol" id="vol" >
         <option value="0" >--Seleccione--</option>

         <?php
 $sql = "SELECT DISTINCT(d.user_id),u.firstname,u.lastname from details_campaigns d inner join campaigns c on d.campaign_id=c.campaign_id inner join users u on u.user_id=d.user_id where c.user_id=$cod and d.estado=1 ";
 $fila = ejecutar($sql);            

         while($row=mysqli_fetch_array($fila)){
         if($codvol==$row[0]){
          echo "<option value='".$row[0]."' selected>".$row[1]." ".$row[2]."</option>";
          }else{
          echo "<option value='".$row[0]."' >".$row[1]." ".$row[2]."</option>";   
          }
          }
          ?>      
          </select>
          </div>

        </div>

           <!-- Button -->
        <div class="form-group">
          <div class="col-md-3"></div>
          <div class="col-md-6">
                                    
          <button class="remodal-confirm" block="true" type="submit" name="action" value="create"> Generar Reporte </button>       
          <button data-remodal-action="cancel" class="remodal-cancel" >Cancel</button>
          </div>
        </div>
         
      </form>
    </p>
  </div>
  
</div>


