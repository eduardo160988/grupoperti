<form id="frmUserEditPass" action="javascript:void(0)">
			  <input type="hidden" name="opcion" id="opcion" value="UpdatePass">
			  <input type="hidden" name="usuarioId" id="usuarioId" value="{$info.usuarioId}">
			  <div class="form-group">
			    <label for="passwd">Contraseña</label>
			    <input type="password" class="form-control" id="passwd" name="passwd" placeholder="contraseña" required maxlength="10">
			    <small id="error_passwd" class="error" > </small>
			  </div>
			   <div class="form-group">
			    <label for="passwd2">Confirma contraseña</label>
			    <input type="password" class="form-control" id="passwd2" name="passwd2" placeholder="Confirma tu contraseña" maxlength="10" required>
			    <small id="error_passwd2" class="error" > </small>
			  </div>

			   <div class="float-right">
			 	
				  <a href="javascript:void(0)" id="btnEditPass"  class="btn btn-primary">Actualizar</a>
			 </div>
			  
		</form>