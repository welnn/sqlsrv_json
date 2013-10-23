<?php
// Connection
$server='localhost';
//$engine='SQLEXPRESS';
$database='Bd_Restaurant_Interface';
$serverName = $server.'\\'.$engine; //serverName\instanceName
$connectionInfo = array( "Database"=>"$database","UID"=>"sa","PWD"=>"45624986");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}
//$table=$_POST['CO_Venta'];
$sql = "SELECT CanalVenta
					,SUM(MontoCobrado) AS MC
					,SUM(MontoxCobrar) AS MxC
			  FROM dbo.CO_Venta AS A INNER JOIN
                   dbo.CO_VentaDetalle AS B ON A.FechaProceso = B.FechaProceso AND A.IdTiendaKey = B.IdTiendaKey INNER JOIN
                   dbo.PtoVta_MTiendas AS pvm ON A.IdTiendaKey = pvm.IdTiendaKey
			  GROUP BY CanalVenta
			  ORDER BY CanalVenta";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}
 
$test=array();

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
//        $row['Shape']='';
        $data[]=$row;          
}
        $out=array('data'=>$data);


$json= json_encode($out);
echo $json;
?>