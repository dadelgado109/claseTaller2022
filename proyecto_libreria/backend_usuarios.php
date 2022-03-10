<?PHP

require_once("modelos/usuarios.php");

$objUsuarios = new usuarios();

$respuesta = "";

if(isset($_POST['accion']) && $_POST['accion'] == "Ingresar"){

	$nombre 	= $_POST['txtNombre'];
	$email	 	= $_POST['txtEmail'];
	$perfil 	= $_POST['selPerfil'];
	$clave 		= $_POST['txtClave'];

	$datos = [
			'idRegistro'	=>'', 
			'estadoRegistro'=>'', 
			'nombre'		=> $nombre, 
			'email'			=> $email,
			'perfil'		=> $perfil, 
			'clave'			=> $clave];

	$objUsuarios->constructor($datos);
	$respuesta = $objUsuarios->ingresarUsuario();

}

if(isset($_POST['accion']) && $_POST['accion'] == "Eliminar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){
		$idRegistro = $_POST['idRegistro'];		
		$objUsuarios->traerUSuario($idRegistro);
	}
	
}

if(isset($_POST['accion']) && $_POST['accion'] == "ConfirmarEliminar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){

		$idRegistro = $_POST['idRegistro'];
		
		$objUsuarios->traerUsuario($idRegistro);
		$objUsuarios->modificarEstadoBorrado();
		$respuesta = $objUsuarios->guardarUsuario();

	}
}


if(isset($_POST['accion']) && $_POST['accion'] == "Editar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){

		$idRegistro = $_POST['idRegistro'];		
		$objUsuarios->traerUsuario($idRegistro);

	}
}


if(isset($_POST['accion']) && $_POST['accion'] == "Guardar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){

		$idRegistro 	= $_POST['idRegistro'];		
		$nombre 	= $_POST['txtNombre'];
		$email	 	= $_POST['txtEmail'];
		$perfil 	= $_POST['selPerfil'];
		$clave 		= $_POST['txtClave'];

		$objUsuarios->traerUsuario($idRegistro);
		$objUsuarios->nombre 	= $nombre;
		$objUsuarios->email		= $email;
		$objUsuarios->perfil	= $perfil;
		$objUsuarios->clave		= $clave;

		if(isset($_POST['eliminar']) && $_POST['eliminar'] == "ok" ){
			$objUsuarios->modificarEstadoBorrado();
		}
		$respuesta = $objUsuarios->guardarUsuario();

	}
}

$arrayFiltros = [];
$BUSCAR = "";

if(isset($_GET['accion']) && $_GET['accion'] == "Buscar"){

	if(isset($_GET['txtBuscar']) && $_GET['txtBuscar'] != ""){

		$arrayFiltros['buscar'] = $_GET['txtBuscar'];
		$BUSCAR 				= $_GET['txtBuscar'];
	}
}


$totalRegistros = $objUsuarios->totalUsuarios($arrayFiltros);

if(isset($_GET['pag'])){

	$PAGINA = $_GET['pag'];

	if($PAGINA == "" || $PAGINA <= 0){
		$PAGINA = 0;
		$PAGINAANTERIOR = $PAGINA;	
	}else{
		$PAGINAANTERIOR = $PAGINA - 1;	
	}

	$limitPagina = $totalRegistros / 5;
	if($limitPagina <= ($PAGINA+1) ){
		$PAGINASIGUENTE = $PAGINA;
	}else{
		$PAGINASIGUENTE = $PAGINA + 1;		
	}
	$arrayFiltros['pagina'] = $PAGINA;

}else{

	$PAGINA = 0;
	$PAGINASIGUENTE = $PAGINA + 1;
	$PAGINAANTERIOR = $PAGINA;
	$limitPagina = $totalRegistros / 5;

}

$listaUsuarios = $objUsuarios->listarUsuarios($arrayFiltros);
$listarPerfiles= $objUsuarios->listarPerfiles();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
		<title>Usuario</title>

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
						<li>	
						<a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Yo</a>
							<!-- Dropdown Structure -->
							<ul id='dropdown1' class='dropdown-content'>
								<li><a href="#!">one</a></li>
								<li><a href="#!">two</a></li>
								<li class="divider" tabindex="-1"></li>
								<li><a href="#!">three</a></li>
								<li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
								<li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
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
		<div class="section no-pad-bot" id="index-banner">
			<div class="container">
			<br><br>
			<h1 class="header center orange-text">Listado Usuarios</h1>			
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
				<form class="col s12" action="backend_usuarios.php" method="POST">
					<div class="input-field col s12">
						<h3>Eliminar el Usuarios:<?=$objUsuarios->nombre?>?</h3>
					</div>					
					<input type="hidden" id="idAccion" name="accion" value="ConfirmarEliminar">
					<input type="hidden" id="idRegistro" name="idRegistro" value="<?=$objUsuarios->obtenerIdRegistro()?>">
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
				<form class="col s12" action="backend_usuarios.php" method="POST">
					<div class="input-field col s12">
						<h3>Ingresar Autores</h3>
					</div>
					<div class="input-field col s12">
						<input placeholder="Nombre Usuarios" name="txtNombre" id="first_name" type="text" class="validate" value="<?=$objUsuarios->nombre?>">
						<label for="first_name">Nombre</label>
					</div>
					<div class="input-field col s12">
						<input placeholder="Email" name="txtEmail" id="first_name" type="text" class="validate" value="<?=$objUsuarios->email?>">
						<label for="first_name">Email</label>
					</div>
					<div class="input-field col s12">
						<select name="selPerfil">
<?php
							foreach($listarPerfiles as $clave => $perfil){
?>
								<option value="<?=$clave?>"><?=$perfil?></option>

<?PHP
							}
?>	
						</select>
						<label for="first_name">Perfil</label>
					</div>
					<div class="input-field col s12">
						<input placeholder="clave" name="txtClave" id="first_name" type="text" class="validate" value="<?=$objUsuarios->clave?>">
						<label for="first_name">Clave</label>
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
					<input type="hidden" id="idRegistro" name="idRegistro" value="<?=$objUsuarios->obtenerIdRegistro()?>">
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
						<th colspan="8">
							<div class="row">
								<div class="col s6">
									<a class="waves-effect waves-light btn modal-trigger blue darken-3" href="#modal1">Ingresar</a>
								</div>
								<div class="col s6">									
									<form class="col s12" action="backend_usuarios.php" method="GET">	
										<input type="hidden" id="idAccion" name="accion" value="Buscar">
										<button class="btn waves-effect waves-light cyan darken-3 right" type="submit">Buscar
											<i class="material-icons right">search</i>
										</button>							
										<div class="col s6 right">
											<input placeholder="Buscar" name="txtBuscar" id="idBuscar" type="text" value="">
										</div>
									</form>
								</div>
							</div>
						</th>
					</tr>
					<tr class="blue darken-3">
						<th>#Id Registro</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Clave</th>
						<th>Perfil</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
<?php
				foreach($listaUsuarios as $usuarios){
?>
					<tr>
						<td><?=$usuarios['idUsuario']?></td>	
						<td><?=$usuarios['nombre']?></td>
						<td><?=$usuarios['email']?></td>
						<td><?=$usuarios['clave']?></td>
						<td><?=$usuarios['perfil']?></td>
						<td><?=$usuarios['estadoRegistro']?></td>
						<td>
							<form action="backend_usuarios.php" method="POST">
								<input type="hidden" name="accion" value="Eliminar">
								<input type="hidden" name="idRegistro" value="<?=$usuarios['idUsuario']?>">
								<button class="btn-floating waves-effect waves-light red darken-3" type="submit" name="action">
									<i class="material-icons right">delete_forever</i>
								</button>
							</form>
							<form action="backend_usuarios.php" method="POST">
								<input type="hidden" name="accion" value="Editar">
								<input type="hidden" name="idRegistro" value="<?=$usuarios['idUsuario']?>">
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
						<td colspan="8">
							<span class="right"><?=$totalRegistros?></span>
							<ul class="pagination right">
								<li class="waves-effect">
									<a href="backend_genero.php?pag=<?=$PAGINAANTERIOR?>&accion=Buscar&txtBuscar=<?=$BUSCAR?>"><i class="material-icons">chevron_left</i></a>
								</li>
<?php
								for($i = 0; $i < $limitPagina ; $i++){

									$colorear = "waves-effect";
									if($i == $PAGINA){
										$colorear = "active";
									}
?>
										<li class="<?=$colorear?>">
											<a href="backend_genero.php?pag=<?=$i?>&accion=Buscar&txtBuscar=<?=$BUSCAR?>"><?=$i?></a>
										</li>
<?php 								
								}
?>

								<li class="waves-effect">
									<a href="backend_genero.php?pag=<?=$PAGINASIGUENTE?>&accion=Buscar&txtBuscar=<?=$BUSCAR?>">
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
					<form class="col s12" action="backend_usuarios.php" method="POST">
						<div class="input-field col s12">
							<h3>Ingresar Usuarios</h3>
						</div>
						<div class="input-field col s12">
							<input placeholder="Nombre" name="txtNombre" id="first_name" type="text" class="validate">
							<label for="first_name">Nombre</label>
						</div>
						<div class="input-field col s12">
							<input placeholder="Email" name="txtEmail" id="first_name" type="text" class="validate">
							<label for="first_name">Email</label>
						</div>
						<div class="input-field col s12">
							<select name="selPerfil">
<?php
								foreach($listarPerfiles as $clave => $perfil){
?>
									<option value="<?=$clave?>"><?=$perfil?></option>

<?PHP
								}
?>	
							</select>
							<label for="first_name">Perfil</label>
						</div>
						<div class="input-field col s12">
							<input placeholder="Clave" name="txtClave" id="first_name" type="text" class="validate">
							<label for="first_name">Clave</label>
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

				var elems = document.querySelectorAll('.dropdown-trigger');
    			var instances = M.Dropdown.init(elems, options);

			});
		</script>
	</body>
</html>
