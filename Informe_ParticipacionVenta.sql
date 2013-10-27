SELECT 
       NombreTienda,
       Origen,
       SUM(MontoCobrado) AS Importe_Pagado,
       SUM(MontoxCobrar) AS Importe_Pendiente,
       SUM(MontoCobrado) + SUM(MontoxCobrar) MontoTotal,
       SUM(CantidadInsumo) AS Pollos
       FROM CO_Venta A 
INNER JOIN CO_VentaDetalle B ON A.FechaProceso = b.FechaProceso AND A.IdTiendaKey = B.IdTiendaKey 
INNER JOIN PtoVta_MTiendas pvm ON A.IdTiendaKey = pvm.IdTiendaKey 
--GROUP BY NombreTienda
--ORDER BY NombreTienda
	--WHERE NombreTienda LIKE'%Rodizio%'	
	--WHERE NombreTienda LIKE'%Sopranos%'
	--WHERE NombreTienda LIKE'%Rokys%'
	--WHERE Origen LIKE '%C%'
GROUP BY NombreTienda,Origen
ORDER BY NombreTienda 
--ORDER BY MontoTotal DESC