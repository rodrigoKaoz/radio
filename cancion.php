<?php

/* ----------- Server configuration ---------- */

$ip = "198.12.92.11";
$port = "9888";

/* ----- No need to edit below this line ----- */
/* ------------------------------------------- */
$fp = @fsockopen($ip,$port,$errno,$errstr,1);
if (!$fp) 
	{ 
	echo "Connection refused"; // Diaplays when sever is offline
	} 
	else
	{ 
	fputs($fp, "GET /7.html HTTP/1.0\r\nUser-Agent: Mozilla\r\n\r\n");
	while (!feof($fp)) 
		{
		$info = fgets($fp);
		}
	$info = str_replace('</body></html>', "", $info);
	$split = explode(',', $info);
	if (empty($split[6]) )
		{
		echo "The current song is not available"; // Diaplays when sever is online but no song title
		}
	else
		{
		$title = str_replace('\'', '`', $split[6]);
		$title = str_replace(',', ' ', $title);
		//echo "$title"; // Diaplays song
		}
	}
?>
<?php

$servername = "basededatos.kaoztv.com";
$username = "malditacustion";
$password = "chupalo123.-.";
$dbname = "sitio2kaoztv";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT nombre_banda,nombre_cancion,thumb FROM view_completa WHERE id_cancion  = '$title'";
$result = $conn->query($sql);
//echo $sql;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { ?>
        <script type="text/javascript">
        	$('#nombreCancion').html('<?php echo $row["nombre_banda"]. " - " . $row["nombre_cancion"]; ?>')
        	$('#imgCancion').css({
				'background': '#f00 url(img/thumbs/<?php echo $row["thumb"];?>)',
				'background-size': '100% 100%',
				'background-repeat': 'no-repeat',
				'width': '100%',
				'height': '100%'});
        	$('#masInfo').attr('data-idCancion','<?php echo $title; ?>');
        </script>
    <?php }
} else {
    //$sql = "INSERT INTO log_radio (titulo, fecha) VALUES ('$title', now())";
	//if ($conn->query($sql) === TRUE) {
	    //echo "New record created successfully";
	//}?>
<?php
}
$conn->close();
?>