<?php

require_once("usuario.php");


$objUsuario = new usuario();

$arrayUsu = ['idRegistro' => "1", 'nombre'=>'Damian', 'mail'=>'damian@mail.com', 'estado'=>'ingresado', 'clave'=>'soy clave'];

$objUsuario->constructor($arrayUsu);

$retorno = $objUsuario->obtenerAtributos();

print_r($retorno);



?>