
<?php



echo("Hola Soy un cron:");

print_r($_SERVER['argv'][1]);

require_once("modelos/genero.php");

$objGenero = new genero();
$lista = $objGenero->listarGenero([]);

print_r($lista);



?>


