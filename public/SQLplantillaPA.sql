DROP TABLE espacio_trabajo;
DROP TABLE categoria;
DROP TABLE usuario;
DROP TABLE arriendo;
DROP PROCEDURE agregar_espacio;
DROP PROCEDURE actualizar_espacio;
DROP PROCEDURE agregar_categoria;
DROP PROCEDURE actualizar_categoria;
DROP PROCEDURE consulta_espacio_concategoria;


--------------------------------------------------------------------------------------------------------USUARIO-
------------------------------------------------CREAR TABLA USUARIO----------------------
CREATE TABLE usuario(
rut INT NOT NULL PRIMARY KEY,
nombre TEXT NOT NULL,
contrasena VARCHAR(100) NOT NULL,
tipo VARCHAR(15) NOT NULL,
estado VARCHAR(15) NOT NULL,
telefono INT NOT NULL,
email VARCHAR(40) NOT null
);

------------------------------------------------PROCEDIMIENTO AGREGAR USUARIO----------------------
DELIMITER $$
CREATE PROCEDURE agregar_usuario (
prut INT,
pnombre text,
contrasena TEXT,
ptipo TEXT,
pestado text,
ptelefono INT,
pemail text)
BEGIN

INSERT INTO usuario VALUES (prut,pnombre,contrasena,ptipo,pestado,ptelefono,pemail);

END$$

------------------------------------------------PROCEDIMIENTO ACTUALIZAR USUARIO----------------------
DELIMITER $$
CREATE PROCEDURE actualizar_usuario(
prut INT ,
pnombre TEXT,
ptipo TEXT,
pestado TEXT,
ptelefono INT,
pemail text
)
BEGIN 
	UPDATE usuario SET 
	nombre=pnombre,
	tipo=ptipo,
	estado=pestado,
	telefono=ptelefono,
	email=pemail
	WHERE rut=prut;
END$$
------------------------------------------------PROCEDIMIENTO ELIMINAR USUARIO----------------------
DELIMITER $$
CREATE PROCEDURE eliminar_usuario(
prut INT)
BEGIN 
	DELETE FROM usuario WHERE rut=prut;
END $$

------------------------------------------------PROCEDIMIENTO LOGIN----------------------

DELIMITER $$
CREATE PROCEDURE loguear (
pemail TEXT ,
ppass TEXT
)
BEGIN 
	DECLARE resultado INT;
	DECLARE tipo_usuario INT;
	SELECT COUNT(*) INTO resultado FROM usuario WHERE email=pemail AND contrasena=ppass;	
	SELECT COUNT(*) INTO tipo_usuario FROM usuario WHERE email=pemail AND contrasena=ppass AND tipo='Administrador';
	
	IF resultado=1 AND tipo_usuario=0 THEN 
		 SET resultado=1;
	
	ELSEIF resultado=1 AND tipo_usuario=1 THEN
		SET resultado=2;
		
	ELSE
		SET resultado=3;
	END IF;

	SELECT resultado;
END$$


---------------------------------------------------------------------------------------------------------CATEGORIA-
------------------------------------------------CREAR TABLA CATEGORIA----------------------
CREATE TABLE categoria (
id_categoria INT PRIMARY KEY auto_increment,
nombre_cat VARCHAR (50) NOT null 
);



------------------------------------------------PROCEDIMIENTO AGREGAR-------------
DELIMITER $$
CREATE  PROCEDURE agregar_categoria (
pnombre TEXT)
BEGIN 
INSERT INTO categoria (nombre_cat) VALUES (pnombre);

END $$



------------------------------------------------PROCEDIMIENTO MODIFICAR-------------
DELIMITER $$
CREATE PROCEDURE actualizar_categoria (
pid INT ,
pnombre TEXT)

BEGIN

UPDATE categoria SET nombre_cat=pnombre WHERE id_categoria=pid;

END $$

------------------------------------------------PROCEDIMIENTO ELIMINAR-------------
DELIMITER $$
CREATE PROCEDURE eliminar_categoria(
pid int
)
BEGIN
DELETE FROM categoria where id_categoria=pid; 

END $$

--------------------------------------------------------------------------------------------------------ESPACIO DE TRABAJO-

------------------------------------------------CREAR TABLA----------------------
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

------------------------------------------------PROCEDIMIENTO AGREGAR-------------
DELIMITER $$

CREATE or REPLACE PROCEDURE agregar_espacio (
pcapacidad INT,
pcategoria INT,
pdescripcion TEXT,
pestado TEXT,
pprecio INT,
prul text)
BEGIN

INSERT INTO espacio_trabajo (capacidad,categoria,descripcion,estado,precio,url_img) VALUES (pcapacidad,pcategoria,pdescripcion,pestado,pprecio,prul);

END$$

DELIMITER $$


------------------------------------------------PROCEDIMIENTO MODIFICAR-------------
DELIMITER $$

CREATE PROCEDURE actualizar_espacio(
pespacioid INT,
pcapacidad INT,
pcategoria INT,
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
		capacidad=pcapacidad,
		categoria=pcategoria,
		descripcion=pdescripcion,
		estado=pestado,
		precio=pprecio,
		url_img=imagen
		WHERE ID_espacio_trabajo=pespacioid;
	ELSE
		update espacio_trabajo 
		SET 
		capacidad=pcapacidad,
		categoria=pcategoria,
		descripcion=pdescripcion,
		estado=pestado,
		precio=pprecio,
		url_img=purl
		WHERE ID_espacio_trabajo=pespacioid;
	END IF;
END$$

-----------------------------------------------------------------------------------------ARRIENDO--
---------------------------------------------------------------TABLA ARRIENDO--

CREATE TABLE arriendo(
id_repeserva INT PRIMARY KEY AUTO_INCREMENT,
fecha_reserva DATE NOT NULL,
fecha_ini_solicitada DATE NOT NULL,
fecha_fin_solicitada DATE NOT NULL,
titular INT NOT NULL,
estado VARCHAR(15) NOT NULL,
tipo_pago INT NOT NULL,
valor_Total INT NOT NULL,
id_espacio_trabajo INT NOT NULL  
);


---------------------------------------------------------------LAS FORANEAS DE ARRIENDO--

ALTER TABLE arriendo ADD CONSTRAINT la_fk_de_espacioarriendo FOREIGN KEY (id_espacio_trabajo) REFERENCES espacio_trabajo (id_espacio_trabajo);
ALTER TABLE arriendo add constraint la_fk_de_pago FOREIGN KEY (Tipo_pago) REFERENCES tipo_de_pago (ID_pago);
ALTER TABLE arriendo ADD CONSTRAINT la_fk_de_titular FOREIGN KEY (Titular) REFERENCES usuario (rut);

---------------------------------------------------------------PA AGREGAR ARRIENDO--

DELIMITER $$
CREATE or REPLACE PROCEDURE agregar_arriendo ( pfecha_ini_solicitada date, pfecha_fin_solicitada date, ptitular int, pvalor_total int,pid_espacio_trabajo int )
BEGIN

INSERT INTO arriendo(
fecha_reserva,
fecha_ini_solicitada,
fecha_fin_solicitada,
titular,
estado,
tipo_pago,
valor_total,
id_espacio_trabajo) 
VALUES (CURDATE(),pfecha_ini_solicitada,pfecha_fin_solicitada,ptitular,'vigente',1,pvalor_total,pid_espacio_trabajo);
END$$



-----------------------------------------------------------------------------------------------------------------------------------CONSULTAS


-------------------------------------------------------------------------------------------------C. ESPACIOS DE TRABAJO
------------------------------------------------PROCEDIMIENTO CONSULTAR ESPACIO-------------
DELIMITER $$
CREATE PROCEDURE consulta_espacio_concategoria ()
BEGIN

SELECT
 espacio_trabajo.id_espacio_trabajo,
 espacio_trabajo.capacidad,
 espacio_trabajo.descripcion,
 espacio_trabajo.estado,
 espacio_trabajo.precio,
 espacio_trabajo.url_img,
 categoria.nombre_cat
 FROM espacio_trabajo INNER JOIN
 categoria ON  espacio_trabajo.categoria = categoria.id_categoria;


END $$


------------------------------------------------PROCEDIMIENTO CONSULTAR ESPACIO POR ID-------------

DELIMITER $$
CREATE PROCEDURE consulta_espacio_concategoria_por_id (pid_espacio int)
BEGIN

SELECT categoria.nombre_cat, categoria.id_categoria, espacio_trabajo.descripcion, espacio_trabajo.id_espacio_trabajo, espacio_trabajo.estado, espacio_trabajo.capacidad, espacio_trabajo.precio, espacio_trabajo.url_img 
FROM espacio_trabajo 
INNER JOIN categoria 
ON categoria.id_categoria = espacio_trabajo.categoria and espacio_trabajo.id_espacio_trabajo=pid_espacio;

END $$



-------------------------------------------------------------



--------------------------------------------------------------PA PARA VERIFICAR LA FECHA Y LA MAS PROXIMA CON EL MISMO RANGO DE DIAS QUE SE CONSULTA-----------------

DELIMITER $$
    CREATE or replace PROCEDURE calcular_horario_disp(IN pidesp int, IN pfini date, IN pffin date, OUT resultado date)
BEGIN

  DECLARE fecha_ultima date DEFAULT 0;
  SET max_sp_recursion_depth = 50;

  
   	select max(arriendo.fecha_fin_solicitada)
    from espacio_trabajo 
    inner join arriendo on espacio_trabajo.id_espacio_trabajo = arriendo.id_espacio_trabajo
    and espacio_trabajo.id_espacio_trabajo = pidesp
    and arriendo.fecha_ini_solicitada <= pffin
    AND arriendo.fecha_fin_solicitada >= pfini
    order by arriendo.fecha_fin_solicitada desc
    into fecha_ultima;
    
    if fecha_ultima THEN
    	set pfini=(select DATE_ADD(pfini,INTERVAL 1 DAY));
        set pffin=(select DATE_ADD(pffin,INTERVAL 1 DAY));
		
        call calcular_horario_disp(pidesp, pfini,pffin, resultado);
     else
     	set resultado=pfini;
      	
    end if;
	
END $$

-------------PARA LLAMAR A ESTE PA INOUT SE UTILIZA UNA FUNCION SQL

DELIMITER $$
create or replace function fecha_ini_disp(id int, ini text, fin text)
RETURNS date 
BEGIN
	DECLARE fec date;
    call calcular_horario_disp(id,ini,fin,fec);
    return fec;
END $$


--------------------------------------------------------------PA PARA LISTAR ARRIENDO EN ADMIN-----------------

DELIMITER $$
CREATE PROCEDURE lista_arriendo_adm()
BEGIN

SELECT arriendo.id_reserva,arriendo.id_espacio_trabajo ,arriendo.fecha_reserva, arriendo.fecha_ini_solicitada,fecha_fin_solicitada, arriendo.valor_Total ,tipo_de_pago.Nombre_pago, arriendo.titular
FROM arriendo 
INNER JOIN tipo_de_pago 
ON arriendo.tipo_pago = tipo_de_pago.ID_pago;

END $$

--------------------------------------------------------------PA PARA LISTAR ARRIENDO EN USUARIO-----------------

DELIMITER $$
CREATE PROCEDURE lista_arriendo_usu(prut int)
BEGIN

SELECT arriendo.id_reserva,arriendo.id_espacio_trabajo ,arriendo.fecha_reserva, arriendo.fecha_ini_solicitada,fecha_fin_solicitada, arriendo.valor_Total ,tipo_de_pago.Nombre_pago, arriendo.titular
FROM arriendo 
INNER JOIN tipo_de_pago 
ON arriendo.tipo_pago = tipo_de_pago.ID_pago and arriendo.titular=prut;

END $$

-------------COSAS QUE FALTAN EN EL SISTEMA 


	->RF-9 "LISTADO DE ARRIENDO"    ->'LISTO 1/2'
	->RF-10 "MODIFICAR ARRIENDO"	
	

-------------REQUISITOS FUNCIONALES FALTANTES 

	-> "ELIMINAR USUARIO"

-------------COSAS QUE FALTAN GLOBALMENTE 

	->"LISTAR CATEGORIA"
	->"AGREGAR CATEGORIA"
	->"MODIFICAR CATEGORIA"