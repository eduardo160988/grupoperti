<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/librerias.php');
session_start();
//echo DOC_ROOT;
//print_r($_POST);
switch($_POST["opcion"]) 
{
	
	case "SaveUsuario":
		$errores = array();
		if(strlen(trim($_POST['nombre'])) == 0){
			$errores[]="Nombre Obligatorio";
		}
		if(strlen(trim($_POST['telefono'])) == 0){
			$errores[]="Telefono obligatorio";
		}else if(strlen(trim($_POST['telefono'])) != 10){
			$errores[]="Telefono no valido";
		}

		if(strlen(trim($_POST['email'])) == 0){
			$errores[]="correo electrónico obligatorio";
		}else if (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
			$errores[]="correo electrónico no valido";
		}else if($usuario->Repetido(trim($_POST["email"]))){
			$errores[]="RFC ya se encuentra registrado";
		}

		if(strlen(trim($_POST['passwd'])) == 0){
			$errores[]="contraseña obligatoria";
		}else if (trim($_POST["passwd"])!=trim($_POST["passwd2"])) {
			$errores[]="Contraseñas no coinciden";
		}

		if(strlen(trim($_POST['rfc'])) == 0){
			$errores[]="RFC obligatorio";
		}else if ($util->validarRFC(trim($_POST["rfc"]))) {
			$errores[]="RFC no valido";
		}

		if(count($errores)>0){
			echo "fail[#]";
			foreach($errores as $key=>$row){
				if($key==0){ echo $row; }else{ echo "<br>".$row; }
			}
		}else{
			echo "ok[#]";
			$usuario->setNombre(trim($_POST["nombre"]));
			$usuario->setTelefono(trim($_POST["telefono"]));
			$usuario->setEmail(trim($_POST["email"]));
			$usuario->setPasswd(trim($_POST["passwd"]));
			$usuario->setRfc(trim($_POST["rfc"]));
			$usuario->setNotas(trim($_POST["notas"]));
			$usuario->Save();
			$usuarios = $usuario->getUsuarios();
			$smarty->assign("usuarios",$usuarios);
			$smarty->display(DOC_ROOT.'/templates/listaUsuarios.tpl');
		}


	break;
	case "editarPass":
		echo "ok[#]";
		$usuario->setUsuarioId($_POST['usuarioId']);
		$infoUusario=$usuario->InfoUsuario();
		$smarty->assign("info",$infoUusario);
			$smarty->display(DOC_ROOT.'/templates/actividad2/editarPass.tpl');
			echo "[#]";
			echo "Actualizar contraseña a ".$infoUusario["nombre"];
	break;
	case "editarUsuario":
		echo "ok[#]";
		$usuario->setUsuarioId($_POST['usuarioId']);
		$infoUusario=$usuario->InfoUsuario();
		$smarty->assign("info",$infoUusario);
			$smarty->display(DOC_ROOT.'/templates/actividad2/editarUsuario.tpl');
			echo "[#]";
			echo "Editando a ".$infoUusario["nombre"];
	break;
	case "UpdateUser":
		$errores = array();
		if(strlen(trim($_POST['nombre'])) == 0){
			$errores[]="Nombre Obligatorio";
		}
		if(strlen(trim($_POST['telefono'])) == 0){
			$errores[]="Telefono obligatorio";
		}else if(strlen(trim($_POST['telefono'])) != 10){
			$errores[]="Telefono no valido";
		}

		if(strlen(trim($_POST['email'])) == 0){
			$errores[]="correo electrónico obligatorio";
		}else if (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
			$errores[]="correo electrónico no valido";
		}

	

		if(strlen(trim($_POST['rfc'])) == 0){
			$errores[]="RFC obligatorio";
		}else if ($util->validarRFC(trim($_POST["rfc"]))) {
			$errores[]="RFC no valido";
		}

		if(count($errores)>0){
			echo "fail[#]";
			foreach($errores as $key=>$row){
				if($key==0){ echo $row; }else{ echo "<br>".$row; }
			}
		}else{
			echo "ok[#]";
			$usuario->setUsuarioId($_POST['usuarioId']);
			$usuario->setNombre(trim($_POST["nombre"]));
			$usuario->setTelefono(trim($_POST["telefono"]));
			$usuario->setEmail(trim($_POST["email"]));
			
			$usuario->setRfc(trim($_POST["rfc"]));
			$usuario->setNotas(trim($_POST["notas"]));
			$usuario->UpdateUsuario();
			$usuarios = $usuario->getUsuarios();
			$smarty->assign("usuarios",$usuarios);
			$smarty->display(DOC_ROOT.'/templates/actividad2/usuarios.tpl');
		}

	break;
	case "UpdatePass":
		$errores=array();
		if(strlen(trim($_POST['passwd'])) == 0){
			$errores[]="contraseña obligatoria";
		}else if (trim($_POST["passwd"])!=trim($_POST["passwd2"])) {
			$errores[]="Contraseñas no coinciden";
		}

		if(count($errores)>0){
			echo "fail[#]";
			foreach($errores as $key=>$row){
				if($key==0){ echo $row; }else{ echo "<br>".$row; }
			}
		}else{
			echo "ok[#]";
			$usuario->setUsuarioId($_POST['usuarioId']);		
			$usuario->setPasswd(trim($_POST["passwd"]));
			$usuario->UpdatePass();
			
		}
	break;	

}
?>