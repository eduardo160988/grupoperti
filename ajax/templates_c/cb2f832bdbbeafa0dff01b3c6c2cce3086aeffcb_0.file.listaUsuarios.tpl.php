<?php
/* Smarty version 4.1.0, created on 2022-04-20 17:54:04
  from 'C:\xampp\htdocs\grupoperti\templates\listaUsuarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62608f0c1a5870_33723622',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb2f832bdbbeafa0dff01b3c6c2cce3086aeffcb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\grupoperti\\templates\\listaUsuarios.tpl',
      1 => 1650494981,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62608f0c1a5870_33723622 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table table-hover">
			<thead>
				<tr>
					<td>Nombre</td>
					<td>RFC</td>
					<td>Email</td>
				</tr>				
			</thead>
			<tbody>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'item', false, 'key');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
					<tr>
						<td> <?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
</td>
						<td> <?php echo $_smarty_tpl->tpl_vars['item']->value['rfc'];?>
</td>
						<td> <?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
					</tr>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</tbody>
		</table><?php }
}
