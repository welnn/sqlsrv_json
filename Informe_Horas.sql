SELECT 
       Hora,
       --NroTransCobrado,
       SUM(MontoCobrado) AS Importe_Pagado,
       --NroTransxCobrar AS Trans_Pendiente, 
       SUM(MontoxCobrar) AS Importe_Pendiente,
       --MontoCobrado + MontoxCobrar MontoTotal,
       SUM(MontoCobrado) + SUM(MontoxCobrar) MontoTotal,
       SUM(CantidadInsumo) AS Pollos
       FROM CO_Venta A 
INNER JOIN CO_VentaDetalle B ON A.FechaProceso = b.FechaProceso AND A.IdTiendaKey = B.IdTiendaKey 
INNER JOIN PtoVta_MTiendas pvm ON A.IdTiendaKey = pvm.IdTiendaKey 
--INNER JOIN PtoVta_MEmpresa pvm2 ON pvm2.IdEmpresaKey = pvm.IdEmpresaKey
GROUP BY Hora
ORDER BY Hora
--ORDER BY NombreTienda