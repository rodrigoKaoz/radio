<?php 
require("../functions/coneccion.php");
$idBanda = $_REQUEST["idBanda"];?>
<select name="idAlbum" id="idAlbum">
	<option value="">[Selecciona Album]</option>
	<?php 
	$sql = "select id_album, nombre_album from album where id_banda = '$idBanda'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) { 
			$nombreAlbum = utf8_encode($row["nombre_album"]);
			$idAlbum = $row["id_album"];
			echo '<option value="'.$idAlbum.'">'.$nombreAlbum.'</option>';
		} 
	} ?>
</select>