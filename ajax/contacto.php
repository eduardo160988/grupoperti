<?php

include_once('../init.php');
include_once('../config.php');
include_once(DOC_ROOT.'/librerias.php');
session_start();
//echo DOC_ROOT;
//print_r($_POST);
switch($_POST["opcion"]) 
{
	
	case "envio":
			
			 
			 $errores=array();
				
				if(strlen(trim($_POST["nombre"]))==0){
					$errores[]="Nombre Obligatorio";
				}
				if(strlen(trim($_POST["email"]))==0){
					$errores[]="correo electr&oacute;nico obligatorio";
				}else if (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
					$errores[]="correo electr&oacute;nico no valido";
				}
				if(strlen(trim($_POST["cel"]))==0){
					$errores[]="El número celular es obligatorio";
				}else if(strlen(trim($_POST["cel"]))!=10){
					$errores[]="El número celular deben ser 10 digitos";
				}
				if(strlen(trim($_POST["mensaje"]))<10){
					$errores[]="Mensaje demasiado corto";
				}
				if(count($errores)>0){
					 echo "fail[#]";
					foreach($errores as $key=>$row){
						
						if($key==0){echo $row; }else{ echo "<br/>  \n".$row; } 
					}
				}else{
					$correos=$correo->EnumerateNotificaciones();
					echo "ok[#]";
					foreach($correos as $key=>$row){
						$correo->setAsunto("Nos han contactado en dentalcoid.com");
						$correo->setEmailDestino($row["email"]);
						$correo->setDestinoNombre($row["nombre"]);
						$_POST["opcion"]="contacto";
						$correo->setMensaje($_POST);
						$correo->envio();
						
					}
					$correo->SaveMensaje($_POST);
				}
	         
	break;
	case "covid":
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/page2/contenedor/covid.tpl');
	break;
	case "odontologia-integral":
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/page2/contenedor/odontologia-integral.tpl');
	break;
	case "ozonoterapia":
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/page2/contenedor/ozonoterapia.tpl');
	break;
	case "diabeticos":
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/page2/contenedor/diabeticos.tpl');
	break;
	case "plaquetas":
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/page2/contenedor/plaquetas.tpl');
	break;
	case "laser":
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/page2/contenedor/laser.tpl');
	break;
	case "nutricion":
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/page2/contenedor/nutricion.tpl');
	break;
	case "ozono-caries":
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/page2/contenedor/ozono-caries.tpl');
	break;
	case "ozono-limpieza":
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/page2/contenedor/ozono-limpieza.tpl');
	break;
	case "ozono-endo":
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/page2/contenedor/ozono-endo.tpl');
	break;
	case "ozono-orto":
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/page2/contenedor/ozono-orto.tpl');
	break;
	case "ozono-peri":
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/page2/contenedor/ozono-peri.tpl');
	break;
	case "ozono-aclara":
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/page2/contenedor/ozono-aclara.tpl');
	break;
	case "ozono-ciru":
			echo "ok[#]";
			$smarty->display(DOC_ROOT.'/templates/page2/contenedor/ozono-ciru.tpl');
	break;
	case "cierre":
			echo "ok[#]";
	break;
}

?>