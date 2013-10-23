<?php
$serverName = "localhost";
$conectionInfo = array("Database"=>"Bd_Restaurant_Interface","UID"=>"sa","PWD"=>"45624986");
$conn = sqlsrv_connect($serverName,$conectionInfo);

/*if ( $conn ) {
	echo "Conexión Establecida.</ br> ";
}else{
	echo "Conexión no se pudo establecer.<br />";
	die( print_r( sqlsrv_errors(), true ));
}*/
?>
<!doctype html>
<html lang="es-ES">
<head>
<meta charset="utf-8">
<title>ConnecionInfo</title>
</head>

<body>
</body>
</html>
