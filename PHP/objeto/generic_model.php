

<?php


class generico {

	/*
		public : Marcando que un atributo o metodo es publico significa que puede ser llamdo en cualquier momento y son heredables
		protected : Cuando un atributo o metodo es protected este atributo no puede ser utilizado fuera de la clase y es heredable
		private: Cuando son privado no se peuede unsar fuera de la clase y no son heredables
	*/

	// ES el identificador unico de cada registro 
	public $idRegistro;
	// Es el estado en que se encuentra el registro 
	protected $estadoRegistro;

	public function constructor($arrayDatos = array('idRegistro'=>0, 'estadoRegistro'=>'') ){

		$this->idRegistro 		= $arrayDatos['idRegistro']; 

		if(strtolower($arrayDatos['estadoRegistro']) == "borrado"){			
			$this->modificarEstadoBorrado();
		}else{
			$this->modificarEstadoIngresado();
		}

	}

	public function obtenerEstado(){
		return $this->estadoRegistro;
	}
	
	public function modificarEstadoBorrado(){
		$this->estadoRegistro = "Borrado";
	}

	public function modificarEstadoIngresado(){
		$this->estadoRegistro = "Ingresado";
	}

}


$objGenerica = new generico();

echo("<h1>");
echo($objGenerica->idRegistro);
echo("</h1>");
$objGenerica->idRegistro = "Soy Atributo id registro";
echo("<h1>");
echo($objGenerica->idRegistro);
echo("</h1>");


echo("<h1>");
echo($objGenerica->obtenerEstado());
echo("</h1>");
$objGenerica->modificarEstadoIngresado();
echo("<h1>");
echo($objGenerica->obtenerEstado());
echo("</h1>");
$objGenerica->modificarEstadoBorrado();
echo("<h1>");
echo($objGenerica->obtenerEstado());
echo("</h1>");

$arrayDatos = ["idRegistro"=>"1", "estadoRegistro"=>"OK"];

$objGenerica->constructor($arrayDatos);

echo("<h1>");
echo($objGenerica->idRegistro);
echo("</h1>");
echo("<h1>");
echo($objGenerica->obtenerEstado());
echo("</h1>");

echo("<hr>");
$objGenerica->constructor();
echo("<h1>");
echo($objGenerica->idRegistro);
echo("</h1>");
echo("<h1>");
echo($objGenerica->obtenerEstado());
echo("</h1>");








?>









