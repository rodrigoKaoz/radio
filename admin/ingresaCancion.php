<?php 
require("../functions/coneccion.php");
?>
<div class="row">
	<div class="span7 offset3" id="formularioAgregarCancion">
		<form id="agregaCancion" name="agregaCancion">
			<div class="row-fluid">
				<div class="span12">
					<table>
						<tr>
							<td>
								Selecciona Banda
							</td>
							<td>
								<select name="idBanda" id="idBanda">
									<option value="">[Selecciona Banda]</option>
									<?php 
									$sql = "SELECT nombre_banda, id_banda from bandas ";
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
							<td>Selecciona Album</td>
							<td id="tdAlbum">Debes Seleccionar Banda</td>
						</tr>
						<tr>
							<td>Selecciona Categoria</td>
							<td>
								<select name="idCategoria" id="idCategoria">
									<option value="">[Selecciona Categoria]</option>
									<?php 
									$sql = "SELECT id_categoria,nombre_categoria FROM categorias ";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row = $result->fetch_assoc()) { 
											$nombreCategoria = utf8_encode($row["nombre_categoria"]);
											$idCategoria = $row["id_categoria"];
											echo '<option value="'.$idCategoria.'">'.$nombreCategoria.'</option>';
										} 
									} ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Nombre Cancion</td>
							<td>
								<input type="text" name="nombreCancion" id="nombreCancion" placeholder="Ingresa nombre de cancion">
							</td>
						</tr>
						<tr>
							<td>Thumb</td>
							<td><input type="text" name="thumb" id="thumb" placeholder="Ingresa nombre de imagen"></td>
						</tr>
					</table>
					<tr>
						<td colspan="2">
							<span name="agregar" id="agregar" class="btn btn-success">Agregar</span>
						</td>
					</tr>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	$('#idBanda').change(function() {
		var valor = $(this).val();
		if (valor !== '') {
			var pagina, div, datos;
			pagina= 'seleccionaAlbum.php';
			div= 'tdAlbum';
			datos = 'idBanda='+valor;
			enviaDatos(pagina,div,datos);
		};
	});
	$('#agregar').click(function() {
		var datos = $('#agregaCancion').serialize();
		pagina = 'sqlCancion.php';
		div = 'formularioAgregarCancion';
		enviaDatos(pagina,div,datos);
	});
</script>