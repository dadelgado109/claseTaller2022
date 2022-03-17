<?php

	require_once("modelos/generico.php");

	$objGenerico = new generico();

	echo(" -----  INICIANDO INSTALACION ----- ");

	$arraySQL = array();

	$arraySQL[] = "
			SET SESSION FOREIGN_KEY_CHECKS=0;
			DROP TABLE IF EXISTS genero;
			DROP TABLE IF EXISTS libros;
			DROP TABLE IF EXISTS autores;
			DROP TABLE IF EXISTS libros_autores;
			DROP TABLE IF EXISTS usuarios;
			DROP TABLE IF EXISTS clientes;
			SET SESSION FOREIGN_KEY_CHECKS=1;
	";


	$arraySQL[] = "CREATE TABLE `genero` (
	    `idGenero` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del genero ',
	    `nombre` varchar(20) NOT NULL,
	    `descripcion` text,
	    `estadoRegistro` enum('Ingresado','Borrado') DEFAULT NULL COMMENT 'Ingresado:Cuando ingresa el usuario, Borrado:Usuario que se borro',
	    `fechaEdicion` datetime DEFAULT NULL COMMENT 'Es la fecha que se manipulo por ultima vez el registro',
	    `historial` longtext COMMENT 'Tiene un formato de donde - quien - cuando',
	    PRIMARY KEY (`idGenero`)
	  ); ";

	$arraySQL[] = "CREATE TABLE `libros` (
	    `idLibro` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del libro',
	    `nombre` varchar(100) NOT NULL COMMENT 'Es el nombre del libro',
	    `imagen` varchar(150) NOT NULL COMMENT 'Es la ruta de la imagen',
	    `editoriales` varchar(50) NOT NULL COMMENT 'Es el nombre de la editorial',
	    `resenia` text COMMENT 'Es la resenia del libro',
	    `isbn` text COMMENT 'Numero Internacional Normalizado para Libros',
	    `estadoRegistro` enum('Ingresado','Borrado') DEFAULT NULL COMMENT 'Ingresado:Cuando ingresa el usuario, Borrado:Usuario que se borro',
	    `idGenero` int(5) NOT NULL,
	    `precio` int(5) NOT NULL,
	    `fechaEdicion` datetime DEFAULT NULL COMMENT 'Es la fecha que se manipulo por ultima vez el registro',
	    `historial` longtext COMMENT 'Tiene un formato de donde - quien - cuando',
	    PRIMARY KEY (`idLibro`),
	    KEY `idGenero` (`idGenero`),
	    CONSTRAINT `fk_genero_id` FOREIGN KEY (`idGenero`) REFERENCES `genero` (`idGenero`)
	  ); ";

	$arraySQL[] = "CREATE TABLE `autores` (
	    `idAutor` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del autor',
	    `nombre` varchar(20) NOT NULL,
	    `pais` char(3) DEFAULT NULL,
	    `estadoRegistro` enum('Ingresado','Borrado') DEFAULT NULL COMMENT 'Ingresado:Cuando ingresa el usuario, Borrado:Usuario que se borro',
	    `fechaEdicion` datetime DEFAULT NULL COMMENT 'Es la fecha que se manipulo por ultima vez el registro',
	    `historial` longtext COMMENT 'Tiene un formato de donde - quien - cuando',
	    PRIMARY KEY (`idAutor`)
	  );";

	$arraySQL[] = "CREATE TABLE `libros_autores` (
	    `idLibroAutor` int(50) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador de la realacion entre los libros y los autores',
	    `idLibro` int(5) NOT NULL,
	    `idAutor` int(5) NOT NULL,
	    PRIMARY KEY (`idLibroAutor`),
	    KEY `idLibro` (`idLibro`),
	    KEY `idAutor` (`idAutor`),
	    CONSTRAINT `fk_autor_id` FOREIGN KEY (`idAutor`) REFERENCES `autores` (`idAutor`),
	    CONSTRAINT `fk_libro_id` FOREIGN KEY (`idLibro`) REFERENCES `libros` (`idLibro`)
	  );";

	$arraySQL[] = "CREATE TABLE `usuarios` (
	    `idUsuario` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del usuario del sistema ',
	    `nombre` varchar(50) NOT NULL,
	    `email` tinytext NOT NULL,
	    `clave` tinytext,
	    `perfil` enum('Administrador','Supervisor','Vendedor') DEFAULT NULL,
	    `estadoRegistro` enum('Ingresado','Activado','Bloqueado','Borrado') DEFAULT NULL COMMENT 'Ingresado:Cuando ingresa el usuario, Activado:Cuando confima por mail, Bloqueado:Usuario que se porto mal, Borrado:Usuario que se borro',
	    `fechaEdicion` datetime DEFAULT NULL COMMENT 'Es la fecha que se manipulo por ultima vez el registro',
	    `historial` longtext COMMENT 'Tiene un formato de donde - quien - cuando',
	    PRIMARY KEY (`idUsuario`)
	  );";

    $arraySQL[] = "CREATE TABLE `clientes` (
    `idCliente` int(7) NOT NULL AUTO_INCREMENT COMMENT 'Es el identificador del cliente ',
    `nombre` varchar(20) NOT NULL,
    `apellidos` varchar(50) NOT NULL,
    `documento` varchar(30) DEFAULT NULL,
    `fechaNacimiento` date DEFAULT NULL,
    `email` tinytext NOT NULL,
    `clave` tinytext,
    `estadoRegistro` enum('Ingresado','Activado','Bloqueado','Borrado') DEFAULT NULL COMMENT 'Ingresado:Cuando ingresa el usuario, Activado:Cuando confima por mail, Bloqueado:Usuario que se porto mal, Borrado:Usuario que se borro',
    `fechaEdicion` datetime DEFAULT NULL COMMENT 'Es la fecha que se manipulo por ultima vez el registro',
    `historial` longtext COMMENT 'Tiene un formato de donde - quien - cuando',
    PRIMARY KEY (`idCliente`)
    ) ; ";

	$arraySQL[] = "INSERT INTO `usuarios` VALUES 
							(1,'Administrador','admin@admin.com','21232f297a57a5a743894a0e4a801fc3','Administrador','Activado','2022-03-10 12:43:36','');";


	$arraySQL[] = "INSERT INTO `genero` VALUES 
						(1,'AcciÃ³n','Son los que tiene aventuras','Borrado','2022-03-09 11:18:46',''),
						(2,'Policiales','Son los gÃ©neros que tienen policias y criminales','Ingresado','2022-03-09 11:18:17',''),
						(3,'Romanticos','Son lo que relantan romances y historias de amor','Ingresado','2022-03-09 11:18:35',''),
						(4,'Damian','No tiene descripcion','Ingresado','2022-03-10 12:15:33','');";



    foreach($arraySQL as $tabla){

        $objGenerico->ejecutarSentencia($tabla);

    }

    echo(" ----- INSTALACION FINALIZADA ----- ");

?>