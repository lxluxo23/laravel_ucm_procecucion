DELIMITER $$

CREATE PROCEDURE nombre_del_pa ()  BEGIN



END$$





DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_usuario` (IN `prut` INT, IN `pnombre` VARCHAR(100), IN `pcontrasena` VARCHAR(100), IN `ptipo` VARCHAR(100), IN `ptelefono` INT, IN `pemail` VARCHAR(100), IN `pestado` VARCHAR(100))  BEGIN

INSERT INTO usuario(Rut, Nombre, Contrasena, Tipo,estado,Telefono_1, Email) VALUES (prut ,pnombre,pcontrasena,ptipo,pestado,ptelefono,pemail);

END$$