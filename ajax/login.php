<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/librerias.php');
session_start();


             $usuario->setEmail($_POST["email"]);
             $usuario->setPasswd($_POST["passwd"]);
			 $infoUusario=$usuario->login();
			 $login=0;
			
			 if($infoUusario){
						$_SESSION["Usr"]["proyecto"]="perti";
						$_SESSION["Usr"]["nombre"]=$infoUusario["nombre"];
						$_SESSION["Usr"]["email"]=$infoUusario["email"];
						$_SESSION["Usr"]["telefono"]=$infoUusario["telefono"];
						$_SESSION["Usr"]["rfc"]=$infoUusario["rfc"];
					    echo "ok[#]";
						exit;
				   
				 
			 }else{
				 echo "fail[#]";
				 echo "datos de acceso no validos";
			 }

?>