<div class="remodal" data-remodal-id="modal1" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
    <h2 id="modal1Title"></h2>
    <p id="modal1Desc">
      </br>
      <form class="form-horizontal" action="PDFcampania1.php" method="post" data-toggle="validator">
        
        <div class="form-group">
          <label class="col-md-4 control-label" for="fecha" >Desde : </label>
          <div class="col-md-4">
          <input id="fecha1" onchange="ValidarFechaInicial();" name="txtfecha1" type="text" placeholder="desde" class="form-control input-md">      
          </div>
        </div>
         <div class="form-group">    
          <label class="col-md-4 control-label" for="fecha" >Hasta : </label>
          <div class="col-md-4">
          <input id="fecha2" onchange="ValidarFechaFinal();" name="txtfecha2" type="text" placeholder="hasta" class="form-control input-md">         
          </div>
          </div>

          <div class="form-group">   
          <label class="col-md-4 control-label" for="cate" >Categoria : </label>
          <div class="col-md-4">
          <select class="form-control" name="cate" id="cate" >
            
         <option value="" >-- Seleccione --</option>

         <?php    

          $cod = $_SESSION["cod"];
          $codcat=$_POST["cate"];

          $sql1= "SELECT * FROM categorias";
          $rc = ejecutar($sql1); 
          
          while($row=mysqli_fetch_array($rc)){
          if($codcat == $row[0]){
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
          <label class="col-md-4 control-label" for="lug" >Lugar : </label>
          <div class="col-md-4">
          <select class="form-control" name="lug" id="lug" >
            
         <option value="" >-- Seleccione --</option>

         <?php    

          //$cod = $_SESSION["cod"];
          $lug=$_POST["lug"];

          $sql1 = "SELECT DISTINCT(place) FROM campaigns";
          $rl = ejecutar($sql1);
          
          while($row = mysqli_fetch_array($rl)){
          if($lug == $row[0]){
          echo "<option value='".$row[0]."' selected>".$row[0]."</option>";
          }else{
          echo "<option value='".$row[0]."' >".$row[0]."</option>"; 

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





