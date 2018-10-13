<div class="remodal" data-remodal-id="modal<?php echo $row[0] ?>" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
    <h2 id="modal1Title">Modificar Testimonio</h2>
    <p id="modal1Desc">
      </br>
      <form class="form-horizontal" action="../controlador/testimoniocontrolador.php" method="post" data-toggle="validator">
        <input type="hidden" name="testid" value="<?php echo $row[0] ?>">
        <div class="form-group" >
          <label class="col-md-4 control-label" for="cate" >Testimonio : </label>
          <div class="col-md-5" >
          <textarea id="test" name="txtest" type="text" class="form-control input-md" rows="6" required><?php echo $row[1] ?></textarea> 
          </div>
          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <div class="col-md-3"></div>
          <div class="col-md-6">                                
            
          <button class="remodal-confirm" type="submit" name="action" value="modificar">Actualizar</button>
          <button data-remodal-action="cancel" class="remodal-cancel" >Cancel</button>
          </div>
        </div>
      </form>
    </p>
  </div>
  
</div>
