<?php
/* Smarty version 4.1.0, created on 2022-04-20 23:30:38
  from 'C:\xampp\htdocs\grupoperti\templates\actividad2\editarPass.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6260ddeee33cd5_29106817',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20d490c417341ea730f756093b260412d79dd7b0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\grupoperti\\templates\\actividad2\\editarPass.tpl',
      1 => 1650515165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6260ddeee33cd5_29106817 (Smarty_Internal_Template $_smarty_tpl) {
?><form id="frmUserEditPass" action="javascript:void(0)">
			  <input type="hidden" name="opcion" id="opcion" value="UpdatePass">
			  <input type="hidden" name="usuarioId" id="usuarioId" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['usuarioId'];?>
">
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
			  
		</form><?php }
}
