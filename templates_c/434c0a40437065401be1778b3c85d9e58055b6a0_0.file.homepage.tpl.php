<?php
/* Smarty version 4.1.0, created on 2022-04-20 23:48:04
  from 'C:\xampp\htdocs\grupoperti\templates\homepage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6260e204594988_36083182',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '434c0a40437065401be1778b3c85d9e58055b6a0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\grupoperti\\templates\\homepage.tpl',
      1 => 1650516480,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6260e204594988_36083182 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ul class="list-group">
	  
	    	
	
	  <li class="list-group-item">
	  	<p>
			  	1. Realiza un formulario de registro de usuario que contenga los siguientes campos (nombre,
		teléfono, correo, contraseña, confirmación de contraseña, RFC y notas.), considerando los
		siguientes puntos:
       </p>
       <ul>
       	<li> Usa la librería Bootstrap para un registro responsivo. </li>
       	<li> Realiza una validación en front (con JS) y backend (con PHP) para los datos. Valide que el RFC cumpla con persona moral o física. </li>
       	<li> Si las validaciones son correctas usa PHP y guarda en base de datos la IP desde donde se hace el registro.</li>
       	<li> Guarda todos los datos en una base de datos local SQL con la contraseña cifrada.</li>
       	<li> El diseño y usabilidad del registro también se evaluará. </li>
       	<li> Realiza el registro de al menos 2 usuarios desde este formulario (el correo puede ser inventado).</li>
       </ul>
      
       		 <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/actividad1" class="btn btn-primary float-right"> Ver ejercicio</a>
       
      
	  </li>
	  <li class="list-group-item">
	  	2.-Con la información que se registró anteriormente; Realiza un inicio de sesión válido con PHP puro validando el correo y la contraseña, considerando los siguientes puntos:<br>
	  	3. Realiza una vista que solo pueda ser accedida si se efectuó un inicio de sesión válido en el
punto anterior; considerando los siguientes puntos:
 <ul>
       	<li> Si no se tiene un inicio de sesión válido; que regrese a la página del punto anterior. </li>
       	<li> Muestra el nombre y correo electrónico del usuario que inicio sesión. </li>
       	<li> Utilizando metodología MVC, muestra en pantalla una tabla con la información de todos los
usuarios registrados en el sistema.</li>
       	<li> Implementa DataTables (https://datatables.net/) para renderizar la tabla y que se pueda
exportar SOLO en formato PDF y CSV.</li>
       	<li>Realiza un Modal para poder actualizar la información de los usuarios (nombre, teléfono,
contraseña y RFC) con sus respectivas validaciones en front y backend </li>
       	<li> Del punto anterior; actualiza la información mediante Ajax y manda un mensaje de confirmación
en la pantalla.</li>
       </ul>

	  	 <a href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/login" class="btn btn-primary float-right"> Ver ejercicio</a>
	  </li>
	  <li class="list-group-item">
	  	
	  	4. Creación y consumo de API’s. Con la base de datos de usuarios; Crea un API Rest en PHP.

       <ul>
       	<li> Crea un API, puedes usar algún Framework, y deberá tener los siguientes métodos; </li>
       	<li> GET: Obtiene todos los usuarios de la tabla y otro para obtener el usuario por ID.</li>
       	<li>PUT: Inserta un nuevo registro de usuario.</li>
       	<li>  POST: Actualiza la información de un usuario por ID.</li>
       	<li> Los 3 métodos serán probados desde Postman </li>
       	
       </ul>
	  </li>
	
</ul><?php }
}
