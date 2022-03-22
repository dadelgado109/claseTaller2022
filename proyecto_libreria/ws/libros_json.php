<?php


require_once("modelos/libros.php");

$objLibros = new libros();
$listaLibros = $objLibros->listarLibros();

$arrayJSON = json_encode($listaLibros);

print_r($arrayJSON );


?>