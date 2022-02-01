<?php


// Defino variablea A booleana
$varBooleanA = True;
// Defino variablea B booleana
$varBooleanB = False;

$varBooleanC = True;

$varA = 5;

$varB = 9;

//$varC = 5;

$varD = "5";




$varCasoUno = $varBooleanA && $varBooleanB;

$varCasoDos = $varBooleanA && $varBooleanC;

$varCasoTres = $varBooleanB && $varBooleanB;

// --------------------------------------------------

$varCasoCuatro = $varBooleanA || $varBooleanB;

$varCasoCinco = $varBooleanA || $varBooleanC;

$varCasoSeis = $varBooleanB || $varBooleanB;

// --------------------------------------------------
$varCasoSiete = $varBooleanA xor $varBooleanB;

$varCasoOcho = $varBooleanA xor $varBooleanC;

$varCasoNueve = $varBooleanB xor $varBooleanB;
// --------------------------------------------------
$varCasoDiez = !$varBooleanA; 

$varCasoOnce = !$varBooleanB ;
// --------------------------------------------------


$varCasoMultiple = (  ($varBooleanA || $varBooleanB) && ($varA >= $varC) );
							// TRUE                           



?>

<!DOCTYPE>
<html>
	<head>
		<title>Primer paso</title>
	</head>
	<body>
		<h1>$varBooleanA && $varBooleanB; <?php var_dump($varCasoUno) ?></h1>
		<h1>$varBooleanA && $varBooleanC; <?php var_dump($varCasoDos) ?></h1>
		<h1>$varBooleanB && $varBooleanB; <?php var_dump($varCasoTres) ?></h1>
		<hr>
		<h1>$varBooleanA || $varBooleanB; <?php var_dump($varCasoCuatro) ?></h1>
		<h1>$varBooleanA || $varBooleanC; <?php var_dump($varCasoCinco) ?></h1>
		<h1>$varBooleanB || $varBooleanB; <?php var_dump($varCasoSeis) ?></h1>
		<hr>
		<h1>$varBooleanA xor $varBooleanB; <?php var_dump($varCasoSiete) ?></h1>
		<h1>$varBooleanA xor $varBooleanC; <?php var_dump($varCasoOcho) ?></h1>
		<h1>$varBooleanB xor $varBooleanB; <?php var_dump($varCasoNueve) ?></h1>
		<hr>
		<h1>!$varBooleanA : <?php var_dump($varCasoDiez) ?></h1>
		<h1>!$varBooleanB : <?php var_dump($varCasoOnce) ?></h1>
		<hr>	
		<h1>$varCasoMultiple : <?php var_dump($varCasoMultiple) ?></h1>
		
	</body>
</html>