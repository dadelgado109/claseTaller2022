

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



SELECT idCliente, nombre, documento FROM clientes;

SELECT * FROM clientes WHERE nombre = "damian";

SELECT * FROM clientes WHERE nombre = "DaMiaN";

SELECT * FROM clientes WHERE nombre = "DIEGO";



SQL Error [1048] [23000]: Column 'nombre' cannot be NULL

SQL Error [1292] [22001]: Data truncation: Incorrect date value: 'Once de mayo de 1998' for column 'fechaNacimiento' at row 1

SQL Error [1064] [42000]: You have an error in your SQL syntax; 
check the manual that corresponds to your MySQL server version for the right syntax to use near '"Valverde","5ZZZZXXXX","1998-05-11","fvalverde@realmadrid.com","no la se",'Ingre' at line 3
































































