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

		$retorno = $this->ejecutarSentencia($sql, $arrayAutor);
		return $retorno;

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

		$retorno = $this->ejecutarSentencia($sql, $arrayAutor);
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