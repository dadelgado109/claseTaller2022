
<?php

	function casillero($tablero,$posicion){
	   
		$retorno = "";
		switch ($tablero[$posicion]){
			case "A": 
				$retorno = "O";
				break;
			case "B":
				$retorno = "X";
				break;
			default:
				$retorno = "";
				break;
		}
		return $retorno;
   }

   function casilleroImg($tablero,$posicion){
	   
		$retorno = "";
		switch ($tablero[$posicion]){
			case "A": 
				$retorno = "img/tateti/circulo.png";
				break;
			case "B":
				$retorno = "img/tateti/cruz.png";
				break;
			default:
				$retorno = "img/tateti/nada.png";
				break;
		}
		return $retorno;
	}
   
   
   function validoGanador($tablero, $jugador){
	   
		/*
			1|2|3 
			-----
			4|5|6 
			-----
			7|8|9		
		*/	
		$retorno = "";
		// Validos las lineas orinzontales
		if($tablero['1'] != "" && $tablero['1'] == $tablero['2'] && $tablero['1'] == $tablero['3']){
			$retorno = "Ganador Jugador: ".$jugador;
		}
		if($tablero['4'] != "" && $tablero['4'] == $tablero['5'] && $tablero['4'] == $tablero['6']){
			$retorno = "Ganador Jugador: ".$jugador;
		}
		if($tablero['7'] != "" && $tablero['7'] == $tablero['8'] && $tablero['7'] == $tablero['9']){
			$retorno = "Ganador Jugador: ".$jugador;
		}
		// Valido las lineas verticales
		if($tablero['1'] != "" && $tablero['1'] == $tablero['4'] && $tablero['1'] == $tablero['7']){
			$retorno = "Ganador Jugador: ".$jugador;
		}
		if($tablero['2'] != "" && $tablero['2'] == $tablero['5'] && $tablero['2'] == $tablero['8']){
			$retorno = "Ganador Jugador: ".$jugador;
		}
		if($tablero['3'] != "" && $tablero['3'] == $tablero['6'] && $tablero['3'] == $tablero['9']){
			$retorno = "Ganador Jugador: ".$jugador;
		}	
		// Validos las diagonales
		if($tablero['1'] != "" && $tablero['1'] == $tablero['5'] && $tablero['1'] == $tablero['9']){
			$retorno = "Ganador Jugador: ".$jugador;
		}
		if($tablero['3'] != "" && $tablero['3'] == $tablero['5'] && $tablero['3'] == $tablero['7']){
			$retorno = "Ganador Jugador: ".$jugador;
		}
		return $retorno;
   }
?>

<?php
	

 	@session_start();  
	// Armo el tablero
	$_SESSION['juego'] = isset($_GET['lugar'])?$_GET['lugar']:"";
	if ($_SESSION['juego'] == ""){
		//Initialize 
		/*
			1|2|3 
			-----
			6|5|4 
			-----
			7|8|9		
		*/	
		$_SESSION['tablero'] = array(1=>"A",2=>"B",3=>"",4=>"",5=>"",6=>"",7=>"",8=>"",9=>""); 	
		$_SESSION['ganador'] = "";
		$_SESSION['jugador'] = "B";
	}

	$ganador = validoGanador($_SESSION['tablero'], $_SESSION['jugador']);
	// Verifico el turno del jugador

	// Operador ternario
	$_SESSION['jugador'] = isset($_SESSION['jugador'])?$_SESSION['jugador']:"B";
	
	if($_SESSION['jugador'] == "A"){
		$_SESSION['jugador'] = "B";
	}else{
		$_SESSION['jugador'] = "A";
	}

	
	if($_SESSION['ganador'] == ""){
		$getPocision = isset($_GET['lugar'])?$_GET['lugar']:""; 	
		if(isset($_SESSION['tablero'][$getPocision]) && $_SESSION['tablero'][$getPocision] == ""){
			$_SESSION['tablero'][$getPocision] = $_SESSION['jugador'];
		}else{
			if($_SESSION['jugador'] == "A"){
				$_SESSION['jugador'] = "B";
			}else{
				$_SESSION['jugador'] = "A";
			}
		}
	}
	
	$_SESSION['ganador'] = validoGanador($_SESSION['tablero'], $_SESSION['jugador']);

	// Cargo el tablero	
	$ganador = $_SESSION['ganador'];
	$tablero = $_SESSION['tablero'];
	$jugador = $_SESSION['jugador']; 

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
		<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
		<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
		<style>
			.sepadorVertical{
				width: 20px;
			}
			.sepadorHorizontal{
				height: 20px;
			}
			.cuadradoJuego{
				height: 200px;
				width: 200px;
			}
		</style>
	</head>

	<body>
		<nav class=" lime lighten-2" role="navigation">
			<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
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
				<a href="#" data-activates="slide-out" class="button-collapse">
					<i class="material-icons">menu</i>
				</a>
				<!-- Menu para movile-->
			</div>
		</nav>
		
		<section>
			<ul id="slide-out" class="side-nav fixed">
				<li>
					<div class="user-view">
						<div class="background">
							<img src="img/fondo_codigo.jpg">
						</div>
						<a href="#!user">
							<img class="circle" src="img/logo_php.png">
						</a>
						<a href="#!name"><span class="white-text name">Damian Delgado</span></a>
						<a href="#!email"><span class="white-text email">damisintesis109@gmail.com</span></a>
					</div>
				</li>
				<li><a href="#!"><i class="material-icons">code</i>Ejercicios</a></li>
				<li><a href="ejercicio_formulario.php">Formulario Prueba</a></li>
				<li><a href="ejercicio_tateti.php">Tateti</a></li>
				<li><div class="divider"></div></li>
				<li><a class="subheader">Subheader</a></li>
				<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
			</ul>
		</section>
		<div class="section no-pad-bot" id="index-banner">
			<div class="container">
				<h1 class="header center blue-text">Practica TaTeTi</h1>
				<h2  class="header center red-text">
				<?php
					if($ganador){
						echo($ganador);
					}
				?>
				</h2>
			</div>
		</div>


		<div class="container">
			<div class="section">				
				<div class="row">
					<div class="col m3 s12">
					</div>
					<div class="col m6 s12">						
						<table class="striped">
							<thead>
								<tr class="blue lighten-8" >
									<th colspan="6" >
										<form action="ejercicio_tateti.php" method="POST">
											<input type="hidden" name="accion" value="reiniciar">
											<button class="btn blue darken-3" type="submit" name="action">Reiniciar
												<i class="material-icons">autorenew</i>
											</button>
										</form>
									</th>
								</tr>
							</thead>
							<tbody>
								<tr class="cuadradoJuego">
									<td class="cyan lighten-4">
										<form action="ejercicio_tateti.php" method="GET">
											<input type="hidden" name="lugar" value="1" ></input>
											<div class ="center-align">
												<button type="submit" class ="cuadradoJuego cyan lighten-4">
													<img src="<?= casilleroImg($tablero,1) ?> " width="100px" >
												</button>
											</div>
										</form>
									</td>
									<td class="red sepadorVertical">
									</td>	
									<td class="cyan lighten-4">
										<form action="ejercicio_tateti.php" method="GET">
											<input type="hidden" name="lugar" value="2" ></input>
											<div class ="center-align">
												<button type="submit" class ="cuadradoJuego cyan lighten-4">
													<img src="<?= casilleroImg($tablero,2) ?> " width="100px" >
												</button>
											</div>
										</form>
									</td>	
									<td class="red sepadorVertical">										
									</td>
									<td class="cyan lighten-4">
										<form action="ejercicio_tateti.php" method="GET">
											<input type="hidden" name="lugar" value="3" ></input>
											<div class ="center-align">
												<button type="submit" class ="cuadradoJuego cyan lighten-4">
													<img src="<?= casilleroImg($tablero,3) ?> " width="100px" >
												</button>
											</div>
										</form>
									</td>		
								</tr>
								<tr	class="red sepadorHorizontal">
									<td colspan ="6" >
									
									</td>		
								</tr>
								<tr class="cuadradoJuego">
									<td class="cyan lighten-4">
										<form action="ejercicio_tateti.php" method="GET">
											<input type="hidden" name="lugar" value="4" ></input>
											<div class ="center-align">
												<button type="submit" class ="cuadradoJuego cyan lighten-4">
													<img src="<?= casilleroImg($tablero,4) ?> " width="100px" >
												</button>
											</div>
										</form>
									</td>
									<td class="red sepadorVertical">

									</td>	
									<td class="cyan lighten-4">
										<form action="ejercicio_tateti.php" method="GET">
											<input type="hidden" name="lugar" value="5" ></input>
											<div class ="center-align">
												<button type="submit" class ="cuadradoJuego cyan lighten-4">
													<img src="<?= casilleroImg($tablero,5) ?> " width="100px" >
												</button>
											</div>
										</form>
									</td>	
									<td	class="red sepadorVertical">
										
									</td>
									<td class="cyan lighten-4">
										<form action="ejercicio_tateti.php" method="GET">
											<input type="hidden" name="lugar" value="6" ></input>
											<div class ="center-align">
												<button type="submit" class ="cuadradoJuego cyan lighten-4">
													<img src="<?= casilleroImg($tablero,6) ?> " width="100px" >
												</button>
											</div>
										</form>
									</td>		
								</tr>
								<tr class="red sepadorHorizontal">
									<td colspan ="6" >
									
									</td>		
								</tr>
								<tr class="cuadradoJuego">
									<td class="cyan lighten-4">
										<form action="ejercicio_tateti.php" method="GET">
											<input type="hidden" name="lugar" value="7" ></input>
											<div class ="center-align">
												<button type="submit" class ="cuadradoJuego cyan lighten-4">
													<img src="<?= casilleroImg($tablero,7) ?> " width="100px" >
												</button>
											</div>
										</form>
									</td> 
									<td	class="red sepadorVertical">

									</td>	
									<td class="cyan lighten-4">
										<form action="ejercicio_tateti.php" method="GET">
											<input type="hidden" name="lugar" value="8" ></input>
											<div class ="center-align">
												<button type="submit" class ="cuadradoJuego cyan lighten-4">
													<img src="<?= casilleroImg($tablero,8) ?> " width="100px" >
												</button>
											</div>
										</form>
									</td>	
									<td	class="red sepadorVertical">
										
									</td>
									<td class="cyan lighten-4">
										<form action="ejercicio_tateti.php" method="GET">
											<input type="hidden" name="lugar" value="9" ></input>
											<div class ="center-align">
												<button type="submit" class ="cuadradoJuego cyan lighten-4">
													<img src="<?= casilleroImg($tablero,9) ?> " width="100px" >
												</button>
											</div>
										</form>
									</td>		
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col m3 s12 ">
					</div>
				</div>
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