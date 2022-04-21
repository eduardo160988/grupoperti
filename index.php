<?php   
	include_once('init.php');
	include_once('config.php');
	include_once('librerias.php');
	
	if (!isset($_SESSION)){
	  session_start();  
	}
		
	
	if(isset($_GET['page'])){
			$page = $_GET['page'];
	}else{
		$page="homepage";
	}
	

	$pages = array(	
		'homepage',		
		'actividad1',		
		'login',
		'actividad2',		
		'logout'		
	);
	
	/**************** seccion que actualiza en caso de que se cuente con https */
	/* if(!$_SERVER["HTTPS"]){
		 header("Location:".WEB_ROOT);
	} */	


	if(!in_array($page, $pages)){
		$page = 'homepage';
	}	

	include_once('seguridad/validacion.php');
	if(isset($_SESSION["Usr"]["proyecto"])){
			$smarty->assign('infoUsuario', $_SESSION['Usr']);	
	}
   
    $smarty->assign('page', $page);	
	$smarty->assign('project', PROJECT_NAME);
	include_once(DOC_ROOT.'/modules/'.$page.'.php');	 
	$smarty->display(DOC_ROOT.'/templates/index.tpl');	
   
?>