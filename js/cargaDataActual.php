<?php
require("../functions/coneccion.php");
require("../functions/cancionActual.php");

$sql = " select nombre_banda,nombre_cancion,thumb,a.id_cancion ";
$sql .= " from cancionesradio a, album b, bandas c ";
$sql .= " where a.id_album = b.id_album ";
$sql .= " and b.id_banda = c.id_banda ";
$sql .= " and id_cancion  = '$idCancion'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    		$nombre_banda=utf8_encode($row['nombre_banda']);
    		$nombre_cancion=utf8_encode($row['nombre_cancion']);
    		$thumb=$row['thumb'];
    		$actuales[] = array('id_cancion'=>$idCancion,'nombre_banda'=> $nombre_banda, 'nombre_cancion'=> $nombre_cancion, 'thumb'=> $thumb);
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