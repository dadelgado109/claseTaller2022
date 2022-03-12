<?PHP

require_once("modelos/usuarios.php");


if(isset($_GET['cerrar']) && $_GET['cerrar'] == "ok"){

	@session_start();
	unset($_SESSION['nombre']);
	@session_destroy();
	
}else{

	@session_start();

	if(isset($_GET['sec'])){

		$_SESSION['seccion'] = $_GET['sec'];

	}else{

		if($_SESSION['seccion'] == ""){
			$_SESSION['seccion'] = "principal";
		}
	}
	

}

$objUsuarios = new usuarios();
$respuesta = "";

if(isset($_POST['accion']) && $_POST['accion'] == "Login"){

	$email = $_POST['txtEmail'];
	$clave 	= $_POST['txtClave'];
	
	$respuesta = $objUsuarios->login($email, $clave);

	if(isset($respuesta[0]['nombre'])){
		@session_start();
		$_SESSION['nombre'] = $respuesta[0]['nombre'];
		$_SESSION['fecha'] 	= date("Y-m-d H:i:s");

	}
}



?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
		<title>Starter Template - Materialize</title>

		<!-- CSS  -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="backend/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="backend/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="backend/css/libreria.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
	<body>
		<div class="navbar-fixed">
			<nav class="blue darken-4" role="navigation">
				<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
					<ul class="right hide-on-med-and-down">
						<li><a href="backend.php?sec=usu">Usuarios</a></li>
						<li><a href="backend.php?sec=cli">Clientes</a></li>
						<li><a href="backend.php?sec=aut">Autores</a></li>
						<li><a href="backend.php?sec=lib">Libros</a></li>
						<li><a href="backend.php?sec=gen">Generos</a></li>
						<li><a href="backend.php?sec=vet">Ventas</a></li>
						<li>	
						<a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Yo</a>
							<!-- Dropdown Structure -->
							<ul id='dropdown1' class='dropdown-content'>
								<li><a href="#!">one</a></li>
								<li><a href="#!">two</a></li>
								<li class="divider" tabindex="-1"></li>
								<li><a href="#!">three</a></li>
								<li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
								<li>
									<a href="backend.php?cerrar=ok">
										<i class="material-icons">cloud</i>
										Cerrar
									</a>
								</li>
							</ul>					
						</li>
						
					</ul>
					<ul id="nav-mobile" class="sidenav">
						<li><a href="#">Usuarios</a></li>
						<li><a href="#">Clientes</a></li>
						<li><a href="#">Autores</a></li>
						<li><a href="#">Libros</a></li>
						<li><a href="#">Generos</a></li>
						<li><a href="#">Ventas</a></li>
					</ul>
					<a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
				</div>
			</nav>
		</div>
		

		<div class="container">
			
<?php
		if(!isset($_SESSION['nombre'])){
?>
			<div class="section no-pad-bot" id="index-banner">
				<br><br>
				<h1 class="header center orange-text">Administrador </h1>			
				<br>
				<br>
			</div>
			<div class="row">
				<form class="col s12" method="POST" action="backend.php">
			 		<div class="row">
						<div class="input-field col s12">
							<input name="txtEmail" id="email" type="email" class="validate">
							<label for="email">Email</label>
						</div>
					</div>	
					<div class="row">
						<div class="input-field col s12">
							<input name="txtClave" id="password" type="password" class="validate">
							<label for="password">Password</label>
			 			</div>
					</div>			 
					<div>
						<input type="hidden" id="idAccion" name="accion" value="Login" >
						<button class="btn waves-effect waves-light cyan darken-3" type="submit">Entrar
							<i class="material-icons right">send</i>
						</button>	
					</div>     	
				</form>			
			</div>	
<?php
		}else{

			if($_SESSION['seccion'] == "aut"){

				include("backend/vistas/vista_autores.php");

			}elseif($_SESSION['seccion'] == "gen"){				

				include("backend/vistas/vista_genero.php");

			}elseif($_SESSION['seccion'] == "usu"){				

				include("backend/vistas/vista_usuarios.php");

			}elseif($_SESSION['seccion'] == "lib"){				

				include("backend/vistas/vista_libros.php");

			}else{
?>
				<h1 class="header center orange-text">Hola <?=$_SESSION['nombre']?> </h1>
<?PHP 
			}	
		}
?>



		</div>
		<!-- CIERRO CONTAINER -->
		<br><br><br><br>
		<br><br><br><br>
		<br><br><br><br>
		<footer class="page-footer blue darken-4">
			<div class="container">				
			</div>
			<div class="footer-copyright">
				<div class="container">
					Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
				</div>
			</div>
		</footer>
		<!--  Scripts-->
		<script src="backend/js/jquery-2.1.1.min.js"></script>
		<script src="backend/js/materialize.js"></script>
		<script src="backend/js/init.js"></script>
		<script>
			document.addEventListener('DOMContentLoaded', function() {		

 				M.AutoInit();
				var elems = document.querySelectorAll('.modal');
				var instances = M.Modal.init(elems, options);

				var elems = document.querySelectorAll('.dropdown-trigger');
    			var instances = M.Dropdown.init(elems, options);

			});
		</script>
	</body>
</html>
