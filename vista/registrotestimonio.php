<div class="remodal" data-remodal-id="modalregistrotest" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
    <h2 id="modal1Title">Agregar Testimonio</h2>
    <p id="modal1Desc">
    </br>
      <form class="form-horizontal" action="../controlador/testimoniocontrolador.php" method="post" data-toggle="validator" >        
        
          <div class="form-group" >
          <label class="col-md-4 control-label" for="des">Descripción : </label>
          <div class="col-md-5" >
          <textarea id="des" name="txtdes" class="form-control input-md" rows="6" cols="12" required></textarea>
         <div class="help-block with-errors"></div>
          </div>
          
        </div>      

               <!-- Button -->
        <div class="form-group">
          <div class="col-md-3">
             
          </div>
          <div class="col-md-6">
           <button  class="remodal-confirm" block="true" type="submit" name="action" value="create">Guardar</button>                      
           <button data-remodal-action="cancel" class="remodal-cancel" >Cancelar</button>
         

          </div>
        </div>
      
  </form>  
    </p>
  </div>
 
</div>
