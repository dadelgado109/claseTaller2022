<?php

require_once("generico.php");

class autores extends generico{

	// Nombre perteneciente al autor
	public $nombre;
	// El pais es el country iso 3 Caracteres
	public $pais;

	

	public function constructor($arrayDatos = array()){

		parent::constructor($arrayDatos);
		$this->nombre 	= $this->chequeadorConstructor($arrayDatos, 'nombre', ''); 
		$this->pais 	= $this->chequeadorConstructor($arrayDatos, 'pais', 'URY'); 

	}

	public function ingresarAutor(){
		
		/*
			Primero evaluo si el autor esta ingresado
			1) chequeo que exista el autor con nombre y el pais(countryCode 3)
		*/
		try{

			$varSQL = 'SELECT * FROM autores WHERE nombre = :nombre AND pais = :pais;';		
			$arrayAutor = array('nombre' => $this->nombre, 'pais' => $this->pais);
			$respuesta = $this->traerListado($varSQL, $arrayAutor);

			if(!empty($respuesta)){
				/*
					En caso que tenga registro entro aca y devuelvo que ya ese autor esta ingresado
				*/
				return "Ya esta ingresado el autor";
			}

			$fecha = date("Y-m-d h:i:s");
			$sql = "INSERT INTO autores SET
						nombre = :nombre,
						pais   = :pais,
						estadoRegistro = :estado,
						fechaEdicion = :fechaEdicion,
						historial = '';
				";

			$arrayAutor = array(
				"nombre"	=>	$this->nombre,
				"pais" 		=>  $this->pais,
				"estado"	=>	$this->estadoRegistro,
				"fechaEdicion" =>  $fecha,
			);	

			$respuesta = $this->ejecutarSentencia($sql, $arrayAutor);

			if($respuesta == 1){
				$retorno = "Se ingreso el autor correctamente";
			}else{
				$retorno = "Error al ingresar el autor";
			}

			return $retorno;

		}catch(PDOException $e){

			$retorno = "Ocurrio Un error al ingresar autores";
			return $retorno;
		}

	}

	public function traerAutor($idRegistro){
		
		$varSQL = 'SELECT * FROM autores WHERE idAutor = :idAutor;';
		$arrayAutor = array('idAutor' => $idRegistro);

		$respuesta = $this->traerListado($varSQL, $arrayAutor);

		$this->idRegistro = $respuesta[0]['idAutor'];
		$this->nombre	= $respuesta[0]['nombre'];
		$this->pais		= $respuesta[0]['pais'];
		$this->estadoRegistro = $respuesta[0]['estadoRegistro'];

	}


	public function guardarAutor(){
		
		
		$fecha = date("Y-m-d h:i:s");

		$sql = "UPDATE autores SET
					nombre = :nombre,
					pais   = :pais,
					estadoRegistro = :estado,
					fechaEdicion = :fechaEdicion,
					historial = ''
				WHERE idAutor = :idAutor;
			";

		$arrayAutor = array(
			"nombre"	=>	$this->nombre,
			"pais" 		=>  $this->pais,
			"estado"	=>	$this->estadoRegistro,
			"fechaEdicion" =>  $fecha,
			"idAutor" =>  $this->idRegistro,
		);	

		$respuesta = $this->ejecutarSentencia($sql, $arrayAutor);
		if($respuesta == 1){
			$retorno = "Se guardo el autor correctamente";
		}else{
			$retorno = "Error al guardar el autor";
		}
		return $retorno;

	}


	public function listarAutores(){
		
		$varSQL = 'SELECT * FROM autores;';
		$retorno = $this->traerListado($varSQL, array());
		return $retorno;

	}

	public function listarAutoresUruguayos(){
		
		$varSQL = 'SELECT * FROM autores WHERE pais = "UY";';
		$retorno = $this->traerListado($varSQL, array());
		return $retorno;

	}


}





?>