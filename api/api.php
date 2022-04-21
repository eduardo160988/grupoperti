<?php
	include_once('../init.php');
	include_once('../config.php');
	include_once('../librerias.php');


if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	 switch($_GET["opcion"]){	

		  case "getUsuarios":
		  		
				$usuarios = $usuario->getUsuarios();				
				$resultado["status"]="ok";
				$resultado["data"]= $usuarios;

		  break;
		  case "getUsuario":	
		  		$usuario->setUsuarioId($_GET["id"]);
		  		$infoUsuario=$usuario->InfoUsuario();
							
				if($infoUsuario){
					$resultado["status"]="ok";
					$resultado["data"]= $infoUsuario;
				}else{
					$resultado["status"]="fail";
					$resultado["error"]="No se encontro informacion de usuario";
				}
		  break;
		  default:
		  	$code = 300;
		  	$mensajeError="No encontrado";
		  break;
	}
	  
	 
   	 
	  
	 
     
}else if($_SERVER['REQUEST_METHOD'] == 'PUT'){
	// $datos = $util->quitarSaltos(file_get_contents('php://input'));
	 $datos=json_decode(file_get_contents('php://input'));
    switch($datos->opcion){	

		  case "SaveUser":
				$errores = array();
				if(strlen(trim($datos->nombre)) == 0){
					$errores[]="Nombre Obligatorio";
				}
				if(strlen(trim($datos->telefono)) == 0){
					$errores[]="Telefono obligatorio";
				}else if(strlen(trim($datos->telefono)) != 10){
					$errores[]="Telefono no valido";
				}

				if(strlen(trim($datos->email)) == 0){
					$errores[]="correo electrónico obligatorio";
				}else if (!filter_var(trim($datos->email), FILTER_VALIDATE_EMAIL)) {
					$errores[]="correo electrónico no valido";
				}

				if(strlen(trim($datos->passwd)) == 0){
					$errores[]="contraseña obligatoria";
				}else if (trim($datos->passwd)!=trim($datos->passwd2)) {
					$errores[]="Contraseñas no coinciden";
				}else if($usuario->Repetido(trim($datos->email))){
					$errores[]="Email ya se encuentra registrado";
				}

				if(strlen(trim($datos->rfc)) == 0){
					$errores[]="RFC obligatorio";
				}else if ($util->validarRFC(trim($datos->rfc))) {
					$errores[]="RFC no valido";
				}else if($usuario->RepetidoRfc(trim($datos->rfc))){
					$errores[]="RFC ya se encuentra registrado";
				}
				if(count($errores)>0){
						$resultado["status"]="fail";
 						$resultado["error"]=$errores;
 						
				}else{
					$resultado["status"]="ok";
					$usuario->setNombre(trim($datos->nombre));
					$usuario->setTelefono(trim($datos->telefono));
					$usuario->setEmail(trim($datos->email));
					$usuario->setPasswd(trim($datos->passwd));
					$usuario->setRfc(trim($datos->rfc));
					$usuario->setNotas(trim($datos->notas));
					$usuario->Save();
				}
		  break;
		  
	}

	 
	 
	  
   	 
   	  
}else if($_SERVER['REQUEST_METHOD'] == 'POST'){
	    $datos=json_decode(file_get_contents('php://input'));;
		switch($datos->opcion){	
		case "UpdateUserPass":
				$errores=array();
				if(strlen(trim($datos->passwd)) == 0){
					$errores[]="contraseña obligatoria";
				}else if (trim($datos->passwd)!=trim($datos->passwd2)) {
					$errores[]="Contraseñas no coinciden";
				}else if($usuario->Repetido(trim($datos->email))){
					$errores[]="Email ya se encuentra registrado";
				}

				if(count($errores)>0){
					$resultado["status"]="fail";
	 				$resultado["error"]=$errores;
				}else{
					$usuario->setUsuarioId($datos->usuarioId);
					$usuario->setPasswd($datos->passwd);
					$usuario->UpdatePass();
					$resultado["status"]="ok";
					$resultado["mensaje"]="Contraseña actualizada exitosamente";
				}
			
		break;
		  case "UpdateUser":
		  		$usuario->setUsuarioId($datos->usuarioId);
			    $infoUusario=$usuario->InfoUsuario();

				$errores = array();
				if(strlen(trim($datos->nombre)) == 0){
					$errores[]="Nombre Obligatorio";
				}
				if(strlen(trim($datos->telefono)) == 0){
					$errores[]="Telefono obligatorio";
				}else if(strlen(trim($datos->telefono)) != 10){
					$errores[]="Telefono no valido";
				}

				if(strlen(trim($datos->email)) == 0){
					$errores[]="correo electrónico obligatorio";
				}else if (!filter_var(trim($datos->email), FILTER_VALIDATE_EMAIL)) {
					$errores[]="correo electrónico no valido";
				}else if($infoUusario["email"]!=$datos->email){
					if($usuario->Repetido(trim($datos->email))){
						$errores[]="Email ya se encuentra registrado";
					}
				}

			

				if(strlen(trim($datos->rfc)) == 0){
					$errores[]="RFC obligatorio";
				}else if ($util->validarRFC(trim($datos->rfc))) {
					$errores[]="RFC no valido";
				}

				if(count($errores)>0){
					$resultado["status"]="fail";
	 				$resultado["error"]=$errores;
				}else{
					
					$usuario->setUsuarioId($datos->usuarioId);
					$usuario->setNombre(trim($datos->nombre));
					$usuario->setTelefono(trim($datos->telefono));
					$usuario->setEmail(trim($datos->email));
					
					$usuario->setRfc(trim($datos->rfc));
					$usuario->setNotas(trim($datos->notas));
					$usuario->UpdateUsuario();
					$resultado["status"]="ok";
					$usuario->setUsuarioId($datos->usuarioId);
			  		$infoUsuario=$usuario->InfoUsuario();
			  		$resultado["data"]= $infoUsuario;

					
				}

		  break;
		  
		}
}
 echo json_encode(  $resultado,JSON_UNESCAPED_UNICODE  );
      exit(); 
header("HTTP/1.1 400 Bad Request");
?>