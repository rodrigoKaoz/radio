<?php
/* ----------- Server configuration ---------- */

//$ip = "198.12.92.11";
$ip = "192.198.83.230";
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
		$idCancion = str_replace('\'', '`', $split[6]);
		$idCancion = str_replace(',', ' ', $idCancion);
		//echo "$idCancion"; // Diaplays song
		}
	}
?>