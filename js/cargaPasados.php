<?php
require("../functions/coneccion.php");
require("../functions/cancionActual.php");
$sql = "select 1 from log_canciones where  fecha > ( select DATE_sub(NOW(),INTERVAL 10 MINUTE)) and  id_cancion = '$idCancion' ";
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	
}
else
{
	$sql = "INSERT INTO log_canciones (id_cancion, fecha) VALUES ('$idCancion', now())";
	if ($conn->query($sql) === TRUE) {
	   //echo "grabo";
	}
}
$sql = " select nombre_banda, nombre_cancion,thumb, a.id_cancion, a.fecha, d.id_pais, e.iso2, ";
$sql .= " c.nombre_album ";
$sql .= " from log_canciones a, ";
$sql .= " cancionesradio b, ";
$sql .= " album c, ";
$sql .= " bandas d, ";
$sql .= " pais e ";
$sql .= " where id_log <> (select max(id_log) ";
$sql .= " from log_canciones) ";
$sql .= " and a.id_cancion = b.id_cancion ";
$sql .= " and b.id_album = c.id_album ";
$sql .= " and c.id_banda = d.id_banda ";
$sql .= " and d.id_pais = e.id_pais ";
$sql .= " ORDER BY a.fecha DESC ";
$sql .= " LIMIT 0 , 6 ";
$result = $conn->query($sql);
//echo $sql;
if ($result->num_rows > 0) {
    // output data of each row
    	$i = 1;
    echo "[";
    while($row = $result->fetch_assoc()) {
        echo "{";
    		$nombre_banda=utf8_encode($row['nombre_banda']);
    		$nombre_cancion=utf8_encode($row['nombre_cancion']);
    		$thumb=$row['thumb'];
    		$fecha=$row['fecha'];
    		$pais = strtolower($row['iso2']);
            $album = utf8_encode($row["nombre_album"]);
    	
        echo "\"idRecord\": \"$i\",";
        echo "\"nombre_banda\": \"$nombre_banda\",";
        echo "\"nombre_cancion\": \"$nombre_cancion\",";
        echo "\"thumb\": \"$thumb\",";
        echo "\"fecha\": \"$fecha\",";
        echo "\"pais\": \"$pais\",";
        echo "\"album\": \"$album\"";
        echo "}";
        if ($i < 6) {
            echo ",";
            }
        $i++;
    	}
    echo "]";


} else {
    //$sql = "INSERT INTO log_radio (titulo, fecha) VALUES ('$idCancion', now())";
	//if ($conn->query($sql) === TRUE) {
	    //echo "New record created successfully";
	//}
}
//echo json_encode($actuales);
//echo $json_string2;
 
//$file = 'cargaDataActual.json';
//file_put_contents($file, $json_string);
?>