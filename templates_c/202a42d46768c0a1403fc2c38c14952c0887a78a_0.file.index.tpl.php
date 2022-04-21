<?php
/* Smarty version 4.1.0, created on 2022-04-20 23:13:03
  from 'C:\xampp\htdocs\grupoperti\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6260d9cf98f076_87562754',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '202a42d46768c0a1403fc2c38c14952c0887a78a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\grupoperti\\templates\\index.tpl',
      1 => 1650514379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6260d9cf98f076_87562754 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE HTML>

<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/css/style.css" >
		<?php if ($_smarty_tpl->tpl_vars['page']->value == "login") {?>
			<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/css/login.css" >
		<?php } elseif ($_smarty_tpl->tpl_vars['page']->value == "actividad2") {?>
			<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/css/actividad2.css" >
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >
			<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" >


		<?php }?>
		<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="//cdn.jsdelivr.net/npm/sweetalert2@11"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 >
			WEB_ROOT= "<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
"; 
		 <?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/js/<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
.js"><?php echo '</script'; ?>
>

	</head>
	<body  id="body-pd">
		<?php if ($_smarty_tpl->tpl_vars['page']->value != "actividad2") {?>
		<div class="container-fluid">
			<div class="row">
				
					<div class="col-md-12">
						
						<?php if ($_smarty_tpl->tpl_vars['page']->value == "homepage") {?>
					         <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['DOC_ROOT']->value)."/templates/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
							 <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['DOC_ROOT']->value)."/templates/homepage.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					    <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == "actividad1") {?>
					         <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['DOC_ROOT']->value)."/templates/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					 		 <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['DOC_ROOT']->value)."/templates/actividad1.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
					    <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == "login") {?>
							 <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['DOC_ROOT']->value)."/templates/login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
						
						<?php }?>
					</div>
					
				
			</div>
		</div>
		<?php } else { ?>
 			<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['DOC_ROOT']->value)."/templates/actividad2/index.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
		<?php }?>	

		<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['DOC_ROOT']->value)."/templates/actividad2/modal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
	</body>
</html><?php }
}
