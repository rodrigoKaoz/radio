<?php 
require("../functions/coneccion.php");
?>
<div class="row-fluid" >
	<div class="span7 offset3" id="areaBanda">
		<form id="formIngresaBanda" name="formIngresaBanda">
			<input type="hidden" name="idAccion" id="idAccion" value="1">
			<table>
				<tr>
					<td>Nombre Banda</td>
					<td>
						<input type="text" name="nombreBanda" id="nombreBanda" value="" placeholder="Ingresa nombre de banda">
					</td>
				</tr>
				<tr>
					<td>Contacto</td>
					<td>
						<input type="email" name="email" id="email" placeholder="Ingresa email">
					</td>
				</tr>
				<tr>
					<td>
						web
					</td>
					<td>
						<input type="url" name="web" id="web" placeholder="Ingresa web">(puede quedar vacia)
					</td>
				</tr>
				<tr>
					<td>
						facebook
					</td>
					<td>
						<input type="url" name="facebook" id="facebook" placeholder="Ingresa facebook">(puede quedar vacia)
					</td>
				</tr>
				<tr>
					<td>
						twitter
					</td>
					<td>
						<input type="url" name="twitter" id="twitter" placeholder="Ingresa twitter">(puede quedar vacia)
					</td>
				</tr>
				<tr>
					<td>
						Imagen
					</td>
					<td>
						<input type="text" name="imagen" id="imagen" placeholder="Ingresa imagen">(puede quedar vacia)
					</td>
				</tr>
				<tr>
					<td>
						Biografia
					</td>
					<td>
						<input type="text" name="bio" id="bio" placeholder="Ingresa biografia">(puede quedar vacia)
					</td>
				</tr>
				<tr>
					<td>
						Manager
					</td>
					<td>
						<input type="text" name="manager" id="manager" placeholder="Ingresa manager">(puede quedar vacia)
					</td>
				</tr>
				<tr>
					<td>Pais</td>
					<td>
						<select name="idPAis" id="idPAis">
							<option value="">[Selecciona Pais]</option>
							<?php 
							$sql = "select nombre_pais, id_pais from pais ";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) { 
									$nombrePais = utf8_encode($row["nombre_pais"]);
									$idPais = $row["id_pais"];
									echo '<option value="'.$idPais.'">'.$nombrePais.'</option>';
								} 
							} ?>
						</select>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						<span class="alert alert-success" id="btnGuarda">Guardar</span>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
<script>
	$('#btnGuarda').click(function() {
		var pagina, div,datos;
		pagina='sqlBanda.php';
		div = 'areaBanda';
		datos = $('#formIngresaBanda').serialize();
		enviaDatos(pagina,div,datos);
	});
</script>
