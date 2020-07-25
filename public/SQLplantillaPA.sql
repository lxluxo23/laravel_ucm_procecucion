
--cabros dejare los pa para que no se olviden como hacerlos 
--Uwu

DELIMITER $$

CREATE PROCEDURE agregar_espacio (
pcapacidad INT,
pdescripcion TEXT,
pestado TEXT,
pprecio INT,
prul text)
BEGIN

INSERT INTO espacio_trabajo (Capacidad,Descripcion,Estado,precio,url_img) VALUES (pcapacidad,pdescripcion,pestado,pprecio,prul);

END$$

DELIMITER $$
-------------------------------------------------------------------------------------------------------------------------------------

DELIMITER $$

CREATE PROCEDURE actualizar_espacio(
pespacioid INT,
pcapacidad INT,
pdescripcion TEXT,
pestado TEXT,
pprecio INT,
purl TEXT
)
 
BEGIN

DECLARE imagen TEXT;

select url_img INTO imagen FROM espacio_trabajo WHERE ID_espacio_trabajo=pespacioid; 


IF LENGTH (imagen)>0 then 

	update espacio_trabajo 

	SET 
	Capacidad=pcapacidad,
	Descripcion=pdescripcion,
	Estado=pestado,
	precio=pprecio,
	url_img=purl

	WHERE ID_espacio_trabajo=pespacioid;
	
	else
		update espacio_trabajo 
		SET 
		Capacidad=pcapacidad,
		Descripcion=pdescripcion,
		Estado=pestado,
		precio=pprecio,
		url_img=imagen
		
		WHERE ID_espacio_trabajo=pespacioid;
	
	END IF;

END$$

