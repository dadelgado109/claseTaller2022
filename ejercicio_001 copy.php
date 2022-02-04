<?PHP



$tabla = array();

if(isset($_POST['accion']) && $_POST['accion'] == "restablecer" ){

	@session_start();
	@session_destroy();

}



@session_start();

if(isset($_SESSION['trabajando']) && $_SESSION['trabajando'] == true ){

	

}else{

	$_SESSION['trabajando'] = true;
	$_SESSION['tabla'] = array();
	$_SESSION['tabla'][1] = array("nombre" => "Damian", "apellido" => "Delgado", "edad" => "34", "color" => "Azul"); 
	$_SESSION['tabla'][2] = array("nombre" => "Jose", "apellido" => "Rodriguez", "edad" => "25", "color" => "Verde"); 
	$_SESSION['tabla'][3] = array("nombre" => "Maria", "apellido" => "Smit", "edad" => "28", "color" => "Naranja");
	$_SESSION['tabla'][4] = array("nombre" => "Pia", "apellido" => "Rodriguez", "edad" => "20", "color" => "Rojo");
	$_SESSION['tabla'][5] = array("nombre" => "Antonelo", "apellido" => "Vazquez", "edad" => "45", "color" => "Verde");

}

if(isset($_POST['accion']) && $_POST['accion'] == "ingresar" ){

	if(isset($_POST['txtNombre']) && isset($_POST['txtApellido']) && isset($_POST['numEdad']) && isset($_POST['txtColor'])){

		

		if($_POST['txtNombre'] != "" && !Empty($_POST['txtNombre']) && $_POST['txtApellido'] != "" && !Empty($_POST['txtApellido']) && $_POST['numEdad'] != "" && !Empty($_POST['numEdad'])){

			$color = "ninguno";
			if($_POST['txtColor'] != ""){
				$color = $_POST['txtColor'];
			}
			$total = count($_SESSION['tabla']) + 1;			
			$_SESSION['tabla'][$total] = array("nombre" => $_POST['txtNombre'], "apellido" => $_POST['txtApellido'], "edad" => $_POST['numEdad'], "color" => $color);

		}
	}
}

if(isset($_POST['accion']) && $_POST['accion'] == "reiniciar" ){

	$_SESSION['tabla'] = array();

}


foreach($_SESSION['tabla'] as  $fila){

	$tabla[] = $fila;
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
		<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
			<!-- Menu para web-->
			<ul class="right hide-on-med-and-down">
				
				<li>
					<form action="ejercicio_001.php?action=restablecer" method="POST" style="margin-top: 10px;">
						<input type="hidden" name="accion" value="restablecer">
						<button class="btn blue darken-3 right" type="submit" name="action">
							Restablecer
						</button>
					</form>
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
					<form action="ejercicio_001.php?action=restablecer" method="POST"  >
						<input type="hidden" name="accion" value="restablecer">
						<button class="btn blue darken-3 right" type="submit" name="action">
							Restablecer
						</button>
					</form>		
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
			<h1 class="header center blue-text">Mega Practica</h1>
			<div class="row center">
				<h5 class="header col s12 light"></h5>
			</div>
			<br><br>

		</div>
	</div>


	<div class="container">
		<div class="section">
			<form class="col s12" action="ejercicio_001.php?action=ingresar" method="POST">
				<div class="row">
					<div class="col s3">
					</div>
					<div class="col s6">
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
						<input type="hidden" name="accion" value="ingresar">
						<button class="btn waves-effect waves-light cyan darken-3" type="submit" name="action">Submit
							<i class="material-icons right">send</i>
						</button>
					</div>
					<div class="col s3">
					</div>
				</div>
			</form>
			<!--   Icon Section   -->



			<table class="striped">
				<thead>
					<tr class="blue lighten-8" >
						<th colspan="6" >
							<form action="ejercicio_001.php?action=reiniciar" method="POST">
								<input type="hidden" name="accion" value="reiniciar">
								<button class="btn blue darken-3 right" type="submit" name="action">Reiniciar
									<i class="material-icons right">delete</i>
								</button>
							</form>
						</th>
					</tr>
					<tr class="green lighten-5" >
						<th width="300">#</th>
						<th width="300">Nombre</th>
						<th width="300">Apellido</th>
						<th width="50">Edad</th>
						<th width="300">Color Favorito</th>
						<th width="20">Borrar</th>
					</tr>
				</thead>
				<tbody>
<?php
					foreach($tabla as $key => $data) {
?>
						<tr>
							<td><?=$key?></td>
							<td><?=$data['nombre']?></td>
							<td><?=$data['apellido']?></td>
							<td><?=$data['edad']?></td>
							<td><?=$data['color']?></td>
							<td>
								<form>
									<button class="btn-floating waves-effect waves-light cyan darken-3" type="submit" name="action">
										<i class="material-icons right">delete_forever</i>
									</button>
								</form>
							</td>	
						</tr>
<?PHP
					}
?>					
				</tbody>
			</table>

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