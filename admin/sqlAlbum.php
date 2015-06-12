<?php
require("../functions/coneccion.php");
$nombreAlbum = utf8_encode($_REQUEST["nombreAlbum"]);
$anio = $_REQUEST["anio"];
$urlDisco = $_REQUEST["urlDisco"];
$idBanda = $_REQUEST["idBanda"];
$sql = "insert into album ( ";
$sql .= " id_album, ";
$sql .= " id_banda, ";
$sql .= " nombre_album, ";
$sql .= " anio, ";
$sql .= " url_disco) ";
$sql .= " values (";
$sql .= " '', ";
$sql .= " '$idBanda', ";
$sql .= " '$nombreAlbum', ";
$sql .= " '$anio', ";
$sql .= " ' ' ";
$sql .= " ) ";
//echo $sql;
$conn->query($sql);

$sql = "select max(id_album) as id_album from album ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$idAlbum = $row["id_album"];
	}
}
echo "el id del album es: ------>".$idAlbum;
?>