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
						<li><a href="#">Usuarios</a></li>
						<li><a href="#">Clientes</a></li>
						<li><a href="#">Autores</a></li>
						<li><a href="#">Libros</a></li>
						<li><a href="#">Generos</a></li>
						<li><a href="#">Ventas</a></li>
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
		<div class="section no-pad-bot" id="index-banner">
			<div class="container">
			<br><br>
			<h1 class="header center orange-text">Starter Template</h1>
			<div class="row center">
				<h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
			</div>
			<div class="row center">
				<a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a>
			</div>
			<br><br>
			</div>
		</div>


		<div class="container">
			<table class="striped">
				<thead>
					<tr>
						<th>#Id Registro</th>
						<th>Nombre</th>
						<th>Mail</th>
						<th>Perfil</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>	
						<td>r.rodriguez</td>
						<td>rrodriguez@empresa.com</td>
						<td>Administrador</td>
						<td>Activado</td>
					</tr>
					<tr>
						<td>2</td>	
						<td>g.gonzalez</td>
						<td>ggonzalez@empresa.com</td>
						<td>Supervisor</td>
						<td>Activado</td>
					</tr>	
					<tr>
						<td>3</td>	
						<td>p.perez</td>
						<td>pperez@empresa.com</td>
						<td>Vendedor</td>
						<td>Activado</td>
					</tr>	
					<tr>
						<td>4</td>	
						<td>p.pereira</td>
						<td>ppereira@empresa.com</td>
						<td>Vendedor</td>
						<td>Activado</td>
					</tr>							
				</tbody>
			</table>
			<br><br>
		</div>

		<br><br>
		<br><br>
		<br><br>
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

	</body>
</html>
