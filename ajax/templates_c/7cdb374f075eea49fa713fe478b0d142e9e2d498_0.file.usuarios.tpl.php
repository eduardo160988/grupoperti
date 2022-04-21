<?php
/* Smarty version 4.1.0, created on 2022-04-20 23:43:44
  from 'C:\xampp\htdocs\grupoperti\templates\actividad2\usuarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6260e100a80c35_62210198',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7cdb374f075eea49fa713fe478b0d142e9e2d498' => 
    array (
      0 => 'C:\\xampp\\htdocs\\grupoperti\\templates\\actividad2\\usuarios.tpl',
      1 => 1650514675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6260e100a80c35_62210198 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row" style="padding-top:30px">
	<div class="col-md-12"><h3>Usuarios</h3></div>
	<div class="col-md-12">
		<table class="table" id="tableUsers">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Correo electrónico</th>
					<th>RFC</th>
					<th>Notas</th>
					<th></th>
				</tr>
			</thead>
			<body>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'item', false, 'key');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
				<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['item']->value['telefono'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
						<td><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['item']->value['rfc'], 'UTF-8');?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['item']->value['notas'];?>
</td>
						<td>
							<i class='bx bx-pencil nav_icon pointer' onclick="editar(<?php echo $_smarty_tpl->tpl_vars['item']->value['usuarioId'];?>
)" ></i>
							<i class='bx bx-lock nav_icon pointer' onclick="editarPass(<?php echo $_smarty_tpl->tpl_vars['item']->value['usuarioId'];?>
)" ></i>
						</td>
				</tr>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</body>
		</table>		
	</div>


</div>
<?php }
}
