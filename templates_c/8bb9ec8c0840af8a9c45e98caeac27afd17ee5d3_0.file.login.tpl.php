<?php
/* Smarty version 4.1.0, created on 2022-04-20 19:11:01
  from 'C:\xampp\htdocs\grupoperti\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6260a115e3c638_78583385',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8bb9ec8c0840af8a9c45e98caeac27afd17ee5d3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\grupoperti\\templates\\login.tpl',
      1 => 1650499851,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6260a115e3c638_78583385 (Smarty_Internal_Template $_smarty_tpl) {
?>	<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/images/logo.png" width="300px">   
						 </div>
					</div>
                   <form action="javascript:void(0)" id="frmLogin" method="post" name="login">
                           <div class="form-group">
                              <label for="email">Correo electrónico</label>
                              <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="">
                           </div>
                           <div class="form-group">
                              <label for="passwd">Contraseña</label>
                              <input type="password" name="passwd" id="passwd"  class="form-control"  placeholder="">
                           </div>
                          
                           <div class="text-center " style="display: inline;">
                              <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
" class=" btn btn-block mybtn btn-danger tx-tfm">Regresar </a>
                               <a href="javascript:void(0)" id="login" class=" btn btn-block mybtn btn-primary tx-tfm">Iniciar</a>
                           </div>
                      
                          
                        </form>
                 
				</div>
			</div>
      </div>
		<?php }
}
