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


	public function ingresarAutor($arrayDatos){
		
		/*
		INSERT INTO autores SET 
		nombre = "JRR tolkein",
		pais = "GER",
		estadoRegistro = "ingresado",
		fechaEdicion = NOW(),
		historial = "()";
		*/
		$returno = '';
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