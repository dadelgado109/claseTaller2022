<?php

	// Estructuras de control
	/*
		if( condicion ){
			// Sentencia de codigo
		}

	*/

	$varBolean = False;
	$varNombre = "Alfredo";
	$Salario = "Tortas Fritas";
	

	if($varBolean){

		// Solo Accedo si la condicion es veredadera(True)
		$varNombre = $varNombre." es un nombre";

	}else{

		// Accedo a esta parte si la condicion es falsa 
		$varNombre = $varNombre." no es un nombre";

	}

	// El valor de la variable es "Alfredo no es un nombre" 

	if($varNombre == "Alfredo"){
		
		$varNombre = $varNombre." es el Mejor Nombre";

	}

	$respuesta = "";
	if($Salario < 25000 && $Salario > 0){

		$respuesta = "No pago irpf";

	}elseif($Salario > 25000 && $Salario < 35000){

		$respuesta = "Pago 8% de irpf";

	}elseif($Salario > 35000 && $Salario < 45000){

		$respuesta = "Pago 15% de irpf";

	}elseif($Salario > 45000 ){

		$respuesta = "Te odio Astori";

	}else{

		$respuesta = "No ingreso ningun numero";
	}


	$varHelados = "Frutilla";
	$varMeGusta = "";
	switch($varHelados){
		case "Frutilla":
			$varMeGusta .= " No me gusta";
			break;
		case "Limon":
			$varMeGusta .= " Me encanta";
			break;
		case "Naranja":
			$varMeGusta .= " Esta muy Bueno";
			break;
		default:
			$varMeGusta .= " No lo Conozco";
			break;
	}


?>

<!DOCTYPE>
<html>
	<head>
		<title>Estructuras de control</title>
	</head>
	<body>
		<h1><?=$varNombre?></h1>
		<h1><?=$respuesta?></h1>
		<h1><?=$varMeGusta?></h1>
		<hr>	
	</body>
</html>