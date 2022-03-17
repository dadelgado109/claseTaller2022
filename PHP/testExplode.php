<?php

    $valores = "Esto es una prueba para el, EXPLODE";
    $array = explode(',', $valores);
	print_r($array);


	function validar_fecha_espanol($fecha){
		$valores = explode('/', $fecha);
		if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
			return true;
		}
		return false;
	}

?>