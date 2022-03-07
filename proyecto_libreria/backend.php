<?PHP

require_once("modelos/autores.php");

$objAutores = new autores();

$respuesta = "";

if(isset($_POST['accion']) && $_POST['accion'] == "Ingresar"){

	$nombre = $_POST['txtNombre'];
	$pais 	= $_POST['txtPais'];
	
	$datos = [
			'idRegistro'	=>'', 
			'estadoRegistro'=>'', 
			'nombre'		=> $nombre, 
			'pais'			=> $pais];

	$objAutores->constructor($datos);
	$respuesta = $objAutores->ingresarAutor();

}

if(isset($_POST['accion']) && $_POST['accion'] == "Eliminar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){
		$idRegistro = $_POST['idRegistro'];		
		$objAutores->traerAutor($idRegistro);
	}
}

if(isset($_POST['accion']) && $_POST['accion'] == "ConfirmarEliminar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){

		$idRegistro = $_POST['idRegistro'];
		
		$objAutores->traerAutor($idRegistro);
		$objAutores->modificarEstadoBorrado();
		$respuesta = $objAutores->guardarAutor();

	}
}



if(isset($_POST['accion']) && $_POST['accion'] == "Editar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){

		$idRegistro = $_POST['idRegistro'];		
		$objAutores->traerAutor($idRegistro);

	}
}


if(isset($_POST['accion']) && $_POST['accion'] == "Guardar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){

		$idRegistro = $_POST['idRegistro'];		
		$nombre 	= $_POST['txtNombre'];
		$pais 		= $_POST['txtPais'];

		$objAutores->traerAutor($idRegistro);
		$objAutores->nombre = $nombre;
		$objAutores->pais 	= $pais ;

		if(isset($_POST['eliminar']) && $_POST['eliminar'] == "ok" ){
			$objAutores->modificarEstadoBorrado();
		}
		$respuesta = $objAutores->guardarAutor();

	}
}


$arrayFiltros = [];
if(isset($_GET['pag'])){

	$PAGINA = $_GET['pag'];

	if($PAGINA == "" || $PAGINA <= 0){

		$PAGINA = 0;
		$PAGINAANTERIOR = $PAGINA;
	
	}else{

		$PAGINAANTERIOR = $PAGINA - 1;
	
	}
	$PAGINASIGUENTE = $PAGINA + 1;

	$arrayFiltros['pagina'] = $PAGINA;

}else{

	$PAGINA = 0;
	$PAGINASIGUENTE = $PAGINA + 1;
	$PAGINAANTERIOR = $PAGINA;

}


$listaAutores = $objAutores->listarAutores($arrayFiltros);

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
			<h1 class="header center orange-text">Listado Autores</h1>			
				<br>
				<br>
<?PHP	
				if($respuesta != ""){
					
					echo('
						<nav>
							<div class="nav-wrapper center">'.
								$respuesta				
							.'</div>
						</nav>
					');
				}
?>

			</div>
		</div>


		<div class="container">

<?php
	if(isset($_POST['accion']) && $_POST['accion'] == "Eliminar" && isset($_POST['idRegistro']) && $_POST['idRegistro'] != ""){
?>
			<div class="row red lighten-5">
				<form class="col s12" action="backend.php" method="POST">
					<div class="input-field col s12">
						<h3>Eliminar el autor:<?=$objAutores->nombre?>?</h3>
					</div>					
					<input type="hidden" id="idAccion" name="accion" value="ConfirmarEliminar">
					<input type="hidden" id="idRegistro" name="idRegistro" value="<?=$objAutores->obtenerIdRegistro()?>">
					<button class="btn waves-effect waves-light red darken-3" type="submit">Eliminar
						<i class="material-icons right">delete_forever</i>
					</button>	
				</form>
			</div>	
<?php
	}
?>
<?php
	if(isset($_POST['accion']) && $_POST['accion'] == "Editar" && isset($_POST['idRegistro']) && $_POST['idRegistro'] != ""){
?>
			<div class="row">
				<form class="col s12" action="backend.php" method="POST">
					<div class="input-field col s12">
						<h3>Ingresar Autores</h3>
					</div>
					<div class="input-field col s12">
						<input placeholder="Nombre Autor" name="txtNombre" id="first_name" type="text" class="validate" value="<?=$objAutores->nombre?>">
						<label for="first_name">Nombre</label>
					</div>
					<div class="input-field col s12">
						<input placeholder="Pais Autor" name="txtPais" id="first_name" type="text" class="validate" value="<?=$objAutores->pais?>">
						<label for="first_name">Pais</label>
					</div>

					<div class="input-field col s12">
						<div class="switch">
							<label>
							Activado
							<input type="checkbox" name="eliminar" value="ok">
							<span class="lever"></span>
							Eliminar
							</label>
						</div>
					</div>

					<input type="hidden" id="idAccion" name="accion" value="Guardar">
					<input type="hidden" id="idRegistro" name="idRegistro" value="<?=$objAutores->obtenerIdRegistro()?>">
					<button class="btn waves-effect waves-light cyan darken-3" type="submit">Guardar
						<i class="material-icons right">send</i>
					</button>	
				</form>
			</div>	
<?php
	}
?>

			<table class="striped">
				<thead>
					<tr class="blue darken-3">
						<th colspan="5"><a class="waves-effect waves-light btn modal-trigger blue darken-3" href="#modal1">Ingresar</a></th>
					</tr>
					<tr class="blue darken-3">
						<th>#Id Registro</th>
						<th>Nombre</th>
						<th>País</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
<?php
				foreach($listaAutores as $autores){
?>
					<tr>
						<td><?=$autores['idAutor']?></td>	
						<td><?=$autores['nombre']?></td>
						<td><?=$autores['pais']?></td>
						<td><?=$autores['estadoRegistro']?></td>
						<td>
							<form action="backend.php" method="POST">
								<input type="hidden" name="accion" value="Eliminar">
								<input type="hidden" name="idRegistro" value="<?=$autores['idAutor']?>">
								<button class="btn-floating waves-effect waves-light red darken-3" type="submit" name="action">
									<i class="material-icons right">delete_forever</i>
								</button>
							</form>
							<form action="backend.php" method="POST">
								<input type="hidden" name="accion" value="Editar">
								<input type="hidden" name="idRegistro" value="<?=$autores['idAutor']?>">
								<button class="btn-floating waves-effect waves-light green darken-3" type="submit" name="action">
									<i class="material-icons right">edit</i>
								</button>
							</form>
						</td>
						
					</tr>					
<?php
				}
?>
					<tr>
						<td colspan="6">
							<ul class="pagination right">
								<li class="waves-effect">
									<a href="backend.php?pag=<?=$PAGINAANTERIOR?>"><i class="material-icons">chevron_left</i></a>
								</li>
								<li class="active">
									<a href="#!">1</a>
								</li>
								<li class="waves-effect">
									<a href="#!">2</a>
								</li>
								<li class="waves-effect">
									<a href="#!">3</a>
								</li>
								<li class="waves-effect">
									<a href="#!">4</a>
								</li>
								<li class="waves-effect">
									<a href="#!">5</a>
								</li>
								<li class="waves-effect">
									<a href="backend.php?pag=<?=$PAGINASIGUENTE?>">
										<i class="material-icons">chevron_right</i>
									</a>
								</li>
							</ul>
						</td>
					</tr>

				</tbody>
			</table>
			<br><br>
		</div>


		  <!-- Modal Structure -->
		 <div id="modal1" class="modal">
			<div class="modal-content">				
				<div class="row">
					<form class="col s12" action="backend.php" method="POST">
						<div class="input-field col s12">
							<h3>Ingresar Autores</h3>
						</div>
						<div class="input-field col s12">
							<input placeholder="Nombre Autor" name="txtNombre" id="first_name" type="text" class="validate">
							<label for="first_name">Nombre</label>
						</div>
						<div class="input-field col s12">
							<input placeholder="Pais Autor" name="txtPais" id="first_name" type="text" class="validate">
							<label for="first_name">Pais</label>
						</div>
						<input type="hidden" id="idAccion" name="accion" value="Ingresar" >
						<button class="btn waves-effect waves-light cyan darken-3" type="submit">Enviar
							<i class="material-icons right">send</i>
						</button>	
					</form>
				</div>
			</div>
			<div class="modal-footer blue darken-4">
				<a href="#!" class="modal-close waves-effect waves-green btn-flat  white-text">Cancelar</a>
			</div>
		</div>

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

				M.toast({html: 'I am a toast!', classes: 'rounded'});

			});
		</script>
	</body>
</html>
