<?php
$usuarios = $usuario->getUsuarios();
	$smarty->assign("usuarios",$usuarios);

	//echo "<pre>"; print_r($usuarios); exit;
?>