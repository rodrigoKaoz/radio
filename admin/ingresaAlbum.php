<?php 
require("../functions/coneccion.php");
?>
<div class="row-fluid" >
	<div class="span7 offset3" id="areaBanda">
		<form id="formIngresaBanda" name="formIngresaBanda">
			<input type="hidden" name="idAccion" id="idAccion" value="1">
			<table>
				<tr>
					<td>Selecciona Banda</td>
					<td>
						<select name="idBanda" id="idBanda">
							<option value="">[Selecciona Banda]</option>
							<?php 
							$sql = "select nombre_banda, id_banda from bandas ";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) { 
									$nombreBanda = utf8_encode($row["nombre_banda"]);
									$idBanda = $row["id_banda"];
									echo '<option value="'.$idBanda.'">'.$nombreBanda.'</option>';
								} 
							} ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Ingresa nombre Album</td>
					<td>
						<input type="text" name="nombreAlbum" id="nombreAlbum" placeholder="Nombre Album">
					</td>
				</tr>
				<tr>
					<td>Año</td>
					<td>
						<input type="text" name="anio" id="anio" placeholder="Año">
					</td>
				</tr>
				<tr>
					<td>url disco</td>
					<td>
						<input type="text" name="urlDisco" id="urlDisco" placeholder="Url disco">
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
		pagina='sqlAlbum.php';
		div = 'areaBanda';
		datos = $('#formIngresaBanda').serialize();
		enviaDatos(pagina,div,datos);
	});
</script>