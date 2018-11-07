<div class="remodal" data-remodal-id="modal2" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
    <h2 id="modal1Title"></h2>
    <p id="modal1Desc">
      </br>
      <form class="form-horizontal" action="PDFvoluntario1.php" method="post" data-toggle="validator">
        
         <div class="form-group">
         <label class="col-md-4 control-label" for="camp" >Elige Campaña : </label>
          <div class="col-md-4">
          <select class="form-control" name="cbocamp" id="cbocamp" >
            
         <option value="" >-- Seleccione --</option>

        <?php

$cod = $_SESSION["cod"];
$codcamp =$_POST["cbocamp"];

$campania = new Campania();
$campania->setUserid($cod);
$r = $campania->campaniaporusuario();

while($row=mysqli_fetch_array($r)){
    if($codcamp==$row[0]){
    echo "<option value='".$row[0]."' selected>".$row[1]."</option>";
    $nombre = $row[1];
    }else{
    echo "<option value='".$row[0]."' >".$row[1]."</option>";   
    }
}

?>
          </select>          
          </div> 
        </div>

 <!--<div class="form-group">
          <label class="col-md-4 control-label" for="par" >Participaciones : </label>
          <div class="col-md-4">
          <select class="form-control" name="par" id="par" >
            
         <option value="" >-- Seleccione --</option>
         <option value="1">1 campaña</option>
         <option value="2">2 campañas</option>  
         <option value="3">3 campañas</option> 
         <option value="4">4 campañas</option> 
         <option value="5">Mas de 5 campañas</option> 
          </select>          
          </div>    

        </div>-->       
        
          
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

