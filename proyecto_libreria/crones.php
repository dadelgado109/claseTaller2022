
<?php

require_once("modelos/genero.php");

echo("Hola Soy un cron:");

$accion = "";

if(isset($_SERVER['argv'][1])){
	print_r($_SERVER['argv'][1]);
}
echo("\n");
if(isset($_SERVER['argv'][2])){
	print_r($_SERVER['argv'][2]);
}

if(isset($_SERVER['argv'][1]) && $_SERVER['argv'][1] == "Instalacion"){
	include("consola/instalador.php");
}

/*
$objGenero = new genero();
$arrayFiltros = array();
$listaGeneros = $objGenero->listarGenero($arrayFiltros);
print_r($listaGeneros);
*/




?>


