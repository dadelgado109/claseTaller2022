<?php

$saludo = "Hola Alumnos";


$numero = 69;
if ($numero%2==0){
    echo "el $numero es par";
}else{
    echo "el $numero es impar";
}


?>

<!DOCTYPE>
<html>
	<head>
		<title>Primer paso</title>
	</head>
	<body>
		<h1><?php echo($saludo); ?></h1>

		<h1><?=$saludo?></h1>

		<h1><?php print($saludo); ?></h1>

		<h1><?php print_r($saludo); ?></h1>

		<h1><?php var_dump($saludo); ?></h1>

		<hr>
		
	</body>
</html>