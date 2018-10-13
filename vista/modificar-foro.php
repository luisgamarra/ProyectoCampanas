<div class="remodal" data-remodal-id="modal<?php echo $row[0] ?>" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
  <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
  <div>
    <h2 id="modal1Title">Modificar Foro</h2>
    </br>
    <p id="modal1Desc">
      <form class="form-horizontal" action="../controlador/forocontrolador.php" method="post" data-toggle="validator">
        <input type="hidden" name="foroid" value="<?php echo $row[0] ?>">
        <div class="form-group" >
          <label class="col-md-4 control-label" for="cate" >Titulo : </label>
          <div class="col-md-5" >
          <input id="forito" name="txtforo" type="text" class="form-control input-md" value="<?php echo $row[1] ?>" required>
          </div>
          <div class="help-block with-errors"></div>
        </div>
      </br></br>
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
