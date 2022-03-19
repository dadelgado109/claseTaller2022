<?PHP

require_once("modelos/libros.php");
require_once("modelos/genero.php");

$objLibros = new libros();
$objGenero = new genero();

$respuesta = "";

if(isset($_POST['accion']) && $_POST['accion'] == "Ingresar"){

	$imagen 	= "";

	if( isset($_FILES['txtImagen']['name']) ){
		$ruta = "Imagenes/libros/".$_FILES['txtImagen']['name'];
	
		if(copy($_FILES['txtImagen']['tmp_name'], $ruta)){
			
			$imagen 	= $_FILES['txtImagen']['name'];

		}else{
			print_r("Dio Error al subir la imagen");
			die();
		}
	}
	
	$nombre 	= $_POST['txtNombre'];
	$editorial	= $_POST['txtEditorial'];
	$resenia 	= $_POST['txtResenia'];
	$isbn	 	= $_POST['txtIsbn'];
	$idGenero 	= $_POST['selIdGenero'];
	$datos = [
			'idRegistro'	=>'', 
			'estadoRegistro'=>'', 
			'nombre'		=> $nombre, 
			'editorial'		=> $editorial,
			'imagen'		=> $imagen, 
			'resenia'		=> $resenia,
			'isbn'			=> $isbn, 
			'idGenero'		=> $idGenero
		];

	$objLibros->constructor($datos);
	$respuesta = $objLibros->ingresarLibros();
	
}

if(isset($_POST['accion']) && $_POST['accion'] == "Eliminar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){
		$idRegistro = $_POST['idRegistro'];		
		$objLibros->traerLibro($idRegistro);
	}
	
}

if(isset($_POST['accion']) && $_POST['accion'] == "ConfirmarEliminar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){

		$idRegistro = $_POST['idRegistro'];
		
		$objLibros->traerLibro($idRegistro);
		$objLibros->modificarEstadoBorrado();
		$respuesta = $objLibros->guardarLibros();

	}
}

if(isset($_POST['accion']) && $_POST['accion'] == "Editar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){

		$idRegistro = $_POST['idRegistro'];		
		$objLibros->traerLibro($idRegistro);

	}
}

if(isset($_POST['accion']) && $_POST['accion'] == "Guardar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){

		$idRegistro = $_POST['idRegistro'];		
		$nombre 	= $_POST['txtNombre'];
		$email	 	= $_POST['txtEmail'];
		$perfil 	= $_POST['selPerfil'];
		$clave 		= $_POST['txtClave'];

		$objLibros->traerLibros($idRegistro);
		$objLibros->nombre 	= $nombre;
		$objLibros->email		= $email;
		$objLibros->perfil	= $perfil;
		$objLibros->clave		= $clave;

		if(isset($_POST['eliminar']) && $_POST['eliminar'] == "ok" ){
			$objLibros->modificarEstadoBorrado();
		}
		$respuesta = $objLibros->guardarLibros();

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


$totalRegistros = $objLibros->totalLibros($arrayFiltros);

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

$listaLibros = $objLibros->listarLibros($arrayFiltros);
$listaSelectGenero = $objGenero->listaSelectGenero(array());



?>

	<div class="section no-pad-bot" id="index-banner">
		<br><br>
		<h1 class="header center orange-text">Libros</h1>			
		<br>
		<br>
	</div>

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

<?php
	if(isset($_POST['accion']) && $_POST['accion'] == "Eliminar" && isset($_POST['idRegistro']) && $_POST['idRegistro'] != ""){
?>
			<div class="row red lighten-5">
				<form class="col s12" action="backend.php" method="POST">
					<div class="input-field col s12">
						<h3>Eliminar el Usuarios:<?=$objLibros->nombre?>?</h3>
					</div>					
					<input type="hidden" id="idAccion" name="accion" value="ConfirmarEliminar">
					<input type="hidden" id="idRegistro" name="idRegistro" value="<?=$objLibros->obtenerIdRegistro()?>">
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
						<input placeholder="Nombre Usuarios" name="txtNombre" id="first_name" type="text" class="validate" value="<?=$objLibros->nombre?>">
						<label for="first_name">Nombre</label>
					</div>
					<div class="input-field col s12">
						<input placeholder="Email" name="txtEmail" id="first_name" type="text" class="validate" value="<?=$objLibros->imagen?>">
						<label for="first_name">Email</label>
					</div>

					<div class="input-field col s12">
						<input placeholder="clave" name="txtClave" id="first_name" type="text" class="validate" value="<?=$objLibros->isbn?>">
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
					<input type="hidden" id="idRegistro" name="idRegistro" value="<?=$objLibros->obtenerIdRegistro()?>">
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
									<form class="col s12" action="backend.php" method="GET">	
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
						<th>isbn</th>
						<th>Editoriales</th>
						<th>Perfil</th>
						<th>precio</th>
						<th>Imagen</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
<?php
				foreach($listaLibros as $libros){
?>
					<tr>
						<td><?=$libros['idLibro']?></td>	
						<td><?=$libros['nombre']?></td>
						<td><?=$libros['isbn']?></td>
						<td><?=$libros['editoriales']?></td>
						<td><?=$libros['precio']?></td>
						<td><?=$libros['estadoRegistro']?></td>
						<td>
							<img src="Imagenes/libros/<?=$libros['imagen']?>"; width="50px"  >
						</td>
						<td>
							<form action="backend.php" method="POST">
								<input type="hidden" name="accion" value="Eliminar">
								<input type="hidden" name="idRegistro" value="<?=$libros['idLibro']?>">
								<button class="btn-floating waves-effect waves-light red darken-3" type="submit" name="action">
									<i class="material-icons right">delete_forever</i>
								</button>
							</form>
							<form action="backend.php" method="POST">
								<input type="hidden" name="accion" value="Editar">
								<input type="hidden" name="idRegistro" value="<?=$libros['idLibro']?>">
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
									<a href="backend.php?pag=<?=$PAGINAANTERIOR?>&accion=Buscar&txtBuscar=<?=$BUSCAR?>"><i class="material-icons">chevron_left</i></a>
								</li>
<?php
								for($i = 0; $i < $limitPagina ; $i++){

									$colorear = "waves-effect";
									if($i == $PAGINA){
										$colorear = "active";
									}
?>
										<li class="<?=$colorear?>">
											<a href="backend.php?pag=<?=$i?>&accion=Buscar&txtBuscar=<?=$BUSCAR?>"><?=$i?></a>
										</li>
<?php 								
								}
?>

								<li class="waves-effect">
									<a href="backend.php?pag=<?=$PAGINASIGUENTE?>&accion=Buscar&txtBuscar=<?=$BUSCAR?>">
										<i class="material-icons">chevron_right</i>
									</a>
								</li>
							</ul>
						</td>
					</tr>

				</tbody>
			</table>
			<br><br>


		  <!-- Modal Structure -->
		 <div id="modal1" class="modal">
			<div class="modal-content">				
				<div class="row">
					<form class="col s12" action="backend.php" method="POST" enctype='multipart/form-data'>
						<div class="input-field col s12">
							<h3>Ingresar Libros</h3>
						</div>
						<div class="input-field col s6">
							<input placeholder="Nombre" name="txtNombre" id="first_name" type="text" class="validate">
							<label for="first_name">Nombre</label>
						</div>
						<div class="input-field col s6">
							<input placeholder="Editorial" name="txtEditorial" id="first_name" type="text" class="validate">
							<label for="first_name">Editorial</label>
						</div>
						<!--
						<div class="input-field col s12">
							<input placeholder="imagen" name="txtImagen" id="first_name" type="text" class="validate">
							<label for="first_name">imagen</label>
						</div>
							-->
						<div class="file-field input-field col s12">
				    		<div class="btn">
								<span>Archivo</span>
								<input type="file" name="txtImagen" placeholder="imagen">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
					    </div>

						<div class="input-field col s12">
							<input placeholder="Reseña" name="txtResenia" id="first_name" type="text" class="validate">
							<label for="first_name">Reseña</label>
						</div>
						<div class="input-field col s4">
							<input placeholder="Isbn" name="txtIsbn" id="first_name" type="text" class="validate">
							<label for="first_name">ISBN</label>
						</div>
						<div class="input-field col s4">
							<select name="selIdGenero">
							<option value="">Seleccione un Género</option>
<?php							
								foreach($listaSelectGenero as $genero){
?>
									<option value="<?=$genero['idGenero']?>"><?=$genero['nombre']?></option>
<?PHP
								}
?>	
							</select>
							<label for="first_name">Perfil</label>
						</div>

						<div class="input-field col s4">
							<input placeholder="Precio" name="txtPrecio" id="first_name" type="text" class="validate">
							<label for="first_name">Precio</label>
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

