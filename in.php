<?php
    require "ConnectionInfo.php";

    if ($conn == false)
    {
        echo "<p>Database connection failed...</p>";
    }
    else
    {

    $query = "SELECT CanalVenta
					,SUM(MontoCobrado) AS MC
					,SUM(MontoxCobrar) AS MxC
			  FROM dbo.CO_Venta AS A INNER JOIN
                   dbo.CO_VentaDetalle AS B ON A.FechaProceso = B.FechaProceso AND A.IdTiendaKey = B.IdTiendaKey INNER JOIN
                   dbo.PtoVta_MTiendas AS pvm ON A.IdTiendaKey = pvm.IdTiendaKey
			  GROUP BY CanalVenta
			  ORDER BY CanalVenta";
    $statement = sqlsrv_query($conn, $query);
    echo $statement;
	while ($row = sqlsrv_fetch_array($statement))
{
    $arr = array();
    for($row as $key => $value){
        // $key is your column name
        // $value is the value of $row[$key]

        // Copy data on clean array...
        $arr[$key] = $value;
    }

    // Process on column name...

    $rows[] = $arr;
}
	
 /*   while ($row = sqlsrv_fetch_array($statement))
        {
            $rows[] = array($row['CanalVenta'],$row['MC'],$row['MxC']);
        } */
        $dataTable = json_encode($rows,JSON_NUMERIC_CHECK);

    sqlsrv_free_stmt($statement); 
    }
    sqlsrv_close($conn);      
?> 