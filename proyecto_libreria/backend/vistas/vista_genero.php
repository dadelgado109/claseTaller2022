<?PHP

require_once("modelos/genero.php");

$objGenero = new genero();

$respuesta = "";

if(isset($_POST['accion']) && $_POST['accion'] == "Ingresar"){

	$nombre 		= $_POST['txtNombre'];
	$descripcion 	= $_POST['txtDescripcion'];
	
	$datos = [
			'idRegistro'	=>'', 
			'estadoRegistro'=>'', 
			'nombre'		=> $nombre, 
			'descripcion'	=> $descripcion];

	$objGenero->constructor($datos);
	$respuesta = $objGenero->ingresarGenero();

}

if(isset($_POST['accion']) && $_POST['accion'] == "Eliminar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){
		$idRegistro = $_POST['idRegistro'];		
		$objGenero->traerGenero($idRegistro);
	}
	
}

if(isset($_POST['accion']) && $_POST['accion'] == "ConfirmarEliminar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){

		$idRegistro = $_POST['idRegistro'];
		
		$objGenero->traerGenero($idRegistro);
		$objGenero->modificarEstadoBorrado();
		$respuesta = $objGenero->guardarGenero();

	}
}


if(isset($_POST['accion']) && $_POST['accion'] == "Editar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){

		$idRegistro = $_POST['idRegistro'];		
		$objGenero->traerGenero($idRegistro);

	}
}


if(isset($_POST['accion']) && $_POST['accion'] == "Guardar"){
	
	if(isset($_POST['idRegistro']) && $_POST['idRegistro'] != "" ){

		$idRegistro 	= $_POST['idRegistro'];		
		$nombre 		= $_POST['txtNombre'];
		$descripcion	= $_POST['txtDescripcion'];

		$objGenero->traerGenero($idRegistro);
		$objGenero->nombre 		= $nombre;
		$objGenero->descripcion	= $descripcion;

		if(isset($_POST['eliminar']) && $_POST['eliminar'] == "ok" ){
			$objGenero->modificarEstadoBorrado();
		}
		$respuesta = $objGenero->guardarGenero();

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


$totalRegistros = $objGenero->totalGenero($arrayFiltros);

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

$listaGeneros = $objGenero->listarGenero($arrayFiltros);


?>

		<div class="section no-pad-bot" id="index-banner">
			<br><br>
			<h1 class="header center orange-text">Género </h1>			
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
						<h3>Eliminar el g&#233;nero:<?=$objGenero->nombre?>?</h3>
					</div>					
					<input type="hidden" id="idAccion" name="accion" value="ConfirmarEliminar">
					<input type="hidden" id="idRegistro" name="idRegistro" value="<?=$objGenero->obtenerIdRegistro()?>">
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
						<h3>Modificar G&#233;nero</h3>
					</div>
					<div class="input-field col s12">
						<input placeholder="Nombre Género" name="txtNombre" id="first_name" type="text" class="validate" value="<?=$objGenero->nombre?>">
						<label for="first_name">Nombre</label>
					</div>
					<div class="input-field col s12">
						<input placeholder="Descripcion" name="txtDescripcion" id="first_name" type="text" class="validate" value="<?=$objGenero->descripcion?>">
						<label for="first_name">Descripcion</label>
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
					<input type="hidden" id="idRegistro" name="idRegistro" value="<?=$objGenero->obtenerIdRegistro()?>">
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
						<th colspan="5">
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
						<th>Descripcion</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
<?php
				foreach($listaGeneros as $generos){
?>
					<tr>
						<td><?=$generos['idGenero']?></td>	
						<td><?=$generos['nombre']?></td>
						<td><?=$generos['descripcion']?></td>
						<td><?=$generos['estadoRegistro']?></td>
						<td>
							<form action="backend.php" method="POST">
								<input type="hidden" name="accion" value="Eliminar">
								<input type="hidden" name="idRegistro" value="<?=$generos['idGenero']?>">
								<button class="btn-floating waves-effect waves-light red darken-3" type="submit" name="action">
									<i class="material-icons right">delete_forever</i>
								</button>
							</form>
							<form action="backend.php" method="POST">
								<input type="hidden" name="accion" value="Editar">
								<input type="hidden" name="idRegistro" value="<?=$generos['idGenero']?>">
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
					<form class="col s12" action="backend.php" method="POST">
						<div class="input-field col s12">
							<h3>Ingresar Género </h3>
						</div>
						<div class="input-field col s12">
							<input placeholder="Nombre" name="txtNombre" id="first_name" type="text" class="validate">
							<label for="first_name">Nombre</label>
						</div>
						<div class="input-field col s12">
							<input placeholder="Descripcion" name="txtDescripcion" id="first_name" type="text" class="validate">
							<label for="first_name">Descripcion</label>
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
         <!-- Modal Structure -->
