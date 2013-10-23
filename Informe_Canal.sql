SELECT 
       CanalVenta,
       SUM(MontoCobrado) AS Importe_Pagado,
       SUM(MontoxCobrar) AS Importe_Pendiente,
       SUM(MontoCobrado) + SUM(MontoxCobrar) MontoTotal,
       SUM(CantidadInsumo) AS Pollos
       FROM CO_Venta A 
INNER JOIN CO_VentaDetalle B ON A.FechaProceso = b.FechaProceso AND A.IdTiendaKey = B.IdTiendaKey 
INNER JOIN PtoVta_MTiendas pvm ON A.IdTiendaKey = pvm.IdTiendaKey 
GROUP BY CanalVenta
ORDER BY CanalVenta
