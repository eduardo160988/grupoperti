<?php 

ini_set("display_errors", "ON"); 
error_reporting(E_ERROR |  E_PARSE);

date_default_timezone_set('America/Mexico_City');
header('Content-type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado


mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

mb_language('uni');
mb_regex_encoding('UTF-8');
ob_start('mb_output_handler');



?>