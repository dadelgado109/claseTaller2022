<?PHP

	//$nombre = $_GET['nombre'];
	
	// Primero defino el nombre 
	$nombre = "";
	// Es la edad de la persona es tipo INT
	$edad 	= 0;
	// Es el color  que eligio la persona
	$color  = "";

	// Es el mensaje a la accion segun la edad
	$mensajeEdad = "";

	// Valido si estoy enviando el clave "nombre"  por GET 
	$existeNombre = isset($_GET['nombre']);	
	//En caso que clave "Nombre exista" la cargo en la variable nombre
	if($existeNombre){
		$nombre = $_GET['nombre'];
	}

	$existeEdad = isset($_GET['edad']);	
	//En caso que clave "Nombre exista" la cargo en la variable nombre
	if($existeEdad){
		$edad = $_GET['edad'];
	}

	$existeColor = isset($_GET['color']);	
	//En caso que clave "Nombre exista" la cargo en la variable nombre
	if($existeColor){
		$color = $_GET['color'];
	}


	if($edad != 0 && $edad < 70){
		
		$mensajeEdad = "Soy joven";

	}elseif($edad > 70){
		$mensajeEdad = "Soy menos joven";

	}



?>

<!DOCTYPE>
<html>
	<head>
		<title>Estructuras de control</title>
	</head>
	<body>
		<form method="GET" action="interaccion.php">
			<table aling="center">
				<tr>
					<td>
						<label>Nombre</label>
					</td>	
					<td>
						<input type="text" name="nombre">
					</td>
				</tr>
				<tr>
					<td>
						<label>Edad</label>
					</td>	
					<td>
						<input type="number" name="edad">
					</td>
				</tr>
				<tr>
					<td>	
						<label>color Favorito</label>
					</td>	
					<td>	
						<input type="text" name="color">
					</td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name="valido" value="2022-02-02">	
						<button>Enviar</button>
					</td>
				</tr>
			</table>
		</form>
		<hr>

		<a href="interaccion.php?nombre=el nombre" >Click</a>
		
		<hr>	
		<table aling="center">
			<tr>
				<td>
					<label>Nombre:</label>
				</td>	
				<td>
					<?=$nombre?>
				</td>
			</tr>
			<tr>
				<td>
					<label>Edad</label>
				</td>	
				<td>
					<?=$edad?>
					<br>
					<?=$mensajeEdad?>

				</td>
			</tr>	
			<tr>
				<td>
					<label>color Favorito</label>
				</td>	
				<td>
					<?=$color?>
				</td>
			</tr>				
		</table>
	</body>
</html>

