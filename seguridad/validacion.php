<?php
//unset($_SESSION);
	if($page=="login"){
		if(isset($_SESSION["Usr"]["proyecto"])){
			header("Location:".WEB_ROOT."/actividad2");
		}	
	}

	if($page=="actividad2"){
		if(!isset($_SESSION["Usr"]["proyecto"])){
		//	echo $page." dos"; exit;	
			header("Location:".WEB_ROOT."/login");
		}
	}	
	//print_r($_SESSION);

?>