<?php
/* Smarty version 4.1.0, created on 2022-04-20 23:21:35
  from 'C:\xampp\htdocs\grupoperti\templates\actividad2\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6260dbcfc77eb7_46328062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a889661b03f7feddaded340824d765235f94c4d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\grupoperti\\templates\\actividad2\\index.tpl',
      1 => 1650514893,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6260dbcfc77eb7_46328062 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="" style="color:#ffffff;font-size: 10px"> BIENVENIDO <?php echo mb_strtoupper($_smarty_tpl->tpl_vars['infoUsuario']->value['nombre'], 'UTF-8');?>
 <br><?php echo mb_strtolower($_smarty_tpl->tpl_vars['infoUsuario']->value['email'], 'UTF-8');?>
 </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
            	<a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/actividad2" class="nav_logo"> <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/images/logo2.png" width="28px"> <span class="nav_logo-name">Grupo PERTI</span> </a>
               <div class="nav_list"> 
                 <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
" class="nav_link "> <i class='bx bx-home nav_icon'></i> <span class="nav_name">Usuarios</span> </a> 
              	 <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/actividad2" class="nav_link active"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Usuarios</span> </a> 

              	 
              </div>
            </div> <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar sessión</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 ">
       	<div class="container" id="positionUsuarios">
       			<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['DOC_ROOT']->value)."/templates/actividad2/usuarios.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
       	</div>
    </div><?php }
}
