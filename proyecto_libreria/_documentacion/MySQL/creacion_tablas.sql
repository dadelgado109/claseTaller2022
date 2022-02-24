


CREATE TABLE usuarios (
	idUsuario INT(3) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del usuario del sistema ',
	nombre	VARCHAR(50) NOT NULL,
	email TINYTEXT NOT NULL,
	clave TINYTEXT NULL,
	perfil ENUM('Administrador','Supervisor','Vendedor'),
	estadoRegistro ENUM('Ingresado','Activado','Bloqueado','Borrado') COMMENT 'Ingresado:Cuando ingresa el usuario, Activado:Cuando confima por mail, Bloqueado:Usuario que se porto mal, Borrado:Usuario que se borro',
	fechaEdicion DATETIME COMMENT 'Es la fecha que se manipulo por ultima vez el registro',	
	historial LONGTEXT NULL COMMENT 'Tiene un formato de donde - quien - cuando',
	PRIMARY KEY (idUsuario)		
) COMMENT 'Esta tabla identifica a los usaurios que administran el sistema' ;

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
) COMMENT 'Esta tabla identifica a los clientes que utilizan el servicio y son los usarios que utilizamos en la web'  ;

CREATE TABLE genero (
	idGenero INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del genero ',
	nombre	VARCHAR(20) NOT NULL,
	descripcion TEXT NULL,
	estadoRegistro ENUM('Ingresado','Borrado') COMMENT 'Ingresado:Cuando ingresa el usuario, Borrado:Usuario que se borro',
	fechaEdicion DATETIME COMMENT 'Es la fecha que se manipulo por ultima vez el registro',	
	historial LONGTEXT NULL COMMENT 'Tiene un formato de donde - quien - cuando',
	PRIMARY KEY (idGenero)	
);

CREATE TABLE autores (
	idAutor INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del autor',
	nombre	VARCHAR(20) NOT NULL,
	pais CHAR(3) NULL,
	estadoRegistro ENUM('Ingresado','Borrado') COMMENT 'Ingresado:Cuando ingresa el usuario, Borrado:Usuario que se borro',
	fechaEdicion DATETIME COMMENT 'Es la fecha que se manipulo por ultima vez el registro',	
	historial LONGTEXT NULL COMMENT 'Tiene un formato de donde - quien - cuando',
	PRIMARY KEY (idAutor)	
);

CREATE TABLE libros (
	idLibro INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del libro',
	nombre VARCHAR(100) NOT NULL COMMENT 'Es el nombre del libro',
	imagen VARCHAR(150) NOT NULL COMMENT 'Es la ruta de la imagen',
	editoriales VARCHAR(50) NOT NULL COMMENT 'Es el nombre de la editorial',
	resenia TEXT NULL COMMENT 'Es la resenia del libro',
	isbn TEXT NULL COMMENT 'Numero Internacional Normalizado para Libros',
	estadoRegistro ENUM('Ingresado','Borrado') COMMENT 'Ingresado:Cuando ingresa el usuario, Borrado:Usuario que se borro',
	idGenero INT(5) NOT NULL,
	precio INT(5) NOT NULL,
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




