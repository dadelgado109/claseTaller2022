
<?php

require_once("generico.php");


class usuario extends generico {

	public $nombre;

	public $mail;

	public $clave;

	public function constructor($artributos){
		/*

		*/
		parent::constructor($artributos);

		$this->nombre	= $artributos['nombre'];
		$this->mail		= $artributos['mail'];	
		$this->clave 	= $artributos['clave'];	

	}

	public function obtenerAtributos(){
		/*
			
		*/
		//parent::obtenerAtributos();
		$retorno = array();
		$retorno['idRegistro'] 		= $this->idRegistro;
		$retorno['mail'] 			= $this->mail;				
		$retorno['clave']			= $this->clave; 		
		$retorno['nombre'] 			= $this->nombre;		
		$retorno['estadoRegistro']	= $this->estadoRegistro;		
		return $retorno;

	}


}











?>
