<?php

require_once("generico.php");

class genero extends generico{


	// Nombre del genero
	public $nombre;
	// Es la descripcion del genero
	public $descripcion;


	public function constructor($arrayDatos = array()){

		parent::constructor($arrayDatos);
		$this->nombre 		= $this->chequeadorConstructor($arrayDatos, 'nombre', ''); 
		$this->descripcion	= $this->chequeadorConstructor($arrayDatos, 'descripcion', 'No tiene descripcion'); 

	}

	public function ingresarGenero(){
		
		/*
			Primero evaluo si el autor esta ingresado
			1) chequeo que exista el autor con nombre y el pais(countryCode 3)
		*/
		try{

			$varSQL = 'SELECT * FROM genero WHERE nombre = :nombre;';		
			$arrayGenero = array('nombre' => $this->nombre);
			$respuesta = $this->traerListado($varSQL, $arrayGenero);

			if(!empty($respuesta)){
				/*
					En caso que tenga registro entro aca y devuelvo que ya ese autor esta ingresado
				*/
				return "Ya esta ingresado el género";
			}

			$fecha = date("Y-m-d h:i:s");
			$sql = "INSERT INTO genero SET
						nombre			= :nombre,
						descripcion  	= :descripcion,
						estadoRegistro	= :estado,
						fechaEdicion	= :fechaEdicion,
						historial 		= '';
				";

			$arrayGenero = array(
				"nombre"		=>	$this->nombre,
				"descripcion" 	=>  $this->descripcion,
				"estado"		=>	$this->estadoRegistro,
				"fechaEdicion"	=>  $fecha,
			);	

			$respuesta = $this->ejecutarSentencia($sql, $arrayGenero);

			if($respuesta == 1){
				$retorno = "Se ingreso el género correctamente";
			}else{
				$retorno = "Error al ingresar el género";
			}
			return $retorno;

		}catch(PDOException $e){
			$retorno = "Ocurrio Un error al ingresar género";
			return $retorno;
		}

	}// ingresarGenero

	public function traerGenero($idRegistro){
		
		$varSQL 	= 'SELECT * FROM genero WHERE idGenero = :idGenero;';
		$arrayGenero = array('idGenero' => $idRegistro);

		$respuesta = $this->traerListado($varSQL, $arrayGenero);

		$this->idRegistro 		= $respuesta[0]['idGenero'];
		$this->nombre			= $respuesta[0]['nombre'];
		$this->descripcion		= $respuesta[0]['descripcion'];
		$this->estadoRegistro	= $respuesta[0]['estadoRegistro'];

	}// traerGenero


	public function guardarGenero(){
		
		
		$fecha = date("Y-m-d h:i:s");

		$sql = "UPDATE genero SET
					nombre 			= :nombre,
					descripcion   	= :descripcion,
					estadoRegistro	= :estado,
					fechaEdicion 	= :fechaEdicion,
					historial 		= ''
				WHERE idGenero = :idGenero;
			";

		$arrayGenero = array(
			"nombre"		=>	$this->nombre,
			"descripcion" 	=>  $this->descripcion,
			"estado"		=>	$this->estadoRegistro,
			"fechaEdicion"	=>  $fecha,
			"idGenero" 		=>  $this->idRegistro,
		);	

		$respuesta = $this->ejecutarSentencia($sql, $arrayGenero);
		if($respuesta == 1){
			$retorno = "Se guardo el género correctamente";
		}else{
			$retorno = "Error al guardar el género";
		}
		return $retorno;

	}//guardarGenero


	public function listarGenero($filtos = array()){
		
		//$varSQL = 'SELECT * FROM autores';

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
		//      SELECT * FROM autores LIMIT 0,10; 
		$puntoSalida = $pagina * $limite;

		$buscador = "";
		if(isset($filtos['buscar']) && $filtos['buscar'] != "" ){
		
			$buscador = ' WHERE nombre LIKE "%'.$filtos['buscar'].'%" ';
		
		}

		$varSQL = "SELECT * FROM genero ".$buscador."  ORDER BY nombre LIMIT ".$puntoSalida.",".$limite."";

		$retorno = $this->traerListado($varSQL, array());
		return $retorno;

	}//listarGenero

	public function totalGenero($filtos = array()){
		
		$buscador = "";
		if(isset($filtos['buscar']) && $filtos['buscar'] != "" ){
		
			$buscador = ' WHERE nombre LIKE "%'.$filtos['buscar'].'%" ';
		
		}

		$varSQL = 'SELECT count(1) AS totalRegistros FROM genero '.$buscador.'';
		$respuesta = $this->traerListado($varSQL, array());
		$retorno = $respuesta[0]['totalRegistros'];

		return $retorno;

	}//totalGenero


}





?>