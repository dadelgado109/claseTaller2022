<?php

/*
    Funcion que recibe el valor de un nombre
    Procesa el valor y devuelve el resultado
*/
function saludarConRetorno($nombre){

    // Proceso el valor $nombre
    $retorno = "Hola ".$nombre;

    // Retornamos este valor 
    return $retorno;
}


// Se crea una function simple que imprime en pantalla "hola a todos"
function saludar(){

    echo("Hola a todos");

}

// 
function saludarAAlguien($nombre){

    echo("Hola ".$nombre);

}


?>