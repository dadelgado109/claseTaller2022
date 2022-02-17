
/*
 * -------------------------------------------------------------------------------------------
 * NUMERICOS
 * -------------------------------------------------------------------------------------------
 * INT Enteros 
 * TINYINT Enteros -128 al 128 
 * FLOAT Son numeros con decimales 
 * BOLEANOS TRUE o FALSE 1 y 0
 * BIGINT Entero mas grande de todos 
 * 
 * 
 * -------------------------------------------------------------------------------------------
 * STRING (Cadena de texto)
 * ------------------------------------------------------------------------------------------- 
 * CHAR       (X) x Significa la cantidad de caracteres que va a tener ese campo  CHAR(10) El numero maximo es 255  
 * VARCHAR    (x) x Significa la cantidad de caracteres que va a tener ese campo  VARCHAR(10) El numero maximo es 255
 * TINYTEXT   Char de 255
 * TEXT		  64.000 Caracteres
 * LONGTEXT	   
 * ENUM 	  "casa,Alfajores,Golocinas,Pajaros" 
 * 
 * 
 * -------------------------------------------------------------------------------------------
 * FECHAS
 * ------------------------------------------------------------------------------------------- 
 * 
 * DATE 		Fecha en formato YYYY-mm-dd
 * HOUR 		Simplente va a guardar la hora
 * DATETIME 	Tiene un formato fecha YYYY-mm-dd H:m:s
 * TIMESTAMP	Tiene el formato fecha YYYY-mm-dd H:m:s PERO SE RIGE POR LA HORA UNIX
 * 				1970-01-01 e iba hasta 2039 // 1645917310
 * 
 * */


-- Soy un comentario
SHOW dataBases;

-- Creamos Base de datos
/*
 * Para crear usamos comando CREATE DATABASE y despues le asignamos un nombre
 * CREATE DATABASE <nombre>
 * */
CREATE DATABASE libreria;

-- Movernos dentro la base de datos
/*
 * PAra movermos a una base de datos usamos el comando USE y despues el nombre de nuestra base de datos
 * USE <nombre>
 * */
USE libreria;

-- Para las tablas que estan dentro de la base de datos
/*
 * Para ver las tablas que tiene una base de datos con el comando SHOW table
 * SHOW tables
 * */

SHOW tables;

/*
-- Crear una tabla Clientes
-- Identificador Unico  
-- Nombre VARCHAR(20) 
-- Apellidos VARCHAR(50)
-- Documento VARCHAR(30)  
-- FechaNacimiento DATE
-- Email TINYTEXT
-- Clave TINYTEXT
-- estadoRegsitro ENUM "ingresar,activo,borrado,bloquedo" 
-- fechaEdicion DATETIME
-- Historial - LONGTEXT ( De donde - quien - cuando )
*/

-- Para creat una tabla

CREATE TABLE clientes (
	idCliente INT(7) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del cliente ',
	nombre	VARCHAR(20) NOT NULL,
	apellidos VARCHAR(50) NOT NULL,
	documento VARCHAR(30) NULL,
	fechaNacimiento DATE,
	email	TINYTEXT NOT NULL,
	clave TINYTEXT,
	estadoRegistro ENUM('Ingresado','Activado','Bloqueado','Borrado') COMMENT 'Ingresado:Cuando ingresa el usuario, Activado:Cuando confima por mail, Bloqueado:Usuario que se porto mal, Borrado:Usuario que se borro',
	fechaEdicion DATETIME COMMENT 'Es la fecha que se manipulo por ultima vez el registro',	
	historial LONGTEXT NULL COMMENT 'Tiene un formato de donde - quien - cuando',
	PRIMARY KEY (idCliente)	
);

-- PARA BORRAR UNA TABLA
DROP TABLE newtable;

-- Para traer la informacion de la tabla
SELECT * FROM clientes;


-- Ingresamos datos 
INSERT INTO clientes (nombre,apellidos,documento,fechaNacimiento,email,clave,estadoRegistro,fechaEdicion,historial)
VALUES ("Damian","Delgado","4ZZZZXXXX","1987-09-10","damisintesis109@gmail.com","CAP1891",'Ingresado','2022-02-11 21:34:22', "()");

INSERT INTO clientes (nombre,apellidos,documento,fechaNacimiento,email,clave,estadoRegistro,fechaEdicion,historial)
VALUES ( "Federico","Valverde","5ZZZZXXXX",NULL,"fvalverde@realmadrid.com","no la se",'Ingresado','2022-02-11 21:34:22', "()");

INSERT INTO clientes (nombre,apellidos,documento,fechaNacimiento,email,clave,estadoRegistro,fechaEdicion,historial)
VALUES ( "Matias","Vecino","44985",NULL,"vecino@intermilan.com","no la se",'Ingresado','2022-02-11 21:34:22', "()");

INSERT INTO clientes (nombre,apellidos,documento,fechaNacimiento,email,clave,estadoRegistro,fechaEdicion,historial)
VALUES ( "Diego","Lugano","1112456",NULL,"lugano@nojuegomasalfutbol.com","no la se",'Ingresado','2022-02-11 21:34:22', "()");

INSERT INTO clientes (nombre,apellidos,documento,fechaNacimiento,email,clave,estadoRegistro,fechaEdicion,historial)
VALUES ( "El Cebolla","Rodriguez","5112456",NULL,"cebolla@plazacolonia.com","jdkljklddjkhsdjb san,328947327843289hjlfhnjdsnf jkdsh",'Ingresado','2022-02-11 21:34:22', "()");

INSERT INTO clientes (nombre,apellidos,documento,fechaNacimiento,email,clave,estadoRegistro,fechaEdicion,historial)
VALUES ( "Diego","Forlan","3112456",'1980-05-22',"dforlan@durazno.com","El cachabacha",'Ingresado','2022-02-11 21:34:22', "()");

INSERT INTO clientes (nombre,apellidos,documento,fechaNacimiento,email,clave,estadoRegistro,fechaEdicion,historial)
VALUES ( "Pablo","Forlan","456842",'1975-06-22',"pforlan@montevideo.com","soypablito",'Ingresado','2022-02-11 21:34:22', "()");


INSERT INTO clientes SET
	nombre = "Rodrigo",
	apellidos = "Bentacur",
	documento = "4568321",
	fechaNacimiento = "2000-06-15",
	email = "rbentacur@toteham.uk",
	clave = "futbol",
	estadoRegistro = "Ingresado",
	fechaEdicion = "2022-02-14 20:34:22",
	historial = "()";


-- Traigo toda la informacion que hay en la tabla
SELECT * FROM clientes;

-- Traigo toda la informacion que hay en la tabla y solo muestros 3 campos idCliente, nombre, documento
SELECT idCliente, nombre, documento FROM clientes;

-- Traigo todos los registros que tiene como nombre a damian
SELECT * FROM clientes WHERE nombre = "damian";

-- Traigo todos los registros que tiene como nombre a damian
SELECT * FROM clientes WHERE nombre = "DaMiaN";

-- Traigo todos los registros que tiene como nombre a diego
SELECT * FROM clientes WHERE nombre = "DIEGO";


SELECT * FROM clientes WHERE fechaNacimiento = "1980-05-22";

SELECT * FROM clientes WHERE fechaNacimiento < "1980-05-22";

SELECT * FROM clientes WHERE fechaNacimiento > "1980-05-22";

SELECT * FROM clientes WHERE fechaNacimiento IS NULL;

-- Para taer un grupo de registro que coincidan uso el IN 
SELECT * FROM clientes WHERE nombre IN ("damian", "diego");
-- %
SELECT * FROM clientes WHERE email LIKE ("%.uy");

SELECT * FROM clientes WHERE email LIKE ("%@%");

SELECT * FROM clientes WHERE email LIKE ("%@%.uy");

UPDATE clientes SET
		fechaNacimiento = "1985-03-22",
		fechaEdicion = "2022-02-14 19:35:55"
	WHERE idCliente = 4;

UPDATE clientes SET
		clave = "Es la mejor clave",
		fechaEdicion = "2022-02-14 19:35:55"
	WHERE idCliente = 2;

UPDATE clientes SET
		email = "soydiego@toyota.com",
		fechaEdicion = "2022-02-14 19:35:55"
	WHERE idCliente = 6;

SELECT * FROM clientes 
	WHERE apellidos = "forlan"
	AND nombre = "diego"
	AND email LIKE ("%toyo%");
	
SELECT * FROM clientes 
	WHERE (apellidos = "forlan" OR apellidos = "lugano")
	AND nombre = "diego"
	AND email LIKE ("%.uy%");

-- Para traer una cantidad de registros controladas usamos el limit.  
SELECT * FROM clientes LIMIT 5;
-- El limit se divide en 2 parte   LIMIT [0] [5] el primer valor de donde arranco y el segundo el total

SELECT * FROM clientes LIMIT 0,5;

-- -----------------------------------------------------------------------------------

-- La funcion NOW() devuelve la fecha actual del servidor en formato Y-m-d H:i:s

SELECT * FROM clientes WHERE email LIKE ("%am@cap%");

SELECT NOW();

INSERT INTO clientes (nombre,apellidos,documento,fechaNacimiento,email,clave,estadoRegistro,fechaEdicion,historial)
VALUES ( "Agustin","Alvarez Martines","50000220",'2005-01-22',"aam@cap.com","goleador",'Ingresado',NOW(), "()");

-- -----------------------------------------------------------------------------------

-- la funcion CURDATE() devuelve la fecha del hoy

SELECT CURDATE();
-- 2022-02-14

-- 
SELECT date_format(NOW() , "%H:%i:%s %d/%m/%y"); 
-- 20:10:57 14/02/22

-- Este es el formato official de mysql
SELECT date_format(NOW() , "%Y-%m-%d %H:%i:%s"); 
-- 2022-02-14 20:12:11

/*
 * Y - Anio en 4 digitos
 * y - anio en 2 digitos
 * 
 * M - para el mes del año en letra
 * m - Trae el mes del anio en numero
 * 
 * D - Para el dia nos trae en el 14th
 * d - Para cuando es numero decimal
 * 
 * H - Formato de 24 horas 
 * h - Formato de 12 horas
 * 
 * I - Hace referencia a los minutos Formato de con 0
 * i - 
 * 
 * s - trae los segundo que esta en servidor
 *  
 * */

SELECT idCliente, nombre, apellidos, DATE_FORMAT(fechaEdicion, "%d/%m/%Y") AS fecha_editado FROM clientes;

-- -----------------------------------------------------------------------------------

SELECT * FROM clientes;

SELECT COUNT(*) FROM clientes;

DELETE FROM clientes;

DELETE FROM clientes 
	WHERE nombre = "Damian";

SELECT * FROM clientes WHERE nombre = "Damian";

SELECT COUNT(*) FROM clientes WHERE nombre = "Damian";

DELETE FROM clientes 
	WHERE nombre = "Damian" LIMIT 3;

-- ----------------------------------------------------------------------------------


CREATE TABLE genero (
	idGenero INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del genero ',
	nombre	VARCHAR(20) NOT NULL,
	descripcion TEXT NULL,
	estadoRegistro ENUM('Ingresado','Borrado') COMMENT 'Ingresado:Cuando ingresa el usuario, Borrado:Usuario que se borro',
	fechaEdicion DATETIME COMMENT 'Es la fecha que se manipulo por ultima vez el registro',	
	historial LONGTEXT NULL COMMENT 'Tiene un formato de donde - quien - cuando',
	PRIMARY KEY (idGenero)	
);

SELECT * FROM genero;

CREATE TABLE autores (
	idAutor INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del autor',
	nombre	VARCHAR(20) NOT NULL,
	pais CHAR(3) NULL,
	estadoRegistro ENUM('Ingresado','Borrado') COMMENT 'Ingresado:Cuando ingresa el usuario, Borrado:Usuario que se borro',
	fechaEdicion DATETIME COMMENT 'Es la fecha que se manipulo por ultima vez el registro',	
	historial LONGTEXT NULL COMMENT 'Tiene un formato de donde - quien - cuando',
	PRIMARY KEY (idAutor)	
);

SELECT * FROM autores;

SHOW CREATE TABLE autores;

CREATE TABLE libros (
	idLibro INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del libro',
	nombre VARCHAR(100) NOT NULL COMMENT 'Es el nombre del libro',
	editoriales VARCHAR(50) NOT NULL COMMENT 'Es el nombre de la editorial',
	renia TEXT NULL COMMENT 'Es la resenia del libro',
	isbn TEXT NULL COMMENT 'Numero Internacional Normalizado para Libros',
	estadoRegistro ENUM('Ingresado','Borrado') COMMENT 'Ingresado:Cuando ingresa el usuario, Borrado:Usuario que se borro',
	idGenero INT(5) NOT NULL,
	fechaEdicion DATETIME COMMENT 'Es la fecha que se manipulo por ultima vez el registro',	
	historial LONGTEXT NULL COMMENT 'Tiene un formato de donde - quien - cuando',
	PRIMARY KEY (idLibro),
	KEY idGenero (idGenero),
	CONSTRAINT fk_genero_id FOREIGN KEY (idGenero) REFERENCES genero (idGenero)	
);

CREATE TABLE libros_autores (
	idLibroAutor INT(50) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la realacion entre los libros y los autores',	
	idLibro	INT(5) NOT NULL,
	idAutor INT(5) NOT NULL,	
	PRIMARY KEY (idLibroAutor),
	KEY idLibro (idLibro),
	KEY idAutor (idAutor),
	CONSTRAINT fk_libro_id FOREIGN KEY (idLibro) REFERENCES libros (idLibro),
	CONSTRAINT fk_autor_id FOREIGN KEY (idAutor) REFERENCES autores (idAutor)	
);


	SELECT * FROM 
		libros 
	INNER JOIN genero ON genero.idGenero = libros.idGenero

	
	SELECT
		lib.idLibro, gen.nombre AS nombre_genero , lib.editoriales, lib.renia, lib.isbn, lib.estadoRegistro, lib.idGenero, lib.nombre AS nombre_libro
	FROM 
		libros lib
	INNER JOIN genero gen ON gen.idGenero = lib.idGenero;
	
	
	/* 
	 * 	De ESta forma ordenamos los libro
	 		ORDER BY <campo> ASC o DESC   
	 		ASC: para indicar acendete
			DESC: para indicar decendente
	**/
	SELECT * FROM libros ORDER BY nombre DESC; 
	
	-- En esta parate indicamos primero ordenamos pod isbn decendente y despues idLibro Acendente
	SELECT * FROM libros ORDER BY isbn DESC, idLibro ASC ; 

	
	/*
		El group by sirve para agrupar los registros que son iguales 
		GROUP BY <nombre del campo> al final de la consulta antes del limit  	
	 * */
	SELECT editoriales FROM libros GROUP BY editoriales; 

	SELECT editoriales, count(editoriales) AS totalEditoriales FROM libros GROUP BY editoriales; 
	
	SELECT editoriales, estadoRegistro, count(editoriales) AS totalEditoriales FROM libros GROUP BY editoriales, estadoRegistro; 
	

	SELECT
		-- Todo campo que voy a responder en la respuesta 
	FROM
		-- Las tabla y join que se van a manejar
	WHERE
		-- Las condiciones en que se aplica
	ORDER BY
		-- El orden que vamos a utilizar
	GROUP BY 
		-- El Agrupamiento que se va a hacer
	LIMIT  [INT], [INT2]	
		-- El limite que se va a usar
		
	
	
	SELECT * FROM libros l ;
	
	/*
	 * Para modificar los campos usamos el ALTER TABLE <tabla>
	 * 	[ADD] o [DROP] o [MODIFY] + [COLUMN] + 
	 * ADD: se usa para agregar 
	 * DROP: para borrar
	 * MODIFY: para modificar el campo
	 * 
	 * */
	ALTER TABLE libros
		ADD COLUMN precio INT(5);
	
	ALTER TABLE libros
		DROP COLUMN precio;
	
	ALTER TABLE libros
		MODIFY COLUMN precio VARCHAR(10);
	
	ALTER TABLE libros 
		MODIFY COLUMN precio INT(10) 
		AFTER estadoRegistro;

	

	
	
	SELECT * FROM libros;

	SELECT * FROM autores; 	

	SELECT * FROM libros_autores;
	-- 5 Harry Potter: Y la piedra filosofal
	-- 6 Harry Potter II: Y la camara secreta
	-- 8 Harry Potter IV: El el caliz del fuego
	
	INSERT INTO libros_autores SET
		idAutor = 3,
		idLibro = 8;
	
	
	
	SELECT li.* FROM 
		libros_autores la
		INNER JOIN autores au ON au.idAutor = la.idAutor 
		INNER JOIN libros li ON li.idLibro = la.idLibro
	WHERE au.nombre = "Nelson";
		
	SELECT * FROM 
			libros l 		
		WHERE idLibro IN (		
			SELECT idLibro FROM 
				libros_autores
				WHERE idAutor IN (				
					SELECT idautor FROM autores WHERE nombre = "Nelson"
				)
		)

		
	SELECT nombre, MAX(precio) AS maximoPrecio FROM 
		(
			SELECT  au.nombre, li.precio FROM 
				libros_autores la
				INNER JOIN autores au ON au.idAutor = la.idAutor 
				INNER JOIN libros li ON li.idLibro = la.idLibro
			WHERE au.nombre IN ("JRR tolkein","JK Rouliwng")
		) AS tabla		
		GROUP BY nombre;
		

	SELECT  au.nombre, li.precio FROM 
				libros_autores la
				INNER JOIN autores au ON au.idAutor = la.idAutor 
				INNER JOIN libros li ON li.idLibro = la.idLibro
			WHERE au.nombre IN ("JRR tolkein","JK Rouliwng")
		
		
		
	
	
		
	
	
	
	


SELECT * FROM libros l ;
SELECT * FROM genero g ;


SQL Error [1052] [23000]: Column 'nombre' in field list is ambiguous

SQL Error [1048] [23000]: Column 'nombre' cannot be NULL

SQL Error [1292] [22001]: Data truncation: Incorrect date value: 'Once de mayo de 1998' for column 'fechaNacimiento' at row 1

SQL Error [1064] [42000]: You have an error in your SQL syntax; 
check the manual that corresponds to your MySQL server version for the right syntax to use near '"Valverde","5ZZZZXXXX","1998-05-11","fvalverde@realmadrid.com","no la se",'Ingre' at line 3
































































