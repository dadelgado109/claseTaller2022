

<?php

//include("libreria/saludos.php");

require_once("libreria/saludos.php");

$nombre = "Nacho";

$cantante = "Chino Miranda";
$respuesta = saludarConRetorno($cantante);


/*  
    funcion isset() valida si una variable existe y retorno un true o false
    EJ: isset($varUno);
*/
/*
    funcion unset() esa funcion elimina una variable
    EJ: unset($varUno);
*/




@session_start();

//$_SESSION['Saludo'] = "Hola a todos";

$saludo = $_SESSION['Saludo'];

?>

<!DOCTYPE>
<html>
	<head>
		<title>Primer paso</title>
	</head>
	<body>
		<h1><?=saludar()?> </h1>
        <h1><?=saludarAAlguien("Luis Miguel")?></h1>
        <h1><?=saludarAAlguien($nombre)?></h1>
        <h1><?=$respuesta?></h1>
        <h1><?=$saludo?></h1>
		<hr>
		
	</body>
</html>