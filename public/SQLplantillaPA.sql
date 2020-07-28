
--cabros dejare los pa para que no se olviden como hacerlos 
--Uwu


DROP TABLE espacio_trabajo 
CREATE TABLE espacio_trabajo (
id_espacio_trabajo INT PRIMARY KEY AUTO_INCREMENT,
capacidad INT NOT NULL,
categoria INT NOT NULL,
descripcion VARCHAR(200) NOT NULL,
estado VARCHAR (20) NOT NULL,
precio INT NOT NULL,
url_img VARCHAR(100) NOT NULL 
);

ALTER TABLE espacio_trabajo ADD CONSTRAINT la_fk_de_categoria FOREIGN KEY (categoria) REFERENCES categoria (id_categoria);


-------------------------------------------------------------------------------------------

CREATE TABLE categoria (
id_categoria INT PRIMARY KEY auto_increment,
nombre_cat VARCHAR (50) NOT null 
);

---------------------------------------------------------------------------------------------
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
	
	IF purl IS NULL OR purl='' OR LENGTH (purl)= 0 THEN
		update espacio_trabajo 
		SET 
		Capacidad=pcapacidad,
		Descripcion=pdescripcion,
		Estado=pestado,
		precio=pprecio,
		url_img=imagen
		WHERE ID_espacio_trabajo=pespacioid;
	ELSE
		update espacio_trabajo 
		SET 
		Capacidad=pcapacidad,
		Descripcion=pdescripcion,
		Estado=pestado,
		precio=pprecio,
		url_img=purl
		WHERE ID_espacio_trabajo=pespacioid;
	END IF;
END$$



-------------------------------------------------------------------------------------------------------



DELIMITER $$
CREATE  PROCEDURE agregar_categoria (
pnombre TEXT)
BEGIN 
INSERT INTO categoria (nombre_cat) VALUES (pnombre);

END $$

DELIMITER $$
CREATE PROCEDURE actualizar_categoria (
pid INT ,
pnombre TEXT)

BEGIN

UPDATE categoria SET nombre_cat=pnombre WHERE id_categoria=pid;

END $$









