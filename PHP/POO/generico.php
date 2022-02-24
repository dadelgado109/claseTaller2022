
<?php


	class generico {

		// Es el identificar del registro
		protected $idRegistro;
		// Es el estado que tiene el registro
		protected $estadoRegistro;

		public function constructor($atributos){
			/*
				Este metodo recibe una variable $atributo que es del tipo Array 
			*/
			$this->idRegistro       = $atributos['idRegistro'];
			$this->estadoRegistro   = $atributos['estado'];
			
		}

		public function obtenerAtributos(){

			$retorno = array();
			$retorno['idRegistro']      = $this->idRegistro;
			$retorno['estadoRegistro']  = $this->estadoRegistro;
			return $retorno;

		}

		public function obtenerIdRegistro(){
			return $this->idRegistro;
		}

		public function obtenerEstadoRegistro(){
			return $this->estadoRegistro;
		}

	}



?>









