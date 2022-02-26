
<?PHP 


require_once("modelos/autores.php");





$objAutores = new autores();


echo("<h1>");
echo($objAutores->idRegistro);
echo("</h1>");
$objAutores->idRegistro = "Soy Atributo id registro";
echo("<h1>");
echo($objAutores->idRegistro);
echo("</h1>");


echo("<h1>");
echo($objAutores->obtenerEstado());
echo("</h1>");
$objAutores->modificarEstadoIngresado();
echo("<h1>");
echo($objAutores->obtenerEstado());
echo("</h1>");
$objAutores->modificarEstadoBorrado();
echo("<h1>");
echo($objAutores->obtenerEstado());
echo("</h1>");


echo("<hr>");
$arrayDatos = ["idRegistro"=>"1", "estadoRegistro"=>"OK", 'nombre'=>'El nombre', 'pais'=>'ARA'];

$objAutores->constructor($arrayDatos);

echo("<h1>");
echo($objAutores->idRegistro);
echo("</h1>");
echo("<h1>");
echo($objAutores->obtenerEstado());
echo("</h1>");
echo("<h1>");
echo($objAutores->nombre);
echo("</h1>");
echo("<h1>");
echo($objAutores->pais);
echo("</h1>");

echo("<hr>");
$objAutores->constructor();
echo("<h1>");
echo($objAutores->idRegistro);
echo("</h1>");
echo("<h1>");
echo($objAutores->obtenerEstado());
echo("</h1>");
echo("<h1>");
echo($objAutores->nombre);
echo("</h1>");
echo("<h1>");
echo($objAutores->pais);
echo("</h1>");


$listaAutores = $objAutores->listarAutores();

print_r($listaAutores);

echo("<hr>");
$listaAutoresUruguayos = $objAutores->listarAutoresUruguayos();

print_r($listaAutoresUruguayos);


?>






