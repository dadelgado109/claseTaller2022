<?PHP
	/* */

	$clave = "";
	$user = "root";
	$conexion = new PDO("mysql:host=localhost;dbname=clases",$user,$clave);
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// con el foreach recorro el array y los resultados por cada vuelta lo voy guardando en $datos
	if(isset($_POST['accion']) && $_POST['accion'] == "ingresar"){		
		if(isset($_POST['txtNombre']) && isset($_POST['txtApellido']) && isset($_POST['numEdad']) && isset($_POST['txtColor'])){
			if(!empty($_POST['txtNombre']) && !empty($_POST['txtApellido']) && !empty($_POST['numEdad'])){
				/*
					INSERT INTO personas SET
						id = 1,
						nombre = "Primero Nombre",
						apellido = "Primer APellido",
						edad = "56",
						color = "Verde";
				*/ 
				$nombre 	= $_POST['txtNombre'];
				$apellido	= $_POST['txtApellido'];
				$edad 		= $_POST['numEdad'];
				$color		= $_POST['txtColor'];

				$sqlIngresarPersona = "INSERT INTO personas SET
							nombre 	 = :val1,
							apellido = :apellido,
							edad 	 = :edad,
							color	 = :color ;";
				
				$arrayPersona = array(
					"val1" 		=> $nombre,
					"apellido" 	=> $apellido,
					"edad" 		=> $edad,
					"color" 	=> $color
				);

				$mysqlPreparado = $conexion->prepare($sqlIngresarPersona);
				$respuesta = $mysqlPreparado->execute($arrayPersona);

			}
		}		
	}
	if(isset($_POST['accion']) && $_POST['accion'] == "reiniciar"){
	
		$sqlEliminarTodo = "DELETE FROM personas;";
		$mysqlPreparado = $conexion->prepare($sqlEliminarTodo);
		$respuesta = $mysqlPreparado->execute();
				
	}

	unset($_POST);

	//SELECT * FROM personas;
	$sqlPersonas = "SELECT * FROM personas";
	$mysqlPDO = $conexion->prepare($sqlPersonas);
	$respuesta = $mysqlPDO->execute();

	if($respuesta == 1){
		$lista = $mysqlPDO->fetchAll();
	}else{
		$lista = array();
	}

?>
		

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
		<title>Soy Titulo</title>
		<link rel="icon" href="img/logo_php.ico" sizes="32x32">
		<!-- CSS  -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="css/materialize.css?v.20220218.1" type="text/css" rel="stylesheet" media="screen,projection" />
		<link href="css/style.css?v.20220218.1" type="text/css" rel="stylesheet" media="screen,projection" />
		
	</head>

	<body>
		<nav class=" lime lighten-2" role="navigation">
			<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
				<!-- Menu para web-->
				<ul class="right hide-on-med-and-down">
					
					<li>
						<form action="ejercicio_formulario.php?action=restablecer" method="POST" style="margin-top: 10px;">
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
						<form action="ejercicio_formulario.php?action=restablecer" method="POST"  >
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
				<a href="#" data-activates="slide-out" class="button-collapse">
					<i class="material-icons">menu</i>
				</a>
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
					<div class="col m2 s12">
					</div>
					<div class="col m8 s12">
						<form class="col s12" action="ejercicio_formulario_mysql.php?action=ingresar" method="POST">
							<div class="row">
								<div class="input-field col s12">
									<input  type="text" class="validate" id="idNombre" name="txtNombre" placeholder="">
									<label for="idNombre">Nombre</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text"  class="validate" id="idApellido" name="txtApellido" placeholder="" >
									<label for="idApellido">Apellido</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="number" class="validate" id="idEdad"  name="numEdad" placeholder="" >
									<label for="idEdad">Edad</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<input type="text" class="validate" id="idColor"  name="txtColor" placeholder="" >
									<label for="idColor">Color</label>
								</div>
							</div>							
							<input type="hidden" name="accion" value="ingresar">
							<button class="btn waves-effect waves-light cyan darken-3" type="submit" name="action">Submit
								<i class="material-icons right">send</i>
							</button>
							<hr>							
						</form>
					</div>
					<div class="col m2 s12 ">
					</div>
				</div>
			<!--   Icon Section   -->

				<table class="striped">
					<thead>
						<tr class="blue lighten-8" >
							<th colspan="6" >
								<form action="ejercicio_formulario_mysql.php?action=reiniciar" method="POST">
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
	<?PHP
					foreach($lista as $i => $data){	
 	?>
						<tr>
							<td><?=$data['id']?></td>
							<td><?=$data['nombre']?></td>
							<td><?=$data['apellido']?></td>
							<td><?=$data['edad']?></td>
							<td><?=$data['color']?></td>
							<td>
								<form action="ejercicio_formulario.php?action=eliminar" method="POST">
									<input type="hidden" name="accion" value="eliminar">
									<input type="hidden" name="idRegistro" value="<?=$i?>">
									<button class="btn-floating waves-effect waves-light cyan darken-3" type="submit" name="action">
										<i class="material-icons right">delete_forever</i>
									</button>
								</form>
							</td>	
						</tr>
	<?php
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