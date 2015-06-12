<?php
require("../functions/coneccion.php");
$idCancion = $_REQUEST["idCancion"];

$sql = " select c.nombre_banda, ";
$sql .= " a.nombre_cancion, ";
$sql .= " b.nombre_album, ";
$sql .= " b.anio, ";
$sql .= " d.iso2, ";
$sql .= " c.contacto, ";
$sql .= " c.web, ";
$sql .= " c.facebook, ";
$sql .= " c.twitter ";
$sql .= " from cancionesradio a, ";
$sql .= " album b, ";
$sql .= " bandas c, ";
$sql .= " pais d ";
$sql .= " where a.id_album = b.id_album ";
$sql .= " and b.id_banda = c.id_banda ";
$sql .= " and c.id_pais = d.id_pais ";
$sql .= " and id_cancion  = '$idCancion'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    		$nombre_banda=utf8_encode($row['nombre_banda']);
    		$nombre_cancion=utf8_encode($row['nombre_cancion']);
            $nombre_album = utf8_encode($row['nombre_album']);
            $anio = $row["anio"];
            $pais = strtolower($row["iso2"]);
            $contacto = utf8_encode($row["contacto"]);
            $web = $row["web"];
            $face = $row["facebook"];
            $twitter = $row["twitter"];

    		$actuales[] = array('id_cancion'=>$idCancion,'nombre_banda'=> $nombre_banda, 'nombre_cancion'=> $nombre_cancion,'nombre_album'=>$nombre_album,'anio'=>$anio,'pais'=>$pais,'contacto'=>$contacto,'web'=>$web,'fb'=>$face,'twitter'=>$twitter );
    	}
} else {
    //$sql = "INSERT INTO log_radio (titulo, fecha) VALUES ('$idCancion', now())";
	//if ($conn->query($sql) === TRUE) {
	    //echo "New record created successfully";
	//}
}
$conn->close();
$json_string = json_encode($actuales);
echo $json_string;
 
//$file = 'cargaDataActual.json';
//file_put_contents($file, $json_string);
?>