<?php



header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('content-type: application/json; charset=utf-8');


$PARAMETROS = json_decode(file_get_contents('php://input'), true);



if( isset($PARAMETROS['info']) && $PARAMETROS['info'] == "Libros"){

    //include("ws/libros_json.php");
    die();

}



?>


