<form id="frmUserEdit" action="javascript:void(0)">
			  <input type="hidden" name="opcion" id="opcion" value="UpdateUser">
			  <input type="hidden" name="usuarioId" id="usuarioId" value="{$info.usuarioId}">
			  <div class="form-group">
			    <label for="nombre">Nombre</label>
			    <input type="text" class="form-control" id="nombre" name="nombre" value="{$info.nombre}" aria-describedby="nombre" placeholder="Ingresa el nombre del usuario" required>
			  	<small id="error_nombre" class="error" > </small>
			  </div>
			  <div class="form-group">
			    <label for="telefono">Telefóno</label>
			    <input type="text" class="form-control" id="telefono" name="telefono" value="{$info.telefono}" aria-describedby="telefono" required maxlength="10" onkeypress="return solonumeros(event);" >
			    <small id="error_telefono" class="error" > </small>
			  </div>
			  <div class="form-group">
			    <label for="telefono">Correo electrónico</label>
			    <input type="email" class="form-control" id="email" name="email" value="{$info.email}" aria-describedby="email" required >
			    <small id="error_email" class="error" > </small>
			  </div>

			 
			   <div class="form-group">
			    <label for="rfc">RFC</label>
			    <input type="text" class="form-control" id="rfc" name="rfc" value="{$info.rfc}" aria-describedby="rfc" required>
			    <small id="error_rfc" class="error" > </small>
			  </div>
			  <div class="form-group">
			    <label for="notas">Notas</label>
			    <textarea id="notas" name="notas" rows="3" class="form-control">{$info.notas}</textarea>
			  </div>

			 <div class="float-right">
			 	
				  <a href="javascript:void(0)" id="btnEditSave"  class="btn btn-primary">Actualizar</a>
			 </div>
			  
		</form>