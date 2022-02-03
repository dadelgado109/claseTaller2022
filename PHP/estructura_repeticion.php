<?php

	// Estructuras de control
	/*
		if( condicion ){
			// Sentencia de codigo
		}

	*/

	$condicion = True;	



?>

<!DOCTYPE>
<html>
	<head>
		<title>Estructuras de control</title>
	</head>
	<body>
		
<?php
			
			
			$i = 0;

			while($condicion){
				//Esto se repite 
				echo("<h1>Hola me repito siempre::::".$i."</h1>");
				$i = $i + 1;
				if($i >= 5){
					$condicion = False;
				}
			}

			$x = 2;
			while($x > 7){
				//Esto se repite 
				$x = $x + 2;
				if($x%2==0){
					echo("<h1>Soy Numero::".$x."</h1>");
				}				
			}

			$x = 2;
			while($x < 7){
				//Esto se repite 
				$x = $x + 3;
				if(0==0){
					echo("<h1>Soy Numero::".$x."</h1>");
				}
							
			}
?>			
<hr>
<?php

			for($i=0; $i <= 5; $i++){

				echo "El número vale: " . $i . "<br/>";

			}

			$x = 2;
			do{
				//Esto se repite 
				$x = $x + 2;
				if($x%2==0){
					echo("<h1>Soy Numero::".$x."</h1>");
				}		

			}while($x > 7)

?>

		<hr>	
	</body>
</html>