<?php

require_once("generico.php");

class libros extends generico{

	// Nombre perteneciente al libro
	public $nombre;
	// es la ruta de la imagen
	public $imagen;
	// Es el nombre de la Editoria
	public $editorial;
	// Es la resenia del libro
	public $resenia;
	// Es el nuemro unico del libro
	public $isbn;
	// Es el precio del libro
	public $precio;
	// ES el genero que pertenece el libro
	public $idGenero;



	public function constructor($arrayDatos = array()){

		parent::constructor($arrayDatos);
		$this->nombre 	= $this->chequeadorConstructor($arrayDatos, 'nombre', ''); 
		$this->imagen 	= $this->chequeadorConstructor($arrayDatos, 'imagen', ''); 
		$this->editorial= $this->chequeadorConstructor($arrayDatos, 'editorial', ''); 
		$this->resenia 	= $this->chequeadorConstructor($arrayDatos, 'resenia', ''); 
		$this->isbn 	= $this->chequeadorConstructor($arrayDatos, 'isbn', ''); 
		$this->precio 	= $this->chequeadorConstructor($arrayDatos, 'precio', '200'); 
		$this->idGenero = $this->chequeadorConstructor($arrayDatos, 'idGenero', ''); 

	}

	public function ingresarLibros(){
		
		/*
		
		*/
		try{

			$varSQL = 'SELECT * FROM libros WHERE nombre = :nombre AND isbn = :isbn;';		
			$arrayLibro = array('nombre' => $this->nombre, 'isbn' => $this->isbn);
			$respuesta = $this->traerListado($varSQL, $arrayLibro);

			if(!empty($respuesta)){
				/*
					En caso que tenga registro entro aca y devuelvo que ya ese libro esta ingresado
				*/
				return "Ya esta ingresado el Libro";
			}

			$fecha = date("Y-m-d h:i:s");
			$sql = "INSERT INTO libros SET
						nombre		= :nombre,
						imagen 		= :imagen,
						editoriales	= :editoriales,
						resenia 	= :resenia,
						isbn 		= :isbn,
						precio  	= :precio,
						idGenero	= :idGenero,
						estadoRegistro	= :estado,
						fechaEdicion = :fechaEdicion,
						historial	= '';
				";

			$arrayLibro = array(
				"nombre"		=>	$this->nombre,
				"imagen" 		=>  $this->imagen,
				"editoriales"	=>	$this->editorial,
				"resenia" 		=>  $this->resenia,
				"isbn"			=>	$this->isbn,
				"precio"		=>  $this->precio,
				"idGenero" 		=>  $this->idGenero,
				"estado"		=>	$this->estadoRegistro,
				"fechaEdicion" =>  $fecha,
			);	

			$respuesta = $this->ejecutarSentencia($sql, $arrayLibro);

			if($respuesta == 1){
				$retorno = "Se ingreso el libro correctamente";
			}else{
				$retorno = "Error al ingresar el libro";
			}

			return $retorno;

		}catch(PDOException $e){
		
			$retorno = "Ocurrio Un error al ingresar libro";
			$retorno = $e->getMessage();
			return $retorno;
		}

	}
	
	public function traerLibro($idRegistro){
		
		$varSQL = 'SELECT * FROM libros WHERE idLibro = :idLibro;';
		$arrayLibro = array('idLibro' => $idRegistro);

		$respuesta = $this->traerListado($varSQL, $arrayLibro);

		$this->idRegistro = $respuesta[0]['idLibro'];
		$this->nombre	= $respuesta[0]['nombre'];
		$this->pais		= $respuesta[0]['pais'];
		$this->estadoRegistro = $respuesta[0]['estadoRegistro'];

	}//traerLibro


	public function guardarLibro(){
		
		
		$fecha = date("Y-m-d h:i:s");

		$sql = "UPDATE libros SET
					nombre		= :nombre,
					imagen 		= :imagen,
					editorial	= :editorial,
					resenia 	= :resenia,
					isbn 		= :isbn,
					precio  	= :precio,
					idGenero	= :idGenero,
					fechaEdicion = :fechaEdicion,
					historial = ''
				WHERE idLibro = :idLibro;
			";

		$arrayLibro = array(
			"nombre"	=>	$this->nombre,
			"imagen" 		=>	$this->imagen,
			"editorial"	=>	$this->editorial,
			"resenia" 	=>	$this->resenia,
			"isbn"		=>	$this->isbn,
			"precio"	=>  $precio,
			"idGenero" 	=>  $idGenero,
			"estado"	=>	$this->estadoRegistro,
			"fechaEdicion" =>  $fecha,
			"idLibro"	 =>  $this->idRegistro,
		);	

		$respuesta = $this->ejecutarSentencia($sql, $arrayLibro);
		if($respuesta == 1){
			$retorno = "Se guardo el libro correctamente";
		}else{
			$retorno = "Error al guardar el libro";
		}
		return $retorno;

	}//guardarLibro


	public function listarLibros($filtos = array()){
		
		//$varSQL = 'SELECT * FROM libros';

		// Evaluo si existe en el array que recibo la clave pagina en caso contrario pongo por defecto 0.
		if(isset($filtos['pagina']) && $filtos['pagina'] != "" ){			
			$pagina = $filtos['pagina'];
		}else{
			$pagina = 0;
		}
		// Evaluo si existe en el array que recibo la clave limite en caso contrario pongo por defecto 10.
		if(isset($filtos['limite']) && $filtos['limite'] != "" ){
			$limite = $filtos['limite'];
		}else{
			$limite = 5;
		}
		//      SELECT * FROM libros LIMIT 0,10; 
		$puntoSalida = $pagina * $limite;

		$buscador = "";
		if(isset($filtos['buscar']) && $filtos['buscar'] != "" ){
		
			$buscador = ' WHERE nombre LIKE "%'.$filtos['buscar'].'%" ';
		
		}

		$varSQL = "SELECT * FROM libros ".$buscador."  ORDER BY idLibro DESC LIMIT ".$puntoSalida.",".$limite."";

		$retorno = $this->traerListado($varSQL, array());
		return $retorno;

	}

	public function totalLibros($filtos = array()){
		
		$buscador = "";
		if(isset($filtos['buscar']) && $filtos['buscar'] != "" ){
		
			$buscador = ' WHERE nombre LIKE "%'.$filtos['buscar'].'%" ';
		
		}

		$varSQL = 'SELECT count(1) AS totalRegistros FROM libros '.$buscador.'';

		$respuesta = $this->traerListado($varSQL, array());
		$retorno = $respuesta[0]['totalRegistros'];

		return $retorno;

	}



}





?>