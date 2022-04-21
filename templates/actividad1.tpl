<div class="row">

	<div class="col-md-6 ">
		<form id="frmUser" action="javascript:void(0)">
			  <input type="hidden" name="opcion" id="opcion" value="SaveUsuario">
			  <div class="form-group">
			    <label for="nombre">Nombre</label>
			    <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombre" placeholder="Ingresa el nombre del usuario" required>
			  	<small id="error_nombre" class="error" > </small>
			  </div>
			  <div class="form-group">
			    <label for="telefono">Telefóno</label>
			    <input type="text" class="form-control" id="telefono" name="telefono" aria-describedby="telefono" required maxlength="10" onkeypress="return solonumeros(event);" >
			    <small id="error_telefono" class="error" > </small>
			  </div>
			  <div class="form-group">
			    <label for="telefono">Correo electrónico</label>
			    <input type="email" class="form-control" id="email" name="email" aria-describedby="email" required >
			    <small id="error_email" class="error" > </small>
			  </div>

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
			   <div class="form-group">
			    <label for="rfc">RFC</label>
			    <input type="text" class="form-control" id="rfc" name="rfc" aria-describedby="rfc" required>
			    <small id="error_rfc" class="error" > </small>
			  </div>
			  <div class="form-group">
			    <label for="notas">Notas</label>
			    <textarea id="notas" name="notas" rows="3" class="form-control"></textarea>
			  </div>

			 <div class="float-right">
			 	<a href="{$WEB_ROOT}" class="btn btn-danger">Regresar </a>
				  <a href="javascript:void(0)" id="btnSaveForm" class="btn btn-primary">Crear usuario</a>
			 </div>
			  
		</form>
	</div>
		<div class="col-md-6" id="positionUsuariosList">
		{include file="{$DOC_ROOT}/templates/listaUsuarios.tpl"}
		
	<!--	
		<p>
			  	1. Realiza un formulario de registro de usuario que contenga los siguientes campos (nombre,
		teléfono, correo, contraseña, confirmación de contraseña, RFC y notas.), considerando los
		siguientes puntos:
       </p>
       <ul>
       	<li> Usa la librería Bootstrap para un registro responsivo. </li>
       	<li> Realiza una validación en front (con JS) y backend (con PHP) para los datos. Valide que el RFC cumpla con persona moral o física. </li>
       	<li> Si las validaciones son correctas usa PHP y guarda en base de datos la IP desde donde se hace el registro.</li>
       	<li> Guarda todos los datos en una base de datos local SQL con la contraseña cifrada.</li>
       	<li> El diseño y usabilidad del registro también se evaluará. </li>
       	<li> Realiza el registro de al menos 2 usuarios desde este formulario (el correo puede ser inventado).</li>
       </ul>-->
	</div>
</div>