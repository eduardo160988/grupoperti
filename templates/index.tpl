<!DOCTYPE HTML>

<html>
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
		<link rel="stylesheet" href="{$WEB_ROOT}/css/style.css" >
		{if $page=="login"}
			<link rel="stylesheet" href="{$WEB_ROOT}/css/login.css" >
		{elseif $page=="actividad2"}
			<link rel="stylesheet" href="{$WEB_ROOT}/css/actividad2.css" >
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" >
			<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" >


		{/if}
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
		<script >
			WEB_ROOT= "{$WEB_ROOT}"; 
		 </script>
		<script type="text/javascript" src="{$WEB_ROOT}/js/{$page}.js"></script>

	</head>
	<body  id="body-pd">
		{if $page!="actividad2"}
		<div class="container-fluid">
			<div class="row">
				
					<div class="col-md-12">
						
						{if $page=="homepage"}
					         {include file="{$DOC_ROOT}/templates/head.tpl"}
							 {include file="{$DOC_ROOT}/templates/homepage.tpl"}
					    {elseif $page=="actividad1"}
					         {include file="{$DOC_ROOT}/templates/head.tpl"}
					 		 {include file="{$DOC_ROOT}/templates/actividad1.tpl"}
					    {elseif $page=="login"}
							 {include file="{$DOC_ROOT}/templates/login.tpl"}
						
						{/if}
					</div>
					
				
			</div>
		</div>
		{else}
 			{include file="{$DOC_ROOT}/templates/actividad2/index.tpl"}
		{/if}	

		{include file="{$DOC_ROOT}/templates/actividad2/modal.tpl"}
	</body>
</html>