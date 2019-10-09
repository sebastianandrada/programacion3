SELECT * 
FROM `productos` 
ORDER BY pNombre ASC;

SELECT * FROM `proveedores` WHERE localidad = "Quilmes";

SELECT * FROM `envios` WHERE cantidad > 200 and cantidad <= 300;

SELECT SUM(cantidad) FROM envios;

SELECT numero FROM envios LIMIT 3;