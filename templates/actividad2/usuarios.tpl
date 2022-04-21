<div class="row" style="padding-top:30px">
	<div class="col-md-12"><h3>Usuarios</h3></div>
	<div class="col-md-12">
		<table class="table" id="tableUsers">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Correo electrónico</th>
					<th>RFC</th>
					<th>Notas</th>
					<th></th>
				</tr>
			</thead>
			<body>
				{foreach from=$usuarios item=item key=key}
				<tr>
						<td>{$item.nombre}</td>
						<td>{$item.telefono}</td>
						<td>{$item.email}</td>
						<td>{$item.rfc|upper}</td>
						<td>{$item.notas}</td>
						<td>
							<i class='bx bx-pencil nav_icon pointer' onclick="editar({$item.usuarioId})" ></i>
							<i class='bx bx-lock nav_icon pointer' onclick="editarPass({$item.usuarioId})" ></i>
						</td>
				</tr>
				{/foreach}
			</body>
		</table>		
	</div>


</div>
