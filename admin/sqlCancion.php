<?php
require("../functions/coneccion.php");
$idBanda = $_REQUEST["idBanda"];
$idAlbum = $_REQUEST["idAlbum"];
$idCategoria = $_REQUEST["idCategoria"];
$nombreCancion = utf8_encode($_REQUEST["nombreCancion"]);
$thumb = $_REQUEST["thumb"];
$sql = "insert into cancionesradio ( ";
$sql .= " id_cancion, ";
$sql .= " id_album, ";
$sql .= " id_categoria, ";
$sql .= " nombre_cancion, ";
$sql .= " fecha_publicacion, ";
$sql .= " thumb, ";
$sql .= " estado) ";
$sql .= " values (";
$sql .= " '', ";
$sql .= " '$idAlbum', ";
$sql .= " '$idCategoria', ";
$sql .= " '$nombreCancion', ";
$sql .= ' now(), ';
$sql .= " '$thumb', 1) ";
$conn->query($sql);

$sql = "select max(id_cancion) as id_cancion from cancionesradio ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$idCancion = $row["id_cancion"];
	}
}
echo "el id de cancion es: ------>".$idCancion;
?>