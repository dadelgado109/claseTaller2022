<?php



require_once("modelos/libros.php");

$objLibros = new libros();

$arraFilto = ['limite' => "6"];

$listaRandom = $objLibros->listarLibros($arraFilto);


?>




<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Parallax Template - Materialize</title>
		<!-- CSS  -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="web/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="web/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	</head>
	<body>
		<nav class="white" role="navigation">
			<div class="nav-wrapper container">
			<a id="logo-container" href="#" class="brand-logo">Logo</a>
			<ul class="right hide-on-med-and-down">
				<li><a href="#">Usuarios</a></li>
			</ul>

			<ul id="nav-mobile" class="sidenav">
				<li><a href="#">Usuarios</a></li>
			</ul>
			<a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			</div>
		</nav>

		<div id="index-banner" class="parallax-container">
			<div class="section no-pad-bot">
				<div class="container">
					<br><br>
					<h1 class="header center red-text text-red-2">Mi Libreria</h1>
					<div class="row center">
						<h5 class="header col s12 light red-text text-red-2">Veni a Leer y vola como en tus sueños</h5>
					</div>				
					<br><br>
				</div>
			</div>
			<div class="parallax">
				<img src="web/imagenes/parallax/parallax_1.jpg" alt="Unsplashed background img 1">
			</div>
		</div>


		<div class="container">
			<div class="section">
				<!--   Icon Section   -->
				<div class="row">

<?PHP
				foreach($listaRandom as $libros){
?>
					<div class="col s12 m2">
						<div class="icon-block">
							<img src="Imagenes/libros/<?=$libros['imagen']?>" width="120px" height="180" />
							<h5 class="center"><?=$libros['nombre']?></h5>
							<p class="light"><?=substr($libros['resenia'], 0, 100)?>...</p>
						</div>
					</div>
<?PHP
				}
?>

				

				</div>

			</div>
		</div>


		<div class="parallax-container valign-wrapper">
			<div class="section no-pad-bot">
				<div class="container">
					<div class="row center">
						<h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
					</div>
				</div>
			</div>
			<div class="parallax">
				<img src="web/imagenes/parallax/background2.jpg" alt="Unsplashed background img 2">
			</div>
		</div>

		<div class="container">
			<div class="section">

				<div class="row">
					<div class="col s12 center">
					<h3><i class="mdi-content-send brown-text"></i></h3>
					<h4>Contact Us</h4>
					<p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
					</div>
				</div>

			</div>
		</div>


		<div class="parallax-container valign-wrapper">
			<div class="section no-pad-bot">
			<div class="container">
				<div class="row center">
				<h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
				</div>
			</div>
			</div>
			<div class="parallax"><img src="web/imagenes/parallax/background3.jpg" alt="Unsplashed background img 3"></div>
		</div>

		<footer class="page-footer teal">
			<div class="container">
			<div class="row">
				<div class="col l6 s12">
				<h5 class="white-text">Company Bio</h5>
				<p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


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
					Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
				</div>
			</div>
		</footer>


		<!--  Scripts-->
		<script src="web/js/jquery-2.1.1.min.js"></script>
		<script src="web/js/materialize.js"></script>
		<script src="web/js/init.js"></script>

	</body>
</html>


