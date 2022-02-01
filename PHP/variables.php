<?php

// Defino una variable de tipo string
$varString = "Yo suy una variable de texto o string";
// Defino una variable de tipo int
$varInt = 127;
// Defino una variable de tipo real
$varReal = 10.44;
// Defino una variable booleana True y False
$varBolean = True;
// Defino una variable de tipo array
$arrayTotal = array("1"=>"1", "2"=>"2", "3"=>"3" );

$varNueva = "199292993218839210";

//-------------------------------------------------------------------------------------//
// Asignacion

$varStringDos = "Yo suy una variable de texto o string";
$varStringDos .= " Y ahora tengo mas texto";



?>

<!DOCTYPE>
<html>
	<head>
		<title>Primer paso</title>
	</head>
	<body>
		<h1><?php var_dump($varString); ?></h1>

		<h1><?php var_dump($varInt); ?></h1>

		<h1><?php var_dump($varReal); ?></h1>

		<h1><?php var_dump($varBolean); ?></h1>

		<h1><?php var_dump($arrayTotal); ?></h1>

		<h1><?php var_dump($varNueva); ?></h1>
		<hr>
		
		<h1><?=$varStringDos?></h1>

	</body>
</html>