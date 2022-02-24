<?php


class generica {

	protected $idRegistro;

	private $estadoRegistro;


	public function __construct(){
		
	}

	public function constructor(){
		$this->idRegistro     = 0;
		$this->estadoRegistro = "Ingresado";	
	}

	public function mostrarIdRegistro(){
		return $this->idRegistro;
	}

	public function mostrarEstadoRegistro(){
		return $this->estadoRegistro;
	}



}

class usuarios extends generica {

	public $nombre;

	public $mail;

	public $clave;

	protected $perfil;

	
	public function __construct(){
		/*
		$this->nombre 	= $varNombre;
		$this->mail 	= $varMail;
		$this->clave 	= $varClave;
		$this->perfil 	= $varPerfil;		
		*/
	}

	public function constructor(){
		
		parent::constructor();
		$this->idRegistro     = 55;

	}
	
	public function devolverTodo(){

		$retorno = array();
		$retorno['nombre']	= $this->nombre;
		$retorno['mail']	= $this->mail;
		$retorno['clave']	= $this->clave;
		$retorno['perfil']	= $this->perfil;
		return $retorno;

	}

	public function mostrarPerfil(){
		return $this->perfil;
	}

	public function cambiarAAdministrador(){
		$this->perfil = "Administrador";
	}

	public function cambiarASupervisor(){
		$this->perfil = "Supervisor";
	}

	public function cambiarAVendedor(){
		$this->perfil = "Vendedor";
	}

	public function mostrarPrivate(){
		return $this->estadoRegistro;
	}

}


	$objGenerica = new generica();
	$objGenerica->constructor();
	echo($objGenerica->mostrarIdRegistro());
	echo("<br>");
	echo($objGenerica->mostrarEstadoRegistro());


	$objUsuarios = new usuarios();
	$objUsuarios->constructor();
	echo("<hr>");
	echo($objUsuarios->mostrarIdRegistro());
	echo("<br>");
	echo($objUsuarios->mostrarEstadoRegistro());
	echo("<br>");
	echo($objUsuarios->mostrarPrivate());

	



	/*
	$objUsuarios = new usuarios("yo Nombre","yo Mail","yo clave","yo perfil");
	$objUsuarios->mostrarTodo();
	echo("<hr>");
	$objUsuarioDos = new usuarios("","","","");
	$objUsuarioDos->constructor("MI Nombre","MI Mail","MI clave");
	$objUsuarioDos->mostrarTodo();
	
	echo("<br>");
	echo("<br>");
	//$objUsuarioDos->perfil = "Pizza";
	$objUsuarioDos->cambiarASupervisor();
	echo($objUsuarioDos->mostrarPerfil());
	*/	



	/*

	$objUsuarios->cargarTodo();

	$objUsuarios->mostrarTodo();
	echo("<br><br><br>");
	echo("<h1>");
	echo($objUsuarios->mail);
	echo("</h1>");
	$objUsuarios->mail = "damian@mail.com";

	echo("<h1>");
	echo($objUsuarios->mail);
	echo("</h1>");
	$objUsuarios->mostrarTodo();

	echo("<br>");
	echo("<br>");
	echo("<br>");
	$objUsuariosDos = new usuarios();

	$objUsuariosDos->nombre = "El Dami";
	$objUsuariosDos->mail   = "yoMain@mail.com";
	$objUsuariosDos->clave  = "yoClave";
	$objUsuariosDos->perfil = "Mi perfil";

	$objUsuariosDos->mostrarTodo();
	$objUsuariosDos->cargarTodo();
	$objUsuariosDos->mostrarTodo();
	*/


?>


