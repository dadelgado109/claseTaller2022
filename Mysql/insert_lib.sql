


-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


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


-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

INSERT INTO genero SET
	nombre = "Documentales",
	descripcion = "",
	estadoRegistro = "Ingresado",
	fechaEdicion = NOW(),
	historial = "()";

INSERT INTO genero SET
	nombre = "Drama",
	descripcion = "",
	estadoRegistro = "Ingresado",
	fechaEdicion = NOW(),
	historial = "()";

INSERT INTO genero SET
	nombre = "Policiales",
	descripcion = "",
	estadoRegistro = "Ingresado",
	fechaEdicion = NOW(),
	historial = "()";

INSERT INTO genero SET
	nombre = "Aventura",
	descripcion = "",
	estadoRegistro = "Ingresado",
	fechaEdicion = NOW(),
	historial = "()";

INSERT INTO genero SET
	nombre = "Ciencia Ficcion",
	descripcion = "",
	estadoRegistro = "Ingresado",
	fechaEdicion = NOW(),
	historial = "()";

INSERT INTO genero SET
	nombre = "Infatiles",
	descripcion = "",
	estadoRegistro = "Ingresado",
	fechaEdicion = NOW(),
	historial = "()";

INSERT INTO genero SET
	nombre = "Mediavales",
	descripcion = "",
	estadoRegistro = "Ingresado",
	fechaEdicion = NOW(),
	historial = "()";


-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


	INSERT INTO autores SET 
		nombre = "SILVIA PEREZ",
		pais = "UYU",
		estadoRegistro = "ingresado",
		fechaEdicion = NOW(),
		historial = "()";
	
	INSERT INTO autores SET 
		nombre = "LUIS PRATS",
		pais = "UYU",
		estadoRegistro = "ingresado",
		fechaEdicion = NOW(),
		historial = "()";
	
	INSERT INTO libros SET
		nombre = "1971. NACIONAL CAMPEON DEL MUNDO", 
		editoriales = "BANDA ORIENTAL", 
		resenia = "", 
		isbn = "9789974110588", 
		estadoRegistro = "Ingresado", 
		idGenero = "1", 
		precio = 500,
		fechaEdicion = NOW(), 
		historial = "()";

	INSERT INTO libros_autores SET
		idLibro = "1", 
		idAutor = "1";

	INSERT INTO libros_autores SET
		idLibro = "1", 
		idAutor = "2";	

-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

	INSERT INTO libros SET
		nombre = "1001 COCHES DEPORTIVOS", 
		editoriales = "SERVILIBRO", 
		resenia = "", 
		isbn = "9788479718008", 
		estadoRegistro = "Ingresado", 
		idGenero = "1", 
		precio = 250,
		fechaEdicion = NOW(), 
		historial = "()";
	
-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	INSERT INTO autores SET 
		nombre = "LEWIS CARROLL",
		pais = "GBR",
		estadoRegistro = "ingresado",
		fechaEdicion = NOW(),
		historial = "()";	
	
	INSERT INTO libros SET
		nombre = "ALICIA EN EL PAÍS DE LAS MARAVILLAS", 
		editoriales = "EDELVIVES", 
		resenia = "Seis magníficas escenas tridimensionales tomadas de la edición original de Alicia en el País de las Maravillas ilustrada por sir John Tenniel. Desciende con Alicia por la madriguera y descubre el universo mágico del País de las Maravillas. Mira a Alicia crecer y menguar, presencia su encuentro con el Gato de Cheshire, únete al té con el Sombrerero Loco, baila con la Falsa Tortuga y asiste al juicio a la Sota de Corazones.", 
		isbn = "", 
		estadoRegistro = "Ingresado", 
		idGenero = "6", 
		precio = 1250,
		fechaEdicion = NOW(), 
		historial = "()";
	
	INSERT INTO libros_autores SET
		idLibro = "3", 
		idAutor = "3";	

-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	INSERT INTO autores SET 
		nombre = "HEINE BAKKEID",
		pais = "NOR",
		estadoRegistro = "ingresado",
		fechaEdicion = NOW(),
		historial = "()";	
	
	INSERT INTO libros SET
		nombre = "BAJO EL FARO", 
		editoriales = "EDELVIVES", 
		resenia = "Thorkild Aske fue una vez un buen policía, pero lo perdió todo cuando fue condenado a tres años por haber matado en un accidente de tráfico a una chica. Ahora acaba de salir de prisión, donde ha tocado fondo. En sus esfuerzos por reinsertarlo en la sociedad, su psiquiatra le encuentra un pequeño trabajo como detective: deberá encontrar a un joven que desapareció en las inmediaciones de un faro del norte del país. En apariencia, es una investigación sencilla aunque incómoda, ya que las posibilidades de encontrar al chico con vida son pocas. Al llegar al faro, Thorkild descubre que el mar encrespado le entrega un cadáver, pero, para su sorpresa, no es el que buscaba.", 
		isbn = "", 
		estadoRegistro = "Ingresado", 
		idGenero = "3", 
		precio = 350,
		fechaEdicion = NOW(), 
		historial = "()";
	
	INSERT INTO libros_autores SET
		idLibro = "4", 
		idAutor = "4";	
	
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


	INSERT INTO autores SET 
		nombre = "IAN HAMILTON",
		pais = "BHS",
		estadoRegistro = "ingresado",
		fechaEdicion = NOW(),
		historial = "()";	
	
	INSERT INTO libros SET
		nombre = "EL ABRAZO DE LA TIGRESA", 
		editoriales = "UMBRIEL", 
		resenia = "",
		isbn = "", 
		estadoRegistro = "Ingresado", 
		idGenero = "3", 
		precio = 715,
		fechaEdicion = NOW(), 
		historial = "()";

	INSERT INTO libros_autores SET
		idLibro = "5", 
		idAutor = "5";	
	
	INSERT INTO libros SET
		nombre = "EL DISCIPULO DE LAS VEGAS", 
		editoriales = "UMBRIEL", 
		resenia = "",
		isbn = "9788492915392", 
		estadoRegistro = "Ingresado", 
		idGenero = "3", 
		precio = 800,
		fechaEdicion = NOW(), 
		historial = "()";
	
	INSERT INTO libros_autores SET
		idLibro = "6", 
		idAutor = "5";	
	
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	INSERT INTO autores SET 
		nombre = "PABLO ROCCA",
		pais = "URY",
		estadoRegistro = "ingresado",
		fechaEdicion = NOW(),
		historial = "()";	
	
	INSERT INTO libros SET
		nombre = "EL 45, ENTREVISTAS /TESTIMONIOS", 
		editoriales = "BANDA ORIENTAL", 
		resenia = "",
		isbn = "9789974103665", 
		estadoRegistro = "Ingresado", 
		idGenero = "1", 
		precio = 310,
		fechaEdicion = NOW(), 
		historial = "()";
	
	INSERT INTO libros_autores SET
		idLibro = "7", 
		idAutor = "6";	
	
	
INSERT INTO libros SET
		nombre = "LOS CUADERNOS DEL DIOS VERDE", 
		editoriales = "INTENDENCIA DE MONTEVIDEO", 
		resenia = "",
		isbn = "9789974906136", 
		estadoRegistro = "Ingresado", 
		idGenero = "1", 
		precio = 220,
		fechaEdicion = NOW(), 
		historial = "()";
	
INSERT INTO libros_autores SET
		idLibro = "8", 
		idAutor = "6";	
	
	
INSERT INTO libros SET
		nombre = "ENSEÑANZA Y TEORIA DE LA LITERATURA EN JOSE ENRIQUE RODO", 
		editoriales = "BANDA ORIENTAL", 
		resenia = "",
		isbn = "9789974101814", 
		estadoRegistro = "Ingresado", 
		idGenero = "1", 
		precio = 400,
		fechaEdicion = NOW(), 
		historial = "()";
	
	INSERT INTO libros_autores SET
		idLibro = "9", 
		idAutor = "6";		

	INSERT INTO autores SET 
		nombre = "HEBER RAVIOLO",
		pais = "URY",
		estadoRegistro = "ingresado",
		fechaEdicion = NOW(),
		historial = "()";	
	
	INSERT INTO libros SET
		nombre = "HISTORIA DE LA LITERATURA URUGUAYA CONTEMPORANEA 2 TOMOS.", 
		editoriales = "BANDA ORIENTAL", 
		resenia = "",
		isbn = "9781234005573", 
		estadoRegistro = "Ingresado", 
		idGenero = "1", 
		precio = 1200,
		fechaEdicion = NOW(), 
		historial = "()";
		
	INSERT INTO libros_autores SET
		idLibro = "10", 
		idAutor = "6";		
	
	INSERT INTO libros_autores SET
		idLibro = "10", 
		idAutor = "7";	

	INSERT INTO libros SET
		nombre = "ANGEL RAMA,EMIR RODRIGUEZ MONEGAL Y EL BRASIL:DOS CARAS DE UN PROYECTO LATINOAMERICANO", 
		editoriales = "BANDA ORIENTAL", 
		resenia = "",
		isbn = "9789974104433 - 9788997410446", 
		estadoRegistro = "Ingresado", 
		idGenero = "1", 
		precio = 1200,
		fechaEdicion = NOW(), 
		historial = "()";
	
	INSERT INTO libros_autores SET
		idLibro = "11", 
		idAutor = "6";		

	
	INSERT INTO libros SET
		nombre = "HORACIO QUIROGA. EL ESCRITOR Y EL MITO", 
		editoriales = "BANDA ORIENTAL", 
		resenia = "",
		isbn = "9789974104815", 
		estadoRegistro = "Ingresado", 
		idGenero = "1", 
		precio = 420,
		fechaEdicion = NOW(), 
		historial = "()";
		
	INSERT INTO libros_autores SET
		idLibro = "12", 
		idAutor = "6";		
	
	
		
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	INSERT INTO autores SET 
		nombre = "RICK RIORDAN",
		pais = "URY",
		estadoRegistro = "ingresado",
		fechaEdicion = NOW(),
		historial = "()";	
	
	
	INSERT INTO libros SET
		nombre = "HEROES OF OLYMPUS 2 - THE SON OF NEPTUNE", 
		editoriales = "PENGUIN", 
		resenia = "The SECOND title in this number one, bestselling spin-off series from Percy Jackson creator, Rick Riordan.This crazy messed up world of gods and monsters is Percy Jackson's reality, which pretty much sucks for him.Percy Jackson, son of Poseidon, God of the Sea, has woken from a very deep sleep and come face to face with two snake-haired ladies who refuse to die. But they're the least of his problems. Because Percy finds himself at a camp for half-bloods, which doesn't ring any bells for him. There's just one name he remembers from his past. Annabeth.Only one thing is certain - Percy's questing days aren't over. He and fellow demigods Frank and Hazel must face the most important quest of all: the Prophecy of Seven.If they fail, it's not just their camp at risk. Percy's old life, the gods, and the entire world might be destroyed.",
		isbn = "", 
		estadoRegistro = "Ingresado", 
		idGenero = "4", 
		precio = 595,
		fechaEdicion = NOW(), 
		historial = "()";
		
	INSERT INTO libros_autores SET
		idLibro = "13", 
		idAutor = "8";		
	
	
	INSERT INTO libros SET
		nombre = "HEROES OF OLYMPUS 3 - THE MARK OF ATHENA", 
		editoriales = "PENGUIN", 
		resenia = "Annabeth felt as if someone had draped a cold washcloth across her neck. She heard that whispering laughter again, as if the presence had followed her from the ship. She looked up at the Argo II. Its massive bronze hull glittered in the sunlight.Part of her wanted to kidnap Percy right now, get on board and get out of here while they still could. She couldn't shake the feeling that something was about to go terribly wrong. She couldn't risk losing Percy again.",
		isbn = "", 
		estadoRegistro = "Ingresado", 
		idGenero = "4", 
		precio = 595,
		fechaEdicion = NOW(), 
		historial = "()";
		
	INSERT INTO libros_autores SET
		idLibro = "14", 
		idAutor = "8";		

	INSERT INTO libros SET
		nombre = "GUÍA CLASIFICADA DEL CAMPAMENTO MESTIZO", 
		editoriales = "SALAMANDRA", 
		resenia = "GUIA CLASIFICADA DEL CAMPAMENTO MESTIZO",
		isbn = "", 
		estadoRegistro = "Ingresado", 
		idGenero = "4", 
		precio = 400,
		fechaEdicion = NOW(), 
		historial = "()";
		
	INSERT INTO libros_autores SET
		idLibro = "15", 
		idAutor = "8";		
	
	
	INSERT INTO libros SET
		nombre = "LA SANGRE DEL OLIMPO - LOS HÉROES DEL OLIMPO IV", 
		editoriales = "SUDAMERICANA", 
		resenia = "EN EJÉRCITO DE GIGANTES. DOS BATALLAS A VIDA O MUERTE. Y SIETE HÉROES DISPUESTOS A IMPEDIR EL FIN DEL MUNDO. Los tripulantes del Argo II han salido victoriosos de sus misiones, pero están lejos de derrotar a Gea, la madre Tierra. Ella ha conseguido alzar a todos sus gigantes y planea sacrificar a dos semidioses en la festividad de Spes: necesita su sangre, la sangre del Olimpo, para despertar.Por otro lado, la legión romana del Campamento Júpiter, liderada por Octavio, está cada día más cerca del Campamento Mestizo. La Atenea Partenos deberá dirigirse al oeste para impedir la guerra entre los campamentos, mientras el Argos II navega hacia Atenas... ¿Cómo podrán los jóvenes semidioses derrotar a los gigantes de Gea? Ya han sacrificado demasiado, pero si Gea despierta... será el final",
		isbn = "", 
		estadoRegistro = "Ingresado", 
		idGenero = "4", 
		precio = 692,
		fechaEdicion = NOW(), 
		historial = "()";
		
	INSERT INTO libros_autores SET
		idLibro = "16", 
		idAutor = "8";		
	
	INSERT INTO libros SET
		nombre = "MAGOS Y SEMIDIOSES", 
		editoriales = "Sudamericana", 
		resenia = "Tres historias originales. Dos sagas míticas.Rick Riordan mezcla en esta novela el mundo de Percy Jackson, protagonista de la serie «Los héroes del Olimpo» con el de los hermanos Carter y Sadie Kane de «Las crónicas de los Kane».El mundo está patas arriba cuando Percy Jackson y Annabeth Chase conocen a Carter y Sadie Kane. Están apareciendo criaturas extrañas en lugares inesperados, así que semidioses y magos tienen que unir fuerzas para acabar con todos esos monstruos.Pero ¿Y si la unión de sus fuerzas no es suficiente para frustrar los planes de un antiguo enemigo que está empleando a la vez la fuerza de los hechizos griegos y egipcios para sembrar el caos?",
		isbn = "", 
		estadoRegistro = "Ingresado", 
		idGenero = "4", 
		precio = 692,
		fechaEdicion = NOW(), 
		historial = "()";
		
	INSERT INTO libros_autores SET
		idLibro = "17", 
		idAutor = "8";		
	
	
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	INSERT INTO autores SET 
		nombre = "Philip Pullman",
		pais = "GBR",
		estadoRegistro = "ingresado",
		fechaEdicion = NOW(),
		historial = "()";	
		

	INSERT INTO libros SET
		nombre = "EL LIBRO DE LA OSCURIDAD I. LA BELLA SALVAJE", 
		editoriales = "Penguin Random House", 
		resenia = "Philip Pullman regresa al mundo de La Materia Oscura con esta maravillosa primera entrega de su nueva serie.Malcolm Polstead, un joven adolescente de once años, y su daimonion Asta viven con sus padres muy cerca de Oxford. Al otro lado del río Támesis (en el que Malcolm navega habitualmente utilizando su amada canoa, un bote con el nombre de La Bella Salvaje) está la abadía de Godstow, habitada por las monjas de la región. Malcolm descubrirá que ellas tienen un huesped muy especial, una niña con el nombre de Lyra Belacqua…",
		isbn = "9788417821494", 
		estadoRegistro = "Ingresado", 
		idGenero = "4", 
		precio = 692,
		fechaEdicion = NOW(), 
		historial = "()";
		
	INSERT INTO libros_autores SET
		idLibro = "18", 
		idAutor = "9";		
	
	
	INSERT INTO libros SET
		nombre = "EL LIBRO DE LA OSCURIDAD II. LA COMUNIDAD SECRETA", 
		editoriales = "Penguin Random House", 
		resenia = "Philip Pullman regresa al mundo de La Materia Oscura con esta maravillosa segunda entrega de la serie EL LIBRO DE LA OSCURIDAD.Han pasado veinte años desde los sucesos acaecidos en La bella salvaje. En el primer volumen de El libro de la oscuridad, se narraba el trascendental viaje que emprendía Lyra Belacqua siendo un bebe.Ahora, en La comunidad secreta, nos encontramos con Lyra Lenguadeplata, y ya no es una niña…En el segundo volumen de El libro de la oscuridad, vemos a Lyra, con veinte años, y a su daimonion Pantalaimon, obligados a seguir un rumbo en su relación que jamás habrían imaginado, atraídos hacia la compleja y peligrosa vorágine de un mundo cuya existencia ignoraban. Malcolm, por su parte, tambien emprende su propio viaje. El niño de antaño, que asumió la misión de salvar a un bebe con su barca, es ahora un hombre dotado de un fuerte sentido del deber y del deseo de obrar correctamente.En ese mundo suyo, a la vez familiar y extraordinario, deberán viajar lejos de los límites de Oxford, para cruzar Europa y adentrarse en Asia, en busca de elementos perdidos: una ciudad habitada por daimonions, un secreto guardado en el corazón de un desierto y el escurridizo misterio del Polvo.",
		isbn = "9788417821500", 
		estadoRegistro = "Ingresado", 
		idGenero = "4", 
		precio = 785,
		fechaEdicion = NOW(), 
		historial = "()";
		
	INSERT INTO libros_autores SET
		idLibro = "19", 
		idAutor = "9";		
	
	
		
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
	INSERT INTO autores SET 
		nombre = "GWENDA BOND",
		pais = "USA",
		estadoRegistro = "ingresado",
		fechaEdicion = NOW(),
		historial = "()";	
		
	INSERT INTO libros SET
		nombre = "STRANGER THINGS MENTES PELIGROSAS", 
		editoriales = "PENGUIN RANDOM HOUSE", 
		resenia = "Un laboratorio misterioso. Un siniestro científico. Una historia secreta. Si quieres conocer por fin la verdad sobre la madre de Once, prepárate para esta emocionante precuela de la exitosa serie Stranger Things.",
		isbn = "9788466355384", 
		estadoRegistro = "Ingresado", 
		idGenero = "4", 
		precio = 666,
		fechaEdicion = NOW(), 
		historial = "()";
		
	INSERT INTO libros_autores SET
		idLibro = "20", 
		idAutor = "10";		
		
		
	SELECT * FROM genero;
	SELECT * FROM libros;
	SELECT * FROM autores;
	SELECT * FROM libros_autores;
	
	SELECT libros_autores.idLibroAutor, libros_autores.idLibro, libros.nombre, libros_autores.idAutor, autores.nombre FROM libros_autores 
		INNER JOIN libros ON libros.idLibro = libros_autores.idLibro
		INNER JOIN autores ON autores.idAutor = libros_autores.idAutor;


