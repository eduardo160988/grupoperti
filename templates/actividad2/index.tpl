<header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="" style="color:#ffffff;font-size: 10px"> BIENVENIDO {$infoUsuario.nombre|upper} <br>{$infoUsuario.email|lower} </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
            	<a href="{$WEB_ROOT}/actividad2" class="nav_logo"> <img src="{$WEB_ROOT}/images/logo2.png" width="28px"> <span class="nav_logo-name">Grupo PERTI</span> </a>
               <div class="nav_list"> 
                 <a href="{$WEB_ROOT}" class="nav_link "> <i class='bx bx-home nav_icon'></i> <span class="nav_name">Usuarios</span> </a> 
              	 <a href="{$WEB_ROOT}/actividad2" class="nav_link active"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Usuarios</span> </a> 

              	 
              </div>
            </div> <a href="{$WEB_ROOT}/logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar sessión</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 ">
       	<div class="container" id="positionUsuarios">
       			{include file="{$DOC_ROOT}/templates/actividad2/usuarios.tpl"}
       	</div>
    </div>