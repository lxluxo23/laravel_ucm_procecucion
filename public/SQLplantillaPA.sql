
--cabros dejare los pa para que no se olviden como hacerlos 
--Uwu

DELIMITER $$

CREATE PROCEDURE agregar_espacio (pid INT,pcapacidad INT,pdescripcion TEXT,pestado TEXT,pprecio INT,prul text)  BEGIN

INSERT INTO espacio_trabajo VALUES (pid ,pcapacidad,pdescripcion,pestado,pprecio,prul);

END$$
