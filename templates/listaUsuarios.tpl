<table class="table table-hover">
			<thead>
				<tr>
					<td>Nombre</td>
					<td>RFC</td>
					<td>Email</td>
				</tr>				
			</thead>
			<tbody>
				{foreach from=$usuarios item=item key=key}
					<tr>
						<td> {$item.nombre}</td>
						<td> {$item.rfc}</td>
						<td> {$item.email}</td>
					</tr>
				{/foreach}
			</tbody>
		</table>