<?php

		
	$_SESSION['Usr']=array();
	unset($_SESSION);
	
	header('Location: '.WEB_ROOT."/login");
	exit;
		
?>