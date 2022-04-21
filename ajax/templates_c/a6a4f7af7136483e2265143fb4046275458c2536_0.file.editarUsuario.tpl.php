<?php
/* Smarty version 4.1.0, created on 2022-04-20 23:43:41
  from 'C:\xampp\htdocs\grupoperti\templates\actividad2\editarUsuario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6260e0fd7b3641_97642400',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6a4f7af7136483e2265143fb4046275458c2536' => 
    array (
      0 => 'C:\\xampp\\htdocs\\grupoperti\\templates\\actividad2\\editarUsuario.tpl',
      1 => 1650516214,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6260e0fd7b3641_97642400 (Smarty_Internal_Template $_smarty_tpl) {
?><form id="frmUserEdit" action="javascript:void(0)">
			  <input type="hidden" name="opcion" id="opcion" value="UpdateUser">
			  <input type="hidden" name="usuarioId" id="usuarioId" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['usuarioId'];?>
">
			  <div class="form-group">
			    <label for="nombre">Nombre</label>
			    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['nombre'];?>
" aria-describedby="nombre" placeholder="Ingresa el nombre del usuario" required>
			  	<small id="error_nombre" class="error" > </small>
			  </div>
			  <div class="form-group">
			    <label for="telefono">Telefóno</label>
			    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['telefono'];?>
" aria-describedby="telefono" required maxlength="10" onkeypress="return solonumeros(event);" >
			    <small id="error_telefono" class="error" > </small>
			  </div>
			  <div class="form-group">
			    <label for="telefono">Correo electrónico</label>
			    <input type="email" class="form-control" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['email'];?>
" aria-describedby="email" required >
			    <small id="error_email" class="error" > </small>
			  </div>

			 
			   <div class="form-group">
			    <label for="rfc">RFC</label>
			    <input type="text" class="form-control" id="rfc" name="rfc" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['rfc'];?>
" aria-describedby="rfc" required>
			    <small id="error_rfc" class="error" > </small>
			  </div>
			  <div class="form-group">
			    <label for="notas">Notas</label>
			    <textarea id="notas" name="notas" rows="3" class="form-control"><?php echo $_smarty_tpl->tpl_vars['info']->value['notas'];?>
</textarea>
			  </div>

			 <div class="float-right">
			 	
				  <a href="javascript:void(0)" id="btnEditSave"  class="btn btn-primary">Actualizar</a>
			 </div>
			  
		</form><?php }
}
