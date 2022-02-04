<?php





// inicio la session
@session_start();

$_SESSION['Saludo'] = "Hola a todos";

if(isset($_SESSION['mes'])){

	$mes = $_SESSION['mes'];
	unset($_SESSION['mes']);

}else{
	
	$mes = "No hay mes cargado";
	$_SESSION['mes'] = "Febrero";

}


$saludo = $_SESSION['Saludo'];



?>

<!DOCTYPE>
<html>
	<head>
		<title>Sessiones</title>
	</head>
	<body>
		<h1><?=$saludo?> </h1>
		<h1><?=$mes?> </h1>
		<hr>
		
	</body>
</html>
