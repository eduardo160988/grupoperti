<?php

require(DOC_ROOT_CLASSES.'/librerias/smarty/libs/Smarty.class.php');

include_once(DOC_ROOT_CLASSES.'/classes/db.class.php');
$db = new DB;

include_once(DOC_ROOT_CLASSES.'/classes/error.class.php');
$error = new Error2;

include_once(DOC_ROOT_CLASSES.'/classes/util.class.php'); 
$util = new Util;

include_once(DOC_ROOT_CLASSES.'/classes/main.class.php');
$main = new Main;

include_once(DOC_ROOT_CLASSES.'/classes/class.phpmailer.php');
include_once(DOC_ROOT_CLASSES.'/classes/class.smtp.php');

include_once(DOC_ROOT_CLASSES.'/classes/usuario.class.php');
$usuario = new Usuario;






$smarty = new Smarty;

$smarty->assign('DOC_ROOT',DOC_ROOT);
$smarty->assign('WEB_ROOT',WEB_ROOT);
$smarty->assign('WEB_ROOT_COMPUTER',WEB_ROOT);

?>