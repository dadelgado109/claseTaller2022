<?PHP

	// $_POST
	// $_GET 


	// $varNombre =  $_POST['txtNombre'];
	
	
	if(isset($_GET['txtNombre'])){

		echo('Estoy En el if carganado la variable $varNombre ');
		$varNombre = $_GET['txtNombre'];

	}
	
	if(isset($_GET['control'])){

		echo('Estoy En el if carganado la variable:'.$_GET['control']);
		$varControl = $_GET['control'];

	}
	if(isset($_POST['control'])){

		echo('Estoy En el if carganado la variable por POST:'.$_POST['control']);
		$varControl = $_POST['control'];

	}



?>
		

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
	<title>Etiquetas HTML</title>

	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
	
</head>

<body>
	<nav class=" lime lighten-2" role="navigation">
		<div class="nav-wrapper container">
			<a id="logo-container" href="#" class="brand-logo">Logo</a>
			<!-- Menu para web-->
			<ul class="right hide-on-med-and-down">
				
				<li>
					
				</li>
				<!-- 
				<li><a href="css.html">CSS</a></li>
				<li><a href="js.html">JS</a></li>
				<li><a href="git.html">GIT</a></li>
				-->
			</ul>
			<!-- Menu para web-->
			<!-- Menu para movile-->
			<ul id="nav-mobile" class="side-nav">
				<li>
					
				</li>
				<!-- 
				<li><a href="css.html">CSS</a></li>
				<li><a href="js.html">JS</a></li>
				<li><a href="git.html">GIT</a></li>
				-->
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
			<!-- Menu para movile-->
		</div>
	</nav>
	<div class="section no-pad-bot" id="index-banner">
		<div class="container">
			<br><br>
			<h1 class="header center blue-text">Practica Formulario</h1>
			<div class="row center">
				<h5 class="header col s12 light"></h5>
			</div>
			<br><br>

		</div>
	</div>


	<div class="container">
		<div class="section">			
			<div class="row">
				<div class="col s3">
				</div>
				<div class="col s6">
					<form class="col s12" action="formulario.php" method="GET">
						<div class="row">
							<div class="input-field col s12">
								<input  type="text" class="validate" id="idNombre" name="txtNombre" placeholder="Nombre">
								<label for="idNombre">Nombre</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input type="text"  class="validate" id="idApellido" name="txtApellido" placeholder="Apellido" >
								<label for="idApellido">Apellido</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input type="number" class="validate" id="idEdad"  name="numEdad" placeholder="Edad" >
								<label for="idEdad">Edad</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input type="text" class="validate" id="idColor"  name="txtColor" placeholder="color" >
								<label for="idColor">Color</label>
							</div>
						</div>
						<hr>
						<input type="hidden" id="idAccion" name="accion" value="Ingresar" >
						<button class="btn waves-effect waves-light cyan darken-3" type="submit">Enviar
							<i class="material-icons right">send</i>
						</button>						
					</form>					
				</div>
				<div class="col s3">
				</div>
			</div>
			<div>
				<br>
				<hr>
				<br>
				<form class="col s12" action="formulario.php" method="POST">						
					<input type="hidden" id="idAccion" name="control" value="ok" >
					<button class="btn waves-effect waves-light cyan darken-3" type="submit">Procesar
						<i class="material-icons right">send</i>
					</button>						
				</form>
			</div>
			<!--   Icon Section   -->
		</div>
		<br><br>
	</div>

	<footer class="page-footer blue darken-2">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Company Bio</h5>
					<p class="grey-text text-lighten-4">We are a team of college students working on this project like
						it's our full time job. Any amount would help support and continue development on this project
						and is greatly appreciated.</p>
				</div>
				<div class="col l3 s12">
					<h5 class="white-text">Settings</h5>
					<ul>
						<li><a class="white-text" href="#!">Link 1</a></li>
						<li><a class="white-text" href="#!">Link 2</a></li>
						<li><a class="white-text" href="#!">Link 3</a></li>
						<li><a class="white-text" href="#!">Link 4</a></li>
					</ul>
				</div>
				<div class="col l3 s12">
					<h5 class="white-text">Connect</h5>
					<ul>
						<li><a class="white-text" href="#!">Link 1</a></li>
						<li><a class="white-text" href="#!">Link 2</a></li>
						<li><a class="white-text" href="#!">Link 3</a></li>
						<li><a class="white-text" href="#!">Link 4</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
			</div>
		</div>
	</footer>

	<!--  Scripts-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="js/init.js"></script>

</body>

</html>