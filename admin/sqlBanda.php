<?php
require("../functions/coneccion.php");
$nombreBanda = utf8_encode($_REQUEST["nombreBanda"]);
$email = $_REQUEST["email"];
$web = $_REQUEST["web"];
$facebook = $_REQUEST["facebook"];
$twitter = $_REQUEST["twitter"];
$imagen = $_REQUEST["imagen"];
$bio = $_REQUEST["bio"];
$manager = $_REQUEST["manager"];
$idPAis = $_REQUEST["idPAis"];
$sql = "insert into bandas ( ";
$sql .= " id_banda, ";
$sql .= " nombre_banda, ";
$sql .= " contacto, ";
$sql .= " web, ";
$sql .= " facebook, ";
$sql .= " twitter, ";
$sql .= " imagen, ";
$sql .= " biografia, ";
$sql .= " manager, ";
$sql .= " id_pais) ";
$sql .= " values (";
$sql .= " '', ";
$sql .= " '$nombreBanda', ";
$sql .= " '$email', ";
$sql .= " '$web', ";
$sql .= " '$facebook', ";
$sql .= " '$twitter', ";
$sql .= " '$imagen', ";
$sql .= " '$bio', ";
$sql .= " '$manager', ";
$sql .= " '$idPAis' ";
$sql .= " ) ";
$conn->query($sql);

$sql = "select max(id_banda) as id_banda from bandas ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$idBanda = $row["id_banda"];
	}
}
echo "el id de banda es: ------>".$idBanda;
?>